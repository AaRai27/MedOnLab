<?php

class ModelUser extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getBanyakData()
    {
        return $this->db->count_all('akun');
    }

    public function getLastData()
    {
        $query = $this->db->query('SELECT * FROM akun ORDER BY id DESC LIMIT 1');
        $result = $query->row_array();
        return $result;
    }

    public function getUserById($id)
    {
        $this->db->get_where('akun', ['id' => $id])->row_array();
    }

    public function daftarMedCek()
    {
        $tgl_periksa = date("d F Y", strtotime("+2 day"));
        $tgl_ambil = date("d F Y", strtotime("+5 day"));
        $data = [
            'id_pasien' => htmlspecialchars($this->input->post('id_pasien', true)),
            'nama_pasien' => htmlspecialchars($this->input->post('nama_pasien', true)),
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'layanan' => htmlspecialchars($this->input->post('layanan', true)),
            'cabang' => htmlspecialchars($this->input->post('cabang', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp', true)),
            'img_bukti' => htmlspecialchars($this->input->post('img_bukti', true)),
            'tgl_periksa' => $tgl_periksa,
            'tgl_ambil' => $tgl_ambil
        ];
        $this->db->insert('medcek', $data);
    }
}
