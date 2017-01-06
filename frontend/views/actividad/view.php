<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Actividad */
?>
<div class="actividad-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Nombre',
            'Lugar',
            'Fecha_inicio',
            'Fecha_fin',
            'Id_actividad',
            'CedulaCoordi',
        ],
    ]) ?>

</div>
