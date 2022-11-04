<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= $assetDir ?>/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= $assetDir ?>/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Alexander Pierce</a>
            </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- href be escaped -->
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <?php
            echo \hail812\adminlte\widgets\Menu::widget([
                'items' => [
                    [
                        'label' => 'Starter Pages',
                        'icon' => 'tachometer-alt',
                        'badge' => '<span class="right badge badge-info">2</span>',
                        'items' => [
                            ['label' => 'Active Page', 'url' => ['site/index'], 'iconStyle' => 'far'],
                            ['label' => 'Inactive Page', 'iconStyle' => 'far'],
                            ['label' => 'Criar uma conta', 'url' => ['site/signup'], 'iconStyle' => 'far'],
                            ['label' => 'Criar uma conta', 'url' => ['site/signup'], 'iconStyle' => 'far'],

                        ]
                    ],
                    ['label' => 'Simple Link', 'icon' => 'th', 'badge' => '<span class="right badge badge-danger">New</span>'],
                    ['label' => 'Yii2 PROVIDED', 'header' => true],
                    ['label' => 'Login', 'url' => ['site/login'], 'icon' => 'sign-in-alt', 'visible' => Yii::$app->user->isGuest],
                    ['label' => 'Gii',  'icon' => 'file-code', 'url' => ['/gii'], 'target' => '_blank'],
                    ['label' => 'Debug', 'icon' => 'bug', 'url' => ['/debug'], 'target' => '_blank'],
                    ['label' => 'MULTI LEVEL EXAMPLE', 'header' => true],
                    ['label' => 'Empresa',  'icon' => 'th', 'url' => ['/empresa/index'], 'target' => '_blank'],
                    ['label' => 'Clientes',  'icon' => 'th', 'url' => ['/cliente/index'], 'target' => '_blank'],
                    ['label' => 'Produtos',  'icon' => 'th', 'url' => ['/produto/index'], 'target' => '_blank'],
                    ['label' => 'Iva',  'icon' => 'th', 'url' => ['/iva/index'], 'target' => '_blank'],
                    ['label' => 'Faturas',  'icon' => 'th', 'url' => ['/fatura/index'], 'target' => '_blank'],
                    ['label' => 'Categorias',  'icon' => 'th', 'url' => ['/categoria/index'], 'target' => '_blank'],
                    ['label' => 'Cliente', 'iconStyle' => 'far'],
                    [
                        'label' => 'Cliente',
                        'items' => [
                            [
                                'label' => 'Listar Clientes', 'icon' => 'th',
                                'label' => 'Atualizar Cliente', 'icon' => 'th'
                            ]

                        ]
                    ],
                    ['label' => 'Level1'],
                ],
            ]);
            ?>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>