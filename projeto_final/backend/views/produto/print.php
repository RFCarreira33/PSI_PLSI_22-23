<?php

use yii\helpers\Url;
use chillerlan\QRCode\QRCode;
?>

<img src="<?= (new QRCode)->render($produto->id) ?>" style="height:600px;width:600px;" />