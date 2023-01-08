<?php

use yii\bootstrap4\LinkPager as Bootstrap4LinkPager;

?>
<br>
<?php
if (empty($news)) { ?>
    <section class="py-5">
        <div class="container px-4 px-lg-5 mt-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <div class="col mb-5">
                    <div class="card h-100">
                        <div class="card-body p-4">
                            <div class="text-center">
                                <h5 class="text-body">Não foi possível obter notícias</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php } else {
    foreach ($news as $new) { ?>
        <div class="modal-content">
            <div class="text-center">
                <br>
                <!-- Fonte da notícia -->
                <h4 class="row-domain" style="line-height: 0.8rem"><?= $new->source_id ?></h4>
                <!-- Escritor da notícia -->
                <p><span class="row-author"><em style="font-weight: 300;">Escrito por </em><?= implode($new->creator) ?></span></p>
            </div>
            <div class="modal-body px-5 pb-3">
                <div class="">
                    <div class="">
                        <!-- Data da notícia -->
                        <span class="text-center"><?= date('d-m-Y H:i', strtotime($new->pubDate)) ?></span>
                        <br>
                        <!-- Título da notícia -->
                        <h2 class="row-title" style="margin-bottom:0.8rem"><?= $new->title ?></h2>
                        <!-- Descrição da notícia -->
                        <p class="row-desc"><?= $new->description ?></p>
                    </div>
                </div>
                <div class="text-center">
                    <!-- Link da notícia -->
                    <span class=text-center> <a style="text-decoration:none;font-weight:bold;color:black;" href="<?= $new->link ?>" target="_blank">Continuar a ler</a></span>
                </div>
            </div>
        </div>
        <br>
<?php }
} ?>

<?php
echo Bootstrap4LinkPager::widget([
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