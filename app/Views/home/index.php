<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <h1><?php echo $title ?></h1>

    <a class="btn btn-warning" href="<?php echo base_url('/auth/logout'); ?>">logout</a>
</div>

<?= $this->endSection(); ?>