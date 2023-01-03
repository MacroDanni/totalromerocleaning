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
            <div class="row">
            <?php if ($fotos) :?>
                <?php foreach($fotos as $fotos): ?>
                    
                    <div class="col-4">
                             <img src="<?= base_url('dist/img/reportes/'.$fotos['nombre'].'');?>" class="img-thumbnail" alt="...">
                     </div>
                
                <?php endforeach ?>
        <?php endif  ?>
            </div>
        </div>
       
<?= $this->endSection() ?>           