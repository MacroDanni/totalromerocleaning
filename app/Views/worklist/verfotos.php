<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Ver Fotos
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Fotos trabajos finalizados
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>

<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="card-body">
    <?php if ($flag = session()->getFlashdata('flag')) {  ?>
    <div class="alert alert-<?= $flag['type']; ?>" role="alert">
        <strong><?= $flag['msg']; ?></strong>
    </div>
    <?php } ?>

    <div class="container text-center">
        <h2>Antes</h2>
        <hr>
        <div class="row">
            <?php if ($antes) :?>
            <?php foreach($antes as $antes): ?>

       

            <div class="card" style="width: 18rem;">
                <img src="<?= base_url('dist/img/reportes/'.$antes['nombre'].'');?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Descripción: </h5>
                    <p class="card-text">
                       <?= $antes['descripcion'] ?>
                    </p>
                    
                        <a href="http://totalromeroscleaning.test/dist/img/reportes/<?=$antes['nombre']?>" class="btn btn-primary"  target="_blank">Ver foto</a>
                </div>
            </div>


            <?php endforeach ?>
            <?php endif  ?>
        </div>
    </div>

    <hr>
    <hr>
    <div class="container text-center">
        <h2>Despues</h2>
        <hr>
        <div class="row">
            <?php if ($despues) :?>
            <?php foreach($despues as $despues): ?>

                <div class="card" style="width: 18rem;">
                <img src="<?= base_url('dist/img/reportes/'.$despues['nombre'].'');?>" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Descripción: </h5>
                    <p class="card-text">
                    <?= $despues['descripcion'] ?>
                    </p>
                    <a href="http://totalromeroscleaning.test/dist/img/reportes/<?=$despues['nombre']?>" class="btn btn-primary" target="_blank">Ver foto</a>
                </div>
            </div>

            <?php endforeach ?>
            <?php endif  ?>
        </div>
    </div>

    <?= $this->endSection() ?>