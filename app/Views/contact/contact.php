<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Contact
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Contact
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
     <!-- Message Start -->

     <div class="media">
              <img src="../../dist/img/user8-128x128fd.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Paulette Romero
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Phone: +1 (952) 4636 749</p>
                <p class="text-sm ">Email: pauletteromero@totalromeroscleaning.com</p>
              </div>
            </div>
            <!-- Message End -->

<?= $this->endSection() ?>           