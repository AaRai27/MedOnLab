<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelAdmin');
        $this->load->model('ModelAccount');
        $this->load->model('ModelMedcheck');
        $this->load->model('ModelAuth');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $data['user']['role_id'];
        if ($role_id == 1) {
            $data['title'] = "Welcome, MedOnLab";
            $this->load->view('templates/headerAdmin', $data);
            $this->load->view('contents/home');
            $this->load->view('templates/footer');
        } else {
            redirect('auth/blocked');
        }
    }

    // BAGIAN AKUN
    public function view_all_akun()
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Data Akun';
        $content['page'] = 'akun';
        $content['data_akun'] = $this->ModelAccount->get_all();

        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $this->load->view('templates/headerAdmin', $content);
                $this->load->view('admin/lihatAkun', $content);
                $this->load->view('templates/footer');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }

    public function tambah_akun()
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Tambah akun';
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

        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $last_id = $this->ModelAuth->getLastData();
                $content['last_id'] = $last_id['id'] + 1;
                if ($this->form_validation->run() == false) {
                    $this->load->view('templates/headerAdmin', $content);
                    $this->load->view('admin/tambahAkun', $content);
                    $this->load->view('templates/footer');
                } else {
                    $this->ModelAuth->tambahMemberBaru();
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Akun Berhasil Didaftarkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/view_all_akun');
                }
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }

    public function form_ubah_akun($id)
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Ubah Akun';
        $content['akun'] = $this->ModelAccount->get_akun($id);
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');

        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $this->load->view('templates/headerAdmin', $content);
                $this->load->view('admin/ubahAkun', $content);
                $this->load->view('templates/footer');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
    public function ubah_akun($id)
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['akun'] = $this->ModelAccount->get_akun($id);
        $content['title'] = 'Ubah Akun';
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');


        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                if ($this->form_validation->run() == false) {
                    $data['title'] = "Ubah Akun";
                    $this->load->view('templates/headerAdmin', $content);
                    $this->load->view('admin/ubahAkun', $content);
                    $this->load->view('templates/footer');
                } else {
                    $this->ModelAccount->update_akun($id);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Akun Berhasil Dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/view_all_akun');
                }
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }

    public function ubah_password($id)
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['akun'] = $this->ModelAccount->get_akun($id);
        $data['title'] = 'Ubah Password';
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[8]|matches[password2]', [
            'matches' => 'Password not same',
            'min_length' => 'Password is too short'
        ]);
        $this->form_validation->set_rules('password2', 'Konfirmasi Password', 'required|trim|matches[password1]');

        $role_id = $data['user']['role_id'];
        if ($data['user']) {
            if ($role_id == 1) {
                if ($this->form_validation->run() == false) {
                    $data['title'] = "Ubah Password";
                    $this->load->view('templates/headerAdmin', $data);
                    $this->load->view('admin/ubahPassword', $data);
                    $this->load->view('templates/footer');
                } else {
                    $this->ModelAuth->ubahPassword($id);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Password Berhasil Dirubah <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button></div>');
                    redirect('admin/view_all_akun');
                }
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }

    public function hapus_akun($id)
    {

        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $cek = $this->ModelAccount->delete_akun($id);
                redirect('admin/view_all_akun');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }




    // BAGIAN MEDCHECK

    public function view_all_medcheck()
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Data Medical Check Up';
        $content['page'] = 'medcheck';

        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $content['data_medcheck'] = $this->ModelMedcheck->get_all();
                $this->load->view('templates/headerAdmin', $content);
                $this->load->view('admin/lihatMedcheck', $content);
                $this->load->view('templates/footer');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
    public function form_tambah_medcheck()
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Insert Medical Check Up';
        $content['pasien'] = $this->ModelMedcheck->get_all();
        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $this->load->view('templates/headerAdmin', $content);
                $this->load->view('admin/tambahMedcheck', $content);
                $this->load->view('templates/footer');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
    public function tambah_medcheck()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['pasien'] = $this->ModelMedcheck->get_all_akun();
        $data['title'] = "Pendaftaran MedCek";
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang Lab', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|max_length[12]');
        // $this->form_validation->set_rules('img_bukti', 'Bukti Transfer', 'required');

        $role_id = $data['user']['role_id'];

        if ($data['user']) {
            if ($role_id == 1) {
                if ($data['user']) {
                    if ($this->form_validation->run() == FALSE) {
                        $this->load->view('templates/headerAdmin', $data);
                        $this->load->view('admin/tambahMedcheck', $data);
                        $this->load->view('templates/footer');
                    } else {
                        $this->ModelMedcheck->insert_medcheck();
                        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Pendaftaran Berhasil Dimasukkan <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button> </div>');
                        redirect('admin/view_all_medcheck');
                    }
                } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-primary" role="alert">Harap Login Sebelum Mendaftar Medical Check Up</div>');
                    redirect('auth');
                }
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
    public function form_ubah_medcheck($id)
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $content['title'] = 'Edit Medical Check Up';
        $content['medcheck'] = $this->ModelMedcheck->get_medcheck($id);

        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                $this->load->view('templates/headerAdmin', $content);
                $this->load->view('admin/ubahMedcheck', $content);
                $this->load->view('templates/footer');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
    public function ubah_medcheck($id)
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        // $content['medcheck'] = $this->ModelMedcheck->get_medcheck($id);
        $content['title'] = 'Edit Medical Check Up';

        $this->form_validation->set_rules('nama_pasien', 'Nama Pasien', 'required|trim');
        $this->form_validation->set_rules('tgl_lahir', 'Tanggal Lahir', 'required|trim');
        $this->form_validation->set_rules('layanan', 'Layanan', 'required');
        $this->form_validation->set_rules('cabang', 'Cabang Lab', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('nomor_hp', 'Nomor HP', 'required|max_length[12]');

        $role_id = $content['user']['role_id'];
        if ($content['user']) {
            if ($role_id == 1) {
                if ($this->form_validation->run() == false) {
                    $this->load->view('templates/headerAdmin', $content);
                    $this->load->view('admin/ubahMedcheck', $content);
                    $this->load->view('templates/footer');
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Gagal Dirubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> </div>');
                } else {
                    $cek = $this->ModelMedcheck->update_medcheck($id);
                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">Data Berhasil Dirubah<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button> </div>');
                    redirect('admin/view_all_medcheck');
                }
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
    public function hapus_medcheck($id)
    {
        $content['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $role_id = $content['user']['role_id'];

        if ($content['user']) {
            if ($role_id == 1) {
                $this->load->view('templates/headerAdmin');
                $this->load->view('templates/footer');
                $cek = $this->ModelMedcheck->delete_medcheck($id);
                redirect('admin/view_all_medcheck');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }

    public function lihat_profile_admin()
    {
        $data['user'] = $this->db->get_where('akun', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Profile Admin';

        if ($data['user']) {
            $role_id = $data['user']['role_id'];
            if ($role_id == 1) {
                $this->load->view('templates/headerAdmin', $data);
                $this->load->view('admin/lihatProfileAdmin', $data);
                $this->load->view('templates/footer');
            } else {
                redirect('auth/blocked');
            }
        } else {
            redirect('auth');
        }
    }
}
