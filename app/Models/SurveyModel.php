<?php

use App\Data\Survey;
use CodeIgniter\Model;

class SurveyModel extends Model
{
    //informasi tabel
    protected $table = 'survey';
    protected $primaryKey = 'id_survey';

    //pencatatan waktu dan tanggal
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    //informasi field
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_survey', 'judul', 'deskripsi', 'jumlah_responden'];
    protected $validationRules = [];
    protected $builder;

    public function __construct() {
        $this->builder = $this->builder();
    }

    public function getAllSurvey()
    {
        # untuk menampilkan semua survey
        return $this->builder->get();
    }

    public function getSurveyById(bool $singleResult, $idSurvey)
    {
        # code...
        return $this->doFind($singleResult,$idSurvey);
    }


    public function detailSurvey($id_survey)
    {
        # code...
        /* Join Tabel Survey dengan survey_pertanyaan dan survey_jawaban */
        $this->builder->select('survey.id_survey, survey.deskripsi, survey_pertanyaan.id_survey_pertanyaan, survey_pertanyaan.pertanyaan, survey_jawaban.id_survey_jawaban, survey_jawaban.isi_jawaban, survey_jawaban.id_responden');

        //$builder->from($this->table);

        /* INNER JOIN dengan foreign key */
        $this->builder->join('survey_pertanyaan', 'survey_pertanyaan.id_survey = survey.id_survey');
        $this->builder->join('survey_jawaban', 'survey_jawaban.id_survey_pertanyaan = survey_pertanyaan.id_survey_pertanyaan');

        /* Mencari ID spesifik */
        $this->builder->where('survey.id_survey', $id_survey);

        return $this->builder->get();
    }

    public function insertSurvey(Survey $survey)
    {
        # code...
        return $this->insert($survey->classToArray());
    }

    public function updateSurvey(Survey $survey)
    {
        # code...
    }

    public function updateOrInsertSurvey(Survey $survey)
    {
        # code...
    }

    public function deleteSurvey($idSurvey)
    {
        # code...
        return $this->delete($idSurvey);
    }
}
