<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h1><?= $survey->judul ?></h1>

                </div>
                <div class="card-body">
                    <form>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Judul</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="judul" value="<?= $survey->judul ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="deskripsi" value="<?= $survey->deskripsi ?>">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Responden</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="jumlah_responden" value="<?= $survey->jumlah_responden ?>">
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Edit Survey</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4>Pertanyaan</h4>
                    <?php foreach ($pertanyaanbyIdSurvey as $p) : ?>
                        <p> <?= $p->pertanyaan ?></p>
                    <?php endforeach; ?>
                    <div class="row">
                        <div class="col-md-1">1</div>
                        <div class="col-md-5">Apakah ini temanmu?</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>