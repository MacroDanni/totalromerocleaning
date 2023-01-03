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
Lista de Suministros
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<a href="<?= base_url('newcleaningsupply') ?>" type="button" class="btn btn-outline-success">Nuevo Suministro</a> <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>



<div class="card-body">
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>

        <table  id="example1" class="table table-hover table-striped">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Fecha Solicitud</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php if ($Product) :?>
                <?php foreach($Product as $Product): ?>
                <tr>                    
                    <td><?=$Product['nombre']?></td>
                    <td><?=$Product['tipo'] ?></td>
                    <td><?=$Product['fecharegistro'] ?></td>
                    <td>
                         <a href="<?= base_url('editcleaningsupply/'.$Product['id']); ?>" class="btn btn-outline-warning">Editar</a>
                    </td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
                
        </table>
                </div>

<?= $this->endSection() ?>           