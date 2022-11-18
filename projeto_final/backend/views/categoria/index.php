<?php

use common\models\Categoria;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var backend\models\CategoriaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <p>
        <?= Html::a('Criar Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo $this->render('_search', ['model' => $searchModel]);
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_CategoriaPai' => [
                'label' => 'Categoria Pai',
                'attribute' => 'id_CategoriaPai',
                'value' => function (Categoria $model) {
                    if ($model->id_CategoriaPai == null) {
                        return 'Nenhuma';
                    }
                    return $model->categoriaPai->nome;
                }
            ],
            'nome',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Categoria $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>


</div>