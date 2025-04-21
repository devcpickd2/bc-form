<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Metal extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('metal_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'metal' => $this->metal_model->get_all(),
			'active_nav' => 'metal', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'metal' => $this->metal_model->get_by_uuid($uuid),
			'active_nav' => 'metal');

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->metal_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->metal_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Metal Detector berhasil di simpan');
				redirect('metal');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Metal Detector gagal di simpan');
				redirect('metal');
			}
		}

		$data = array(
			'active_nav' => 'metal');

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->metal_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->metal_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Metal Detector berhasil di Update');
				redirect('metal');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Metal Detector gagal di Update');
				redirect('metal');
			}
		}

		$data = array(
			'metal' => $this->metal_model->get_by_uuid($uuid),
			'active_nav' => 'metal');

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-edit', $data);
		$this->load->view('partials/footer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'metal' => $this->metal_model->get_all(),
			'active_nav' => 'verifikasi-metal', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->metal_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->metal_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Metal Detector berhasil di Update');
				redirect('metal/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Metal Detector gagal di Update');
				redirect('metal/verifikasi');
			}
		}

		$data = array(
			'metal' => $this->metal_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-metal');

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'metal' => $this->metal_model->get_all(),
			'active_nav' => 'diketahui-metal', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->metal_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->metal_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Metal Detector berhasil di Update');
				redirect('metal/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Metal Detector gagal di Update');
				redirect('metal/diketahui');
			}
		}

		$data = array(
			'metal' => $this->metal_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-metal');

		$this->load->view('partials/head', $data);
		$this->load->view('form/metal/metal-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$metal_data = $this->metal_model->get_by_uuid_metal($selected_items);

		$metal_data_verif = $this->metal_model->get_by_uuid_metal_verif($selected_items);

		$data['metal'] = $metal_data_verif;


		if (!$data['metal']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 9.5, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 10);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 30);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN METAL DETECTOR', 0, 'C');
		$pdf->Ln(3);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['metal']->date_metal;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 7);
		$pdf->SetX(10);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['metal']->shift);
		$pdf->Ln(4);

		$pdf->SetFont('times', '', 7);

		$pdf->Cell(14, 12, 'Pukul', 1, 0, 'C');
		$pdf->Cell(55, 12, 'Produk / Kode Produksi', 1, 0, 'C');
		$pdf->Cell(15, 12, 'No. Program', 1, 0, 'C');
		$pdf->Cell(46, 4, 'STD. Spesimen', 1, 0, 'C');
		$pdf->Cell(28, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(32, 4, 'Paraf', 1, 1, 'C');

		$pdf->Cell(84, 4, '', 0, 0, 'L');
		$pdf->Cell(14, 4, 'Fe (mm)', 1, 0, 'C');
		$pdf->Cell(16, 4, 'Non FE (mm)', 1, 0, 'C');
		$pdf->Cell(16, 4, 'SUS 304 (mm)', 1, 0, 'C');
		$pdf->Cell(28, 4, '', 0, 0, 'C');
		$pdf->Cell(16, 8, 'QC', 1, 0, 'C');
		$pdf->Cell(16, 8, 'Prod', 1, 0, 'C');
		$pdf->Cell(16, 4, '', 0, 1, 'C');

		$pdf->Cell(84, 4, '', 0, 0, 'L');
		$pdf->Cell(14, 4, '2.5', 1, 0, 'C');
		$pdf->Cell(16, 4, '3.0', 1, 0, 'C');
		$pdf->Cell(16, 4, '3.0', 1, 0, 'C');
		$pdf->Cell(28, 4, '', 0, 0, 'C');
		$pdf->Cell(16, 0, '', 0, 0, 'C');
		$pdf->Cell(16, 4, '', 0, 1, 'C');

		foreach ($metal_data as $metal) {
			$formattedTime = date('H:i', strtotime($metal->time));

			$pdf->Cell(14, 5, $formattedTime, 1, 0, 'C');
			$pdf->Cell(55, 5, $metal->nama_produk.' - '. $metal->kode_produksi, 1, 0, 'L');
			$pdf->Cell(15, 5, $metal->no_program, 1, 0, 'C');

			$pdf->SetFont('dejavusans', '', 8);	
			$pdf->Cell(14, 5, ($metal->std_fe == 'lolos') ? '✔' : '✘', 1, 0, 'C');
			$pdf->Cell(16, 5, ($metal->std_nonfe == 'lolos') ? '✔' : '✘', 1, 0, 'C');
			$pdf->Cell(16, 5, ($metal->std_sus304 == 'lolos') ? '✔' : '✘', 1, 0, 'C');
			$pdf->SetFont('times', '', 7);
			$pdf->Cell(28, 5, !empty($metal->keterangan) ? $metal->keterangan : '-', 1, 0, 'C');
			$pdf->Cell(16, 5, $metal->username_1, 1, 0, 'C');
			$pdf->Cell(16, 5, $metal->nama_produksi_metal, 1, 0, 'C');
			$pdf->Ln();
		}

		$pdf->SetFont('dejavusans', '', 6);
		$pdf->SetXY(10, 250); 
		$pdf->Cell(5, 3, 'Keterangan: ', 0, 1, 'L');
		$pdf->Cell(5, 3, '✔ : Ok', 0, 1, 'L');
		$pdf->Cell(5, 3, '✘ : Tdk Ok', 0, 1, 'L'); 

		$pdf->SetFont('times', 'I', 7);
		$pdf->SetXY(190, 248); 
		$pdf->Cell(5, 3, 'QB 07/04', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 7);
		$pdf->SetXY(10, 260); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($metal_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(12, 0, '', 0, 0, 'L'); 
				$pdf->Cell(12, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}
		$pdf->SetXY(13, 275); 
		$pdf->Cell(60, 5, 'Diperiksa Oleh : '. $data['metal']->username_1, 0, 0, 'C');

		$nama_spv = $data['metal']->nama_spv_metal; 
		$tanggal_update = $data['metal']->tgl_update_spv_metal;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($metal_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		if ($status_verifikasi) {

			$url = 'Diverifikasi secara digital oleh,' . "\n" . $nama_spv . "\n" . 'SPV QC Bread Crumb' . "\n" . $update_tanggal;
			$pdf->SetFont('times', '', 7);
			$pdf->SetXY(150, 275); 
			$pdf->Cell(60, 5, 'Disetujui oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($url, 'QRCODE,L', 172, 280, 16, 16, null, 'N'); 
			$pdf->SetXY(150, 295); 
			$pdf->Cell(60, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0); 
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(150, 275); 
			$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		// $pdf->Output("metal.pdf", 'I');

		$filename = "Metal Detector_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

