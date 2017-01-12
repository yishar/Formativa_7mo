<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Matricula */
?>
<div class="matricula-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'N_Matricula',
            'Carrera',
            'Nivel',
            'Cedula',
        ],
    ]) ?>

</div>
