<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use common\models\Empresa;
use common\models\Categoria;

$this->title = 'Globaldiga';

$empresa = Empresa::findOne(1);

$parentCategories = Categoria::find()->where(["id_CategoriaPai" => null])->all();

//Função recursiva para verificar se a categoria tem filhos
function checkchildren($category)
{
    foreach ($category->categorias as $child) { ?>
        <li><a class="dropdown-item" href="<?= Url::toRoute(['produto/search?category=' . $child->nome]) ?>"><?= $child->nome ?></a></li>
        <ul>
            <?php
            if (sizeof($child->categorias) > 0) {
                checkChildren($child);
            }
            ?>
        </ul>
<?php
    }
}
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<!-- Header -->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>

    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="/css/styles.css" rel="stylesheet" />

</head>

<!-- Body -->

<body class="d-flex flex-column h-100">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container px-4 px-lg-5">
            <!-- Imagem da empresa -->
            <a href="<?= Url::home() ?>">
                <img class="card-img-top mb-5 mb-md-0" src="/img/<?= $empresa->imgLogo ?>" style="width:175px;height:50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown dropright">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Produtos</a>
                        <ul class="dropdown-menu position-absolute rounded-0 border-0 m-0" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="<?= URL::toRoute("produto/search"); ?>">Ver Todos</a>
                            </li>
                            <?php
                            foreach ($parentCategories as $parent) {
                            ?>
                                <li>
                                    <hr class="dropdown-divider" />
                                </li>
                                <li>
                                    <a class="dropdown-item" href="<?= Url::toRoute(['produto/search?category=' . $parent->nome]) ?>"><?= $parent->nome ?></a>
                                </li>
                                <ul>
                                    <?php
                                    foreach ($parent->categorias as $child) { ?>
                                        <li>
                                            <a class="dropdown-item" href="<?= Url::toRoute(['produto/search?category=' . $child->nome]) ?>"><?= $child->nome ?></a>
                                        </li>
                                        <ul>
                                            <?php
                                            checkChildren($child);
                                            ?>
                                        </ul>
                                    <?php
                                    } ?>
                                </ul>
                            <?php
                            } ?>
                        </ul>
                    </li>
                    <!-- Botão das Noticias -->
                    <li class="nav-item">
                        <a class="nav-link" href="<?= Url::toRoute("news/index") ?>" role="button">Notícias</a>
                    </li>
                </ul>

                <!-- Barra de pesquisa -->
                <form action="<?= Url::toRoute(["produto/search"]) ?>" class="d-flex">
                    <input id="searchBar" style="padding:4px;width:25rem;" type="text" placeholder="Search..." name="query">
                    <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                </form>

                <!-- Botões do carrinho -->
                <form action="" class="d-flex">
                    <a class="btn btn-outline-dark" href="<?= Url::toRoute("carrinho/view") ?>">
                        <i class="bi-cart-fill me-1"></i>
                    </a>
                </form>

                <!-- Botões da area reservada -->
                <form action="" class="d-flex">
                    <a class="btn btn-outline-dark" href="<?= Url::toRoute("dados/view") ?>">
                        <i class="bi bi-person"></i>
                    </a>
                </form>

                <!-- Botão de login -->
                <?php
                if (Yii::$app->user->isGuest ? $session = "in" : $session = "out") { ?>
                    <a href="<?= Url::toRoute(["site/log$session"]) ?>">
                        <button type="button" class="btn btn-outline-dark"><?= "Log$session" ?></button>
                    </a>
                <?php
                } ?>
            </div>
        </div>
    </nav>
    <!-- End da Navbar -->

    <!-- Conteudo -->
    <main role="main" class="flex-shrink-0">
        <div class="container">
            <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

</body>

<!-- Footer -->
<footer class=" text-center text-lg-start text-white" style="background-color: #1c2331;">
    <section class="d-flex justify-content-between p-4" style="background-color: #6351ce">
        <!-- Logo da empresa no footer -->
        <div class="me-5">
            <a href="<?= Url::home() ?>">
                <img class="card-img-top mb-5 mb-md-0" src="/img/<?= $empresa->imgLogo ?>" style="width:175px;height:50px;">
            </a>
        </div>
    </section>

    <section>
        <div class="container text-center text-md-start mt-5">
            <div class="row mt-3">

                <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">GlobalDiga</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        GLOBALDIGA Online - Nº1 em Informática em Portugal
                    </p>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h6 class="text-uppercase fw-bold">Useful links</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p>
                        <a href="<?= Url::toRoute(["site/login"]) ?>" class="text-white">Login</a>
                    </p>
                    <p>
                        <a href="<?= Url::toRoute(["site/signup"]) ?>" class="text-white">Registar</a>
                    </p>
                    <p>
                        <a href="https://github.com/RFCarreira33/PSI_PLSI_22-23" class="text-white">GitHub</a>
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold">Contactos</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: #7c4dff; height: 2px" />
                    <p><i class="fas fa-home mr-3"></i> Rua António do Espírito Santo, Nº94, Lt.4, Estr. da Estação A, 2415-408 Leiria</p>
                    <p><i class="fas fa-envelope mr-3"></i> globaldiga@gmail.com</p>
                    <p><i class="fas fa-phone mr-3"></i> 914569234</p>
                    <p><i class="fas fa-print mr-3"></i> 956123054</p>
                </div>

            </div>
        </div>
    </section>

    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2020 Copyright:
        <a class="text-white">
            GlobalDiga.com
        </a>
    </div>

</footer>

<!-- SCRIPTS -->
<script src="/js/scripts.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

</html>