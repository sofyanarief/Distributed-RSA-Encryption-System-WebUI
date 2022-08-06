<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MdlFile extends CI_Model {

	function __construct(){
		$this->tableName = 't_user_files';
	}

	function getAllDataFileByKey($idToView){
		$this->db->where('t_user_key_id_user_key', $idToView);
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	// function getAllDataFile(){
	// 	$qry = $this->db->get($this->tableName);
	// 	if ($qry) {
	// 		return $qry->result_array();
	// 	}else {
	// 		return FALSE;
	// 	}
	// }
	function updateStatusFile($data){
		$this->db->set('status_user_files', $data['status_user_files']);
		$this->db->where('id_user_files', $data['id_user_files']);
		$qry = $this->db->update($this->tableName);
		if ($qry) {
			return 'updDone';
		} else {
			return 'updErr1';
		}
	}

	function getAllDataFileByUser($idToView){
		$this->db->where('t_user_id_user', $idToView);
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	function getDataFile($idToView){
		$this->db->where('id_user_key', $idToView);
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	function addDataFile($data){
		$qry = $this->db->insert($this->tableName, $data);
		if ($qry) {
			return 'addDone';
		} else {
			return 'addErr1';
		}
	}

	// function editDataFile($data){
	// 	$this->db->set('NAMA_PRODI', $data['NAMA_PRODI']);
	// 	$this->db->where('id_user_key', $data['id_user_key']);
	// 	$qry = $this->db->update($this->tableName);
	// 	if ($qry) {
	// 		return 'updDone';
	// 	} else {
	// 		return 'updErr1';
	// 	}
	// }

	function delDataFile($idToDel){
		$this->db->where('id_user_key', $idToDel);
		$qry = $this->db->delete($this->tableName);
		if ($qry) {
			return 'delDone';
		} else {
			return 'delErr1';
		}
	}
}

/* End of file MdlFile.php */
/* Location: ./application/models/MdlFile.php */
?>