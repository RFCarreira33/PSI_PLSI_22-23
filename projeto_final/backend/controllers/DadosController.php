<?php

namespace backend\controllers;

use backend\models\AuthAssignment;
use common\models\dados;
use backend\models\DadosSearch;
use common\models\User;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * DadosController implements the CRUD actions for Dados model.
 */
class DadosController extends Controller
{

    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
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
     * Lists all dados models.
     *
     * @return string
     */
    public function actionIndex($role)
    {
        if ($role == 'admin' && !Yii::$app->user->can('CreateAdmin')) {
            return $this->goHome();
        }
        $ids = AuthAssignment::getIds($role);
        $dataProvider = new ActiveDataProvider([
            'query' => dados::find()->where(['id_user' => $ids]),
        ]);

        switch ($role) {
            case 'admin':
                $role = 'Administradores';
                break;
            case 'funcionario':
                $role = 'Funcionários';
                break;
            default:
                $role = 'Clientes';
        }
        $searchModel = new DadosSearch();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'role' => $role,
        ]);
    }

    /**
     * Displays a single dados model.
     * @param int $id_User Id User
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_User)
    {
        if ($id_User != Yii::$app->user->id) {
            $role = AuthAssignment::find()->where(['user_id' => $id_User])->one();
            $role = $role->item_name;
            if (!Yii::$app->user->can('SuperiorRole', ['role' => $role])) {
                return $this->goHome();
            }
        }
        return $this->render('view', [
            'model' => $this->findModel($id_User),
            'status' => User::findIdentity($id_User)
        ]);
    }


    /**
     * Updates an existing dados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_User Id User
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_User)
    {
        if (!Yii::$app->user->can('SuperiorRole', ['role' => AuthAssignment::findOne(['user_id' => $id_User])->item_name])) {
            return $this->goHome();
        }
        $model = $this->findModel($id_User);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_User' => $model->id_User]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing dados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_User Id User
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
    public function actionDelete($id_User)
    {
        $this->findModel($id_User)->delete();

        return $this->redirect(['index']);
    }

     */
    public function actionChange($id_User)
    {
        try {

            if (Yii::$app->user->id == $id_User) {
                throw new \Exception('Não pode alterar o seu próprio estado');
            }

            $role = AuthAssignment::find()->where(['user_id' => $id_User])->one();
            $role = $role->item_name;

            if (!Yii::$app->user->can('SuperiorRole', ['role' => $role])) {
                throw new \Exception('Não pode alterar o estado de um utilizador com um cargo superior');
            }
            $user = User::findOne(['id' => $id_User]);
            $user->status == self::STATUS_ACTIVE ? $user->status = self::STATUS_DELETED : $user->status = self::STATUS_ACTIVE;
            $user->save();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', $e->getMessage());
            return $this->goHome();
        }
        return $this->redirect(['dados/view', 'id_User' => $id_User]);
    }

    /**
     * Finds the dados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_User Id User
     * @return dados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_User)
    {
        if (($model = dados::findOne(['id_User' => $id_User])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}