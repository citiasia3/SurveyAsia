<?php

namespace App\Controllers;

use App\Data\Survey;
use App\Data\User as User;
use SurveyJawabanModel;
use SurveyModel;
use UserModel;

class Home extends BaseController
{
	protected $surveyModel;
	protected $surveyJawabanModel;
	protected $userModel;
	//test push ke branch fadhil
	//test push ke branch fadhil yg keduaa harus dongg

	public function __construct()
	{
		$this->surveyModel = new SurveyModel();
		$this->surveyJawabanModel = new SurveyJawabanModel();
		$this->userModel = new UserModel();
	}

	public function index()
	{
		$data = [
			'title' => 'Dashboard',

		];
		// var_dump($survey);
		return view('home/index', $data);
	}

	private function testInsertUser()
	{
		# code...
		//hanya untuk test
		$user = new User();
		$user->username = 'test';
		$user->email = 'test';
		$user->firstName = 'iam';
		$user->lastName = 'legend';
		$user->password = password_hash('test', PASSWORD_DEFAULT);
		$user->roleId = '1';
		$user->isActive = '1';
		$insert = $this->userModel->insertUser($user);

		//output dibawah ini adalah user ID yang berhasil dimasukkan kedalam database
		$this->prettyVarDump($insert, 'User Insert Test');
	}

	private function testInsertSurvey()
	{
		# code...
		//hanya untuk test
		$survey = new Survey();
		$survey->judul = 'test';
		$survey->deskripsi = 'test';
		$survey->jumlahResponden = 0;
		$insert = $this->surveyModel->insertSurvey($survey);

		//output dibawah ini adalah survey ID yang berhasil dimasukkan kedalam database
		$this->prettyVarDump($insert, 'Survey Input Test');
	}

	private function showTestData(bool $showJson = false)
	{
		# code...
		$detailSurvey = $this->surveyModel->detailSurvey(1)->getResult();
		$detailJawaban = $this->surveyJawabanModel->detailJawaban(1)->getResult();

		foreach ($detailSurvey as $key => $value) {
			# code...
			$array['survey_id'] = $value->id_survey;
			$array['survey_desc'] = $value->deskripsi;
			$array['pertanyaan'][$value->id_survey_pertanyaan] = $value->pertanyaan;
		}

		if ($showJson) {
			echo 'Detail Survey Mode JSON';
			echo '<pre>' . json_encode($detailJawaban, JSON_PRETTY_PRINT) . '</pre>';
			return;
		}


		$this->prettyVarDump($array, 'Detail Survey');
		$this->prettyVarDump($detailJawaban, 'Detail Survey Jawaban');
	}
}
