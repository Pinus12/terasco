<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model
{
    
    public function tampil_data() {
        return $this->db->get('basket'); // Mengambil data dari Database untuk ditampilkan
    }
    public function insert_data($data) {
        $this->db->insert('basket',$data); // Menambahkan data ke Database dari inputan
        
    }
    public function hapus_data($where, $table) {
        $this->db->where($where);
        $this->db->delete($table);
    }
    public function edit_data($where, $table) {
        return $this->db->get_where($table,$where);
    }
    public function update_data($where,$data,$table) {
        $this->db->where($where);
        $this->db->update($table,$data);
    }
    public function detail_data($id = null) {
        $query = $this->db->get_where('basket',array('id' => $id))->row();
        return $query;
    }
}
