<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_medcheck extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->model('ModelMedcheck');
	}
	public function index(){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$content['title'] = 'Data Medical Check Up';
		$content['page'] = 'medcheck';
        $content['data_medcheck'] = $this->ModelMedcheck->get_all();
        $this->load->view('templates/headerAdmin', $content);
        $this->load->view('contents/Admin_lihatMedcheck', $content);
        $this->load->view('templates/footer');
	}
	public function form_tambah(){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Insert Medical Check Up';
        $this->load->view('templates/headerAdmin', $content);
        $this->load->view('contents/Admin_tambahMedcheck', $content);
        $this->load->view('templates/footer');
	}
	public function tambah_medcheck(){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Insert Medical Check Up';
        $this->load->view('templates/headerAdmin', $content);
		$content = array(
			'nama_pasien' => $this->input->post('nama_pasien'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'layanan' => $this->input->post('layanan'),
			'cabang' => $this->input->post('cabang'),
			'alamat' => $this->input->post('alamat'),
			'nomor_hp' => $this->input->post('nomor_hp'),
			'tgl_periksa' => $this->input->post('tgl_periksa'),
			'tgl_ambil' => $this->input->post('tgl_ambil'),
        );
        $this->load->view('templates/footer');
		$cek = $this->ModelMedcheck->insert_medcheck($content);
		if($cek) $this->session->set_flashdata('flash','Medical Berhasil ditambah');
		else $this->session->set_flashdata('flash', 'Medical Gagal ditambah');
		redirect('Admin_medcheck');
	}
	public function form_ubah($id){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
		$content['title'] = 'Edit Medical Check Up';
        $content['medcheck'] = $this->ModelMedcheck->get_medcheck($id);
        $this->load->view('templates/headerAdmin', $content);
        $this->load->view('contents/Admin_ubahMedcheck', $content);
        $this->load->view('templates/footer');
	}
	public function ubah_medcheck($id){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Edit Medical Check Up';
        $this->load->view('templates/headerAdmin', $content);
		$content = array(
			'nama_pasien' => $this->input->post('nama_pasien'),
			'tgl_lahir' => $this->input->post('tgl_lahir'),
			'layanan' => $this->input->post('layanan'),
			'cabang' => $this->input->post('cabang'),
			'alamat' => $this->input->post('alamat'),
			'nomor_hp' => $this->input->post('nomor_hp'),
			'tgl_periksa' => $this->input->post('tgl_periksa'),
			'tgl_ambil' => $this->input->post('tgl_ambil'),
        );
        $this->load->view('templates/footer');
		$cek = $this->ModelMedcheck->update_medcheck($id, $content);
		if($cek) $this->session->set_flashdata('flash','Medical Berhasil diubah');
		else $this->session->set_flashdata('flash', 'Medical Gagal diubah');
		redirect('Admin_medcheck');
	}
	public function hapus_medcheck($id){
		$content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/headerAdmin');
        $this->load->view('templates/footer');
		$cek = $this->ModelMedcheck->delete_medcheck($id);
		if($cek) $this->session->set_flashdata('flash','Medical Berhasil dihapus');
		else $this->session->set_flashdata('flash', 'Medical Gagal dihapus');
		redirect('Admin_medcheck');
	}
}
?>