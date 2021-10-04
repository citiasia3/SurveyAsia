<?php

use CodeIgniter\Model;

class SurveyPertanyaanModel extends Model
{
    //informasi tabel
    protected $table = 'survey_pertanyaan';
    protected $primaryKey = 'id_survey_pertanyaan';

    //pencatatan waktu dan tanggal
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    //informasi field
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_survey_pertanyaan', 'pertanyaan', 'id_survey', 'tipe'];
    protected $validationRules = [];
    protected $builder;

    public function __construct()
    {
        $this->builder = $this->builder();
    }

    public function getById($id_survey_pertanyaan)
    {
        # code...
        return $this->getWhere(['id_survey_pertanyaan' => $id_survey_pertanyaan]);
    }

    public function getPertanyaanBySurveyId($idSurvey)
    {
        # code...
        return $this->builder->getWhere(['id_survey' => $idSurvey]);
    }

    public function countPertanyaan($id)
    {
        # code...
        $this->builder->where('id_survey', $id);
        return $this->builder->countAllResults();
    }

    public function tambah_pertanyaan($data)
    {
        $query = $this->db->table('survey_pertanyaan')->insert($data);
        return $query;
    }
    public function updateSurveyPertanyaan($data, $id_survey)
    {
        $builder = $this->db->table($this->table);
        $builder->where('id_survey_pertanyaan', $id_survey);
        return $builder->update($data);
    }
    public function deletePertanyaan($id)
    {
        # code...
        return $this->delete($id);
    }

    public function detailPertanyaanJawaban($id_survey_pertanyaan)
    {
        # code...
        /* Join Tabel Survey dengan survey_pertanyaan dan survey_jawaban */
        $this->builder->select('survey_pertanyaan.id_survey_pertanyaan, survey_pertanyaan.pertanyaan, survey_jawaban.id_survey_jawaban, survey_jawaban.isi_jawaban, survey_jawaban.id_responden');

        //$builder->from($this->table);

        /* INNER JOIN dengan foreign key */
        // $this->builder->join('survey_pertanyaan', 'survey_pertanyaan.id_survey = survey.id_survey');
        $this->builder->join('survey_jawaban', 'survey_jawaban.id_survey_pertanyaan = survey_pertanyaan.id_survey_pertanyaan');

        /* Mencari ID spesifik */
        $this->builder->where('survey_pertanyaan.id_survey_pertanyaan', $id_survey_pertanyaan);

        return $this->builder->get();
    }
}
