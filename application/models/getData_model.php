<?php
defined('BASEPATH') or exit('No direct script access allowed');

class getData_model extends CI_Model
{

    public function getFoodData()
    {
        // Tambahkan logika untuk mengambil data dari database
        $this->db->order_by('nama', 'ASC'); // Menambahkan perintah ORDER BY untuk mengurutkan berdasarkan nama secara ascending (A-Z)
        $query = $this->db->get('makanan'); // Gantilah dengan nama tabel yang sesuai
        return $query->result_array();
    }

    public function getDrinkData()
    {
        // Tambahkan logika untuk mengambil data dari database
        $this->db->order_by('nama', 'ASC'); // Menambahkan perintah ORDER BY untuk mengurutkan berdasarkan nama secara ascending (A-Z)
        $query = $this->db->get('minuman'); // Gantilah dengan nama tabel yang sesuai
        return $query->result_array();
    }
    public function getCemilanData() {
        $this->db->order_by('nama', 'ASC'); 
        $query = $this->db->get('cemilan');
        return $query->result_array();
    }
    public function insertData($totalBCA,$totalGojek,$totalCash,$totalQR)
    {
        // Simpan data ke dalam database
        $data = array(
            'BCA' => $totalBCA,
            'Gojek' => $totalGojek,
            'QR' => $totalQR,
            'Cash' => $totalCash
        );

        $this->db->insert('data_report', $data);
    }
}
