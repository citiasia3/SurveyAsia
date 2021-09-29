<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Myth\Auth\Models\UserModel;
use Psr\Log\LoggerInterface;

use SurveyJawabanModel;
use SurveyModel;
use SurveyPertanyaanModel;
use UserProfileModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */

class BaseController extends Controller
{
	/**
	 * An array of helpers to be loaded automatically upon
	 * class instantiation. These helpers will be available
	 * to all other controllers that extend BaseController.
	 *
	 * @var array
	 */
	protected $helpers = ['auth'];

	/**
	 * Menginisiasikan class Model yang akan digunakan.
	 * supaya class Model tersedia pada child Controller yang meng extends
	 * BaseController
	 */
	protected $surveyModel;
	protected $surveyJawabanModel;
	protected $userProfileModel;
	protected $surveyPertanyaanModel;

	protected $user;

	/**
	 * Constructor.
	 *
	 * @param RequestInterface  $request
	 * @param ResponseInterface $response
	 * @param LoggerInterface   $logger
	 */
	public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
	{
		// Do Not Edit This Line
		parent::initController($request, $response, $logger);

		//--------------------------------------------------------------------
		// Preload any models, libraries, etc, here.
		//--------------------------------------------------------------------
		// E.g.: $this->session = \Config\Services::session();

		$this->surveyModel = new SurveyModel();
		$this->surveyJawabanModel = new SurveyJawabanModel();
		$this->userProfileModel = new UserProfileModel();
		$this->surveyPertanyaanModel = new SurveyPertanyaanModel();

		$this->user = new UserModel();

		//$this->userModel->delete();
	}

	/**
	 * Fungsi ini digunakan untuk menampilkan output var_dump yang terformat
	 * 
	 * @param var $var Variabel bebas
	 * @param var $judul Judul untuk output
	 */
	public function prettyVarDump($var, $judul)
	{
		echo $judul.'<br>';
		echo '<pre>';
		print_r($var);
		echo '</pre>';
		echo '<br>';
	}
}
