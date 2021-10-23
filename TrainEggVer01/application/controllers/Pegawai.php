<?php

class Pegawai extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url')); // untuk upload gambar
        $this->load->model('Pegawai_model');

        $this->simple_login->cek_login();
    }

    public function index()
    {
        $data['judul'] = 'Data Pegawai';
        $data['pegawai'] = $this->Pegawai_model->getAll()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('pegawai/index');
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $upload = $this->Pegawai_model->uploadIMG();

        $this->load->helper('string');


        if ($upload['result'] == "success") {
            $data = array(
                'id'        => $this->input->post('id'),
                'nama'      => $this->input->post('nama'),
                'tgl_lahir' => $this->input->post('tgl_lahir'),
                'gender'    => $this->input->post('gender'),
                'agama'     => $this->input->post('agama'),
                'jabatan'   => $this->input->post('jabatan'),
                'foto'      => $upload['file']['file_name'],
                'username'  => $this->input->post('username'),
                'password'  => $this->input->post('password')
            );

            $this->Pegawai_model->addPegawai($data);
            $this->session->set_flashdata('sukses', 'Data Telah Tertambah');
            redirect(base_url('pegawai'), 'refresh');
        } else {
            $this->session->set_flashdata('error', $upload['error']);
            redirect(base_url('pegawai'), 'refresh');
        }
    }

    public function hapus($id)
    {
        // Hapus Gambar
        $gambar = $this->db->get_where('biodata', ['id' => $id])->row(); // query mengambil all data
        $query = $this->db->delete('biodata', ['id' => $id]);
        // var_dump($gambar->foto);

        // // Hapus Data
        if ($query) {
            unlink("./uploads/" . $gambar->foto);
        }

        $this->load->library('session');

        $this->session->set_flashdata('sukses', 'Data Telah Terhapus');
        redirect(base_url('pegawai'), 'refresh');
    }
}
