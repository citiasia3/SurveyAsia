<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>


<div class="container mt-3 mb-5">


    <div class="row mb-3">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Pertanyaan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/survey/<?= $survey->id_survey ?>/info">Responden</a>
                </li>

            </ul>
        </div>
    </div>

    <!-- Tampilan edit Survey -->
    <div class="row mb-3">
        <div class="col">
            <?php if (session()->getFlashData('success')) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> <?= session()->getFlashData('success') ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                <textarea class="form-control" name="deskripsi" id="" cols="30" rows="5"><?= $survey->deskripsi ?></textarea>
                                <!-- <input type="text" class="form-control" id="inputEmail3" name="deskripsi" value="<?= $survey->deskripsi ?>"> -->
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <select class="form-select" aria-label="Default select example" name="is_active">
                                    <?php if ($survey->is_active == 0) : ?>
                                        <option selected value="0">Tidak Aktif</option>
                                        <option value="1">Aktif</option>
                                    <?php else : ?>
                                        <option value="0">Tidak Aktif</option>
                                        <option value="1" selected>Aktif</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah Responden</label>
                            <div class="col-sm-10">
                                <p class="mt-2"><?= $survey->jumlah_responden ?></p>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-2">
                                <button type="submit" class="btn btn-secondary">Edit Survey</button>
                                <a href="<?= base_url('survey/preview/') ?>/<?= $survey->id_survey ?>" class="btn btn-light">Preview</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilan tambah pertanyaan -->
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-header">
                    <h4 class="card-title">Tambah Pertanyaan</h4>
                </div>
                <div class="card-body">
                    <form action="<?php echo base_url('survey') . '/' . $survey->id_survey . '/questions/add' ?>" method="post">
                        <div id="formContainer">

                        </div>

                        <div class="row">
                            <div class="col">
                                <p id="btnAddQuestion" onclick="createForm()" class="btn btn-sm btn-secondary">tambah</p>
                            </div>
                        </div>

                        <div class="d-grid gap-2">
                            <button id="btnSubmit" class="btn btn-primary" type="submit">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tampilan Pertanyaan -->
    <div class="row mt-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col">
                            <h4>Preview Pertanyaan</h4>
                        </div>
                        <!-- <div class="col-md-3">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Tambah Pertanyaan
                            </button>
                        </div> -->
                    </div>
                    <div class="row">
                        <?php $num = 1;
                        foreach ($pertanyaan as $key => $value) : ?>
                            <?php $pilihanJawaban = $pilihanJawabanModel->where('id_survey_pertanyaan', $value->id_survey_pertanyaan)->findAll(); ?>
                            <div class="row mb-3">
                                <h6><?php echo $num . '. ' . $value->pertanyaan ?></h6>
                                <div class="row">
                                    <div class="col">
                                        <?php if ($value->tipe == 0) : ?>
                                            <input type="text" class="form-control" readonly>

                                        <?php elseif ($value->tipe == 1) : ?>
                                            <?php foreach ($pilihanJawaban as $mkey => $mvalue) : ?>
                                                <?php $pilArr = explode(',', $mvalue['deskripsi'])  ?>
                                                <?php for ($i = 0; $i < count($pilArr); $i++) : ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer" id="radio[]">
                                                        <label class="form-check-label" for="flexRadioDefault1">
                                                            <?php echo $pilArr[$i] ?>
                                                        </label>
                                                    </div>
                                                <?php endfor; ?>
                                            <?php endforeach; ?>

                                        <?php elseif ($value->tipe == 2) : ?>
                                            <?php foreach ($pilihanJawaban as $mkey => $mvalue) : ?>
                                                <?php $pilArr = explode(',', $mvalue['deskripsi'])  ?>
                                                <?php for ($i = 0; $i < count($pilArr); $i++) : ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="" id="checkbox[]">
                                                        <label class="form-check-label" for="flexCheckDefault">
                                                            <?php echo $pilArr[$i] ?>
                                                        </label>
                                                    </div>
                                                <?php endfor; ?>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php $num++;
                        endforeach ?>
                    </div>
                    <div class="d-grid gap-2">
                        <a href="#" class="btn btn-primary">Publish</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5 mb-3">
        <!-- Modal Tambah Pertanyaan -->
        <!-- <button type="button" id="btnShowModal" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalFormBuilder">
            Tambah Pertanyaan Custom
        </button> -->
        <!-- Modal -->
        <div class="modal fade" id="modalFormBuilder" tabindex="-1" aria-labelledby="modalFormBuilderLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFormBuilderLabel">Tambah Pertanyaan</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body container">
                        <form action="" method="post">
                            <div id="formContainer">

                            </div>

                            <!-- <div class="row">
                                <div class="col">
                                    <p id="btnAddQuestion" onclick="createForm()" class="btn btn-sm btn-secondary">Tambah Pertanyaan</p>
                                </div>
                            </div> -->

                            <div>
                                <div class="row">
                                    <button id="btnSubmit" type="submit" class="btn btn-primary">SELESAI</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal Tambah Pertanyaan -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pertanyaan/save" method="post" enctype="multipart/form-data">
                        <input type="hidden" class="form-control" id="inputEmail3" name="id_survey" value="<?= $survey->id_survey ?>">
                        <div class="row mb-3">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="inputEmail3" name="pertanyaan">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Edit Pertanyaan -->
    <div class="modal fade" id="modalEditPertanyaan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Pertanyaan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="/pertanyaan/edit" method="post" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <input type="hidden" class="form-control" id="inputEmail3" name="id_survey" value="<?= $survey->id_survey ?>">
                            <input type="hidden" class="form-control" id="idPertanyaan" name="id_survey_pertanyaan">
                            <label for="inputEmail3" class="col-sm-2 col-form-label">Pertanyaan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pertanyaan" name="pertanyaan">
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <script src="/assets/js/form/dynamic_form.js"></script>
    <script src="/assets/js/detail_survey.js"></script>

    <?= $this->endSection(); ?>