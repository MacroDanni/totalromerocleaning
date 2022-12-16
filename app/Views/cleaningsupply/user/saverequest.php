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



<form method="POST" action="<?= base_url('solicitando') ?>">

<?= csrf_field()  ?> 
                <div class="card-body">
                <div class="row">

                <div class="form-group col-sm-6">
                  <label for="exampleSelectBorder">Producto</label>
                  <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="product">
                  <?php echo isset($employee) ?  '<option value="'.$product['nombre'].'">'.$product['nombre'].'</option>': " <option selected>Seleccione</option>"; ?>
                  <?php if ($product) :?>
                <?php foreach($product as $product): ?>
                    <option value="<?=$product['nombre']?>"><?=$product['nombre']?> - (<?=$product['tipo']?>)</option>
                    <?php endforeach ?>
                <?php endif ?>
                  </select>
                </div>

                  </div>
                    </div>
                  </div>
          <HR></HR>

                <div class="card-footer">

                  <button type="submit" class="btn btn-success">Solicitar</button>
                 
                 

                </div>
              </form>

<?= $this->endSection() ?>           