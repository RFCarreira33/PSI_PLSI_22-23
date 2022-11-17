<?php

use yii\helpers\Url;
use common\models\Dados;

$username = Dados::find()->where(['id_User' => Yii::$app->user->id])->one();
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= Url::toRoute('site/index') ?>" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">GlobalDiga</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="<?= Url::toRoute(['dados/view', 'id_User' => Dados::findIdentity()]) ?>"
                    class="d-block"><?= $username->nome ?></a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    ['label' => 'Atalhos', 'header' => true],
                    ['label' => 'Criar uma conta', 'url' => ['site/signup'], 'iconStyle' => 'far'],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gestão ', 'header' => true],
                    [
                        'label' => 'Perfis e contas',
                        'items' => [

                            ['label' => 'Clientes',  'icon' => 'far', 'url' => ['/dados/index', 'role' => 'cliente']],
                            ['label' => 'Funcionários',  'icon' => 'far', 'url' => ['/dados/index', 'role' => 'funcionario']],
                            ['label' => 'Administradores',  'icon' => 'far', 'url' => ['/dados/index', 'role' => 'admin']],

                        ]
                    ],
                    ['label' => 'Empresa',  'icon' => 'th', 'url' => ['/empresa/view'], 'target' => '_blank'],
                    ['label' => 'Produtos',  'icon' => 'th', 'url' => ['/produto/index'], 'target' => '_blank'],
                    ['label' => 'Iva',  'icon' => 'th', 'url' => ['/iva/index'], 'target' => '_blank'],
                    ['label' => 'Marcas',  'icon' => 'th', 'url' => ['/marca/index'], 'target' => '_blank'],
                    ['label' => 'Faturas',  'icon' => 'th', 'url' => ['/fatura/index'], 'target' => '_blank'],
                    ['label' => 'Categorias',  'icon' => 'th', 'url' => ['/categoria/index'], 'target' => '_blank'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>