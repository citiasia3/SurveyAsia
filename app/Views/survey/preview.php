<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container mt-3 mb-5">
    <div class="row mb-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4><?= $survey->judul ?></h4>
                    <p><?= $survey->deskripsi ?></p>
                </div>
            </div>
        </div>
    </div>
    <form>
        <?php foreach ($pertanyaanbyIdSurvey as $p) : ?>
            <div class="row mb-3">
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="" class="form-label"><?= $p->pertanyaan ?></label>
                                <input type="hidden" value="<?= $p->id_survey_pertanyaan ?>">
                                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="isi_jawaban">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="d-grid gap-1">
            <button type="button" class="btn btn-primary ">Submit</button>
        </div>

    </form>
</div>
<script src="/assets/js/detail_survey.js"></script>

<?= $this->endSection(); ?>