<?php

namespace backend\controllers;

<<<<<<< Updated upstream
use app\models\AuthAssignment;
use common\models\Cliente;
=======
<<<<<<< Updated upstream
=======
use app\models\AuthAssignment;
use common\models\Cliente;
use common\models\Fatura;
>>>>>>> Stashed changes
>>>>>>> Stashed changes
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
<<<<<<< Updated upstream
        $nClientes = AuthAssignment::find()->where(["item_name" => "cliente"])->count();
        return $this->render('index', ['nClientes' => $nClientes]);
=======
<<<<<<< Updated upstream
        return $this->render('index');
=======
        $nClientes = AuthAssignment::find()->where(["item_name" => "cliente"])->count();
        $nFaturas = Fatura::find()->count();
        $faturas = Fatura::find()->all();
        $soma = 0;
        foreach ($faturas as $fatura) {
            $soma += $fatura->valorTotal;
        }
        return $this->render('index', ['nClientes' => $nClientes, 'nFaturas' => $nFaturas, 'somaFatura' => $soma]);
>>>>>>> Stashed changes
>>>>>>> Stashed changes
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login() && Yii::$app->user->can('backendLogin')) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
