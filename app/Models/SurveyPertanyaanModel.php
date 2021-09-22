<?php

use CodeIgniter\Model;

class SurveyPertanyaanModel extends Model
{
    //informasi tabel
    protected $table = 'survey_pertanyaan';
    protected $primaryKey = 'id_survey_pertanyaan';

    //pencatatan waktu dan tanggal
    protected $useTimestamps = true;
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

    public function getPertanyaanBySurveyId($idSurvey)
    {
        # code...
        return $this->builder->getWhere(['id_survey' => $idSurvey]);
    }

    public function tambah_pertanyaan($data)
    {
        $query = $this->db->table('survey_pertanyaan')->insert($data);
        return $query;
    }
}