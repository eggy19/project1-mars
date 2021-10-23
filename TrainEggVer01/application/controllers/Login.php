<?php

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('login/index');
    }

    public function proses()
    {
        $user = $this->input->post('username');
        $pass = $this->input->post('password');

        $this->simple_login->login($user, $pass);
    }

    public function logout()
    {
        $this->simple_login->log_out();
    }
}
