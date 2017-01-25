<?php

use yii\helpers\Html;
use yii\grid\GridView;


/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 

?>

<div class="body-content">

        <?= GridView::widget([
        'dataProvider' => $dataProvider,
          'columns' => [
            'Cedula',
            'Nombre',
            'Apellido',
            'N_matricula',
            'Carrera',
            'Nivel',
        ],
           // 'summary'=>''
    ]); ?>
    </div>


