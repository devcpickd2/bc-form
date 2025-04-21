<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Verifikasimagnet extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('verifikasimagnet_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_all(),
			'active_nav' => 'verifikasimagnet', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasimagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->verifikasimagnet_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->verifikasimagnet_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Magnet Trap berhasil di simpan');
				redirect('verifikasimagnet');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Magnet Trap gagal di simpan');
				redirect('verifikasimagnet');
			}
		}

		$data = array(
			'active_nav' => 'verifikasimagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->verifikasimagnet_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->verifikasimagnet_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Magnet Trap berhasil di Update');
				redirect('verifikasimagnet');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Magnet Trap gagal di Update');
				redirect('verifikasimagnet');
			}
		}

		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasimagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-edit', $data);
		$this->load->view('partials/footer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_all(),
			'active_nav' => 'verifikasi-verifikasimagnet', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->verifikasimagnet_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->verifikasimagnet_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Magnet Trap berhasil di Update');
				redirect('verifikasimagnet/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Magnet Trap gagal di Update');
				redirect('verifikasimagnet/verifikasi');
			}
		}

		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-verifikasimagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_all(),
			'active_nav' => 'diketahui-verifikasimagnet', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->verifikasimagnet_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->verifikasimagnet_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Verifikasi Magnet Trap berhasil di Update');
				redirect('verifikasimagnet/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Verifikasi Magnet Trap gagal di Update');
				redirect('verifikasimagnet/diketahui');
			}
		}

		$data = array(
			'verifikasimagnet' => $this->verifikasimagnet_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-verifikasimagnet');

		$this->load->view('partials/head', $data);
		$this->load->view('form/verifikasimagnet/verifikasimagnet-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$verifikasimagnet_data = $this->verifikasimagnet_model->get_by_uuid_verifikasimagnet($selected_items);

		$verifikasimagnet_data_verif = $this->verifikasimagnet_model->get_by_uuid_verifikasimagnet_verif($selected_items);

		$data['verifikasimagnet'] = $verifikasimagnet_data_verif;


		if (!$data['verifikasimagnet']) {
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
		$pdf->MultiCell(0, 5, 'VERIFIKASI MAGNET TRAP', 0, 'C');
		$pdf->Ln(4);

		// $tanggal = $data['verifikasimagnet']->date;
		// $date = new DateTime($tanggal);
		// $formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 9);

		$pdf->Cell(32, 12, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(10, 12, 'Shift', 1, 0, 'C');
		$pdf->Cell(30, 12, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(35, 12, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(38, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(36, 6, 'Paraf', 1, 1, 'C');

		$pdf->Cell(107, 12, '', 0, 0, 'C');
		$pdf->Cell(15, 6, 'Temuan', 0, 0, 'C');
		$pdf->Cell(38, 12, '', 0, 0, 'L');
		$pdf->Cell(18, 6, 'QC', 1, 0, 'C');
		$pdf->Cell(18, 6, 'Prod', 1, 1, 'C');

		foreach ($verifikasimagnet_data as $verifikasimagnet) {
			setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
			$tanggal = $verifikasimagnet->date;
			$date = new DateTime($tanggal);
			$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
			$pdf->SetFont('times', '', 8);
			
			$pdf->Cell(32, 6, $formatted_date, 1, 0, 'C');
			$pdf->Cell(10, 6, $verifikasimagnet->shift, 1, 0, 'C');
			$pdf->Cell(30, 6, $verifikasimagnet->nama_produk, 1, 0, 'C');
			$pdf->Cell(35, 6, $verifikasimagnet->kode_produksi, 1, 0, 'C');
			$pdf->Cell(15, 6, $verifikasimagnet->jumlah_temuan, 1, 0, 'C');
			$pdf->Cell(38, 6, !empty($verifikasimagnet->keterangan) ? $verifikasimagnet->keterangan : '-', 1, 0, 'C');
			$pdf->Cell(18, 6, $verifikasimagnet->username, 1, 0, 'C');
			$pdf->Cell(18, 6, $verifikasimagnet->nama_produksi, 1, 0, 'C');
			$pdf->Ln();
		}

		$nama_spv = $data['verifikasimagnet']->nama_spv;
		$tanggal_update = $data['verifikasimagnet']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($verifikasimagnet_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetFont('times', 'I', 7);
		$pdf->SetXY(190, 258); 
		$pdf->Cell(5, 3, 'QB 19/00', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 8);
		$pdf->SetXY(15, 260); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($verifikasimagnet_data as $item) {
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
		// $pdf->Output("Verifikasi Magnet Trap.pdf", 'I');

		$currentDate = date('d-m-Y');
		$filename = "Verifikasi Magnet Trap_{$currentDate}.pdf";
		$pdf->Output($filename, 'I');
	}
}

