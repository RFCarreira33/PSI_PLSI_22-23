<?php

/** @var yii\web\View $this */
/** @var yii\data\Pagination $pages */

use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<!-- Section-->
<section class="py-5">

    <?php
    include __DIR__ . '/../layouts/filters.php';
    echo LinkPager::widget([
        'pagination' => $pages,
        'hideOnSinglePage' => true,
        'maxButtonCount' => 5,
        'nextPageLabel' => false,
        'prevPageLabel' => false,
        'options' => [
            'class' => 'pagination',
        ],
    ]);
    ?>
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            if (sizeof($produtos) == 0) {
                include __DIR__ . '/../layouts/notFound.php';
                return;
            }
            foreach ($produtos as $produto) { ?>
                <div class="col mb-5">
                    <div class="card h-100" style="width: 250px;">
                        <!-- Product image-->
                        <a style="text-decoration: none; color:black; text-align: center;" href="<?= Url::toRoute(["produto/view", "id" => $produto->id]) ?>">
                            <img class="card-img-top" style="width:220px;height:220px;" src="/img/<?php echo $produto->imagem ?>" alt="..." />
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