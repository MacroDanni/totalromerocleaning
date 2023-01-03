<?php $session = \Config\Services::session(); ?>
<?= $this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal De Limpieza
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Trabajo Finalizado
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?= date('l jS \of F Y H:i:s'); ?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>



<?= csrf_field()  ?>

<?php
date_default_timezone_set('America/Chicago');
$fecha_i = $cleanedup['dateinprocesscleaning'];
$fecha_f = date("Y/m/d H:i:s");
$minutos = ((strtotime($fecha_i) - strtotime($fecha_f)) / 60);
$minutos = abs($minutos);
$minutos = floor($minutos);
?>
<form method="POST" action="<?= base_url('jobfinished') ?>" enctype="multipart/form-data" class="row g-3">

  <div class="card-body">

    <?php if ($minutos >= 180) { ?>
      <div class="d-grid gap-2 col-6 mx-auto">

        <button type="submit" class="btn btn-success">Finalizado</button>
      </div>
      <HR>
      </HR>
    <?php } ?>

    Detalles de la limpieza:
    <HR>
    </HR>
    <div class="row">

      <div class="form-group col-sm-12">
        <label>Subir imagenes para el reporte ( Opcional )</label>
        <input type="file" name="imagensubida[]" multiple accept="image/png, .jpeg, .jpg, image/gif">

      </div>
    </div>

    <div class="row">


      <div class="form-group col-sm-4">
        <label>Company</label>
        <input type="hidden" name="id" value="<?= $cleanedup['id'] ?>">
        <input type="text" class="form-control" id="nameBusiness" name="nameBusiness" value="<?= $cleanedup['nameBusiness'] ?>" disabled>
      </div>

      <div class="form-group col-sm-4">
        <label>Nicke name</label>
        <input type="text" class="form-control" id="nickename" name="nickename" value="<?= $cleanedup['nameEmployee'] ?>" disabled>
      </div>

      <div class="form-group col-sm-4">
        <label>Edificio</label>
        <input type="text" class="form-control" id="nameBuilding" name="nameBuilding" value="<?= $cleanedup['nameBuilding'] ?>" disabled>
      </div>

    </div>
    <div class="row">
      <div class="form-group col-sm-4">
        <label>Servicio</label>
        <input type="text" class="form-control" id="nameservice" name="nameservice" value="<?= $cleanedup['nameservice'] ?>" disabled>
      </div>

      <div class="form-group col-sm-4">
        <label># Habitación</label>
        <input type="text" class="form-control" id="numroom" name="numroom" value="<?= $cleanedup['numroom'] ?>" disabled>
      </div>

      <div class="form-group col-sm-4">
        <label>Cita Limpieza</label>
        <input type="text" class="form-control" id="fechaAseo" name="fechaAseo" value="<?= $cleanedup['fechaAseo'] ?>" disabled>
      </div>

      <div class="form-group col-sm-4">
        <label>Trabajo Aceptado</label>
        <input type="text" class="form-control" id="dateagreetoclean" name="dateagreetoclean" value="<?= $cleanedup['dateagreetoclean'] ?>" disabled>
      </div>

      <div class="form-group col-sm-4">
        <label>En proceso de limpieza</label>
        <input type="text" class="form-control" id="dateinprocesscleaning" name="dateinprocesscleaning" value="<?= $cleanedup['dateinprocesscleaning'] ?>" disabled>
      </div>


      <div class="form-group col-sm-3">
        <label>Trabajo finalizado</label>
        <input type="text" class="form-control" id="cleaned" name="cleaned" value="<?= date('Y-m-d H:i:s'); ?>" disabled>
      </div>

    </div>




    <?= $this->endSection() ?>