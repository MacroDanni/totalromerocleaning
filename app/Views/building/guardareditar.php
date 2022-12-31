<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Agregar Edificio
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Nuevo Edificio
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Agregar Edificio  -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>



<?= $this->section('content') ?>


<form method="POST" action="<?=  isset($building) ? base_url('guardarEditar/'.$building['id']) :  base_url('savebuilding')  ?>">

<?= csrf_field()  ?> 
  <div class="mb-3">
    <label for="email" class="form-label">Propiedad</label>
    <input type="text" name="property" id="property" 
    value="<?php echo isset($building) ? $building['property'] : (isset($_POST['property']) ? $_POST['property'] :'' ); ?>" placeholder="Agregar nombre de la propiedad"  required class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Nombre de Contacto</label>
    <input type="text" name="contact" id="contact"
    value="<?php echo isset($building) ? $building['contact'] : (isset($_POST['contact']) ? $_POST['contact'] :'' ); ?>" placeholder="Agregar numero de contacto" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Telefono de Contacto</label>
    <input type="number" name="phone" id="phone"
    value="<?php echo isset($building) ? $building['phone'] : (isset($_POST['phone']) ? $_POST['phone'] :'' ); ?>" placeholder="Agregar numero de telefono" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Correo Electronico</label>
    <input type="email" name="email" id="email"
    value="<?php echo isset($building) ? $building['email'] : (isset($_POST['email']) ? $_POST['email'] :'' ); ?>" placeholder="Agregar correo electronico" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Dirección Edificio</label>
    <input type="text" name="address" id="address"
    value="<?php echo isset($building) ? $building['address'] : (isset($_POST['address']) ? $_POST['address'] :'' ); ?>" placeholder="Agregar direccion del edificio" required  class="form-control" ariscribedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection() ?>           