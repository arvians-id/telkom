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
	}
	public function index()
	{
		$data = [
			'judul' => 'Team Leader',
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
			'judul' => 'Team Leader',
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
				'judul' => 'Input Data Pelanggan',
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
				'judul' => 'Profil Team Leader',
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
		$this->db->delete('tbl_pelanggan', ['id_pelanggan' => $id_pelanggan]);
		$this->session->set_flashdata('success', 'Data berhasil dihapus.');
		redirect('tleader/data_pelanggan');
	}
}
