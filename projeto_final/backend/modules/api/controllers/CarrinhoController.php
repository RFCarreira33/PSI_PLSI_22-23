<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use backend\modules\api\components\CustomAuth;
use common\models\Carrinho;
use common\models\Produto;
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
        ];
        return $verbs;
    }

    public function actions()
    {
        $actions = parent::actions();
        //no use
        unset($actions['update']);
        unset($actions['delete']);
        //unset to override
        unset($actions['create']);
        unset($actions['index']);
        unset($actions['view']);
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
}