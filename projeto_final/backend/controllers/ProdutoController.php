<?php

namespace backend\controllers;

use common\models\Produto;
use backend\models\ProdutoSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use common\models\Stock;
use common\models\Loja;
use yii\web\UploadedFile;
use common\models\UploadForm;
use Dompdf\Dompdf;
use Dompdf\Options;
use Yii;

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
                'access' => [
                    'class' => AccessControl::class,
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['admin', 'funcionario']
                        ],
                    ],
                ],
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
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('ReadProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $searchModel = new ProdutoSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPrint($id)
    {
        $produto = $this->findModel($id);

        //convert to pdf
        $options = new Options();
        $options->setIsRemoteEnabled(true);
        $dompdf = new Dompdf($options);
        $dompdf->loadHtml($this->renderPartial('print', [
            'produto' => $produto,
        ]));
        $dompdf->render();
        ob_end_clean();
        $dompdf->stream(
            "QR_Nº$produto->id.pdf",
            [
                'Attachment' => false,
                'chroot' => Yii::getAlias('@webroot'),
            ]
        );
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imagem');
            if ($model->upload()) {
                return;
            }
        }

        return $this->goHome();
    }

    /**
     * Displays a single Produto model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('ReadProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $produto = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $produto->getStocks(),
        ]);
        return $this->render('view', [
            'model' => $produto,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Creates a new Produto model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('CreateProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = new Produto();
        $modelUpload = new UploadForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                //verifies if the iva is active
                if ($model->iva->Ativo == 0) {
                    throw new yii\web\HttpException(400, 'Taxa de IVA inativa.');
                }
                $modelUpload->imageFile = UploadedFile::getInstance($model, 'imagem');
                $modelUpload->upload();
                $model->imagem = $modelUpload->imageFile->name;
                $model->save();
                $lojas = Loja::find()->all();
                foreach ($lojas as $loja) {
                    $stock = new Stock();
                    $stock->id_Produto = $model->id;
                    $stock->id_Loja = $loja->id;
                    $stock->quantidade = 0;
                    $stock->save();
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
            'modelUpload' => $modelUpload
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
        if (!\Yii::$app->user->can('UpdateProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = $this->findModel($id);
        $modelUpload = new UploadForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                //verifies if the iva is active
                if ($model->iva->Ativo == 0) {
                    throw new yii\web\HttpException(400, 'Taxa de IVA inativa.');
                }
                $modelUpload->imageFile = UploadedFile::getInstance($model, 'imagem');
                $modelUpload->upload();
                $model->imagem = $modelUpload->imageFile->name;
                $model->save();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'modelUpload' => $modelUpload
        ]);
    }

    /**
     * Deactivates an existing Produto model.
     * And deletes existing Carrinhos.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionChange($id)
    {
        if (!\Yii::$app->user->can('DeactivateProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = $this->findModel($id);
        switch ($model->Ativo) {
            case 1:
                $carrinhos = $model->carrinhos;
                foreach ($carrinhos as $carrinho) {
                    $carrinho->delete();
                }
                $model->Ativo = 0;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
                break;

            case 0:
                $model->Ativo = 1;
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
                break;
        }
    }

    /**
     * Deletes an existing Produto model.
     * And deletes existing Carrinhos and Stocks.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if (!\Yii::$app->user->can('DeleteProduto')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = $this->findModel($id);
        $carrinhos = $model->carrinhos;
        $stocks = $model->stocks;

        foreach ($stocks as $stock) {
            $stock->delete();
        }

        foreach ($carrinhos as $carrinho) {
            $carrinho->delete();
        }

        $model->delete();
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
}
