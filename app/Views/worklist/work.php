<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
Giovanna Romero Armenta
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Work list
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Work List
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Events  -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<a href="<?= base_url('guardareditar') ?>" type="button" class="btn btn-outline-success">New Work</a>

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
                    <th>Building</th>
                    <th># Rooms</th>
                    <th>Date</th>
                    <th>Assigned to</th>
                    <th>Service</th>
                    <th>Status</th>
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
                    <td><?=$worklist['numroom'] ?></td>
                    <td><?=$worklist['fechaAseo'] ?></td>
                    <td>
                    
                  <?= $worklist['nameEmployee']; ?>
                  </td>
                  
                  <td><?=$worklist['nameservice'] ?></td>
                    <td><?php 
                    if($worklist['status']==0){ echo 'On hold';}elseif($worklist['status']==1){ echo 'Employee accepts';}elseif($worklist['status']==2){ echo 'In process';} elseif($worklist['status']==3){echo 'cleaning finished';}elseif($worklist['status']==4){echo 'Cleansed';}elseif($worklist['status']==4){echo 'Employee rejection';} else{echo 'error';};
                    ?></td>
                    
                    <td>
                    <a href="<?= base_url('editarworklist/'.$worklist['id']); ?>" class="btn btn-outline-warning">Edit</a>
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