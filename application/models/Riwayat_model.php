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
		$getJawaban = $getRiwayat['jawaban'];
		if ($getJawaban != "") {
			$getKodeGejala = explode(",", $getJawaban);
			$dataGejala = [];
			foreach ($getKodeGejala as $kodeGejala) {
				$getGejala = $this->db->get_where('tbl_gejala', ['kode_gejala' => $kodeGejala])->row_array();
				array_push($dataGejala, $getGejala);
			}
			return $dataGejala;
		}

		return [];
	}
	public function simpanRiwayat()
	{
		$dataJawaban = $this->input->post('jawaban');
		$jawaban = implode(",", $dataJawaban);
		$data = [
			'kode_riwayat' => $this->generateRandomString(3),
			'kode_pelanggan' => $this->input->post('kode_pelanggan'),
			'kode_modem' => $this->input->post('kode_modem'),
			'jawaban' => $jawaban,
			'created_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_riwayat', $data);
	}
	public function generateRandomString($length = 10)
	{
		$characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
