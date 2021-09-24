<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<div class="container mt-3 mb-5">
    <div class="row mb-3">
        <div class="col">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="/survey/detailSurvey/<?= $survey->id_survey ?>"">Pertanyaan</a>
                </li>
                <li class=" nav-item">
                        <a class="nav-link active" href="/survey/detailSurveyResponden/<?= $survey->id_survey ?>"">Responden</a>
                </li>

            </ul>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>