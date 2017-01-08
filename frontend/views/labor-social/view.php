<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */
?>
<div class="labor-social-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_labor_social',
            'Cedula',
            'Id_actividad',
            'N_horas',
        ],
    ]) ?>

</div>
