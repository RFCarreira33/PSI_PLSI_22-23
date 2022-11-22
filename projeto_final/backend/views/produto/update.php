<?php

use yii\helpers\Html;
use common\models\Marca;
use common\models\Iva;
use common\models\Categoria;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Produto $model */

$this->title = 'Atualizar: ' . $model->nome;
$this->params['breadcrumbs'][] = ['label' => 'Produtos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nome, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Atualizar';
?>
<div class="produto-update">
    <?= $this->render('_form', [
        'model' => $model,
        'modelUpload' => $modelUpload
    ]) ?>

</div>