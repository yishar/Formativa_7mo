<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="col-xs-6">
    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-xs-6">
    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>
</div>
        <div class="col-xs-6">
    <?= $form->field($model, 'Telefono')->textInput() ?>
</div>
            <div class="col-xs-6">
    <?= $form->field($model, 'Gerente')->textInput(['maxlength' => true]) ?>
</div>
                <div class="col-xs-6">
    <?= $form->field($model, 'Contacto')->textInput(['maxlength' => true]) ?>
</div>
                    <div class="col-xs-6">
    <?= $form->field($model, 'Cargo_contacto')->textInput(['maxlength' => true]) ?>
</div>
                        <div class="col-xs-6">
    <?= $form->field($model, 'Telefono_contacto')->textInput() ?>
</div>
     <div class="col-xs-6">
    <?= $form->field($model, 'Convenio')->radioList(['Si' => 'Si', 'No' => 'No', ])?>
         
     </div>
         <div class="col-xs-6">
     <?=
// your fileinput widget for single file upload
            $form->field($model, 'archivo')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'file/*',
                ],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['pdf'],
                    'browseIcon' => '<i class="glyphicon glyphicon-list-alt"></i> ',
                    'browseLabel' => 'Cagar',
                ],
            ])
            ?>     
  </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
