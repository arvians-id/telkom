<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model', 'pelanggan_m');
		$this->load->model('Riwayat_model', 'riwayat_m');
		$this->load->model('Gejala_model', 'gejala_m');
	}
	public function index()
	{
		$data = [
			'judul' => 'Beranda',
			'content' => 'home/contents/index',
			'getPelanggan' => $this->pelanggan_m->getPelanggan([1, 2, 3, 4]),
		];
		$this->load->view('home/layouts/app', $data);
	}
	public function sejarah()
	{
		$data = [
			'judul' => 'Sejarah',
			'content' => 'home/contents/sejarah',
		];
		$this->load->view('home/layouts/app', $data);
	}
	public function keluhan()
	{
		$this->form_validation->set_rules('kode_pelanggan', 'Kode Pelanggan', 'required');
		$this->form_validation->set_rules('kode_modem', 'Kode Modem', 'required');
		$this->form_validation->set_rules('jawaban[]', 'Kode Keluhan', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Pengaduan/Keluhan Pelanggan',
				'content' => 'home/contents/keluhan',
				'getModem' => $this->db->get('tbl_modem')->result_array(),
				'getGejala' => $this->db->get('tbl_gejala')->result_array()
			];
			$this->load->view('home/layouts/app-input', $data);
		} else {
			$kode_riwayat['kode_riwayat'] = $this->riwayat_m->simpanRiwayat();
			$data = [
				'judul' => 'Hasil Pengaduan/Keluhan Pelanggan',
				'content' => 'home/contents/result'
			];
			$this->session->set_userdata($kode_riwayat);
			$this->session->set_flashdata('success', 'Data keluhan/pengaduan berhasil disimpan, silahkan cek hasilnya dibawah ini.');
			redirect('home/result');
		}
	}
	public function result()
	{
		$kode_riwayat = $this->session->userdata('kode_riwayat');
		if ($kode_riwayat) {
			$data = [
				'judul' => 'Hasil Pengaduan/Keluhan Pelanggan',
				'content' => 'home/contents/result',
				'getSolusi' => $this->riwayat_m->getForwardChaining($kode_riwayat),
				'getJawaban' => $this->riwayat_m->getJawaban($kode_riwayat),
				'getFalseGejala' => $this->gejala_m->getFalseGejala($kode_riwayat),
				'getRiwayat' => $this->riwayat_m->getRiwayatRelation($kode_riwayat)
			];
			if ($data['getSolusi'] != "Kode solusi tidak ditemukan") {
				$dataUpdate = [
					'kode_riwayat' => $kode_riwayat,
					'kode_solusi' => $data['getSolusi']['kode_solusi'],
				];
				$this->riwayat_m->updateRiwayat($dataUpdate);
			}
			$this->session->unset_userdata('kode_riwayat');
			$this->load->view('home/layouts/app', $data);
		} else {
			$this->session->set_flashdata('error', 'Sesi anda berakhir atau anda belum mengisi form pengaduan/keluhan');
			redirect('home/keluhan');
		}
	}
	public function checkVerifikasiPelanggan()
	{
		$kode_pelanggan = $this->input->post('kode_pelanggan');
		$getPelanggan = $this->db->get_where('tbl_pelanggan', ['kode_pelanggan' => $kode_pelanggan])->row_array();
		echo json_encode($getPelanggan);
	}
	public function checkVerifikasiModem()
	{
		$kode_modem = $this->input->post('kode_modem');
		$getModem = $this->db->get_where('tbl_modem', ['kode_modem' => $kode_modem])->row_array();
		echo json_encode($getModem);
	}
}
