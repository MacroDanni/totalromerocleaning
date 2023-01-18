<?php  $session = \Config\Services::session(); ?>
<?=$this->extend('templates/main') ?>

<?= $this->section('nombreEmpresa') ?>
Total Romeros Cleaning
<?= $this->endsection() ?>

<?= $this->section('nombreUsuario') ?>
<button type="button" class="btn btn-light"><?= $session->nickename ?></button>
<?= $this->endSection() ?>

<?= $this->section('titlePage') ?>
Portal Calendario General
<?= $this->endSection() ?>

<?= $this->section('tituloContent') ?>
Calendario Manager
<?= $this->endSection() ?>

<?= $this->section('subTitlecontent') ?>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<a href="<?= base_url('guardareditar') ?>" type="button" class="btn btn-outline-success">Agendar Trabajo </a> 

<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      themeSystem: 'bootstrap5',
      initialDate: '<?=  date('Y-m-d');?>',
      initialView: 'listWeek',
      dayMaxEventRows: true,
      
      headerToolbar: {
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      height: 'auto',
      navLinks: true, // can click day/week names to navigate views
      editable: false,
      selectable: false,
      selectMirror: true,
      nowIndicator: true,
      events: 
        <?php print_r($calendarioadmin) ?>
      
    });

    calendar.render();
  });

</script>
<style>

  #calendar {
    width: 95%;
    margin:auto;
  }

</style>

<div id='calendar'></div>


<?= $this->endSection() ?>           