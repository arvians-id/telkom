<?php
defined('BASEPATH') or exit('No direct script access allowed');
require('./application/third_party/phpoffice/vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

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
			'judul' => 'Kaubis | Beranda',
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
			'judul' => 'Kaubis | Data Persetujuan',
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
			'judul' => 'Kaubis | Data Pelanggan',
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
				'content' => 'kaubis/contents/ubah-pelanggan',
				'getPaket' => $this->db->get('tbl_paket')->result_array(),
				'pelanggan' => $this->pelanggan_m->getPelangganById($id_pelanggan)
			];
			$this->load->view('kaubis/layouts/app-input', $data);
		} else {
			$this->pelanggan_m->ubahPelanggan($id_pelanggan);
			$this->session->set_flashdata('success', 'Data berhasil disimpan.');
			redirect('kaubis/data_pelanggan');
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

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Kaubis | Profil Kaubis',
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
			'judul' => 'Kaubis | Data Kaubis',
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
			'judul' => 'Kaubis | Data Team Leader',
			'content' => 'kaubis/contents/data-tleader',
			'getTleader' => $this->db->get_where('tbl_users', ['role' => 'tleader'])->result_array(),
			'countTleader' => $this->db->get_where('tbl_users', ['role' => 'tleader'])->num_rows(),
		];
		$this->load->view('kaubis/layouts/app-data', $data);
	}
	private function lihat_user($id_user)
	{
		$data = [
			'judul' => 'Kaubis | Detail Profil',
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
				'judul' => 'Kaubis | Input Data User',
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
	public function laporan()
	{
		$this->form_validation->set_rules('awal', 'Awal', 'required');
		$this->form_validation->set_rules('akhir', 'Akhir', 'required');

		if ($this->form_validation->run() == FALSE) {
			$data = [
				'judul' => 'Kaubis | Laporan',
				'content' => 'kaubis/contents/laporan',
			];
			$this->load->view('kaubis/layouts/app-input', $data);
		} else {
			$awal = $this->input->post('awal');
			$akhir = $this->input->post('akhir');
			$getPelanggan = $this->pelanggan_m->getPelangganLaporan($awal, $akhir);

			$excel = new Spreadsheet();

			$excel->getProperties()->setCreator('ARAS FUTUHAT');
			$excel->getProperties()->setLastModifiedBy('ARAS FUTUHAT');
			$excel->getProperties()->setTitle('PT TELKOM INDONESIA');

			$excel->getActiveSheet()->getStyle('C1')->applyFromArray([
				'font'  => [
					'bold'  => true,
					'size'  => 14,
					'name'  => 'Times New Rowman'
				]
			]);
			$style = [
				'font'  => [
					'size'  => 12,
					'name'  => 'Times New Rowman'
				]
			];
			$excel->getActiveSheet()->getStyle('C2')->applyFromArray($style);
			$excel->getActiveSheet()->getStyle('C3')->applyFromArray($style);
			$excel->getActiveSheet()->getStyle('C1:H3')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A5:J5')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
			$excel->getActiveSheet()->getStyle('A5:J5')->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
			$excel->getActiveSheet()->getColumnDimension('A')->setWidth(8);
			$excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('D')->setWidth(30);
			$excel->getActiveSheet()->getColumnDimension('E')->setWidth(15);
			$excel->getActiveSheet()->getColumnDimension('F')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('H')->setWidth(25);
			$excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
			$excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
			$excel->getActiveSheet()->getRowDimension('5')->setRowHeight(30);
			$excel->getActiveSheet()->mergeCells('C1:H1');
			$excel->getActiveSheet()->mergeCells('C2:H2');
			$excel->getActiveSheet()->mergeCells('C3:H3');

			$excel->setActiveSheetIndex(0)
				->setCellValue('C1', 'PT TELKOM INDONESIA - TELKOM AKSES')
				->setCellValue('C2', 'Telkom Sadang Serang, Jl Sadang Serang no 42')
				->setCellValue('C3', 'Laporan ' . date('d/m/Y', strtotime($awal)) . ' - ' . date('d/m/Y', strtotime($akhir)));
			$excel->setActiveSheetIndex(0)
				->setCellValue('A5', 'No')
				->setCellValue('B5', 'Kode Pelanggan')
				->setCellValue('C5', 'Nama Lengkap')
				->setCellValue('D5', 'Email')
				->setCellValue('E5', 'No Handphone')
				->setCellValue('F5', 'Alamat')
				->setCellValue('G5', 'Paket')
				->setCellValue('H5', 'Status')
				->setCellValue('I5', 'Tanggal Dibuat')
				->setCellValue('J5', 'Terakhir Diubah');

			$column = 6;
			$no = 1;
			if (!empty($getPelanggan)) {
				if (is_array($getPelanggan)) {
					foreach ($getPelanggan as $pelanggan) {
						$excel->getActiveSheet()->getStyle('A' . $column . ':J' . $column)->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
						$excel->setActiveSheetIndex(0)
							->setCellValue('A' . $column, $no++)
							->setCellValue('B' . $column, $pelanggan['kode_pelanggan'])
							->setCellValue('C' . $column, $pelanggan['nama'])
							->setCellValue('D' . $column, $pelanggan['email'])
							->setCellValue('E' . $column, $pelanggan['no_hp'])
							->setCellValue('F' . $column, $pelanggan['alamat'])
							->setCellValue('G' . $column, $pelanggan['paket'])
							->setCellValue('H' . $column, $pelanggan['status'])
							->setCellValue('I' . $column, $pelanggan['created_at'])
							->setCellValue('J' . $column, $pelanggan['updated_at']);

						if ($pelanggan['status_id'] == 0) {
							$color = 'ffa426';
						} elseif ($pelanggan['status_id'] == 1) {
							$color = 'fc544b';
						} elseif ($pelanggan['status_id'] == 2) {
							$color = '47c363';
						} elseif ($pelanggan['status_id'] == 3) {
							$color = 'cdd3d8';
						} elseif ($pelanggan['status_id'] == 4) {
							$color = 'fc544b';
						}
						$excel
							->getActiveSheet()
							->getStyle('H' . $column . ':H' . $column)
							->getFill()
							->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
							->getStartColor()
							->setARGB($color);
						$column++;
					}
				}
			} else {
				$this->session->set_flashdata('error', 'Tidak ada data ditemukan.');
				redirect('kaubis/laporan');
			}
			$writer = new Xlsx($excel);
			$fileName = bin2hex(random_bytes(12));

			header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
			header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
			header('Cache-Control: max-age=0');

			$writer->save('php://output');
			exit;
		}
	}
}
