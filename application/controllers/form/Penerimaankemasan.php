<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Penerimaankemasan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('penerimaankemasan_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_data_by_plant(),
			'active_nav' => 'penerimaankemasan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan', $data);
		$this->load->view('partials/footer');
	} 

	public function detail($uuid)
	{
		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_by_uuid($uuid),
			'active_nav' => 'penerimaankemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-detail', $data);
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
		$rules = $this->penerimaankemasan_model->rules();
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
					redirect('penerimaankemasan/tambah');
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			}

			$update = $this->penerimaankemasan_model->insert($file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Penerimaan Kemasan dari Supplier berhasil disimpan');
				redirect('penerimaankemasan');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Penerimaan Kemasan dari Supplier gagal disimpan');
				redirect('penerimaankemasan');
			}
		}

		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_data_by_plant(),
			'active_nav'  => 'penerimaankemasan'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-tambah');
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$penerimaankemasan = $this->penerimaankemasan_model->get_by_uuid($uuid);
		$rules = $this->penerimaankemasan_model->rules();
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
					redirect('penerimaankemasan/edit/' . $uuid); 
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			} else {
				$file_name = $penerimaankemasan->bukti_coa;
			}
			$update = $this->penerimaankemasan_model->update($uuid, $file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Penerimaan Kemasan dari Supplier  berhasil diupdate');
				redirect('penerimaankemasan');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Penerimaan Kemasan dari Supplier  gagal diupdate');
				redirect('penerimaankemasan');
			}
		}
		$data = array(
			'penerimaankemasan' => $penerimaankemasan,
			'active_nav' => 'penerimaankemasan'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('penerimaankemasan');
		}

		$deleted = $this->penerimaankemasan_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('penerimaankemasan');
	}
	
	public function verifikasi()
	{
		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-penerimaankemasan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->penerimaankemasan_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->penerimaankemasan_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Penerimaan Kemasan dari Supplier berhasil di Update');
				redirect('penerimaankemasan/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Penerimaan Kemasan dari Supplier gagal di Update');
				redirect('penerimaankemasan/verifikasi');
			}
		}

		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-penerimaankemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_data_by_plant(),
			'active_nav' => 'diketahui-penerimaankemasan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->penerimaankemasan_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->penerimaankemasan_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Penerimaan Kemasan dari Supplier berhasil di Update');
				redirect('penerimaankemasan/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Penerimaan Kemasan dari Supplier gagal di Update');
				redirect('penerimaankemasan/diketahui');
			}
		}

		$data = array(
			'penerimaankemasan' => $this->penerimaankemasan_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-penerimaankemasan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/penerimaankemasan/penerimaankemasan-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$penerimaankemasan_data = $this->penerimaankemasan_model->get_by_uuid_penerimaankemasan($selected_items);

		$penerimaankemasan_data_verif = $this->penerimaankemasan_model->get_by_uuid_penerimaankemasan_verif($selected_items);

		$data['penerimaankemasan'] = $penerimaankemasan_data_verif;


		if (!$data['penerimaankemasan']) {
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
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN PENERIMAAN KEMASAN DARI SUPPLIER', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');	
		$tanggal = $data['penerimaankemasan']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(17);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['penerimaankemasan']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);
		$pdf->Cell(10, 12, 'No.', 1, 0, 'C');
		$pdf->Cell(35, 12, 'Jenis Kemasan', 1, 0, 'C');
		$pdf->Cell(32, 12, 'Pemasok', 1, 0, 'C');
		$pdf->Cell(28, 12, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Sampel', 1, 0, 'C');
		$pdf->Cell(15, 12, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(90, 6, 'Kondisi Fisik', 1, 0, 'C');
		$pdf->Cell(20, 12, 'Segel', 1, 0, 'C');
		$pdf->Cell(10, 12, 'COA', 1, 0, 'C');
		$pdf->Cell(20, 6, 'Penerimaan', 1, 0, 'C');
		$pdf->Cell(30, 12, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$pdf->Cell(105, 0, '', 0, 0, 'L');
		$pdf->Cell(15, 6, 'Datang', 0, 0, 'C');
		$pdf->Cell(15, 6, 'Pcs', 0, 0, 'C');
		$pdf->Cell(15, 6, 'Reject', 0, 0, 'C');
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(10, 6, 'Warna', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Panjang', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Diameter', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Lebar', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Tinggi', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Berat', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Delaminasi', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Bau', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Desain', 1, 0, 'C');
		$pdf->Cell(30, 6, '', 0, 0, 'C');
		$pdf->Cell(10, 6, 'OK', 1, 0, 'C');
		$pdf->Cell(10, 6, 'Tolak', 1, 0, 'C');
		$pdf->Cell(30, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$no = 1;
		foreach ($penerimaankemasan_data as $penerimaankemasan) {
			$pdf->SetFont('times', '', 11);
			$pdf->Cell(10, 8, $no, 1, 0, 'C');
			$pdf->Cell(35, 8, $penerimaankemasan->jenis_kemasan, 1, 0, 'C');
			$pdf->Cell(32, 8, $penerimaankemasan->pemasok, 1, 0, 'C');
			$pdf->Cell(28, 8, $penerimaankemasan->kode_produksi, 1, 0, 'C');
			$pdf->Cell(15, 8, $penerimaankemasan->jumlah_datang, 1, 0, 'C');
			$pdf->Cell(15, 8, $penerimaankemasan->sampel, 1, 0, 'C');
			$pdf->Cell(15, 8, $penerimaankemasan->jumlah_reject, 1, 0, 'C');
			$pdf->SetFont('dejavusans', '', 10);	
			$pdf->Cell(10, 8, ($penerimaankemasan->warna == 'sesuai') ? '✔' : (($penerimaankemasan->warna == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->panjang == 'sesuai') ? '✔' : (($penerimaankemasan->panjang == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->diameter == 'sesuai') ? '✔' : (($penerimaankemasan->diameter == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->lebar == 'sesuai') ? '✔' : (($penerimaankemasan->lebar == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->tinggi == 'sesuai') ? '✔' : (($penerimaankemasan->tinggi == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->berat == 'sesuai') ? '✔' : (($penerimaankemasan->berat == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->delaminasi == 'sesuai') ? '✔' : (($penerimaankemasan->delaminasi == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->bau == 'sesuai') ? '✔' : (($penerimaankemasan->bau == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 8, ($penerimaankemasan->desain == 'sesuai') ? '✔' : (($penerimaankemasan->desain == 'tidak sesuai') ? '✘' : '−'), 1, 0, 'C');
			$pdf->SetFont('times', '', 11);
			$pdf->Cell(20, 8, $penerimaankemasan->segel, 1, 0, 'C');
			$pdf->SetFont('dejavusans', '', 10);	
			$pdf->Cell(10, 8, ($penerimaankemasan->coa == 'ada') ? '✔' : (($penerimaankemasan->coa == 'tidak ada') ? '✘' : '−'), 1, 0, 'C');

			// $pdf->Cell(20, 8, ($penerimaankemasan->penerimaan == 'ok') ? '✔' : (($penerimaankemasan->penerimaan == 'tolak') ? '✘' : '−'), 1, 0, 'C');
			$pdf->SetFont('times', '', 11);
			$pdf->Cell(20, 8, $penerimaankemasan->penerimaan, 1, 0, 'C');
			$pdf->Cell(30, 8, !empty($penerimaankemasan->keterangan) ? $penerimaankemasan->keterangan : '-', 1, 0, 'C');
			$pdf->Ln();
			$no++;
		}

		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('dejavusans', '', 6);
		$pdf->MultiCell(0, 10, "Keterangan : ✔ Sesuai Standar", 0, 'L');

		$this->load->model('pegawai_model');
		$data['penerimaankemasan']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['penerimaankemasan']->username);
		$data['penerimaankemasan']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['penerimaankemasan']->nama_spv);

		$y_after_keterangan = $pdf->GetY();
		$status_verifikasi = true;
		foreach ($penerimaankemasan_data as $item) {
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
			$pdf->Cell(50, 5, $data['penerimaankemasan']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 9); 
			$pdf->SetXY(60, $y_verifikasi + 15);
			$pdf->Cell(50, 5, 'QC Inspector', 0, 0, 'C');

	// Disetujui oleh (SPV)
			$update_tanggal = (new DateTime($data['penerimaankemasan']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['penerimaankemasan']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Penerimaan Kemasan_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

