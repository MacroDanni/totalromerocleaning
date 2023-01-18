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

<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>
        
<form method="POST" action="<?= base_url('saveWorklist') ?>"  enctype="multipart/form-data" class="row g-3">

<?= csrf_field()?> 

<div class="col-md-6">
<select class="form-select" name="building" required aria-label="Default select example">
<option selected>Selecciona Edificio</option>
 <?php if ($building) :?>
                <?php foreach($building as $building): ?> 
                  <option value="<?= $building['property'] ?>"> <?=$building['property']?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>

<div class="col-md-6">
<select class="form-select" name="employee" required aria-label="Default select example">
  <option selected>Selecciona Empleado</option>
 <?php if ($employee) :?>
                <?php foreach($employee as $employee): ?>
                  <option value="<?= $employee['nickename'] ?>"> <?=$employee['nombre'].' '.$employee['apellidoPaterno'].' '.$employee['apellidoMaterno'] ?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>

<div class="col-md-6">
<select class="form-select" name="service" required aria-label="Default select example">
<option selected>Selecciona Servicio</option>
 <?php if ($services) :?>
                <?php foreach($services as $services): ?> 
                  <option value="<?= $services['name'] ?>"> <?=$services['name']?></option>
                <?php endforeach ?>
                <?php endif ?>
</select>
</div>

<div class="col-md-6">
<select class="form-select" name="numberBuilding" required aria-label="Default select example">
<option selected>Seleccione # Edificio</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="5">6</option>
  <option value="5">7</option>
  <option value="5">8</option>
  <option value="5">9</option>
  <option value="6">Todo</option>
</select>
</div>

  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"># Habitación</label>
    <input type="number" name="numroom"  class="form-control" id="number" placeholder="# Habitación">
  </div>

  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Fecha</label>
    <input type="date" name="date" required class="form-control" multiple id="date">
  </div>


  <div class="col-12">
    <label for="inputAddress" class="form-label">Descripción</label>
    <input type="textarea" name="description"  class="form-control" id="description" placeholder="Descripción">
  </div>
  
<button type="submit" class="btn btn-success">Guardar</button>
</form>

<?= $this->endSection() ?>           