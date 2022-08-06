<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Key extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdlKey');
		$this->load->model('MdlFile');
		$this->load->helper('download');
		$this->pageTitle = "";
		$this->keystorePath = '/nfs/key/';
		if(!$this->session->userdata('id_user')){
			redirect('login');
		}
	}

	public function index()
	{
		$this->pageTitle = "Daftar Kunci";
		$data['key'] = $this->MdlKey->getAllDataKeyByUser($this->session->userdata('id_user'));
		$this->load->view('VwKey',$data);
	}

	public function tambah()
	{
		$this->pageTitle = "Tambah Kunci";
		$this->load->view('VwAddKey');
	}

	public function prostambah()
	{
		$frmData = $this->input->post();
		$this->form_validation->set_rules('name_user_key', 'Nama Kunci', 'required|min_length[5]|max_length[45]',
			array(
				'required'		=> 'Kolom %s tidak boleh kosong',
				'min_length'	=> 'Panjang isi minimal kolom %s adalah 5',
				'max_length'	=> 'Panjang isi maksimal kolom %s adalah 45'
			));
		
		if ($this->form_validation->run() == FALSE){
			$this->tambah();
		}else{
			date_default_timezone_set("Asia/Jakarta");
			$nowDate = date('Y-m-d H:i:s');
			$frmData['id_user_key'] = md5($this->session->userdata('id_user').$nowDate);
			$frmData['gen_date_user_key'] = $nowDate;
			$frmData['t_user_id_user'] = $this->session->userdata('id_user');
			$cmd = 'python /home/engine/public_html/application/controllers/GenKey.py -n '.$frmData['id_user_key'].' -m add';
			$ret = shell_exec($cmd);
			$ret = preg_replace('/\s+/', '', $ret);
			if($ret == 'done'){
				$ret = $this->MdlKey->addDataKey($frmData);
				if($ret){
					if($ret == 'addDone'){
						$this->session->set_flashdata('submitted',$ret);
						redirect('key');
					}
				}else{
					echo $ret;
				}
			}else{
				$this->session->set_flashdata('submitted','addErr2');
				redirect('key');
			}
		}
	}

	// public function detil($idToView)
	// {
	// 	$this->pageTitle = "Detil Data Key";
	// 	$data['key'] = $this->MdlKey->getDataKey($idToView);
	// 	$this->load->view('VwDetilKey',$data);
	// }

	public function ubah($idToEdit)
	{
		$this->pageTitle = "Ubah Data Kunci";
		$data['key'] = $this->MdlKey->getDataKey($idToEdit);
		$this->load->view('VwEditKey',$data);
	}

	public function prosubah()
	{
		$frmData = $this->input->post();
		$this->form_validation->set_rules('name_user_key1', 'Nama Kunci Baru', 'required|min_length[5]|max_length[45]',
			array(
				'required'		=> 'Kolom %s tidak boleh kosong',
				'min_length'	=> 'Panjang isi minimal kolom %s adalah 5',
				'max_length'	=> 'Panjang isi maksimal kolom %s adalah 45'
			));
		
		if ($this->form_validation->run() == FALSE){
			$this->ubah($frmData['id_user_key']);
		} else{
			$dataToUpdate = array(
				'id_user_key'	=> $frmData['id_user_key'],
				'name_user_key'	=> $frmData['name_user_key1']
			);
			$ret = $this->MdlKey->editDataKey($dataToUpdate);
			if($ret){
				$this->session->set_flashdata('submitted',$ret);
				redirect('key');
			}else{
				echo $ret;
			}
		}
	}

	public function hapus($idToDel)
	{
		$ret = $this->MdlFile->getAllDataFileByKey($idToDel);
		if (count($ret) !== 0) {
			$this->session->set_flashdata('delErr2',$ret);
			redirect('key');
		}else{
			$ret = $this->MdlKey->delDataKey($idToDel);
			if($ret){
				$cmd = 'python /home/engine/public_html/application/controllers/GenKey.py -n '.$idToDel.' -m del';
				$ret2 = shell_exec($cmd);
				$this->session->set_flashdata('submitted',$ret);
				redirect('key');
			}
		}
	}

	public function unduh($idToUnduh)
	{
		force_download($this->keystorePath.$idToUnduh.'.key', NULL);
	}

	public function getallkeybyuserajax($idToView)
	{
		$data = $this->MdlKey->getAllDataKeyByUser($idToView);
		echo json_encode($data);
	}
}

/* End of file key.php */
/* Location: ./application/controllers/key.php */