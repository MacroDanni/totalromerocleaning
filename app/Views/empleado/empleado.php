<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Todo Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
Giovanna Romero Armenta 
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Empleados
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Empleados
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
Registros
<?= $this->endSection() ?>



<?= $this->section('content') ?>

<a href="<?= base_url('altaempleado') ?>" type="button" class="btn btn-outline-success">Alta Empleado</a>

 

<?php if ($flag = session()->getFlashdata('flag')) {  ?>
        <div class="alert alert-<?= $flag['type']; ?>" role="alert">
            <strong><?= $flag['msg']; ?></strong>
        </div>
        <?php } ?>

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Edad</th>
                    <th scope="col">Telefono</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fecha Ingreso</th>
                    <th scope="col">Tipo Cuenta</th>
                    <th scope="col"></th>
                </tr>
            </thead>

            <tbody>
                <?php if ($empleado) :?>
                <?php foreach($empleado as $empleado): ?>
                <tr>                    
                    <td><?=$empleado['nombre'].' '.$empleado['apellidoPaterno'] .' '.$empleado['apellidoMaterno']?></td>
                    <td><?=$empleado['edad'] ?></td>
                    <td><?=$empleado['telefono'] ?></td>
                    <td><?=$empleado['correoElectronico'] ?></td>
                    <td><?=$empleado['fechaIngreso'] ?></td>
                    <td><?=$empleado['tipo'] ?></td>
                    <td>
                    <a href="<?= base_url('editarEmpleado/'.$empleado['id']); ?>" class="btn btn-outline-warning">Editar</a>
                 
                    </td>
                    </tr>
                <?php endforeach ?>
                <?php endif ?>
            </tbody>
                
        </table>

<?= $this->endSection() ?>