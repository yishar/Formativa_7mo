<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CoordinadorSocialSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Coordinador Socials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="coordinador-social-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Coordinador Social', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'CedulaCoordi',
            'Nombre',
            'Apellido',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
