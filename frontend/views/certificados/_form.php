<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Certificados */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="certificados-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php // $form->field($model, 'matricula')->textInput(['maxlength' => true]) ?>
    <?php echo $form->field($model, 'matricula')->widget(kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($data, 'N_matricula', 'N_matricula', 'Nombre'),
        'options' => ['placeholder' => 'Seleccione un estudiante ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>
    <?php // $form->field($model, 'file_certificado')->textInput(['maxlength' => true]) ?>
    <?=
// your fileinput widget for single file upload
            $form->field($model, 'file_certificado')->widget(FileInput::classname(), [
                'options' => [
                    'accept' => 'file/*',
                ],
                'pluginOptions' => [
                    'allowedFileExtensions' => ['pdf'],
                    'browseIcon' => '<i class="glyphicon glyphicon-list-alt"></i> ',
                    'browseLabel' => 'Cargar',
                ],
            ])
            ?>   
  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
