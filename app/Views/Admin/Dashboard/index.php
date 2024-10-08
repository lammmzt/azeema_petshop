<?= $this->extend('Template/index'); ?>
<?= $this->section('content'); ?>
<div class="row">

</div>
<?= $this->endSection('content'); ?>
<?= $this->section('dataTables'); ?>

<script src="<?= base_url('assets/vendor/chart.js/Chart.bundle.min.js'); ?>"></script>
<!-- <script src="<?php // echo base_url('assets/js/plugins-init/chartjs-init.js')  
                    ?>"></script> -->

<?= $this->endSection('dataTables'); ?>