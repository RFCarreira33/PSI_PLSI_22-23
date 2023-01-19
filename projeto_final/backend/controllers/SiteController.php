<?php

namespace backend\controllers;

use common\models\Fatura;
use backend\models\AuthAssignment;
use common\models\LoginForm;
use common\models\User;
use backend\models\SignupForm;
use common\models\Categoria;
use common\models\Produto;
use common\models\Loja;
use common\models\Marca;
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
                'only' => ['login', 'logout', 'index', 'signup'],
                'rules' => [
                    [
                        'actions' => ['login'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['index', 'signup'],
                        'allow' => true,
                        'roles' => ['admin', 'funcionario'],
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [],
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
                'class' => 'yii\web\ErrorAction',
                'view' => '@app/views/site/error.php',
                'layout' => '@app/views/layouts/no_layout.php'
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
        return $this->render('index', [
            'nClientes' => AuthAssignment::getCountClientes(),
            'nFuncionarios' => AuthAssignment::getCountFuncionarios(),
            'nProdutos' => Produto::getCountProdutos(),
            'nMarcas' => Marca::getCountMarcas(),
            'nLojas' => Loja::getCountLojas(),
            'nCategorias' => Categoria::getCountCategorias(),
            //graph data
            'graphFaturado' => Fatura::getTotalFaturadoGraph(),
            'graphNFaturas' => Fatura::getTotalFaturasGraph(),
            'graphProdutosMaisVendidos' => Produto::graphMaisVendidos(),
        ]);
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
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (AuthAssignment::isCliente()) {
                return $this->redirect('logout');
            }
            Yii::$app->session->setFlash('success', 'Bem-vindo ');
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->goHome();
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionHome()
    {
        $this->goHome();
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
