<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Sensori extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('auth_model'); 
		$this->load->model('sensori_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'sensori' => $this->sensori_model->get_data_by_plant(),
			'active_nav' => 'sensori', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'sensori' => $this->sensori_model->get_by_uuid($uuid),
			'active_nav' => 'sensori');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->sensori_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->sensori_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Laporan Sensori Finish Good berhasil di simpan');
				redirect('sensori');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Laporan Sensori Finish Good gagal di simpan');
				redirect('sensori');
			}
		}

		$data = array(
			'active_nav' => 'sensori');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->sensori_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->sensori_model->update($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Laporan Sensori Finish Good berhasil diupdate.');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Laporan Sensori Finish Good gagal diupdate.');
			}

			redirect('sensori');
		}

		$data = [
			'sensori' => $this->sensori_model->get_by_uuid($uuid),
			'bagian_list' => $this->sensori_model->get_bagian_by_uuid($uuid),
			'active_nav' => 'sensori'
		];

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('sensori');
		}

		$deleted = $this->sensori_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('sensori');
	}

	public function verifikasi()
	{
		$data = array(
			'sensori' => $this->sensori_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-sensori', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->sensori_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->sensori_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Laporan Sensori Finish Good berhasil di Update');
				redirect('sensori/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Laporan Sensori Finish Good gagal di Update');
				redirect('sensori/verifikasi');
			}
		}

		$data = array(
			'sensori' => $this->sensori_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-sensori');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'sensori' => $this->sensori_model->get_data_by_plant(),
			'active_nav' => 'diketahui-sensori', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->sensori_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->sensori_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Laporan Sensori Finish Good berhasil di Update');
				redirect('sensori/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Laporan Sensori Finish Good gagal di Update');
				redirect('sensori/diketahui');
			}
		}

		$data = array(
			'sensori' => $this->sensori_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-sensori');

		$this->load->view('partials/head', $data);
		$this->load->view('form/sensori/sensori-statusprod', $data);
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

		$sensori_data = $this->sensori_model->get_by_date($tanggal, $plant); 
		$sensori_data_verif = $this->sensori_model->get_last_verif_by_date($tanggal, $plant); 

		if (!$sensori_data || !$sensori_data_verif) {
			show_error('Data tidak ditemukan, Pilih tanggal yang ingin dicetak', 404);
		}

		$data['sensori'] = $sensori_data_verif;

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
		$pdf->MultiCell(0, 5, 'LAPORAN SENSORI FINISH GOOD', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['sensori']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Hari / Tanggal : ' . $formatted_date);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 10);

		$pdf->Cell(25, 10, 'Nama Produk', 1, 0, 'C');
		$pdf->Cell(25, 10, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(25, 10, 'Best Before', 1, 0, 'C');
		$pdf->Cell(75, 5, 'Sensori Produk', 1, 0, 'C');
		$pdf->Cell(26, 10, 'Tindakan', 1, 0, 'C');
		$pdf->Cell(15, 10, 'QC', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$pdf->SetFont('times', '', 7);
		$pdf->Cell(75, 10, '', 0, 0, 'L');
		$pdf->Cell(15, 5, 'Warna', 1, 0, 'C');
		$pdf->Cell(15, 5, 'Tekstur', 1, 0, 'C');
		$pdf->Cell(15, 5, 'Rasa', 1, 0, 'C');
		$pdf->Cell(15, 5, 'Aroma', 1, 0, 'C');
		$pdf->Cell(15, 5, 'Kenampakan', 1, 0, 'C');
		$pdf->SetFont('times', '', 10);
		$pdf->Cell(26, 5, 'Koreksi', 0, 0, 'C');
		$pdf->Cell(10, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		function formatStatus($status) {
			return $status == "Ok" ? "✓" : "✗";
		}
		foreach ($sensori_data as $sensori) {
			$produk = json_decode($sensori->produk);

			if ($produk && is_array($produk)) {
				$rowCount = count($produk);
				$rowHeight = 7;

				foreach ($produk as $index => $item) {
					$kode_produksi = $item->kode_produksi ?? '-';
					$best_before = $item->best_before ?? '-';
					$warna = $item->warna ?? '-';
					$tekstur = $item->tekstur ?? '-';
					$rasa = $item->rasa ?? '-';
					$aroma = $item->aroma ?? '-';
					$kenampakan = $item->kenampakan ?? '-';

					$pdf->SetFont('times', '', 8);

            // Kolom: Nama Produk (hanya di baris pertama)
					if ($index == 0) {
						$pdf->Cell(25, $rowHeight, $sensori->nama_produk, 1, 0, 'C');
					} else {
						$pdf->Cell(25, $rowHeight, '', 1, 0);
					}

            // Kolom: Kode Produksi & Best Before
					$pdf->Cell(25, $rowHeight, $kode_produksi, 1, 0, 'C');
					$pdf->Cell(25, $rowHeight, $best_before, 1, 0, 'C');

            // Kolom: Sensori
					$pdf->SetFont('dejavusans', '', 8);
					$pdf->Cell(15, $rowHeight, formatStatus($warna), 1, 0, 'C');    
					$pdf->Cell(15, $rowHeight, formatStatus($tekstur), 1, 0, 'C');
					$pdf->Cell(15, $rowHeight, formatStatus($rasa), 1, 0, 'C');
					$pdf->Cell(15, $rowHeight, formatStatus($aroma), 1, 0, 'C');
					$pdf->Cell(15, $rowHeight, formatStatus($kenampakan), 1, 0, 'C');

            // Kolom: Tindakan Koreksi dan QC (hanya di baris pertama)
					$pdf->SetFont('times', '', 8);
					if ($index == 0) {
						$pdf->Cell(26, $rowHeight, $sensori->tindakan, 1, 0, 'C');
						$pdf->Cell(15, $rowHeight, $sensori->username, 1, 0, 'C');
					} else {
						$pdf->Cell(26, $rowHeight, '', 1, 0); 
						$pdf->Cell(15, $rowHeight, '', 1, 0); 
					}

					$pdf->Ln($rowHeight);
				}
			}
		}
		
		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('dejavusans', '', 6);
		$pdf->MultiCell(0, 10, "✓ : Ok, tidak ditemukan ketidaksesuaian atau penyimpanan sensori produk\n✗ : Tidak Ok, ditemukan ketidaksesuaian atau penyimpanan sensori produk", 0, 'L');

		$this->load->model('pegawai_model');
		$data['sensori']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['sensori']->username);
		$data['sensori']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['sensori']->nama_spv);
		$data['sensori']->nama_lengkap_produksi = $data['sensori']->nama_produksi;

		$pdf->SetY($pdf->GetY()); 
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($sensori_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY();
		$status_verifikasi = true;
		foreach ($sensori_data as $item) {
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
			$pdf->Cell(35, 5, $data['sensori']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

		// // Diketahui oleh (Produksi)
		// 	$pdf->SetXY(90, $y_verifikasi + 5);
		// 	$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
		// 	if ($data['sensori']->status_produksi == 1 && !empty($data['sensori']->nama_produksi)) {
		// 		$update_tanggal_produksi = (new DateTime($data['sensori']->tgl_update_produksi))->format('d-m-Y | H:i');
		// 		$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['sensori']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
		// 		$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
		// 		$pdf->SetXY(90, $y_verifikasi + 24);
		// 		$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
		// 	} else {
		// 		$pdf->SetXY(90, $y_verifikasi + 10);
		// 		$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
		// 	}

// Diketahui oleh (Produksi)
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');

			if ($data['sensori']->status_produksi == 1 && !empty($data['sensori']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['sensori']->tgl_update_produksi))->format('d-m-Y | H:i');

				$pdf->SetFont('times', 'U', 8);
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, $data['sensori']->nama_produksi, 0, 1, 'C');

				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 15);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 1, 'C');

				// $pdf->SetXY(90, $y_verifikasi + 20);
				// $pdf->Cell(35, 5, $update_tanggal_produksi, 0, 0, 'C');
			} else {
				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

		// Disetujui oleh (SPV)
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['sensori']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['sensori']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Sensori Finish Good_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}
}

