<?php

class ModelAuth extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLastData()
    {
        $query = $this->db->query('SELECT * FROM akun ORDER BY id DESC LIMIT 1');
        $result = $query->row_array();
        return $result;
    }

    public function tambahMemberBaru()
    {
        $data = [
            'id_pasien' => htmlspecialchars($this->input->post('id_pasien', true)),
            'fullname' => htmlspecialchars($this->input->post('fullname', true)),
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'image' => 'default.jpg',
            'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
            'role_id' => 2, //(1 = admin, 2 = member)
            'is_active' => 1,
            'date_created' => time()
        ];
        $this->db->insert('akun', $data);
    }

    public function updateAkun($id)
    {
        $data = array(
            'fullname' =>  htmlspecialchars($this->input->post('fullname', true)),
            'username' =>  htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true))
        );
        $this->db->where('id', $id);
        $this->db->update('akun', $data);
    }

    public function ubahPassword($id)
    {
        $new_password =  password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
        $this->db->set('password', $new_password);
        $this->db->where('id', $id);
        $this->db->update('akun');
    }
}
