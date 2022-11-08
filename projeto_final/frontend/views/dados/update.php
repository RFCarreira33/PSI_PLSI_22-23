<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Dados $model */

$this->title = 'Update Dados: ' . $model->id_User;
$this->params['breadcrumbs'][] = ['label' => 'Dados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_User, 'url' => ['view', 'id_User' => $model->id_User]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="dados-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>