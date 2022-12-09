<?php

use Sabberworm\CSS\Value\URL as ValueURL;
use yii\helpers\Url;

?>

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
                                        $stock = $carrinho->produto->getStockTotal();
                                    ?>
                                        <hr class="my-4">
                                        <div class="row mb-4 d-flex justify-content-between align-items-center">
                                            <div class="col-md-2 col-lg-2 col-xl-2">
                                                <img src="/img/<?= $carrinho->produto->imagem ?>" class="img-fluid rounded-3">
                                            </div>
                                            <div class="col-md-3 col-lg-3 col-xl-3">
                                                <a href="<?= Url::toRoute(['produto/view', 'id' => $carrinho->produto->id]) ?>" style="text-decoration:none">
                                                    <h6 class="text-muted"><?= $carrinho->produto->nome ?></h6>
                                                </a>
                                                <?php
                                                if ($stock == 0) {
                                                    echo '<p name="stockInfo" data-product="' . $carrinho->produto->id . '" class="text-danger">Produto esgotado</p>';
                                                } else if ($stock < $carrinho->Quantidade) {
                                                    echo '<p name="stockInfo" data-product="' . $carrinho->produto->id . '" class="text-warning">Apenas ' . $stock . ' unidades em stock</p>';
                                                } else {
                                                    echo '<p name="stockInfo" data-product="' . $carrinho->produto->id . '" class="text-success">Em stock</p>';
                                                }

                                                ?>
                                            </div>

                                            <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                                <button style="padding: 6px 15px;" class="btn btn-outline-dark" data-product="<?= $carrinho->produto->id ?>" onclick="changeQuantity(this, -1)">-</button>
                                                <input style="max-width:4em;text-align:center;" data-product="<?= $carrinho->produto->id ?>" type="number" name="quantityInput" value="<?= $carrinho->Quantidade ?>">
                                                <button class="btn btn-outline-dark" data-product="<?= $carrinho->produto->id ?>" onclick="changeQuantity(this, 1)">+</button>
                                            </div>

                                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                <h6 data-product="<?= $carrinho->produto->id ?>" name="price" class="mb-0">
                                                    <?= $carrinho->produto->preco *  $carrinho->Quantidade ?>€</h6>
                                            </div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                                <a data-method="POST" style='text-decoration:none ' href="<?= Url::toRoute(["carrinho/delete", 'id_Produto' => $carrinho->id_Produto]) ?>">
                                                    <button class="btn btn-outline-danger">
                                                        X</button>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <hr class="my-4">
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a data-method="POST" class="text-body" href="<?= Url::toRoute("carrinho/clear") ?>">Limpar Carrinho</a></h6>
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
                                        <h5 id="totalProducts" class=""> Número de Artigos: <?php $total = 0;
                                                                                            foreach ($carrinhos as $carrinho) {
                                                                                                $total += $carrinho->Quantidade;
                                                                                            }
                                                                                            echo $total ?>
                                        </h5>
                                    </div>

                                    <h5 class="mb-3">Código de Desconto</h5>

                                    <div class="mb-5">
                                        <div class="form-outline">
                                            <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                                        </div>
                                    </div>

                                    <hr class="my-4">

                                    <div class="d-flex justify-content-between mb-5">
                                        <h5 class="text-uppercase">Total</h5>
                                        <h5 id="totalPrice"><?= number_format($precoTotal, 2, '.', '') ?>€</h5>
                                    </div>
                                    <?php
                                    if (!empty($carrinhos)) {
                                    ?>
                                        <a data-method="POST" class="btn btn-dark btn-block btn-lg" href="<?= Url::toRoute("fatura/create") ?>">Comprar</a></h6>
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

<script>
    function changeQuantity(el, value) {
        var input = el.parentNode.querySelector("input[name='quantityInput']");
        var newValue = parseInt(input.value) + value;

        if (newValue > 20) {
            newValue = 20;
            alert("Não foi possível adicionar o produto. O máximo disponível é 20.")
        }
        if (newValue < 1) {
            newValue = 1;
            alert("Introduza uma quantidade superior a zero.")
        }

        input.value = newValue;

        callAjax(input.value, input.getAttribute("data-product"), );
    }

    var quantityInputs = document.getElementsByName("quantityInput");

    quantityInputs.forEach(function(input) {
        input.addEventListener('input', function(e) {
            if (e.srcElement.value > 20) {
                e.srcElement.value = 20;
                alert("Não foi possível adicionar o produto. O máximo disponível é 20.")
            }
            if (e.srcElement.value < 1) {
                e.srcElement.value = 1;
                alert("Introduza uma quantidade superior a zero.")
            }

            callAjax(e.srcElement.value, input.getAttribute("data-product"));
        })
    })

    function callAjax(value, product) {
        if (isNaN(value) || value == "") {
            return;
        }

        $.ajax({
            url: "<?= Url::toRoute("carrinho/changequantity") ?>",
            type: "post",
            data: {
                value: value,
                id_Produto: product
            },
            success: (result) => {
                result = JSON.parse(result);
                var stockInfoElement = $(`p[name='stockInfo'][data-product=${product}]`);

                $(`h6[name='price'][data-product=${product}]`).text(result.total + "€");

                if (result.stock > 0 && value > result.stock) {
                    stockInfoElement.removeClass("text-success");
                    stockInfoElement.addClass("text-warning");
                    stockInfoElement.text(`Apenas ${result.stock} unidades em stock`);
                } else if (result.stock > 0 && value <= result.stock) {
                    stockInfoElement.removeClass("text-warning");
                    stockInfoElement.addClass("text-success");
                    stockInfoElement.text("Em stock");
                }

                $("#totalProducts").text("Número de Artigos: " + result.totalProducts);
                $("#totalPrice").text(result.totalPrice + "€");
            }
        });
    }
</script>