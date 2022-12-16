<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Change Password
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Change Password
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Por favor cambie su contraseña <?= $session->nickename ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


      <form action="<?= base_url('savepasswordemployee') ?>" method="post" ?>
      <?= csrf_field()?> 

        <div class="input-group mb-3">
          <input type="text" name="password1" class="form-control" placeholder="New Password" required>
          <input type="hidden" name="id" class="form-control" value="<?= $session->id ?>">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="text" name="password2" class="form-control" placeholder="Repeat password" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
     
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            
          </div>
          <!-- /.col -->
        </div>
      </form>


<?= $this->endSection() ?>