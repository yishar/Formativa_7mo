<h1>
    REPORTE DE HORAS POR ESTUDIANTE
</h1>


  
    <table class=" table table-bordered" border="1" width="1" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Matricula</th>
                    <th>Empresa</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Horas</th>
                    <th>Horas Restantes</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($rows as $key => $value):?>
                <tr>
                    <td><?= $key?></td>
                    <!--<td><?php // $value['matricula']?></td>-->
                    <td><?= $value['matricula']?></td>
                    <td><?= \yii\helpers\ArrayHelper::getValue(common\models\Empresa::findOne(['Id_Empresa'=> $value['idemp']]),'Nombre')?></td>
                    <td><?= $value['finicio']?></td>
                    <td><?= $value['ffin']?></td>
                    <td><?= $value['horas']?></td>
                    <td><?= $value['restantes']?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

  


</h3>
