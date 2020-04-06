<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('AkunModel');
	}
	public function index(){
		$content['title'] = 'Data Akun';
		$content['main_view'] = 'akun/lihat_akun';
		$content['page'] = 'akun';
		$content['data_akun'] = $this->AkunModel->get_all();
		$this->load->view('template/template', $content);
	}
	public function form_tambah(){
		$content['title'] = 'Insert akun';
		$content['main_view'] = 'akun/tambah_akun';
		$content['page'] = '';
		$this->load->view('template/template', $content);
	}
	public function tambah_akun(){
		$data = array(
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
		);
		$cek = $this->AkunModel->insert_akun($data);
		if($cek) $this->session->set_flashdata('flash','akun Berhasil ditambah');
		else $this->session->set_flashdata('flash', 'akun Gagal ditambah');
		redirect('akun');
	}
	public function form_ubah($id_akun){
		$content['title'] = 'Edit Akun';
		$content['main_view'] = 'akun/password_akun';
		$content['page'] = '';
		$content['akun'] = $this->AkunModel->get_akun($id_akun);
		$this->load->view('template/template', $content);
	}
	public function ubah_password($id_akun){
		$data = array(
			'pass' => $this->input->post('pass'),
		);
		$cek = $this->AkunModel->update_akun($id_akun, $data);
		if($cek) $this->session->set_flashdata('flash','password Berhasil diubah');
		else $this->session->set_flashdata('flash', 'password Gagal diubah');
		redirect('akun');
	}
	public function hapus_akun($id_akun){
		$cek = $this->AkunModel->delete_akun($id_akun);
		if($cek) $this->session->set_flashdata('flash','akun Berhasil dihapus');
		else $this->session->set_flashdata('flash', 'akun Gagal dihapus');
		redirect('akun');
	}
}
?>