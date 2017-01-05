<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="labor-social-form">

    <?php $form = ActiveForm::begin(); ?>
<div class="col-xs-12">
    <?= $form->field($model, 'Cedula')->textInput(['value'=>$aux1,]) ?>
</div>
    <div class="col-xs-6">
    <?= $form->field($model, 'Nombres')->textInput(['value'=>'','maxlength' => true]) ?>
</div>
    <div class="col-xs-6">
    <?= $form->field($model, 'Apellidos')->textInput(['value'=>'','maxlength' => true]) ?>
</div>
    <div class="form-group">
        <?php // Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
