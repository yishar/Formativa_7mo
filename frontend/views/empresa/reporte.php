<h1>
    REPORTE GENERAL DE EMPRESAS
</h1>


  
    <table class=" table table-bordered" border="1" width="1" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Empresa</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Gerente</th>
                    <th>Contacto</th>
                    <th>Cargo_contacto</th>
                    <th>Convenio</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($model as $key => $value):?>
                <tr>
                    <td><?= $key?></td>
                    <td><?= $value->Nombre?></td>
                    <td><?= $value->Direccion?></td>
                    <td><?= $value->Telefono?></td>
                    <td><?= $value->Gerente?></td>
                    <td><?= $value->Contacto?></td>
                    <td><?= $value->Cargo_contacto?></td>
                    <td><?= $value->Convenio?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>

  


</h3>
