<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->pageTitle = "Dasbor";
		
		if(empty($this->session->userdata('id_user'))){
			redirect('login');
		}
	}

	public function index()
	{
		$this->load->view('VwDashboard');
	}
}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */