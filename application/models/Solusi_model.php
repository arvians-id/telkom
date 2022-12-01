<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Solusi_model extends CI_Model
{
	public function simpanSolusi()
	{
		$data = [
			'kode_solusi' => $this->input->post('kode_solusi'),
			'judul' => $this->input->post('judul'),
			'solusi' => $this->input->post('solusi'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_solusi', $data);
	}
	public function ubahSolusi($kode_solusi)
	{
		$data = [
			'judul' => $this->input->post('judul'),
			'solusi' => $this->input->post('solusi'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->where('kode_solusi', $kode_solusi);
		$this->db->update('tbl_solusi', $data);
	}
}
