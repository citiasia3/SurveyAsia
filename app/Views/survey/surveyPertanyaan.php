<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="container mt-3">
    <div class="row">
        <div class="col">

        </div>
    </div>

    <form action="<?php echo base_url('survey/answer') ?>" method="post">
        <?php $jml = count($pertanyaan) ?>
        <input type="hidden" name="jml" value="<?php echo $jml ?>">
        <div class="card shadow w-50 mb-3">
            <div class="card-body">
                <?php $num = 1;
                foreach ($pertanyaan as $key => $value) : ?>

                    <?php $pilihanJawaban = $pilihanJawabanModel->where('id_survey_pertanyaan', $value->id_survey_pertanyaan)->findAll(); ?>


                    <input type="hidden" name="ids[]" value="<?php echo $value->id_survey_pertanyaan ?>">

                    <input type="hidden" name="type[]" value="<?php echo $value->tipe ?>">

                    <div class="row mb-3">
                        <h6><?php echo $num . '. ' . $value->pertanyaan ?></h6>
                        <div class="row">
                            <div class="col">
                                <?php if ($value->tipe == 0) : ?>
                                    <input type="text" class="form-control" name="answer[]">

                                <?php elseif ($value->tipe == 1) : ?>
                                    <?php foreach ($pilihanJawaban as $mkey => $mvalue) : ?>
                                        <?php $pilArr = explode(',', $mvalue['deskripsi'])  ?>
                                        <?php for ($i = 0; $i < count($pilArr); $i++) : ?>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="answer[]" value="<?php echo $pilArr[$i] ?>" id="radio[]">
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
                                                <input class="form-check-input" type="checkbox" value="<?php echo $pilArr[$i] ?>" name="multi[]" id="checkbox[]">
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
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
</div>

<?= $this->endSection(); ?>