<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Empresa */
?>
<div class="empresa-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Nombre',
            'Direccion',
            'Telefono',
            'Gerente',
            'Nombre_contacto',
            'Apellido_contacto',
            'Cargo_contacto',
            'Telefono_contacto',
            'Id_empresa',
        ],
    ]) ?>

</div>
