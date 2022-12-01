<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_model extends CI_Model
{
	public function getRiwayatRelation($kode_riwayat)
	{
		$this->db->select('*');
		$this->db->from('tbl_riwayat r');
		$this->db->join('tbl_pelanggan p', 'r.kode_pelanggan = p.kode_pelanggan');
		$this->db->join('tbl_modem m', 'm.kode_modem = r.kode_modem');

		return $this->db->get()->row_array();
	}
	public function getJawaban($kode_riwayat)
	{
		$getRiwayat = $this->db->get_where('tbl_riwayat', ['kode_riwayat' => $kode_riwayat])->row_array();
		$arr = []
		$getGejala = $this->db->get_where('tbl_gejala')
	}
}
