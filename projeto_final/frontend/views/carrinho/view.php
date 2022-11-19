<?php

use yii\helpers\Url;
?>

<head>
    <style>
    @media (min-width: 1025px) {
        .h-custom {
            height: 125vh !important;
        }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
        font-size: 1rem;
        line-height: 2.15;
        padding-left: .75em;
        padding-right: .75em;
    }

    .card-registration .select-arrow {
        top: 13px;
    }

    .bg-grey {
        background-color: #eae8e8;
    }

    @media (min-width: 992px) {
        .card-registration-2 .bg-grey {
            border-top-right-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }

    @media (max-width: 991px) {
        .card-registration-2 .bg-grey {
            border-bottom-left-radius: 16px;
            border-bottom-right-radius: 16px;
        }
    }
    </style>
</head>

<section class="h-100 h-custom">
    <div class="container py-12 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-11">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">
                                    <div class="d-flex justify-content-between align-items-center mb-5">
                                        <h1 class="fw-bold mb-0 text-black">Carrinho de Compras</h1>
                                    </div>
                                    <?php
                                    $precoTotal = 0;
                                    foreach ($carrinhos as $carrinho) {
                                        $precoTotal += $carrinho->produto->preco * $carrinho->Quantidade;
                                        $esgotado = true;
                                        foreach ($carrinho->produto->stocks as $stock) {
                                            if ($stock->quantidade > 0) {
                                                $esgotado = false;
                                            }
                                        }
                                    ?>
                                    <hr class="my-4">
                                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/img/<?= $carrinho->produto->imagem ?>"
                                                class="img-fluid rounded-3">
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-3">
                                            <h6 class="text-muted"><?= $carrinho->produto->nome ?></h6>
                                            <?php if ($esgotado) {
                                                    echo '<span class="text-danger">Esgotado</span>';
                                                } else {
                                                    echo '<span class="text-success">Em Stock</span>';
                                                }
                                                ?>
                                        </div>
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <?= $carrinho->Quantidade ?>
                                        </div>
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 class="mb-0">
                                                <?= $carrinho->produto->preco *  $carrinho->Quantidade ?>€</h6>
                                        </div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a data-method="POST" style='text-decoration:none '
                                                href="<?= Url::toRoute(["carrinho/delete", 'id_Produto' => $carrinho->id_Produto]) ?>">
                                                X
                                            </a>
                                        </div>
                                    </div>
                                    <?php } ?>
                                    <hr class="my-4">
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a data-method="POST" class="text-body"
                                                href="<?= Url::toRoute("carrinho/clear") ?>">Limpar Carrinho</a></h6>
                                    </div>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="<?= Url::home() ?>" class="text-body">Voltar a
                                                loja</a></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Sumário</h3>
                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class=""> Número de Artigos: <?= sizeof($carrinhos) ?></h5>
                                    </div>

                                    <h5 class="mb-3">Código de Desconto</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2"
                                                class="form-control form-control-lg" />
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total</h5>
                                        <h5><?= $precoTotal ?>€</h5>
                                    </div>
                                    <?php
                                    if (!empty($carrinhos)) {
                                    ?>
                                    <a data-method="POST" class="btn btn-dark btn-block btn-lg"
                                        href="<?= Url::toRoute("fatura/create") ?>">Comprar</a></h6>
                                    <?php
                                    }
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>