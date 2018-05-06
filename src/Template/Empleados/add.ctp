
<?php  echo $this->Form->create($empleado); ?>
<p class="h4 text-center mb-4">Registro Empleado</p>
<p class="lead">ingrese la información en el  formulario para registrar la nomina de sus empleados</p>
<div class="md-form">

    Cedula <?php echo $this->Form->text('emp_cedula',['class' => 'form-control',
                                                      'data-parsley-required'=>'true',
                                                      'data-parsley-type'=>'number',
                                                      'data-parsley-trigger'=>'keyup']
            
                                                      );?>


</div>

<!-- Material input password -->
<div class="md-form">
    Nombre <?php echo $this->Form->text('emp_nombre',['class' => 'form-control',
                                        'data-parsley-pattern'=>'^[a-zA-Z_áéíóúñ\s]*$',
                                        'data-parsley-required'=>'true',
                                        'data-parsley-trigger'=>'keyup']);?>


</div>
<div class="md-form">

    Apellido  <?php echo $this->Form->text('emp_apellido',['class' => 'form-control',
                                              'data-parsley-required'=>'true',
                                             'data-parsley-pattern'=>'^[a-zA-Z_áéíóúñ\s]*$',
                                              'data-parsley-trigger'=>'keyup']);?>

</div>
<div class="md-form">

    Salario <?php echo $this->Form->text('emp_salario',['class' => 'form-control',
                                              'data-parsley-required'=>'true',
                                              'data-parsley-type'=>'number',
                                              'data-parsley-trigger'=>'keyup']);?>

</div>
<div class="md-form">
    Días Laborados 
    <select name="emp_dialaborado" class="form-control" data-parsley-required="true">


    <?php
    
    for ($i=1; $i < 31; $i++):?>
        <option value="<?= $i ?>"><?= $i?></option>
     <?php   
    endfor; ?>
    </select>

</div>
<div class="text-center mt-4">
        <?php echo $this->Form->button(__('Guardar Empleado'),['class'=>'btn btn-primary']); ?>
</div>
<?php echo $this->Form->end(); ?>
<!-- Material form login -->

