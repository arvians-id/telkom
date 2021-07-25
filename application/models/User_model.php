<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model
{
	public function buatUser()
	{
		$upload_img = $_FILES['photo']['name'];
		if ($upload_img) {
			$config['upload_path']          = './assets/images';
			$config['allowed_types']        = 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('photo')) {
				$foto_baru = $this->upload->data('file_name', 'photo');
			}
		} else {
			$foto_baru =  'default.png';
		}
		$data = [
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'email' => $this->input->post('email'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'photo' => $foto_baru,
			'bio' => $this->input->post('bio'),
			'role' => $this->input->post('role'),
			'created_at' => date('Y-m-d h:i:s'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->insert('tbl_users', $data);
	}
	public function ubahProfil()
	{
		$user = $this->db->get_where('tbl_users', ['id' => $this->session->userdata('id')])->row_array();
		$upload_img = $_FILES['photo']['name'];
		if ($upload_img) {
			$config['upload_path']          = './assets/images';
			$config['allowed_types']        = 'jpg|png|jpeg';

			$this->load->library('upload', $config);
			if ($this->upload->do_upload('photo')) {
				$path = FCPATH . 'assets/images/' . $user['photo'];
				if (file_exists($path) && $user['photo'] != 'default.png') {
					unlink($path);
				}
				$foto_baru = $this->upload->data('file_name', 'photo');
				$this->session->set_userdata('photo', $foto_baru);
			}
		} else {
			$foto_baru =  $user['photo'];
		}
		$password = $this->input->post('password');
		$password == null ? $newPass = $user['password'] : $newPass = md5($password);
		$data = [
			'password' => $newPass,
			'email' => $this->input->post('email'),
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'no_hp' => $this->input->post('no_hp'),
			'alamat' => $this->input->post('alamat'),
			'photo' => $foto_baru,
			'bio' => $this->input->post('bio'),
			'updated_at' => date('Y-m-d h:i:s'),
		];
		$this->db->where('id', $this->session->userdata('id'));
		$this->db->update('tbl_users', $data);
	}
}
