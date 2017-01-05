<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="labor-social-search">

    <?php $form = ActiveForm::begin([
        'action' => ['create'],
        'method' => 'get',
    ]); ?>

    <?php // echo $form->field($model, 'Id_actividad') ?>

    <?= $form->field($model, 'Cedula') ?>

    <?php //echo $form->field($model, 'CedulaCoordi') ?>

    <?php //echo $form->field($model, 'N_horas') ?>

    <div class="form-group">
        <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
        <?php // echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
