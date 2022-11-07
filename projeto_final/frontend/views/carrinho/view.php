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
                    <h1 class="fw-bold mb-0 text-black">Carrinho de compras</h1>
                  </div>
                  <?php $precoTotal = 0; ?>
                  <?php foreach ($carrinhos as $carrinho) {
                    $precoTotal += $carrinho->getProduto()->one()->preco * $carrinho->quantidade;
                  ?>
                    <hr class="my-4">

                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <img src="img/<?php echo $carrinho->getProduto()->one()->imagem ?>" class="img-fluid rounded-3" alt="Cotton T-shirt">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <h6 class="text-muted"><?php echo $carrinho->getProduto()->one()->nome ?></h6>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <?php echo $carrinho->quantidade ?>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <h6 class="mb-0"><?php echo $carrinho->getProduto()->one()->preco *  $carrinho->quantidade ?>€</h6>
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                        <a href="#!" class="text-muted"><i class="fas fa-times"></i></a>
                      </div>
                    </div>
                  <?php } ?>
                  <hr class="my-4">

                  <div class="pt-5">
                    <h6 class="mb-0"><a href="<?= Url::toRoute("site/index") ?>" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Voltar a loja</a></h6>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 bg-grey">
                <div class="p-5">
                  <h3 class="fw-bold mb-5 mt-2 pt-1">Summario</h3>
                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-4">
                    <h5 class=""> Numero de Artigos: <?php echo $nItens ?></h5>
                  </div>

                  <h5 class="text-uppercase mb-3">Metodo de entrega</h5>

                  <div class="mb-4 pb-2">
                    <select class="select">
                      <option value="1">Free</option>
                    </select>
                  </div>

                  <h5 class="text-uppercase mb-3">Codigo de Desconto</h5>

                  <div class="mb-5">
                    <div class="form-outline">
                      <input type="text" id="form3Examplea2" class="form-control form-control-lg" />
                    </div>
                  </div>

                  <hr class="my-4">

                  <div class="d-flex justify-content-between mb-5">
                    <h5 class="text-uppercase">Preço Total</h5>
                    <h5><?php echo $precoTotal ?>€</h5>
                  </div>

                  <button type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Comprar</button>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>