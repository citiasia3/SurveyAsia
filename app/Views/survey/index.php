<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <h4 class="mb-3">Row with per 3 Column</h4>
    <div class="row mb-3">
        <?php foreach ($surveys as $key => $value) : ?>
            <div class="col-md-4">
                <div class="card shadow" style="min-height: 250px; max-height: 400px;">
                    <div class="card-body">
                        <h6 class="card-title text-uppercase"><?php echo $value->judul ?></h6>
                        <p class="card-text"><?php echo $value->deskripsi ?></p>
                        <a href="#" class="btn btn-primary">Lihat</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

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
                                <a href="" class="btn btn-sm btn-primary text-end">Lihat</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    <?php endforeach; ?>


    <a class="btn btn-sm btn-primary mb-5" href="<?php echo $user_id ?>">Your Survey</a>
</div>

<?= $this->endSection(); ?>