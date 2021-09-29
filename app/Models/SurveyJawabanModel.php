<?php

use CodeIgniter\Model;

class SurveyJawabanModel extends Model
{
    protected $table = 'survey_jawaban';
    protected $primaryKey = 'id_survey_jawaban';

    protected $useTimeStamp = false;

    protected $useAutoIncrement = true;
    //protected $allowedFields = ['id_survey', 'judul', 'deskripsi', 'waktu', 'logic', 'jumlah_responden', 'id_creator'];
    protected $validationRules = [];


    public function detailJawaban($id_survey_pertanyaan)
    {
        # code...
        return $this->builder()->getWhere(['id_survey_pertanyaan' => $id_survey_pertanyaan]);
    }

    public function isiJawaban($data)
    {
        # code...
        return $this->builder()->insertBatch($data);
    }
}
