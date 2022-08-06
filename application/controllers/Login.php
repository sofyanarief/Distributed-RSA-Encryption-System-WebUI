<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdlUser');
		$this->pageTitle = "Login Pengguna";
	}

	public function index() {
		if($this->session->userdata('id_user')){
			redirect('dashboard');
		}

		$this->load->view('VwLogin');
	}

	public function doLogin() {
		$data = $this->input->post();
		$data['pass_user'] = md5($data['pass_user']);
		$ret = $this->MdlUser->getDataUserByUsernameAndPassword($data);
		if(count($ret) == 1){
			$ret2 = $this->MdlUser->updateLastLogin($data['id_user']);
			if($ret2){
				$data_session = array('id_user' => $ret[0]->id_user,
					'nama_user' => $ret[0]->nama_user,
					'last_login_user' => $ret[0]->last_login_user,
					'type_of_user' => $ret[0]->type_of_user);
				$this->session->set_userdata($data_session);
				redirect('dashboard');
			}else{
				redirect('login');
			}
		}else{
			redirect('login');
		}
	}

	public function doLogout() {
		$ret = $this->MdlUser->updateLastLogin($this->session->userdata('id_user'));
		if($ret){
			$this->session->sess_destroy();
			redirect('login');
		}
	}

}

/* End of file controllername.php */
/* Location: ./application/controllers/controllername.php */