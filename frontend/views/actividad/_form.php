<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Actividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lugar')->textInput(['maxlength' => true]) ?>

    
    <?php // Usage with model and Active Form (with no default initial value)
echo $form->field($model, 'Fecha_inicio')->widget(\kartik\datetime\DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]); ?>

    <?php // Usage with model and Active Form (with no default initial value)
echo $form->field($model, 'Fecha_fin')->widget(\kartik\datetime\DateTimePicker::classname(), [
	'options' => ['placeholder' => 'Enter event time ...'],
	'pluginOptions' => [
		'autoclose' => true
	]
]); ?>

    <!-- Hacer mapeo de todos los coordinadores  -->
        <?php echo $form->field($model, 'CedulaCoordi')->widget(kartik\select2\Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(common\models\CoordinadorSocial::find()->all(), 'CedulaCoordi', 'Nombre'),
        'options' => ['placeholder' => 'Seleccione un coordinador ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
        ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
