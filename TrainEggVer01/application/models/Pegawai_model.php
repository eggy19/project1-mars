<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_Model extends CI_Model
{
    private $table = 'biodata';

    public function getAll()
    {
        return $this->db->get('biodata');
    }

    public function addPegawai($data) // Tambah Data ke Database
    {
        $this->db->insert('biodata', $data);
    }

    public function uploadIMG() //Upload Foto
    {
        // Menentukan file yang akan di upload
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'jpg|jpeg';
        $config['max_size']     = '3000';
        $config['max_width']    = '3000';
        $config['max_height']   = '3000';

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('foto')) {
            $data = array(
                'result' => 'success',
                'file' => $this->upload->data(),
                'error'    => ''
            );
            return $data;
        } else {
            $error = array(
                'result' => 'failed',
                'file' => '',
                'error' => $this->upload->display_errors()
            );
            return $error;
        }
    }

    public function hapusData($data)
    {
        $this->db->where('id', $data['id']);
        $this->db->delete('biodata', $data);
    }

    public function jumlahPegawai()
    {
        $query = $this->db->get('biodata');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }
}
