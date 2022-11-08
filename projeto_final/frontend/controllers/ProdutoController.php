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

    /**
     * Lists all Produto models.
     *
     * @return string
     */
    public function actionIndex($category)
    {
        //Gets category and it's children (if they exist), search for every product related with one of the categories and returns
        $parentCategory = Categoria::find()->select("id")->where(["nome" => $category]);
        $childCategories = Categoria::find()->select("id")->where(["id_CategoriaPai" => $parentCategory])->column();
        $i = sizeof($childCategories);
        
        foreach($childCategories as $child)
        {
            while(sizeof(Categoria::find()->select("id")->where(["id_CategoriaPai" => $child])->column()) != 0)
            {
                foreach(Categoria::find()->select("id")->where(["id_CategoriaPai" => $child])->column() as $child)
                {
                    $childCategories[] = $child;
                    $i = sizeof($childCategories);
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
