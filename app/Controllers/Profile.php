<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProfilePage extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Profile');
		$this->load->helper('form');
		$this->load->library('form_validation');
	}
}
?>
