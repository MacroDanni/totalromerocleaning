<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Alta Empleado  -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
<?=  isset($employee) ? "Editar Empleado" :  "Alta Empleado"  ?>
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  isset($employee) ? "Datos" :  "Registro"  ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form method="POST" action="<?=  isset($employee) ? base_url('guardarEditar') :  base_url('guardaremployee')  ?>">

<?= csrf_field()  ?> 
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-sm-4" >
                    <label >Nombre</label>
                    <input type="hidden" name="id" value="<?php echo isset($employee) ? $employee['id'] : (isset($_POST['id']) ? $_POST['id'] :'' ); ?>">
                    <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Ingresa Nombre"
                    value="<?php echo isset($employee) ? $employee['nombre'] : (isset($_POST['nombre']) ? $_POST['nombre'] :'' ); ?>" required>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Ingresa Apellido Paterno"
                    value="<?php echo isset($employee) ? $employee['apellidoPaterno'] : (isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] :'' ); ?>" required>
                
                  </div>

                  <div class="form-group col-sm-4" >
                    <label for="exampleInputPassword1">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Ingresa Apellido Materno"
                    value="<?php echo isset($employee) ? $employee['apellidoMaterno'] : (isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] :'' ); ?>" required>
                  </div>

                  </div>
                 
                <div class="row">
                <div class="form-group col-sm-4">
                    <label >Email</label>
                    <input type="email" class="form-control" id="email" name="correoElectronico" placeholder="Ingresa Email" 
                    value="<?php echo isset($employee) ? $employee['correoElectronico'] : (isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] :'' ); ?>"required>
                  </div>

                  <div class="form-group col-sm-4" >
                    <label >Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"
                    value="<?php echo isset($employee) ? $employee['fechanacimiento'] : (isset($_POST['fechanacimiento']) ? $_POST['fechanacimiento'] :'' ); ?>">
                  </div>

                  <div class="form-group col-sm-4">
                    <label >Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa # Telefono" 
                    value="<?php echo isset($employee) ? $employee['telefono'] : (isset($_POST['telefono']) ? $_POST['telefono'] :'' ); ?>"required>
                  </div>

                  </div>
                 
                  <div class="row">

                  



                  <div class="form-group col-sm-4">
                  <label for="exampleSelectBorder">Tipo de Cuenta</label>
                  <select class="custom-select form-control-border" name="tipo" id="tipo" required>
                 
                    <?php echo isset($employee) ?  '<option value="'.$employee['tipo'].'">'.$employee['tipo'].'</option>': " <option selected>Seleccione</option>"; ?>
                  
                    <option value="Admin">Admin</option>
                    <option value="Empleado">Empleado</option>
                  </select>
                </div>

                <div class="form-group col-sm-4">
                  <label for="exampleSelectBorder">Estatus Cuenta</label>
                  <select class="custom-select form-control-border" name="estatus" id="estatus" required>
                   
                  <?php echo isset($employee) ?  '<option value="'.$employee['estatus'].'">'.$employee['estatus'].'</option>': " <option selected>Seleccione</option>"; ?>
                  
                    <option value="Enable">Enable</option>
                    <option value="Disable">Disable</option>
                  </select>
                </div>
                  
            

                  </div>

                
                     
                    </div>
                  </div>
          <HR></HR>

                <div class="card-footer">

                  <button type="submit" class="btn btn-success">Guardar Empleado</button>
                  <?php echo isset($employee) ?  '<a href="'.base_url('deleteEmployee/'.$employee['id']).'" type="button" class="btn btn-danger">Eliminar Empleado</a>' : ""; ?>
                 
                 

                </div>
              </form>

<?= $this->endSection() ?>