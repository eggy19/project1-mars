<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Simple_login
{
    var $CI = NULL;

    public function __construct()
    {
        $this->CI = &get_instance();
    }

    //Login
    public function login($user, $pass)
    {
        $query = $this->CI->db->get_where('biodata', array('username' => $user, 'password' => $pass));

        if ($query->num_rows() == 1) {
            $row = $this->CI->db->query('SELECT id FROM biodata where username = "' . $user . '"');
            $admin = $row->row();
            $id = $admin->nik;
            $nama = $admin->nama;

            //set session user
            $this->CI->session->set_userdata('username', $user);
            $this->CI->session->set_userdata('nama', $nama);
            $this->CI->session->set_userdata('id_login', uniqid(rand()));
            $this->CI->session->set_userdata('id', $id);

            //redirect ke halaman dashboard
            redirect(base_url('home'));
        } else {
            $this->CI->session->set_flashdata('warning', 'Username atau Password Salah');

            redirect(base_url('login'));
        }
        return false;
    }

    // cek kondisi udah login belum
    public function cek_login()
    {
        //cek session username
        if ($this->CI->session->userdata('username') == "") {
            $this->CI->session->flashdata('warning', 'Anda Belum Login');
            redirect(base_url('login'));
        }
    }

    //fungsi keluar login
    public function log_out()
    {
        //membuang semua session
        $this->CI->session->unset_userdata('username');
        $this->CI->session->unset_userdata('nama');
        $this->CI->session->unset_userdata('id_login');
        $this->CI->session->unset_userdata('id');

        $this->CI->session->set_flashdata('sukses', 'Anda telah logout');
        redirect(base_url('login'), 'refresh');
    }
}
