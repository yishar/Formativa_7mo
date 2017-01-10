<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="labor-social-form">

    <?php $form = ActiveForm::begin(); ?>

    <!-- Hacer mapeo de todos los estudiantes  -->
        <?php echo $form->field($model, 'Cedula')->widget(kartik\select2\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map($data, 'Cedula', 'Nombre'),
        'options' => ['placeholder' => 'Seleccione un estudiante ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
        ?>

        <!-- Hacer mapeo de todas las actividades  -->
        <?php echo $form->field($model, 'Id_actividad')->widget(kartik\select2\Select2::classname(), [
        'data' => yii\helpers\ArrayHelper::map(common\models\Actividad::find()->all(), 'Id_actividad', 'Nombre'),
        'options' => ['placeholder' => 'Seleccione una actividad ...'],
        'pluginOptions' => [
            'allowClear' => true
        ],
        ]);
        ?>

    <?= $form->field($model, 'N_horas')->textInput(['maxlength' => true]) ?>

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
