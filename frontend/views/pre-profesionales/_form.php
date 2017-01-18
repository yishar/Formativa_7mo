<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PreProfesionales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pre-profesionales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'N_Matricula')->textInput() ?>

    <?= $form->field($model, 'Id_empresa')->textInput() ?>

    <?= $form->field($model, 'N_Horas')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
