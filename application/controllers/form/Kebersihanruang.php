<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once(APPPATH . '../vendor/autoload.php'); 
// require_once(APPPATH . 'libraries/phpqrcode.php');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Kebersihanruang extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('auth_model'); 
		$this->load->model('kebersihanruang_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		} 
	}

	public function index()
	{
		$data = array(
			'kebersihanruang' => $this->kebersihanruang_model->get_data_by_plant()
		);

		$this->active_nav = 'kebersihanruang'; 
		$this->render('form/kebersihanruang/kebersihanruang', $data);
	}

	public function detail($uuid)
	{
		$data = array(
			'kebersihanruang' => $this->kebersihanruang_model->get_by_uuid($uuid),
		);

		$this->active_nav = 'kebersihanruang'; 
		$this->render('form/kebersihanruang/kebersihanruang-detail', $data);
	}

	public function tambah()
	{

		$rules = $this->kebersihanruang_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->kebersihanruang_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Ruang Produksi berhasil di simpan');
				redirect('kebersihanruang');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Ruang Produksi gagal di simpan');
				redirect('kebersihanruang');
			}
		}

		$this->active_nav = 'kebersihanruang'; 
		$this->render('form/kebersihanruang/kebersihanruang-tambah');
	}

	public function edit($uuid)
	{
		$rules = $this->kebersihanruang_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->kebersihanruang_model->update($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Ruang Produksi berhasil diupdate.');
			} else {
				$this->session->set_flashdata('error_msg', 'Data tidak berubah atau gagal diupdate.');
			}

			redirect('kebersihanruang');
		}

		$data = [
			'kebersihanruang' => $this->kebersihanruang_model->get_by_uuid($uuid),
			'bagian_list' => $this->kebersihanruang_model->get_bagian_by_uuid($uuid)
		];

		$this->active_nav = 'kebersihanruang'; 
		$this->render('form/kebersihanruang/kebersihanruang-edit', $data);
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('kebersihanruang');
		}

		$deleted = $this->kebersihanruang_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('kebersihanruang');
	}
	
	public function verifikasi()
	{
		$data = array(
			'kebersihanruang' => $this->kebersihanruang_model->get_data_by_plant()
		);

		$this->active_nav = 'verifikasi-kebersihanruang'; 
		$this->render('form/kebersihanruang/kebersihanruang-verifikasi', $data);
	}


	public function status($uuid)
	{
		$rules = $this->kebersihanruang_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->kebersihanruang_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Ruang Produksi berhasil di Update');
				redirect('kebersihanruang/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Ruang Produksi gagal di Update');
				redirect('kebersihanruang/verifikasi');
			}
		}

		$data = array(
			'kebersihanruang' => $this->kebersihanruang_model->get_by_uuid($uuid),
		);

		$this->active_nav = 'verifikasi-kebersihanruang'; 
		$this->render('form/kebersihanruang/kebersihanruang-status', $data);
	}

	// public function diketahui()
	// {
	// 	$data = array(
	// 		'kebersihanruang' => $this->kebersihanruang_model->get_data_by_plant(),
	// 		'active_nav' => 'diketahui-kebersihanruang', 
	// 	);

	// 	$this->load->view('partials/head', $data);
	// 	$this->load->view('form/kebersihanruang/kebersihanruang-diketahui', $data);
	// 	$this->load->view('partials/footer');
	// }


	// public function statusprod($uuid)
	// {
	// 	$rules = $this->kebersihanruang_model->rules_diketahui();
	// 	$this->form_validation->set_rules($rules);

	// 	if ($this->form_validation->run() == TRUE) {

	// 		$update = $this->kebersihanruang_model->diketahui_update($uuid);
	// 		if ($update) {
	// 			$this->session->set_flashdata('success_msg', 'Status Kebersihan Ruang Produksi berhasil di Update');
	// 			redirect('kebersihanruang/diketahui');
	// 		}else {
	// 			$this->session->set_flashdata('error_msg', 'Status Kebersihan Ruang Produksi gagal di Update');
	// 			redirect('kebersihanruang/diketahui');
	// 		}
	// 	}

	// 	$data = array(
	// 		'kebersihanruang' => $this->kebersihanruang_model->get_by_uuid($uuid),
	// 		'active_nav' => 'diketahui-kebersihanruang');

	// 	$this->load->view('partials/head', $data);
	// 	$this->load->view('form/kebersihanruang/kebersihanruang-statusprod', $data);
	// 	$this->load->view('partials/footer');
	// }

	public function cetak()
	{
		$tanggal = $this->input->post('tanggal');  
		$shift   = $this->input->post('shift'); 

		log_message('debug', 'Tanggal yang dipilih: ' . print_r($tanggal, true));

		if (empty($tanggal)) {
			show_error('Tidak ada tanggal yang dipilih', 404);
		}

		$plant = $this->session->userdata('plant');

		$kebersihanruang_data = $this->kebersihanruang_model->get_by_date($tanggal, $plant, $shift); 
		$kebersihanruang_data_verif = $this->kebersihanruang_model->get_last_verif_by_date($tanggal, $plant, $shift); 

		if (!$kebersihanruang_data || !$kebersihanruang_data_verif) {
			show_error('Data tidak ditemukan, Pilih tanggal yang ingin dicetak', 404);
		}

		$data['kebersihanruang'] = $kebersihanruang_data_verif;

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 14, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 38);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'KEBERSIHAN RUANG PRODUKSI', 0, 'C');
		$pdf->Ln(5);

		$tanggal = $data['kebersihanruang']->date;
		$dt = new DateTime($tanggal);

		$hari = [
			'Sunday'    => 'Minggu',
			'Monday'    => 'Senin',
			'Tuesday'   => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday'  => 'Kamis',
			'Friday'    => 'Jumat',
			'Saturday'  => 'Sabtu',
		];

		$bulan = [
			1 => 'Januari','Februari','Maret','April','Mei','Juni',
			'Juli','Agustus','September','Oktober','November','Desember'
		];

		$nama_hari  = $hari[$dt->format('l')];
		$nama_bulan = $bulan[(int)$dt->format('m')];

		$formatted_date  = $nama_hari . ', ' . $dt->format('d') . ' ' . $nama_bulan . ' ' . $dt->format('Y');
		$formatted_date2 = $dt->format('d') . ' ' . $nama_bulan . ' ' . $dt->format('Y');

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Hari / Tanggal : ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['kebersihanruang']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 10);

		$pdf->Cell(55, 10, 'Lokasi', 1, 0, 'C');
		$pdf->Cell(30, 5, 'Kondisi', 1, 0, 'C');
		$pdf->Cell(55, 10, 'Problem', 1, 0, 'C');
		$pdf->Cell(55, 10, 'Tindakan Koreksi', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');
		// $pdf->Cell(30, 5, 'Paraf', 1, 1, 'C');

		$pdf->Cell(55, 10, '', 0, 0, 'L');
		$pdf->Cell(15, 5, 'Bersih', 1, 0, 'C');
		$pdf->Cell(15, 5, 'Kotor', 1, 0, 'C');
		$pdf->Cell(90, 5, '', 0, 1, 'C');
		// $pdf->Cell(15, 5, 'QC', 1, 0, 'C');
		// $pdf->Cell(15, 5, 'Prod', 1, 1, 'C');

		$no = 1;
		foreach ($kebersihanruang_data as $kebersihanruang) {
			$pdf->SetFont('times', '', 9);
			$pdf->Cell(5, 5, $no, 1, 0, 'L');
			$pdf->Cell(190, 5, $kebersihanruang->lokasi, 1, 1, 'L');

			$detail = json_decode($kebersihanruang->detail);

			if ($detail && is_array($detail)) {
				foreach ($detail as $detail) {
					$bagian = isset($detail->bagian) ? $detail->bagian : '-';
					$kondisi_raw = isset($detail->kondisi) ? strtolower(trim($detail->kondisi)) : '';
					$kondisi1 = '-';
					$kondisi2 = '-';

					if ($kondisi_raw === 'bersih' || $kondisi_raw === '0') {
						$kondisi1 = '✔';
					} elseif (in_array($kondisi_raw, ['1', '2', '3', '4', '5', '6'])) {
						$kondisi2 = $kondisi_raw;
					}
					$problem = isset($detail->problem) ? $detail->problem : '-';
					$tindakan = isset($detail->tindakan) ? $detail->tindakan : '-';

					$pdf->SetFont('times', '', 8);
					$pdf->Cell(55, 4, "$bagian", 1, 0, 'L');
					$pdf->SetFont('dejavusans', '', 8);
					$pdf->Cell(15, 4, "$kondisi1", 1, 0, 'C');
					$pdf->SetFont('times', '', 8);
					$pdf->Cell(15, 4, "$kondisi2", 1, 0, 'C');
					$pdf->Cell(55, 4, "$problem", 1, 0, 'L');
					$pdf->Cell(55, 4, "$tindakan", 1, 1, 'L');
					// $pdf->Cell(15, 4, $kebersihanruang->username, 1, 0, 'C');
					// $pdf->Cell(15, 4, $kebersihanruang->nama_produksi, 1, 1, 'C');
				}
			}

			$no++;
		}

		$pdf->SetFont('times', 'I', 7);
		$pdf->Cell(190, 5, 'QB 01/00', 0, 1, 'R'); 

		$nama_spv = $data['kebersihanruang']->nama_spv;
		$tanggal_update = $data['kebersihanruang']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($kebersihanruang_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		} 

		$y_last = $pdf->GetY();
		$y_last += 5; 

		$pdf->SetFont('times', '', 7);
		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('dejavusans', '', 5);
		$kiri = "1 Berdebu\n2 Basah, ada genangan air\n3 Sisa produksi (remah-remah roti, tepung, sisa adonan)\n4 Noda (karat, cat, tinta)\n5 Pertumbuhan mikroorganisme (jamur, bau busuk, biofilm)\n6 Kontak / kontaminasi material non halal\n7 Higiene karyawan tidak sesuai GMP";
		$kanan = "✓ : Ok, sesuai SSOP, bersih, bebas najis / material non halal\n✗ : Tidak Ok, tidak sesuai SSOP\n-  : Tidak ada atau tidak digunakan";
		$posY = $pdf->GetY();
		$pdf->SetXY(10, $posY);
		$pdf->MultiCell(90, 4, $kiri, 0, 'L');
		$pdf->SetXY(105, $posY); 
		$pdf->MultiCell(90, 4, $kanan, 0, 'L'); 

		$this->load->model('pegawai_model');
		$data['kebersihanruang']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['kebersihanruang']->username);
		$data['kebersihanruang']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['kebersihanruang']->nama_spv);
		$data['kebersihanruang']->nama_lengkap_produksi = $data['kebersihanruang']->nama_produksi;

		$y_after_keterangan = $pdf->GetY() + 7;
		$status_verifikasi = true;
		foreach ($kebersihanruang_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break;
			}
		}

		$pdf->SetFont('times', '', 8);
		$pdf->SetTextColor(0, 0, 0);

