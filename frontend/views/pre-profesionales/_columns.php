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
    /*[
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Id_pre_profesionales',
    ],*/
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'N_Matricula',
       
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Id_empresa',
        'value'=> function($model, $key,$index,$column){
                   return  $model->idEmpresa->Nombre;   
         },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Fecha_inicio',
            'value' => 'Fecha_inicio',
            'format' => 'raw',
            'filter'=> \kartik\datetime\DateTimePicker::widget([
                'model'=> $searchModel,
                'attribute' => 'Fecha_inicio',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                ]
                
            ])
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'Fecha_fin',
            'value' => 'Fecha_fin',
            'format' => 'raw',
            'filter'=> \kartik\datetime\DateTimePicker::widget([
                'model'=> $searchModel,
                'attribute' => 'Fecha_fin',
                'pluginOptions' => [
                    'autoclose'=>true,
                    'format'=>'yyyy-mm-dd',
                ]
                
            ])
    ],
  
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'N_Horas',
        'footer' =>$sum,
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