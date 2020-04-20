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

    public function do_upload($id) //untuk user
    {
        $config['upload_path']          =  './assets/img/buktiBayar'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '780'; //isi dengan panjang maksimum gambar yang bisa di upload

        $this->load->library('upload', $config);

        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->get_where('medcek', ['id' => $id])->row_array();

        if (!$this->upload->do_upload('img_bukti')) {
            $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $data['title'] = 'Form Upload Bukti Transfer';
            $this->load->view('templates/header', $data);
            $this->load->view('contents/bukti_transfer', $data);
            $this->load->view('templates/footer');
        } else {
            $new_image = $this->upload->data('file_name');
            $this->db->set('img_bukti', $new_image);
            $this->db->where('id', $id);
            $this->db->update('medcek');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Bukti Berhasil di Upload, Harap Tunggu 1 X 24 Jam<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> </div>');
            redirect('user');
        }
    }


    public function ubah_photo_profile() //untuk user
    {
        $config['upload_path']          =  './assets/img/profile'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|png'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '780'; //isi dengan panjang maksimum gambar yang bisa di upload

        $this->load->library('upload', $config);

        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        // $data['pasien'] = $this->db->get_where('medcek', ['id' => $id])->row_array();

        if (!$this->upload->do_upload('img_bukti')) {
            $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $data['title'] = 'Form Upload Bukti Transfer';
            $this->load->view('templates/header', $data);
            $this->load->view('auth/ubahPhotoProfile', $data);
            $this->load->view('templates/footer');
        } else {
            $new_image = $this->upload->data('file_name');
            $this->db->set('image', $new_image);
            $this->db->where('id', $data['user']['id']);
            $this->db->update('akun');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Foto Profile Berhasil Di Update<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> </div>');
            redirect('user');
        }
    }


    public function upload_hasil_lab($id) //untuk Admin
    {
        $config['upload_path']          =  './assets/img/hasilLab'; //isi dengan nama folder temoat menyimpan gambar
        $config['allowed_types']        =  'jpg|pdf'; //isi dengan format/tipe gambar yang diterima
        $config['max_size']             = '2048';  //isi dengan ukuran maksimum yang bisa di upload
        $config['max_width']            =  '1024'; //isi dengan lebar maksimum gambar yang bisa di upload
        $config['max_height']           = '780'; //isi dengan panjang maksimum gambar yang bisa di upload

        $this->load->library('upload', $config);

        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->db->get_where('medcek', ['id' => $id])->row_array();

        if (!$this->upload->do_upload('hasil_lab')) {
            $data['error'] = $this->upload->display_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert"><a>', '</a><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            $data['title'] = 'Form Upload Hasil Lab';
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('admin/uploadHasilLab', $data);
            $this->load->view('templates/footer');
        } else {
            $img_hasil = $this->upload->data('file_name');
            $this->db->set('hasil_lab', $img_hasil);
            $this->db->where('id', $id);
            $this->db->update('medcek');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Hasil Berhasil Di Upload<button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button> </div>');
            redirect('admin');
        }
    }
}
