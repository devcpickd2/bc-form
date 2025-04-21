<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Falserejection extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('falserejection_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'falserejection' => $this->falserejection_model->get_all(),
			'active_nav' => 'falserejection', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'falserejection' => $this->falserejection_model->get_by_uuid($uuid),
			'active_nav' => 'falserejection');

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection-detail', $data);
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$rules = $this->falserejection_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->falserejection_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data False Rejection berhasil di Update');
				redirect('falserejection');
			}else {
				$this->session->set_flashdata('error_msg', 'Data False Rejection gagal di Update');
				redirect('falserejection');
			}
		}

		$data = array(
			'falserejection' => $this->falserejection_model->get_by_uuid($uuid),
			'active_nav' => 'falserejection');

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection-edit', $data);
		$this->load->view('partials/footer');
	}

	public function verifikasi()
	{
		$data = array(
			'falserejection' => $this->falserejection_model->get_all(),
			'active_nav' => 'verifikasi-falserejection', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->falserejection_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->falserejection_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data False Rejection berhasil di Update');
				redirect('falserejection/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data False Rejection gagal di Update');
				redirect('falserejection/verifikasi');
			}
		}

		$data = array(
			'falserejection' => $this->falserejection_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-falserejection');

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'falserejection' => $this->falserejection_model->get_all(),
			'active_nav' => 'diketahui-falserejection', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->falserejection_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->falserejection_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status False Rejection berhasil di Update');
				redirect('falserejection/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status False Rejection gagal di Update');
				redirect('falserejection/diketahui');
			}
		}

		$data = array(
			'falserejection' => $this->falserejection_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-falserejection');

		$this->load->view('partials/head', $data);
		$this->load->view('form/falserejection/falserejection-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$falserejection_data = $this->falserejection_model->get_by_uuid_falserejection($selected_items);

		$falserejection_data_verif = $this->falserejection_model->get_by_uuid_falserejection_verif($selected_items);

		$data['falserejection'] = $falserejection_data_verif;


		if (!$data['falserejection']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		$pdf = new TCPDF('L', PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 9.5, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 30);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'MONITORING FALSE REJECTION', 0, 'C');
		$pdf->Ln(3);

		$pdf->SetFont('times', 'B', 10);
		$pdf->SetX(10);
		$pdf->Write(0, 'Mesin: ' . (!empty($data['metal']->no_mesin) ? $data['metal']->no_mesin : ' - '));
		$pdf->Ln(5);

		$pdf->SetFont('times', 'B', 10);

		$pdf->Cell(25, 12, 'Tanggal / Shift', 1, 0, 'C');
		$pdf->Cell(55, 12, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(45, 12, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(37, 12, 'Jumlah Pack/Bag', 1, 0, 'C');
		$pdf->Cell(37, 12, 'Jumlah Pack/Bag yang', 1, 0, 'C');
		$pdf->Cell(37, 12, 'Jenis Kontaminan', 1, 0, 'C');
		$pdf->Cell(37, 12, 'Posisi Kontaminan', 1, 0, 'C');
		$pdf->Cell(37, 12, 'False Rejection', 1, 0, 'C');
		$pdf->Cell(25, 12, 'Paraf QC', 1, 0, 'C');
		$pdf->Cell(25, 6, '', 0, 1, 'C');

		$pdf->Cell(25, 6, '', 0, 0, 'C');
		$pdf->Cell(55, 6, '', 0, 0, 'C');
		$pdf->Cell(45, 6, '', 0, 0, 'C');
		$pdf->Cell(37, 7, 'yang Tidak Lolos', 0, 0, 'C');
		$pdf->Cell(37, 7, 'Terdapat Kontaminan', 0, 0, 'C');
		$pdf->Cell(37, 6, '', 0, 0, 'C');
		$pdf->Cell(37, 6, '', 0, 0, 'C');
		$pdf->Cell(37, 0, '', 0, 0, 'C');
		$pdf->Cell(25, 6, '', 0, 1, 'C');

		$pdf->SetFont('times', '', 10);
		foreach ($falserejection_data as $falserejection) {
			$dateFormatted = date('d-m-Y', strtotime($falserejection->date_false_rejection));
			$pdf->Cell(25, 6, $dateFormatted.' / '.$falserejection->shift_monitoring, 1, 0, 'C');

			$pdf->Cell(55, 6, $falserejection->nama_produk, 1, 0, 'C');
			$pdf->Cell(45, 6, $falserejection->kode_produksi, 1, 0, 'C');
			$pdf->Cell(37, 6, $falserejection->jumlah_tidak_lolos, 1, 0, 'C');
			$pdf->Cell(37, 6, $falserejection->jumlah_kontaminasi, 1, 0, 'C');
			$pdf->Cell(37, 6, $falserejection->jenis_kontaminasi, 1, 0, 'C');
			$pdf->Cell(37, 6, $falserejection->posisi_kontaminasi, 1, 0, 'C');
			$pdf->Cell(37, 6, $falserejection->false_rejection, 1, 0, 'C');
			$pdf->Cell(25, 6, $falserejection->username_2, 1, 0, 'C');
			$pdf->Ln();
		}

		$pdf->SetFont('times', 'I', 8);
		$pdf->SetXY(330, 150); 
		$pdf->Cell(5, 3, 'QB 13/00', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 9);
		$pdf->SetXY(12, 150); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($falserejection_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(12, 0, '', 0, 0, 'L'); 
				$pdf->Cell(12, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}


		$pdf->SetFont('times', '', 10);
		$pdf->SetXY(13, 167); 
		$pdf->Cell(60, 5, 'Diperiksa Oleh : '. $data['falserejection']->username_2, 0, 0, 'C');
		$pdf->SetXY(130, 167); 
		$pdf->Cell(60, 5, 'Diketahui Oleh : '. $data['falserejection']->nama_produksi_false, 0, 0, 'C');

		$nama_spv = $data['falserejection']->nama_spv_false;
		$tanggal_update = $data['falserejection']->tgl_update_spv_false;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($falserejection_data as $item) {
			if ($item->status_spv_false != '1') {
				$status_verifikasi = false;
				break; 
			} 
		}

		if ($status_verifikasi) {
			$url = 'Diverifikasi secara digital oleh,' . "\n" . $nama_spv . "\n" . 'SPV QC Bread Crumb' . "\n" . $update_tanggal;

			$pdf->SetFont('times', '', 10);
			$pdf->SetXY(265, 167); 
			$pdf->Cell(60, 4, 'Disetujui oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($url, 'QRCODE,L', 286, 172, 18, 18, null, 'N'); 
			$pdf->SetXY(265, 190); 
			$pdf->Cell(60, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetFont('times', '', 10);
			$pdf->SetXY(270, 167); 
			$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		// $pdf->Output("falserejection.pdf", 'I');

		$currentDate = date('d-m-Y');
		$filename = "False Rejection_{$currentDate}.pdf";
		$pdf->Output($filename, 'I');

	}
}

