<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelanggan_model', 'pelanggan_m');
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
}
