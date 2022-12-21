<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
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


<div class="card-body"> 
                <table id="example2" class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Edificio</th>
                    <th># Habitacion</th>
                    <th>Fecha</th>
                    <th>Servicio</th>
                    <th>Estatus</th>
                    <th></th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if ($job) :?>
                <?php foreach($job as $job): ?>
                <tr>                    
                    <td ><?= ($job['status']!=0 and $job['status']!=4) ? $job['id'] : "******" ?></td>
                    <td> <?= ($job['status']!=0 and $job['status']!=4) ? $job['nameBuilding'] : "******" ?> </td>
                    <td> <?= ($job['status']!=0 and $job['status']!=4) ? $job['numroom'] : "******" ?> </td>
                    <td> <?= date("m/d/Y", strtotime($job['fechaAseo'])) ?> </td>
                    <td> <?= $job['nameservice'] ?> </td>
             
                    <td><?php 
                    if($job['status']==0){ echo 'En Espera';}elseif($job['status']==1){ echo '<p class="btn btn-success btn-sm">Aceptado</p>';}elseif($job['status']==2){ echo '<p  class="btn btn-secondary btn-sm">En proceso</p>';} elseif($job['status']==3){echo '<p  class="btn btn-success btn-sm">Finalizado</p>';}elseif($job['status']==4){echo '<p  class="btn btn-danger btn-sm">Cancelado</p>';} else{echo 'error';};
                    ?></td>
                    <td>
                      <?php
                      if($job['status']==0){ 
                        ?>
                        <a href="<?=base_url('acceptjob/'.$job['id']) ?>"  class="btn btn-success">Aceptar</a>
                        <a href="<?=base_url('canceljob/'.$job['id']) ?>"  class="btn btn-danger">Cancelar</a>
                        
                              
                     <?php }
                     elseif($job['status']==1 and  date('Y-m-d') >= $job['fechaAseo']){ 
                      ?>
                      <a href="<?=base_url('startjob/'.$job['id']) ?>"  class="btn btn-outline-success">Iniciar Trabajo</a>
                      <?php }
                       elseif($job['status']==2){ 
                        ?>
                        <a href="<?=base_url('cleaningfinished/'.$job['id']) ?>"  class="btn btn-outline-success">Trabajo Finalizado</a>
                        <?php }
                        else{echo "------";}
                   

                      ?>
                    
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