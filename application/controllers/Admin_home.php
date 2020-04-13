<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_home extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAdmin');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Welcome, MedOnLab";
        $this->load->view('templates/headerAdmin', $data);
        $this->load->view('contents/home');
        $this->load->view('templates/footer');
    }
}
?>