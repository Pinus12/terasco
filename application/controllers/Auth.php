<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('/Auth/Login.php');
    }
    public function register()
    {
        $this->load->view('/Auth/Register.php');
    }
    public function proses_register()
    {
        $data = [
            'username' => htmlspecialchars($this->input->post('username', true)),
            'email' => htmlspecialchars($this->input->post('email', true)),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        ];
        $this->Auth_model->insert($data);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="aler">
        Selamat Akunmu telah berhasil terdaftar,Silahkan Login!</div>');
        redirect('Auth');
    }
    public function cek_login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();
        
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role' => $user['role'],
                    'id' => $user['id'],
                ];
                $this->session->set_userdata($data);
                
                if ($user['role'] == 'Owner') {
                    redirect('Beranda');
                } elseif ($user['role'] == 'Barista') {
                    redirect('Beranda/tambah_report');
                } 
                else {
                    redirect('Auth');
                }
            } else {
                echo 'Password Salah';
            }
            
        } else {
            echo 'Email Salah';
        }
    }
    public function logout() {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('username');
        $this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Berhasil Logout!</div>');
        redirect('Auth/');
    }
};
