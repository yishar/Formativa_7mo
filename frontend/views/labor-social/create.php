<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* @var $this yii\web\View */
/* @var $model common\models\LaborSocial */

$this->title = 'Create Labor Social';
$this->params['breadcrumbs'][] = ['label' => 'Labor Socials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labor-social-create">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <?= $this->render('_search', ['model' => $searchModel1]); ?>


    <?= $this->render('_form', [
        'model' => $model,
        'aux1' => $aux1,
        'searchModel1' => $searchModel1,
        'dataProvider' => $dataProvider,
        
    ]) ?>

</div>
