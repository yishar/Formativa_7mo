<?php

use yii\grid\GridView;
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
 

?>

<table border="1">
    <thead>
        <tr>
            <th>CEDULA</th>
            <th>NOMBRE</th>
            <th>APELLIDO</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $key => $value):         ?> 
        <tr>

            
            <td><?=$value['Cedula']?></td>
            <td><?=$value['Nombre']?></td>
            <td><?=$value['Apellido']?></td>
         
        </tr>
           <?php            endforeach; ?>
    </tbody>
</table>


