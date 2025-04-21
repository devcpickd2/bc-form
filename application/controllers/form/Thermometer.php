<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Thermometer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('thermometer_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_all(),
			'active_nav' => 'thermometer', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->thermometer_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->thermometer_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Peneraan Thermometer berhasil di simpan');
				redirect('thermometer');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Peneraan Thermometer gagal di simpan');
				redirect('thermometer');
			}
		}

		$data = array(
			'active_nav' => 'thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->thermometer_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->thermometer_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Peneraan Thermometer berhasil di Update');
				redirect('thermometer');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Peneraan Thermometer gagal di Update');
				redirect('thermometer');
			}
		}

		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-edit', $data);
		$this->load->view('partials/footer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_all(),
			'active_nav' => 'verifikasi-thermometer', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->thermometer_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->thermometer_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Peneraan Thermometer berhasil di Update');
				redirect('thermometer/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Peneraan Thermometer gagal di Update');
				redirect('thermometer/verifikasi');
			}
		}

		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_all(),
			'active_nav' => 'diketahui-thermometer', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->thermometer_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->thermometer_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Peneraan Thermometer berhasil di Update');
				redirect('thermometer/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Peneraan Thermometer gagal di Update');
				redirect('thermometer/diketahui');
			}
		}

		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$thermometer_data = $this->thermometer_model->get_by_uuid_thermometer($selected_items);

		$thermometer_data_verif = $this->thermometer_model->get_by_uuid_thermometer_verif($selected_items);

		$data['thermometer'] = $thermometer_data_verif;


		if (!$data['thermometer']) {
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
		$pdf->MultiCell(0, 5, 'PENERAAN THERMOMETER', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');	
		$tanggal = $data['thermometer']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(15);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);

		$pdf->Cell(90, 12, 'Kode  Thermometer / Area', 1, 0, 'C');
		$pdf->Cell(30, 12, 'Standar', 1, 0, 'C');
		$pdf->Cell(80, 6, 'Peneraan', 1, 0, 'C');
		$pdf->Cell(70, 12, 'Tindakan Perbaikan', 1, 0, 'C');
		$pdf->Cell(50, 12, 'QC', 1, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$pdf->Cell(120, 12, '', 0, 0, 'C');
		$pdf->Cell(40, 6, 'Pukul', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Hasil', 1, 0, 'C');

		$pdf->Cell(120, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		foreach ($thermometer_data as $thermometer) {
			$pdf->SetFont('times', '', 10);
			$pdf->Cell(90, 8, $thermometer->kode_thermo . ' / '. $thermometer->area, 1, 0, 'C');
			$pdf->Cell(30, 8, "0.0", 1, 0, 'C');
			$pdf->Cell(40, 8, $thermometer->peneraan_waktu, 1, 0, 'C');
			$pdf->Cell(40, 8, $thermometer->peneraan_hasil, 1, 0, 'C');
			$pdf->Cell(70, 8, !empty($thermometer->tindakan_perbaikan) ? $thermometer->tindakan_perbaikan : '-', 1, 0, 'C');
			$pdf->Cell(50, 8, $thermometer->username, 1, 0, 'C');
			$pdf->Ln();
		}

		$nama_spv = $data['thermometer']->nama_spv;
		$tanggal_update = $data['thermometer']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($thermometer_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetFont('times', 'I', 8);
		$pdf->SetXY(328, 158); 
		$pdf->Cell(5, 3, 'QB 05/00', 0, 1, 'R'); 
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
		$filename = "Peneraan Thermometer_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

