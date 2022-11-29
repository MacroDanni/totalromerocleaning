<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<?= $session->nickename ?>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Alta Empleado  -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
<?=  isset($empleado) ? "Editar Empleado" :  "Alta Empleado"  ?>
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  isset($empleado) ? "Datos" :  "Registro"  ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<form method="POST" action="<?=  isset($empleado) ? base_url('guardarEditar') :  base_url('guardaremployee')  ?>">

<?= csrf_field()  ?> 
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-sm-4" >
                    <label >Nombre</label>
                    <input type="hidden" name="id" value="<?php echo isset($empleado) ? $empleado['id'] : (isset($_POST['id']) ? $_POST['id'] :'' ); ?>">
                    <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Ingresa Nombre"
                    value="<?php echo isset($empleado) ? $empleado['nombre'] : (isset($_POST['nombre']) ? $_POST['nombre'] :'' ); ?>" required>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidoPaterno" name="apellidoPaterno" placeholder="Ingresa Apellido Paterno"
                    value="<?php echo isset($empleado) ? $empleado['apellidoPaterno'] : (isset($_POST['apellidoPaterno']) ? $_POST['apellidoPaterno'] :'' ); ?>" required>
                
                  </div>

                  <div class="form-group col-sm-4" >
                    <label for="exampleInputPassword1">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidoMaterno" name="apellidoMaterno" placeholder="Ingresa Apellido Materno"
                    value="<?php echo isset($empleado) ? $empleado['apellidoMaterno'] : (isset($_POST['apellidoMaterno']) ? $_POST['apellidoMaterno'] :'' ); ?>" required>
                  </div>

                  </div>
                 
                <div class="row">
                <div class="form-group col-sm-4">
                    <label >Email</label>
                    <input type="email" class="form-control" id="email" name="correoElectronico" placeholder="Ingresa Email" 
                    value="<?php echo isset($empleado) ? $empleado['correoElectronico'] : (isset($_POST['correoElectronico']) ? $_POST['correoElectronico'] :'' ); ?>"required>
                  </div>

                  <div class="form-group col-sm-4" >
                    <label >Fecha Nacimiento</label>
                    <input type="date" class="form-control" id="fechanacimiento" name="fechanacimiento"
                    value="<?php echo isset($empleado) ? $empleado['fechanacimiento'] : (isset($_POST['fechanacimiento']) ? $_POST['fechanacimiento'] :'' ); ?>">
                  </div>

                  <div class="form-group col-sm-4">
                    <label >Telefono</label>
                    <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Ingresa # Telefono" 
                    value="<?php echo isset($empleado) ? $empleado['telefono'] : (isset($_POST['telefono']) ? $_POST['telefono'] :'' ); ?>"required>
                  </div>

                  </div>
                 
                  <div class="row">

                  <?php echo isset($empleado) ? 
                  '
                <div class="form-group col-sm-4" >
                <label >Contraseña(temp)</label>
                <input type="text" class="form-control" id="contrasena" name="contrasena"
                disabled>
              </div>'
                  : 
                  '
                <div class="form-group col-sm-4" >
                  <label >Contraseña(temp)</label>
                  <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Ingresa Contrasena Temporal"
                  value="">
                </div>
                '
                  ; ?>
                  
                  



                  <div class="form-group col-sm-4">
                  <label for="exampleSelectBorder">Tipo de Cuenta</label>
                  <select class="custom-select form-control-border" name="tipo" id="tipo" required>
                 
                    <?php echo isset($empleado) ?  '<option value="'.$empleado['tipo'].'">'.$empleado['tipo'].'</option>': " <option selected>Seleccione</option>"; ?>
                  
                    <option value="Admin">Admin</option>
                    <option value="Empleado">Empleado</option>
                  </select>
                </div>

                <div class="form-group col-sm-4">
                  <label for="exampleSelectBorder">Estatus Cuenta</label>
                  <select class="custom-select form-control-border" name="estatus" id="estatus" required>
                   
                  <?php echo isset($empleado) ?  '<option value="'.$empleado['estatus'].'">'.$empleado['estatus'].'</option>': " <option selected>Seleccione</option>"; ?>
                  
                    <option value="Enable">Enable</option>
                    <option value="Disable">Disable</option>
                  </select>
                </div>
                  
                  </div>

                  <div class="form-group col-sm-12">
                    <label for="exampleInputFile">Subir Foto</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Upload</label>
                      </div>
                     
                    </div>
                  </div>
          <HR></HR>

                <div class="card-footer">
                
                 


                  <button type="submit" class="btn btn-success">Guardar Empleado</button>
                </div>
              </form>

<?= $this->endSection() ?>