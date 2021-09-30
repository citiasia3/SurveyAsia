<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">

    <div class="row">
        <div class="col">
            <div class="card shadow p-3 mb-5 bg-white rounded">
                <?php if (session()->getFlashData('success')) : ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <?= session()->getFlashData('success') ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="card-header">
                    <h5> Data Survey</h5>
                </div>
                <div class="card-body">
                    <!-- <a class="btn btn-primary mb-2" href="<?= base_url('survey/tambahSurvey') ?>" c>Tambah Survey</a> -->
                    <button type="button" class="btn btn-primary <?php if ($ingroup == null) : echo 'disabled'; endif; ?>" data-bs-toggle="modal" data-bs-target="#modalTambahPertanyaan">
                        Tambah Survey
                    </button>

                    <?php if ($ingroup == null) : echo '<p class="text-danger">*Anda belum menjadi Creator</p>';
                    endif ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Judul</th>
                                <th scope="col">deskripsi</th>
                                <th scope="col">jumlah responden</th>
                                <th scope="col">action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $i = 1; ?>
                                <?php foreach ($survey as $s) : ?>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $s->judul ?></td>
                                    <td><?= $s->deskripsi ?></td>
                                    <td><?= $s->jumlah_responden ?></td>
                                    <td>
                                        <a href="/survey/detailSurvey/<?= $s->id_survey ?>" class="btn btn-primary">Detail</a>
                                        <a href="/survey/deleteSurvey/<?= $s->id_survey ?>" class="btn btn-danger">Delete</a>
                                    </td>
                            </tr>
                        <?php endforeach; ?>
                        <?php $i; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal tambah survey -->
    <div class="modal fade" id="modalTambahPertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Survey</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/survey/save" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Judul</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="judul">
                            <input type="hidden" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="id_creator" value="<?= $id_creator ?>">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Deskripsi</label>
                            <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection(); ?>