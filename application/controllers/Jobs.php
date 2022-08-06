<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jobs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdlJobs');
		$this->pageTitle = "";
		if(!$this->session->userdata('id_user')){
			redirect('login');
		}
	}

	public function index()
	{
		$this->pageTitle = "Daftar Pekerjaan";
		$data['jobs'] = $this->MdlJobs->getAllDataJobs();
		$this->load->view('VwJobs',$data);
	}
}

/* End of file key.php */
/* Location: ./application/controllers/key.php */