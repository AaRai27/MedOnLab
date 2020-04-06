<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class medcheck extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('MedCheckModel');
	}
	public function index(){
		$content['title'] = 'Data Medical Check Up';
		$content['main_view'] = 'medcheck/lihat_medcheck';
		$content['page'] = 'medcheck';
		$content['data_medcheck'] = $this->MedCheckModel->get_all();
		$this->load->view('template/template', $content);
	}
	public function form_tambah(){
		$content['title'] = 'Insert Medical Check Up';
		$content['main_view'] = 'medcheck/tambah_medcheck';
		$content['page'] = '';
		$this->load->view('template/template', $content);
	}
	public function tambah_medcheck(){
		$data = array(
			'nama' => $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jenis_layanan' => $this->input->post('jenis_layanan'),
			'tgl_layanan' => $this->input->post('tgl_layanan'),
			'jam_layanan' => $this->input->post('jam_layanan'),
			'cabang' => $this->input->post('cabang'),
		);
		$cek = $this->MedCheckModel->insert_medcheck($data);
		if($cek) $this->session->set_flashdata('flash','Medical Berhasil ditambah');
		else $this->session->set_flashdata('flash', 'Medical Gagal ditambah');
		redirect('medcheck');
	}
	public function form_ubah($id_medcheck){
		$content['title'] = 'Edit Medical Check Up';
		$content['main_view'] = 'medcheck/ubah_medcheck';
		$content['page'] = '';
		$content['medcheck'] = $this->MedCheckModel->get_medcheck($id_medcheck);
		$this->load->view('template/template', $content);
	}
	public function ubah_medcheck($id_medcheck){
		$data = array(
			'nama' => $this->input->post('nama'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'jenis_layanan' => $this->input->post('jenis_layanan'),
			'tgl_layanan' => $this->input->post('tgl_layanan'),
			'jam_layanan' => $this->input->post('jam_layanan'),
			'cabang' => $this->input->post('cabang'),
		);
		$cek = $this->MedCheckModel->update_medcheck($id_medcheck, $data);
		if($cek) $this->session->set_flashdata('flash','Medical Berhasil diubah');
		else $this->session->set_flashdata('flash', 'Medical Gagal diubah');
		redirect('medcheck');
	}
	public function hapus_medcheck($id_medcheck){
		$cek = $this->MedCheckModel->delete_medcheck($id_medcheck);
		if($cek) $this->session->set_flashdata('flash','Medical Berhasil dihapus');
		else $this->session->set_flashdata('flash', 'Medical Gagal dihapus');
		redirect('medcheck');
	}
	// public function form_ubah($id_medcheck){
	// 	$content['title'] = 'Input Hasil Lab';
	// 	$content['main_view'] = 'medcheck/tambah_hasillab';
	// 	$content['page'] = '';
	// 	$content['medcheck'] = $this->MedCheckModel->get_medcheck($id_medcheck);
	// 	$this->load->view('template/template', $content);
	// }
	// public function tambah_hasillab($id_medcheck){
	// 	$data = array(
	// 		'hasil' => $this->input->post('hasil'),
	// 	);
	// 	$cek = $this->MedCheckModel->insert_hasillab($id_medcheck, $data);
	// 	if($cek) $this->session->set_flashdata('flash','Hasil Lab Berhasil ditambah');
	// 	else $this->session->set_flashdata('flash', 'Hasil Lab Gagal ditambah');
	// 	redirect('medcheck');
	// }
}
?>