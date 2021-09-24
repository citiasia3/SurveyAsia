<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <h1>Dashboard</h1>

    <a class="btn btn-warning" href="<?php echo base_url('/home/logout'); ?>">logout</a>
</div>

<?= $this->endSection(); ?>