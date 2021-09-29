<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">

        </div>
    </div>

    <form action="<?php echo base_url('survey/answer') ?>" method="post">
        <div class="card shadow w-50">
            <div class="card-body">
                <?php foreach ($pertanyaan as $key => $value) : ?>
                    <div class="row mb-3">
                        <p><?php echo $value->pertanyaan ?></p>
                        <div class="row">
                            <div class="col">
                                <input name="answer[<?php echo $value->id_survey_pertanyaan ?>]" type="text" class="form-control" placeholder="jawab">
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>