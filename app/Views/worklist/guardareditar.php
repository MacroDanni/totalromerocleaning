<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal add Work
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Registrar nuevo trabajo
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

<form method="POST" action="<?= base_url('saveWorklist') ?>" enctype="multipart/form-data" class="row g-3">

    <?= csrf_field()?>

    <div class="col-md-4">
        <select class="form-select" name="building" required>
            <option value="" selected>Selecciona Edificio</option>
            <?php if ($building) :?>
            <?php foreach($building as $building): ?>
            <option value="<?= $building['property'] ?>"> <?=$building['property']?></option>
            <?php endforeach ?>
            <?php endif ?>
        </select>
    </div>

    <div class="col-md-4">
        <select class="form-select" name="employee" required>
            <option value="" selected>Selecciona Empleado</option>
            <?php if ($employee) :?>
            <?php foreach($employee as $employee): ?>
            <option value="<?= $employee['nickename'] ?>">
                <?=$employee['nombre'].' '.$employee['apellidoPaterno'].' '.$employee['apellidoMaterno'] ?></option>
            <?php endforeach ?>
            <?php endif ?>
        </select>
    </div>

    <div class="col-md-4">
        <select class="form-select" name="service" required aria-label="Default select example">
            <option value="" selected>Selecciona Servicio</option>
            <?php if ($services) :?>
            <?php foreach($services as $services): ?>
            <option value="<?= $services['name'] ?>"> <?=$services['name']?></option>
            <?php endforeach ?>
            <?php endif ?>
        </select>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label"># Edificio</label>
        <input type="number" name="numberBuilding" class="form-control" id="number" placeholder="ingresa # Edificio"
            required>
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label"># Habitación</label>
        <input type="number" name="numroom" class="form-control" id="number" placeholder="ingresa # Habitación">
    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Desde</label>
        <input type="text" id="fechadesde" name="fechadesde" class="form-control" required>

    </div>

    <div class="col-md-6">
        <label for="inputEmail4" class="form-label">Hasta</label> <input type="text" id="fechahasta" name="fechahasta"
            class="form-control">
    </div>


    <div class="col-12">
        <label for="inputAddress" class="form-label">Descripción</label>
        <textarea name="description" class="form-control" id="description" placeholder="Descripción"></textarea>
    </div>

    <button type="submit" class="btn btn-success">Guardar</button>
</form>

<?= $this->endSection() ?>