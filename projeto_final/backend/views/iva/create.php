<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = 'Criar Taxa de Iva';
$this->params['breadcrumbs'][] = ['label' => 'Taxas de Iva', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="iva-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>