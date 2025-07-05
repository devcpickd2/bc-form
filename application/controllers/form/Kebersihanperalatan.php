<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Kebersihanperalatan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('kebersihanperalatan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_data_by_plant(),
			'active_nav' => 'kebersihanperalatan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_by_uuid($uuid),
			'active_nav' => 'kebersihanperalatan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->kebersihanperalatan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->kebersihanperalatan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Peralatan berhasil di simpan');
				redirect('kebersihanperalatan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Peralatan gagal di simpan');
				redirect('kebersihanperalatan');
			}
		}

		$data = array(
			'active_nav' => 'kebersihanperalatan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->kebersihanperalatan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->kebersihanperalatan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Peralatan berhasil di Update');
				redirect('kebersihanperalatan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Peralatan gagal di Update');
				redirect('kebersihanperalatan');
			}
		}

		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_by_uuid($uuid),
			'active_nav' => 'kebersihanperalatan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('kebersihanperalatan');
		}

		$deleted = $this->kebersihanperalatan_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('kebersihanperalatan');
	}
	
	
	public function verifikasi()
	{
		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-kebersihanperalatan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->kebersihanperalatan_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->kebersihanperalatan_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Peralatan berhasil di Update');
				redirect('kebersihanperalatan/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Peralatan gagal di Update');
				redirect('kebersihanperalatan/verifikasi');
			}
		}

		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-kebersihanperalatan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_data_by_plant(),
			'active_nav' => 'diketahui-kebersihanperalatan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->kebersihanperalatan_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->kebersihanperalatan_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Kebersihan Peralatan berhasil di Update');
				redirect('kebersihanperalatan/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Kebersihan Peralatan gagal di Update');
				redirect('kebersihanperalatan/diketahui');
			}
		}

		$data = array(
			'kebersihanperalatan' => $this->kebersihanperalatan_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-kebersihanperalatan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihanperalatan/kebersihanperalatan-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$kebersihanperalatan_data = $this->kebersihanperalatan_model->get_by_uuid_kebersihanperalatan($selected_items);

		$kebersihanperalatan_data_verif = $this->kebersihanperalatan_model->get_by_uuid_kebersihanperalatan_verif($selected_items);

		$data['kebersihanperalatan'] = $kebersihanperalatan_data_verif;


		if (!$data['kebersihanperalatan']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 14, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 10);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 38);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'KEBERSIHAN PERALATAN', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['kebersihanperalatan']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(10);
		$pdf->Write(0, 'Hari / Tanggal : ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['kebersihanperalatan']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);

		$pdf->Cell(15, 12, 'No.', 1, 0, 'C');
		$pdf->Cell(40, 12, 'Peralatan', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Kondisi', 1, 0, 'C');
		$pdf->Cell(68, 12, 'Problem', 1, 0, 'C');
		$pdf->Cell(40, 12, 'Tindakan Koreksi', 1, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$pdf->Cell(55, 12, '', 0, 0, 'L');
		$pdf->Cell(15, 6, 'Bersih', 1, 0, 'C');
		$pdf->Cell(15, 6, 'Kotor', 1, 0, 'C');
		$pdf->Cell(108, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$no = 1;
		foreach ($kebersihanperalatan_data as $kebersihanperalatan) {
			$pdf->SetFont('times', '', 10);
			$pdf->Cell(15, 8, $no, 1, 0, 'C');
			$pdf->Cell(40, 8, $kebersihanperalatan->peralatan, 1, 0, 'C');
			$pdf->Cell(30, 8, $kebersihanperalatan->kondisi, 1, 0, 'C');
			$pdf->Cell(68, 8, $kebersihanperalatan->problem, 1, 0, 'C');
			$pdf->Cell(40, 8, $kebersihanperalatan->tindakan, 1, 0, 'C');
			$pdf->Ln();
			$no++;
		}

		$this->load->model('pegawai_model');
		$data['kebersihanperalatan']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['kebersihanperalatan']->username);
		$data['kebersihanperalatan']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['kebersihanperalatan']->nama_spv);
		$data['kebersihanperalatan']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['kebersihanperalatan']->nama_produksi);

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($kebersihanperalatan_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($kebersihanperalatan_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break;
			}
		}

		$pdf->SetFont('times', '', 8);
		$pdf->SetTextColor(0, 0, 0);

		if ($status_verifikasi) {
			$y_verifikasi = $y_after_keterangan;

		// Dibuat oleh (QC)
			$pdf->SetXY(25, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(25, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 8); // underline
			$pdf->Cell(35, 5, $data['kebersihanperalatan']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

		// Diketahui oleh (Produksi)
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($data['kebersihanperalatan']->status_produksi == 1 && !empty($data['kebersihanperalatan']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['kebersihanperalatan']->tgl_update_produksi))->format('d-m-Y | H:i');
				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['kebersihanperalatan']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
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
			$update_tanggal = (new DateTime($data['kebersihanperalatan']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['kebersihanperalatan']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Kebersihan Peralatan_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}
}

