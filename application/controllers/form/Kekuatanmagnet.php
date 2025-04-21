<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Kekuatanmagnet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('kekuatanmagnet_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_all(),
			'active_nav' => 'kekuatanmagnet', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_by_uuid($uuid),
			'active_nav' => 'kekuatanmagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->kekuatanmagnet_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->kekuatanmagnet_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Kekuatan Magnet Trap berhasil di simpan');
				redirect('kekuatanmagnet');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Kekuatan Magnet Trap gagal di simpan');
				redirect('kekuatanmagnet');
			}
		}

		$data = array(
			'active_nav' => 'kekuatanmagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->kekuatanmagnet_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->kekuatanmagnet_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Kekuatan Magnet Trap berhasil di Update');
				redirect('kekuatanmagnet');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Kekuatan Magnet Trap gagal di Update');
				redirect('kekuatanmagnet');
			}
		}

		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_by_uuid($uuid),
			'active_nav' => 'kekuatanmagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-edit', $data);
		$this->load->view('partials/footer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_all(),
			'active_nav' => 'verifikasi-kekuatanmagnet', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->kekuatanmagnet_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->kekuatanmagnet_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Kekuatan Magnet Trap berhasil di Update');
				redirect('kekuatanmagnet/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Kekuatan Magnet Trap gagal di Update');
				redirect('kekuatanmagnet/verifikasi');
			}
		}

		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-kekuatanmagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_all(),
			'active_nav' => 'diketahui-kekuatanmagnet', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->kekuatanmagnet_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->kekuatanmagnet_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Kekuatan Magnet Trap berhasil di Update');
				redirect('kekuatanmagnet/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Kekuatan Magnet Trap gagal di Update');
				redirect('kekuatanmagnet/diketahui');
			}
		}

		$data = array(
			'kekuatanmagnet' => $this->kekuatanmagnet_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-kekuatanmagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kekuatanmagnet/kekuatanmagnet-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$kekuatanmagnet_data = $this->kekuatanmagnet_model->get_by_uuid_kekuatanmagnet($selected_items);

		$kekuatanmagnet_data_verif = $this->kekuatanmagnet_model->get_by_uuid_kekuatanmagnet_verif($selected_items);

		$data['kekuatanmagnet'] = $kekuatanmagnet_data_verif;


		if (!$data['kekuatanmagnet']) {
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
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN KEKUATAN MAGNET TRAP', 0, 'C');
		$pdf->Ln(4);

		$pdf->SetFont('times', '', 8);

		$pdf->Cell(30, 12, 'Hari/Tanggal', 1, 0, 'C');
		$pdf->Cell(51, 12, 'Nama Alat', 1, 0, 'C');
		$pdf->Cell(35, 12, 'Nilai Pengukuran (Gauss)', 1, 0, 'C');
		$pdf->Cell(40, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(38, 6, 'Paraf', 1, 1, 'C');

		$pdf->Cell(156, 12, '', 0, 0, 'L');
		$pdf->Cell(19, 6, 'QC', 1, 0, 'C');
		$pdf->Cell(19, 6, 'Prod', 1, 1, 'C');

		foreach ($kekuatanmagnet_data as $kekuatanmagnet) {
			setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
			$tanggal = $kekuatanmagnet->date;
			$date = new DateTime($tanggal);
			$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
			$pdf->SetFont('times', '', 7);
			$pdf->Cell(30, 6, $formatted_date, 1, 0, 'C');
			$pdf->Cell(51, 6, $kekuatanmagnet->nama_alat, 1, 0, 'C');
			$pdf->Cell(35, 6, $kekuatanmagnet->nilai, 1, 0, 'C');
			$pdf->Cell(40, 6, !empty($kekuatanmagnet->keterangan) ? $kekuatanmagnet->keterangan : '-', 1, 0, 'C');
			$pdf->Cell(19, 6, $kekuatanmagnet->username, 1, 0, 'C');
			$pdf->Cell(19, 6, $kekuatanmagnet->nama_produksi, 1, 0, 'C');
			$pdf->Ln();
		}

		$nama_spv = $data['kekuatanmagnet']->nama_spv;
		$tanggal_update = $data['kekuatanmagnet']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($kekuatanmagnet_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetFont('times', 'I', 7);
		$pdf->SetXY(190, 258); 
		$pdf->Cell(5, 3, 'QB 20/00', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 8);
		$pdf->SetXY(15, 260); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($kekuatanmagnet_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(12, 0, '', 0, 0, 'L'); 
				$pdf->Cell(12, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		if ($status_verifikasi) {
			$url = 'Diverifikasi secara digital oleh,' . "\n" . $nama_spv . "\n" . 'SPV QC Bread Crumb' . "\n" . $update_tanggal;

			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(150, 280); 
			$pdf->Cell(60, 4, 'Disetujui oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($url, 'QRCODE,L', 171, 285, 18, 18, null, 'N'); 
			$pdf->SetXY(150, 304); 
			$pdf->Cell(60, 4, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(150, 280); 
			$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		// $pdf->Output("Pemeriksaan Magnet Trap.pdf", 'I');

		$currentDate = date('d-m-Y');
		$filename = "Pemeriksaan Magnet Trap_{$currentDate}.pdf";
		$pdf->Output($filename, 'I');
	}
}

