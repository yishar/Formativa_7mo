<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use common\models\CoordinadorSocial;
use kartik\select2\Select2;

/* @var $this yii\web\View */
/* @var $model common\models\Actividad */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="actividad-form">

    <?php $form = ActiveForm::begin(); 
    $coordinador = CoordinadorSocial::find()->all();
    
    $data = ArrayHelper::map($coordinador, 'CedulaCoordi', 'Nombre');
    ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lugar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha_inicio')->textInput() ?>

    <?= $form->field($model, 'Fecha_fin')->textInput() ?>

    <?php // $form->field($model, 'CedulaCoordi')->textInput(['maxlength' => true]) ?>
<?= $form->field($model, 'CedulaCoordi')->widget(Select2::classname(), [
    'data' => $data,
    'language' => 'en',
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
