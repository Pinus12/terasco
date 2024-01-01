<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
        $this->load->model('getData_model');
        $this->load->model('report_model');
        $this->load->model('Owner_model');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Dashboard';
        $data['kas_data'] = $this->Owner_model->chart();
        
        $data['Total_uang']=$this->Owner_model->Total_Uang();
        $data['Total_uang_harian']=$this->Owner_model->total_uang_harian();
        $data['Total_uang_mingguan']=$this->Owner_model->total_uang_mingguan();
        $data['Total_uang_bulanan']=$this->Owner_model->total_uang_bulanan();
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Beranda_view.php',$data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function history_report()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['history_entries'] = $this->report_model->get_history_entries();
        $data['judul'] = 'History Report';
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/history_report_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function info_barista()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_barista'] = $this->Owner_model->data_barista();
        $data['judul'] = 'Info Barista';
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/infobarista_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function tambah_barista()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Barista';

        // Tampilkan halaman tambah_barista_view.php
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/tambah_barista_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function hapus_barista($id)
    {
        $this->Owner_model->hapus_barista($id);
        redirect('Beranda/info_barista');
    }
    public function update_barista($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Barista';
        $data['barista'] = $this->Owner_model->get_barista_by_id($id);
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/edit_barista_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function edit_barista($id)
    {
        $data = array(
            'username' => $this->input->post('username'),
            'email' => $this->input->post('email'),
            'role' => $this->input->post('role'),
        );
        $this->Owner_model->edit_barista($id, $data);
        redirect('Beranda/info_barista');
    }

    public function insert_barista()
    {
        // Proses formulir jika formulir disubmit
        if ($this->input->post()) {
            // Tangkap data dari formulir
            $data_barista = array(
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'role' => $this->input->post('role')
            );

            // Panggil model untuk menyimpan data ke database
            $this->Owner_model->insert_barista($data_barista);

            // Redirect ke halaman info_barista setelah berhasil
            redirect('beranda/info_barista');
        } else {
            echo 'Error';
            // Jika formulir belum disubmit, tidak perlu melakukan apa-apa
            // Anda dapat menampilkan pesan atau logika lain di sini jika diperlukan
        }
    }
    public function info_menu() {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['data_menu'] = $this->Owner_model->data_menu();
        $data['data_minuman'] = $this->Owner_model->data_minuman();
        $data['data_cemilan'] = $this->Owner_model->data_cemilan();
        $data['judul'] = 'Info Menu';
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/infomenu_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function tambah_menu()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Menu';

        // Tampilkan halaman tambah_barista_view.php
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/tambah_menu_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function tambah_menu_minuman()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Menu';

        // Tampilkan halaman tambah_barista_view.php
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/tambah_menu_minuman_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function tambah_menu_cemilan()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Menu';

        // Tampilkan halaman tambah_barista_view.php
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/tambah_menu_cemilan_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }

    public function hapus_menu($id)
    {
        $this->Owner_model->hapus_menu($id);
        redirect('Beranda/info_menu');
    }
    public function hapus_menu_minuman($id)
    {
        $this->Owner_model->hapus_menu_minuman($id);
        redirect('Beranda/info_menu');
    }
    public function hapus_menu_cemilan($id)
    {
        $this->Owner_model->hapus_menu_cemilan($id);
        redirect('Beranda/info_menu');
    }
    public function update_menu($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Menu Makanan';
        $data['menu'] = $this->Owner_model->get_menu_by_id($id);
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/edit_menu_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function update_menu_minuman($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Menu Minuman';
        $data['menu'] = $this->Owner_model->get_menu_minuman_by_id($id);
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/edit_menu_minuman_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function update_menu_cemilan($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Menu Cemilan';
        $data['menu'] = $this->Owner_model->get_menu_cemilan_by_id($id);
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/edit_menu_cemilan_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function edit_menu($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
        );
        $this->Owner_model->edit_menu($id, $data);
        redirect('Beranda/info_menu');
    }
    public function edit_menu_minuman($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
        );
        $this->Owner_model->edit_menu_minuman($id, $data);
        redirect('Beranda/info_menu');
    }
    public function edit_menu_cemilan($id)
    {
        $data = array(
            'nama' => $this->input->post('nama'),
            'harga' => $this->input->post('harga'),
        );
        $this->Owner_model->edit_menu_cemilan($id, $data);
        redirect('Beranda/info_menu');
    }

    public function insert_menu()
    {
        // Proses formulir jika formulir disubmit
        if ($this->input->post()) {
            // Tangkap data dari formulir
            $data_menu = array(
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
            );

            // Panggil model untuk menyimpan data ke database
            $this->Owner_model->insert_menu($data_menu);

            // Redirect ke halaman info_barista setelah berhasil
            redirect('beranda/info_menu');
        } else {
            echo 'Error';
            // Jika formulir belum disubmit, tidak perlu melakukan apa-apa
            // Anda dapat menampilkan pesan atau logika lain di sini jika diperlukan
        }
    }
    public function insert_menu_minuman()
    {
        // Proses formulir jika formulir disubmit
        if ($this->input->post()) {
            // Tangkap data dari formulir
            $data_menu = array(
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
            );

            // Panggil model untuk menyimpan data ke database
            $this->Owner_model->insert_menu_minuman($data_menu);

            // Redirect ke halaman info_barista setelah berhasil
            redirect('beranda/info_menu');
        } else {
            echo 'Error';
            // Jika formulir belum disubmit, tidak perlu melakukan apa-apa
            // Anda dapat menampilkan pesan atau logika lain di sini jika diperlukan
        }
    }
    public function insert_menu_cemilan()
    {
        // Proses formulir jika formulir disubmit
        if ($this->input->post()) {
            // Tangkap data dari formulir
            $data_menu = array(
                'nama' => $this->input->post('nama'),
                'harga' => $this->input->post('harga'),
            );

            // Panggil model untuk menyimpan data ke database
            $this->Owner_model->insert_menu_cemilan($data_menu);

            // Redirect ke halaman info_barista setelah berhasil
            redirect('beranda/info_menu');
        } else {
            echo 'Error';
            // Jika formulir belum disubmit, tidak perlu melakukan apa-apa
            // Anda dapat menampilkan pesan atau logika lain di sini jika diperlukan
        }
    }


    public function tambah_report()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Tambah Report';
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Barista/tambah_report_view.php');
        $this->load->view('/Kerangka/footer', $data);
    }
    public function edit_report()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Edit Report';
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Barista/edit_report_view.php');
        $this->load->view('/Kerangka/footer', $data);
    }
    public function form_report()
    {

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Form Report';
        $data['report_data'] = $this->report_model->ambil_data();
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Barista/form_report_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
    public function simpan_form_report()
    {
        $this->load->model('report_model');
        $shift = $this->input->post('shift');
        $uang_kas = $this->input->post('uang_kas');
        $cup_awal = $this->input->post('cup_awal');
        $cup_terpakai = $this->input->post('cup_terpakai');
        $cup_sisa = $this->input->post('cup_sisa');
        $this->report_model->simpan_data($shift, $uang_kas, $cup_awal, $cup_terpakai, $cup_sisa);
        redirect('Beranda/tambah_report');
    }
    public function read_report($id)
    {

        $this->load->model('report_model');

        $data['report'] = $this->report_model->read_data($id);

        $this->load->view('view_report', $data);
    }
    public function getFoodData()
    {
        // Tambahkan logika untuk mengambil data dari model atau database
        $data['food'] = $this->getData_model->getFoodData();

        // Mengirim data dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function getDrinkData()
    {
        $data['drink'] = $this->getData_model->getDrinkData();

        // Mengirim data dalam format JSON
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function getCemilanData()
    {
        $data['cemilan'] = $this->getData_model->getCemilanData();
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function saveDataReport()
    {
        // Ambil data dari request POST
        $requestData = json_decode(file_get_contents('php://input'), true);
        $totalBCA = isset($requestData['BCA']) ? floatval($requestData['BCA']) : 0; // memastikan bahwa nilai BCA yang dikirimkan dan diterima diolah dengan benar sesuai dengan tipe datanya
        $totalGojek = isset($requestData['Gojek']) ? floatval($requestData['Gojek']) : 0;
        $totalCash = isset($requestData['Cash']) ? floatval($requestData['Cash']) : 0;
        $totalQR = isset($requestData['QR']) ? floatval($requestData['QR']) : 0;

        if (!is_numeric($totalBCA)) {
            $response = array('status' => 'error', 'message' => 'Invalid BCA value');
            echo json_encode($response);
            exit;
        }

        // Simpan data ke dalam model
        $this->load->model('getData_model');
        $this->getData_model->insertData($totalBCA, $totalGojek, $totalCash, $totalQR);

        $this->output->set_content_type('application/json');

        $response = array('status' => 'success');

        echo json_encode($response);
        exit;
    }
    public function lihat_report($id_report)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        // Get data for the specified id_report
        $data['report_data'] = $this->report_model->read_data($id_report);

        $data['judul'] = 'Lihat Report';
        $this->load->view('/Kerangka/header', $data);
        $this->load->view('Owner/lihat_report_view.php', $data);
        $this->load->view('/Kerangka/footer', $data);
    }
}

