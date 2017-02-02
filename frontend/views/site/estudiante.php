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
           //'filterModel' => $searchModel,
           'pjax'=>true,
          'columns' => [
            'Cedula',
            'Nombre',
            'Apellido',
            'N_matricula',
            'Carrera',
            'Nivel',
        ],
     'summary'=>'',
    'striped' => true,
    'condensed' => true,
    'responsive' => true,          
    'panel' => [
        'type' => 'primary', 
        'heading' => '<i class="glyphicon glyphicon-list"></i>  Lista Estudiantes PUCESE',
        'after'=>'<div class="clearfix"></div>',
                ],
    ]); ?>
    </div>
    </div>
<!--
<table border="1">
    <thead>
        <tr>
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>N° Matrícula</th>
            <th>Carrera</th>
            <th>Nivel</th>
        </tr>       <? foreach ($data as $key => $value):         ?> 
        <tr>

            
            <td><? $value['Cedula']?></td>
            <td><? $value['Nombre']?></td>
            <td><? $value['Apellido']?></td>
            <td><? $value['N_matricula']?></td>
            <td><? $value['Carrera']?></td>
            <td><? $value['Nivel']?></td>
         
        </tr>
           <?            endforeach; ?>
    </tbody>
</table>
-->

