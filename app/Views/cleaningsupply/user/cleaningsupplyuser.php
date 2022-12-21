<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>

<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Suministros
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Lista de Suministros
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<a href="<?= base_url('newcleaningsupplyuser') ?>" type="button" class="btn btn-outline-success">Nueva Solicitud</a> 
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>





<div class="card-body">
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>

        <table  id="example1"  class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Nickname</th>
                    <th scope="col">Estatus</th>
                </tr>
            </thead>

            <tbody>
                <?php if ($cleaningsupply) :?>
                <?php foreach($cleaningsupply as $cleaningsupply): ?>
                <tr>                    
                    <td><?=$cleaningsupply['nombre']?></td>
                    <td><?=$cleaningsupply['nickname'] ?></td>
                    <td>
                        <?php 
                        if($cleaningsupply['estatus']==1){ 
                            echo '<button type="button" class="btn btn-primary btn-sm">Enviado</button>';
                        }
                            elseif($cleaningsupply['estatus']==2){
                                echo '<button type="button" class="btn btn-primary btn-sm">En Proceso</button>';
                            }
                            else{
                               echo  '';
                            }

                        ?>
                          </td>
                
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
                
        </table>
                </div>

<?= $this->endSection() ?>           