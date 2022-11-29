<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
Giovanna Romero Armenta 
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Employees
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Employees
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Registration -- <?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<a href="<?= base_url('altaemployee') ?>" type="button" class="btn btn-outline-success">New Employee</a>


<div class="card-body">
<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>

        <table class="table table-hover" id="example1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date of Birth</th>
                    <th scope="col">Account Type</th>
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