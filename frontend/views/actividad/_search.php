<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\ActividadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Lugar') ?>

    <?= $form->field($model, 'Fecha_inicio') ?>

    <?= $form->field($model, 'Fecha_fin') ?>

    <?= $form->field($model, 'Id_actividad') ?>

    <?php // echo $form->field($model, 'CedulaCoordi') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
