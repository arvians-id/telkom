<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Gejala_model extends CI_Model
{
	public function simpanGejala()
	{
		$data = [
			'kode_gejala' => $this->input->post('kode_gejala'),
			'gejala' => $this->input->post('gejala'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_gejala', $data);
	}
	public function ubahGejala($kode_gejala)
	{
		$data = [
			'gejala' => $this->input->post('gejala'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->where('kode_gejala', $kode_gejala);
		$this->db->update('tbl_gejala', $data);
	}
}
