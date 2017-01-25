<?php

use yii\helpers\Html;
//use yii\grid\GridView;
use kartik\grid\GridView;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 
?>

<div class="body-content">
<div id="ajaxCrudDatatable">
        <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'pjax'=>true,
    'columns' => 
        [    'Cedula',
            'Nombre',
            'Apellido',
            'N_matricula',
            'Carrera',
            [   'attribute' => 'Practicas PRE-Profesionales',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Yes', 
                'falseLabel' => 'No',
                'trueIcon' => '<span class="glyphicon glyphicon-ok text-success"></span>',
                'falseIcon' => '<span class="glyphicon glyphicon-remove text-danger"></span>',
                'vAlign'=>'middle',
                'value'=>function ( $data1 )  {
                         return $data1; // $data['h_vin'] for array data, e.g. using SqlDataProvider.
                         },
            ],

            [   'attribute' => 'Horas Vinculacion',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Yes', 
                'falseLabel' => 'No',
                'trueIcon' => '<span class="glyphicon glyphicon-ok text-success"></span>',
                'falseIcon' => '<span class="glyphicon glyphicon-remove text-danger"></span>',
                'vAlign'=>'middle',
                'value'=>function ( $data1 )  {
                         return $data1; // $data['h_vin'] for array data, e.g. using SqlDataProvider.
                         },
            ],
            [   'attribute' => 'Certificado internacional',
                'class' => '\kartik\grid\BooleanColumn',
                'trueLabel' => 'Yes', 
                'falseLabel' => 'No',
                'trueIcon' => '<span class="glyphicon glyphicon-ok text-success"></span>',
                'falseIcon' => '<span class="glyphicon glyphicon-remove text-danger"></span>',
                'vAlign'=>'middle',
                'value'=>function ( $data1 )  {
                         return $data1; // $data['h_vin'] for array data, e.g. using SqlDataProvider.
                         },
            ],  
        ],
    'summary'=>'',
    'striped' => true,
    'condensed' => true,
    'responsive' => true,          
    'panel' => [
        'type' => 'primary', 
        'heading' => '<i class="glyphicon glyphicon-list"></i>  Lista Estudiantes Secretaria General',
        'before'=>'<em>Listado de Estudiantes Habilitado y No habilitados para Egresar </em>',
        'after'=>'<div class="clearfix"></div>',
                ],
    ]); ?>
      </div>
    </div>