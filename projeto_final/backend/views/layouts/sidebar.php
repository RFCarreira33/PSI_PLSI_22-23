<?php

use yii\helpers\Url;
use common\models\Dados;
use backend\models\AuthAssignment;

$username = Dados::find()->where(['id_User' => Yii::$app->user->id])->one();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::toRoute('site/index') ?>" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GlobalDiga</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/img/admin.png">
            </div>
            <div class="info">
                <a href="<?= Url::toRoute(['dados/view', 'id_User' => Dados::findIdentity()]) ?>" class="d-block"><?= $username->nome ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            $admin = AuthAssignment::isAdmin();

            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Gestão ', 'header' => true],
                    ['label' => 'Vendas',  'icon' => 'th', 'url' => ['/fatura/index']],
                    ['label' => 'Stocks',  'icon' => 'th', 'url' => ['/stock/index']],
                    ['label' => 'Produtos',  'icon' => 'th', 'url' => ['/produto/index']],
                    ['label' => 'Marcas',  'icon' => 'th', 'url' => ['/marca/index']],
                    ['label' => 'Categorias',  'icon' => 'th', 'url' => ['/categoria/index']],
                    ['label' => 'Taxas de Iva',  'icon' => 'th', 'url' => ['/iva/index']],
                    ['label' => 'Lojas',  'icon' => 'th', 'url' => ['/loja/index'], 'visible' => $admin],
                    ['label' => 'Empresa',  'icon' => 'th', 'url' => ['/empresa/view'], 'visible' => $admin],
                    ['label' => 'Atalhos', 'header' => true],
                    ['label' => 'Criar uma conta', 'url' => ['site/signup']],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => 'Perfis e contas', 'iconStyle' => 'fa fa-users',
                        'items' => [

                            ['label' => 'Clientes',  'iconStyle' => 'far', 'url' => ['/dados/index', 'role' => 'cliente']],
                            ['label' => 'Funcionários',  'iconStyle' => 'far', 'url' => ['/dados/index', 'role' => 'funcionario']],
                            ['label' => 'Administradores',  'iconStyle' => 'far', 'url' => ['/dados/index', 'role' => 'admin'], 'visible' => $admin],

                        ]
                    ],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>