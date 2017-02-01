
<!-- script para buscar en la tabla -->
<script language="javascript">
		function doSearch()
		{
			var tableReg = document.getElementById('datos');
			var searchText = document.getElementById('searchTerm').value.toLowerCase();
			var cellsOfRow="";
			var found=false;
			var compareWith="";
 
			// Recorremos todas las filas con contenido de la tabla
			for (var i = 1; i < tableReg.rows.length; i++)
			{
				cellsOfRow = tableReg.rows[i].getElementsByTagName('td');
				found = false;
				// Recorremos todas las celdas
				for (var j = 0; j < cellsOfRow.length && !found; j++)
				{
					compareWith = cellsOfRow[j].innerHTML.toLowerCase();
					// Buscamos el texto en el contenido de la celda
					if (searchText.length == 0 || (compareWith.indexOf(searchText) > -1))
					{
						found = true;
					}
				}
				if(found)
				{
					tableReg.rows[i].style.display = '';
				} else {
					// si no ha encontrado ninguna coincidencia, esconde la
					// fila de la tabla
					tableReg.rows[i].style.display = 'none';
				}
			}
		}
	</script>
 
	<style>
		#datos	{border:1px solid #ccc;padding:10px;}
		#datos tr:nth-child(even) {background:#ccc;}
		#datos td {padding:5px;}
	</style>
        
<form align="center">
    <h3><b>Buscar estudiante</b></h3> <input id="searchTerm" type="text" onkeyup="doSearch()" />
</form>
        
        <div><br></div>
            

<table id="datos" class=" table table-hover pagination-lg" border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>N° Matricula</th>
            <th>N° Cédula</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Carrera</th>
            <th >Vinculacion</th>
            <th>Practicas pre-profesionales</th>
            <th>Certificado internacional</th>
        </tr>
    </thead>
    <tbody>
     
        <?php foreach ($estudiante as $key => $value):?>
        <tr>
            <td><?=$key+1?></td>
            <td> <!-- Columna Matricula del Estudiante -->
                <?=$value['N_matricula']?>
            </td>
            <td> <!-- Columna Cedula del Estudiante -->
                <?=$value['Cedula']?>
            </td>
            <td> <!-- Columna Nombre del Estudiante -->
                <?=$value['Nombre']?>
            </td>
            <td> <!-- Columna Apellido del Estudiante -->
                <?=$value['Apellido']?>
            </td>
            <td> <!-- Columna Carrera del Estudiante -->
                <?=$value['Carrera']?>
            </td>
            <td align="center"> <!-- Columna de Vinculacion -->
                
           <?php 
              foreach ($vinculacion as $key => $value2) {
                   if($value['N_matricula'] == $value2['matricula']){
                       if($value2['horas']>=120 ){
                           echo '<span class="glyphicon glyphicon-ok text-success"></span>';
                       }else{
                           echo '<span class="glyphicon glyphicon-remove text-danger"></span>';
                       }
                   } 
               }
            ?></td>
            <td align="center" > <!-- Columna Practicas PreProfesionales-->
                <?php 
                
            foreach ($preprofesionales as $key => $value3) {
                //if ($value['N_matricula'] == $value3['matricula']){
                    //echo $value3['horas'];
                if ($value['N_matricula'] == $value3['matricula']){
                    if($value3['horas']>=240 ){
                           echo '<span class="glyphicon glyphicon-ok text-success"></span>';
                       }else{
                          // if ()
                         //echo '<span class="glyphicon glyphicon-remove text-danger"></span>';
                           echo '<span class="glyphicon glyphicon-remove text-danger"></span>';
                       }
                }
            }
                ?>
                
                
            </td>
            <td align="center"> <!-- Columna Certificado internacional-->
                <?php 
                
            foreach ($certificado as $key => $value4) {
                //if ($value['N_matricula'] == $value3['matricula']){
                    //echo $value3['horas'];
                if ($value['N_matricula'] == $value4['matricula1']){
                    echo '<span class="glyphicon glyphicon-ok text-success"></span>';
                    //echo $value4['matricula1'];
                    //var_dump($value4['archivo1']);die;
//                    if($value4['archivo1'] == 'application/pdf'){
//                           echo '<span class="glyphicon glyphicon-ok text-success"></span>';
//                       }else{
//                          // if ()
//                         //echo '<span class="glyphicon glyphicon-remove text-danger"></span>';
//                           echo '<span class="glyphicon glyphicon-remove text-danger"></span>';
//                       }
                }
            }
                ?>
                
            </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>

 </div>
    </div>



