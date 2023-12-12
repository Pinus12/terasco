<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Dashboard';
        $this->load->view('/Kerangka/header',$data);
        $this->load->view('Beranda_view.php');
        $this->load->view('/Kerangka/footer',$data);
    }
    public function history_report() {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'History Report';
        $this->load->view('/Kerangka/header',$data);
        $this->load->view('history_report_view.php');
        $this->load->view('/Kerangka/footer',$data);
    }


}