<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Loja;

/** @var yii\web\View $this */
/** @var common\models\Loja $model */

$this->title = $model->localidade;
$this->params['breadcrumbs'][] = ['label' => 'Lojas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="loja-view">

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php if (Yii::$app->user->can('DeleteLoja'))
            echo Html::a('Apagar', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Tem a certeza que quer apagar esta loja?',
                    'method' => 'post',
                ],
            ]) ?>
    </p>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_Empresa' => [
                'label' => 'Empresa',
                'attribute' => 'id_Empresa',
                'label' => 'Empresa',
                'value' => function (Loja $model) {
                    return $model->empresa->designacaoSocial;
                }
            ],
            'localidade',
            'longitude',
            'latitude',
        ],
    ]) ?>

</div>