<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row mb-3">
        <div class="col">
            <div class="card shadow">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $survey->judul ?></h5>
                    <p class="card-text"><?php echo $survey->deskripsi ?></p>

                    <p>dibuat oleh <a href="#" class="text-decoration-none"><?php echo $creator->username ?></a></p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col">
            <form action="<?php echo base_url('survey/answer') ?>" method="post">
                <?php $jml = count($pertanyaan) ?>
                <input type="hidden" name="jml" value="<?php echo $jml ?>">
                <div class="card shadow mb-3">
                    <div class="card-body">
                        <?php $num = 1;
                        foreach ($pertanyaan as $key => $value) : ?>

                            <?php $pilihanJawaban = $pilihanJawabanModel->where('id_survey_pertanyaan', $value->id_survey_pertanyaan)->findAll(); ?>


                            <input type="hidden" name="ids[]" value="<?php echo $value->id_survey_pertanyaan ?>">

                            <input type="hidden" name="type[]" value="<?php echo $value->tipe ?>">

                            <div class="row mb-3">
                                <h6><?php echo $num . '. ' . $value->pertanyaan ?></h6>
                                <div class="row">
                                    <div class="col m-3">
                                        <?php if ($value->tipe == 0) : ?>
                                            <input type="text" class="form-control" name="answer[<?php echo $value->id_survey_pertanyaan ?>]">

                                        <?php elseif ($value->tipe == 1) : ?>
                                            <?php foreach ($pilihanJawaban as $mkey => $mvalue) : ?>
                                                <?php $pilArr = explode(',', $mvalue['deskripsi'])  ?>
                                                <?php for ($i = 0; $i < count($pilArr); $i++) : ?>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="answer[<?php echo $value->id_survey_pertanyaan ?>]" value="<?php echo $pilArr[$i] ?>" id="">
                                                        <label class="form-check-label" for="">
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
                                                        <input class="form-check-input" type="checkbox" value="<?php echo $pilArr[$i] ?>" name="answer[<?php echo $value->id_survey_pertanyaan ?>][]" id="">
                                                        <label class="form-check-label" for="">
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
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>