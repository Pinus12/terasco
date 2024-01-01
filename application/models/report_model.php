<?php
defined('BASEPATH') or exit('No direct script access allowed');

class report_model extends CI_Model
{
	public function ambil_data()
	{
		// Urutkan berdasarkan kolom ID secara descending
		$this->db->order_by('id_report', 'desc');

		// Batasi hasil hanya satu baris
		$this->db->limit(1);

		// Query untuk mengambil data dari database
		$query = $this->db->get('data_report');

		return $query->row_array();
	}

	public function simpan_data($shift, $uang_kas, $cup_awal, $cup_terpakai, $cup_sisa)
	{
		$data = array(
			'Shift' => $shift,
			'Kas' => $uang_kas,
			'cup_awal' => $cup_awal,
			'cup_terpakai' => $cup_terpakai,
			'cup_sisa' => $cup_sisa
			// Tambahkan field-field lainnya sesuai kebutuhan
		);
		// Urutkan berdasarkan kolom ID secara descending
		$this->db->order_by('id_report', 'desc');

		// Batasi hasil hanya satu baris
		$this->db->limit(1);

		$this->db->update('data_report', $data);
	}

	public function read_data($id_report)
	{
		return $this->db->get_where('data_report', ['id_report' => $id_report])->row_array();
	}

	public function get_history_entries()
	{
		// Modify this query based on your actual database structure
		$this->db->order_by('id_report', 'DESC');
		return $this->db->get('data_report')->result_array();
	}
}
