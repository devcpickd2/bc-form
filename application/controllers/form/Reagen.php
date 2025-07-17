<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reagen extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('reagen_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'reagen' => $this->reagen_model->get_data_by_plant(),
			'active_nav' => 'reagen', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/reagen/reagen', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'reagen' => $this->reagen_model->get_by_uuid($uuid),
			'active_nav' => 'reagen');

		$this->load->view('partials/head', $data);
		$this->load->view('form/reagen/reagen-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->reagen_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->reagen_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Penggunaan Reagen Klorin berhasil di simpan');
				redirect('reagen');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Penggunaan Reagen Klorin gagal di simpan');
				redirect('reagen');
			}
		}

		$data = array(
			'active_nav' => 'reagen');

		$this->load->view('partials/head', $data);
		$this->load->view('form/reagen/reagen-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->reagen_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->reagen_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Penggunaan Reagen Klorin berhasil di Update');
				redirect('reagen');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Penggunaan Reagen Klorin gagal di Update');
				redirect('reagen');
			}
		}

		$data = array(
			'reagen' => $this->reagen_model->get_by_uuid($uuid),
			'no_lot_list' => $this->reagen_model->get_all_no_lot(),
			'active_nav' => 'reagen');

		$this->load->view('partials/head', $data);
		$this->load->view('form/reagen/reagen-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('reagen');
		}

		$deleted = $this->reagen_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('reagen');
	}

	public function verifikasi()
	{
		$data = array(
			'reagen' => $this->reagen_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-reagen', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/reagen/reagen-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->reagen_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->reagen_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Verifikasi Penggunaan Reagen Klorin berhasil di Update');
				redirect('reagen/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Verifikasi Penggunaan Reagen Klorin gagal di Update');
				redirect('reagen/verifikasi');
			}
		}

		$data = array(
			'reagen' => $this->reagen_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-reagen');

		$this->load->view('partials/head', $data);
		$this->load->view('form/reagen/reagen-status', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$bulan = $this->input->get('bulan');

		if (!$bulan) {
			show_error('Parameter bulan tidak ditemukan', 404);
		}

		[$tahun, $bln] = explode('-', $bulan);
		$start_date = "$tahun-$bln-01";
		$end_date = date("Y-m-t", strtotime($start_date));

		$reagen_data = $this->reagen_model->get_Reagen_by_month($start_date, $end_date);

		if (empty($reagen_data)) {
			show_error('Tidak ada data untuk bulan ini', 404);
		}

		$reagen_data_verif = $this->reagen_model->get_one_verified_by_month($start_date, $end_date);
		$data['reagen'] = $reagen_data_verif;

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 9.5, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 35);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(9, "\n");
		$pdf->SetFont('times', 'B', 10);
		$pdf->MultiCell(0, 5, 'VERIFIKASI PENGGUNAAN REAGEN KLORIN', 0, 'C');

		$pdf->SetFont('times', '', 9);
		$pdf->MultiCell(0, 3, 'Bulan : ' . date('F', strtotime($start_date)), 0, 'L');

		$pdf->Ln(1);
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(12, 10, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(20, 10, 'Nama Larutan', 1, 0, 'C');
		$pdf->Cell(20, 10, 'No. Lot', 1, 0, 'C');
		$pdf->Cell(20, 10, 'Best Before', 1, 0, 'C');
		$pdf->Cell(20, 10, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(30, 10, 'Volume Penggunaan', 1, 0, 'C');
		$pdf->Cell(30, 10, 'Volume Akhir', 1, 0, 'C');
		$pdf->Cell(40, 5, 'Diverifikasi Oleh', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$pdf->Cell(72, 0, '', 0, 0, 'L');
		$pdf->Cell(20, 5, 'Buka Botol', 0, 0, 'C');   
		$pdf->Cell(30, 5, 'Larutan (mL)', 0, 0, 'C');  
		$pdf->Cell(30, 5, 'Larutan (mL)', 0, 0, 'C');    
		$pdf->Cell(20, 5, 'Nama', 1, 0, 'C'); 
		$pdf->Cell(20, 5, 'Paraf', 1, 0, 'C');
		$pdf->Cell(0, 0, '', 0, 0, 'C');
		$pdf->Cell(25, 5, '', 0, 1, 'C');

		$pdf->SetFont('times', '', 8);
		foreach ($reagen_data as $reagen) {
			$created_date = (new DateTime($reagen->date))->format('d');
			$ex_date = (new DateTime($reagen->best_before))->format('d-m-Y');
			$open = (new DateTime($reagen->tgl_buka_botol))->format('d-m-Y');
			$pdf->Cell(12, 5, $created_date, 1, 0, 'C');
			$pdf->writeHTMLCell(20, 5, '', '', str_replace('₂', '<sub>2</sub>', $reagen->nama_larutan), 1, 0, false, true, 'L', true);
			$pdf->Cell(20, 5, $reagen->no_lot, 1, 0, 'C');
			$pdf->Cell(20, 5, $ex_date, 1, 0, 'C');
			$pdf->Cell(20, 5, $open, 1, 0, 'C');
			$pdf->Cell(30, 5, $reagen->volume_penggunaan, 1, 0, 'C');
			$pdf->Cell(30, 5, $reagen->volume_akhir, 1, 0, 'C');
			$pdf->Cell(20, 5, $reagen->username, 1, 0, 'C');
			$pdf->Cell(20, 5, "", 1, 0, 'C');
			$pdf->Ln();
		}

		$this->load->model('pegawai_model');
		$data['reagen']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['reagen']->username);
		$data['reagen']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['reagen']->nama_spv);

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($reagen_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($reagen_data as $item) {
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
			$pdf->Cell(35, 5, $data['reagen']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['reagen']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['reagen']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Verifikasi Penggunaan Reagen Klorin_{$bulan}.pdf";
		$pdf->Output($filename, 'I');
	}


}

