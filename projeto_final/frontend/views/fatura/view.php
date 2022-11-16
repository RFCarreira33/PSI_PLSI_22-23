<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var common\models\Fatura $model */
?>
<hr>
<div>
    <div>
        <h5>Cliente</h5>
        <br>
        <p>Nome: <?= $model->nome ?></p>
        <p>NIF: <?= $model->nif ?></p>
        <p>Telefone: <?= $model->telefone ?></p>
        <p><?= $model->morada ?> <?= $model->codPostal ?></p>
        <p>Email: <?= $model->email ?></p>
    </div>
</div>
<div>
    <table class="table">
        <thead>
            <th>Referencia</th>
            <th>Descrição</th>
            <th>Quantidade</th>
            <th>Valor Uni.</th>
            <th>IVA %</th>
            <th>IVA</th>
            <th>Subtotal</th>
        </thead>
        <tbody>
            <?php foreach ($model->linhafaturas as $linha) { ?>
                <tr>
                    <td><?= $linha->produto->referencia ?></td>
                    <td><?= $linha->produto->descricao ?></td>
                    <td><?= $linha->quantidade ?></td>
                    <td><?= $linha->produto->preco ?>€</td>
                    <td><?= $linha->produto->iva->percentagem ?>%</td>
                    <td><?= $linha->valorIva ?>€</td>
                    <td><?= $linha->quantidade * $linha->valor ?>€</td>
                </tr>
            <?php } ?>
        </tbody>
        <tfooter>
            <td><b>Total</b></td>
            <td><?= $model->valorTotal ?>€</td>
        </tfooter>
    </table>
</div>
<hr>