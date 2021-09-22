<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">
            <?php if (session()->getFlashData('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?= session()->getFlashData('success') ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <div class="card">
                <div class="card-header">
                    <h3><?= $survey->judul ?></h3>
                </div>
                <div class="card-body">
                    <form action="/survey/edit" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <input type="hidden" class="form-control" id="inputEmail3" name="id_survey" value="<?= $survey->id_survey ?>">
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
                                <p class="form-control"><?= $survey->jumlah_responden ?></p>
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

        </div>
    </div>
    <div class="row mt-3">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-md-2">
                            <h4>Pertanyaan</h4>
                        </div>
                        <div class="col-md-3">
                            <a href="" class="btn btn-secondary">Tambah Pertanyaan</a>
                        </div>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Pertanyaan</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($pertanyaanbyIdSurvey as $p) : ?>
                                <tr>
                                    <th scope="row"><?= $p->id_survey_pertanyaan ?>.</th>
                                    <td><a href=""><?= $p->pertanyaan ?></a></td>
                                    <td><a href="">edit</a></td>
                                </tr>
                        </tbody>
                    <?php endforeach; ?>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>