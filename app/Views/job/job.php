<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Trabajos
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Lista de Trabajos
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
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if ($job) :?>
            <?php foreach($job as $job): ?>
            <tr>
                <td><?= ($job['status']!=0 and $job['status']!=4) ? $job['id'] : "******" ?></td>
                <td> <?= ($job['status']!=0 and $job['status']!=4) ? '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-hospital" viewBox="0 0 16 16">
  <path d="M8.5 5.034v1.1l.953-.55.5.867L9 7l.953.55-.5.866-.953-.55v1.1h-1v-1.1l-.953.55-.5-.866L7 7l-.953-.55.5-.866.953.55v-1.1h1ZM13.25 9a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM13 11.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Zm.25 1.75a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5Zm-11-4a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5A.25.25 0 0 0 3 9.75v-.5A.25.25 0 0 0 2.75 9h-.5Zm0 2a.25.25 0 0 0-.25.25v.5c0 .138.112.25.25.25h.5a.25.25 0 0 0 .25-.25v-.5a.25.25 0 0 0-.25-.25h-.5ZM2 13.25a.25.25 0 0 1 .25-.25h.5a.25.25 0 0 1 .25.25v.5a.25.25 0 0 1-.25.25h-.5a.25.25 0 0 1-.25-.25v-.5Z"/>
  <path d="M5 1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1a1 1 0 0 1 1 1v4h3a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V8a1 1 0 0 1 1-1h3V3a1 1 0 0 1 1-1V1Zm2 14h2v-3H7v3Zm3 0h1V3H5v12h1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3Zm0-14H6v1h4V1Zm2 7v7h3V8h-3Zm-8 7V8H1v7h3Z"/>
</svg> '.$job['nameBuilding'] : "******" ?> </td>
                <td> <?= ($job['status']!=0 and $job['status']!=4) ? $job['numroom'] : "******" ?> </td>
                <td>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-calendar-week" viewBox="0 0 16 16">
                        <path
                            d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z" />
                        <path
                            d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                    </svg>
                    <?= date("m/d/Y", strtotime($job['fechaAseo'])) ?>
                </td>
                <td> <?= $job['nameservice'] ?> </td>

                <td><?php 
                    if($job['status']==0){ echo 'En Espera';}elseif($job['status']==1){ echo '<p class="btn btn-success btn-sm">Aceptado</p>';}elseif($job['status']==2){ echo '<p  class="btn btn-secondary btn-sm">En proceso</p>';} elseif($job['status']==3){echo '<p  class="btn btn-success btn-sm">Finalizado</p>';}elseif($job['status']==4){echo '<p  class="btn btn-danger btn-sm">Cancelado</p>';} else{echo 'error';};
                    ?></td>
<td>
                <?php    if($job['status']==2){  ?>
                

                    <?php
                if($job['estatusimagen']==0){
                ?>
                
                    <a href="<?=base_url('fotosantes/'.$job['id'].'')?>" class="btn btn-primary"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-images" viewBox="0 0 16 16">
                            <path d="M4.502 9a1.5 1.5 0 1 0 0-3 1.5 1.5 0 0 0 0 3z" />
                            <path
                                d="M14.002 13a2 2 0 0 1-2 2h-10a2 2 0 0 1-2-2V5A2 2 0 0 1 2 3a2 2 0 0 1 2-2h10a2 2 0 0 1 2 2v8a2 2 0 0 1-1.998 2zM14 2H4a1 1 0 0 0-1 1h9.002a2 2 0 0 1 2 2v7A1 1 0 0 0 15 11V3a1 1 0 0 0-1-1zM2.002 4a1 1 0 0 0-1 1v8l2.646-2.354a.5.5 0 0 1 .63-.062l2.66 1.773 3.71-3.71a.5.5 0 0 1 .577-.094l1.777 1.947V5a1 1 0 0 0-1-1h-10z" />
                        </svg> Fotos del antes</a>
                        
                    <?php } ?>
               
                    
               
             
                <?php } ?>
                </td>
                <td>
                    <?php
                      if($job['status']==0){ 
                        ?>
                    <a href="<?=base_url('acceptjob/'.$job['id']) ?>" class="btn btn-success">Aceptar</a>
                    <a href="<?=base_url('canceljob/'.$job['id']) ?>" class="btn btn-danger">Cancelar</a>


                    <?php }
                     elseif($job['status']==1 and  date('Y-m-d') >= $job['fechaAseo']){ 
                      ?>
                    <a href="<?=base_url('startjob/'.$job['id']) ?>" class="btn btn-success">Iniciar Trabajo</a>
                    <?php }
                       elseif($job['status']==2){ 
                        ?>
                    <a href="<?=base_url('cleaningfinished/'.$job['id']) ?>" class="btn btn-success">Finalizar
                        Trabajo</a>

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