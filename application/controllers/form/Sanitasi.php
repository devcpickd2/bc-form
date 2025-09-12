<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Sanitasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('sanitasi_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'sanitasi' => $this->sanitasi_model->get_data_by_plant(),
			'active_nav' => 'sanitasi', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'sanitasi' => $this->sanitasi_model->get_by_uuid($uuid),
			'active_nav' => 'sanitasi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{
		$this->load->library('form_validation');

		$rules = $this->sanitasi_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->sanitasi_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Sanitasi berhasil disimpan');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Sanitasi gagal disimpan');
			}
			redirect('sanitasi');
		}

		$data = array(
			'active_nav' => 'sanitasi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-tambah');
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$this->load->library('form_validation');

		$rules = $this->sanitasi_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->sanitasi_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Sanitasi berhasil diupdate');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Sanitasi gagal diupdate');
			}
			redirect('sanitasi');
		}

		$data = array(
			'sanitasi'   => $this->sanitasi_model->get_by_uuid($uuid),
			'active_nav' => 'sanitasi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('sanitasi');
		}

		$deleted = $this->sanitasi_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('sanitasi');
	}
	
	
	public function verifikasi()
	{
		$data = array(
			'sanitasi' => $this->sanitasi_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-sanitasi', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->sanitasi_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->sanitasi_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Sanitasi berhasil di Update');
				redirect('sanitasi/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Sanitasi gagal di Update');
				redirect('sanitasi/verifikasi');
			}
		}

		$data = array(
			'sanitasi' => $this->sanitasi_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-sanitasi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'sanitasi' => $this->sanitasi_model->get_data_by_plant(),
			'active_nav' => 'diketahui-sanitasi', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->sanitasi_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->sanitasi_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Sanitasi berhasil di Update');
				redirect('sanitasi/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Sanitasi gagal di Update');
				redirect('sanitasi/diketahui');
			}
		}

		$data = array(
			'sanitasi' => $this->sanitasi_model->get_by_uuid($uuid), 
			'active_nav' => 'diketahui-sanitasi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sanitasi/sanitasi-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$date = $this->input->post('date');
		$date = date('Y-m-d', strtotime($date));
		if (empty($date)) {
			show_error('Tanggal belum dipilih', 404);
		}

		$plant = $this->session->userdata('plant');
		if (empty($plant)) {
			show_error('Plant tidak ditemukan di session.', 403);
		}
		$sanitasi_data = $this->sanitasi_model->get_by_date($date, $plant);
		if (empty($sanitasi_data)) {
			show_error('Data tidak ditemukan untuk tanggal ini atau bukan milik plant Anda.', 404);
		}
		$this->load->model('pegawai_model');
		$nama_qc   = $this->pegawai_model->get_nama_lengkap($sanitasi_data[0]->username);
		$nama_prod = $sanitasi_data[0]->nama_produksi;
		$nama_spv  = $this->pegawai_model->get_nama_lengkap($sanitasi_data[0]->nama_spv);

    // Inisialisasi TCPDF
		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->SetMargins(10, 14, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

    // Tambahkan logo jika ada
		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 38);
		}

    // Judul
		$pdf->Ln(10);
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN SANITASI', 0, 'C');
		$pdf->Ln(4);

		$datetime         = new DateTime($date);
		$formatted_date   = $datetime->format('l, d F Y');
		$formatted_date2  = $datetime->format('d F Y');

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Hari / Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $sanitasi_data[0]->shift);
		$pdf->Ln(5);

    // Header Tabel
		$pdf->SetFont('times', '', 9);
		$pdf->Cell(15, 10, 'Pukul', 1, 0, 'C');
		$pdf->Cell(30, 10, 'Area', 1, 0, 'C');
		$pdf->Cell(50, 5, 'Kadar Klorin (ppm)', 1, 0, 'C');
		$pdf->Cell(20, 10, 'Suhu Air', 1, 0, 'C');
		$pdf->Cell(37, 10, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(40, 10, 'Tindakan Koreksi', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');
		$pdf->Cell(45, 5, '', 0, 0, 'L');
		$pdf->Cell(25, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(25, 5, 'Aktual', 1, 0, 'C');
		$pdf->Cell(77, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

    // Isi Tabel
		foreach ($sanitasi_data as $sanitasi_entry) {
			$time = (new DateTime($sanitasi_entry->waktu))->format('H:i');
			$sanitasi_areas = json_decode($sanitasi_entry->area);

			if ($sanitasi_areas && is_array($sanitasi_areas)) {
				$first_row = true;
				foreach ($sanitasi_areas as $sanitasi) {
					$pdf->SetFont('times', '', 8);
					$pdf->Cell(15, 5, $first_row ? $time : '', 1, 0, 'C');
					$first_row = false;
					$pdf->Cell(30, 5, $sanitasi->sub_area ?? '-', 1, 0, 'L');
					$pdf->Cell(25, 5, $sanitasi->standar ?? '-', 1, 0, 'C');
					$pdf->Cell(25, 5, $sanitasi->aktual ?? '-', 1, 0, 'C');
					$pdf->Cell(20, 5, $sanitasi->suhu_air ?? '-', 1, 0, 'C');
					$pdf->Cell(37, 5, $sanitasi->keterangan ?? '-', 1, 0, 'C');
					$pdf->Cell(40, 5, $sanitasi->tindakan ?? '-', 1, 1, 'C');
				}
			}
		}

    // Catatan
		$pdf->Ln(2);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($sanitasi_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(13, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

    // Tanda Tangan + QR Code
		$y_now = $pdf->GetY() + 5;
		$status_spv_oke = true;
		foreach ($sanitasi_data as $item) {
			if ($item->status_spv != '1') {
				$status_spv_oke = false;
				break;
			}
		}

		if ($status_spv_oke) {
			$pdf->SetFont('times', '', 8);

        // Dibuat oleh
			$pdf->SetXY(25, $y_now);
			$pdf->Cell(35, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(25, $y_now + 10);
			$pdf->SetFont('times', 'U', 8);
			$pdf->Cell(35, 5, $nama_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8);
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

        // Diketahui oleh
			$pdf->SetXY(90, $y_now);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if (!empty($sanitasi_data[0]->tgl_update_produksi) && $sanitasi_data[0]->status_produksi == 1) {
				$pdf->SetXY(90, $y_now + 10);
				$pdf->SetFont('times', 'U', 8);
				$pdf->Cell(35, 5, $nama_prod, 0, 1, 'C');
				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_now + 15);
				$pdf->Cell(35, 5, 'Foreman Produksi', 0, 0, 'C');
			} else {
				$pdf->SetXY(90, $y_now + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}


        // Disetujui oleh
			$pdf->SetXY(150, $y_now);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$qr_text_spv = "Diverifikasi secara digital oleh,\n" . $nama_spv . "\nSPV QC\n" . (new DateTime($sanitasi_data[0]->tgl_update_spv))->format('d-m-Y | H:i');
			$pdf->write2DBarcode($qr_text_spv, 'QRCODE,L', 167, $y_now + 5, 15, 15, null, 'N');
			$pdf->SetXY(150, $y_now + 20);
			$pdf->Cell(49, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetFont('times', '', 8);
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetXY(100, $y_now);
			$pdf->Cell(80, 5, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

    // Output PDF
		$filename = "Sanitasi_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}




}

