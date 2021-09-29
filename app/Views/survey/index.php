<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <?php if ($ingroup != null) : ?>
        <a class="btn btn-sm btn-primary mb-5" href="<?php echo base_url('survey/my') ?>">Your Survey</a>
    <?php else : ?>
        <a class="btn btn-sm btn-primary mb-5" href="<?php echo base_url('survey/join') ?>">Create Your Survey</a>
    <?php endif; ?>

    <h4 class="mb-3">Column with per Dynamic Row</h4>
    <?php foreach ($surveys as $key => $value) : ?>
        <div class="row mb-3">
            <div class="col">
                <div class="card shadow">
                    <div class="row g-0">
                        <div class="col-4">
                            <img src="https://images.unsplash.com/photo-1593642533144-3d62aa4783ec?ixid=MnwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=350&q=80" class="img-fluid rounded-start" alt="tes">
                        </div>
                        <div class="col-8">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $value->judul ?></h5>
                                <p class="card-text"><?php echo $value->deskripsi ?></p>
                                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                                <a href="<?php echo base_url('survey/' . $value->id_survey . '/questions') ?>" class="btn btn-sm btn-primary text-end">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>
</div>

<?= $this->endSection(); ?>