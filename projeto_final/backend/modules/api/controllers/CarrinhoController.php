<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use backend\modules\api\components\CustomAuth;
use common\models\Carrinho;
use common\models\Dados;
use common\models\Fatura;
use common\models\Linhafatura;
use common\models\Produto;
use common\models\Stock;
use Yii;
use yii\data\ActiveDataProvider;

class CarrinhoController extends ActiveController
{
    public $modelClass = 'common\models\Carrinho';

    public function behaviors()
    {
        Yii::$app->params['id'] = 0;
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => CustomAuth::className(),
        ];
        return $behaviors;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET', 'POST', 'HEAD'],
            'create' => ['POST'],
            'buy' => ['GET']
        ];
        return $verbs;
    }

    public function actions()
    {
        $actions = parent::actions();
        //no use
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['view']);
        //unset to override
        unset($actions['create']);
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $activeData = new ActiveDataProvider([
            // filters faturas by user id dont add ->all() to the end of the query
            'query' => Carrinho::find()->where(['id_Cliente' => Yii::$app->params['id']]),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }

    public function actionCreate()
    {
        try {
            $params = Yii::$app->getRequest()->getBodyParams();
            //Verifica se todos os parametros foram enviados 
            if (!isset($params['id_Produto'], $params['quantidade'])) {
                throw new \Exception('Parâmetros inválidos');
            }

            //Verificar quantidade
            if ($params['quantidade'] <= 0) {
                throw new \Exception('Quantidade inválida');
            }
            if ($params['quantidade'] > 20) {
                throw new \Exception('Quantidade máxima de 20 unidades');
            }

            //Verifica se o produto existe 
            if (Produto::findOne($params['id_Produto']) == null) {
                throw new \Exception("Produto não existe");
            }

            //Verifica se ja existe uma instancia do produto no carrinho 
            $carrinho = Carrinho::findOne(['id_Cliente' => Yii::$app->params['id'], 'id_Produto' => $params['id_Produto']]);
            if ($carrinho) {
                $carrinho->Quantidade = $carrinho->Quantidade + $params['quantidade'];
                //Verifica se a quantidade maxima foi atingida
                if ($carrinho->Quantidade > 20) {
                    throw new \Exception("Quantidade máxima atingida");
                }
                $carrinho->save();
                return "Carrinho atualizado";
            }

            //Cria uma nova instancia do produto no carrinho caso não exista
            $carrinho = new Carrinho();
            $carrinho->id_Cliente = Yii::$app->params['id'];
            $carrinho->id_Produto = $params['id_Produto'];
            $carrinho->Quantidade = $params['quantidade'];
            $carrinho->save();
            return "Adicionado ao carrinho";
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    public function actionBuy()
    {
        $dados = Dados::findOne(['id_User' => Yii::$app->params['id']]);
        $carrinhos = Carrinho::findAll(['id_Cliente' => $dados->id_User]);

        $valorTotal = 0;
        $valorIva = 0;

        foreach ($carrinhos as $carrinho) {
            $ivaP = $carrinho->produto->iva->percentagem / 100;
            $valorIva += $carrinho->Quantidade * $carrinho->produto->preco * $ivaP;
            $valorTotal += $carrinho->Quantidade * $carrinho->produto->preco;
        }

        try {
            foreach ($carrinhos as $carrinho) {
                $stock = $carrinho->produto->getStockTotal();
                if ($stock < $carrinho->Quantidade) {
                    throw new \Exception("Stock insuficiente para " . $carrinho->produto->nome);
                }
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }

        //Create Fatura
        $fatura = new Fatura();
        $fatura->id_Cliente = $dados->id_User;
        $fatura->nome = $dados->nome;
        $fatura->nif = $dados->nif;
        $fatura->codPostal = $dados->codPostal;
        $fatura->telefone = $dados->telefone;
        $fatura->morada = $dados->morada;
        $fatura->email = $dados->user->email;
        $fatura->dataFatura = date("Y-m-d H:i:s");
        $fatura->valorIva = $valorIva;
        $fatura->valorTotal = $valorTotal;
        $fatura->save();

        //Create Linhas Fatura
        foreach ($carrinhos as $carrinho) {
            $linhaFatura = new Linhafatura();
            $linhaFatura->id_Fatura = $fatura->id;
            $linhaFatura->produto_nome = $carrinho->produto->nome;
            $linhaFatura->produto_referencia = $carrinho->produto->referencia;
            $linhaFatura->quantidade = $carrinho->Quantidade;
            $linhaFatura->valor = $carrinho->produto->preco * $carrinho->Quantidade;
            $ivaP = $carrinho->produto->iva->percentagem;
            $linhaFatura->valorIva = $carrinho->Quantidade * $carrinho->produto->preco * ($ivaP / 100);
            $linhaFatura->save();

            $stocks = Stock::find()->where(["id_produto" => $carrinho->produto->id])->all();

            foreach ($stocks as $stock) {
                if ($stock->quantidade > 0) {
                    $carrinho->Quantidade <= $stock->quantidade ? $stock->quantidade -= $carrinho->Quantidade : $stock->quantidade -= $stock->quantidade;
                    $stock->save();
                }
            }
        }
        $this->actionClear();
        return "Compra efetuada com sucesso";
    }

    public function actionClear()
    {
        $carrinhos = Carrinho::findAll(['id_Cliente' => Yii::$app->params['id']]);
        foreach ($carrinhos as $carrinho) {
            $carrinho->delete();
        }
        return "Carrinho limpo";
    }
}