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
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Ruang berhasil disimpan');
				redirect('suhu');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Ruang gagal disimpan');
				redirect('suhu');
			}
		}

    // Ambil UUID plant dari session
		$plant_uuid = $this->session->userdata('plant');

    // Pemetaan UUID → nama plant
		$plant_map = [
			'651ac623-5e48-44cc-b2f6-5d622603f53c' => 'Cikande',
			'1eb341e0-1ec4-4484-ba8f-32d23352b84d' => 'Salatiga'
		];

    // Ambil nama plant berdasarkan UUID, default ke 'Unknown' jika tidak ditemukan
		$plant_name = isset($plant_map[$plant_uuid]) ? $plant_map[$plant_uuid] : 'Unknown';

		$data = array(
			'active_nav' => 'suhu',
			'plant' => $plant_name
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/suhu/suhu-tambah', $data);
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

		$data['suhu']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['suhu']->username);
		$data['suhu']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['suhu']->nama_spv);
		$data['suhu']->nama_lengkap_produksi = $data['suhu']->nama_produksi;

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
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

		$is_cikande = ($plant_id === '651ac623-5e48-44cc-b2f6-5d622603f53c');
		$lokasi_unik = [];
		foreach ($suhu_data as $item) {
			$lokasi_array = json_decode($item->lokasi, true);
			foreach ($lokasi_array as $lok) {
				$lokasi_unik[] = $lok['nama_lokasi'];
			}
		}
		$lokasi_unik = array_unique($lokasi_unik);

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

		$grouped_by_time = [];
		foreach ($suhu_data as $item) {
			$jam = (new DateTime($item->pukul))->format('H:i');
			$lokasi_array = json_decode($item->lokasi, true);
			foreach ($lokasi_array as $lok) {
				$grouped_by_time[$jam][$lok['nama_lokasi']] = [
					'suhu' => $lok['suhu'] ?? '-',
					'rh' => $lok['rh'] ?? ''
				];
			}
		}

		ksort($grouped_by_time);
		foreach ($grouped_by_time as $jam => $lokasi_data) {
			$pdf->Cell($col_pukul, $baris_tinggi, $jam, 1, 0, 'C');
			foreach ($lokasi_unik as $lokasi) {
				$suhu = $lokasi_data[$lokasi]['suhu'] ?? '-';
				$rh = $lokasi_data[$lokasi]['rh'] ?? '-';
				$pdf->Cell($col_suhu, $baris_tinggi, $suhu, 1, 0, 'C');
				if ($is_cikande) {
					$pdf->Cell($col_suhu, $baris_tinggi, $rh !== '' ? $rh : '-', 1, 0, 'C');
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
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->SetFont('times', 'U', 8);
				$pdf->Cell(35, 5, $data['suhu']->nama_produksi, 0, 0, 'C');
				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 14);
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

		$plant_uuid = $this->session->userdata('plant');
		$suhu_data = $this->suhu_model->get_by_date_and_plant_pdf($tanggal, $plant_uuid);

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

		$judul = $is_salatiga ? 'PEMERIKSAAN SUHU RUANG - SALATIGA' : 'PEMERIKSAAN SUHU RUANG - CIKANDE';
		$lokasi = $is_salatiga
		? ["Ruang Pengayakan", "Ruang RM", "Chiller 1", "Chiller 2", "Chiller 3", "Chiller 4", "Chiller 5", "Chiller 6", "Ruang Mixing", "Area Baking", "Area Cutting & Grinding", "Ruang Aging", "Area Packing"]
		: ["Ruang Produksi", "Gudang Premix", "Gudang Raw Material", "Gudang Finish Good", "Proofing Room", "Aging Room 1", "Aging Room 2", "Ruang Produksi (Bubble)"];

		$standar = [];
		foreach ($lokasi as $nama) {
			$standar[$nama] = ["", ""];
			if ($is_salatiga) {
				if (str_contains($nama, 'Chiller')) {
					$standar[$nama] = ["0-4", ""];
				} elseif ($nama == 'Ruang RM') {
					$standar[$nama] = ["15-22", ""];
				} elseif ($nama == 'Ruang Aging') {
					$standar[$nama] = ["35-45", ""];
				} else {
					$standar[$nama] = ["25-35", ""];
				}
			} else {
				$default = [
					"Ruang Produksi" => ["25-35", "65-80"],
					"Gudang Premix" => ["15-22", "45-55"],
					"Gudang Raw Material" => ["25-35", "60-75"],
					"Gudang Finish Good" => ["28-36", "60-75"],
					"Proofing Room" => ["34-36", "78-82"],
					"Aging Room 1" => ["35-45", "50-70"],
					"Aging Room 2" => ["35-45", "50-70"],
					"Ruang Produksi (Bubble)" => ["25-35", "65-80"]
				];
				$standar[$nama] = $default[$nama] ?? ["", ""];
			}
		}

		$sheet->mergeCells('A1:Z1');
		$sheet->setCellValue('A1', $judul);
		$sheet->getStyle('A1')->getFont()->setBold(true)->setSize(14)->getColor()->setRGB('000000');
		$sheet->getStyle('A1')->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);

		$sheet->mergeCells('A2:Z2');
		$sheet->setCellValue('A2', 'Tanggal: ' . date('d-m-Y', strtotime($tanggal)));

	// Header Lokasi
		$sheet->setCellValue('A4', 'Pukul');
		$col = 2;
		foreach ($lokasi as $nama) {
			$colLetter = Coordinate::stringFromColumnIndex($col);
			$nextColLetter = Coordinate::stringFromColumnIndex($col + 1);
			$sheet->mergeCells("{$colLetter}4:{$nextColLetter}4");
			$sheet->setCellValue("{$colLetter}4", $nama);
			$sheet->setCellValue("{$colLetter}5", 'Suhu');
			$sheet->setCellValue("{$nextColLetter}5", 'RH%');
			$col += 2;
		}

	// Baris STD
		$sheet->setCellValue('A6', 'STD');
		$col = 2;
		foreach ($lokasi as $nama) {
			$sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . '6', $standar[$nama][0]);
			$sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1) . '6', $standar[$nama][1]);
			$col += 2;
		}

	// Data suhu per jam
		$grouped = [];
		foreach ($suhu_data as $item) {
			$jam = date('H:i', strtotime($item->pukul));
			$lokasi_array = json_decode($item->lokasi, true);
			foreach ($lokasi_array as $lok) {
				$grouped[$jam][$lok['nama_lokasi']] = (object)[
					'suhu' => $lok['suhu'] ?? '',
					'rh' => $lok['rh'] ?? ''
				];
			}
		}

		ksort($grouped); 
		$row = 7;
		foreach ($grouped as $jam => $lokasi_data) {
			$sheet->setCellValue("A{$row}", $jam);
			$col = 2;
			foreach ($lokasi as $nama) {
				$isi = $lokasi_data[$nama] ?? null;
				$sheet->setCellValue(Coordinate::stringFromColumnIndex($col) . $row, $isi->suhu ?? '');
				$sheet->setCellValue(Coordinate::stringFromColumnIndex($col + 1) . $row, $isi->rh ?? '');
				$col += 2;
			}
			$row++;
		}

	// Tanda tangan
		$row += 3;
		$sheet->setCellValue("C{$row}", "Dibuat Oleh");
		$sheet->setCellValue("G{$row}", "Diketahui Oleh");
		$sheet->setCellValue("K{$row}", "Disetujui Oleh");

		$row += 4;
		$sheet->setCellValue("C{$row}", $data['suhu']->nama_lengkap_qc ?: '-');
		$sheet->setCellValue("C" . ($row + 1), "QC Inspector");
		$sheet->setCellValue("G{$row}", $data['suhu']->nama_lengkap_produksi ?: '-');
		$sheet->setCellValue("G" . ($row + 1), "Foreman/Forelady Produksi");
		$sheet->setCellValue("K{$row}", $data['suhu']->nama_lengkap_spv ?: '-');
		$sheet->setCellValue("K" . ($row + 1), "Supervisor QC");

	// QR SPV
		$qrTextSPV = "Diverifikasi secara digital oleh:\n" .
		($data['suhu']->nama_lengkap_spv ?: '-') .
		"\nSupervisor QC Bread Crumb\nTanggal: " . ($data['suhu']->tgl_update_spv ?? '-');
		$qrPathSPV = FCPATH . 'assets/qr_spv.png';
		QRcode::png($qrTextSPV, $qrPathSPV, QR_ECLEVEL_H, 4);
		$drawingSPV = new Drawing();
		$drawingSPV->setPath($qrPathSPV);
		$drawingSPV->setCoordinates("K" . ($row - 3));
		$drawingSPV->setHeight(80);
		$drawingSPV->setWorksheet($sheet);

	// Border & style
		$lastDataCol = Coordinate::stringFromColumnIndex($col - 1);
		$lastDataRow = $row - 6;
		$sheet->getStyle("A4:{$lastDataCol}{$lastDataRow}")->applyFromArray([
			'borders' => ['allBorders' => ['borderStyle' => Border::BORDER_THIN]],
			'alignment' => ['horizontal' => Alignment::HORIZONTAL_CENTER, 'vertical' => Alignment::VERTICAL_CENTER]
		]);

	// Output Excel
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

