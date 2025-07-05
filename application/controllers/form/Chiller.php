<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Chiller extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('chiller_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'chiller' => $this->chiller_model->get_chiller_by_plant(),
			'active_nav' => 'chiller', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'chiller' => $this->chiller_model->get_by_uuid($uuid),
			'active_nav' => 'chiller');

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->chiller_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->chiller_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Chiller berhasil di simpan');
				redirect('chiller');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Chiller gagal di simpan');
				redirect('chiller');
			}
		}

		$data = array(
			'active_nav' => 'chiller');

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->chiller_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->chiller_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Chiller berhasil di Update');
				redirect('chiller');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Chiller gagal di Update');
				redirect('chiller');
			}
		}

		$data = array(
			'chiller' => $this->chiller_model->get_by_uuid($uuid),
			'active_nav' => 'chiller');

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('chiller');
		}

		$deleted = $this->chiller_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('chiller');
	}
	
	public function verifikasi()
	{
		$data = array(
			'chiller' => $this->chiller_model->get_chiller_by_plant(),
			'active_nav' => 'verifikasi-chiller', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->chiller_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->chiller_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Suhu Chiller berhasil di Update');
				redirect('chiller/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Suhu Chiller gagal di Update');
				redirect('chiller/verifikasi');
			}
		}

		$data = array(
			'chiller' => $this->chiller_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-chiller');

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'chiller' => $this->chiller_model->get_chiller_by_plant(),
			'active_nav' => 'diketahui-chiller', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->chiller_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->chiller_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Suhu Chiller berhasil di Update');
				redirect('chiller/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Suhu Chiller gagal di Update');
				redirect('chiller/diketahui');
			}
		}

		$data = array(
			'chiller' => $this->chiller_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-chiller');

		$this->load->view('partials/head', $data);
		$this->load->view('form/chiller/chiller-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$chiller_data = $this->chiller_model->get_by_uuid_chiller($selected_items);

		$chiller_data_verif = $this->chiller_model->get_by_uuid_chiller_verif($selected_items);

		$data['chiller'] = $chiller_data_verif;


		if (!$data['chiller']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		$this->load->model('pegawai_model');
		$data['chiller']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['chiller']->username);
		$data['chiller']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['chiller']->nama_spv);
		$data['chiller']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['chiller']->nama_produksi);

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 14, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 35);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN SUHU CHILLER', 0, 'C');
		$pdf->Ln(4);

		setlocale(LC_TIME, 'IND');
		$tanggal = $data['chiller']->date;
		$datetime = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $datetime->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $datetime->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Cell(190, 6, 'Hari / Tanggal: ' . $formatted_date, 1, 1);	

		$pdf->SetFont('times', '', 9);

		$pdf->Cell(20, 6, 'Pukul', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Chiller 1', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Chiller 2', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Chiller 3', 1, 0, 'C');
		$pdf->Cell(30, 6, 'Chiller 4', 1, 0, 'C');
		$pdf->Cell(50, 6, 'Paraf', 1, 1, 'C');

		$pdf->Cell(20, 8, 'STD', 1, 0, 'C');
		$pdf->Cell(120, 8, '0 - 5°C', 1, 0, 'C');   
		$pdf->Cell(25, 8, 'QC', 1, 0, 'C');  
		$pdf->Cell(25, 8, 'Produksi', 1, 1, 'C'); 

		foreach ($chiller_data as $chiller) {
			$time = $chiller->waktu;
			$time2 = new DateTime($time); 
			$created_time = $time2->format('H:i');

			$pdf->Cell(20, 5, $created_time, 1, 0, 'C');
			$pdf->Cell(30, 5, $chiller->chiller_1, 1, 0, 'C');
			$pdf->Cell(30, 5, $chiller->chiller_2, 1, 0, 'C');
			$pdf->Cell(30, 5, $chiller->chiller_3, 1, 0, 'C');
			$pdf->Cell(30, 5, $chiller->chiller_4, 1, 0, 'C');
			$pdf->Cell(25, 5, $chiller->username, 1, 0, 'C');
			$pdf->Cell(25, 5, $chiller->nama_produksi, 1, 0, 'C');
			$pdf->Ln();
		}  

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($chiller_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(13, 0, '', 0, 0, 'L'); 
				$pdf->Cell(13, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($chiller_data as $item) {
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
			$pdf->Cell(35, 5, $data['chiller']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

		// Diketahui oleh (Produksi)
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($data['chiller']->status_produksi == 1 && !empty($data['chiller']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['chiller']->tgl_update_produksi))->format('d-m-Y | H:i');
				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['chiller']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
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
			$update_tanggal = (new DateTime($data['chiller']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['chiller']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Chiller_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}
}

