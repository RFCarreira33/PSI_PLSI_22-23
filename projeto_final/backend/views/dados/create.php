<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

$this->title = 'Create Dados';
$this->params['breadcrumbs'][] = ['label' => 'Dados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dados-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