// 		if ($status_verifikasi) {
// 			$y_verifikasi = $y_after_keterangan;

// 		// Dibuat oleh (QC)
// 			$pdf->SetXY(25, $y_verifikasi + 5);
// 			$pdf->Cell(35, 5, 'Dibuat Oleh,', 0, 0, 'C');
// 			$pdf->SetXY(25, $y_verifikasi + 10);
// 			$pdf->SetFont('times', 'U', 8);
// 			$pdf->Cell(35, 5, $data['kebersihanruang']->nama_lengkap_qc, 0, 1, 'C');
// 			$pdf->SetFont('times', '', 8); 
// 			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

// 		// // Diketahui oleh (Produksi)
// 		// 	$pdf->SetXY(90, $y_verifikasi + 5);
// 		// 	$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
// 		// 	if ($data['kebersihanruang']->status_produksi == 1 && !empty($data['kebersihanruang']->nama_produksi)) {
// 		// 		$update_tanggal_produksi = (new DateTime($data['kebersihanruang']->tgl_update_produksi))->format('d-m-Y | H:i');
// 		// 		$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['kebersihanruang']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
// 		// 		$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
// 		// 		$pdf->SetXY(90, $y_verifikasi + 24);
// 		// 		$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
// 		// 	} else {
// 		// 		$pdf->SetXY(90, $y_verifikasi + 10);
// 		// 		$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
// 		// 	}

