<?php

namespace backend\modules\api\controllers;

use yii\rest\ActiveController;
use yii\data\ActiveDataProvider;
use common\models\Produto;
use common\models\Categoria;
use Yii;

class ProdutoController extends ActiveController
{
    public $modelClass = 'common\models\Produto';

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
        return $actions;
    }

    protected function verbs()
    {
        $verbs = parent::verbs();
        $verbs =  [
            'index' => ['GET'],
            'view' => ['GET'],
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

    public function actionView()
    {
        $produto = Produto::find()->where(['Ativo' => 1, 'id' => Yii::$app->request->get('id')])->one();
        $response = [
            'produto' => $produto,
            'stock' => $produto->hasStock(),
        ];

        return $response;
    }


    //Filters by category 
    public function actionCategory($categoria)
    {
        $query = Produto::find()->where(['Ativo' => 1])->select('id, nome, preco, imagem');
        try {
            $categoria = Categoria::find()->where(['Nome' => $categoria])->one();
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
        } catch (\Exception $e) {
            return 'Categoria não encontrada';
        }
        $activeData = new ActiveDataProvider([
            //filters produto by Ativo and categoria and marca
            'query' => $query,
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
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
            return 'Categoria não encontrada';
        }

        $activeData = new ActiveDataProvider([
            'query' => $query,
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }
}