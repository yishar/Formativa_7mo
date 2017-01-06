<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */
?>
<div class="labor-social-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Cedula',
            'Id_actividad',
            'CedulaCoordi',
            'N_horas',
        ],
    ]) ?>

</div>
