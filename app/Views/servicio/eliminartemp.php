<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<?= $session->nickename ?>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Eliminar
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Eliminar Trabajo
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Estas seguro de eliminar el servicio ?</h1>
<hr><br>
<div  class="row g-3">
<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Nombre del servicio</label>
    <input type="text" name="nombre"  class="form-control" id="nombre" value="<?=$servicio['name']?>" disabled>
  </div>

<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Costo Empleado</label>
    <input type="text" name="costousuario"  class="form-control" id="costousuario" value="<?=$servicio['costousuario']?>" disabled>
  </div>
 
<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Costo Real</label>
    <input type="text" name="costoreal"  class="form-control" id="costoreal" value="<?=$servicio['costoreal']?>" disabled>
  </div>

<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Tiempo del servicio</label>
    <input type="text" name="tiempotrabajo" class="form-control" id="tiempotrabajo" value="<?=$servicio['tiempotrabajo']?>" disabled>
  </div>

  <div class="col-md-4">
    <label for="inputEmail4" class="form-label">Descripción</label>
    <input type="text" name="description"  class="form-control" id="description"  value="<?=$servicio['description']?>" disabled>
  </div>


  </div>
  <hr>
<a type="button" href='<?= base_url('eliminarservicio/'.$servicio['id']) ?>' type="submit" class="btn btn-danger">Eliminar</a>
</form>

<?= $this->endSection() ?>           