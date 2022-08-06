<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MdlJobs extends CI_Model {

	function __construct(){
		$this->tableName = 't_jobs';
	}

	function getAllDataJobs(){
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	// function getAllDataJobsByUser($idToView){
	// 	$this->db->where('t_user_id_user', $idToView);
	// 	$qry = $this->db->get($this->tableName);
	// 	if ($qry) {
	// 		return $qry->result_array();
	// 	}else {
	// 		return FALSE;
	// 	}
	// }

	// function getDataJobs($idToView){
	// 	$this->db->where('id_jobs', $idToView);
	// 	$qry = $this->db->get($this->tableName);
	// 	if ($qry) {
	// 		return $qry->result_array();
	// 	}else {
	// 		return FALSE;
	// 	}
	// }

	function addDataJobs($data){
		$qry = $this->db->insert($this->tableName, $data);
		if ($qry) {
			return 'addDone';
		} else {
			return 'addErr1';
		}
	}

	// function editDataJobs($data){
	// 	$this->db->set('name_jobs', $data['name_jobs']);
	// 	$this->db->where('id_jobs', $data['id_jobs']);
	// 	$qry = $this->db->update($this->tableName);
	// 	if ($qry) {
	// 		return 'updDone';
	// 	} else {
	// 		return 'updErr1';
	// 	}
	// }

	// function delDataJobs($idToDel){
	// 	$this->db->where('id_jobs', $idToDel);
	// 	$qry = $this->db->delete($this->tableName);
	// 	if ($qry) {
	// 		return 'delDone';
	// 	} else {
	// 		return 'delErr1';
	// 	}
	// }
}

/* End of file MdlJobs.php */
/* Location: ./application/models/MdlJobs.php */
?>