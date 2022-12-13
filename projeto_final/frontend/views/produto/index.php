<?php

/** @var yii\web\View $this */
/** @var yii\data\Pagination $pages */

use yii\helpers\Url;
use yii\widgets\LinkPager;

$this->title = 'Globaldiga';
?>

<section class="py-5">

    <!-- Paginação -->
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

            <!-- Verificação de não existirem produtos -->
            <?php
            if (sizeof($produtos) == 0) {
                include __DIR__ . '/../layouts/notFound.php';
                return;
            }
            foreach ($produtos as $produto) { ?>
                <div class="col mb-5">
                    <div class="card h-100" style="width: 250px;">
                        <a style="text-decoration: none; color:black; text-align: center;" href="<?= Url::toRoute(["produto/view", "id" => $produto->id]) ?>">
                            <!-- Imagem do Produto -->
                            <img class="card-img-top" style="width:220px;height:220px;" src="/img/<?php echo $produto->imagem ?>" />
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Nome do Produto-->
                                    <h5 class="fw-bolder"><?php echo $produto->nome ?></h5>
                        </a>
                        <!-- Preço do Produto -->
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