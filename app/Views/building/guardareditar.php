<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
Giovanna Romero Armenta 
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


<form method="POST" action="<?=  isset($building) ? base_url('guardarEditar') :  base_url('savebuilding')  ?>">

<?= csrf_field()  ?> 
  <div class="mb-3">
    <label for="email" class="form-label">Property</label>
    <input type="text" name="property" id="property" placeholder="add property name"  required class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Contact Name</label>
    <input type="text" name="contact" id="contact" placeholder="add contact name" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Phone Office</label>
    <input type="number" name="phone" id="phone" placeholder="add phone number" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label"># Rooms</label>
    <input type="number" name="rooms" id="rooms" placeholder="add rooms number" required  class="form-control" ariscribedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="email" class="form-label">Address</label>
    <input type="text" name="address" id="address" placeholder="add address" required  class="form-control" ariscribedby="emailHelp">
  </div>


  <button type="submit" class="btn btn-primary">Save</button>
</form>

<?= $this->endSection() ?>           