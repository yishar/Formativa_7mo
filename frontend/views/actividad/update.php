<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Actividad */

$this->title = 'Update Actividad: ' . $model->Id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Actividads', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_actividad, 'url' => ['view', 'Id_actividad' => $model->Id_actividad, 'CedulaCoordi' => $model->CedulaCoordi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="actividad-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
