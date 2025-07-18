<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Seasoning extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('seasoning_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'seasoning' => $this->seasoning_model->get_data_by_plant(),
			'active_nav' => 'seasoning', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/seasoning/seasoning', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'seasoning' => $this->seasoning_model->get_by_uuid($uuid),
			'active_nav' => 'seasoning');

		$this->load->view('partials/head', $data);
		$this->load->view('form/seasoning/seasoning-detail', $data);
		$this->load->view('partials/footer');
	}

	public function file_check($str)
	{
		if (isset($_FILES['bukti_coa']) && $_FILES['bukti_coa']['error'] != 4) {
			$allowed_mime_types = array('image/jpeg', 'image/png', 'application/pdf');
			$mime_type = $_FILES['bukti_coa']['type'];

			if (!in_array($mime_type, $allowed_mime_types)) {
				$this->form_validation->set_message('file_check', 'File harus berformat JPEG, PNG, atau PDF');
				return false;
			}
		}
		return true;
	}

	public function tambah()
	{
		$rules = $this->seasoning_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$file_name = null;
			if (isset($_FILES['bukti_coa']) && $_FILES['bukti_coa']['error'] != 4) {
				$config = array(
					'upload_path'   => "./uploads/",
					'allowed_types' => "jpg|png|jpeg|pdf",
					'overwrite'     => TRUE,
					'max_size'      => 2048000,
					'encrypt_name'  => TRUE
				);
				$this->upload->initialize($config);

				if (!$this->upload->do_upload('bukti_coa')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error_msg', 'Upload gagal: ' . $error);
					redirect('seasoning/tambah');
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			}

			$update = $this->seasoning_model->insert($file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Seasoning dari Pemasok berhasil disimpan');
				redirect('seasoning');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Seasoning dari Pemasok gagal disimpan');
				redirect('seasoning');
			}
		}

		$data = array(
			'seasoning' => $this->seasoning_model->get_data_by_plant(),
			'active_nav'  => 'seasoning'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/seasoning/seasoning-tambah');
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$seasoning = $this->seasoning_model->get_by_uuid($uuid);
		$rules = $this->seasoning_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$config = array(
				'upload_path' => "./uploads/",
				'allowed_types' => "jpg|png|jpeg|pdf",
				'overwrite' => TRUE,
				'max_size' => "2048000",
				'encrypt_name' => TRUE
			);

			$this->upload->initialize($config);

			if (!empty($_FILES['bukti_coa']['name'])) {
				if (!$this->upload->do_upload('bukti_coa')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error_msg', 'Upload failed: ' . $error);
					redirect('seasoning/edit/' . $uuid); 
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			} else {
				$file_name = $seasoning->bukti_coa;
			}
			$update = $this->seasoning_model->update($uuid, $file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Seasoning dari Pemasok berhasil diupdate');
				redirect('seasoning');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Seasoning dari Pemasok gagal diupdate');
				redirect('seasoning');
			}
		}
		$data = array(
			'seasoning' => $seasoning,
			'active_nav' => 'seasoning'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/seasoning/seasoning-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('seasoning');
		}

		$deleted = $this->seasoning_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('seasoning');
	}
	
	public function verifikasi()
	{
		$data = array(
			'seasoning' => $this->seasoning_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-seasoning', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/seasoning/seasoning-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->seasoning_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->seasoning_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Seasoning dari Pemasok berhasil di Update');
				redirect('seasoning/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Seasoning dari Pemasok gagal di Update');
				redirect('seasoning/verifikasi');
			}
		}

		$data = array(
			'seasoning' => $this->seasoning_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-seasoning');

		$this->load->view('partials/head', $data);
		$this->load->view('form/seasoning/seasoning-status', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$seasoning_data = $this->seasoning_model->get_by_uuid_seasoning($selected_items);

		$seasoning_data_verif = $this->seasoning_model->get_by_uuid_seasoning_verif($selected_items);

		$data['seasoning'] = $seasoning_data_verif;


		if (!$data['seasoning']) {
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
			$pdf->Image($logo_path, 17, 14, 45);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(9, "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN SEASONING DARI PEMASOK', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');	
		$tanggal = $data['seasoning']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(17);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->Ln(6);

		$pdf->SetFont('times', '', 8);
		$pdf->Cell(6, 15, 'No.', 1, 0, 'C');
		$pdf->Cell(25, 15, 'Jenis Seasoning', 1, 0, 'C');
		$pdf->Cell(20, 15, 'Spesifikasi', 1, 0, 'C');
		$pdf->Cell(23, 15, 'Pemasok', 1, 0, 'C');
		$pdf->Cell(20, 15, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(20, 15, 'Exp. Date', 1, 0, 'C');
		$pdf->Cell(15, 15, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(15, 15, 'Sampel', 1, 0, 'C');
		$pdf->Cell(15, 15, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(24, 5, 'Kondisi Fisik', 1, 0, 'C');
		$pdf->Cell(14, 10, 'Logo', 1, 0, 'C');
		$pdf->Cell(10, 15, 'Kadar', 1, 0, 'C');
		$pdf->Cell(18, 15, 'Negara Asal', 1, 0, 'C');
		$pdf->Cell(15, 15, 'Segel', 1, 0, 'C');
		$pdf->Cell(16, 5, 'Penerimaan', 1, 0, 'C');
		$pdf->Cell(30, 5, 'Persyaratan Dokumen', 1, 0, 'C');
		$pdf->Cell(14, 5, 'Allergen', 1, 0, 'C');
		$pdf->Cell(20, 15, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$pdf->Cell(114, 0, '', 0, 0, 'L');
		$pdf->Cell(15, 10, 'Barang', 0, 0, 'C');
		$pdf->Cell(15, 10, '', 0, 0, 'C');
		$pdf->Cell(15, 10, 'Reject', 0, 0, 'C');
		$pdf->SetFont('times', '', 5);
		$pdf->Cell(6, 10, 'Kemasan', 1, 0, 'C');
		$pdf->Cell(6, 10, 'Warna', 1, 0, 'C');
		$pdf->Cell(6, 10, 'Kotoran', 1, 0, 'C');
		$pdf->Cell(6, 10, 'Aroma', 1, 0, 'C');
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(14, 5, 'Halal', 0, 0, 'C');
		$pdf->Cell(10, 10, 'Air (%)', 0, 0, 'C');
		$pdf->Cell(18, 10, 'Dibuatnya', 0, 0, 'C');
		$pdf->Cell(15, 10, '', 0, 0, 'C');
		$pdf->Cell(8, 10, 'OK', 1, 0, 'C');
		$pdf->Cell(8, 10, 'Tolak', 1, 0, 'C');
		$pdf->Cell(20, 5, 'Halal', 1, 0, 'C');
		$pdf->Cell(10, 10, 'COA', 1, 0, 'C');
		$pdf->Cell(7, 10, 'A', 1, 0, 'C');
		$pdf->Cell(7, 10, 'NA', 1, 0, 'C');
		$pdf->Cell(20, 0, '', 0, 0, 'C');
		$pdf->Cell(5, 0, '', 0, 0, 'C');
		$pdf->Cell(5, 5, '', 0, 1, 'C');

		$pdf->Cell(183, 0, '', 0, 0, 'L');
		$pdf->Cell(7, 5, 'Ada', 1, 0, 'C');
		$pdf->Cell(7, 5, 'Tdk', 1, 0, 'C');
		$pdf->Cell(59, 0, '', 0, 0, 'C');
		$pdf->SetFont('times', '', 5);
		$pdf->Cell(10, 5, 'Berlaku', 1, 0, 'C');
		$pdf->Cell(10, 5, 'Tdk Berlaku', 1, 0, 'C');
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(34, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$no = 1;
		foreach ($seasoning_data as $seasoning) {
			$exp = $seasoning->expired;
			$exp = new DateTime($exp); 	
			$exp = $exp->format('d-m-Y');
			$pdf->SetFont('times', '', 9);
			$pdf->Cell(6, 8, $no, 1, 0, 'C');
			$pdf->Cell(25, 8, $seasoning->jenis_seasoning, 1, 0, 'C');
			$pdf->Cell(20, 8, $seasoning->spesifikasi, 1, 0, 'C');
			$pdf->Cell(23, 8, $seasoning->pemasok, 1, 0, 'C');
			$pdf->Cell(20, 8, $seasoning->kode_produksi, 1, 0, 'C');
			$pdf->Cell(20, 8, $exp, 1, 0, 'C');
			$pdf->Cell(15, 8, $seasoning->jumlah_barang, 1, 0, 'C');
			$pdf->Cell(15, 8, $seasoning->sampel, 1, 0, 'C');
			$pdf->Cell(15, 8, $seasoning->jumlah_reject, 1, 0, 'C');
			$pdf->SetFont('dejavusans', '', 8);	
			$pdf->Cell(6, 8, ($seasoning->kemasan == 'sesuai') ? '✔' : (($seasoning->kemasan == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(6, 8, ($seasoning->warna == 'sesuai') ? '✔' : (($seasoning->warna == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(6, 8, ($seasoning->kotoran == 'sesuai') ? '✔' : (($seasoning->kotoran == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(6, 8, ($seasoning->aroma == 'sesuai') ? '✔' : (($seasoning->aroma == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->SetFont('times', '', 7);
			$pdf->Cell(14, 8, $seasoning->logo_halal, 1, 0, 'C');
			$pdf->Cell(10, 8, $seasoning->kadar_air, 1, 0, 'C');
			$pdf->Cell(18, 8, $seasoning->negara_asal, 1, 0, 'C');
			$pdf->Cell(15, 8, $seasoning->segel, 1, 0, 'C');
			$pdf->Cell(16, 8, $seasoning->penerimaan, 1, 0, 'C');
			$pdf->Cell(20, 8, $seasoning->sertif_halal, 1, 0, 'C');
			$pdf->Cell(10, 8, $seasoning->coa, 1, 0, 'C');
			$pdf->Cell(14, 8, $seasoning->allergen, 1, 0, 'C');
			$pdf->Cell(20, 8, !empty($seasoning->keterangan) ? $seasoning->keterangan : '-', 1, 0, 'C');
			$pdf->Ln();
			$no++;
		}

		$this->load->model('pegawai_model');
		$data['seasoning']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['seasoning']->username);
		$data['seasoning']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['seasoning']->nama_spv);

// 1. KETERANGAN
		$pdf->SetY($pdf->GetY() + 2);
		$pdf->SetFont('dejavusans', '', 7);	
		$pdf->SetX(17); 
		$pdf->Cell(30, 5, 'Keterangan : ', 0, 0, 'L');
		$pdf->Ln(4);
		$pdf->SetX(17); 
		$pdf->Cell(60, 3, '(✔) Sesuai Spesifikasi/Standar', 0, 0, 'L');
		$pdf->Cell(50, 3, '(A) Allergen', 0, 1, 'L'); 
		$pdf->SetX(17); 
		$pdf->Cell(60, 3, '(✘) Tidak Sesuai Spesifikasi/Standar', 0, 0, 'L');
		$pdf->Cell(50, 3, '(NA) NonAllergen', 0, 1, 'L');

// 2. CATATAN
		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($seasoning_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 5;
		$status_verifikasi = true;
		foreach ($seasoning_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break;
			}
		}

// 3. VERIFIKASI & QR CODE
		$pdf->SetFont('times', '', 9);
		$pdf->SetTextColor(0, 0, 0);

		if ($status_verifikasi) {
			$y_verifikasi = $y_after_keterangan;

	// Dibuat oleh (QC)
			$pdf->SetXY(60, $y_verifikasi);
			$pdf->Cell(50, 5, 'Diperiksa Oleh,', 0, 0, 'C');
			$pdf->SetXY(60, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 9);
			$pdf->Cell(50, 5, $data['seasoning']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 9); 
			$pdf->SetXY(60, $y_verifikasi + 15);
			$pdf->Cell(50, 5, 'QC Inspector', 0, 0, 'C');

	// Disetujui oleh (SPV)
			$update_tanggal = (new DateTime($data['seasoning']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['seasoning']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
			$pdf->SetXY(160, $y_verifikasi);
			$pdf->Cell(150, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($qr_text, 'QRCODE,L', 227, $y_verifikasi + 5, 16, 16, null, 'N');
			$pdf->SetXY(160, $y_verifikasi + 20);
			$pdf->Cell(150, 5, 'Supervisor QC', 0, 0, 'C');

		} else {
			$pdf->SetTextColor(255, 0, 0); 
			$pdf->SetFont('times', '', 9);
			$pdf->SetXY(200, $y_after_keterangan);
			$pdf->Cell(80, 5, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		$filename = "Pemeriksaan Seasoning_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

