<?php

use yii\helpers\BaseUrl;
use yii\helpers\Url;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="/css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Product section-->
    <section class="py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="row gx-4 gx-lg-5 align-items-center">
                <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/img/<?= $produto->imagem ?>" /></div>
                <div class="col-md-6">
                    <div class="small mb-1">REF: <?= $produto->referencia ?></div>
                    <h1 class="display-5 fw-bolder"><?= $produto->nome ?></h1>
                    <div class="fs-5 mb-5">
                        <span><?= $produto->preco ?>€</span>
                    </div>
                    <p class="lead"><?= $produto->descricao ?></p>
                    <?php
                    $esgotado = true;
                    //Verificar se o produto está esgotado
                    foreach ($produto->stocks as $stock) {
                        if ($stock->quantidade > 0) {
                            $esgotado = false;
                        }
                    }
                    if ($esgotado) {
                        echo "<h6 style='color:red'>Esgotado</h6>";
                    } else { ?>
                    <br>
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                            style="max-width: 3rem" />
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <div style="padding-top:10px" class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="<?= Url::toRoute(["carrinho/create", "id" => $produto->id, "quantidade" => 1]) ?>">
                                    Adicionar ao carrinho<i class="bi-cart-fill me-1"></i>
                                </a></div>
                        </div>
                    </div>
                    <br>
                    <div>
                        <p>Disponibilidade por Loja:</p>
                        <?php
                        foreach ($produto->stocks as $stock) {
                            if ($stock->quantidade > 0) {
                                echo $stock->loja->localidade . " <span style='color:green'><b>Em Stock</b></span><br>";
                            } else {
                                echo $stock->loja->localidade . " <span style='color:red'><b>Esgotado</b></span>";
                            }
                        }
                    }
                        ?>
                    </div>
                </div>
            </div>
    </section>
    <!-- Related items section-->
    <section class="py-5 bg-light">
        <div class="container px-4 px-lg-5 mt-5">
            <?php

            if (count($relatedProducts) > 0) {  ?>
            <h2 class="fw-bolder mb-4">Produtos Relacionados</h2> <?php } ?>
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                foreach ($relatedProducts as $produto) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <a style="text-decoration: none;color:black;"
                            href="<?= Url::toRoute(["produto/view", "id" => $produto->id]) ?>">
                            <!-- Product image-->
                            <img class="card-img-top" style="width:220px;height:220px;"
                                src="/img/<?= $produto->imagem ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?= $produto->nome ?></h5>
                        </a>
                        <!-- Product price-->
                        <?= $produto->preco ?>€
                        <?php
                            $esgotado = true;
                            foreach ($produto->stocks as $stock) {
                                if ($stock->quantidade > 0) {
                                    $esgotado = false;
                                }
                            }
                            if ($esgotado) {
                                echo "<h6 style='color:red'>Esgotado</h6>";
                            } else {
                                echo "<h6 style='color:green'>Em Stock</h6>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
        </div>
        </div>
    </section>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="/js/scripts.js"></script>
</body>

</html>