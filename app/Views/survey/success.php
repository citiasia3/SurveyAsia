<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container">
    <div class="alert alert-success" role="alert">
        Berhasil Isi Survey
    </div>
    <a href="<?php echo base_url('survey/') ?>" class="btn btn-primary"> Back To All Survey</a>
</div>

<?= $this->endSection(); ?>