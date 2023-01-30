<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Solicitudes
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Lista de Suministros
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<a href="<?= base_url('newcleaningsupply') ?>" type="button" class="btn btn-outline-success">Nuevo Suministro</a>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<div class="card-body">
    <?php if ($flag = session()->getFlashdata('flag')) {  ?>
    <div class="alert alert-<?= $flag['type']; ?>" role="alert">
        <strong><?= $flag['msg']; ?></strong>
    </div>
    <?php } ?>

    <table id="example9" class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Alias</th>
                <th scope="col">Fecha Solicitud</th>
                <th scope="col"></th>
            </tr>
        </thead>

        <tbody>
            <?php if ($solicitud) :?>
            <?php foreach($solicitud as $solicitud): ?>
            <tr>
                <td><?=$solicitud['nombre']?></td>
                <td><?=$solicitud['nickname'] ?></td>
                <td><?=$solicitud['fecharegistro'] ?></td>
                <td>
                    <?php
                        if($solicitud['estatus']==0){
                        ?>
                    <a href="<?= base_url('aceptarsuministro/'.$solicitud['id']); ?>"
                        class="btn btn-success btn-sm">Aceptar</a>
                    <a href="<?= base_url('declinarsuministro/'.$solicitud['id']); ?>"
                        class="btn btn-danger btn-sm">Declinar</a>
                    <?php } 
                        elseif($solicitud['estatus']==1){
                            ?>
                    <spam
                        class="btn btn-success btn-sm">Aceptado</spam>
                    <?php
                        } ?>
                </td>
            </tr>
            <?php endforeach ?>
            <?php endif ?>
        </tbody>

    </table>
</div>

<?= $this->endSection() ?>