<link rel="shortcut icon" href="../../assets/logo.jpg" />

<center><h3>Labor Social</h3></center>

<h1>
    REPORTE DE HORAS POR ESTUDIANTE
</h1>


  
    <table class=" table table-bordered" border="1" width="1" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cédula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Actividad</th>
                    <th>Horas Realizadas</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $key => $value):?>
                    
                <tr>
                    <td><?= $key?></td>
                    <td><?php 
                    foreach ($data as $key1 => $value1){
                            if ($value1['Cedula']==$value['cedula']){
                            echo $value['cedula'];
                            }
                    }
                     ?></td>
                    <td><?php 
                    foreach ($data as $key1 => $value2){
                            if ($value2['Cedula']==$value['cedula']){
                            echo $value2['Nombre'];
                            }
                    }
                     ?></td>
                    <td><?php 
                    foreach ($data as $key1 => $value3){
                            if ($value3['Cedula']==$value['cedula']){
                            echo $value3['Apellido'];
                            }
                    }
                     ?></td>
                    <td><?= \yii\helpers\ArrayHelper::getValue(common\models\Actividad::findOne(['Id_actividad'=> $value['idact']]),'Nombre')?></td>
                    <td><?= $value['horas']?></td>
                </tr>
                <?php endforeach;?>
               
            </tbody>
        </table>

  


</h3>
