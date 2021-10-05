<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3 mb-5">
    <div class="row mb-3">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/survey/detailSurvey/<?= $survey->id_survey ?>">Pertanyaan</a>
                </li>
                <li class=" nav-item">
                    <a class="nav-link active" href="/survey/<?= $survey->id_survey ?>/info">Responden</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- <div class="container mb-3">
        <div class="row">
            <div class="col-4">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div> -->

    <div class="container">
        <?php $num = 1;
        foreach ($data as $key => $value) : ?>
            <div class="row mb-3">
                <div class="col">
                    <h5 class="fw-bold"><?php echo $num . '. ' . $value->pertanyaan ?></h5>
                    <?php $jawaban = $surveyJawabanModel->detailJawaban($value->id_survey_pertanyaan)->getResult(); ?>

                    <ul class="list-group list-group-flush m-3">
                        <?php foreach ($jawaban as $mkey => $mvalue) : ?>
                            <li class="list-group-item">
                                <h6><?php echo $mvalue->isi_jawaban; ?></h6>
                                <?php $user = $userModel->where(['id' => $mvalue->id_responden])->first() ?>
                                <p class="fs-6 fw-light">di isi oleh <a href="" class="text-decoration-none fw-light"><?php echo $user->username ?></a></p>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php $num++;
        endforeach; ?>
    </div>
    <?= $this->endSection(); ?>