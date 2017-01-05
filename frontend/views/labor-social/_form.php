<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Actividad;
use yii\helpers\ArrayHelper;
use yii\widgets\DetailView;
use common\models\Estudiante;


/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="labor-social-form">

    <?php $form = ActiveForm::begin();
    $model_estudiante = new Estudiante();
    
    //$a = Estudiante::findOne($searchModel1);
    ?>
    
    <?= $form->field($model, 'Cedula')->hiddenInput(['value'=>$aux1,])->label(false) ?>

    <?= DetailView::widget([
        'model' => common\models\Estudiante::findOne($searchModel1),
        //'model' => $model_estudiante->Cedula,
        'attributes' => [
            'Cedula',
            'Nombres',
            'Apellidos',
        ],
    ]) ?>
        <?php //echo $form->field($model, 'Id_actividad')->textInput() ?>
    
    <?php
    $prueba1 = common\models\Actividad::find()->all();
    $listData1 = ArrayHelper::map($prueba1, 'Id_actividad', 'Nombre');
    echo $form->field($model, 'Id_actividad')->dropDownList($listData1, ['prompt' => 'Seleccione la actividad...']);
    ?>

    <?= $form->field($model, 'CedulaCoordi')->textInput(['value'=>'aa']) ?>

    <?= $form->field($model, 'N_horas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
