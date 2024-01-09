<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth_model extends CI_Model
{
  public $table = 'user';
  public $id = 'user.id';
  public function __construct()
  {
    parent::__construct();
  }

  public function get()
  {
    $this->db->from($this->table);
    $query = $this->db->get();
    return $query->result_array();
  }
  public function getBy()
  {
    $this->db->from($this->table);
    $this->db->where('email', $this->session->userdata('email')); // Menggunakan where untuk mencocokkan email
    $query = $this->db->get();
    return $query->row_array();
  }

  public function insert($data)
  {
    return $this->db->insert('user', $data);
  }
}
