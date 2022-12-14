<?php

use yii\helpers\Url;
use chillerlan\QRCode\QRCode;

$this->title = 'Globaldiga';
?>

<img src="<?= (new QRCode)->render($produto->referencia) ?>" style="height:600px;width:600px;" />