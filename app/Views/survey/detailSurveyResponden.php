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
                    <a class="nav-link active" href="/survey/detailSurveyResponden/<?= $survey->id_survey ?>">Responden</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="container">
        <?php foreach ($data as $key => $value) : ?>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col">
                            <p class="mb-4"><?php echo $value->pertanyaan ?></p>
                            <?php $jawaban = $surveyJawabanModel->detailJawaban($value->id_survey_pertanyaan)->getResult(); ?>
                            <ul class="list-group">
                                <?php foreach ($jawaban as $mkey => $mvalue) : ?>
                                    <li class="list-group-item list-group-item-secondary mb-1">
                                        <!-- <div class="card mb-1 bg-light"> -->
                                        <!-- <div class="card-body"> -->
                                        <p><?php echo $mvalue->isi_jawaban; ?></p>
                                        <!-- </div> -->
                                        <!-- </div> -->
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?= $this->endSection(); ?>