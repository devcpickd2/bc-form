<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Timbangan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('timbangan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'timbangan' => $this->timbangan_model->get_all(),
			'active_nav' => 'timbangan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'timbangan' => $this->timbangan_model->get_by_uuid($uuid),
			'active_nav' => 'timbangan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->timbangan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->timbangan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Timbangan berhasil di simpan');
				redirect('timbangan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Timbangan gagal di simpan');
				redirect('timbangan');
			}
		}

		$data = array(
			'active_nav' => 'timbangan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->timbangan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->timbangan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Timbangan berhasil di Update');
				redirect('timbangan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Timbangan gagal di Update');
				redirect('timbangan');
			}
		}

		$data = array(
			'timbangan' => $this->timbangan_model->get_by_uuid($uuid),
			'active_nav' => 'timbangan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-edit', $data);
		$this->load->view('partials/footer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'timbangan' => $this->timbangan_model->get_all(),
			'active_nav' => 'verifikasi-timbangan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->timbangan_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->timbangan_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Timbangan berhasil di Update');
				redirect('timbangan/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Timbangan gagal di Update');
				redirect('timbangan/verifikasi');
			}
		}

		$data = array(
			'timbangan' => $this->timbangan_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-timbangan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'timbangan' => $this->timbangan_model->get_all(),
			'active_nav' => 'diketahui-timbangan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->timbangan_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->timbangan_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Timbangan berhasil di Update');
				redirect('timbangan/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Timbangan gagal di Update');
				redirect('timbangan/diketahui');
			}
		}

		$data = array(
			'timbangan' => $this->timbangan_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-timbangan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/timbangan/timbangan-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$timbangan_data = $this->timbangan_model->get_by_uuid_timbangan($selected_items);

		$timbangan_data_verif = $this->timbangan_model->get_by_uuid_timbangan_verif($selected_items);

		$data['timbangan'] = $timbangan_data_verif;


		if (!$data['timbangan']) {
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
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN TIMBANGAN', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['timbangan']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(15);
		$pdf->Write(0, 'Tanggal : ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Shift : ' . $data['timbangan']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);

		$pdf->Cell(30, 12, 'Kode Timbangan', 1, 0, 'C');
		$pdf->Cell(80, 12, 'Kapasitas / Model / Lokasi', 1, 0, 'C');
		$pdf->Cell(120, 6, 'Pemeriksaan', 1, 0, 'C');
		$pdf->Cell(70, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(30, 12, 'QC', 1, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$pdf->Cell(110, 12, '', 0, 0, 'C');
		$pdf->Cell(40, 6, 'Pukul', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Standar', 1, 0, 'C');
		$pdf->Cell(40, 6, 'Hasil', 1, 0, 'C');

		$pdf->Cell(100, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		foreach ($timbangan_data as $timbangan) {
			$pdf->SetFont('times', '', 10);
			$pdf->Cell(30, 8, $timbangan->kode_timbangan, 1, 0, 'C');
			$pdf->Cell(80, 8, $timbangan->kapasitas . ' / '. $timbangan->model . ' / '. $timbangan->lokasi, 1, 0, 'C');
			$pdf->Cell(40, 8, $timbangan->peneraan_waktu, 1, 0, 'C');
			$pdf->Cell(40, 8, $timbangan->peneraan_standar, 1, 0, 'C');
			$pdf->Cell(40, 8, $timbangan->peneraan_hasil, 1, 0, 'C');
			$pdf->Cell(70, 8, !empty($timbangan->keterangan) ? $timbangan->keterangan : '-', 1, 0, 'C');
			$pdf->Cell(30, 8, $timbangan->username, 1, 0, 'C');
			$pdf->Ln();
		}

		$nama_spv = $data['timbangan']->nama_spv;
		$tanggal_update = $data['timbangan']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($timbangan_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetFont('times', 'I', 8);
		$pdf->SetXY(328, 158); 
		$pdf->Cell(5, 3, 'QB 08/00', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 9);
		$pdf->SetXY(20, 160); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($timbangan_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(13, 0, '', 0, 0, 'L'); 
				$pdf->Cell(13, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

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
		$filename = "Pemeriksaan Timbangan_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

