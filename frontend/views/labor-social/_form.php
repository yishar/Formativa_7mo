<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Estudiante;
use common\models\Actividad;
use yii\helpers\ArrayHelper;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="labor-social-form">

    <?php $form = ActiveForm::begin(); 
     $estudiante = Estudiante::find()->all();
    $data = ArrayHelper::map($estudiante, 'CedulaCoordi', 'Nombre');
    $actividad = Actividad::find()->all();
    $data1 = ArrayHelper::map($actividad, 'Id_actividad', 'Nombre');
    
    ?>

    <?php // $form->field($model, 'Cedula')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'Cedula')->widget(Select2::classname(), [
    'data' => $data,
    'language' => 'en',
    'options' => ['placeholder' => 'Seleccione un Estudiante ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
   ?>
    <?php // $form->field($model, 'Id_actividad')->textInput() ?>
<?= $form->field($model, 'Id_actividad')->widget(Select2::classname(), [
    'data' => $data1,
    'language' => 'en',
    'options' => ['placeholder' => 'Seleccione la Actividad ...'],
    'pluginOptions' => [
        'allowClear' => true
    ],
]);
   ?>
    <?= $form->field($model, 'CedulaCoordi')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'N_horas')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
