<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Empleados
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Alta Empleado
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<a href="<?= base_url('altaemployee') ?>" type="button" class="btn btn-outline-success">Nuevo Empleado</a> <?=  date('l jS \of F Y H:i:s');?>
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
                    <th scope="col">Telefono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Fecha Cumpleaños</th>
                    <th scope="col">Tipo Cuenta</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php if ($employee) :?>
                <?php foreach($employee as $employee): ?>
                <tr>                    
                    <td><?=$employee['nombre'].' '.$employee['apellidoPaterno'] .' '.$employee['apellidoMaterno']?></td>
                    <td><?=$employee['telefono'] ?></td>
                    <td><?=$employee['correoElectronico'] ?></td>
                    <td><?=$employee['fechanacimiento'] ?></td>
                    <td><?=$employee['tipo'] ?></td>
                    <td><script> echo  $e= moment("20111031", "YYYYMMDD").fromNow();</script>
                    <a href="<?= base_url('editaremployee/'.$employee['id']); ?>" class="btn btn-outline-warning">Editar</a>
                 
                    </td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
                
        </table>
                </div>
<?= $this->endSection() ?>