<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\PreProfesionales */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pre-profesionales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'N_Matricula')->widget(kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($data, 'N_matricula', 'N_matricula', 'Nombre'),
        'options' => ['placeholder' => 'Seleccione un estudiante ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>

    <?= $form->field($model, 'Id_empresa')->widget(kartik\select2\Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(common\models\Empresa::find()->all(), 'Id_empresa', 'Nombre'),
        'options' => ['placeholder' => 'Seleccione la empresa ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
    ?>
    
    <?php // Usage with model and Active Form (with no default initial value)
        echo $form->field($model, 'Fecha_inicio')->widget(\kartik\datetime\DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Elija la fecha ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
        ]); ?>
        
    
         <?php // Usage with model and Active Form (with no default initial value)
        echo $form->field($model, 'Fecha_fin')->widget(\kartik\datetime\DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Elija la fecha ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
        ]); ?>

    <?= $form->field($model, 'N_Horas')->textInput() ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
