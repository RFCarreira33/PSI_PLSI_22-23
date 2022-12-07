<?php

use common\models\Dados;
use yii\helpers\Url;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
$username = Dados::find()->where(['id_User' => Yii::$app->user->id])->one();
?>
<?php if (Yii::$app->session->getFlash('error') !== null) { ?>
<div class="col-lg-6">
    <?= \hail812\adminlte\widgets\Alert::widget([
            'type' => 'danger',
            'body' => Yii::$app->session->getFlash('error'),
        ]) ?>
</div>
<?php } ?>
<?php if (Yii::$app->session->getFlash('success') !== null) { ?>
<div class="col-lg-6">
    <?= \hail812\adminlte\widgets\Alert::widget([
            'type' => 'success',
            'body' => "Bem vindo(a) $username->nome !",
        ]) ?>
</div>
<?php } ?>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nClientes,
            'text' => 'Clientes Registados',
            'icon' => 'fas fa-user-plus',
            'linkText' => 'Ver Clientes',
            'linkUrl' => Url::toRoute(["dados/index", 'role' => 'cliente']),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nClientes,
            'text' => 'Funcionários Registados',
            'icon' => 'fas fa-user-plus',
            'linkText' => 'Ver Clientes',
            'linkUrl' => Url::toRoute(["dados/index", 'role' => 'funcionario']),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nFaturas,
            'text' => 'Número de Faturas',
            'icon' => 'far fa-copy',
            'linkText' => 'Ver Faturas',
            'linkUrl' => Url::toRoute(["fatura/index"])
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $somaFatura . '€',
            'text' => 'Total Faturado',
            'icon' => 'far fa-copy',
            'linkText' => 'Ver Faturas',
            'linkUrl' => Url::toRoute(["fatura/index"])
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nProdutos,
            'text' => 'Total de Produtos Registados',
            'icon' => 'fas fa-tag',
            'linkText' => 'Ver Produtos',
            'linkUrl' => Url::toRoute(["produto/index"]),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nProdutosAtivos,
            'text' => 'Produtos Ativos',
            'icon' => 'fas fa-tag',
            'linkText' => 'Ver Produtos',
            'linkUrl' => Url::toRoute(["produto/index"]),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nLojas,
            'text' => 'Número de Lojas',
            'icon' => 'fas fa-home',
            'linkText' => 'Ver Lojas e Stocks',
            'linkUrl' => Url::toRoute(["stock/index"]),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nCategorias,
            'text' => 'Número de Categorias',
            'icon' => 'fas fa-industry',
            'linkText' => 'Ver Categorias',
            'linkUrl' => Url::toRoute(["categoria/index"]),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nMarcas,
            'text' => 'Número de Marcas',
            'icon' => 'fas fa-industry',
            'linkText' => 'Ver Marcas',
            'linkUrl' => Url::toRoute(["marca/index"]),
        ]) ?>
    </div>