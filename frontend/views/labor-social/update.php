<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */

$this->title = 'Update Labor Social: ' . $model->Id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Labor Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Id_actividad, 'url' => ['view', 'Id_actividad' => $model->Id_actividad, 'Cedula' => $model->Cedula, 'CedulaCoordi' => $model->CedulaCoordi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="labor-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
