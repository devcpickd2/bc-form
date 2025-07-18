<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Pemeriksaanchemical extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('pemeriksaanchemical_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){ 
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'pemeriksaanchemical' => $this->pemeriksaanchemical_model->get_data_by_plant(),
			'active_nav' => 'pemeriksaanchemical', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pemeriksaanchemical/pemeriksaanchemical', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'pemeriksaanchemical' => $this->pemeriksaanchemical_model->get_by_uuid($uuid),
			'active_nav' => 'pemeriksaanchemical');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pemeriksaanchemical/pemeriksaanchemical-detail', $data);
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
		$rules = $this->pemeriksaanchemical_model->rules();
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
					redirect('pemeriksaanchemical/tambah');
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			}

			$update = $this->pemeriksaanchemical_model->insert($file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Chemical dari Supplier berhasil disimpan');
				redirect('pemeriksaanchemical');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Chemical dari Supplier gagal disimpan');
				redirect('pemeriksaanchemical');
			}
		}

		$data = array(
			'pemeriksaanchemical' => $this->pemeriksaanchemical_model->get_data_by_plant(),
			'active_nav'  => 'pemeriksaanchemical'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pemeriksaanchemical/pemeriksaanchemical-tambah');
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$pemeriksaanchemical = $this->pemeriksaanchemical_model->get_by_uuid($uuid);
		$rules = $this->pemeriksaanchemical_model->rules();
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
					redirect('pemeriksaanchemical/edit/' . $uuid); 
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			} else {
				$file_name = $pemeriksaanchemical->bukti_coa;
			}
			$update = $this->pemeriksaanchemical_model->update($uuid, $file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Chemical dari Supplier berhasil diupdate');
				redirect('pemeriksaanchemical');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Chemical dari Supplier gagal diupdate');
				redirect('pemeriksaanchemical');
			}
		}
		$data = array(
			'pemeriksaanchemical' => $pemeriksaanchemical,
			'active_nav' => 'pemeriksaanchemical'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pemeriksaanchemical/pemeriksaanchemical-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('pemeriksaanchemical');
		}

		$deleted = $this->pemeriksaanchemical_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('pemeriksaanchemical');
	}
	
	public function verifikasi()
	{
		$data = array(
			'pemeriksaanchemical' => $this->pemeriksaanchemical_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-pemeriksaanchemical', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pemeriksaanchemical/pemeriksaanchemical-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->pemeriksaanchemical_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->pemeriksaanchemical_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Chemical dari Supplier berhasil di Update');
				redirect('pemeriksaanchemical/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Chemical dari Supplier gagal di Update');
				redirect('pemeriksaanchemical/verifikasi');
			}
		}

		$data = array(
			'pemeriksaanchemical' => $this->pemeriksaanchemical_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-pemeriksaanchemical');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pemeriksaanchemical/pemeriksaanchemical-status', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$pemeriksaanchemical_data = $this->pemeriksaanchemical_model->get_by_uuid_pemeriksaanchemical($selected_items);

		$pemeriksaanchemical_data_verif = $this->pemeriksaanchemical_model->get_by_uuid_pemeriksaanchemical_verif($selected_items);

		$data['pemeriksaanchemical'] = $pemeriksaanchemical_data_verif;


		if (!$data['pemeriksaanchemical']) {
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
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN CHEMICAL DARI SUPPLIER', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');	
		$tanggal = $data['pemeriksaanchemical']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(17);
		$label_width = 35; 
		$value_width = 80;
		$pdf->Cell($label_width, 5, 'Hari / Tanggal', 0, 0); 
		$pdf->Cell(2, 5, ':', 0, 0); 
		$pdf->Cell($value_width, 5, $formatted_date, 0, 1);

		$pdf->Cell($label_width, 5, 'Shift', 0, 0); 
		$pdf->Cell(2, 5, ':', 0, 0); 
		$pdf->Cell($value_width, 5, $data['pemeriksaanchemical']->shift, 0, 1);
		$pdf->Ln(1);

		$pdf->SetFont('times', '', 11);
		$pdf->Cell(10, 12, 'No.', 1, 0, 'C');
		$pdf->Cell(35, 12, 'Jenis Chemical', 1, 0, 'C');
		$pdf->Cell(32, 12, 'Pemasok', 1, 0, 'C');
		$pdf->Cell(28, 12, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(23, 12, 'Exp. Date', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Sampel', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(45, 6, 'Kondisi Fisik', 1, 0, 'C');
		$pdf->Cell(25, 6, 'Dokumen Halal', 1, 0, 'C');
		$pdf->Cell(20, 12, 'Segel', 1, 0, 'C');
		$pdf->Cell(10, 12, 'COA', 1, 0, 'C');
		$pdf->Cell(20, 6, 'Penerimaan', 1, 0, 'C');
		$pdf->Cell(30, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$pdf->Cell(128, 0, '', 0, 0, 'L');
		$pdf->Cell(15, 6, 'Barang', 0, 0, 'C');
		$pdf->Cell(15, 6, '', 0, 0, 'C');
		$pdf->Cell(15, 6, 'Reject', 0, 0, 'C');
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(15, 6, 'Kemasan', 1, 0, 'C');
		$pdf->Cell(15, 6, 'Warna', 1, 0, 'C');
		$pdf->Cell(15, 6, 'pH', 1, 0, 'C');
		$pdf->Cell(12, 6, 'Berlaku', 1, 0, 'C');
		$pdf->Cell(13, 6, 'Tdk Berlaku', 1, 0, 'C');
		$pdf->Cell(30, 6, '', 0, 0, 'C');
		$pdf->Cell(10, 6, 'OK', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Tolak', 1, 0, 'C');
		$pdf->Cell(30, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$no = 1;
		foreach ($pemeriksaanchemical_data as $pemeriksaanchemical) {
			$exp = $pemeriksaanchemical->expired;
			$exp = new DateTime($exp); 
			$exp = $exp->format('d-m-Y');
			$pdf->SetFont('times', '', 9);
			$pdf->Cell(10, 8, $no, 1, 0, 'C');
			$pdf->Cell(35, 8, $pemeriksaanchemical->jenis_chemical, 1, 0, 'C');
			$pdf->Cell(32, 8, $pemeriksaanchemical->pemasok, 1, 0, 'C');
			$pdf->Cell(28, 8, $pemeriksaanchemical->kode_produksi, 1, 0, 'C');
			$pdf->Cell(23, 8, $exp, 1, 0, 'C');
			$pdf->Cell(15, 8, $pemeriksaanchemical->jumlah_barang, 1, 0, 'C');
			$pdf->Cell(15, 8, $pemeriksaanchemical->sampel, 1, 0, 'C');
			$pdf->Cell(15, 8, $pemeriksaanchemical->jumlah_reject, 1, 0, 'C');
			$pdf->SetFont('dejavusans', '', 9);	
			$pdf->Cell(15, 8, ($pemeriksaanchemical->kemasan == 'sesuai') ? '✔' : (($pemeriksaanchemical->kemasan == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(15, 8, ($pemeriksaanchemical->warna == 'sesuai') ? '✔' : (($pemeriksaanchemical->warna == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->SetFont('times', '', 9);
			$pdf->Cell(15, 8, $pemeriksaanchemical->ph, 1, 0, 'C');
			$pdf->Cell(25, 8, $pemeriksaanchemical->halal_berlaku, 1, 0, 'C');
			$pdf->Cell(20, 8, $pemeriksaanchemical->segel, 1, 0, 'C');
			$pdf->SetFont('dejavusans', '', 9);	
			$pdf->Cell(10, 8, ($pemeriksaanchemical->coa == 'ada') ? '✔' : (($pemeriksaanchemical->coa == 'tidak ada') ? '✘' : '−'), 1, 0, 'C');
			$pdf->SetFont('times', '', 9);
			$pdf->Cell(20, 8, $pemeriksaanchemical->penerimaan, 1, 0, 'C');
			$pdf->Cell(30, 8, !empty($pemeriksaanchemical->keterangan) ? $pemeriksaanchemical->keterangan : '-', 1, 0, 'C');
			$pdf->Ln();
			$no++;
		}

		$this->load->model('pegawai_model');
		$data['pemeriksaanchemical']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['pemeriksaanchemical']->username);
		$data['pemeriksaanchemical']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['pemeriksaanchemical']->nama_spv);

		$pdf->SetY($pdf->GetY() +3); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($pemeriksaanchemical_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 5;
		$status_verifikasi = true;
		foreach ($pemeriksaanchemical_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break;
			}
		}

		$pdf->SetFont('times', '', 9);
		$pdf->SetTextColor(0, 0, 0);

		if ($status_verifikasi) {
			$y_verifikasi = $y_after_keterangan;

	// Dibuat oleh (QC)
			$pdf->SetXY(60, $y_verifikasi);
			$pdf->Cell(50, 5, 'Dibuat Oleh,', 0, 0, 'C');
			$pdf->SetXY(60, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 9);
			$pdf->Cell(50, 5, $data['pemeriksaanchemical']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 9); 
			$pdf->SetXY(60, $y_verifikasi + 15);
			$pdf->Cell(50, 5, 'QC Inspector', 0, 0, 'C');

	// Disetujui oleh (SPV)
			$update_tanggal = (new DateTime($data['pemeriksaanchemical']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['pemeriksaanchemical']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Penerimaan Chemical_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

