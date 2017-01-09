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
            <th>Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>N° Matrícula</th>
            <th>Carrera</th>
            <th>Nivel</th>
        </tr>       <?php foreach ($data as $key => $value):         ?> 
        <tr>

            
            <td><?=$value['Cedula']?></td>
            <td><?=$value['Nombre']?></td>
            <td><?=$value['Apellido']?></td>
            <td><?=$value['N_matricula']?></td>
            <td><?=$value['Carrera']?></td>
            <td><?=$value['Nivel']?></td>
         
        </tr>
           <?php            endforeach; ?>
    </tbody>
</table>


