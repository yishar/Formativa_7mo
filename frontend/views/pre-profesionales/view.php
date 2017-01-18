<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\PreProfesionales */
?>
<div class="pre-profesionales-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_pre_profesionales',
            'N_Matricula',
            'Id_empresa',
            'N_Horas',
        ],
    ]) ?>

</div>
