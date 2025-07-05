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
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$sanitasi_data = $this->sanitasi_model->get_by_uuid_sanitasi($selected_items);
		$sanitasi_data_verif = $this->sanitasi_model->get_by_uuid_sanitasi_verif($selected_items);
		$data['sanitasi'] = $sanitasi_data_verif;

		if (!$data['sanitasi']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		$this->load->model('pegawai_model');
		$nama_qc = $this->pegawai_model->get_nama_lengkap($data['sanitasi']->username);
		$nama_prod = $this->pegawai_model->get_nama_lengkap($data['sanitasi']->nama_produksi);
		$nama_spv = $this->pegawai_model->get_nama_lengkap($data['sanitasi']->nama_spv);

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 14, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 38);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN SANITASI', 0, 'C');
		$pdf->Ln(4);

		$tanggal = $data['sanitasi']->date;
		$datetime = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $datetime->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $datetime->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Hari / Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['sanitasi']->shift);
		$pdf->Ln(4);

		$pdf->SetFont('times', '', 9);
		$pdf->Cell(15, 10, 'Pukul', 1, 0, 'C');
		$pdf->Cell(30, 10, 'Area', 1, 0, 'C');
		$pdf->Cell(50, 5, 'Kadar Klorin (ppm)', 1, 0, 'C');
		$pdf->Cell(20, 10, 'Suhu Air', 1, 0, 'C');
		$pdf->Cell(37 ,10, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(40,10, 'Tindakan Koreksi', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');
		$pdf->Cell(45, 5, '', 0, 0, 'L');
		$pdf->Cell(25, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(25, 5, 'Aktual', 1, 0, 'C');
		$pdf->Cell(77, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		foreach ($sanitasi_data as $sanitasi_entry) {
			$time = $sanitasi_entry->waktu;
			$created_time = (new DateTime($time))->format('H:i');
			$sanitasi_areas = json_decode($sanitasi_entry->area);

			if ($sanitasi_areas && is_array($sanitasi_areas)) {
				$first_row = true; 
				foreach ($sanitasi_areas as $sanitasi) {
					$sub_area   = $sanitasi->sub_area ?? '-';
					$standar    = $sanitasi->standar ?? '-';
					$aktual     = $sanitasi->aktual ?? '-';
					$suhu_air   = $sanitasi->suhu_air ?? '-';
					$keterangan = $sanitasi->keterangan ?? '-';
					$tindakan   = $sanitasi->tindakan ?? '-';

					$pdf->SetFont('times', '', 8);
					$pdf->Cell(15, 5, $first_row ? $created_time : '', 1, 0, 'C');
					$first_row = false;
					$pdf->Cell(30, 5, "$sub_area", 1, 0, 'L');
					$pdf->Cell(25, 5, "$standar", 1, 0, 'C');
					$pdf->Cell(25, 5, "$aktual", 1, 0, 'C');
					$pdf->Cell(20, 5, "$suhu_air", 1, 0, 'C');
					$pdf->Cell(37, 5, "$keterangan", 1, 0, 'C');
					$pdf->Cell(40, 5, "$tindakan", 1, 1, 'C');
				}
			}
		}

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($sanitasi_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(13, 0, '', 0, 0, 'L'); 
				$pdf->Cell(13, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($sanitasi_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		if ($status_verifikasi) {
			$pdf->SetFont('times', '', 8);
			$pdf->SetTextColor(0, 0, 0);
			$y_verifikasi = $y_after_keterangan;

			$pdf->SetXY(25, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(25, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 8);
			$pdf->Cell(35, 5, $nama_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8);
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			$pdf->SetXY(90, $y_verifikasi + 10);

			if ($data['sanitasi']->status_produksi == 1 && !empty($data['sanitasi']->nama_produksi)) {
				$tanggal_update_prod = $data['sanitasi']->tgl_update_produksi;
				$update_tanggal_prod = (new DateTime($tanggal_update_prod))->format('d-m-Y | H:i');

				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $nama_prod . "\nForeman/Forelady Produksi\n" . $update_tanggal_prod;
				$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(90, $y_verifikasi + 24);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			} else {
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');

			$tanggal_update = $data['sanitasi']->tgl_update_spv;
			$update_tanggal = (new DateTime($tanggal_update))->format('d-m-Y | H:i');

			$qr_text = "Diverifikasi secara digital oleh,\n" . $nama_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Sanitasi_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}

}

