<?php

use common\models\Dados;
use yii\helpers\Url;

$this->title = 'Starter Page';
$this->params['breadcrumbs'] = [['label' => $this->title]];
$username = Dados::find()->where(['id_User' => Yii::$app->user->id])->one();
?>
<div class="col-lg-6">
    <?= \hail812\adminlte\widgets\Alert::widget([
        'type' => 'success',
        'body' => "Bem vindo(a) $username->nome !",
    ]) ?>
</div>

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
            'linkUrl' => Url::toRoute(["dados/index", 'role' => 'cliente']),
        ]) ?>
    </div>
</div>
<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nFaturas,
            'text' => 'Numero de Faturas',
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
            'title' => $nClientes,
            'text' => 'Total de Produtos Registados',
            'icon' => 'fas fa-user-plus',
            'linkText' => 'Ver Clientes',
            'linkUrl' => Url::toRoute(["dados/index", 'role' => 'cliente']),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nClientes,
            'text' => 'Produtos Ativos',
            'icon' => 'fas fa-user-plus',
            'linkText' => 'Ver Clientes',
            'linkUrl' => Url::toRoute(["dados/index", 'role' => 'cliente']),
        ]) ?>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <?= \hail812\adminlte\widgets\SmallBox::widget([
            'title' => $nClientes,
            'text' => 'Numero de Marcas',
            'icon' => 'fas fa-user-plus',
            'linkText' => 'Ver Clientes',
            'linkUrl' => Url::toRoute(["dados/index", 'role' => 'cliente']),
        ]) ?>
    </div>