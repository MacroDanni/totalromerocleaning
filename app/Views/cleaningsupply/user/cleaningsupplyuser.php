<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>

<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Cleaning Supply
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Cleaning Supply List
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<a href="<?= base_url('newcleaningsupplyuser') ?>" type="button" class="btn btn-outline-success">Request a Cleaning Supply</a>


<div class="card-body">
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>

        <table class="table table-hover" id="example1">
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