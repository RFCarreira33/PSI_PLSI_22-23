<?php

use yii\helpers\Url;

$precoTotal = 0;
foreach ($carrinhos as $carrinho) {
    $precoTotal += $carrinho->produto->preco * $carrinho->Quantidade;
}

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
                                        <h1 class="fw-bold mb-0 text-black">Finalizar Compra</h1>
                                    </div>
                                    <form action="<?= Url::to(['fatura/create']) ?>" method="post">
                                        <div class="row">
                                            <div class="col card" style="color:#000">
                                                <div class="card-header">
                                                    <div class="icons">
                                                        Cartão de Crédito / Débito
                                                        <img src="https://i.imgur.com/2ISgYja.png" width="30">
                                                        <img src="https://i.imgur.com/W1vtnOV.png" width="30">
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <div class="input">
                                                        <i class="fa fa-user"></i>
                                                        <span class="font-weight-normal card-text">Nome</span>
                                                        <input type="text" class="form-control" placeholder="Nome" name="nome" required>
                                                    </div>

                                                    <div class="input mt-1 mb-1">
                                                        <i class="fa fa-credit-card"></i>
                                                        <span class="font-weight-normal card-text">Número do
                                                            Cartão</span>
                                                        <input maxlength="16" pattern="[0-9]{16}" inputmode="numeric" class="form-control" placeholder="0000 0000 0000 0000" name="numero" required>
                                                    </div>

                                                    <div class="row mt-1 mb-1">
                                                        <div class="col-md-6">
                                                            <div class="input">
                                                                <i class="fa fa-calendar"></i>
                                                                <span class="font-weight-normal card-text">Data
                                                                    Validade</span>
                                                                <div class="row" style="--bs-gutter-x: 0.1rem;">
                                                                    <div class="col">
                                                                        <input maxlength="2" pattern="^(0?[1-9]|1[012])$" inputmode="numeric" name="MM" class="form-control" placeholder="MM" required>
                                                                    </div>
                                                                    <div class="col">
                                                                        <input maxlength="2" pattern="[01-99]{2}" inputmode="numeric" class="form-control" placeholder="YY" name="YY" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="input">
                                                                <i class="fa fa-lock"></i>
                                                                <span class="font-weight-normal card-text">CVV</span>
                                                                <input maxlength="3" pattern="[0-9]{3}" type="text" inputmode="numeric" class="form-control" placeholder="000" name="CVV" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col card" style="color:#000">
                                                <div class="card-header">
                                                    <div class="icons">
                                                        Entrega
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <div class="mb-1">
                                                        <div class="input">
                                                            <input type="radio" name="shipping" id="loja" value="Loja" required>
                                                            <i class="fa fa-store"></i>
                                                            <span class="font-weight-normal card-text">Levantamento em
                                                                Loja</span>
                                                        </div>
                                                    </div>

                                                    <div class="mt-1">
                                                        <div class="input">
                                                            <input type="radio" name="shipping" id="casa" value="Morada" required>
                                                            <i class="fa fa-house"></i>
                                                            <span class="font-weight-normal card-text">Entrega ao
                                                                Domicílio</span>
                                                            <input id="morada" name="morada" type="text" class="form-control" placeholder="Morada" value="<?= $morada ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="row pt-5">
                                            <h6 class="col"><a href="<?= Url::home() ?>" class="text-body">
                                                    <svg width="1em" height="1em" viewBox="0 0 19 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M4.249 3.625l2.323-2.266L5.302.125.801 4.5l4.501 4.375 1.27-1.234-2.323-2.266h14.558v-1.75H4.249z" fill="currentColor"></path>
                                                    </svg>
                                                    Voltar à loja
                                                </a></h6>
                                            <button id="comprar" class="col btn btn-dark btn-block btn-lg" style="background-color:white;color:black" type="submit">Finalizar
                                                Compra</button>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="col-lg-4 bg-grey" style="background-color: #222;">
                                <div class="p-5" style="color:white">
                                    <h3 class="fw-bold mb-5 mt-2 pt-1">Sumário</h3>
                                    <hr class="my-4">
                                    <div class="d-flex justify-content-between mb-4">
                                    </div>

                                    <div class="mb-1">
                                        <div class="form-outline">
                                            <form action="<?= Url::to(['fatura/create']) ?>" method="post">
                                                <h5 id="totalProducts">
                                                    Número de Artigos:
                                                    <?php $total = 0;
                                                    foreach ($carrinhos as $carrinho) {
                                                        $total += $carrinho->Quantidade;
                                                    }
                                                    echo $total ?>
                                                </h5>
                                                <div class="d-flex justify-content-between">
                                                    <h6 class="text-uppercase">Subtotal</h5>
                                                        <h6 id="subtotalPrice" data-subtotal="<?= number_format($precoTotal, 2, '.', '') ?>">
                                                            <?= number_format($precoTotal, 2, '.', '') ?>€</h5>
                                                </div>
                                                <div class="d-flex justify-content-between mb-3">
                                                    <h6 class="text-uppercase">Desconto</h5>
                                                        <h6 id="discount">-<?= number_format($desconto, 2, '.', '') ?>€
                                                            </h5>
                                                </div>
                                                <div class="d-flex justify-content-between mb-2">
                                                    <h5 class="text-uppercase">Total</h5>
                                                    <h5 id="totalPrice">
                                                        <?= number_format($precoTotal - $desconto, 2, '.', '') ?>€
                                                    </h5>
                                                </div>
                                                <div class="scroll" style="height: 25em;padding: 3%">
                                                    <?php
                                                    foreach ($carrinhos as $carrinho) {
                                                    ?>
                                                        <hr class="my-1">
                                                        <div style="background-color: #fff; color:#000;">
                                                            <div class="row mb-1 d-flex justify-content-between align-items-center">

                                                                <!-- Imagem do Produto no carrinho -->
                                                                <div class="col-md-2">
                                                                    <img src="/img/<?= $carrinho->produto->imagem ?>" class="img-fluid rounded-3">
                                                                </div>

                                                                <div class="col">
                                                                    <a href="<?= Url::toRoute(['produto/view', 'id' => $carrinho->produto->id]) ?>" style="text-decoration:none">
                                                                        <!-- Nome do Produto no carrinho -->
                                                                        <?php $name = $carrinho->produto->nome;
                                                                        if ($name > 20) {
                                                                            $name = substr($name, 0, 15) . "...";
                                                                        }
                                                                        ?>
                                                                        <h6 class="text-muted"><?= $name ?></h6>
                                                                    </a>
                                                                </div>

                                                                <?= $carrinho->Quantidade ?>

                                                                <!-- Preço do Produto no carrinho -->
                                                                <div class="col-md offset-lg-1">
                                                                    <h6 data-product="<?= $carrinho->produto->id ?>" name="price" class="mb-0">
                                                                        <?= $carrinho->produto->preco *  $carrinho->Quantidade ?>€
                                                                    </h6>
                                                                </div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                                            </div>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </div>
                                            </form>
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
    //disable radios
    var check = $("#loja");
    var check2 = $("#casa");

    $("#loja").on('click', checkStatus);
    $("#casa").on('click', checkStatus);

    function checkStatus() {
        check.is(':checked') ? $("#morada").prop('disabled', true) : $("#morada").prop('disabled', false);
    }

    var timer;

    $("input:radio[name='shipping']").click(function(e) {
        applyShippingMethod(this.value);
    });

    $("#morada").on('input', function() {
        clearTimeout(timer);
        timer = setTimeout(function() {
                if ($("input:radio[value=Morada]").is(':checked')) {
                    applyShippingMethod($("#morada").val());
                }
            }
            .bind(this), 500);
    })

    function applyShippingMethod(shippingMethod) {
        if (shippingMethod == "Morada") {
            shippingMethod = $("#morada").val();
        }

        $.ajax({
            url: "<?= Url::toRoute("carrinho/applyshippingmethod") ?>",
            type: "post",
            data: {
                shippingMethod: shippingMethod
            },
            success: (result) => {
                result = JSON.parse(result);
                console.log(result);
            }
        });
    }

    applyShippingMethod($("input:radio:checked").val());
</script>