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
            'index' => ['GET', 'POST', 'HEAD'],
            'view' => ['GET', 'HEAD'],
        ];
        return $verbs;
    }

    public function actionIndex()
    {
        $activeData = new ActiveDataProvider([
            // filters produtos dont add ->all() to the end of the query
            'query' => Produto::find()->where(['Ativo' => 1])->select('id, nome, preco, imagem'),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }

    public function actionView()
    {
        $activeData = new ActiveDataProvider([
            //filters produto by Ativo and id
            'query' => Produto::find()->where(['Ativo' => 1, 'id' => Yii::$app->request->get('id')]),
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }


    public function actionCategory($categoria)
    {
        try {
            $categoria = Categoria::find()->where(['Nome' => $categoria])->one()->id;
        } catch (\Exception $e) {
            throw new \yii\web\NotFoundHttpException('Categoria não encontrada');
        }
        $activeData = new ActiveDataProvider([
            //filters produto by Ativo and categoria and marca
            'query' => Produto::find()->where(['Ativo' => 1, 'id_Categoria' => $categoria]),
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
        $query = Produto::find()->where(['Ativo' => 1]);

        try {
            if (isset($queryArray['categoria'])) {
                //Only parameter that can throw an exception
                $categoria = Categoria::find()->where(['Nome' => $queryArray['categoria']])->one()->id;
                $query->andWhere(['id_Categoria' => $categoria]);
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
            throw new \yii\web\NotFoundHttpException('Categoria não encontrada');
        }

        $activeData = new ActiveDataProvider([
            'query' => $query,
            //can add pagination here
            'pagination' => false
        ]);
        return $activeData;
    }
}