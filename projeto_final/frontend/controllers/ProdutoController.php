<?php

namespace frontend\controllers;

use \Yii;
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

    public function actionSearch() /* It's a function to get the parameters from the URL. */
    {
        $query = array();
        $params = array();
        $categories = array();
        $selectedCategories = array();
        $brands = array();

        $stocksFilter = "";
        $sort = ["nome", "asc"];
        $search = "";

        $query = explode('&', Yii::$app->request->getQueryString());
        
        foreach($query as $param)
        {
            if(count(explode('=', $param)) > 1)
            {
                list($name, $value) = explode('=', $param, 2);
                $params[$name] = $value;

                if($name == "category")
                {
                    $selectedCategories = array_filter(explode('-', $value)); //Clears empty values
                }
                if($name == "brand")
                {
                    $brands = array_filter(explode('-', $value)); //Clears empty values
                }
                if($name == "stock")
                {
                    $stocks = array_filter(explode('-', $value, 2)); //Clears empty values
                    foreach($stocks as $stock)
                    {
                        if($stock == "em_stock")
                        {
                            $stocksFilter .= ">";
                        }
                        else if($stock == "sem_stock")
                        {
                            $stocksFilter .= "=";
                        }
                        else
                        {
                            $stocksFilter .= "";
                        }
                    }
                }
                if($name == "sort")
                {
                    if(count(explode('-', $param)) > 1)
                    {
                        $sort = array_filter(explode('-', $value, 2)); //Clears empty values
                        
                        $table = Yii::$app->db->schema->getTableSchema('Produto');
                        if (!isset($table->columns[$sort[0]])) 
                        {
                            $sort[0] = "nome";
                        }

                        switch($sort[1])
                        {
                            case 'asc': $sort[1] = SORT_ASC; break;
                            case 'desc': $sort[1] = SORT_DESC; break;
                            default: $sort[1] = SORT_ASC; break;
                        }
                    }
                }
                if($name == "query")
                {
                    $search = $value;
                }
            }
        }
        
        //Corrects $stocksFilter incorrect expressions
        switch ($stocksFilter) 
        {
            case '': 
            case '=>': $stocksFilter = ">="; break;
            case '>>': $stocksFilter = ">"; break;
            case '==': $stocksFilter = "="; break;
            default: break;
        }

        //Gets category and its children, search for every product related with one of the categories and returns     
        foreach($selectedCategories as $category)
        {
            $parentCategory = Categoria::find()->select("id")->where(["nome" => $category]);
            $childCategories = Categoria::find()->select("id")->where(["id_categoriaPai" => $parentCategory])->column();    
            $categories = array_merge($categories, $parentCategory->column());
            
            foreach($childCategories as $child)
            {
                $categories[] = $child;

                while(sizeof(Categoria::find()->select("id")->where(["id_categoriaPai" => $child])->column()) != 0)
                {
                    foreach(Categoria::find()->select("id")->where(["id_categoriaPai" => $child])->column() as $child)
                    {
                        $categories[] = $child;
                    }
                }
            }
        }

        $produtos = Produto::find()->innerJoin("stock", "stock.id_Produto = produto.id")
                                   ->filterWhere(['like', 'nome', '%' . $search . '%', false])->orFilterWhere(['like', 'referencia', '%' . $search . '%', false])
                                   ->andfilterWhere(["id_Categoria" => $categories])->andFilterWhere(["id_marca" => $brands])->andWhere(["ativo" => "1"])->groupBy("produto.id")->having("sum(quantidade) ". $stocksFilter . " 0")
                                   ->orderBy([$sort[0] => $sort[1]]);
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
