<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<link rel="stylesheet" href="<?php echo base_url('assets/css/log.css'); ?>">
<img class="wave" src="<?php echo base_url('assets/image/wave.png'); ?>">
<link rel="shortcut icon" href="<?php echo base_url('assets/image/cia.png'); ?>">

<div class="container">
    <div class="row" style="margin-top:45px">
        <div class="row-md-4 col-md-offset-4">

            <div class="card">
                <h2 class="card-header"><?= lang('Auth.register') ?></h2>
                <div class="card-body">
                    <div class="container">
                        <div class="img">
                            <img src="">
                        </div>
                        <?= view('App\Views\Auth\_message_block') ?>

                        <form action="<?= route_to('register') ?>" method="post">
                            <?= csrf_field() ?>

                            <div class="form-group">
                                <label for="email"><?= lang('Auth.email') ?></label>
                                <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>">
                                <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                            </div>

                            <div class="form-group">
                                <label for="username"><?= lang('Auth.username') ?></label>
                                <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                            </div>

                            <div class="form-group">
                                <label for="password"><?= lang('Auth.password') ?></label>
                                <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                            </div>

                            <div class="form-group">
                                <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                            </div>

                            <br>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                            </div>
                        </form>


                        <hr>

                        <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= route_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <img class="gambar" src="<?php echo base_url('assets/image/cia.png'); ?>">
    <?= $this->endSection() ?>