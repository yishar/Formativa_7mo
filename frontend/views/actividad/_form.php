<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Actividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <?php  echo DetailView::widget([
        //'model' => common\models\Estudiante::findOne($searchModel1),
        //'model' => $model_estudiante->Cedula,
        'model' => common\models\CoordinadorSocial::findOne($searchModel1),
        'attributes' => [
            'CedulaCoordi',
            'Nombre',
            'Apellido',
        ],
    ]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'Fecha_fin')->textInput() ?>

    <?= $form->field($model, 'CedulaCoordi')->hiddenInput(['value'=>$aux1])->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
