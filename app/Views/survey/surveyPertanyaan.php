<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">

        </div>
    </div>

    <form action="<?php echo base_url('survey/answer') ?>" method="post">
        <div class="card shadow w-50 mb-3">
            <div class="card-body">
                <?php $num = 1;
                foreach ($pertanyaan as $key => $value) : ?>
                    <div class="row mb-3">
                        <h6><?php echo $num . '. ' . $value->pertanyaan ?></h6>
                        <div class="row">
                            <div class="col">
                                <input name="answer[<?php echo $value->id_survey_pertanyaan ?>]" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                <?php $num++;
                endforeach ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>