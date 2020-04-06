<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class MedCheckModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	// Get semua data dari tabel MedCheck
	public function get_all(){
		return $this->db->get('medcheck')->result_array();
	}

	// Get suatu data pada tabel medcheck berdasarkan id
	public function get_medcheck($id_medcheck){
		$this->db->where('id_medcheck', $id_medcheck);
		return $this->db->get('medcheck')->row_array();
	}

	// Memasukkan sebuah data ke tabel medcheck
	public function insert_medcheck($data){
		return $this->db->insert('medcheck',$data);
	}

	//Memasukkan Hasil Lab ke MedCheck berdasarkan id
	// public function insert_hasillab($id_medcheck, $data){
	// 	$this->db->where('id_medcheck', $id_medcheck);
	// 	return $this->db->insert('medcheck',$data);
	// }

	//Mengubah sebuah data pada tabel berdasarkan id
	public function update_medcheck($id_medcheck, $data){
		$this->db->where('id_medcheck', $id_medcheck);
		return $this->db->update('medcheck',$data);
	}

	// Menghapus sebuah data pada tabel medcheck berdasarkan id
	public function delete_medcheck($id_medcheck){
		$this->db->where('id_medcheck', $id_medcheck);
		return $this->db->delete('medcheck');
	}
}
?>