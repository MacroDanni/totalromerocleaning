<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<?= $session->nickename ?>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal add Work 
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
New Work
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Add Event  -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>



<?= $this->section('content') ?>

<form method="POST" action="<?= base_url('saveWorklist') ?>" class="row g-3">

<?= csrf_field()?> 


<div class="col-md-6">
<select class="form-select" name="business" required aria-label="Default select example">
 <?php if ($business) :?>
                <?php foreach($business as $business): ?> 
                  <option value="<?= $business['nombre'] ?>"> <?=$business['nombre']?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>

<div class="col-md-6">
<select class="form-select" name="building" required aria-label="Default select example">
<option selected>Select Building</option>
 <?php if ($building) :?>
                <?php foreach($building as $building): ?> 
                  <option value="<?= $building['property'] ?>"> <?=$building['property']?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>

<div class="col-md-6">
<select class="form-select" name="employee" required aria-label="Default select example">
  <option selected>Select Employee</option>
 <?php if ($employee) :?>
                <?php foreach($employee as $employee): ?>
                  <option value="<?= $employee['nickename'] ?>"> <?=$employee['nombre'].' '.$employee['apellidoPaterno'].' '.$employee['apellidoMaterno'] ?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>

<div class="col-md-6">
<select class="form-select" name="service" required aria-label="Default select example">
<option selected>Select Services</option>
 <?php if ($services) :?>
                <?php foreach($services as $services): ?> 
                  <option value="<?= $services['name'] ?>"> <?=$services['name']?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"># Room</label>
    <input type="number" name="numroom" required class="form-control" id="number" placeholder="Room Number">
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Date</label>
    <input type="date" name="date" required class="form-control" id="date">
  </div>


  <div class="col-12">
    <label for="inputAddress" class="form-label">Description</label>
    <input type="textarea" name="description"  class="form-control" id="description" placeholder="Details Extra">
  </div>
  
<button type="submit" class="btn btn-success">Success</button>
</form>

<?= $this->endSection() ?>           