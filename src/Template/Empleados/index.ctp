<h1>Empleados</h1>
<p class="lead"> Aqui podras ver la información de la nomina de sus empleados</p>
<table class="table table-hover">
    <tr>
        
        <th>Cedula</th>
        <th>Nombre</th>
        <th>Salario Básico</th>
        <th>Auxilio de Transporte</th> 
        <th>Salario neto a recibir</th>

    </tr>
    <!-- se muestra la informacion de la nomina de empleados -->
<?php foreach ($empleados as $empleado): ?>
    <?php 
    // calculo de la nomina
    $auxilio_transporte = (88211 * $empleado->emp_dialaborado) / 30;
    $sueldoDevengado = ($empleado->emp_salario * $empleado->emp_dialaborado)/30;
    $totalDevengado = $auxilio_transporte + $sueldoDevengado;
    /* para el calculo de la salud y la pension  es
     * salario del empleado * 0.04
     * 
     */
    $totalDeducciones = ($empleado->emp_salario * 0.04)*2;
    $sueldoNeto = $totalDevengado - $totalDeducciones;
    
    ?>
    <tr>
        
        <td><?= $empleado->emp_cedula ?></td>
        <td><?= $empleado->emp_nombre ?>  <?= $empleado->emp_apellido ?> </td>
        <td><?= $empleado->emp_salario ?></td>
        <?php  if($empleado->emp_salario <= 1562484):?>
        <td><?= $auxilio_transporte ?></td>
        <?php  else:?>
        <td> <h5><span class="badge indigo">no aplica</span></h5> </td>
        <?php endif;?>
        
        <td><?= $sueldoNeto ?></td>
      
    </tr>
<?php endforeach; ?>
</table>
