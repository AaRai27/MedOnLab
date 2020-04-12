<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Upload extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
    }

    public function index()
    {
        $data['title'] = 'Form Upload Bukti Transfer';
        $this->load->view('templates/header', $data);
        $this->load->view('contents/bukti_transfer', array('error' => ' '));
        $this->load->view('templates/footer');
    }

    public function do_upload()
    {
        $config['upload_path']          =  './uploads/'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '100';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '780'; //isi dengan panjang maksimum gambar yang bisa di upload

        $this->load->library('upload', $config);

        //lengkapi kondisi berikut
        if (!$this->upload->do_upload('img_bukti')) {
            $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
            $data['error'] = $this->upload->display_errors();
            $data['title'] = 'Form Upload Bukti Transfer';
            $this->load->view('templates/header', $data);
            $this->load->view('contents/bukti_transfer', $data);
            $this->load->view('templates/footer');
        } else {
            $data['upload_data'] = $this->upload->data();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Bukti Berhasil di Upload, Harap Tunggu 1 X 24 Jam</div>');
            redirect('user');
        }
    }
}
