<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Marca $model */

$this->title = 'Atualizar a Marca: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Marcas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'nome' => $model->nome]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="marca-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>