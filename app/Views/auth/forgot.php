<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/log.css'); ?>">
<link rel="shortcut icon" href="<?php echo base_url('assets/image/cia.png'); ?>">
<img class="wave" src="<?php echo base_url('assets/image/wave.png'); ?>">

<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="row-md-4 col-md-offset-4">

            <div class="card">
                <h2 class="card-header"><?= lang('Auth.forgotPassword') ?></h2>
                <div class="card-body">
                    <div class="container">
                        <div class="img">
                            <img src="">
                        </div>
                        <?= view('App\Views\Auth\_message_block') ?>

                        <p><?= lang('Auth.enterEmailForInstructions') ?></p>

                        <form action="<?= route_to('forgot') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="email"><?= lang('Auth.emailAddress') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                            </div>

                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.sendInstructions') ?></button>
                            </div>
                        </form>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <img class="gambar" src="<?php echo base_url('assets/image/cia.png'); ?>">

    <?= $this->endSection() ?>