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
                    <a class="btn btn-primary mb-2" href="<?= base_url('survey/tambahSurvey') ?>" c>Tambah Survey</a>
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
                                <?php foreach ($survey as $s) : ?>
                                    <th scope="row"><?= $s->id_survey ?></th>
                                    <td><?= $s->judul ?></td>
                                    <td><?= $s->deskripsi ?></td>
                                    <td><?= $s->jumlah_responden ?></td>
                                    <td><a href="/home/detail/<?= $s->id_survey ?>" class="btn btn-primary">Detail</a></td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>