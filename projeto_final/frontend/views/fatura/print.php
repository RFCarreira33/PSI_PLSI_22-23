<?php

use common\models\Empresa;

/** @var yii\web\View $this */
/** @var common\models\Fatura $model */

$empresa = Empresa::findOne(1);
?>

<head>
    <style>
    body {
        background: #eee;
        margin-top: 20px;
    }

    .text-danger strong {
        color: #9f181c;
    }

    .receipt-main {
        background: #ffffff none repeat scroll 0 0;
        border-bottom: 12px solid #333333;
        border-top: 12px solid #9f181c;
        margin-top: 50px;
        margin-bottom: 50px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #acacac;
        color: #333333;
        font-family: open sans;
    }

    .receipt-main p {
        color: #333333;
        font-family: open sans;
        line-height: 1.42857;
    }

    .receipt-footer h1 {
        font-size: 15px;
        font-weight: 400 !important;
        margin: 0 !important;
    }

    .receipt-main::after {
        background: #414143 none repeat scroll 0 0;
        content: "";
        height: 5px;
        left: 0;
        position: absolute;
        right: 0;
        top: -13px;
    }

    .receipt-main thead {
        background: #414143 none repeat scroll 0 0;
    }

    .receipt-main thead th {
        color: #fff;
    }

    .receipt-right h5 {
        font-size: 16px;
        font-weight: bold;
        margin: 0 0 7px 0;
    }

    .receipt-right p {
        font-size: 12px;
        margin: 0px;
    }

    .receipt-right p i {
        text-align: center;
        width: 18px;
    }

    .receipt-main td {
        padding: 9px 20px !important;
    }

    .receipt-main th {
        padding: 13px 20px !important;
    }

    .receipt-main td {
        font-size: 13px;
        font-weight: initial !important;
    }

    .receipt-main td p:last-child {
        margin: 0;
        padding: 0;
    }

    .receipt-main td h2 {
        font-size: 20px;
        font-weight: 900;
        margin: 0;
        text-transform: uppercase;
    }

    .receipt-header-mid .receipt-left h1 {
        font-weight: 100;
        margin: 34px 0 0;
        text-align: right;
        text-transform: uppercase;
    }

    .receipt-header-mid {
        margin: 24px 0;
        overflow: hidden;
    }

    #container {
        background-color: #dcdcdc;
    }
    </style>
</head>
<div class="col-md-12">
    <div class="row">

        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
                <div class="receipt-header">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <div class="receipt-left">
                            <img class="img-responsive" alt="Globaldiga" src="/img/logo.png"
                                style="width:175px;height:50px;">
                        </div>
                    </div>
                    <br>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div class="receipt-right">
                            <h5><?= $empresa->designacaoSocial ?></h5>
                            <p><?= $empresa->telefone ?> <i class="fa fa-phone"></i></p>
                            <p><?= $empresa->email ?> <i class="fa fa-envelope-o"></i></p>
                            <p><?= $empresa->localidade ?> <i class="fa fa-location-arrow"></i></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <h5><?= $model->nome ?></h5>
                            <p><b>Telefone:</b><?= $model->telefone ?></p>
                            <p><b>Email :</b> <?= $model->email ?></p>
                            <p><b>Morada :</b> <?= $model->morada ?> <?= $model->codPostal ?></p>
                            <p><b>NIF :</b> <?= $model->nif ?></p>
                        </div>
                    </div>
                </div>
            </div>

            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Referencia</th>
                            <th>Nome</th>
                            <th>Quantidade</th>
                            <th>Valor Uni.</th>
                            <th>IVA</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($model->linhafaturas as $linha) { ?>
                        <tr>
                            <td><?= $linha->produto_referencia ?></td>
                            <td><?= $linha->produto_nome ?></td>
                            <td><?= $linha->quantidade ?></td>
                            <td><?= round($linha->valor / $linha->quantidade, 2) ?>€</td>
                            <td><?= $linha->valorIva ?>€</td>
                            <td><?= $linha->valor ?>€</td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <br>
                    <b>Total:</b>
                    <?= $model->valorTotal ?>€
                </div>
            </div>

            <div class="row">
                <div class="receipt-header receipt-header-mid receipt-footer">
                    <div class="col-xs-8 col-sm-8 col-md-8 text-left">
                        <div class="receipt-right">
                            <p><b><?= $model->dataFatura ?></p>
                            <br>
                            <h5 style="color: rgb(140, 140, 140);">Obrigado Pela Compra!</h5>
                        </div>
                    </div>
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="receipt-left">
                            <h1>Globaldiga</h1>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>