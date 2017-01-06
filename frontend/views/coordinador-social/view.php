<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\CoordinadorSocial */
?>
<div class="coordinador-social-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'CedulaCoordi',
            'Nombre',
            'Apellido',
        ],
    ]) ?>

</div>
