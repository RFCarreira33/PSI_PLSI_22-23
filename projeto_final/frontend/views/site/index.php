<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\bootstrap5\Html;

$this->title = 'My Yii Application';
?>
<!-- Section-->
<header>

    <div class="text-center text-white">
        <img src="img/ok.jpg" style="width:1300px;height:300px;">
    </div>

</header>
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $controlo = 4;
            if ($nProdutos < 4) {
                $controlo = $nProdutos;
            }
            for ($i = 0; $i < $controlo; $i++) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a style="text-decoration: none;color:black;" href="<?= Url::toRoute(["produto/view", "id" => $produtos[$i]->id]) ?>">
                            <img class="card-img-top" style="width:220px;height:220px;" src="img/<?php echo $produtos[$i]->imagem ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $produtos[$i]->nome ?></h5>
                        </a>
                        <!-- Product price-->
                        <?php echo $produtos[$i]->preco ?>€


                    </div>
                </div>
        </div>
    </div>
<?php } ?>
</div>
</div>
</section>