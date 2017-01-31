<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Certificados */
?>
<div class="certificados-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_certificado',
            'matricula',
            'file_certificado',
        ],
    ]) ?>

</div>
