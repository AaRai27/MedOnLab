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
        return $this->db->get_where('akun', ['id' => $id])->row_array();
    }

    public function getPasienByIdPasien($id_pasien)
    {
        return $this->db->get_where('medcek', ['id_pasien' => $id_pasien])->result_array();
    }

    public function getPasienById($id)
    {
        return $this->db->get_where('medcek', ['id' => $id])->row_array();
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
            'img_bukti' => NULL,
            'tgl_periksa' => $tgl_periksa,
            'tgl_ambil' => $tgl_ambil,
            'status' => 0 //(0 = belum bayar, 1 = sedang di proses, 2 = selesai )
        ];
        return $this->db->insert('medcek', $data);
    }

    public function editMedcek($id)
    {
        $data = array(
            'tgl_lahir' => htmlspecialchars($this->input->post('tgl_lahir', true)),
            'layanan' => htmlspecialchars($this->input->post('layanan', true)),
            'cabang' => htmlspecialchars($this->input->post('cabang', true)),
            'alamat' => htmlspecialchars($this->input->post('alamat', true)),
            'nomor_hp' => htmlspecialchars($this->input->post('nomor_hp', true))
        );
        $this->db->where('id', $id);
        return $this->db->update('medcek', $data);
    }
}
