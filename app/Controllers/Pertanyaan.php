<?php

namespace App\Controllers;

// use App\Models\SurveyModel;
use SurveyModel;
use SurveyPertanyaanModel;

class Pertanyaan extends BaseController
{
    protected $survey_model;
    protected $survey_pertanyaan_model;
    public function __construct()
    {
        $this->survey_model = new SurveyModel();
        $this->survey_pertanyaan_model = new SurveyPertanyaanModel();
        // $this->galery_model = new Galery_model();
    }
    // public function index()
    // {
    //     $survey = $this->survey_model->getAllSurvey()->getResult();
    //     $data = [
    //         'title' => 'Survey',
    //         'survey' => $survey
    //     ];
    //     // var_dump($survey);
    //     return view('survey/index', $data);
    // }

    public function detailSurvey($id)
    {
        $survey = $this->survey_model->getSurveyById($id)->getRow();
        $pertanyaanbyIdSurvey = $this->survey_pertanyaan_model->getPertanyaanBySurveyId($id)->getResult();

        // dd($pertanyaanbyIdSurvey);
        $data = [
            'title' => 'Detail survey',
            'survey' => $survey,
            'pertanyaanbyIdSurvey' => $pertanyaanbyIdSurvey,
        ];
        // tampilkan form create
        return view('survey/detailSurvey', $data);
    }
    public function tambahsurvey()
    {
        $data = [
            'title' => 'Tambah survey',
        ];
        // tampilkan form create
        return view('survey/tambahSurvey', $data);
    }
    public function editsurvey($id)
    {
        $survey = $this->survey_model->where('id', $id)->first();
        $data = [
            'title' => 'Edit survey',
            'survey' => $survey,
        ];
        // tampilkan form create
        return view('pages/edit_survey', $data);
    }


    public function save()
    {
        $request = \Config\Services::request();
        $id_survey = $request->getPost('id_survey');
        //cara fadhil insert db
        $data_pertanyaan = [
            "id_survey" => $id_survey,
            "pertanyaan" => $request->getPost('pertanyaan'),
            "tipe" => 1,
        ];
        // dd($data_pertanyaan);
        $this->survey_pertanyaan_model->tambah_pertanyaan($data_pertanyaan);

        return redirect()->to(base_url('/survey/detailSurvey/' . $id_survey))->with('success', 'Berhasil menambahkan peratanyaan');
    }

    public function deleteSurvey($id)
    {
        $this->survey_model->deleteSurvey($id);
        return redirect()->to(base_url('survey'))->with('success', 'Delete survey ' . 'success');
    }
    public function edit()
    {
        $request = \Config\Services::request();
        $id_survey =  $request->getPost('id_survey');
        $data_survey = [
            "judul" => $request->getPost('judul'),
            "deskripsi" => $request->getPost('deskripsi'),
            "jumlah_responden" => $request->getPost('jumlah_responden'),
        ];
        $this->survey_model->updateSurvey($data_survey, $id_survey);
        return redirect()->to(base_url('/survey/detailSurvey/' . $id_survey))->with('success', 'Ubah survey ' . 'success');
    }
}
