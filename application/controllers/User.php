<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Welcome, MedOnLab";
        $this->load->view('templates/header', $data);
        $this->load->view('contents/home');
        $this->load->view('templates/footer');
    }
    public function daftar()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Pendaftaran MedCek";

        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang Lab', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|max_length[12]');
        // $this->form_validation->set_rules('img_bukti', 'Bukti Transfer', 'required');

        if ($data['user']) {
            if ($this->form_validation->run() == FALSE) {
                $this->load->view('templates/header', $data);
                $this->load->view('contents/daftar', $data);
                $this->load->view('templates/footer');
            } else {
                $this->ModelUser->daftarMedCek();
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pendaftaran Anda Sudah Diterima, Harap Cek Informasi Pada Menu Cek Status <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> </div>');
                redirect('user');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Harap Login Sebelum Mendaftar Medical Check Up</div>');
            redirect('auth');
        }
    }

    public function infosehat()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = "Info Kesehatan";
        $this->load->view('templates/header', $data);
        $this->load->view('contents/infosehat');
        $this->load->view('templates/footer');
    }

    public function cek_status($id)
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->get_where('medcek', ['id' => $id])->row_array();
        $data['title'] = "Cek Status Medical Check Up";
        $this->load->view('templates/header', $data);
        $this->load->view('contents/view_hasil', $data);
        $this->load->view('templates/footer');
    }

    public function edit_medcheck($id)
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->get_where('medcek', ['id' => $id])->row_array();
        $data['title'] = "Cek Status Medical Check Up";
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang Lab', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|max_length[12]');

        if ($data['user']) {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('contents/editMedcheck', $data);
                $this->load->view('templates/footer');
            } else {
                $this->ModelUser->editMedcek($id);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pendaftaran Anda Sudah Diterima, Harap Cek Informasi Pada Menu Cek Status <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button> </div>');
                redirect('user');
            }
        } else {
            redirect('auth');
        }
    }



    public function history_cek()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $id_pasien = $data['user']['id_pasien'];
        $data['medcek'] = $this->ModelUser->getPasienByIdPasien($id_pasien);
        $data['title'] = "History Medical Check Up";
        if ($data['user']) {
            $this->load->view('templates/header', $data);
            $this->load->view('contents/history_cek', $data);
            $this->load->view('templates/footer');
        } else {
            redirect('auth');
        }
    }

    public function lihat_profile()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'My Profile';

        $this->load->view('templates/header', $data);
        $this->load->view('contents/lihatProfile', $data);
        $this->load->view('templates/footer');
    }
}
