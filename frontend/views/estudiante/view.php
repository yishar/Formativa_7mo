<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiante */
?>
<div class="estudiante-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Cedula',
            'Nombre',
            'Apellido',
        ],
    ]) ?>

</div>
