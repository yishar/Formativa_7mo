<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\LaborSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Labor Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="labor-social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  //echo $this->render('_search', ['model' => $searchModel]); ?>

    
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'Id_actividad',
            'Cedula',
            'CedulaCoordi',
            'N_horas',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    
    <p>
        <?= Html::a('Create Labor Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
</div>
