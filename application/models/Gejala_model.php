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
	public function getFalseGejala($kode_riwayat)
	{
		$getRiwayat = $this->db->get_where('tbl_riwayat', ['kode_riwayat' => $kode_riwayat])->row_array();
		$getGejala = $this->db->get('tbl_gejala')->result_array();
		$arrJawaban = explode(',', $getRiwayat['jawaban']);

		$falseGejala = [];
		for ($i = 0; $i < count($getGejala); $i++) {
			if (!in_array($getGejala[$i]['kode_gejala'], $arrJawaban)) {
				$falseGejala[] = $getGejala[$i];
			}
		}

		return $falseGejala;
	}
}
