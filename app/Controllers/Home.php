<?php

namespace App\Controllers;

use App\Data\Survey;
use App\Data\User as User;

class Home extends BaseController
{
	protected $userModel;

	public function index()
	{
		/* $this->type_satu(1,false); */
		//$this->testDeleteUser(20);
		//$this->testInsertUser();
		//$this->testUpdateUser(21);
		/* echo 'home';
		echo '<br><br><br><a href="">logout</a>'; */

		/* $auth = service('authorization');
		$auth->addPermissionToUser('manage_survey', 4); */

		$data = [
			'title' => 'Dashboard'
		];

		return view('home/index', $data);
		/* $user = $this->auth->user();
		$check = $this->auth->check();

		$this->prettyVarDump($check,'user'); */

		/* $this->type_satu(1, true);
		$this->type_dua(true); */
	}

	public function dashboard()
	{
		# code...
		echo 'dashboard';
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

	private function testDeleteUser($id_user)
	{
		# code...
		$delete = $this->userModel->deleteUser($id_user);
		if ($delete->connID->affected_rows > 0) {
			# code...
			echo 'User deleted! id = ' . $id_user;
		} else {
			echo 'Test Fail';
		}
	}

	private function testUpdateUser($id_user)
	{
		# code...
		$user = new User();
		$user->idUser = $id_user;
		$user->username = 'test';
		$user->email = 'test';
		$user->firstName = 'iam';
		$user->lastName = 'legend';
		$user->password = password_hash('test', PASSWORD_DEFAULT);
		$user->roleId = '1';
		$user->isActive = '1';

		$update = $this->userModel->updateUser($id_user, $user);
		$this->prettyVarDump($update, 'Test Update');
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

	private function type_dua(bool $showJson)
	{
		# code...
		$allSurvey = $this->surveyModel->getAllSurvey()->getResult();

		$num = 0;
		foreach ($allSurvey as $key => $value) {
			# code...
			$data[$num]['id_survey'] = $value->id_survey;
			$data[$num]['judul'] = $value->judul;
			$data[$num]['deskripsi'] = $value->deskripsi;
			$data[$num]['jml_responden'] = $value->jumlah_responden;
			$data[$num]['pertanyaan'] = [];
			$listPertanyaan = $this->surveyPertanyaanModel->getPertanyaanBySurveyId($value->id_survey)->getResultArray();
			$count = $this->surveyPertanyaanModel->countPertanyaan($value->id_survey);
			//$this->prettyVarDump($listPertanyaan, 'List Pertanyaan');
			$data[$num]['jml_pertanyaan'] = $count;
			if ($listPertanyaan != null) {
				# code...
				$num2 = 0;
				foreach ($listPertanyaan as $mkey => $mvalue) {
					# code...
					$pertanyaan[$mkey] = $mvalue;
					$data[$num]['pertanyaan'] = $pertanyaan;
					//$listJawaban = $this->;

					$num2++;
				}
			}
			$num++;
		}

		//cara akses array diatas
		/* foreach ($data as $key => $value) {
			# code...
			foreach ($value as $mkey => $mvalue) {
				# code...
				
				$this->prettyVarDump($mvalue,'tes');
				if ($mkey == 'pertanyaan') {
					# code...
					foreach ($mvalue as $xkey => $xvalue) {
						# code...
						
					}
				}
			}
		} */

		if ($showJson) {
			$this->prettyVarDump(json_encode($data, JSON_PRETTY_PRINT), 'All Survey JSON');
			return;
		}

		$this->prettyVarDump($data, 'All Survey');
	}

	private function type_satu($id_survey, bool $showJson = false)
	{
		# code...
		$detailSurvey = $this->surveyModel->detailSurvey($id_survey)->getResultArray();


		if ($showJson) {
			$this->prettyVarDump(json_encode($detailSurvey, JSON_PRETTY_PRINT), 'Detail Survey');
			return;
		}


		$this->prettyVarDump($detailSurvey, 'Detail Survey');
	}
}
