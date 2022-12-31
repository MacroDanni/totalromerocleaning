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
<div  class="row g-3">
<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Building</label>
    <input type="text" name="nameBuilding"  class="form-control" id="nameBuilding" value="<?=$worklist['nameBuilding']?>" disabled>
  </div>

<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Employee</label>
    <input type="text" name="nameEmployee"  class="form-control" id="nameEmployee" value="<?=$worklist['nameEmployee']?>" disabled>
  </div>
 
<div class="col-md-4">
    <label for="inputEmail4" class="form-label">Servicio</label>
    <input type="text" name="nameservice"  class="form-control" id="nameservice" value="<?=$worklist['nameservice']?>" disabled>
  </div>

<div class="col-md-4">
    <label for="inputEmail4" class="form-label"># Edificio</label>
    <input type="text" name="numberbuilding" class="form-control" id="numberbuilding" value="<?=$worklist['numberBuilding']?>" disabled>
  </div>

  <div class="col-md-4">
    <label for="inputEmail4" class="form-label"># Habitación</label>
    <input type="text" name="numroom"  class="form-control" id="numroom"  value="<?=$worklist['numroom']?>" disabled>
  </div>

  <div class="col-md-4">
    <label for="inputPassword4" class="form-label">Fecha</label>
    <input type="date" name="date" required class="form-control" id="date" value="<?=$worklist['fechaAseo']?>" disabled >
  </div>


  <div class="col-12">
    <label for="inputAddress" class="form-label">Descripción</label>
    <input type="textarea" name="description"  class="form-control" id="description" value="<?=$worklist['description']?>" disabled>
  </div>
  </div>
  <hr>
<a type="button" href='<?= base_url('eliminarworklist/'.$worklist['id']) ?>' type="submit" class="btn btn-danger">Eliminar</a>
</form>

<?= $this->endSection() ?>           