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

    public function deletePertanyaan($id_pertanyaan, $id_survey)
    {

        $this->survey_pertanyaan_model->deletePertanyaan($id_pertanyaan);
        return redirect()->to(base_url('/survey/detailSurvey/' . $id_survey))->with('success', 'Delete Pertanyaan ' . 'success');
    }
    public function edit()
    {
        $request = \Config\Services::request();
        $id_survey = $request->getPost('id_survey');
        $id_survey_pertanyaan =  $request->getPost('id_survey_pertanyaan');
        $data_survey_pertanyaan = [
            "pertanyaan" => $request->getPost('pertanyaan'),
        ];
        // dd($data_survey_pertanyaan);
        $this->survey_pertanyaan_model->updateSurveyPertanyaan($data_survey_pertanyaan, $id_survey_pertanyaan);
        return redirect()->to(base_url('/survey/detailSurvey/' . $id_survey))->with('success', 'Ubah Pertanyaan ' . 'success');
    }
}
