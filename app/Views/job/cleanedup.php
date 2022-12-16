<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Cleaned Up
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Job Finished 
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?=  date('l jS \of F Y H:i:s');?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>



 <?= csrf_field()  ?> 

<?php 
  date_default_timezone_set('America/Chicago');
  $fecha_i = $cleanedup['dateinprocesscleaning'];
  $fecha_f= date("Y/m/d H:i:s");
  $minutos = ((strtotime($fecha_i)-strtotime($fecha_f))/60);
  $minutos = abs($minutos); 
  $minutos = floor($minutos);
?>


                <div class="card-body">
           
                <?php if($minutos>=180){?>
                <div class="d-grid gap-2 col-6 mx-auto"> 
                    
                    <a href="<?= base_url('jobfinished/'.$cleanedup['id']) ?>" type="button" class="btn btn-outline-success">Job finiched</a>
                </div>
                <HR></HR>
                <?php } ?>

                Cleaning Details:
                 <HR></HR>
                <div class="row">

                    <div class="form-group col-sm-4" >
                        <label >Company</label>
                        <input type="hidden" name="id" value="<?= $cleanedup['id'] ?>">
                        <input type="text" class="form-control" id="nameBusiness" name="nameBusiness" 
                        value="<?= $cleanedup['nameBusiness'] ?>"disabled>
                    </div>

                  <div class="form-group col-sm-4" >
                    <label >Nicke name</label>
                    <input type="text" class="form-control" id="nickename" name="nickename" 
                    value="<?= $cleanedup['nameEmployee'] ?>"disabled>
                  </div>
                  
                  <div class="form-group col-sm-4" >
                    <label >Building</label>
                    <input type="text" class="form-control" id="nameBuilding" name="nameBuilding" 
                    value="<?= $cleanedup['nameBuilding'] ?>"disabled>
                  </div>

                  </div>
              <div class="row">
                  <div class="form-group col-sm-4" >
                    <label >Service</label>
                    <input type="text" class="form-control" id="nameservice" name="nameservice" 
                    value="<?= $cleanedup['nameservice'] ?>"disabled>
                  </div>

                  <div class="form-group col-sm-4" >
                    <label ># Room</label>
                    <input type="text" class="form-control" id="numroom" name="numroom" 
                    value="<?= $cleanedup['numroom'] ?>"disabled>
                  </div>

                  <div class="form-group col-sm-4" >
                    <label >Cleaning date</label>
                    <input type="text" class="form-control" id="fechaAseo" name="fechaAseo" 
                    value="<?= $cleanedup['fechaAseo'] ?>"disabled>
                  </div>

                  <div class="form-group col-sm-4" >
                    <label >Agree to clean</label>
                    <input type="text" class="form-control" id="dateagreetoclean" name="dateagreetoclean" 
                    value="<?= $cleanedup['dateagreetoclean'] ?>"disabled>
                  </div>

                    <div class="form-group col-sm-4" >
                    <label >In process cleaning</label>
                    <input type="text" class="form-control" id="dateinprocesscleaning" name="dateinprocesscleaning" 
                    value="<?= $cleanedup['dateinprocesscleaning'] ?>"disabled>
                    </div>
                 
                 
                  <div class="form-group col-sm-3" >
                    <label >Job Finished</label>
                    <input type="text" class="form-control" id="cleaned" name="cleaned" 
                    value="<?=  date('Y-m-d H:i:s');?>"disabled>
                  </div>
                  
              </div>




<?= $this->endSection() ?>           