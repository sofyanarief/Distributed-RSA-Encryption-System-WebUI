<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MdlKey extends CI_Model {

	function __construct(){
		$this->tableName = 't_user_key';
	}

	// function getAllDataKey(){
	// 	$qry = $this->db->get($this->tableName);
	// 	if ($qry) {
	// 		return $qry->result_array();
	// 	}else {
	// 		return FALSE;
	// 	}
	// }

	function getAllDataKeyByUser($idToView){
		$this->db->where('t_user_id_user', $idToView);
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	function getDataKey($idToView){
		$this->db->where('id_user_key', $idToView);
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	function addDataKey($data){
		$qry = $this->db->insert($this->tableName, $data);
		if ($qry) {
			return 'addDone';
		} else {
			return 'addErr1';
		}
	}

	function editDataKey($data){
		$this->db->set('name_user_key', $data['name_user_key']);
		$this->db->where('id_user_key', $data['id_user_key']);
		$qry = $this->db->update($this->tableName);
		if ($qry) {
			return 'updDone';
		} else {
			return 'updErr1';
		}
	}

	function delDataKey($idToDel){
		$this->db->where('id_user_key', $idToDel);
		$qry = $this->db->delete($this->tableName);
		if ($qry) {
			return 'delDone';
		} else {
			return 'delErr1';
		}
	}
}

/* End of file MdlKey.php */
/* Location: ./application/models/MdlKey.php */
?>