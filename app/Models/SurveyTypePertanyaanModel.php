<?php

use App\Data\Survey;
use CodeIgniter\Model;

class SurveyTypePertanyaanModel extends Model
{
    //informasi tabel
    protected $table = 'survey_tipe_pertanyaan';
    protected $primaryKey = 'id_type_pertanyaan';

    //pencatatan waktu dan tanggal
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';

    //informasi field
    protected $useAutoIncrement = true;
    protected $allowedFields = ['id_type_pertanyaan', 'id_survey_pertanyaan', 'deskripsi'];
    protected $validationRules = [];
}
