<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{

    public function index()
    {
        $this->load->view('/Kerangka/header');
        $this->load->view('/Beranda');
        $this->load->view('/Kerangka/footer');
    }
    public function info_emiten()
    {
        $this->load->view('Kerangka/header');
        $this->load->view('info_emiten');
    
        // Atur URL API yang akan Anda panggil
        $api_url = 'https://api.goapi.io/stock/idx/companies';
    
        // Atur kunci API Anda
        $api_key = '9fca6193-98ed-598f-5d45-f2f7ec24';
    
        // Buat konteks permintaan HTTP dengan header yang diatur
        $context = stream_context_create(array(
            'http' => array(
                'header' => 'x-api-key: ' . $api_key
            )
        ));
    
        // Mengambil data dari API dengan konteks yang telah dibuat
        $file = file_get_contents($api_url, false, $context);
        $data = json_decode($file);
    
        // var_dump($data);
        if ($data && isset($data->data->results)) {
            $results = array_slice($data->data->results, 0, 10);
    
            $this->load->view('info_emiten', ['results' => $results]);
        } else {
            echo "Tidak ada data ditemukan.";
        }
        $this->load->view('Kerangka/footer');
    }
    public function harga_saham()
    {
        $symbol = strtoupper($this->input->post('symbol'));


        // Pastikan simbol tidak kosong
        if (!empty($symbol)) {
            // Atur URL API dengan simbol yang diambil dari input
            $api_url = 'https://api.goapi.io/stock/idx/prices?symbols=' . $symbol;

            // Atur kunci API Anda
            $api_key = '9fca6193-98ed-598f-5d45-f2f7ec24';

            // Buat konteks permintaan HTTP dengan header yang diatur
            $context = stream_context_create(array(
                'http' => array(
                    'header' => 'x-api-key: ' . $api_key
                )
            ));

            // Mengambil data dari API dengan konteks yang telah dibuat
            $file = file_get_contents($api_url, false, $context);
            $data = json_decode($file);

            $count = 0;
            if ($count < 20) {
                var_dump($data);
                $count++;
            }
        } else {
            echo "Simbol saham tidak valid atau tidak ada input.";
        }
    }
    public function broker_sum()
    {
        $date = ($this->input->post('date'));
        $symbolbroker = ($this->input->post('symbolbroker'));
        $api_url = 'https://api.goapi.io/stock/idx/' . $symbolbroker . '/broker_summary?date=' . $date;
        // Atur kunci API Anda
        $api_key = '9fca6193-98ed-598f-5d45-f2f7ec24';

        // Buat konteks permintaan HTTP dengan header yang diatur
        $context = stream_context_create(array(
            'http' => array(
                'header' => 'x-api-key: ' . $api_key
            )
        ));

        // Mengambil data dari API dengan konteks yang telah dibuat
        $file = file_get_contents($api_url, false, $context);
        $data = json_decode($file);
        // var_dump($data);
        if ($data && isset($data->data->results)) {
            $results = $data->data->results;
            $this->load->view('Data_broker', ['results' => array_slice($results, 0, 10)]);

            // Khusus Foreing Ni
            foreach ($results as $data_broker) {
                if ($data_broker->investor == 'FOREIGN') {
                    $foreign_data[] = $data_broker;
                }
            }
    
            if (isset($foreign_data)) {
                $this->load->view('Data_broker', ['results' => $foreign_data]);
            }
        } else {
            $this->load->view('Data_broker', ['results' => []]);
        }
        }
        public function template() {
            $this->load->view('/Kerangka/header');
            $this->load->view('/Beranda');
            $this->load->view('/Kerangka/footer');
        }
    }