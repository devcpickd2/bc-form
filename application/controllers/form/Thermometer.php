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
		$tanggal = $this->input->post('tanggal');
		$shift   = $this->input->post('shift');

		if (empty($tanggal) || empty($shift)) {
			show_error('Tanggal dan shift harus dipilih', 404);
		}

		$plant = $this->session->userdata('plant');
		$thermo_data = $this->thermometer_model->get_by_date($tanggal, $plant, $shift);
		$thermo_verif = $this->thermometer_model->get_last_verif_by_date($tanggal, $plant, $shift);

		if (!$thermo_data || !$thermo_verif) {
			show_error('Data tidak ditemukan untuk tanggal dan shift ini.', 404);
		}

    // 🔹 Merge data berdasarkan model + kode_thermo + area + shift
		$merged = [];
		foreach ($thermo_data as $row) {
			$hasil_array = json_decode($row->peneraan_hasil, true);
			if (!is_array($hasil_array)) continue;

			foreach ($hasil_array as $hasil) {
				$model  = $hasil['model'] ?? '-';
				$kode   = $hasil['kode_thermo'] ?? '-';
				$area   = $hasil['area'] ?? '-';
				$pukul  = $hasil['pukul'] ?? '';
				$standar = $hasil['standar'] ?? '';
				$hasil_uji = $hasil['hasil'] ?? '';

				$key = "{$model}|{$kode}|{$area}|{$shift}";

				if (!isset($merged[$key])) {
					$merged[$key] = [
						'model' => $model,
						'kode_thermo' => $kode,
						'area' => $area,
						'checks' => [],
						'tindakan_perbaikan' => $row->tindakan_perbaikan ?? '-',
						'keterangan' => $row->keterangan ?? '-'
					];
				}

				$merged[$key]['checks'][] = [
					'pukul' => $pukul,
					'standar' => $standar,
					'hasil' => $hasil_uji
				];
			}
		}

		$merged_data = array_values($merged);

    // === Mulai cetak PDF ===
		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';
		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false);
		$pdf->SetMargins(17, 16, 15);
		$pdf->AddPage('L', 'LEGAL');
		$pdf->SetFont('times', 'B', 15);

    // Judul dan Header
		$pdf->Image(FCPATH . 'assets/img/logo.jpg', 17, 14, 45);
		$pdf->Write(9, "\n");
		$pdf->MultiCell(0, 5, 'PENERAAN THERMOMETER', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$date = new DateTime($thermo_verif->date);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$pdf->SetFont('times', '', 10);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date . " | Shift: " . $shift);
		$pdf->Ln(5);

    // === Table Header ===
		$pdf->SetFont('times', '', 11);
		$pdf->Cell(10, 15, 'No', 1, 0, 'C');
		$pdf->Cell(32, 15, 'Jenis Thermometer', 1, 0, 'C');
		$pdf->Cell(52, 15, 'Kode / Area', 1, 0, 'C');
		$pdf->Cell(162, 5, 'Hasil Peneraan', 1, 0, 'C');
		$pdf->Cell(34, 15, 'Tindakan Perbaikan', 1, 0, 'C');
		$pdf->Cell(30, 15, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

    // Baris sub-header
		$pdf->SetFont('times', '', 9);
		$pdf->Cell(94, 10, '', 0, 0, 'C');
		for ($i = 1; $i <= 6; $i++) {
			$pdf->Cell(27, 5, 'Check-' . $i, 1, 0, 'C');
		}
		$pdf->Cell(64, 5, '', 0, 1, 'C');

		$pdf->Cell(94, 5, '', 0, 0, 'C');
		for ($i = 0; $i < 6; $i++) {
			$pdf->Cell(9, 5, 'Pukul', 1, 0, 'C');
			$pdf->Cell(9, 5, 'Std', 1, 0, 'C');
			$pdf->Cell(9, 5, 'Hasil', 1, 0, 'C');
		}
		$pdf->Cell(64, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

    // === Isi Tabel ===
		$no = 1;
		foreach ($merged_data as $data) {
			$pdf->SetFont('times', '', 10);
			$pdf->Cell(10, 8, $no++, 1, 0, 'C');
			$pdf->Cell(32, 8, $data['model'], 1, 0, 'C');
			$pdf->Cell(52, 8, $data['kode_thermo'] . " / " . $data['area'], 1, 0, 'C');

			$pdf->SetFont('times', '', 8);
			for ($i = 0; $i < 6; $i++) {
				$p = $data['checks'][$i]['pukul'] ?? '';
				$s = $data['checks'][$i]['standar'] ?? '';
				$h = $data['checks'][$i]['hasil'] ?? '';
				$pdf->Cell(9, 8, $p, 1, 0, 'C');
				$pdf->Cell(9, 8, $s, 1, 0, 'C');
				$pdf->Cell(9, 8, $h, 1, 0, 'C');
			}

			$pdf->Cell(34, 8, $data['tindakan_perbaikan'], 1, 0, 'C');
			$pdf->Cell(30, 8, $data['keterangan'], 1, 0, 'C');
			$pdf->Ln();
		}

// === Bagian setelah isi tabel PDF ===
		$this->load->model('pegawai_model');

// 🔹 Gunakan $thermo_verif, bukan $data['thermometer']
		$thermo_verif->nama_lengkap_qc        = $this->pegawai_model->get_nama_lengkap($thermo_verif->username);
		$thermo_verif->nama_lengkap_spv       = $this->pegawai_model->get_nama_lengkap($thermo_verif->nama_spv);
		$thermo_verif->nama_lengkap_produksi  = $thermo_verif->nama_produksi;

		$y_after_keterangan = $pdf->GetY();

// 🔹 Cek status verifikasi
		$status_verifikasi = true;
		foreach ($thermo_data as $item) {
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
			$pdf->Cell(95, 5, $thermo_verif->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(112, 5, 'QC Inspector', 0, 0, 'C');

    // Diketahui oleh (Produksi)
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(135, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($thermo_verif->status_produksi == 1 && !empty($thermo_verif->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($thermo_verif->tgl_update_produksi))->format('d-m-Y | H:i');
				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $thermo_verif->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
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
			$update_tanggal = (new DateTime($thermo_verif->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $thermo_verif->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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

// format nama file lebih aman
		$formatted_date2 = (new DateTime($thermo_verif->date))->format('Y-m-d');
		$filename = "Peneraan_Thermometer_{$formatted_date2}_Shift{$shift}.pdf";
		$pdf->Output($filename, 'I');


	}
}
