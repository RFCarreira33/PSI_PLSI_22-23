<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use common\models\Produto;
use common\models\Categoria;
use common\models\Dados;
use common\models\Loja;
use common\models\Stock;
use Yii;

class ProdutoController extends BaseController
{
    public $modelClass = 'common\models\Produto';

    public function behaviors()
    {
        $behaviors = parent::behaviors();
        return $behaviors;
    }

    public function actions()
    {
        $actions = parent::actions();
        //not use 
        unset($actions['update']);
        unset($actions['delete']);
        unset($actions['create']);
        //unset to override
        unset($actions['index']);
        unset($actions['view']);
        unset($actions['location']);
        return $actions;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET'],
            'view' => ['GET'],
            'search' => ['GET'],
            'location' => ['POST'],
        ];
        return $verbs;
    }

    public function actionIndex()
    {
        $response = [];
        $produtos = Produto::find()->where(['Ativo' => 1])->select('id, nome, preco, imagem')->all();
        foreach ($produtos as $produto) {
            $data = [
                'produto' => $produto,
                'stock' => $produto->hasStock(),
            ];
            $response[] = $data;
        }
        return $response;
    }

    public function actionLocation()
    {
        $dados = Yii::$app->getRequest()->getBodyParams();
        $lojas = Loja::find()->all();
        $produto = Produto::findOne($dados['idProduto']);
        $distanciaLoja = null;
        $lojaPerto = null;

        foreach ($lojas as $loja) {
            $stock = $produto->getStockLoja($loja->id);
            if ($stock > 0) {
                $distancia = $this->distancia($dados['latitude'], $dados['longitude'], $loja->latitude, $loja->longitude);

                if ($distancia < $distanciaLoja || $distanciaLoja == null) {
                    $distanciaLoja = $distancia;
                    $lojaPerto = $loja->localidade;
                }
            }
        }
        return ["response" => $lojaPerto];
    }

    public function distancia($latitude, $longitude, $lat2, $lon2)
    {
        $a = $latitude - $lat2;
        $b = $longitude - $lon2;
        $distancia = sqrt(($a * $a) + ($b * $b));

        return $distancia;
    }

    public function actionView()
    {
        $produto = Produto::find()->where(['Ativo' => 1, 'id' => Yii::$app->request->get('id')])->one();
        if ($produto == null) {
            return 'Produto não encontrado';
        }
        $response = [
            'produto' => $produto,
            'stock' => $produto->hasStock(),
        ];

        return $response;
    }

    public function actionSearch()
    {
        $queryString = Yii::$app->request->getQueryString();
        //query string to array
        parse_str($queryString, $queryArray);
        //default query
        $query = Produto::find()->where(['Ativo' => 1])->select('id, nome, preco, imagem');

        try {
            if (isset($queryArray['categoria'])) {
                //Only parameter that can throw an exception
                $categoria = Categoria::find()->where(['Nome' => $queryArray['categoria']])->one();
                //If its a major category get all the minor categories and their products
                if ($categoria->id_CategoriaPai == null) {
                    $categoriasFilho = Categoria::find()->where(['id_CategoriaPai' => $categoria->id])->all();
                    foreach ($categoriasFilho as $categoriaFilho) {
                        $categoriasFilhoId[] = $categoriaFilho->id;
                    }
                    $query->andWhere(['id_Categoria' => $categoriasFilhoId]);
                } else {
                    //minor category
                    $query->andWhere(['id_Categoria' => $categoria->id]);
                }
            }
            if (isset($queryArray['marca'])) {
                $query->andWhere(['id_Marca' => $queryArray['marca']]);
            }
            if (isset($queryArray['nome'])) {
                $query->andWhere(['like', 'nome', $queryArray['nome']]);
            }
            //verifies if order is valid otherwise orders by name (default)
            if (isset($queryArray['order'])) {
                if ($queryArray['order'] == 'desc' || $queryArray['order'] == 'asc') {
                    $query->orderBy('preco ' . $queryArray['order']);
                }
            } else {
                $query->orderBy('nome ASC');
            }
        } catch (\Exception $e) {
            return ['response' => 'Categoria não encontrada'];
        }

        $response = [];
        $produtos = $query->all();
        foreach ($produtos as $produto) {
            $data = [
                'produto' => $produto,
                'stock' => $produto->hasStock(),
            ];
            $response[] = $data;
        }
        return $response;
    }
}
