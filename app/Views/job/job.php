<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<?= $session->nikename ?>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Jobs
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Jobs List
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>




<?= $this->endSection() ?>


<?= $this->section('content') ?>
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" id="liveToast" role="alert">
            <h6> <?= $flag['msg']; ?></h6>
        </div>
        <?php } ?>
<a href="<?= base_url('guardareditar') ?>" type="button" class="btn btn-outline-success">New Work</a>

<div class="card-body"> 
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
                  <?php if ($job) :?>
                <?php foreach($job as $job): ?>
                <tr>                    
                    <td ><?= ($job['status']!=0) ? $job['id'] : "******" ?></td>
                    <td> <?= ($job['status']!=0) ? $job['nameBuilding'] : "******" ?> </td>
                    <td> <?= ($job['status']!=0) ? $job['numroom'] : "******" ?> </td>
                    <td> <?= $job['fechaAseo'] ?> </td>
                    <td> <?= $job['nameEmployee'] ?> </td>
                    <td> <?= $job['nameservice'] ?> </td>
             
                    <td><?php 
                    if($job['status']==0){ echo 'On hold';}elseif($job['status']==1){ echo 'Employee accepts';}elseif($job['status']==2){ echo 'In process';} elseif($job['status']==3){echo 'cleaning finished';}elseif($job['status']==4){echo 'Cleansed';}elseif($job['status']==4){echo 'Employee rejection';} else{echo 'error';};
                    ?></td>
                    <td>
                  
                    
                    <a href="<?php if($job['status']==0  ){ echo base_url('acceptjob/'.$job['id']); }elseif($job['status']==1){ echo base_url('startjob/'.$job['id']);}elseif($job['status']==2){ echo base_url('cleaningfinished/'.$job['id']);}  ?>" class="btn btn-outline-success"><?php if($job['status']==0  ){echo "Accept Job"; }elseif($job['status']==1){ echo "Start Cleaning";}elseif($job['status']==2){ echo "Cleaning Finished";}  ?></a>
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