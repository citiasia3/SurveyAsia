<?php

namespace App\Controllers;

// use App\Models\SurveyModel;

use App\Data\UserProfile;
use SurveyModel;
use SurveyPertanyaanModel;

class Survey extends BaseController
{
    protected $survey_model;
    protected $survey_pertanyaan_model;
    private $auth;
    private $authorize;
    public function __construct()
    {
        $this->survey_model = new SurveyModel();
        $this->survey_pertanyaan_model = new SurveyPertanyaanModel();
        $this->auth = service('authentication');
        $this->authorize = service('authorization');
        // $this->galery_model = new Galery_model();
    }
    public function index()
    {
        $userId = $this->auth->id();
        $allSurvey = $this->surveyModel->getAllSurvey()->getResult();

        $data = [
            'title' => 'Survey List',
            'surveys' => $allSurvey,
            'user_id' => $userId
        ];

        $this->prettyVarDump($data, 'tes');

        //return view('survey/index', $data);
    }

    public function userSurvey()
    {
        # code...
        $userId = $this->auth->id();
        $survey = $this->survey_model->getSurveyByCreatorId($userId)->getResult();
        //$this->authorize->addUserToGroup($userId, 'creator');
        $userInGroup = $this->authorize->inGroup('creator', $userId);

        $data = [
            'title' => 'Survey',
            'survey' => $survey,
            'ingroup' => $userInGroup,
            'id_creator' => $userId
        ];

        $this->prettyVarDump($data, 'tes');


        return view('survey/userSurvey', $data);
    }

    public function detailSurvey($id)
    {
        $survey = $this->survey_model->getSurveyById($id)->getRow();
        $pertanyaanbyIdSurvey = $this->survey_pertanyaan_model->getPertanyaanBySurveyId($id)->getResult();
        // $detailSurveyPertanyaan = $this->surveyPertanyaanModel->detailPertanyaanJawaban($id)->getResult();
        // foreach ($detailSurveyPertanyaan as $key => $value) {
        // 	# code...
        // 	$array['pertanyaan'] = $value->pertanyaan;
        // 	// $array['survey_desc'] = $value->deskripsi;
        // 	$array['jawaban'][$value->id_survey_jawaban] = $value->isi_jawaban;
        // }
        $data = [
            'title' => 'Detail survey',
            'survey' => $survey,
            'pertanyaanbyIdSurvey' => $pertanyaanbyIdSurvey,
        ];
        // tampilkan form create
        return view('survey/detailSurvey', $data);
    }
    public function detailPertanyaan($id_pertanyaan)
    {
        # code...
        echo json_encode($this->survey_pertanyaan_model->getById($id_pertanyaan)->getResultArray());
    }


    public function detailSurveyResponden($id)
    {
        $survey = $this->survey_model->getSurveyById($id)->getRow();
        $pertanyaanbyIdSurvey = $this->survey_pertanyaan_model->getPertanyaanBySurveyId($id)->getResult();

        // dd($pertanyaanbyIdSurvey);
        $data = [
            'title' => 'Detail survey Responden',
            'survey' => $survey,
            'pertanyaanbyIdSurvey' => $pertanyaanbyIdSurvey,
        ];
        // tampilkan form create
        return view('survey/detailSurveyResponden', $data);
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
        //cara fadhil insert db
        $data_survey = [
            // "id" => $random,
            "judul" => $request->getPost('judul'),
            "deskripsi" => $request->getPost('deskripsi'),
            "jumlah_responden" => 0,
            "id_creator" => $request->getPost('id_creator'),
            // "id_creator" => $id_creator
        ];
        $this->survey_model->tambah_survey($data_survey);
        return redirect()->to(base_url('survey'));
    }
    // <?= base_url('uploads/survey/' . $p['gambar']); ">

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

    public function joinCreator($userId)
    {
        # code...

        if ($this->authorize->inGroup('creator', $userId) == 1) {
            # code...
            return redirect()->to(base_url('survey/my'))->with('error', lang('Auth.alreadyCreator'));
        }

        $data = [
            'title' => 'Join as Creator'
        ];

        return view('survey/joinCreator', $data);
    }

    public function attemptJoinCreator()
    {
        # code...
        $request = \Config\Services::request();

        $userProfile = new UserProfile;

        $userProfile->firstName = $request->getPost('first_name');
        $userProfile->lastName = $request->getPost('last_name');
        $userProfile->alamat = $request->getPost('alamat');

        $insert = $this->userProfileModel->insertUser($userProfile);

        if ($insert != null) {
            # code...
            $userId = $this->auth->id();
            $this->authorize->addUserToGroup($userId, 'creator');
            return redirect()->to('my');
        }
    }
}
