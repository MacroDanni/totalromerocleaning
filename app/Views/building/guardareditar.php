<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal add Building
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
New Building
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Add Building  -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>



<?= $this->section('content') ?>


<form method="POST" action="<?=  isset($building) ? base_url('guardarEditar/'.$building['id']) :  base_url('savebuilding')  ?>">

<?= csrf_field()  ?> 
  <div class="mb-3">
    <label for="email" class="form-label">Property</label>
    <input type="text" name="property" id="property" 
    value="<?php echo isset($building) ? $building['property'] : (isset($_POST['property']) ? $_POST['property'] :'' ); ?>" placeholder="add property name"  required class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Contact Name</label>
    <input type="text" name="contact" id="contact"
    value="<?php echo isset($building) ? $building['contact'] : (isset($_POST['contact']) ? $_POST['contact'] :'' ); ?>" placeholder="add contact name" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Phone Office</label>
    <input type="number" name="phone" id="phone"
    value="<?php echo isset($building) ? $building['phone'] : (isset($_POST['phone']) ? $_POST['phone'] :'' ); ?>" placeholder="add phone number" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Email</label>
    <input type="email" name="email" id="email"
    value="<?php echo isset($building) ? $building['email'] : (isset($_POST['email']) ? $_POST['email'] :'' ); ?>" placeholder="add email" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Address</label>
    <input type="text" name="address" id="address"
    value="<?php echo isset($building) ? $building['address'] : (isset($_POST['address']) ? $_POST['address'] :'' ); ?>" placeholder="add address" required  class="form-control" ariscribedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection() ?>           