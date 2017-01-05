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
    ?>
    
    <?= $form->field($model, 'Cedula')->hiddenInput(['value'=>$aux1,])->label(false) ?>
 <?php // $this->render('_form_1', [ 'model' => $searchModel1,'aux1' => $aux1,'estudiante' => $estudiante,]) ?>
    
            
     <?php  echo DetailView::widget([
        //'model' => common\models\Estudiante::findOne($searchModel1),
        //'model' => $model_estudiante->Cedula,
        'model' => common\models\Estudiante::findOne($searchModel1),
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
   
    <?php
    $prueba2 = common\models\Actividad::findOne($model->Id_actividad);
    echo $form->field($model, 'CedulaCoordi')->textInput(['value'=>$prueba2->CedulaCoordi]) ?>

    <?= $form->field($model, 'N_horas')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
