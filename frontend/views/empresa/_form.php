<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput() ?>

    <?= $form->field($model, 'Gerente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Cargo_contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono_contacto')->textInput() ?>

    
    <?= $form->field($model, 'Convenio')->radioList(['Si' => 'Si', 'No' => 'No', ])?>
    <?php //echo $form->field($model, 'Convenio')->dropDownList([ 'Si' => 'Si', 'No' => 'No', ], ['prompt' => 'Existe convenio?']) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
