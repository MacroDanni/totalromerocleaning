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
trabajos Finalizados
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
                    <th>Estatus</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php if ($finalizados) :?>
                <?php foreach($finalizados as $finalizados): ?>
                 
                <tr>                    
                    <td><?=$finalizados['id'] ?></td>
                    <td><?=$finalizados['nameBuilding']; ?>
                 
                  </td>
                    <td><?php if($finalizados['numberBuilding']==6){echo 'All';} else{ echo $finalizados['numberBuilding'];} ?></td>
                    <td><?=$finalizados['numroom'] ?></td>
                    <td><?=date("m/d/Y", strtotime($finalizados['fechaAseo'])) ?></td>
                    <td>
                    
                
                                      <input type="hidden" name="idworklist" value="<?=$finalizados['id'] ?>">
               
                  <?php
                    if($finalizados['status']==4){
                      ?>
                     <form method="POST" action="<?= base_url('salvarcancelado'); ?>" class="row g-3">
                  <?= csrf_field()?> 
                                      <input type="hidden" name="id" value="<?=$finalizados['id'] ?>">
                                            <div class="col-md-12">
                                                        <select class="form-select" name="nickename" required aria-label="Default select example">
                                                          <option selected>Selecciona Empleado</option>
                                                        <?php if ($employee) :?>
                                                                        <?php foreach($employee as $employee): ?>
                                                                          <option value="<?= $employee['nickename'] ?>"> <?=$employee['nombre'].' '.$employee['apellidoPaterno'].' '.$employee['apellidoMaterno'] ?></option>
                                                                <?php endforeach ?>
                                                                <?php endif ?>
                                                </select>
                                                </div>
                                                <button type="submit" class="btn btn-success btn-sm">Guardar</button>
                          </form>
                      <?php
                    }
                    else{
                        echo  $finalizados['nameEmployee'];
                    }
                    ?>
                  </td>
                  
                  <td><?=$finalizados['nameservice'] ?></td>
                    <td><?php 
                    if($finalizados['status']==0){ echo '<p class="btn btn-warning btn-sm">En espera</p>';}elseif($finalizados['status']==1){ echo '<p class="btn btn-success btn-sm">Aceptado</p>';}elseif($finalizados['status']==2){ echo '<p class="btn btn-success btn-sm">Limpiando</p>';} elseif($finalizados['status']==3){echo '<p class="btn btn-success btn-sm">Finalizado</p>';}elseif($finalizados['status']==4){echo '<p class="btn btn-danger btn-sm">Cancelado</p>';} else{echo 'error';};
                    ?></td>
                    
                   
                </tr>
                <?php endforeach ?>
                <?php endif  ?>
                  
                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

<?= $this->endSection() ?>           