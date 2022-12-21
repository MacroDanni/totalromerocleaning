<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Lista de Trabajo
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Lista de trabajo
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<a href="<?= base_url('guardareditar') ?>" type="button" class="btn btn-outline-success">Nuevo Trabajo </a> 
 <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="card-body"> 
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>
        
                <table id="example1"  class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Edificio</th>
                    <th># Edificio</th>
                    <th># Habitacion</th>
                    <th>Fecha</th>
                    <th>Asignado a</th>
                    <th>Servicio</th>
                    <th>Estatus</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if ($worklist) :?>
                <?php foreach($worklist as $worklist): ?>
                <tr>                    
                    <td><?=$worklist['id'] ?></td>
                    <td><?=$worklist['nameBuilding']; ?>
                 
                  </td>
                    <td><?php if($worklist['numberBuilding']==6){echo 'All';} else{ echo $worklist['numberBuilding'];} ?></td>
                    <td><?=$worklist['numroom'] ?></td>
                    <td><?=date("m/d/Y", strtotime($worklist['fechaAseo'])) ?></td>
                    <td>
                    
                  <?= $worklist['nameEmployee']; ?>
                  </td>
                  
                  <td><?=$worklist['nameservice'] ?></td>
                    <td><?php 
                    if($worklist['status']==0){ echo '<p class="btn btn-warning btn-sm">En espera..</p>';}elseif($worklist['status']==1){ echo '<p class="btn btn-success btn-sm">Aceptado por</p>';}elseif($worklist['status']==2){ echo '<p class="btn btn-success btn-sm">En proceso</p>';} elseif($worklist['status']==3){echo '<p class="btn btn-success btn-sm">Trabajo Finalizado</p>';}elseif($worklist['status']==4){echo '<p class="btn btn-danger btn-sm">Cancelado</p>';} else{echo 'error';};
                    ?></td>
                    
                    <td>
                    <a href="<?= base_url('editarworklist/'.$worklist['id']); ?>" class="btn btn-outline-warning">Editar</a>
                    </td>
                </tr>
                <?php endforeach ?>
                <?php endif  ?>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

<?= $this->endSection() ?>           