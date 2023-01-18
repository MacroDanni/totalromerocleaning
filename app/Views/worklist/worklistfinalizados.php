<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Trabajos Finalizados
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Trabajos Finalizados
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
        
                <table id="example3"  class="table table-hover table-striped">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Edificio</th>
                    <th># Edificio</th>
                    <th># Habitacion</th>
                    <th>Fecha</th>
                    <th>Asignado a</th>
                    <th>Servicio</th>
                    <th>Fotos</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php if ($finalizados) :?>
                <?php foreach($finalizados as $finalizados): ?>
                 
                <tr>                    
                    <td><?=$finalizados['id'] ?></td>
                    <td><?=$finalizados['nameBuilding']; ?></td>
                    <td><?php if($finalizados['numberBuilding']==6){echo 'All';} else{ echo $finalizados['numberBuilding'];} ?></td>
                    <td><?=$finalizados['numroom'] ?></td>
                    <td><?=date("m/d/Y", strtotime($finalizados['fechaAseo'])) ?></td>
                    <td>
                        <input type="hidden" name="idworklist" value="<?=$finalizados['id'] ?>">
                        <?=  $finalizados['nameEmployee'] ?>
                  </td>
                  <td><?=$finalizados['nameservice'] ?></td>
                  <td>
                    <?php
                        if($finalizados['estatusimagen']==0){ }
                        else{
                            ?>
                              <form method="POST" action="<?= base_url('verfotos') ?>">
                                  <input type="hidden" name="idworklist" value="<?=$finalizados['id'] ?>">
                                  <input type="hidden" name="nickname" value="<?=$finalizados['nameEmployee'] ?>">
                                  <button type="submit" class="btn btn-warning btn-sm">Ver Fotos</button>
                              </form>

                        <?php
                        }
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