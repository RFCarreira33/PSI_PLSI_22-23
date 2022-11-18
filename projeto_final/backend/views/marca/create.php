<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Marca $model */

$this->title = 'Criar Marca';
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>