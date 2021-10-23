<?php

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->simple_login->cek_login();
        $this->load->model('Pegawai_model');
    }
    public function index()
    {
        $data['jmlPgw'] = $this->Pegawai_model->jumlahPegawai();
        $data['judul'] = 'Home Train Dev';
        $this->load->view('templates/header', $data);
        $this->load->view('home/index');
        $this->load->view('templates/footer');
    }
}
