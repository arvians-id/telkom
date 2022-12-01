<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rules_model extends CI_Model
{
	public function simpanRules()
	{
		$gejala = $this->input->post('kode_gejala_rules');
		$kode_gejala_rules = implode(",", $gejala);
		$data = [
			'kode_rules' => $this->input->post('kode_rules'),
			'kode_solusi_rules' => $this->input->post('kode_solusi_rules'),
			'kode_gejala_rules' => $kode_gejala_rules
		];
		$this->db->insert('tbl_rules', $data);
	}
	public function ubahRules($kode_solusi)
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
