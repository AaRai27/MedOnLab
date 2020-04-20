<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAuth');
        $this->load->model('ModelUser');
    }


    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['title'] = "Login Page";
            $this->load->view('templates/header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('akun', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('admin');
                    } else {
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Wrong Password</div>');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email has not been activated</div>');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">Email is not registered </div>');
            redirect('auth');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Nama', 'required|trim|is_unique[akun.username]', [
            'is_unique' => 'Username Sudah Terpakai'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[akun.email]', [
            'is_unique' => 'Email Sudah Pernah Didaftarkan'
        ]);
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password not same',
            'min_length' => 'Password is too short'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        $last_id = $this->ModelAuth->getLastData();
        $data['last_id'] = $last_id['id'] + 1;
        if ($this->form_validation->run() == false) {
            $data['title'] = "Registration Page";
            $this->load->view('templates/header', $data);
            $this->load->view('auth/registration', $data);
            $this->load->view('templates/footer');
        } else {
            $this->ModelAuth->tambahMemberBaru();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">Selamat, Akun Anda Telah Terdaftar, Silahkan Login</div>');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">You have been logged out</div>');
        redirect('auth');
    }

    public function ubahAkun()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Ubah Akun';
        $this->form_validation->set_rules('fullname', 'Full Name', 'trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'trim');

        if ($data['user']) {
            if ($this->form_validation->run() == false) {
                $this->load->view('templates/header', $data);
                $this->load->view('auth/ubahAkun', $data);
                $this->load->view('templates/footer', $data);
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Akun Gagal Dirubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div>');
            } else {

                $cek = $this->ModelAuth->updateAkun($data['user']['id']);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Akun Berhasil Dirubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button> </div>');
                redirect('user');
            }
        } else {
            redirect('auth');
        }
    }


    public function ubahPassword()
    {
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $this->form_validation->set_rules('password', 'Password Lama', 'callback_password_check');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password not same',
            'min_length' => 'Password is too short'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');

        if ($data['user']) {
            if ($this->form_validation->run() == false) {
                $data['title'] = "Ubah Password";
                $this->load->view('templates/header', $data);
                $this->load->view('auth/ubahPassword', $data);
                $this->load->view('templates/footer');
            } else {
                $this->ModelAuth->ubahPassword($data['user']['id']);
                $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button></div>');
                redirect('user');
            }
        } else {
            redirect('auth');
        }
    }

    public function password_check($newPassword)
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $oldPassword = $data['user']['password'];


        if (!password_verify($newPassword, $oldPassword)) {
            $this->form_validation->set_message('password_check', "Password Lama Salah/Tidak Sama");
            return false;
        } else {
            return true;
        }
    }

    public function blocked()
    {
        $this->load->view('auth/blocked');
    }
}
