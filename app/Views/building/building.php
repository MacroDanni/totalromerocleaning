<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Edificios
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Lista de Edificios
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<a href="<?= base_url('newBuilding') ?>" type="button" class="btn btn-outline-success">Nuevo Edificio</a>  <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>


              <!-- /.card-header -->
              <div class="card-body">
              <?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        
        <?php } ?>
                <table id="example1" class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Propiedad</th>
                    <th>Contacto</th>
                    <th>Telefono</th>
                    <th>Correo</th>
                    <th>Dirección</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if ($building) :?>
                <?php foreach($building as $building): ?>
                <tr>                    
                    <td><?=$building['id'] ?></td>
                    <td><?=$building['property'] ?></td>
                    <td><?=$building['contact'] ?></td>
                    <td><?=$building['phone'] ?></td>
                    <td><?=$building['email'] ?></td>
                    <td><?=$building['address'] ?></td>
                    <td>
                    <a href="<?= base_url('editarbuilding/'.$building['id']); ?>" class="btn btn-outline-warning">Editar</a>
                 
                    </td>
                </tr>
                <?php endforeach ?>
                <?php endif ?>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>


<?= $this->endSection() ?>           