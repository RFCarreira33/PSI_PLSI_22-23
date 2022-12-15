<?php

use yii\helpers\Url;
use chillerlan\QRCode\QRCode;

$this->title = 'Globaldiga';
?>

<!-- Detalhes do Produto -->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <!-- Imagem do Produto -->
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/img/<?= $produto->imagem ?>" /></div>
            <div class="col-md-6">
                <!-- Referancia do Produto -->
                <div class="small mb-1">REF: <?= $produto->referencia ?></div>
                <!-- Nome do Produto -->
                <h1 class="display-5 fw-bolder"><?= $produto->nome ?></h1>
                <!-- Preco do Produto -->
                <div class="fs-5 mb-5">
                    <span><?= $produto->preco ?>€</span>
                </div>
                <!-- Descricao do Produto -->
                <p class="lead"><?= $produto->descricao ?></p>

                <!-- Disponibilidade do Produto -->
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

                    <!-- Mostra o botao de adicionar ao carrinho caso exista stock -->
                    <br>
                    <div class="d-flex">
                        <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            <form action="<?= Url::toRoute(["carrinho/create"]) ?>" method="POST">
                                <input type="hidden" name="id" value="<?= $produto->id ?>">
                                <input class=" text-center me-3" style="width:4rem; padding:6px" id="quantidade" type="number" name="quantidade" value=1 max=20 min=1>
                                <button class="btn btn-outline-dark" type="submit">Adicionar ao Carrinho <i class="bi-cart-fill me-1"></i></button>
                            </form>
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

<!-- Produtos Relacionados -->
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
                        <a style="text-decoration: none;color:black;" href="<?= Url::toRoute(["produto/view", "id" => $produto->id]) ?>">
                            <!-- Imagem do Produto -->
                            <img class="card-img-top" style="width:220px;height:220px;" src="/img/<?= $produto->imagem ?>" alt="..." />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Nome do Produto-->
                                    <h5 class="fw-bolder"><?= $produto->nome ?></h5>
                        </a>
                        <!-- Preco do produto -->
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

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/js/scripts.js"></script>