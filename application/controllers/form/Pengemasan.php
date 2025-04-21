<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Pengemasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('pengemasan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'pengemasan' => $this->pengemasan_model->get_all(),
			'active_nav' => 'pengemasan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'pengemasan' => $this->pengemasan_model->get_by_uuid($uuid),
			'active_nav' => 'pengemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->pengemasan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->pengemasan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Proses Pengemasan berhasil di simpan');
				redirect('pengemasan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Proses Pengemasan gagal di simpan');
				redirect('pengemasan');
			}
		}

		$data = array(
			'active_nav' => 'pengemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->pengemasan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->pengemasan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Proses Pengemasan berhasil di Update');
				redirect('pengemasan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Proses Pengemasan gagal di Update');
				redirect('pengemasan');
			}
		}

		$data = array(
			'pengemasan' => $this->pengemasan_model->get_by_uuid($uuid),
			'active_nav' => 'pengemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-edit', $data);
		$this->load->view('partials/footer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'pengemasan' => $this->pengemasan_model->get_all(),
			'active_nav' => 'verifikasi-pengemasan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->pengemasan_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->pengemasan_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Proses Pengemasan berhasil di Update');
				redirect('pengemasan/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Proses Pengemasan gagal di Update');
				redirect('pengemasan/verifikasi');
			}
		}

		$data = array(
			'pengemasan' => $this->pengemasan_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-pengemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'pengemasan' => $this->pengemasan_model->get_all(),
			'active_nav' => 'diketahui-pengemasan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->pengemasan_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->pengemasan_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Proses Pengemasan berhasil di Update');
				redirect('pengemasan/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Proses Pengemasan gagal di Update');
				redirect('pengemasan/diketahui');
			}
		}

		$data = array(
			'pengemasan' => $this->pengemasan_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-pengemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengemasan/pengemasan-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$pengemasan_data = $this->pengemasan_model->get_by_uuid_pengemasan($selected_items);

		$pengemasan_data_verif = $this->pengemasan_model->get_by_uuid_pengemasan_verif($selected_items);

		$data['pengemasan'] = $pengemasan_data_verif;


		if (!$data['pengemasan']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(17, 16, 15); 
		$pdf->AddPage('L', 'LEGAL');
		$pdf->SetFont('times', 'B', 13);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 17, 14, 38);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(9, "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN PROSES PENGEMASAN', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['pengemasan']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(15);
		$pdf->Write(0, 'Hari / Tanggal : ' . $formatted_date);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);

		$pdf->Cell(10, 12, 'No.', 1, 0, 'C');
		$pdf->Cell(80, 12, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(60, 12, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(40, 12, 'Best Before', 1, 0, 'C');
		$pdf->Cell(40, 12, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(60, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(30, 12, 'QC', 1, 1, 'C');

		foreach ($pengemasan_data as $pengemasan) {
			// $bb = $pengemasan->best_before;
			// $best_before = new DateTime($bb);
			// $formatted_bb = strftime('%d %B %Y', $best_before->getTimestamp());
			// $pdf->SetFont('times', '', 10);
			// $pdf->Cell(80, 8, $pengemasan->nama_produk, 1, 0, 'C');
			// $pdf->Cell(60, 8, $pengemasan->kode_produksi, 1, 0, 'C');
			// $pdf->Cell(40, 8, $formatted_bb, 1, 0, 'C');
			// $pdf->Cell(40, 8, $pengemasan->jumlah, 1, 0, 'C');
			// $pdf->Cell(60, 8, !empty($pengemasan->keterangan) ? $pengemasan->keterangan : '-', 1, 0, 'C');
			// $pdf->Cell(30, 8, $pengemasan->username, 1, 0, 'C');
			// $pdf->Ln();
		}

		$nama_spv = $data['pengemasan']->nama_spv;
		$tanggal_update = $data['pengemasan']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($pengemasan_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetFont('times', 'I', 8);
		$pdf->SetXY(328, 158); 
		$pdf->Cell(5, 3, 'QB 22/00', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 9);

		if ($status_verifikasi) {
			$url = 'Diverifikasi secara digital oleh,' . "\n" . $nama_spv . "\n" . 'SPV QC Bread Crumb' . "\n" . $update_tanggal;

			$pdf->SetFont('times', '', 9);
			$pdf->SetXY(260, 165); 
			$pdf->Cell(60, 4, 'Disetujui oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($url, 'QRCODE,L', 281, 169, 18, 18, null, 'N'); 
			$pdf->SetXY(260, 187); 
			$pdf->Cell(60, 4, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetFont('times', '', 9);
			$pdf->SetXY(265, 175); 
			$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		$filename = "Data Release Packing_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

