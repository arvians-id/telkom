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
		$this->db->where('r.kode_riwayat', $kode_riwayat);

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
		$resultJawaban = [];
		foreach ($dataJawaban as $jawaban) {
			if ($jawaban != "undefined") {
				array_push($resultJawaban, $jawaban);
			}
		}
		$jawaban = implode(",", $resultJawaban);
		$kode_riwayat = $this->generateRandomString(3);
		$data = [
			'kode_riwayat' => $kode_riwayat,
			'kode_pelanggan' => $this->input->post('kode_pelanggan'),
			'kode_modem' => $this->input->post('kode_modem'),
			'jawaban' => $jawaban,
			'created_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_riwayat', $data);
		return $kode_riwayat;
	}
	public function updateRiwayat($data)
	{
		$this->db->where('kode_riwayat', $data['kode_riwayat']);
		$this->db->update('tbl_riwayat', $data);
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
	public function getForwardChaining($kode_riwayat)
	{
		// Logic Forward Chaining
		// Riwayat
		$getRiwayat = $this->db->get_where('tbl_riwayat', ['kode_riwayat' => $kode_riwayat])->row_array();
		if ($getRiwayat['jawaban'] != "") {
			$getJawaban = explode(',', $getRiwayat['jawaban']);

			// Rules
			$getRules = $this->db->get_where('tbl_rules')->result_array();
			for ($i = 0; $i < count($getRules); $i++) {
				$isExists = 0;
				$getGejala = explode(',', $getRules[$i]['kode_gejala_rules']);
				for ($k = 0; $k < count($getJawaban); $k++) {
					for ($j = 0; $j < count($getGejala); $j++) {
						if ($getJawaban[$k] == $getGejala[$j]) {
							$isExists++;
							break;
						}
					}
				}
				if ($isExists == count($getGejala) && $isExists == count($getJawaban)) {
					// get data solusi with relation
					$this->db->select('*');
					$this->db->from('tbl_rules r');
					$this->db->join('tbl_solusi s', 'r.kode_solusi_rules = s.kode_solusi');
					$this->db->where('r.kode_solusi_rules', $getRules[$i]['kode_solusi_rules']);

					return $this->db->get()->row_array();
				}
			}

			return "Kode solusi tidak ditemukan";
		}
	}
}
