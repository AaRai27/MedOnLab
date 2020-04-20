<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelMedcheck extends CI_Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function get_all_akun()
	{
		return $this->db->get('akun')->result_array();
	}

	// Get semua data dari tabel MedCheck
	public function get_all()
	{
		return $this->db->get('medcek')->result_array();
	}

	public function getAkunById()
	{
		return $this->db->get_where('akun', ['id_pasien' => $this->input->post('id_pasien')])->row_array();
	}

	// Get suatu data pada tabel medcheck berdasarkan id
	public function get_medcheck($id)
	{
		$this->db->where('id', $id);
		return $this->db->get('medcek')->row_array();
	}

	// Memasukkan sebuah data ke tabel medcheck
	public function insert_medcheck()
	{
		$nama_pasien = $this->ModelMedcheck->getAkunById();
		$tgl_periksa = date("d F Y", strtotime("+2 day"));
		$tgl_ambil = date("d F Y", strtotime("+5 day"));
		$data = [
			'id_pasien' => htmlspecialchars($this->input->post('id_pasien', true)),
			'nama_pasien' => $nama_pasien['fullname'], //htmlspecialchars($this->input->post('nama_pasien', true)),
			'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
			'layanan' => htmlspecialchars($this->input->post('layanan', true)),
			'cabang' => htmlspecialchars($this->input->post('cabang', true)),
			'alamat' => htmlspecialchars($this->input->post('alamat', true)),
			'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
			'img_bukti' => NULL,
			'tgl_periksa' => $tgl_periksa,
			'tgl_ambil' => $tgl_ambil,
			'status' => 0,
			'hasil_lab' => NULL //(0 = belum bayar, 1 = sedang di proses, 2 = selesai )
		];
		$this->db->insert('medcek', $data);
	}

	//Memasukkan Hasil Lab ke MedCheck berdasarkan id
	// public function insert_hasillab($id, $data){
	// 	$this->db->where('id', $id);
	// 	return $this->db->insert('medcek',$data);
	// }

	//Mengubah sebuah data pada tabel berdasarkan id
	public function update_medcheck($id)
	{
		$data = array(
			'nama_pasien' => $this->input->post('nama_pasien'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'layanan' => $this->input->post('layanan'),
			'cabang' => $this->input->post('cabang'),
			'alamat' => $this->input->post('alamat'),
			'nomor_hp' => $this->input->post('nomor_hp'),
			'img_bukti' => $this->input->post('img_bukti'),
			'status' => $this->input->post('status'),
			'hasil_lab' => $this->input->post('hasil_lab')
		);
		$this->db->where('id', $id);
		return $this->db->update('medcek', $data);
	}

	// Menghapus sebuah data pada tabel medcheck berdasarkan id
	public function delete_medcheck($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('medcek');
	}
}
