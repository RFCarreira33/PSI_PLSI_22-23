<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Empresa $model */

$this->title = $model->designacaoSocial;
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="empresa-view">


    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'designacaoSocial',
            'email:email',
            'telefone',
            'nif',
            'morada',
            'codPostal',
            'localidade',
            'capitalSocial',
            'imgBanner',
            'imgLogo',
        ],
    ]) ?>

</div>