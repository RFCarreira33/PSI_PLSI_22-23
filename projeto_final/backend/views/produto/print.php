<?php

use yii\helpers\Url;
use chillerlan\QRCode\QRCode;

$this->title = 'Globaldiga';
?>

<img src="<?= (new QRCode)->render($produto->id) ?>" style="height:600px;width:600px;" />