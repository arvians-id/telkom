<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modem_model extends CI_Model
{
	public function simpanModem()
	{
		$data = [
			'kode_modem' => $this->input->post('kode_modem'),
			'type_modem' => $this->input->post('type_modem'),
			'modem' => $this->input->post('modem'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_modem', $data);
	}
	public function ubahModem($kode_modem)
	{
		$data = [
			'type_modem' => $this->input->post('type_modem'),
			'modem' => $this->input->post('modem'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->where('kode_modem', $kode_modem);
		$this->db->update('tbl_modem', $data);
	}
}
