<?php
use yii\helpers\Url;
//use frontend\models\ActividadSearch;
//use common\models\Actividad;


return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
       /* [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Id_labor_social',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Cedula',
        /*'value'=>  function($model, $key,$index,$column){
                   return  $model->Cedula->Nombre.' '.$model->Cedula->Apellido ;   
         },*/
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Id_actividad',
        'value'=> function($model, $key,$index,$column){
                   return  $model->idActividad->Nombre;   
         },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'N_horas',
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