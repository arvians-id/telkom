<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan_model extends CI_Model
{
	public function getPelanggan($status_pelanggan = [])
	{
		$pelanggan = $this->db->get('tbl_pelanggan')->result_array();
		$status = $this->db->get('tbl_status')->result_array();

		foreach ($pelanggan as $p) {
			foreach ($status as $s) {
				$this->db->select('*');
				$this->db->from('tbl_status_pelanggan a');
				$this->db->join('tbl_pelanggan b', 'a.pelanggan_id = b.id_pelanggan');
				$this->db->join('tbl_status c', 'a.status_id = c.id_status');
				$this->db->join('tbl_paket d', 'b.paket_id = d.id_paket');
				$this->db->order_by('b.id_pelanggan', 'desc');
				if ($status_pelanggan != null) {
					$this->db->where_in('c.id_status', $status_pelanggan);
				}

				return $this->db->get()->result_array();
			}
		}
	}
	public function simpanPelanggan()
	{
		$config['upload_path']          = './assets/images';
		$config['allowed_types']        = 'jpg|png|jpeg';

		$this->load->library('upload', $config);
		if ($this->upload->do_upload('photo_ktp')) {
			$photo_ktp = $this->upload->data('file_name', 'photo_ktp');
		} else {
			$this->session->set_flashdata('error', 'Photo wajib dimasukkan.');
			redirect('tleader/input_pelanggan');
		}
		if ($this->upload->do_upload('photo_selfie')) {
			$photo_selfie = $this->upload->data('file_name', 'photo_selfie');
		} else {
			$this->session->set_flashdata('error', 'Photo wajib dimasukkan.');
			redirect('tleader/input_pelanggan');
		}
		$data = [
			'kode_pelanggan' => $this->input->post('kode_pelanggan'),
			'nama' => $this->input->post('nama'),
			'email' => $this->input->post('email'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'paket_id' => $this->input->post('paket'),
			'photo_ktp' => $photo_ktp,
			'photo_selfie' => $photo_selfie,
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_pelanggan', $data);
		$id = $this->db->insert_id();
		$this->db->insert('tbl_status_pelanggan', ['pelanggan_id' => $id, 'status_id' => 0]);
	}
}
