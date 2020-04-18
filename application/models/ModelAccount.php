<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelAccount extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	// Get semua data dari tabel akun
	public function get_all()
	{
		return $this->db->get('akun')->result_array();
	}

	// Get suatu data pada tabel akun berdasarkan id
	public function get_akun($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('akun')->row_array();
	}

	// Memasukkan sebuah data ke tabel akun
	public function insert_akun()
	{
		$data = [
			'id_pasien' => htmlspecialchars($this->input->post('id_pasien', true)),
			'fullname' => htmlspecialchars($this->input->post('fullname', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'email' => htmlspecialchars($this->input->post('email', true)),
			'image' => 'default.jpg',
			'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
			'role_id' => 2, //(1 = admin, 2 = member)
			'is_active' => 1,
			'date_created' => time()
		];
		return $this->db->insert('akun', $data);
	}

	//Mengubah Data pada tabel berdasarkan id
	public function update_akun($id)
	{
		$data = array(
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email')
		);
		$this->db->where('id', $id);
		return $this->db->update('akun', $data);
	}

	public function ubahPassword($id)
	{
		$new_password =  password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
		$this->db->set('password', $new_password);
		$this->db->where('id', $id);
		$this->db->update('akun');
	}

	// Menghapus sebuah data pada tabel akun berdasarkan id
	public function delete_akun($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('akun');
	}
}
