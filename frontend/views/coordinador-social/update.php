<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\CoordinadorSocial */

$this->title = 'Update Coordinador Social: ' . $model->CedulaCoordi;
$this->params['breadcrumbs'][] = ['label' => 'Coordinador Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->CedulaCoordi, 'url' => ['view', 'id' => $model->CedulaCoordi]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="coordinador-social-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
