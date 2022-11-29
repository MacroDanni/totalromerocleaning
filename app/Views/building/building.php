<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<?= $session->nickename ?>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Building
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Building List
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

<a href="<?= base_url('newBuilding') ?>" type="button" class="btn btn-outline-success">New Building</a>

              <!-- /.card-header -->
              <div class="card-body">
              <?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        
        <?php } ?>
                <table id="example1" class="table table-hover">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Property</th>
                    <th>Contact</th>
                    <th>Phone</th>
                    <th># Rooms</th>
                    <th>Address</th>
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
                    <td><?=$building['rooms'] ?></td>
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