<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kaubis extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_not_in();
		$this->load->model('Pelanggan_model', 'pelanggan_m');
		$this->load->model('User_model', 'user_m');
	}
	public function index()
	{
		$data = [
			'judul' => 'Kaubis',
			'content' => 'kaubis/contents/index',
			'countPelanggan' => $this->db->get('tbl_pelanggan')->num_rows(),
			'countOnProgress' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 0])->num_rows(),
			'countKendala' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 1])->num_rows(),
			'countDone' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 2])->num_rows(),
			'countCabut' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 3])->num_rows(),
			'countPutus' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 4])->num_rows(),
		];
		$this->load->view('kaubis/layouts/app', $data);
	}
	public function persetujuan()
	{
		$data = [
			'judul' => 'Kaubis',
			'content' => 'kaubis/contents/persetujuan',
			'getPelanggan' => $this->pelanggan_m->getPelanggan([0]),
			'countPelanggan' => $this->db->get('tbl_pelanggan')->num_rows(),
			'countOnProgress' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 0])->num_rows(),
		];
		$this->load->view('kaubis/layouts/app-data', $data);
	}
	public function ubah_status($id_status, $id_pelanggan)
	{
		$this->db->where('pelanggan_id', $id_pelanggan);
		$this->db->update('tbl_status_pelanggan', ['status_id' => $id_status]);
		$this->session->set_flashdata('success', 'Status pelanggan berhasil diubah.');
		redirect('kaubis/data_pelanggan');
	}
	public function data_pelanggan()
	{
		$data = [
			'judul' => 'Kaubis',
			'content' => 'kaubis/contents/data-pelanggan',
			'getPelanggan' => $this->pelanggan_m->getPelanggan([1, 2, 3, 4]),
			'countPelanggan' => $this->db->get('tbl_pelanggan')->num_rows(),
			'countOnProgress' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 0])->num_rows(),
			'countKendala' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 1])->num_rows(),
			'countDone' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 2])->num_rows(),
			'countCabut' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 3])->num_rows(),
			'countPutus' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 4])->num_rows(),
		];
		$this->load->view('kaubis/layouts/app-data', $data);
	}
	public function generate()
	{
		$id = mt_rand(100000000000, 999999999999);

		echo json_encode(['id' => $id]);
	}
	public function profil()
	{
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'min_length[6]');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Profil Kaubis',
				'content' => 'kaubis/contents/profil',
				'profil' => $this->db->get_where('tbl_users', ['id' => $this->session->userdata('id')])->row_array()
			];
			$this->load->view('kaubis/layouts/app', $data);
		} else {
			$this->user_m->ubahProfil();
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('kaubis/profil');
		}
	}
	public function hapus_pelanggan($id_pelanggan)
	{
		$pelanggan = $this->db->get_where('tbl_pelanggan', ['id_pelanggan' => $id_pelanggan])->row_array();
		$path_ktp = FCPATH . 'assets/images/' . $pelanggan['photo_ktp'];
		$path_selfie = FCPATH . 'assets/images/' . $pelanggan['photo_selfie'];
		if (file_exists($path_ktp)) {
			unlink($path_ktp);
		}
		if (file_exists($path_selfie)) {
			unlink($path_selfie);
		}
		$this->db->delete('tbl_pelanggan', ['id_pelanggan' => $id_pelanggan]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('kaubis/data_pelanggan');
	}
	public function data_kaubis($id_user = null)
	{
		if ($id_user != null) {
			$this->lihat_user($id_user);
			return true;
		}
		$data = [
			'judul' => 'Kaubis',
			'content' => 'kaubis/contents/data-kaubis',
			'getKaubis' => $this->db->get_where('tbl_users', ['role' => 'kaubis'])->result_array(),
			'countKaubis' => $this->db->get_where('tbl_users', ['role' => 'kaubis'])->num_rows(),
		];
		$this->load->view('kaubis/layouts/app-data', $data);
	}
	public function data_tleader($id_user = null)
	{
		if ($id_user != null) {
			$this->lihat_user($id_user);
			return true;
		}
		$data = [
			'judul' => 'Team Leader',
			'content' => 'kaubis/contents/data-tleader',
			'getTleader' => $this->db->get_where('tbl_users', ['role' => 'tleader'])->result_array(),
			'countTleader' => $this->db->get_where('tbl_users', ['role' => 'tleader'])->num_rows(),
		];
		$this->load->view('kaubis/layouts/app-data', $data);
	}
	private function lihat_user($id_user)
	{
		$data = [
			'judul' => 'Detail Profil',
			'content' => 'kaubis/contents/detail-user',
			'user' => $this->db->get_where('tbl_users', ['id' => $id_user])->row_array()
		];
		$this->load->view('kaubis/layouts/app', $data);
	}
	public function hapus_user($id_user)
	{
		$user = $this->db->get_where('tbl_users', ['id' => $id_user])->row_array();
		$photo = FCPATH . 'assets/images/' . $user['photo'];
		if (file_exists($photo)) {
			unlink($photo);
		}
		$this->db->delete('tbl_users', ['id' => $id_user]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		$user['role'] == 'tleader' ? redirect('kaubis/data_tleader') :  redirect('kaubis/data_kaubis');
	}
	public function input_user()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[tbl_users.username]|min_length[5]|max_length[15]');
		$this->form_validation->set_rules('nama_lengkap', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
		$this->form_validation->set_rules('role', 'Role', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Input Data User',
				'content' => 'kaubis/contents/input-user',
				'getPaket' => $this->db->get('tbl_paket')->result_array(),
			];
			$this->load->view('kaubis/layouts/app-input', $data);
		} else {
			$this->user_m->buatUser();
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			redirect('kaubis/input_user');
		}
	}
}
