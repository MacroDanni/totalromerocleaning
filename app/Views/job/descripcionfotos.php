<?php $session = \Config\Services::session(); ?>
<?= $this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light">
    <?= $session->nickename ?>
</button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal De Limpieza
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Descripción
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?= date('l jS \of F Y H:i:s'); ?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>





<form method="POST" action="<?= base_url('guardardescripcionfotos') ?>" enctype="multipart/form-data" class="row g-3">
<?= csrf_field() ?>
    <div class="card-body">

        <div class="row">

            Descripcion por fotos (Opcional):
            <HR>
            </HR>
            <table id="example2" class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>Foto</th>

                    </tr>
                </thead>
                <tbody>
               
                    <?php if ($fotos) :?>
                    <?php foreach($fotos as $foto): ?>
                    <tr>
                        <td>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= base_url('dist/img/reportes/'.$foto['nombre'].'');?>"
                                            class="img-fluid rounded-start" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title">Descripción</h5>
                                            <p class="card-text">
                                                <input type="hidden" value="<?= $foto['idworklist'] ?>" name="idworklist">
                                                <input type="hidden" value="<?= $foto['idordenworklist'] ?>" name="idordenworklist">
                                                <textarea class="form-control" name="descripcion[<?= $foto['id'] ?>]" id="descripcion"
                                                    rows="3"></textarea>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </td>
                    </tr>
                    <?php endforeach ?>
                    <?php endif  ?>


                </tbody>

            </table>

            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
    </div>
    </div>

    <?= $this->endSection() ?>