<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\CoordinadorSocial */

$this->title = 'Create Coordinador Social';
$this->params['breadcrumbs'][] = ['label' => 'Coordinador Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordinador-social-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
