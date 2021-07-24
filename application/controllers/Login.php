<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		is_logged_in();

		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Login'
			];
			$this->load->view('login/index', $data);
		} else {
			$username = $this->input->post('username');
			$password = $this->input->post('password');

			$user = $this->db->get_where('tbl_users', ['username' => $username, 'password' => md5($password)])->row_array();
			if ($user) {
				$setSession = [
					'id' => $user['id'],
					'email' => $user['email'],
					'username' => $user['username'],
					'role' => $user['role'],
					'photo' => $user['photo']
				];
				$this->session->set_userdata($setSession);
				if ($user['role'] == 'kaubis') {
					redirect('kaubis');
				} else {
					redirect('tleader');
				}
			}
			$this->session->set_flashdata('error', 'Username atau password salah!');
			redirect('login');
		}
	}
	public function logout()
	{
		$data = ['id', 'email', 'username', 'role', 'photo'];
		$this->session->unset_userdata($data);
		$this->session->set_flashdata('success', 'Anda berhasil keluar.');
		redirect('login');
	}
}
