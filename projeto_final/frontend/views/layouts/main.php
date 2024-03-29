<?php

/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\helpers\Url;
use common\models\Empresa;
use common\models\Categoria;

$empresa = Empresa::findOne(1);
$this->title = $empresa->designacaoSocial;

$parentCategories = Categoria::find()->where(["id_CategoriaPai" => null])->all();

?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100" style="height:100%">

<!-- Header -->

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="<?php echo Yii::$app->request->baseUrl; ?>/img/<?= $empresa->favIcon ?>" type="image/x-icon" />
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/alertify.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/AlertifyJS/1.13.1/css/themes/default.min.css" />

    <link href="/css/styles.css" rel="stylesheet" />
</head>

<!-- Body -->

<body class="d-flex flex-column h-100" style="display: flex;flex-direction:column">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" style="background-color: #222;">
        <div class=" container px-4 px-lg-5">
            <!-- Imagem da empresa -->
            <a href="<?= Url::home() ?>">
                <img class="card-img-top mb-5 mb-md-0" src="/img/<?= $empresa->imgLogo ?>" style="width:175px;height:50px;">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                    <li class="nav-item dropdown dropright">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">Produtos</a>
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
                                            Categoria::checkChildren($child);
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
                        <a class="nav-link" href="<?= Url::toRoute("news/index") ?>" role="button" style="color:white">Notícias</a>
                    </li>
                </ul>

                <!-- Barra de pesquisa -->
                <form action="<?= Url::toRoute(["produto/search"]) ?>" class="d-flex">
                    <input id="searchBar" style="padding:4px;width:25rem;margin-right:10px" type="text" placeholder="Escreve aqui o que procuras..." name="query">
                    <button style="border:2px solid white;margin-right:10px" class="btn btn-outline-dark" type="submit"><i class="bi bi-search" style="color:white"></i></button>
                </form>
                <br>

                <!-- Botões do carrinho -->
                <a id="carrinho" style="border:2px solid white;margin-right:10px" class="btn btn-outline-dark" href="<?= Url::toRoute("carrinho/view") ?>">
                    <i class="bi-cart-fill me-1" style="color: white;"></i>
                </a>

                <!-- Botões da area reservada -->
                <a id="dados" style="border:2px solid white;margin-right:10px;" class="btn btn-outline-dark" href="<?= Url::toRoute("dados/view") ?>">
                    <i class="bi bi-person" style="color:white"></i>
                </a>

                <!-- Botão de login -->
                <?php
                if (Yii::$app->user->isGuest ? $session = "in" : $session = "out") { ?>
                    <a href="<?= Url::toRoute(["site/log$session"]) ?>">
                        <button type="button" class="btn btn-outline-dark" style="color: white;border:2px solid white"><?= "Log$session" ?></button>
                    </a>
                <?php
                } ?>
            </div>
        </div>
    </nav>
    <!-- End da Navbar -->

    <!-- Conteudo -->
    <main role="main" class="flex-shrink-0" style="flex: 1 0 auto;">

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
<footer class=" text-center text-lg-start text-white" style="background-color: #222;">
    <section class="d-flex justify-content-between p-4" style="background-color: #555;">
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
                    <h6 class="text-uppercase fw-bold"><?= $empresa->designacaoSocial ?></h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: white; height: 2px" />
                    <p>
                        <?= $empresa->designacaoSocial ?> - Nº1 em Informática em Portugal
                    </p>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <h6 class="text-uppercase fw-bold">Contactos</h6>
                    <hr class="mb-4 mt-0 d-inline-block mx-auto" style="width: 60px; background-color: white; height: 2px" />
                    <p><i class="fa fa-home mr-3"></i> <?= $empresa->morada ?></p>
                    <p><i class="fa fa-envelope mr-3"></i> <?= $empresa->email ?></p>
                    <p><i class="fa fa-phone mr-3"></i> <?= $empresa->telefone ?></p>
                </div>
            </div>
        </div>
    </section>


    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
        © 2022 Copyright:
        <a style="color:white">
            <?= $empresa->designacaoSocial ?>
        </a>
    </div>

</footer>

</html>