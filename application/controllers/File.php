<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('MdlFile');
		$this->load->model('MdlJobs');
		$this->pageTitle = "";
		$this->fileStorePath = './tmp/';
		if(!$this->session->userdata('id_user')){
			redirect('login');
		}
	}

	public function index()
	{
		$this->pageTitle = "Daftar File";
		$data['arrFile'] = $this->MdlFile->getAllDataFileByUser($this->session->userdata('id_user'));
		$this->load->view('VwFile',$data);
	}

	public function tambah()
	{
		$this->pageTitle = "Tambah File";
		$this->load->view('VwAddFile');
	}

	public function uploadfile()
	{
		$config['upload_path'] = $this->fileStorePath;
		$config['allowed_types'] = '*';
		// $config['remove_spaces'] = true ;
		$this->load->library('upload', $config);
        if (!$this->upload->do_upload('file')) {
            // $error = array('error' => $this->upload->display_errors());
            $json = 'error|'.$this->upload->display_errors();
        } else {
            $json = 'success|'.$this->upload->data('file_name'); 
        }
        echo json_encode($json);
	}

	public function prostambah()
	{
		date_default_timezone_set("Asia/Jakarta");
		$nowDate = date('Y-m-d H:i:s');
		$newFileName = md5($this->session->userdata('id_user').$nowDate);
		$frmData = $this->input->post();
		if(isset($frmData['id_user_key'])){	
			$cmd = shell_exec('mv ./tmp/'.$frmData['filename'].' /nfs-share/raw-file/'.$newFileName);
			$data['id_user_files'] = $newFileName;
			$data['orig_name_user_files'] = $frmData['filename'];
			$data['saved_name_user_files'] = $newFileName;
			$data['status_user_files'] = 'QENC';
			$data['date_up_user_files'] = $nowDate;
			$data['t_user_id_user'] = $this->session->userdata('id_user');
			$data['t_user_key_id_user_key'] = $frmData['id_user_key'];
			$ret = $this->MdlFile->addDataFile($data);
			if($ret){
				$data = array(
					'id_jobs'						=> '',
					'date_enter_jobs'				=> $nowDate,
					'date_start_jobs'				=> '',
					'date_finish_jobs'				=> '',
					'type_of_jobs'					=> '0',
					't_user_files_id_user_files'	=> $newFileName
				);
				$ret = $this->MdlJobs->addDataJobs($data);
				$this->session->set_flashdata('submitted',$ret);
				redirect('file');
			}else{
				echo $ret;
			}
		}else{
			$this->tambah();
		}
	}

	public function dekrip($idToDekrip)
	{
		date_default_timezone_set("Asia/Jakarta");
		$nowDate = date('Y-m-d H:i:s');
		$data['status_user_files'] = 'QDEC';
		$data['id_user_files'] = $idToDekrip;
		$ret = $this->MdlFile->updateStatusFile($data);
		if($ret == 'updDone'){
			$data = array(
				'id_jobs'						=> '',
				'date_enter_jobs'				=> $nowDate,
				'date_start_jobs'				=> '',
				'date_finish_jobs'				=> '',
				'type_of_jobs'					=> '3',
				't_user_files_id_user_files'	=> $idToDekrip
			);
			$ret = $this->MdlJobs->addDataJobs($data);
			$this->session->set_flashdata('submitted',$ret);
			redirect('file');
		}else{
			echo $ret;
		}
	}

	// // public function detil($idToView)
	// // {
	// // 	$this->pageTitle = "Detil Data File";
	// // 	$data['file'] = $this->MdlFile->getDataFile($idToView);
	// // 	$this->load->view('VwDetilFile',$data);
	// // }

	// public function ubah($idToEdit)
	// {
	// 	$this->pageTitle = "Ubah Data File";
	// 	$data['file'] = $this->MdlFile->getDataFile($idToEdit);
	// 	$this->load->view('VwEditFile',$data);
	// }

	// public function prosubah()
	// {
	// 	$frmData = $this->input->post();
	// 	$this->form_validation->set_rules('name_user_file1', 'Nama File Baru', 'required|min_length[5]|max_length[45]',
	// 		array(
	// 			'required'		=> 'Kolom %s tidak boleh kosong',
	// 			'min_length'	=> 'Panjang isi minimal kolom %s adalah 5',
	// 			'max_length'	=> 'Panjang isi maksimal kolom %s adalah 45'
	// 		));
		
	// 	if ($this->form_validation->run() == FALSE){
	// 		$this->ubah($frmData['id_user_file']);
	// 	} else{
	// 		$dataToUpdate = array(
	// 			'id_user_file'	=> $frmData['id_user_file'],
	// 			'name_user_file'	=> $frmData['name_user_file1']
	// 		);
	// 		$ret = $this->MdlFile->editDataFile($dataToUpdate);
	// 		if($ret){
	// 			$this->session->set_flashdata('submitted',$ret);
	// 			redirect('file');
	// 		}else{
	// 			echo $ret;
	// 		}
	// 	}
	// }

	// public function hapus($idToDel)
	// {
	// 	$ret = $this->MdlFile->getAllDataFileByFile($idToDel);
	// 	if (count($ret) !== 0) {
	// 		$this->session->set_flashdata('delErr2',$ret);
	// 		redirect('file');
	// 	}else{
	// 		$ret = $this->MdlFile->delDataFile($idToDel);
	// 		if($ret){
	// 			$this->session->set_flashdata('submitted',$ret);
	// 			redirect('file');
	// 		}
	// 	}
	// }

	public function unduh($idToUnduh)
	{
		$this->load->helper('download');
		force_download($this->fileStorePath.$idToUnduh, NULL);
	}

	// // public function getalldataajax()
	// // {
	// // 	$data = $this->MdlFile->getAllDataFile();
	// // 	echo json_encode($data);
	// // }
}

/* End of file file.php */
/* Location: ./application/controllers/file.php */