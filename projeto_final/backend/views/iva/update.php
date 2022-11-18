<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Iva $model */

$this->title = "Atualizar taxa de Iva de $model->percentagem%";
$this->params['breadcrumbs'][] = ['label' => 'Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => "Taxa de $model->percentagem%", 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="iva-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>