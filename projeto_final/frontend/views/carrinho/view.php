<?php

use yii\helpers\Url;

?>
<link href="/css/cart.css" rel="stylesheet" />
<section class="h-100 h-custom">
    <div class="container py-12 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-11">
                <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                    <div class="card-body p-0">
                        <div class="row g-0">
                            <div class="col-lg-8">
                                <div class="p-5">

                                    <!-- Titulo -->
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

                                        <!-- Imagem do Produto no carrinho -->
                                        <div class="col-md-2 col-lg-2 col-xl-2">
                                            <img src="/img/<?= $carrinho->produto->imagem ?>"
                                                class="img-fluid rounded-3">
                                        </div>

                                        <div class="col-md-3 col-lg-3 col-xl-3">

                                            <a href="<?= Url::toRoute(['produto/view', 'id' => $carrinho->produto->id]) ?>"
                                                style="text-decoration:none">
                                                <!-- Nome do Produto no carrinho -->
                                                <h6 class="text-muted"><?= $carrinho->produto->nome ?></h6>
                                            </a>

                                            <!-- Informação de stock do Produto no carrinho -->
                                            <?php
                                                if ($stock == 0) {
                                                    echo '<p name="stockInfo" data-product="' . $carrinho->produto->id . '" class="text-danger">Produto esgotado</p>';
                                                } else if ($stock < $carrinho->Quantidade) {
                                                    echo '<p name="stockInfo" data-product="' . $carrinho->produto->id . '" class="text-warning">Apenas ' . $stock . ' unidades em stock</p>';
                                                } else {
                                                    echo '<p name="stockInfo" data-product="' . $carrinho->produto->id . '" class="text-success">Em stock</p>';
                                                } ?>
                                        </div>

                                        <!-- Quantidade do Produto no carrinho -->
                                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                            <button style="padding: 6px 15px;" class="btn btn-outline-dark"
                                                data-product="<?= $carrinho->produto->id ?>"
                                                onclick="changeQuantity(this, -1)">-</button>
                                            <input style="max-width:4em;text-align:center;"
                                                data-product="<?= $carrinho->produto->id ?>" type="number"
                                                name="quantityInput" value="<?= $carrinho->Quantidade ?>">
                                            <button class="btn btn-outline-dark"
                                                data-product="<?= $carrinho->produto->id ?>"
                                                onclick="changeQuantity(this, 1)">+</button>
                                        </div>

                                        <!-- Preço do Produto no carrinho -->
                                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                            <h6 data-product="<?= $carrinho->produto->id ?>" name="price" class="mb-0">
                                                <?= $carrinho->produto->preco *  $carrinho->Quantidade ?>€</h6>
                                        </div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">

                                        <!-- Botão de remover do Produto no carrinho -->
                                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                                            <a data-method="POST" class="pointer cross" style='text-decoration:none '
                                                onclick="remove('Pretende remover este produto do carrinho?', '<?= Url::toRoute(['carrinho/delete', 'id_Produto' => $carrinho->id_Produto], true) ?>')">
                                                <button class="btn btn-outline-danger">
                                                    <i class="bi bi-x-lg"></i>
                                                </button>
                                            </a>
                                        </div>

                                    </div>
                                    <?php } ?>
                                    <hr class="my-4">

                                    <!-- Limpar Carrinho -->
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a id="clearCart" data-method="POST" class="text-body pointer"
                                                onclick="remove('Pretende limpar o carrinho?', '<?= Url::toRoute('carrinho/clear', true) ?>')">Limpar
                                                Carrinho</a></h6>
                                    </div>
                                    <div class="pt-5">
                                        <h6 class="mb-0"><a href="<?= Url::home() ?>" class="text-body">
                                                <svg width="1em" height="1em" viewBox="0 0 19 8" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M4.249 3.625l2.323-2.266L5.302.125.801 4.5l4.501 4.375 1.27-1.234-2.323-2.266h14.558v-1.75H4.249z"
                                                        fill="currentColor"></path>
                                                </svg>
                                                Voltar à loja
                                            </a></h6>
                                    </div>

                                </div>
                            </div>

                            <div class="col-lg-4 bg-grey">
                                <div class="p-5">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Sumário</h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 id="totalProducts">
                                            Número de Artigos:
                                            <?php $total = 0;
                                            foreach ($carrinhos as $carrinho) {
                                                $total += $carrinho->Quantidade;
                                            }
                                            echo $total ?>
                                        </h5>
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
                                        <h5 id="totalPrice"><?= number_format($precoTotal, 2, '.', '') ?>€</h5>
                                    </div>

                                    <?php
                                    if (!empty($carrinhos)) {
                                    ?>
                                    <a data-method="POST" id="comprar" class="btn btn-dark btn-block btn-lg"
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

<script>
var timer;

function changeQuantity(el, value) {
    var input = el.parentNode.querySelector("input[name='quantityInput']");
    var newValue = parseInt(input.value) + value;
    if (newValue > 20) {
        newValue = 20;
    }
    if (newValue < 1) {
        newValue = 1;
    }

    callAjax(newValue, input.getAttribute("data-product"));
    input.value = newValue;
}

var quantityInputs = document.getElementsByName("quantityInput");

quantityInputs.forEach(function(input) {
    input.addEventListener('input', function(e) {
        clearTimeout(timer);
        timer = setTimeout(function() {
            if (e.srcElement.value > 20) {
                var notification = alertify.notify(
                    "Não foi possível adicionar o produto. O máximo disponível é 20.",
                    'error', 2);
            } else if (e.srcElement.value < 1) {
                var notification = alertify.notify("Introduza uma quantidade superior a zero.",
                    'error', 2);
            } else {
                callAjax(e.srcElement.value, input.getAttribute("data-product"));
            }
        }.bind(this), 500);
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

function remove(message, route) {
    alertify.confirm("", message,
        function() {
            window.location = route;
        },
        function() {});
}
</script>