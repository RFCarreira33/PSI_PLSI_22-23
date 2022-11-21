<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Empresa;

/** @var yii\web\View $this */
/** @var common\models\Empresa $model */

$this->title = $model->designacaoSocial;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">


    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'designacaoSocial' => [
                'label' => 'Designação Social',
                'attribute' => 'designacaoSocial',
                'value' => function (Empresa $model) {
                    return $model->designacaoSocial;
                }
            ],
            'email:email',
            'telefone',
            'nif',
            'morada',
            'codPostal' => [
                'label' => 'Código Postal',
                'attribute' => 'codPostal',
                'value' => function (Empresa $model) {
                    return $model->codPostal;
                }
            ],
            'localidade',
            'capitalSocial',
            'imgLogo',
            'imgBanner'
        ],
    ]) ?>

</div>