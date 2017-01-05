<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ActividadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['create'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'Nombre') ?>

    <?php // $form->field($model, 'Lugar') ?>

    <?php // $form->field($model, 'Fecha_inicio') ?>

    <?php // $form->field($model, 'Fecha_fin') ?>

    <?php // $form->field($model, 'Id_actividad') ?>

    <?= $form->field($model, 'CedulaCoordi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php // Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
