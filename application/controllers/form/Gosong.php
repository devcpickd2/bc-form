<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gosong extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('gosong_model');
		$this->load->model('pegawai_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'gosong' => $this->gosong_model->get_data_by_plant(),
			'active_nav' => 'gosong', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'gosong' => $this->gosong_model->get_by_uuid($uuid),
			'active_nav' => 'gosong');

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->gosong_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->gosong_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Roti Gosong berhasil di simpan');
				redirect('gosong');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Roti Gosong di simpan');
				redirect('gosong');
			}
		}

		$data = array(
			'active_nav' => 'gosong');

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-tambah');
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$rules = $this->gosong_model->rules();
		$this->form_validation->set_rules($rules);

		$gosong = $this->gosong_model->get_by_uuid($uuid);

		if (!$gosong) {
			$this->session->set_flashdata('error_msg', 'Data tidak ditemukan.');
			redirect('gosong');
		}

		$shift_number = substr($gosong->shift, 0, 1); 
		$shift_group  = substr($gosong->shift, 1, 1); 

		if ($this->form_validation->run() == TRUE) {
			$update = $this->gosong_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Roti Gosong berhasil di Update');
				redirect('gosong');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Roti Gosong gagal di Update');
				redirect('gosong');
			}
		}

		$data = array(
			'gosong' => $gosong,
			'shift_number' => $shift_number,
			'shift_group'  => $shift_group,
			'active_nav' => 'gosong'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid = null)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('gosong');
		}

		$deleted = $this->gosong_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data Roti Gosong berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('gosong');
	}


	public function verifikasi()
	{
		$data = array(
			'gosong' => $this->gosong_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-gosong', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->gosong_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->gosong_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Roti Gosong berhasil di Update');
				redirect('gosong/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Roti Gosong gagal di Update');
				redirect('gosong/verifikasi');
			}
		}

		$data = array(
			'gosong' => $this->gosong_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-gosong');

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-status', $data);
		$this->load->view('partials/footer');
	}


	public function diketahui()
	{
		$data = array(
			'gosong' => $this->gosong_model->get_data_by_plant(),
			'active_nav' => 'diketahui-gosong', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->gosong_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->gosong_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Roti Gosong berhasil di Update');
				redirect('gosong/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Roti Gosong gagal di Update');
				redirect('gosong/diketahui');
			}
		}

		$data = array(
			'gosong' => $this->gosong_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-gosong');

		$this->load->view('partials/head', $data);
		$this->load->view('form/gosong/gosong-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$tanggal = $this->input->post('tanggal');  

		log_message('debug', 'Tanggal yang dipilih: ' . print_r($tanggal, true));

		if (empty($tanggal)) {
			show_error('Tidak ada tanggal yang dipilih', 404);
		}

		$plant = $this->session->userdata('plant');

		$gosong_data = $this->gosong_model->get_by_date($tanggal, $plant); 
		$gosong_data_verif = $this->gosong_model->get_last_verif_by_date($tanggal, $plant); 

		if (!$gosong_data || !$gosong_data_verif) {
			show_error('Data tidak ditemukan, Pilih tanggal yang ingin dicetak', 404);
		}

		$data['gosong'] = $gosong_data_verif;
	// Ambil nama lengkap hanya sekali
		$data['gosong']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['gosong']->username);
		$data['gosong']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['gosong']->nama_spv);
		$data['gosong']->nama_lengkap_produksi = $data['gosong']->nama_produksi;

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 9.5, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 35);
		}

		$pdf->Write(9, "\n");
		$pdf->MultiCell(0, 5, 'LAPORAN ROTI GOSONG', 0, 'C');
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 9);
		$pdf->Cell(40, 8, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(30, 8, 'Shift', 1, 0, 'C');
		$pdf->Cell(50, 8, 'Total Berat (Kg)', 1, 1, 'C');

		$pdf->SetFont('times', '', 8);
		foreach ($gosong_data as $gosong) {
			$created_date = (new DateTime($gosong->date))->format('d-m-Y');

			$pdf->Cell(40, 8, $created_date, 1, 0, 'C');
			$pdf->Cell(30, 8, $gosong->shift, 1, 0, 'C');
			$pdf->Cell(50, 8, $gosong->total_berat, 1, 0, 'L');
			$pdf->Ln();
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($gosong_data as $item) {
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
			if (!empty($data['gosong']->nama_lengkap_qc)) {
				$update_tanggal_qc = !empty($data['gosong']->created_at)
				? (new DateTime($data['gosong']->created_at))->format('d-m-Y | H:i')
				: date('d-m-Y | H:i'); 

				$qr_text_qc = "Dibuat secara digital oleh,\n" .
				$data['gosong']->nama_lengkap_qc . "\nQC Inspector\n" . $update_tanggal_qc;
				$pdf->write2DBarcode($qr_text_qc, 'QRCODE,L', 35, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(25, $y_verifikasi + 24);
				$pdf->Cell(35, 5, 'QC Inspector', 0, 0, 'C');
			} else {
				$pdf->SetXY(25, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($data['gosong']->status_produksi == 1 && !empty($data['gosong']->nama_produksi)) {
				$update_tanggal_prod = (new DateTime($data['gosong']->tgl_update_produksi))
				->modify('+1 hour')
				->format('d-m-Y | H:i');

				$qr_text_produksi = "Diketahui secara digital oleh,\n" .
				$data['gosong']->nama_lengkap_produksi .
				"\nForeman/Forelady Produksi\n" . $update_tanggal_prod;

				$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(90, $y_verifikasi + 24);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			} else {
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

		// Disetujui oleh (SPV)
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['gosong']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['gosong']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$currentDate = date('d-m-Y');
		$filename = "gosong_{$currentDate}.pdf";
		$pdf->Output($filename, 'I');
	}


}

