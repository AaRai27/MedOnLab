<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMedcheck extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	// Get semua data dari tabel MedCheck
	public function get_all(){
		return $this->db->get('medcek')->result_array();
	}

	// Get suatu data pada tabel medcheck berdasarkan id
	public function get_medcheck($id){
		$this->db->where('id', $id);
		return $this->db->get('medcek')->row_array();
	}

	// Memasukkan sebuah data ke tabel medcheck
	public function insert_medcheck($data){
		return $this->db->insert('medcek',$data);
	}

	//Memasukkan Hasil Lab ke MedCheck berdasarkan id
	// public function insert_hasillab($id, $data){
	// 	$this->db->where('id', $id);
	// 	return $this->db->insert('medcek',$data);
	// }

	//Mengubah sebuah data pada tabel berdasarkan id
	public function update_medcheck($id, $data){
		$this->db->where('id', $id);
		return $this->db->update('medcek',$data);
	}

	// Menghapus sebuah data pada tabel medcheck berdasarkan id
	public function delete_medcheck($id){
		$this->db->where('id', $id);
		return $this->db->delete('medcek');
	}
}
?>