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
New Cleaning Supply 
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>


<form method="POST" action="<?=  isset($cleaningsupply) ? base_url('edit') :  base_url('savecleaningsupply')  ?>">

<?= csrf_field()  ?> 
                <div class="card-body">
                <div class="row">
                  <div class="form-group col-sm-6" >
                    <label >Product Name</label>
                    <input type="hidden" name="id" value="<?php echo isset($cleaningsupply) ? $cleaningsupply['id'] : (isset($_POST['id']) ? $_POST['id'] :'' ); ?>">
                    <input type="text" class="form-control" id="name" name="name" 
                    value="<?php echo isset($cleaningsupply) ? $cleaningsupply['name'] : (isset($_POST['name']) ? $_POST['name'] :'' ); ?>" required>
                  </div>
                  </div>
                 
                <div class="row">

                <div class="form-group col-sm-4">
                  <label for="exampleSelectBorder">Kind of Product</label>
                  <select class="custom-select form-control-border" name="kind" id="kind" required>
                   
                  <?php echo isset($cleaningsupply) ?  '<option value="'.$cleaningsupply['kind'].'">'.$cleaningsupply['kind'].'</option>': " <option selected>Select</option>"; ?>
                  
                    <option value="Floor">Floor</option>
                    <option value="Mirror">Mirror</option>
                    <option value="Door">Door</option>
                    <option value="Fragrance">Fragrance</option>                    
                    <option value="Other">Other</option>
                  </select>
                </div>


                <div class="card-footer">
                
                  <button type="submit" class="btn btn-success">Save Cleaning Supply</button>
                </div>
              </form>



<?= $this->endSection() ?>           