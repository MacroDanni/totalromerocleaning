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
Nuevo Suministro
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<form method="POST" action="<?php echo isset($cleaningsupply) ?  base_url('saveedit/'.$cleaningsupply['id'].''):  base_url('savecleaningsupply') ?>">

<?= csrf_field()  ?> 
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-sm-6" >
                    <label >Nombre del Producto</label>
                    <input type="hidden" name="id" value="<?php echo isset($cleaningsupply) ? $cleaningsupply['id'] : (isset($_POST['id']) ? $_POST['id'] :'' ); ?>">
                    <input type="text" class="form-control" id="nombre" name="nombre" 
                    value="<?php echo isset($cleaningsupply) ? $cleaningsupply['nombre'] : (isset($_POST['nombre']) ? $_POST['nombre'] :'' ); ?>" required>
                  </div>
                  </div>
                 
                <div class="row">

                <div class="form-group col-sm-4">
                  <label for="exampleSelectBorder">Tipo de producto</label>
                  <select class="custom-select form-control-border" name="tipo" id="tipo" required>
                   
                  <?php echo isset($cleaningsupply) ?  '<option value="'.$cleaningsupply['tipo'].'">'.$cleaningsupply['tipo'].'</option>': " <option selected>Select</option>"; ?>
                  
                    <option value="Piso">Piso</option>
                    <option value="Espejos">Espejos</option>
                    <option value="Puertas">Puertas</option>
                    <option value="Aroma">Aroma</option>                    
                    <option value="Elevador">Elevador</option>              
                    <option value="Alfombra">Alfombra</option>            
                    <option value="Alfombra">Estufa</option>
                  </select>
                </div>


                <div class="card-footer">
                
                  <button type="submit" class="btn btn-success">Save Cleaning Supply</button>
                </div>
              </form>



<?= $this->endSection() ?>           