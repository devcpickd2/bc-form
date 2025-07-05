<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Thermometer extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('thermometer_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_data_by_plant(),
			'active_nav' => 'thermometer', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->thermometer_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->thermometer_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Peneraan Thermometer berhasil di simpan');
				redirect('thermometer');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Peneraan Thermometer gagal di simpan');
				redirect('thermometer');
			}
		}

		$data = array(
			'active_nav' => 'thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->thermometer_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->thermometer_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Peneraan Thermometer berhasil di Update');
				redirect('thermometer');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Peneraan Thermometer gagal di Update');
				redirect('thermometer');
			}
		}

		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('thermometer');
		}

		$deleted = $this->thermometer_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('thermometer');
	}
	
	public function verifikasi()
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-thermometer', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->thermometer_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->thermometer_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Peneraan Thermometer berhasil di Update');
				redirect('thermometer/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Peneraan Thermometer gagal di Update');
				redirect('thermometer/verifikasi');
			}
		}

		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'thermometer' => $this->thermometer_model->get_data_by_plant(),
			'active_nav' => 'diketahui-thermometer', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->thermometer_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->thermometer_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Peneraan Thermometer berhasil di Update');
				redirect('thermometer/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Peneraan Thermometer gagal di Update');
				redirect('thermometer/diketahui');
			}
		}

		$data = array(
			'thermometer' => $this->thermometer_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-thermometer');

		$this->load->view('partials/head', $data);
		$this->load->view('form/thermometer/thermometer-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$thermometer_data = $this->thermometer_model->get_by_uuid_thermometer($selected_items);

		$thermometer_data_verif = $this->thermometer_model->get_by_uuid_thermometer_verif($selected_items);

		$data['thermometer'] = $thermometer_data_verif;


		if (!$data['thermometer']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(17, 16, 15); 
		$pdf->AddPage('L', 'LEGAL');
		$pdf->SetFont('times', 'B', 15);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 17, 14, 45);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(9, "\n");
		$pdf->MultiCell(0, 5, 'PENERAAN THERMOMETER', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');	
		$tanggal = $data['thermometer']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(17);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);

		$pdf->Cell(10, 15, 'No', 1, 0, 'C');
		$pdf->Cell(32, 15, 'Jenis Thermometer', 1, 0, 'C');
		$pdf->Cell(52, 15, 'Kode  Thermometer / Area', 1, 0, 'C');
		$pdf->Cell(162, 5, 'Hasil Peneraan', 1, 0, 'C');
		$pdf->Cell(34, 15, 'Tindakan Perbaikan', 1, 0, 'C');
		$pdf->Cell(30, 15, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$pdf->Cell(94, 15, '', 0, 0, 'C');
		$pdf->SetFont('times', '', 9);
		$pdf->Cell(27, 5, 'Check-1', 1, 0, 'C');
		$pdf->Cell(27, 5, 'Check-2', 1, 0, 'C');
		$pdf->Cell(27, 5, 'Check-3', 1, 0, 'C');
		$pdf->Cell(27, 5, 'Check-4', 1, 0, 'C');
		$pdf->Cell(27, 5, 'Check-5', 1, 0, 'C');
		$pdf->Cell(27, 5, 'Check-6', 1, 0, 'C');	
		$pdf->Cell(64, 5, '', 0, 1, 'C');

		$pdf->Cell(94, 15, '', 0, 0, 'C');
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Standar', 1, 0, 'C');
		$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		$pdf->Cell(64, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$no = 1;
		foreach ($thermometer_data as $thermometer) {
			$pdf->SetFont('times', '', 10);

			$pdf->Cell(10, 8, $no, 1, 0, 'C');
			$pdf->Cell(32, 8, $thermometer->model, 1, 0, 'C');
			$pdf->Cell(52, 8, $thermometer->kode_thermo . " / " . $thermometer->area, 1, 0, 'C');

			$hasil_array = json_decode($thermometer->peneraan_hasil, true); 
			if (!is_array($hasil_array)) {
				$hasil_array = [];
			}
			for ($i = 0; $i < 6; $i++) {
				$pdf->SetFont('times', '', 8);
				$pukul = isset($hasil_array[$i]['pukul']) ? $hasil_array[$i]['pukul'] : '';
				$standar = isset($hasil_array[$i]['standar']) ? $hasil_array[$i]['standar'] : '';
				$hasil = isset($hasil_array[$i]['hasil']) ? $hasil_array[$i]['hasil'] : '';

				$pdf->Cell(9, 8, $pukul, 1, 0, 'C');
				$pdf->Cell(9, 8, $standar, 1, 0, 'C');
				$pdf->Cell(9, 8, $hasil, 1, 0, 'C');
			}
			$pdf->Cell(34, 8, !empty($thermometer->tindakan_perbaikan) ? $thermometer->tindakan_perbaikan : '-', 1, 0, 'C');
			$pdf->Cell(30, 8, !empty($thermometer->keterangan) ? $thermometer->keterangan : '-', 1, 0, 'C');
			$pdf->Ln();
			$no++;
		}
		
		// $pdf->SetY($pdf->GetY() + 3); 
		// $pdf->SetFont('times', '', 8);
		// $pdf->Cell(10, 3, 'Catatan : ', 0, 1, 'L');
		// foreach ($thermometer_data as $item) {
		// 	if (!empty($item->catatan)) {
		// 		$pdf->Cell(10, 0, '', 0, 0, 'L'); 
		// 		$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
		// 	}
		// }

		$this->load->model('pegawai_model');
		$data['thermometer']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['thermometer']->username);
		$data['thermometer']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['thermometer']->nama_spv);
		$data['thermometer']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['thermometer']->nama_produksi);

		$y_after_keterangan = $pdf->GetY();
		$status_verifikasi = true;
		foreach ($thermometer_data as $item) {
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
			$pdf->Cell(95, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(25, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 8); 
			$pdf->Cell(95, 5, $data['thermometer']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(112, 5, 'QC Inspector', 0, 0, 'C');

		// Diketahui oleh (Produksi)
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(135, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($data['thermometer']->status_produksi == 1 && !empty($data['thermometer']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['thermometer']->tgl_update_produksi))->format('d-m-Y | H:i');
				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['thermometer']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
				$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 150, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(90, $y_verifikasi + 24);
				$pdf->Cell(135, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			} else {
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(135, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

		// Disetujui oleh (SPV)
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(189, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['thermometer']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['thermometer']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
			$pdf->write2DBarcode($qr_text, 'QRCODE,L', 237, $y_verifikasi + 10, 15, 15, null, 'N');
			$pdf->SetXY(170, $y_verifikasi + 24);
			$pdf->Cell(149, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0); 
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(200, $y_after_keterangan);
			$pdf->Cell(80, 5, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		$filename = "Peneraan Thermometer_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

