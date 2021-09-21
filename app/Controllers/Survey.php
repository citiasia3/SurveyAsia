<?php

namespace App\Controllers;

// use App\Models\SurveyModel;
use SurveyModel;

class Survey extends BaseController
{
    protected $survey_model;
    public function __construct()
    {
        $this->survey_model = new SurveyModel();
        // $this->galery_model = new Galery_model();
    }
    public function index()
    {
        $survey = $this->survey_model->getAllSurvey()->getResult();
        $data = [
            'title' => 'Home',
            'survey' => $survey
        ];
        // var_dump($survey);
        return view('survey/index', $data);
    }

    public function detailSurvey($id)
    {
        $survey = $this->survey_model->getSurveyById($id)->getRow();
        $pertanyaanbyIdSurvey = $this->survey_model->detailSurvey($id)->getResult();
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

        //cara fadhil insert db
        $data_survey = [
            // "id" => $random,
            "judul" => $request->getPost('judul'),
            "deskripsi" => $request->getPost('deskripsi'),
            "jumlah_responden" => $request->getPost('jumlah_responden'),
        ];
        $this->survey_model->tambah_survey($data_survey);

        //cara levi insert db
        # code...
        //hanya untuk test
        // $survey = new Survey();
        // $survey->judul = $request->getPost('judul');
        // $survey->deskripsi = $request->getPost('deskripsi');
        // $survey->jumlahResponden = $request->getPost('jumlah_responden');
        // $insert = $this->survey_model->insertSurvey($survey);

        // //output dibawah ini adalah survey ID yang berhasil dimasukkan kedalam database
        // $this->prettyVarDump($insert, 'Survey Input Test');

        return redirect()->to(base_url('survey'));
    }
    // <?= base_url('uploads/survey/' . $p['gambar']); ">

    public function delete($id)
    {
        $this->survey_model->delete_survey($id);
        return redirect()->to(base_url('pages'))->with('success', 'Delete survey ' . 'success');
    }
    public function edit()
    {
        $request = \Config\Services::request();
        if (!$this->validate([
            'gambar' => [
                'rules' => 'is_image[gambar]',
                'errors' => [
                    'is_image' => 'File harus berupa jpg/jpeg/png'
                ]
            ],

        ])) {
            session()->setFlashdata('error', $this->validator->listErrors());
            return redirect()->back()->withInput();
        } else {
            echo "<pre>";
            var_dump($request->getVar());
            echo "</pre>";
        }
        $id =  $request->getPost('id');
        if ($_FILES['gambar']['name']) {
            $dataBerkas = $request->getFile('gambar');
            $fileName = $dataBerkas->getRandomName();
            $data = [
                "nama" => $request->getPost('nama'),
                "deskripsi" => $request->getPost('deskripsi'),
                "harga" => $request->getPost('harga'),
                "gambar" => $fileName,
                "status" => $request->getPost('status')
            ];
            $this->survey_model->edit_survey($data, $id);
            $dataBerkas->move('uploads/survey/', $fileName);
            return redirect()->to(base_url('pages'))->with('success', 'Ubah survey ' . 'success');
        } else {
            $data = [
                "nama" => $request->getPost('nama'),
                "deskripsi" => $request->getPost('deskripsi'),
                "harga" => $request->getPost('harga'),
                "status" => $request->getPost('status'),
                "stok" => $request->getPost('stok')
            ];
            $this->survey_model->edit_survey($data, $id);
            return redirect()->to(base_url('pages'))->with('success', 'Ubah survey ' . 'success');
        }
    }
}
