<?php

use yii\widgets\LinkPager;
?>
<br>
<?php
if (sizeof($news) == 0)  include __DIR__ . '/../layouts/notFound.php';
foreach ($news as $new) { ?>
    <div class="modal-content">
        <div class="text-center">
            <br>
            <h4 class="row-domain" style="line-height: 0.8rem"><?= $new->source_id ?></h4>
            <p><span class="row-author"><em style="font-weight: 300;">Escrito por </em><?= implode($new->creator) ?></span></p>
        </div>
        <div class="modal-body px-5 pb-3">
            <div class="">
                <div class="">

                    <span class="text-center"><?= date('d-m-Y H:i', strtotime($new->pubDate)) ?></span>
                    <br>
                    <h2 class="row-title" style="margin-bottom:0.8rem"><?= $new->title ?></h2>
                    <p class="row-desc"><?= $new->description ?></p>
                </div>
            </div>
            <div class="text-center">
                <span class=text-center> <a style="text-decoration:none;font-weight:bold;color:black;" href="<?= $new->link ?>" target="_blank">Continuar a ler</a></span>
            </div>
        </div>
    </div>
    <br>
<?php } ?>

<?php
echo LinkPager::widget([
    'pagination' => $pages,
    'hideOnSinglePage' => true,
    'maxButtonCount' => 5,
    'disableCurrentPageButton' => true,
    'firstPageLabel' => true,
    'lastPageLabel' => true
]);
?>