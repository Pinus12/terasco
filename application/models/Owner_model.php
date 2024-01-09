<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Owner_model extends CI_Model
{
    public function get_barista_by_id($id)
    {
        return $this->db->get_where('user', array('id' => $id))->row();
    }
    public function get_menu_by_id($id)
    {
        return $this->db->get_where('makanan', array('id_makanan' => $id))->row();
    }
    public function get_menu_minuman_by_id($id)
    {
        return $this->db->get_where('minuman', array('id_minuman' => $id))->row();
    }
    public function get_menu_cemilan_by_id($id)
    {
        return $this->db->get_where('cemilan', array('id_cemilan' => $id))->row();
    }

    public function data_barista()
    {
        $this->db->where('id !=', 1);
        return $this->db->get('user');
    }

    public function insert_barista($data)
    {
        return $this->db->insert('user', $data);
    }

    public function hapus_barista($id)
    {
        if ($id != 1) {
            $this->db->where('id', $id);
            $this->db->delete('user');
            return true;
        } else {
            return false;
        }
    }

    public function edit_barista($id, $data)
    {
        $this->db->where('id', $id);
        $this->db->update('user', $data);
        return true;
    }
    public function data_menu()
    {
        return $this->db->get('makanan');
    }
    public function insert_menu($data)
    {
        return $this->db->insert('makanan', $data);
    }
    public function insert_menu_minuman($data)
    {
        return $this->db->insert('minuman', $data);
    }
    public function insert_menu_cemilan($data)
    {
        return $this->db->insert('cemilan', $data);
    }
    public function hapus_menu($id)
    {
        if ($id != 1) {
            $this->db->where('id_makanan', $id);
            $this->db->delete('makanan');
            return true;
        } else {
            return false;
        }
    }
    public function hapus_menu_minuman($id)
    {
        if ($id != 1) {
            $this->db->where('id_minuman', $id);
            $this->db->delete('minuman');
            return true;
        } else {
            return false;
        }
    }
    public function hapus_menu_cemilan($id)
    {
        if ($id != 1) {
            $this->db->where('id_cemilan', $id);
            $this->db->delete('cemilan');
            return true;
        } else {
            return false;
        }
    }
    public function edit_menu($id, $data)
    {
        $this->db->where('id_makanan', $id);
        $this->db->update('makanan', $data);
        return true;
    }
    public function edit_menu_minuman($id, $data)
    {
        $this->db->where('id_minuman', $id);
        $this->db->update('minuman', $data);
        return true;
    }
    public function edit_menu_cemilan($id, $data)
    {
        $this->db->where('id_cemilan', $id);
        $this->db->update('cemilan', $data);
        return true;
    }
    public function data_minuman()
    {
        return $this->db->get('minuman');
    }
    public function data_cemilan()
    {
        return $this->db->get('cemilan');
    }
    public function total_uang()
    {
        $this->db->select_sum('Bca', 'total_bca');
        $this->db->select_sum('Gojek', 'total_gojek');
        $this->db->select_sum('qr', 'total_qr');
        $this->db->select_sum('cash', 'total_cash');
        // Menggabungkan hasil query
        $query = $this->db->get('data_report');

        // Ambil hasil query
        $result = $query->row_array();


        $total_gojek = $result['total_gojek'] ?? 0;
        $total_bca = $result['total_bca'] ?? 0;
        $total_qr = $result['total_qr'] ?? 0;
        $total_cash = $result['total_cash'] ?? 0;
        $total_uang = ($total_bca + $total_cash + $total_qr + $total_gojek);

        return $total_uang;
    }
    public function total_uang_harian()
    {
        $this->db->order_by('id_report', 'DESC'); // Ganti 'id' dengan nama kolom yang sesuai
        $this->db->limit(1);

        $query = $this->db->get('data_report');

        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            return ($result['BCA'] + $result['Cash'] + $result['QR'] + $result['Gojek']);
        } else {
            return 0;
        }
    }

    public function total_uang_mingguan()
    {
        $this->db->where('Date >=', date('Y-m-d', strtotime('-7 days')));
        $this->db->where('Date <=', date('Y-m-d'));
        $this->db->select_sum('Bca', 'total_bca');
        $this->db->select_sum('Gojek', 'total_gojek');
        $this->db->select_sum('qr', 'total_qr');
        $this->db->select_sum('cash', 'total_cash');
        $query = $this->db->get('data_report');

        $result = $query->row_array();
        $total_gojek = $result['total_gojek'] ?? 0;
        $total_bca = $result['total_bca'] ?? 0;
        $total_qr = $result['total_qr'] ?? 0;
        $total_cash = $result['total_cash'] ?? 0;
        $total_uang = ($total_bca + $total_cash + $total_qr + $total_gojek);

        return $total_uang;
    }
    public function total_uang_bulanan()
    {
        $this->db->where('Date >=', date('Y-m-d', strtotime('-30 days')));
        $this->db->where('Date <=', date('Y-m-d'));
        $this->db->select_sum('Bca', 'total_bca');
        $this->db->select_sum('Gojek', 'total_gojek');
        $this->db->select_sum('qr', 'total_qr');
        $this->db->select_sum('cash', 'total_cash');
        $query = $this->db->get('data_report');

        $result = $query->row_array();
        $total_gojek = $result['total_gojek'] ?? 0;
        $total_bca = $result['total_bca'] ?? 0;
        $total_qr = $result['total_qr'] ?? 0;
        $total_cash = $result['total_cash'] ?? 0;
        $total_uang = ($total_bca + $total_cash + $total_qr + $total_gojek);

        return $total_uang;
    }
    public function chart()
    {
        $firstDayOfMonth = date('Y-m-01'); // Mengambil tanggal awal bulan ini
        $lastDayOfMonth = date('Y-m-t');  // Mengambil tanggal terakhir bulan ini
    
        // Menghitung jumlah minggu dalam bulan ini
        $numWeeks = ceil((strtotime($lastDayOfMonth) - strtotime($firstDayOfMonth)) / (7 * 24 * 60 * 60));
    
        $data = [];
    
        for ($weekNumber = 1; $weekNumber <= $numWeeks; $weekNumber++) {
            $startOfWeek = date('Y-m-d', strtotime($firstDayOfMonth . ' +' . ($weekNumber - 1) . ' weeks'));
            $endOfWeek = date('Y-m-d', strtotime($firstDayOfMonth . ' +' . $weekNumber . ' weeks - 1 day'));
    
            // Mengambil data untuk minggu ini
            $this->db->where('Date >=', $startOfWeek);
            $this->db->where('Date <=', $endOfWeek);
            $this->db->select('id_report, Cash, Bca');
            $this->db->group_by('Date');
            $query = $this->db->get('data_report');
    
            $result = $query->result_array();
    
            $weekData = [];
    
            foreach ($result as $row) {
                $total = $row['Cash'] + $row['Bca'];
                $weekData[] = [
                    'id_report' => $row['id_report'],
                    'total' => $total
                ];
            }
    
            // Menambahkan data minggu ini ke array utama
            $data[] = $weekData;
        }
    
        return $data;
    }
    
    
}
