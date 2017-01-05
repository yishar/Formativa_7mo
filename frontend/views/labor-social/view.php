<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */

$this->title = $model->Id_actividad;
$this->params['breadcrumbs'][] = ['label' => 'Labor Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labor-social-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'Id_actividad' => $model->Id_actividad, 'Cedula' => $model->Cedula, 'CedulaCoordi' => $model->CedulaCoordi], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'Id_actividad' => $model->Id_actividad, 'Cedula' => $model->Cedula, 'CedulaCoordi' => $model->CedulaCoordi], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'Id_actividad',
            'Cedula',
            'CedulaCoordi',
            'N_horas',
        ],
    ]) ?>

</div>