// // Diketahui oleh (Produksi) - tanpa barcode
// 			$pdf->SetXY(90, $y_verifikasi + 5);
// 			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');

// 			if ($data['kebersihanruang']->status_produksi == 1 && !empty($data['kebersihanruang']->nama_produksi)) {
// 				$update_tanggal_produksi = (new DateTime($data['kebersihanruang']->tgl_update_produksi))->format('d-m-Y | H:i');

// 				$pdf->SetFont('times', 'U', 8);
// 				$pdf->SetXY(90, $y_verifikasi + 10);
// 				$pdf->Cell(35, 5, $data['kebersihanruang']->nama_produksi, 0, 1, 'C');

// 				$pdf->SetFont('times', '', 8);
// 				$pdf->SetXY(90, $y_verifikasi + 15);
// 				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 1, 'C');

// 				// $pdf->SetXY(90, $y_verifikasi + 20);
// 				// $pdf->Cell(35, 5, $update_tanggal_produksi, 0, 0, 'C');
// 			} else {
// 				$pdf->SetFont('times', '', 8);
// 				$pdf->SetXY(90, $y_verifikasi + 10);
// 				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
// 			}

// 		// Disetujui oleh (SPV)
// 			$pdf->SetXY(150, $y_verifikasi + 5);
// 			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
// 			$update_tanggal = (new DateTime($data['kebersihanruang']->tgl_update_spv))->format('d-m-Y | H:i');
// 			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['kebersihanruang']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
// 			$pdf->write2DBarcode($qr_text, 'QRCODE,L', 167, $y_verifikasi + 10, 15, 15, null, 'N');
// 			$pdf->SetXY(150, $y_verifikasi + 24);
// 			$pdf->Cell(49, 5, 'Supervisor QC', 0, 0, 'C');
// 		} else {
// 			$pdf->SetTextColor(255, 0, 0); 
// 			$pdf->SetFont('times', '', 8);
// 			$pdf->SetXY(100, $y_after_keterangan);
// 			$pdf->Cell(80, 5, 'Data Belum Diverifikasi', 0, 0, 'C');
// 		}

		$y_ttd   = $pdf->GetY() + 10;
		$qr_size = 15;

		$qc_usernames  = [];
		$qc_created_at = null;

		foreach ($kebersihanruang_data as $item) {
			if (!empty($item->username)) {
				$qc_usernames[] = $item->username;
			}

			if (!$qc_created_at && !empty($item->created_at)) {
				$qc_created_at = $item->created_at;
			}
		}

		$qc_usernames = array_unique($qc_usernames);

		$qc_nama_lengkap = [];
		foreach ($qc_usernames as $username) {
			$nama = $this->pegawai_model->get_nama_lengkap($username);
			if (!empty($nama)) {
				$qc_nama_lengkap[] = $nama;
			}
		}

		$qc_nama_text = !empty($qc_nama_lengkap)
		? implode(', ', array_unique($qc_nama_lengkap))
		: '-';

		$qc_tanggal = $qc_created_at
		? (new DateTime($qc_created_at))->format('d-m-Y | H:i')
		: '-';

		$qr_qc_text = "Dibuat secara digital oleh,\n"
		. $qc_nama_text . "\n"
		. "QC Inspector\n"
		. $qc_tanggal;

		$qr_produksi_text = null;

		if (!empty($data['kebersihanruang']->nama_lengkap_produksi) && !empty($data['kebersihanruang']->tgl_update_produksi)) {
			$prod_tanggal = (new DateTime($data['kebersihanruang']->tgl_update_produksi ?? $data['kebersihanruang']->tgl_update_produksi))
			->format('d-m-Y | H:i');

			$qr_produksi_text = "Diketahui secara digital oleh,\n"
			. $data['kebersihanruang']->nama_lengkap_produksi . "\n"
			. "Foreman/Forelady Produksi\n"
			. $prod_tanggal;
		}

		$spv_tanggal = !empty($data['kebersihanruang']->tgl_update_spv)
		? (new DateTime($data['kebersihanruang']->tgl_update_spv))->format('d-m-Y | H:i')
		: '-';

		$qr_spv_text = "Disetujui secara digital oleh,\n"
		. $data['kebersihanruang']->nama_lengkap_spv . "\n"
		. "Supervisor QC Bread Crumb\n"
		. $spv_tanggal;

		if ($status_verifikasi) {
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(20, $y_ttd);
			$pdf->Cell(45, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(85, $y_ttd);
			$pdf->Cell(45, 5, 'Diketahui Oleh,', 0, 0, 'C');
			$pdf->SetXY(150, $y_ttd);
			$pdf->Cell(45, 5, 'Disetujui Oleh,', 0, 1, 'C');
			$pdf->write2DBarcode($qr_qc_text, 'QRCODE,L', 35,$y_ttd + 5, $qr_size, $qr_size, null, 'N');
			if ($qr_produksi_text) {
				$pdf->write2DBarcode($qr_produksi_text, 'QRCODE,L', 100, $y_ttd + 5, $qr_size, $qr_size, null, 'N');
			}
			$pdf->write2DBarcode($qr_spv_text, 'QRCODE,L', 165, $y_ttd + 5, $qr_size, $qr_size, null, 'N');
			$pdf->SetXY(20, $y_ttd + 20);
			$pdf->Cell(45, 5, 'QC Inspector', 0, 0, 'C');
			$pdf->SetXY(85, $y_ttd + 20);
			$pdf->Cell(45, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			$pdf->SetXY(150, $y_ttd + 20);
			$pdf->Cell(45, 5, 'Supervisor QC', 0, 1, 'C');
		} else {
			$pdf->SetFont('times', '', 8);
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetXY(80, $y_ttd);
			$pdf->Cell(80, 6, 'Data Belum Diverifikasi', 0, 1, 'C');
			$pdf->SetTextColor(0, 0, 0);
		}

		$pdf->setPrintFooter(false);
		$filename = "Kebersihan Ruang_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}

	public function export_excel()
	{
		$tanggal = $this->input->post('tanggal');
		$shift   = $this->input->post('shift');

		if (empty($tanggal)) {
			show_error('Tidak ada tanggal yang dipilih', 404);
		}

		$plant = $this->session->userdata('plant');

		$kebersihanruang_data = $this->kebersihanruang_model->get_by_date($tanggal, $plant, $shift);
		$kebersihanruang_data_verif = $this->kebersihanruang_model->get_last_verif_by_date($tanggal, $plant, $shift);

		if (!$kebersihanruang_data || !$kebersihanruang_data_verif) {
			show_error('Data tidak ditemukan', 404);
		}

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$dt = new DateTime($kebersihanruang_data_verif->date);

		$hari = [
			'Sunday'=>'Minggu','Monday'=>'Senin','Tuesday'=>'Selasa',
			'Wednesday'=>'Rabu','Thursday'=>'Kamis','Friday'=>'Jumat','Saturday'=>'Sabtu'
		];
		$bulan = [
			1=>'Januari','Februari','Maret','April','Mei','Juni',
			'Juli','Agustus','September','Oktober','November','Desember'
		];

		$formatted_date = $hari[$dt->format('l')] . ', ' .
		$dt->format('d') . ' ' . $bulan[(int)$dt->format('m')] . ' ' . $dt->format('Y');

		$sheet->mergeCells('A1:F1');
		$sheet->setCellValue('A1', 'KEBERSIHAN RUANG PRODUKSI');
		$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14);
		$sheet->getStyle('A1')->getAlignment()->setHorizontal('center');

		$sheet->setCellValue('A3', 'Hari / Tanggal');
		$sheet->setCellValue('C3', ': ' . $formatted_date);
		$sheet->setCellValue('E3', 'Shift');
		$sheet->setCellValue('F3', ': ' . $kebersihanruang_data_verif->shift);

		$sheet->mergeCells('A5:A6')->setCellValue('A5', 'Lokasi');
		$sheet->mergeCells('B5:C5')->setCellValue('B5', 'Kondisi');
		$sheet->mergeCells('D5:D6')->setCellValue('D5', 'Problem');
		$sheet->mergeCells('E5:E6')->setCellValue('E5', 'Tindakan Koreksi');

		$sheet->setCellValue('B6', 'Bersih');
		$sheet->setCellValue('C6', 'Kotor');

		$sheet->getStyle('A5:E6')->getFont()->setBold(true);
		$sheet->getStyle('A5:E6')->getAlignment()->setHorizontal('center')->setVertical('center');
		$sheet->getStyle('A5:E6')->getBorders()->getAllBorders()->setBorderStyle('thin');

		$row = 7;

		foreach ($kebersihanruang_data as $data) {

			$sheet->mergeCells("A{$row}:E{$row}");
			$sheet->setCellValue("A{$row}", $data->lokasi);
			$sheet->getStyle("A{$row}")->getFont()->setBold(true);
			$sheet->getStyle("A{$row}:E{$row}")->getBorders()->getAllBorders()->setBorderStyle('thin');
			$row++;

			$detail = json_decode($data->detail);

			if ($detail && is_array($detail)) {
				foreach ($detail as $d) {
					$bersih = '-';
					$kotor  = '-';

					$kondisi = strtolower(trim($d->kondisi ?? ''));

					if ($kondisi === 'bersih' || $kondisi === '0') {
						$bersih = '✔';
					} elseif (in_array($kondisi, ['1','2','3','4','5','6'])) {
						$kotor = $kondisi;
					}

					$sheet->setCellValue("A{$row}", $d->bagian ?? '-');
					$sheet->setCellValue("B{$row}", $bersih);
					$sheet->setCellValue("C{$row}", $kotor);
					$sheet->setCellValue("D{$row}", $d->problem ?? '-');
					$sheet->setCellValue("E{$row}", $d->tindakan ?? '-');

					$sheet->getStyle("A{$row}:E{$row}")
					->getBorders()->getAllBorders()->setBorderStyle('thin');

					$sheet->getStyle("B{$row}:C{$row}")
					->getAlignment()->setHorizontal('center');

					$row++;
				}
			}
		}

		$row += 2;
		$sheet->setCellValue("A{$row}", 
			"1 Berdebu\n2 Basah, ada genangan air\n3 Sisa produksi\n4 Noda\n5 Pertumbuhan mikroorganisme\n6 Kontaminasi non halal\n7 Higiene karyawan tidak sesuai GMP"
		);

		$sheet->setCellValue("D{$row}", 
			"✔ : Ok / Bersih\n✗ : Tidak Ok\n- : Tidak ada"
		);

		$sheet->getStyle("A{$row}:E{$row}")->getAlignment()->setWrapText(true);

		$this->load->model('pegawai_model');
		$row += 6;
		$sheet->setCellValue("A{$row}", 'Dibuat Oleh,');
		$sheet->setCellValue("A".($row+2), $this->pegawai_model->get_nama_lengkap($kebersihanruang_data_verif->username));
		$sheet->setCellValue("A".($row+3), 'QC Inspector');

		$sheet->setCellValue("C{$row}", 'Diketahui Oleh,');
		$sheet->setCellValue("C".($row+2), $kebersihanruang_data_verif->nama_produksi ?: 'Belum Diverifikasi');
		$sheet->setCellValue("C".($row+3), 'Foreman/Forelady Produksi');

		$sheet->setCellValue("E{$row}", 'Disetujui Oleh,');
		$sheet->setCellValue("E".($row+2), $this->pegawai_model->get_nama_lengkap($kebersihanruang_data_verif->nama_spv));
		$sheet->setCellValue("E".($row+3), 'Supervisor QC');

		$filename = "Kebersihan_Ruang_".$dt->format('d_m_Y').".xlsx";
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		exit;
	}

}

