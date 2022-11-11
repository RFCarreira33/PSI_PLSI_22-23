<?php

namespace frontend\controllers;

use common\models\Produto;
use common\models\Categoria;
use common\models\ProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;

/**
 * ProdutoController implements the CRUD actions for Produto model.
 */
class ProdutoController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    public function actionCategory($category)
    {
        //Gets category and it's children (if they exist), search for every product related with one of the categories and returns
        $parentCategory = Categoria::find()->select("id")->where(["nome" => $category]);
        $childCategories = Categoria::find()->select("id")->where(["id_categoriaPai" => $parentCategory])->column();
        
        foreach($childCategories as $child)
        {
            while(sizeof(Categoria::find()->select("id")->where(["id_categoriaPai" => $child])->column()) != 0)
            {
                foreach(Categoria::find()->select("id")->where(["id_categoriaPai" => $child])->column() as $child)
                {
                    $childCategories[] = $child;
                }
            }
        }

        $produtos = Produto::find()->where(["id_Categoria" => $parentCategory])->orWhere(["id_Categoria" => $childCategories]);

        $countQuery = clone $produtos;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2]);
        $models = $produtos->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', ['produtos' => $models, 'pages' => $pages]);
    }

    public function actionSearch($query)
    {
        $produtos = Produto::find()->where(['like', 'nome', '%' . $query . '%', false])->orWhere(['like', 'referencia', '%' . $query . '%', false]);

        $countQuery = clone $produtos;
        $pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 2]);
        $models = $produtos->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return $this->render('index', ['produtos' => $models, 'pages' => $pages]);
    }

    /**
     * Displays a single Produto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $produto = $this->findModel($id);
        /* It's a query to find all products with the same category as the current product. */
        $relatedProducts = Produto::find()->where(["id_Categoria" => $produto->id_Categoria])->andWhere(["<>", "id", $produto->id])->limit(4)->all();
        
        return $this->render('view', [
            'produto' => $produto,
            'relatedProducts' => $relatedProducts
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Produto();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Produto model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Produto model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Produto model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Produto the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Produto::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function getRelatedProducts($category)
    {
        $relatedProducts = array();
    }
}
