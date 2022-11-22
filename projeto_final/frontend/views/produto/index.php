<?php

/** @var yii\web\View $this */

use yii\helpers\Url;
use yii\bootstrap5\Html;
use yii\widgets\LinkPager;

$this->title = 'My Yii Application';
?>
<!-- Section--> 
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php 
                if(sizeof($produtos) == 0)  include __DIR__ . '/../layouts/notFound.php';
                foreach ($produtos as $produto) { ?>
                <div class="col mb-5">
                    <div class="card h-100">
                        <!-- Product image-->
                        <a style="text-decoration: none;color:black;" href="<?= Url::toRoute(["produto/view", "id" => $produto->id]) ?>">
                            <img class="card-img-top" src="/img/<?php echo $produto->imagem ?>" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo $produto->nome ?></h5>
                        </a>
                        <!-- Product price-->
                        <?php echo $produto->preco ?>€
                    </div>
                </div>
        </div>
    </div>
<?php } ?>
</div>
</div>
</section>

<?php
    echo LinkPager::widget([
        'pagination' => $pages,
        'hideOnSinglePage' => true,
        'maxButtonCount' => 5,
        'disableCurrentPageButton' => true,
        'firstPageLabel' => true,
        'lastPageLabel' => true
    ]);

    include __DIR__ . '/../layouts/filters.php';
?>