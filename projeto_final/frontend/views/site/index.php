<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<!-- Section-->
<header>
    <br>
    <br>
    <div class="text-center text-white">
        <img id="bannerImg" src="../img/<?= $empresa->imgBanner ?>" style="width:1300px;height:300px;">
    </div>
</header>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($produtos as $produto) { ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <a id="produtoDetails<?= $produto->id ?>" style="text-decoration: none;color:black;"
                        href="<?= Url::toRoute(["produto/view", "id" => $produto->id]) ?>">
                        <img class="card-img-top" style="width:220px;height:220px;"
                            src="/img/<?php echo $produto->imagem ?>" alt="..." />
                        <!-- Product details-->
                        <div class="card-body p-4">
                            <div class="text-center">
                                <!-- Product name-->
                                <h5 class="fw-bolder"><?php echo $produto->nome ?></h5>
                    </a>
                    <!-- Product price-->
                    <?php echo $produto->preco ?>€
                    <br>
                    <br>
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

<section class="py-5">
    <h3>Novas Notícias</h3>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php foreach ($news as $new) { ?>
            <div class="col mb-5">
                <div class="card h-100">
                    <div class="card-body p-4">
                        <?= $new->source_id ?>
                        <div class="text-center">
                            <br>
                            <h5 class="text-body"><?= $new->title ?></h5>
                            <br>
                        </div>
                    </div>
                    <span class=text-center> <a style="text-decoration:none;font-weight:bold;color:black;"
                            href="<?= $new->link ?>" target="_blank">Continuar a ler</a></span>
                    <br>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</section>