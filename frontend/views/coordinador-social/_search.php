<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\CoordinadorSocialSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="coordinador-social-search">

    <?php $form = ActiveForm::begin([
        'action' => ['create'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'CedulaCoordi') ?>

    <?php //echo $form->field($model, 'Nombre') ?>

    <?php //echo $form->field($model, 'Apellido') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php //echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
