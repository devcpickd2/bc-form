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

class Suhu extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('suhu_model');
		$this->load->model('pegawai_model');
		$this->load->helper(['url', 'form']);
		$this->load->library(['session']);
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'suhu' => $this->suhu_model->get_suhu_by_plant(),
			'active_nav' => 'suhu', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'suhu' => $this->suhu_model->get_by_uuid($uuid),
			'active_nav' => 'suhu');

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->suhu_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->suhu_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Ruang berhasil di simpan');
				redirect('suhu');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Ruang gagal di simpan');
				redirect('suhu');
			}
		}

		$data = array(
			'active_nav' => 'suhu');

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->suhu_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->suhu_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Ruang berhasil di Update');
				redirect('suhu');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Ruang gagal di Update');
				redirect('suhu');
			}
		}

		$data = array(
			'suhu' => $this->suhu_model->get_by_uuid($uuid),
			'active_nav' => 'suhu');

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('suhu');
		}

		$deleted = $this->suhu_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('suhu');
	}
	
	public function verifikasi()
	{
		$data = array(
			'suhu' => $this->suhu_model->get_suhu_by_plant(),
			'active_nav' => 'verifikasi-suhu', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->suhu_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->suhu_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Ruang berhasil di Update');
				redirect('suhu/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Ruang gagal di Update');
				redirect('suhu/verifikasi');
			}
		}

		$data = array(
			'suhu' => $this->suhu_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-suhu');

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'suhu' => $this->suhu_model->get_suhu_by_plant(),
			'active_nav' => 'diketahui-suhu', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->suhu_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->suhu_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Suhu Ruang berhasil di Update');
				redirect('suhu/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Suhu Ruang gagal di Update');
				redirect('suhu/diketahui');
			}
		}

		$data = array(
			'suhu' => $this->suhu_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-suhu');

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{

		$tanggal = $this->input->post('tanggal');
		$plant_id = $this->session->userdata('plant'); 

		if (empty($tanggal)) {
			show_error('Tanggal tidak boleh kosong', 404);
		}

		$user_uuid = $this->session->userdata('uuid');
		$this->load->model('pegawai_model');
		$plant_uuid = $this->pegawai_model->get_plant_uuid_by_user($user_uuid); 

		$this->load->model('suhu_model');
		$plant_uuid = $this->session->userdata('plant'); 

		$suhu_data = $this->suhu_model->get_by_date_and_plant_pdf($tanggal, $plant_uuid); 
		$suhu_data_verif = $this->suhu_model->get_by_date_verif_and_plant($tanggal, $plant_uuid); 

		$data['suhu'] = $suhu_data_verif;

		if (!$data['suhu']) {
			show_error('Data tidak ditemukan', 404);
		}


		$this->load->model('pegawai_model');
		$data['suhu']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['suhu']->username);
		$data['suhu']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['suhu']->nama_spv);
		$data['suhu']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['suhu']->nama_produksi);


		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 14, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 35);
		}

		$pdf->Ln(10);
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN SUHU RUANG', 0, 'C');
		$pdf->Ln(4);

		$datetime = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $datetime->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $datetime->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->Ln(6);

		$standar_cikande = [
			"Ruang Produksi" => ["suhu" => "25 - 35", "rh" => "65 - 80"],
			"Gudang Premix" => ["suhu" => "15 - 22", "rh" => "45 - 55"],
			"Gudang Raw Material" => ["suhu" => "25 - 35", "rh" => "60 - 75"],
			"Gudang Finish Good" => ["suhu" => "28 - 36", "rh" => "60 - 75"],
			"Proofing Room" => ["suhu" => "34 - 36", "rh" => "78 - 82"],
			"Aging Room 1" => ["suhu" => "35 - 45", "rh" => "50 - 70"],
			"Aging Room 2" => ["suhu" => "35 - 45", "rh" => "50 - 70"],
			"Ruang Produksi (Bubble)" => ["suhu" => "25 - 35", "rh" => "65 - 80"]
		];

		$standar_salatiga = [
			"Ruang Pengayakan" => "25 - 35",
			"Ruang RM" => "25 - 35",
			"Chiller 1" => "1 - 10",
			"Chiller 2" => "1 - 10",
			"Chiller 3" => "1 - 10",
			"Chiller 4" => "1 - 10",
			"Chiller 5" => "1 - 10",
			"Chiller 6" => "1 - 10",
			"Ruang Mixing" => "25 - 35",
			"Area Baking" => "25 - 35",
			"Area Cutting & Grinding" => "25 - 35",
			"Ruang Aging" => "25 - 35",
			"Area Packing" => "25 - 35"
		];

		$is_cikande = ($plant_id === '651ac623-5e48-44cc-b2f6-5d622603f53c');
		$lokasi_unik = array_unique(array_column($suhu_data, 'lokasi'));

		$col_suhu = 10; 
		$total_kolom_data = count($lokasi_unik) * ($is_cikande ? 2 : 1);
		$max_table_width = 195; 
		$col_pukul = max(15, $max_table_width - ($col_suhu * $total_kolom_data));

		$pdf->SetFont('times', '', 6.5);
		$baris_tinggi = 4;

		$pdf->Cell($col_pukul, $baris_tinggi * 2, 'Pukul', 1, 0, 'C');
		foreach ($lokasi_unik as $lokasi) {
			$span = $is_cikande ? 2 : 1;
			$label = strlen($lokasi) > 18 ? substr($lokasi, 0, 16) . '..' : $lokasi;
			$pdf->Cell($col_suhu * $span, $baris_tinggi, $label, 1, 0, 'C');
		}
		$pdf->Ln();

		$pdf->Cell($col_pukul, $baris_tinggi, '', 0, 0);
		foreach ($lokasi_unik as $lokasi) {
			$pdf->Cell($col_suhu, $baris_tinggi, 'Suhu', 1, 0, 'C');
			if ($is_cikande) {
				$pdf->Cell($col_suhu, $baris_tinggi, 'RH (%)', 1, 0, 'C');
			}
		}
		$pdf->Ln();

		$pdf->Cell($col_pukul, $baris_tinggi, 'STD', 1, 0, 'C');
		foreach ($lokasi_unik as $lokasi) {
			if ($is_cikande) {
				$pdf->Cell($col_suhu, $baris_tinggi, $standar_cikande[$lokasi]['suhu'] ?? '-', 1, 0, 'C');
				$pdf->Cell($col_suhu, $baris_tinggi, $standar_cikande[$lokasi]['rh'] ?? '-', 1, 0, 'C');
			} else {
				$pdf->Cell($col_suhu, $baris_tinggi, $standar_salatiga[$lokasi] ?? '-', 1, 0, 'C');
			}
		}
		$pdf->Ln();

		$grouped_by_time = [];
		foreach ($suhu_data as $item) {
			$jam = (new DateTime($item->pukul))->format('H:i');
			$grouped_by_time[$jam][$item->lokasi] = $item;
		}
		$grouped_by_time = array_slice($grouped_by_time, 0, 13, true);

		foreach ($grouped_by_time as $jam => $lokasi_data) {
			$pdf->Cell($col_pukul, $baris_tinggi, $jam, 1, 0, 'C');
			foreach ($lokasi_unik as $lokasi) {
				$suhu = $lokasi_data[$lokasi]->suhu ?? '-';
				$rh   = $lokasi_data[$lokasi]->rh ?? '-';
				$pdf->Cell($col_suhu, $baris_tinggi, $suhu, 1, 0, 'C');
				if ($is_cikande) {
					$pdf->Cell($col_suhu, $baris_tinggi, $rh, 1, 0, 'C');
				}
			}
			$pdf->Ln();
		}

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($suhu_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(8, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($suhu_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break;
			}
		}

		$pdf->SetFont('times', '', 8);
		$pdf->SetTextColor(0, 0, 0);

		if ($status_verifikasi) {
			$y_verifikasi = $y_after_keterangan;

			$pdf->SetXY(25, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(25, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 8); 
			$pdf->Cell(35, 5, $data['suhu']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($data['suhu']->status_produksi == 1 && !empty($data['suhu']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['suhu']->tgl_update_produksi))->format('d-m-Y | H:i');
				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['suhu']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
				$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(90, $y_verifikasi + 24);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			} else {
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['suhu']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['suhu']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
			$pdf->write2DBarcode($qr_text, 'QRCODE,L', 167, $y_verifikasi + 10, 15, 15, null, 'N');
			$pdf->SetXY(150, $y_verifikasi + 24);
			$pdf->Cell(49, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0); 
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(100, $y_after_keterangan);
			$pdf->Cell(80, 5, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		$filename = "Suhu Ruang_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}

	public function export_excel()
	{
		require_once(APPPATH . 'libraries/phpqrcode.php');
		$tanggal = $this->input->post('tanggal') ?: $this->input->get('tanggal');
		if (!$tanggal) {
			show_error('Tanggal tidak boleh kosong');
		}

		$this->load->model('suhu_model');
		$this->load->model('pegawai_model');

		$suhu_data = $this->suhu_model->get_by_date($tanggal);
		if (!$suhu_data) {
			show_error('Data tidak ditemukan');
		}

		$data['suhu'] = $suhu_data[0];
		$data['suhu']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['suhu']->username ?? '');
		$data['suhu']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['suhu']->nama_produksi ?? '');
		$data['suhu']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['suhu']->nama_spv ?? '');

		$pegawai_login = $this->pegawai_model->get_by_uuid($this->session->userdata('user_uuid'));
		$is_salatiga = ($pegawai_login->plant === '1eb341e0-1ec4-4484-ba8f-32d23352b84d');

		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$logo = new \PhpOffice\PhpSpreadsheet\Worksheet\Drawing();
			$logo->setName('Logo');
			$logo->setDescription('Logo');
			$logo->setPath($logo_path);
			$logo->setCoordinates('A1');
			$logo->setHeight(20);
			$logo->setOffsetX(5);
			$logo->setOffsetY(5);
			$logo->setWorksheet($sheet);
		}

		if ($is_salatiga) {
			$lokasi = [
				"Ruang Pengayakan", "Ruang RM", "Chiller 1", "Chiller 2", "Chiller 3",
				"Chiller 4", "Chiller 5", "Chiller 6", "Ruang Mixing", "Area Baking",
				"Area Cutting & Grinding", "Ruang Aging", "Area Packing"
			];
			$standar = [];
			foreach ($lokasi as $nama) {
				$standar[$nama] = ["25-35", ""]; 
				if (str_contains($nama, 'Chiller')) {
					$standar[$nama][0] = "0-4";
				} elseif ($nama == 'Ruang RM') {
					$standar[$nama][0] = "15-22";
				} elseif ($nama == 'Ruang Aging') {
					$standar[$nama][0] = "35-45";
				}
			}
		} else {
			$lokasi = [
				"Ruang Produksi", "Gudang Premix", "Gudang Raw Material", "Gudang Finish Good",
				"Proofing Room", "Aging Room 1", "Aging Room 2", "Ruang Produksi (Bubble)"
			];
			$standar = [
				"Ruang Produksi" => ["25-35", "65-80"],
				"Gudang Premix" => ["15-22", "45-55"],
				"Gudang Raw Material" => ["25-35", "60-75"],
				"Gudang Finish Good" => ["28-36", "60-75"],
				"Proofing Room" => ["34-36", "78-82"],
				"Aging Room 1" => ["35-45", "50-70"],
				"Aging Room 2" => ["35-45", "50-70"],
				"Ruang Produksi (Bubble)" => ["25-35", "65-80"]
			];
		}

		$judul = $is_salatiga ? 'PEMERIKSAAN SUHU RUANG - SALATIGA' : 'PEMERIKSAAN SUHU RUANG - CIKANDE';
		$sheet->mergeCells('C1:J1');
		$sheet->setCellValue('C1', $judul);
		$sheet->getStyle('C1')->getFont()->setBold(true)->setSize(14);
		$sheet->getStyle('C1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
		$sheet->setCellValue('C2', 'Hari/Tanggal : ' . date('d-m-Y', strtotime($tanggal)));
		$sheet->mergeCells('C2:J2');

		$sheet->setCellValue('A4', 'Pukul');
		$col = 2;
		foreach ($lokasi as $nama) {
			$colLetter = Coordinate::stringFromColumnIndex($col);
			$sheet->mergeCells("{$colLetter}4:" . Coordinate::stringFromColumnIndex($col + 1) . "4");
			$sheet->setCellValue("{$colLetter}4", $nama);
			$sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . '5', 'Suhu');
			$sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1) . '5', 'RH%');
			$col += 2;
		}
		$lastDataCol = $col - 1;

		$row = 6;
		$sheet->setCellValue("A{$row}", 'STD');
		$col = 2;
		foreach ($lokasi as $nama) {
			$sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . $row, $standar[$nama][0]);
			$sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1) . $row, $standar[$nama][1]);
			$col += 2;
		}

		$grouped = [];
		foreach ($suhu_data as $item) {
			$jam = date('H:i', strtotime($item->pukul));
			$grouped[$jam][$item->lokasi] = $item;
		}
		foreach ($grouped as $jam => $lokasi_data) {
			$row++;
			$sheet->setCellValue("A{$row}", $jam);
			$col = 2;
			foreach ($lokasi as $nama) {
				$isi = $lokasi_data[$nama] ?? null;
				$sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . $row, $isi->suhu ?? '');
				$sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1) . $row, $isi->rh ?? '');
				$col += 2;
			}
		}

		$row += 5;
		$startRowTTD = $row;
		$sheet->setCellValue("C{$row}", "Dibuat Oleh");
		$sheet->setCellValue("G{$row}", "Diketahui Oleh");
		$sheet->setCellValue("K{$row}", "Disetujui Oleh");

		$row += 4;
		$sheet->setCellValue("C{$row}", $data['suhu']->nama_lengkap_qc ?: '-');
		$sheet->setCellValue("C" . ($row + 1), "QC Inspector");
		$sheet->setCellValue("G{$row}", '');
		$sheet->setCellValue("G" . ($row + 1), "Foreman/Forelady Produksi");
		$sheet->setCellValue("K{$row}", '');
		$sheet->setCellValue("K" . ($row + 1), "Supervisor QC");

		$lastDataRow = $startRowTTD - 1;
		$sheet->getStyle("A4:" . Coordinate::stringFromColumnIndex($lastDataCol) . $lastDataRow)->applyFromArray([
			'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
			'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
		]);

		$qrPathSPV = FCPATH . 'assets/qr_spv.png';
		$qrTextSPV = "Diverifikasi secara digital oleh:\n" .
		($data['suhu']->nama_lengkap_spv ?: '-') .
		"\nSupervisor QC Bread Crumb\nTanggal: " . ($data['suhu']->tgl_update_spv ?? '-');
		QRcode::png($qrTextSPV, $qrPathSPV, QR_ECLEVEL_H, 4);
		$drawingSPV = new Drawing();
		$drawingSPV->setPath($qrPathSPV);
		$drawingSPV->setCoordinates("K" . ($startRowTTD + 1));
		$drawingSPV->setHeight(80);
		$drawingSPV->setWorksheet($sheet);

		$qrPathProd = FCPATH . 'assets/qr_produksi.png';
		$qrTextProd = "Diverifikasi secara digital oleh:\n" .
		($data['suhu']->nama_lengkap_produksi ?: '-') .
		"\nForeman/Forelady Produksi\nTanggal: " . ($data['suhu']->tgl_update_produksi ?? '-');
		QRcode::png($qrTextProd, $qrPathProd, QR_ECLEVEL_H, 4);
		$drawingProd = new Drawing();
		$drawingProd->setPath($qrPathProd);
		$drawingProd->setCoordinates("G" . ($startRowTTD + 1));
		$drawingProd->setHeight(80);
		$drawingProd->setWorksheet($sheet);

		$lokasi_excel = $is_salatiga ? 'Salatiga' : 'Cikande';
		$filename = 'Laporan_Suhu_Ruang_' . $lokasi_excel . '_' . date('d-m-Y', strtotime($tanggal)) . '.xlsx';
		ob_end_clean();
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header("Content-Disposition: attachment; filename=\"$filename\"");
		header('Cache-Control: max-age=0');

		$writer = new Xlsx($spreadsheet);
		$writer->save('php://output');
		exit;
	}

}

