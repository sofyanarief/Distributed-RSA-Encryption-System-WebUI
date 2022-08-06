<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MdlUser extends CI_Model {

	function __construct(){
		$this->tableName = 't_user';
	}

	function getDataUserByUsernameAndPassword($data){
		$this->db->where('id_user', $data['id_user']);
		$this->db->where('pass_user', $data['pass_user']);
		$this->db->where('disabled_user', 0);
		$qry = $this->db->get($this->tableName);
		print_r($this->db->last_query());
		if ($qry) {
			return $qry->result();
		}else {
			return FALSE;
		}
	}

	function updateLastLogin($idToUpdate){
		date_default_timezone_set("Asia/Jakarta");
		$nowDate = date('Y-m-d H:i:s');
		$this->db->set('last_login_user', $nowDate);
		$this->db->where('id_user', $idToUpdate);
		$qry = $this->db->update($this->tableName);
		return $qry;
	}

	// function getAllDataUser(){
	// 	$qry = $this->db->get($this->tableName);
	// 	if ($qry) {
	// 		return $qry->result_array();
	// 	}else {
	// 		return FALSE;
	// 	}
	// }

	function getDataUser($idToView){
		$this->db->where('id_user', $idToView);
		$qry = $this->db->get($this->tableName);
		if ($qry) {
			return $qry->result_array();
		}else {
			return FALSE;
		}
	}

	// function addDataUser($data){
	// 	$this->db->where('id_user', $data['id_user']);
	// 	$qry = $this->db->get($this->tableName);
	// 	if ($qry) {
	// 		if ($qry->num_rows() != 0) {
	// 			// ID sudah ada
	// 			return 'addErr2';
	// 		} else {
	// 			$qry = $this->db->insert($this->tableName, $data);
	// 			if ($qry) {
	// 				return 'addDone';
	// 			} else {
	// 				// Gagal masukin data
	// 				return 'addErr3';
	// 			}
	// 		}
	// 	} else {
	// 		// Gagal ngecek duplikat id
	// 		return 'addErr1';
	// 	}
	// }

	// function editDataUser($data){
	// 	if($data['UBAH_SANDI'] == TRUE){
	// 		$this->db->set('nama_user', $data['nama_user']);
	// 		$this->db->set('pass_user', $data['pass_user']);
	// 		$this->db->where('id_user', $data['id_user']);
	// 	}else{
	// 		$this->db->set('nama_user', $data['nama_user']);
	// 		$this->db->where('id_user', $data['id_user']);
	// 	}
	// 	$qry = $this->db->update($this->tableName);
	// 	if ($qry) {
	// 		return 'updDone';
	// 	} else {
	// 		return 'updErr1';
	// 	}
	// }

	// function delDataUser($idToDel){
	// 	$this->db->set('disabled_user', 1);
	// 	$this->db->where('id_user', $idToDel);
	// 	$qry = $this->db->update($this->tableName);
	// 	if ($qry) {
	// 		return 'delDone';
	// 	} else {
	// 		return 'delErr1';
	// 	}
	// }
}

/* End of file MdlUser.php */
/* Location: ./application/models/MdlUser.php */