<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class AkunModel extends CI_Model{
	function __construct(){
		parent::__construct();
	}

	// Get semua data dari tabel akun
	public function get_all(){
		return $this->db->get('akun')->result_array();
	}

	// Get suatu data pada tabel akun berdasarkan id
	public function get_akun($id_akun){
		$this->db->where('id_akun', $id_akun);
		return $this->db->get('akun')->row_array();
	}

	// Memasukkan sebuah data ke tabel akun
	public function insert_akun($data){
		return $this->db->insert('akun',$data);
	}

	//Mengubah Password sebuah data pada tabel berdasarkan id
	public function update_akun($id_akun, $data){
		$this->db->where('id_akun', $id_akun);
		return $this->db->update('akun',$data);
	}

	// Menghapus sebuah data pada tabel akun berdasarkan id
	public function delete_akun($id_akun){
		$this->db->where('id_akun', $id_akun);
		return $this->db->delete('akun');
	}
}
?>