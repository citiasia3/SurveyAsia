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

        $ingroup = $this->authorize->inGroup('creator', $this->auth->id());
        $allSurvey = $this->surveyModel->getAllSurvey()->getResult();

        //$this->authorize->createGroup('responden');

        $data = [
            'title' => 'Survey List',
            'surveys' => $allSurvey,
            'ingroup' => $ingroup
        ];

        //$this->prettyVarDump($data, 'tes');

        return view('survey/index', $data);
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

        //$this->prettyVarDump($data, 'tes');


        return view('survey/userSurvey', $data);
    }

    public function showQuestions($surveyId)
    {
        # code...
        //detail survey
        $survey = $this->surveyModel->getSurveyById($surveyId)->getRow();
        //list pertanyaan dari detail survey
        $pertanyaan = $this->surveyPertanyaanModel->getPertanyaanBySurveyId($survey->id_survey)->getResult();

        $data = [
            'title' => 'Pertanyaan Survey',
            'survey' => $survey,
            'pertanyaan' => $pertanyaan
        ];
        return view('survey/surveyPertanyaan', $data);
    }

    public function answerQuestions()
    {
        # code...
        $answers = $this->request->getPost('answer');
        $idResponden = $this->auth->id();

        $data = [];

        $num = 0;
        foreach ($answers as $key => $value) {
            # code...
            $data[$num] = [
                'id_responden' => $idResponden,
                'id_survey_pertanyaan' => $key,
                'isi_jawaban' => $value
            ];
            $num++;
        }

        $this->surveyJawabanModel->isiJawaban($data);

        return redirect()->to('survey');
    }

    public function infoSurvey($surveyId)
    {
        # code...
        //detail survey sebagai object
        $survey = $this->surveyModel->getSurveyById($surveyId)->getRow();

        //ambil pertanyaan dari id
        $pertanyaan = $this->surveyPertanyaanModel->getPertanyaanBySurveyId($survey->id_survey)->getResult();

        /* $num = 0;
        foreach ($pertanyaan as $key => $value) {
            # code...
            $data[$num]['pertanyaan'] = $value->pertanyaan;
            $num++;
        } */

        $mdata = [
            'title' => 'Info Survey',
            'survey' => $survey,
            'data' => $pertanyaan,
            'surveyJawabanModel' => $this->surveyJawabanModel
        ];

        //$this->prettyVarDump($mdata, 'tes');

        return view('survey/detailSurveyResponden', $mdata);
    }

    public function detailSurvey($id)
    {
        // $jawabanbyIdPertanyaan = $this->survey_pertanyaan_model->getJawabanByPertanyaanId($pertanyaanbyIdSurvey['id_survey_pertanyaan'])->getResult();


        // $detailSurveyPertanyaan = $this->surveyPertanyaanModel->detailPertanyaanJawaban($id)->getResult();
        // foreach ($detailSurveyPertanyaan as $key => $value) {
        // 	# code...
        // 	$array['pertanyaan'] = $value->pertanyaan;
        // 	// $array['survey_desc'] = $value->deskripsi;
        // 	$array['jawaban'][$value->id_survey_jawaban] = $value->isi_jawaban;
        // }
        $survey = $this->survey_model->getSurveyById($id)->getRow();
        $pertanyaanbyIdSurvey = $this->survey_pertanyaan_model->getPertanyaanBySurveyId($id)->getResult();
        $data = [
            'title' => 'Detail survey',
            'survey' => $survey,
            'pertanyaanbyIdSurvey' => $pertanyaanbyIdSurvey,
            // 'jawaban' => $jawabanbyIdPertanyaan,
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

    public function preview($id)
    {
        $survey = $this->survey_model->getSurveyById($id)->getRow();
        $pertanyaanbyIdSurvey = $this->survey_pertanyaan_model->getPertanyaanBySurveyId($id)->getResult();
        $data = [
            'title' => 'Preview Survey',
            'survey' => $survey,
            'pertanyaanbyIdSurvey' => $pertanyaanbyIdSurvey,
            // 'jawaban' => $jawabanbyIdPertanyaan,
        ];
        // tampilkan form create
        return view('survey/preview', $data);
    }
    public function joinCreator()
    {
        # code...
        $userId = $this->auth->id();

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
