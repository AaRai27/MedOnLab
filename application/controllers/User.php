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
        // $data['id_pasien'] = $this->ModelUser->getUserById($data['user']['id_pasien']);
        $data['title'] = "Pendaftaran MedCek";

        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang Lab', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required'); // Alamat Pasien
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|max_length[12]');
        $this->form_validation->set_rules('img_bukti', 'Bukti Transfer', 'required');

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
                redirect('upload/do_upload');
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


    public function upload_bukti()
    {
        $config['upload_path']          =  './upload/'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '100';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '780'; //isi dengan panjang maksimum gambar yang bisa di upload

        $this->load->library('upload', $config);

        //lengkapi kondisi berikut
        if (!$this->upload->do_upload('img_bukti')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('user/daftar', $error);
        } else {
            $data = array('upload_data' => $this->upload->data());
        }
    }
}
