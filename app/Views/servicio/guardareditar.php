<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal de Servicios
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Servicios
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
    <div class="alert alert-<?= $flag['type']; ?>" role="alert">
        <strong><?= $flag['msg']; ?></strong>
    </div>
    <?php } ?>
<form method="POST" action="<?=  isset($servicio) ? base_url('guardareditarservicio') :  base_url('nuevoservicio')  ?>">

<?= csrf_field()  ?> 
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-sm-4" >
                    <label >Nombre del Servicio:</label>
                    <input type="hidden" name="id" value="<?php echo isset($servicio) ? $servicio['id'] : (isset($_POST['id']) ? $_POST['id'] :'' ); ?>">
                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingrese el nombre del servicio"
                    value="<?php echo isset($servicio) ? $servicio['name'] : (isset($_POST['name']) ? $_POST['name'] :'' ); ?>" required>
                  </div>

                  <div class="form-group col-sm-4">
                    <label>Costo Empleado:</label>
                    <input type="number" class="form-control" id="costousuario" name="costousuario" placeholder="Ingresa costo por el servicio"
                    value="<?php echo isset($servicio) ? $servicio['costousuario'] : (isset($_POST['costousuario']) ? $_POST['costousuario'] :'' ); ?>" required>
                
                  </div>

                  <div class="form-group col-sm-4" >
                    <label for="exampleInputPassword1">Costo Real:</label>
                    <input type="number" class="form-control" id="costoreal" name="costoreal" placeholder="Ingresa el costo real del trabajo"
                    value="<?php echo isset($servicio) ? $servicio['costoreal'] : (isset($_POST['costoreal']) ? $_POST['costoreal'] :'' ); ?>" required>
                  </div>

                  </div>
                 
                <div class="row">
                <div class="form-group col-sm-4">
                    <label >Tiempo del servicio (minutos):</label>
                    <input type="number" class="form-control" id="tiempotrabajo" name="tiempotrabajo" placeholder="Ingresa tiempo que lleva realizar el trabajo (min)" 
                    value="<?php echo isset($servicio) ? $servicio['tiempotrabajo'] : (isset($_POST['tiempotrabajo']) ? $_POST['tiempotrabajo'] :'' ); ?>"required>
                  </div>

                  <div class="form-group col-sm-4" >
                    <label >Descripcion:</label>
                    <textarea class="form-control"  id="description" name="description" rows="3" value="<?php echo isset($servicio) ? $servicio['description'] : (isset($_POST['description']) ? $_POST['description'] :'' ); ?>"></textarea>
                  </div>

                  </div>
               

                <div class="card-footer">
                
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <?php echo isset($servicio) ?  '<a href="'.base_url('eliminarserviciotemp/'.$servicio['id']).'" type="button" class="btn btn-danger">Eliminar Servicio</a>' : ""; ?>
                 
                 

                </div>
              </form>

<?= $this->endSection() ?>