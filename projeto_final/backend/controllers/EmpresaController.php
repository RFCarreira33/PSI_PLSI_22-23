<?php

namespace backend\controllers;

use common\models\Empresa;
use backend\models\DadosSearch;
use common\models\Dados;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\UploadedFile;
use common\models\UploadForm;
use DeepCopy\Exception\CloneException;
use Yii;

/**
 * EmpresaController implements the CRUD actions for Empresa model.
 */
class EmpresaController extends Controller
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
                            'roles' => ['admin']
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
     * Displays a single Empresa model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView()
    {
        if (!\Yii::$app->user->can('ReadEmpresa')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        return $this->render('view', [
            'model' => $this->findModel(1),
        ]);
    }

    /** * Updates an existing Empresa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (!\Yii::$app->user->can('UpdateEmpresa')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        $model = $this->findModel($id);
        $lastModel = clone $model;
        $modelUpload = new UploadForm();
        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                //verifies if imglogo was uploaded and if it was, uploads it else, keeps the last one
                $modelUpload->imageFile = UploadedFile::getInstance($model, 'imgLogo');
                if ($modelUpload->imageFile != null) {
                    $modelUpload->upload();
                    $model->imgLogo = $modelUpload->imageFile->name;
                } else {
                    $model->imgLogo = $lastModel->imgLogo;
                }
                //verifies if imgBanner was uploaded and if it was, uploads it else, keeps the last one
                $modelUpload->imageFile = UploadedFile::getInstance($model, 'imgBanner');
                if ($modelUpload->imageFile != null) {
                    $modelUpload->upload();
                    $model->imgBanner = $modelUpload->imageFile->name;
                } else {
                    $model->imgBanner = $lastModel->imgBanner;
                }
                $model->save();
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionRefreshpromocodes() //Sets every used promo code as available
    {
        if (!\Yii::$app->user->can('UpdateEmpresa')) {
            throw new \yii\web\ForbiddenHttpException('Não tem permissão para aceder a esta página.');
        }
        
        Dados::updateAll(["codDesconto" => "Sim"], "codDesconto like 'Não'");
        return $this->redirect(['dados/index', 'role' => 'cliente']);
    }

    protected function findModel($id)
    {
        if (($model = Empresa::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
