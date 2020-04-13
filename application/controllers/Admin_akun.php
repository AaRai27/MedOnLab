<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_akun extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ModelAccount');
	}
	public function index(){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Data Akun';
        $content['page'] = 'akun';
        $content['data_akun'] = $this->ModelAccount->get_all();
        $this->load->view('templates/headerAdmin', $content);
        $this->load->view('contents/Admin_lihatAkun', $content);
        $this->load->view('templates/footer');
	}
	public function form_tambah(){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Tambah akun';
        $this->load->view('templates/headerAdmin', $content);
        $this->load->view('contents/Admin_tambahAkun');
        $this->load->view('templates/footer');
	}
	public function tambah_akun(){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Tambah akun';
        $this->load->view('templates/headerAdmin', $content);
		$content = array(
			'fullname' => $this->input->post('fullname'),
			'username' => $this->input->post('username'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
        );
        $this->load->view('templates/footer');
		$cek = $this->ModelAccount->insert_akun($content);
		if($cek) $this->session->set_flashdata('flash','akun Berhasil ditambah');
		else $this->session->set_flashdata('flash', 'akun Gagal ditambah');
		redirect('Admin_akun');
	}

	public function form_ubah($id){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$content['title'] = 'Ubah Akun';
        $content['akun'] = $this->ModelAccount->get_akun($id);
        $this->load->view('templates/headerAdmin', $content);
        $this->load->view('contents/Admin_ubahAkun', $content);
        $this->load->view('templates/footer');
	}
	public function ubah_akun($id){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Ubah Akun';
        $this->load->view('templates/headerAdmin', $content);
		$content = array(
			'fullname' => $this->input->post('fullname'),
			'email' => $this->input->post('email'),
			'password' => $this->input->post('password'),
        );
        $this->load->view('templates/footer');
		$cek = $this->ModelAccount->update_akun($id, $content);
		if($cek) $this->session->set_flashdata('flash','Akun Berhasil diubah');
		else $this->session->set_flashdata('flash', 'Akun Gagal diubah');
		redirect('Admin_akun');
	}
	public function hapus_akun($id){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/headerAdmin');
        $this->load->view('templates/footer');
		$cek = $this->ModelAccount->delete_akun($id);
		if($cek) $this->session->set_flashdata('flash','akun Berhasil dihapus');
		else $this->session->set_flashdata('flash', 'akun Gagal dihapus');
		redirect('Admin_akun');
	}
}
?>