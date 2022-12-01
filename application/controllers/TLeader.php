<?php
defined('BASEPATH') or exit('No direct script access allowed');

class TLeader extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		is_logged_not_in();
		$this->load->model('Pelanggan_model', 'pelanggan_m');
		$this->load->model('User_model', 'user_m');
		$this->load->model('Gejala_model', 'gejala_m');
		$this->load->model('Modem_model', 'modem_m');
		$this->load->model('Solusi_model', 'solusi_m');
		$this->load->model('Rules_model', 'rules_m');
	}
	public function index()
	{
		$data = [
			'judul' => 'Team Leader | Beranda',
			'content' => 'tleader/contents/index',
			'countPelanggan' => $this->db->get('tbl_pelanggan')->num_rows(),
			'countOnProgress' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 0])->num_rows(),
			'countKendala' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 1])->num_rows(),
			'countDone' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 2])->num_rows(),
			'countCabut' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 3])->num_rows(),
			'countPutus' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 4])->num_rows(),
		];
		$this->load->view('tleader/layouts/app', $data);
	}
	public function data_pelanggan()
	{
		$data = [
			'judul' => 'Team Leader | Data Pelanggan',
			'content' => 'tleader/contents/data-pelanggan',
			'getPelanggan' => $this->pelanggan_m->getPelanggan(),
			'countPelanggan' => $this->db->get('tbl_pelanggan')->num_rows(),
			'countOnProgress' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 0])->num_rows(),
			'countKendala' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 1])->num_rows(),
			'countDone' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 2])->num_rows(),
			'countCabut' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 3])->num_rows(),
			'countPutus' => $this->db->get_where('tbl_status_pelanggan', ['status_id' => 4])->num_rows(),
		];
		$this->load->view('tleader/layouts/app-data', $data);
	}
	public function input_pelanggan()
	{
		$this->form_validation->set_rules('kode_pelanggan', 'Kode Pelanggan', 'required|is_unique[tbl_pelanggan.kode_pelanggan]');
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('paket', 'Paket', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Input Data Pelanggan',
				'content' => 'tleader/contents/input-pelanggan',
				'getPaket' => $this->db->get('tbl_paket')->result_array(),
			];
			$this->load->view('tleader/layouts/app-input', $data);
		} else {
			$this->pelanggan_m->simpanPelanggan();
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			redirect('tleader/data_pelanggan');
		}
	}
	public function ubah_pelanggan($id_pelanggan)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required|max_length[50]');
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[50]');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
		$this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
		$this->form_validation->set_rules('paket', 'Paket', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Ubah Data Pelanggan',
				'content' => 'tleader/contents/ubah-pelanggan',
				'getPaket' => $this->db->get('tbl_paket')->result_array(),
				'pelanggan' => $this->pelanggan_m->getPelangganById($id_pelanggan)
			];
			$this->load->view('tleader/layouts/app-input', $data);
		} else {
			$this->pelanggan_m->ubahPelanggan($id_pelanggan);
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			redirect('tleader/data_pelanggan');
		}
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
		$this->form_validation->set_rules('bio', 'Bio', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Profil Team Leader',
				'content' => 'tleader/contents/profil',
				'profil' => $this->db->get_where('tbl_users', ['id' => $this->session->userdata('id')])->row_array()
			];
			$this->load->view('tleader/layouts/app', $data);
		} else {
			$this->user_m->ubahProfil();
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('tleader/profil');
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
		redirect('tleader/data_pelanggan');
	}
	// SISTEM PAKAR
	// Riwayat
	public function data_riwayat()
	{
		$data = [
			'judul' => 'Team Leader | Data Riwayat',
			'content' => 'tleader/contents/sistem-pakar/data-riwayat',
			'getRiwayat' => $this->db->get('tbl_riwayat')->result_array(),
		];
		$this->load->view('tleader/layouts/app-data', $data);
	}
	public function hapus_riwayat($kode_riwayat)
	{
		$this->db->delete('tbl_riwayat', ['kode_riwayat' => $kode_riwayat]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('tleader/data_riwayat');
	}
	// GEJALA
	public function data_gejala()
	{
		$this->form_validation->set_rules('kode_gejala', 'Kode Gejala', 'required|max_length[20]|is_unique[tbl_gejala.kode_gejala]');
		$this->form_validation->set_rules('gejala', 'Gejala', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Data Gejala',
				'content' => 'tleader/contents/sistem-pakar/data-gejala',
				'getGejala' => $this->db->get('tbl_gejala')->result_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->gejala_m->simpanGejala();
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
			redirect('tleader/data_gejala');
		}
	}
	public function ubah_gejala($kode_gejala)
	{
		$this->form_validation->set_rules('gejala', 'Gejala', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Ubah Data Gejala',
				'content' => 'tleader/contents/sistem-pakar/ubah-gejala',
				'getGejala' => $this->db->get_where('tbl_gejala', ["kode_gejala" => $kode_gejala])->row_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->gejala_m->ubahGejala($kode_gejala);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('tleader/data_gejala');
		}
	}
	public function hapus_gejala($kode_gejala)
	{
		$this->db->delete('tbl_gejala', ['kode_gejala' => $kode_gejala]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('tleader/data_gejala');
	}
	// MODEM
	public function data_modem()
	{
		$this->form_validation->set_rules('kode_modem', 'Kode Modem', 'required|max_length[20]|is_unique[tbl_modem.kode_modem]');
		$this->form_validation->set_rules('type_modem', 'Kode Modem', 'required');
		$this->form_validation->set_rules('modem', 'Modem', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Data Modem',
				'content' => 'tleader/contents/sistem-pakar/data-modem',
				'getModem' => $this->db->get('tbl_modem')->result_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->modem_m->simpanModem();
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
			redirect('tleader/data_modem');
		}
	}
	public function ubah_modem($kode_modem)
	{
		$this->form_validation->set_rules('type_modem', 'Kode Modem', 'required');
		$this->form_validation->set_rules('modem', 'Modem', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Ubah Data Modem',
				'content' => 'tleader/contents/sistem-pakar/ubah-modem',
				'getModem' => $this->db->get_where('tbl_modem', ["kode_modem" => $kode_modem])->row_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->modem_m->ubahModem($kode_modem);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('tleader/data_modem');
		}
	}
	public function hapus_modem($kode_modem)
	{
		$this->db->delete('tbl_modem', ['kode_modem' => $kode_modem]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('tleader/data_modem');
	}
	// SOLUSI
	public function data_solusi()
	{
		$this->form_validation->set_rules('kode_solusi', 'Kode Solusi', 'required|max_length[20]|is_unique[tbl_solusi.kode_solusi]');
		$this->form_validation->set_rules('judul', 'Kode Solusi', 'required|max_length[256]');
		$this->form_validation->set_rules('solusi', 'Solusi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Data Solusi',
				'content' => 'tleader/contents/sistem-pakar/data-solusi',
				'getSolusi' => $this->db->get('tbl_solusi')->result_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->solusi_m->simpanSolusi();
			$this->session->set_flashdata('success', 'Data berhasil ditambahkan.');
			redirect('tleader/data_solusi');
		}
	}
	public function ubah_solusi($kode_solusi)
	{
		$this->form_validation->set_rules('judul', 'Kode Solusi', 'required|max_length[256]');
		$this->form_validation->set_rules('solusi', 'Solusi', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Ubah Data Solusi',
				'content' => 'tleader/contents/sistem-pakar/ubah-solusi',
				'getSolusi' => $this->db->get_where('tbl_solusi', ["kode_solusi" => $kode_solusi])->row_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->solusi_m->ubahSolusi($kode_solusi);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('tleader/data_solusi');
		}
	}
	public function hapus_solusi($kode_solusi)
	{
		$this->db->delete('tbl_solusi', ['kode_solusi' => $kode_solusi]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('tleader/data_solusi');
	}
	// RULES
	public function data_rules()
	{
		$data = [
			'judul' => 'Team Leader | Data Rules',
			'content' => 'tleader/contents/sistem-pakar/data-rules',
			'getRules' => $this->db->get('tbl_rules')->result_array(),
		];
		$this->load->view('tleader/layouts/app-data', $data);
	}
	public function input_rules()
	{
		$this->form_validation->set_rules('kode_rules', 'Kode Rules', 'required|is_unique[tbl_rules.kode_rules]');
		$this->form_validation->set_rules('kode_solusi_rules', 'Kode Solusi', 'required');
		$this->form_validation->set_rules('kode_gejala_rules[]', 'Kode Gejala', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Input Data Rules',
				'content' => 'tleader/contents/sistem-pakar/input-rules',
				'getRules' => $this->db->get('tbl_rules')->result_array(),
				'getSolusi' => $this->db->get('tbl_solusi')->result_array(),
				'getGejala' => $this->db->get('tbl_gejala')->result_array(),
			];
			$this->load->view('tleader/layouts/app-input', $data);
		} else {
			$this->rules_m->simpanRules();
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			redirect('tleader/data_rules');
		}
	}
	public function ubah_rules($kode_rules)
	{
		$this->form_validation->set_rules('judul', 'Kode Rules', 'required|max_length[256]');
		$this->form_validation->set_rules('rules', 'Rules', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Team Leader | Ubah Data Rules',
				'content' => 'tleader/contents/sistem-pakar/ubah-rules',
				'getRules' => $this->db->get_where('tbl_rules', ["kode_rules" => $kode_rules])->row_array(),
			];
			$this->load->view('tleader/layouts/app-data', $data);
		} else {
			$this->rules_m->ubahRules($kode_rules);
			$this->session->set_flashdata('success', 'Data berhasil diubah.');
			redirect('tleader/data_rules');
		}
	}
	public function hapus_rules($kode_rules)
	{
		$this->db->delete('tbl_rules', ['kode_rules' => $kode_rules]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('tleader/data_rules');
	}
}
