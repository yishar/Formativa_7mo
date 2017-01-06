<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="labor-social-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Cedula')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Id_actividad')->textInput() ?>

    <?= $form->field($model, 'CedulaCoordi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'N_horas')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
