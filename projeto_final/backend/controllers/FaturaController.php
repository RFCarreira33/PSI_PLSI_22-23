<?php

namespace backend\controllers;

use common\models\Fatura;
use backend\models\FaturaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;
use yii\filters\AccessControl;
use Dompdf\Dompdf;

/**
 * FaturaController implements the CRUD actions for Fatura model.
 */
class FaturaController extends Controller
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
     * Lists all Fatura models.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!\Yii::$app->user->can('ReadFatura')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $searchModel = new FaturaSearch();
        //needs to be done this way because of datetime in DB if we rly want to use the search model
        $params = $this->request->queryParams;
        $query = Fatura::find();
        if (isset($params['FaturaSearch']['dataFatura'])) {
            $query->andFilterWhere(['like', 'dataFatura', $params['FaturaSearch']['dataFatura']]);
        }
        if (isset($params['FaturaSearch']['nome'])) {
            $query->andFilterWhere(['like', 'nome', $params['FaturaSearch']['nome']]);
        }
        if (isset($params['FaturaSearch']['nif'])) {
            $query->andFilterWhere(['like', 'nif', $params['FaturaSearch']['nif']]);
        }
        if (isset($params['FaturaSearch']['email'])) {
            $query->andFilterWhere(['like', 'email', $params['FaturaSearch']['email']]);
        }
        if (isset($params['FaturaSearch']['valorTotal'])) {
            $query->andFilterWhere(['like', 'valorTotal', $params['FaturaSearch']['valorTotal']]);
        }
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionPdf($id)
    {
        $model = $this->findModel($id);
        //convert to pdf
        $dompdf = new Dompdf();
        $dompdf->loadHtml($this->renderPartial('print', [
            'model' => $model,
        ]));
        $dompdf->render();
        ob_end_clean();
        $dompdf->stream(
            "Fatura_Nº$model->id.pdf",
            [
                "Attachment" => false
            ]
        );
    }

    /**
     * Displays a single Fatura model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        if (!\Yii::$app->user->can('ReadFatura')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $fatura = $this->findModel($id);
        $dataProvider = new ActiveDataProvider([
            'query' => $fatura->getLinhafaturas(),
        ]);
        return $this->render('view', [
            'model' => $fatura,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Finds the Fatura model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Fatura the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Fatura::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
