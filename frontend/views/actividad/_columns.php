<?php
use yii\helpers\Url;

return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Nombre',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Lugar',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Fecha_inicio',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Fecha_fin',
    ],
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Id_actividad',
    ],*/
    [
         'class'=>'\kartik\grid\DataColumn',
         'attribute'=>'CedulaCoordi',
        'value' => function($model, $key,$index,$column){
                   return  $model->cedulaCoordi->Nombre.' '.$model->cedulaCoordi->Apellido;   
         },
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'viewOptions'=>['role'=>'modal-remote','title'=>'View','data-toggle'=>'tooltip'],
        'updateOptions'=>['role'=>'modal-remote','title'=>'Update', 'data-toggle'=>'tooltip'],
        'deleteOptions'=>['role'=>'modal-remote','title'=>'Delete', 
                          'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                          'data-request-method'=>'post',
                          'data-toggle'=>'tooltip',
                          'data-confirm-title'=>'Are you sure?',
                          'data-confirm-message'=>'Are you sure want to delete this item'], 
    ],

];   