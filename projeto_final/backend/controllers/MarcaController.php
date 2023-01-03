<?php

namespace backend\controllers;

use common\models\Marca;
use backend\models\MarcaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\data\ActiveDataProvider;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use PhpMqtt\Client\MqttClient;
use Yii;

/**
 * MarcaController implements the CRUD actions for Marca model.
 */
class MarcaController extends Controller
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
     * Lists all Marca models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('ReadMarca')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $searchModel = new MarcaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single Marca model.
     * @param string $nome Nome
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($nome)
    {

        if (!\Yii::$app->user->can('ReadMarca')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $marca = $this->findModel($nome);
        $dataProvider = new ActiveDataProvider([
            'query' => $marca->getProdutos(),
        ]);
        return $this->render('view', [
            'model' => $marca,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Creates a new Marca model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        if (!\Yii::$app->user->can('CreateMarca')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = new Marca();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'nome' => $model->nome]);
            }
        } else {
            $model->loadDefaultValues();
        }

        $this->Mqtt();
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionDelete($nome)
    {
        if (!\Yii::$app->user->can('DeleteMarca')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }

        $marca = $this->findModel($nome);

        if ($marca->canDelete()) {
            $this->Mqtt();
            $marca->delete();
            return $this->redirect(['index']);
        }
        throw new \yii\web\HttpException(400, 'Não é possível eliminar a marca, pois existem produtos associados.');
    }
    /**
     * Finds the Marca model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $nome Nome
     * @return Marca the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($nome)
    {
        if (($model = Marca::findOne(['nome' => $nome])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    protected function Mqtt()
    {
        try {
            $mqtt = new MqttClient('127.0.0.1', 1883, 'Android');
            $mqtt->connect();
            $mqtt->publish('filters', 'update', 1);
            $mqtt->disconnect();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', 'Erro ao comunicar com o servidor MQTT');
        }
    }
}
