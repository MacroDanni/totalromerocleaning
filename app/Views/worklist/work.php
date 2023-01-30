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
        
                <table id="example3"  class="table table-hover table-striped ">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Edificio</th>
                    <th>Edificio-Habitación</th>
                   
                    <th>Fecha</th>
                    <th>Asignado a</th>
                    <th>Servicio</th>
                    <th>Estatus</th>
                    <th>Eliminar</th>
                    
                  </tr>
                  </thead>
                  <tbody>
                  <?php if ($worklist) :?>
                <?php foreach($worklist as $worklist): ?>
                 
                <tr>                    
                    <td><?=$worklist['id'] ?></td>
                    <td><?=$worklist['nameBuilding']; ?>
                 
                  </td>
                    <td><?= $worklist['numberBuilding'].'-'.$worklist['numroom'] ?></td>
                   
                    <td><?=date("m/d/Y", strtotime($worklist['fechaAseo'])) ?></td>
                    <td>
                    
                
                                      <input type="hidden" name="idworklist" value="<?=$worklist['id'] ?>">
               
                  <?php
                    if($worklist['status']==4){
                      ?>
                     <form method="POST" action="<?= base_url('salvarcancelado'); ?>" class="row g-3">
                  <?= csrf_field()?> 
                                      <input type="hidden" name="id" value="<?=$worklist['id'] ?>">
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
                        echo  $worklist['nameEmployee'];
                    }
                    ?>
                  </td>
                  
                  <td><?=$worklist['nameservice'] ?></td>
                    <td><?php 
                    if($worklist['status']==0){ echo '<p class="btn btn-warning btn-sm">En espera</p>';}elseif($worklist['status']==1){ echo '<p class="btn btn-success btn-sm">Aceptado</p>';}elseif($worklist['status']==2){ echo '<p class="btn btn-success btn-sm">Limpiando</p>';} elseif($worklist['status']==3){echo '<p class="btn btn-success btn-sm">Finalizado</p>';}elseif($worklist['status']==4){echo '<p class="btn btn-danger btn-sm">Cancelado</p>';} else{echo 'error';};
                    ?></td>
                    
                    <td>
                    <div class="btn-group btn-group-sm" role="group" aria-label="Basic mixed styles example">
                    <a href="<?= base_url('eliminartemp/'.$worklist['id'].'') ?>" type="button" class="btn btn-danger">Eliminar</a>
                    <!--<button type="button" class="btn btn-warning">Middle</button>-->
                  </div>
                    </td>
                   
               
                <?php endforeach ?>
                <?php endif  ?>
                </tr>


                  </tbody>
                  
                </table>
              </div>
              <!-- /.card-body -->
            </div>

<?= $this->endSection() ?>           