<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontaminasi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');  
		$this->load->model('kontaminasi_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'kontaminasi' => $this->kontaminasi_model->get_data_by_plant(),
			'active_nav' => 'kontaminasi', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kontaminasi/kontaminasi', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'kontaminasi' => $this->kontaminasi_model->get_by_uuid($uuid),
			'active_nav' => 'kontaminasi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kontaminasi/kontaminasi-detail', $data);
		$this->load->view('partials/footer');
	}


	public function file_check($str)
	{
		$allowed_mime_types = array('image/jpeg', 'image/png', 'application/pdf');
		$mime_type = $_FILES['bukti']['type'];

		if (!in_array($mime_type, $allowed_mime_types)) {
			$this->form_validation->set_message('file_check', 'File harus berformat JPEG, PNG, atau PDF');
			return false;
		}

		return true;
	}

	public function tambah()
	{
		$rules = $this->kontaminasi_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$config = array(
				'upload_path'   => "./uploads/kontaminasi/",
				'allowed_types' => "jpg|png|jpeg|pdf", 
				'overwrite'     => TRUE,
				'max_size'      => 2048, 
				'encrypt_name'  => TRUE
			);

			$this->upload->initialize($config);

			if (!$this->upload->do_upload('bukti')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error_msg', 'Upload gagal: ' . $error);
				redirect('kontaminasi/tambah');
			} else {
				$data = $this->upload->data();
				$file_name = $data['file_name'];

			// === Kompres Gambar Jika Bukan PDF ===
				if ($data['file_ext'] != '.pdf') {
					$this->load->library('image_lib');

					$resize_config = array(
						'image_library'  => 'gd2',
						'source_image'   => './uploads/kontaminasi/' . $file_name,
						'maintain_ratio' => TRUE,
						'quality'        => '70%',
						'width'          => 800,
						'height'         => 800
					);

				$this->image_lib->clear(); // penting!
				$this->image_lib->initialize($resize_config);

				if (!$this->image_lib->resize()) {
					log_message('error', 'Image compression failed: ' . $this->image_lib->display_errors());
				}
			}

			$update = $this->kontaminasi_model->insert($file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kontaminasi Benda Asing berhasil disimpan');
				redirect('kontaminasi');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Kontaminasi Benda Asing gagal disimpan');
				redirect('kontaminasi');
			}
		}
	}

	$data = array(
		'kontaminasi' => $this->kontaminasi_model->get_data_by_plant(),
		'active_nav'  => 'kontaminasi'
	);

	$this->load->view('partials/head', $data);
	$this->load->view('form/kontaminasi/kontaminasi-tambah');
	$this->load->view('partials/footer');
}

public function edit($uuid)
{
	$kontaminasi = $this->kontaminasi_model->get_by_uuid($uuid);
	$rules = $this->kontaminasi_model->rules();
	$this->form_validation->set_rules($rules);

	if ($this->form_validation->run() == TRUE) {
		$config = array(
			'upload_path' => "./uploads/kontaminasi/",
			'allowed_types' => "jpg|png|jpeg|pdf",
			'overwrite' => TRUE,
			'max_size' => "2048",
			'encrypt_name' => TRUE
		);

		$this->upload->initialize($config);

		if (!empty($_FILES['bukti']['name'])) {
			if (!$this->upload->do_upload('bukti')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error_msg', 'Upload failed: ' . $error);
				redirect('kontaminasi/edit/' . $uuid); 
			} else {
				$data = $this->upload->data();
				$file_name = $data['file_name'];

				// === Kompres Gambar Jika Bukan PDF ===
				if ($data['file_ext'] != '.pdf') {
					$this->load->library('image_lib');

					$resize_config = array(
						'image_library'  => 'gd2',
						'source_image'   => './uploads/kontaminasi/' . $file_name,
						'maintain_ratio' => TRUE,
						'quality'        => '70%',
						'width'          => 800,
						'height'         => 800
					);

					$this->image_lib->clear(); // penting
					$this->image_lib->initialize($resize_config);

					if (!$this->image_lib->resize()) {
						log_message('error', 'Image compression failed: ' . $this->image_lib->display_errors());
					}
				}

				// Hapus file lama
				if (!empty($kontaminasi->bukti) && file_exists('./uploads/kontaminasi/' . $kontaminasi->bukti)) {
					unlink('./uploads/kontaminasi/' . $kontaminasi->bukti);
				}
			}
		} else {
			$file_name = $kontaminasi->bukti;
		}

		$update = $this->kontaminasi_model->update($uuid, $file_name);

		if ($update) {
			$this->session->set_flashdata('success_msg', 'Data Kontaminasi Benda Asing berhasil diupdate');
			redirect('kontaminasi');
		} else {
			$this->session->set_flashdata('error_msg', 'Data Kontaminasi Benda Asing gagal diupdate');
			redirect('kontaminasi');
		}
	}

	$data = array(
		'kontaminasi' => $kontaminasi,
		'active_nav' => 'kontaminasi'
	);

	$this->load->view('partials/head', $data);
	$this->load->view('form/kontaminasi/kontaminasi-edit', $data);
	$this->load->view('partials/footer');
}

public function delete($uuid)
{
	if (!$uuid) {
		$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
		redirect('kontaminasi');
	}

	$deleted = $this->kontaminasi_model->delete_by_uuid($uuid);

	if ($deleted) {
		$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
	} else {
		$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
	}

	redirect('kontaminasi');
}

public function verifikasi()
{
	$data = array(
		'kontaminasi' => $this->kontaminasi_model->get_data_by_plant(),
		'active_nav' => 'verifikasi-kontaminasi', 
	);

	$this->load->view('partials/head', $data);
	$this->load->view('form/kontaminasi/kontaminasi-verifikasi', $data);
	$this->load->view('partials/footer');
}

public function status($uuid)
{
	$rules = $this->kontaminasi_model->rules_verifikasi();
	$this->form_validation->set_rules($rules);

	if ($this->form_validation->run() == TRUE) {
		$update = $this->kontaminasi_model->verifikasi_update($uuid);
		if ($update) {
			$this->session->set_flashdata('success_msg', 'Status Kontaminasi Benda Asing berhasil di Update');
			redirect('kontaminasi/verifikasi');
		} else {
			$this->session->set_flashdata('error_msg', 'Status Kontaminasi Benda Asing gagal di Update');
			redirect('kontaminasi/verifikasi');
		}
	}

	$data = array(
		'kontaminasi' => $this->kontaminasi_model->get_by_uuid($uuid),
		'active_nav' => 'verifikasi-kontaminasi'
	);

	$this->load->view('partials/head', $data);
	$this->load->view('form/kontaminasi/kontaminasi-status', $data);
	$this->load->view('partials/footer');
}

public function diketahui()
{
	$data = array(
		'kontaminasi' => $this->kontaminasi_model->get_data_by_plant(),
		'active_nav' => 'diketahui-kontaminasi', 
	);

	$this->load->view('partials/head', $data);
	$this->load->view('form/kontaminasi/kontaminasi-diketahui', $data);
	$this->load->view('partials/footer');
}

public function statusprod($uuid)
{
	$rules = $this->kontaminasi_model->rules_diketahui();
	$this->form_validation->set_rules($rules);

	if ($this->form_validation->run() == TRUE) {
		$update = $this->kontaminasi_model->diketahui_update($uuid);
		if ($update) {
			$this->session->set_flashdata('success_msg', 'Status Kontaminasi Benda Asing berhasil di Update');
			redirect('kontaminasi/diketahui');
		} else {
			$this->session->set_flashdata('error_msg', 'Status Kontaminasi Benda Asing gagal di Update');
			redirect('kontaminasi/diketahui');
		}
	}

	$data = array(
		'kontaminasi' => $this->kontaminasi_model->get_by_uuid($uuid),
		'active_nav' => 'diketahui-kontaminasi'
	);

	$this->load->view('partials/head', $data);
	$this->load->view('form/kontaminasi/kontaminasi-statusprod', $data);
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

	$kontaminasi_data = $this->kontaminasi_model->get_by_date($tanggal, $plant); 
	$kontaminasi_data_verif = $this->kontaminasi_model->get_last_verif_by_date($tanggal, $plant); 

	if (!$kontaminasi_data || !$kontaminasi_data_verif) {
		show_error('Data tidak ditemukan, Pilih tanggal yang ingin dicetak', 404);
	}

	$data['kontaminasi'] = $kontaminasi_data_verif;
	
	require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

	$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
	$pdf->setPrintHeader(false); 
	$pdf->SetMargins(17, 16, 15); 
	$pdf->AddPage('L', 'LEGAL');
	$pdf->SetFont('times', 'B', 14);

	$logo_path = FCPATH . 'assets/img/logo.jpg';
	if (file_exists($logo_path)) {
		$pdf->Image($logo_path, 17, 14, 45);
	} else {
		$pdf->Write(7, "Logo tidak ditemukan\n");
	}

	$pdf->Write(10, "\n");
	$pdf->MultiCell(0, 5, 'PEMERIKSAAN KONTAMINASI BENDA ASING', 0, 'C');
	$pdf->Ln(5);

	setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
	$tanggal = $data['kontaminasi']->date;
	$datetime = new DateTime($tanggal);
	$formatted_date = strftime('%A, %d %B %Y', $datetime->getTimestamp());
	$formatted_date2 = strftime('%d %B %Y', $datetime->getTimestamp());

	$pdf->SetFont('times', '', 9);
	$pdf->SetX(16);
	$pdf->Write(0, 'Tanggal: ' . $formatted_date);
	$pdf->SetX($pdf->GetX() + 20);
	$pdf->Write(0, 'Shift: ' . $data['kontaminasi']->shift);
	$pdf->Ln(5);

	$pdf->SetFont('times', '', 9); 
	$pdf->Cell(15, 10, 'Pukul', 1, 0, 'C');
	$pdf->Cell(30, 10, 'Jenis Kontaminasi', 1, 0, 'C');
	$pdf->Cell(30, 10, 'Bukti', 1, 0, 'C');
	$pdf->Cell(50, 10, 'Nama Produk / Kode Produksi', 1, 0, 'C');
	$pdf->Cell(35, 10, 'Tahapan', 1, 0, 'C');
	$pdf->Cell(45, 10, 'Analisis Temuan', 1, 0, 'C');
	$pdf->Cell(45, 10, 'Tindakan Koreksi', 1, 0, 'C');
	$pdf->Cell(40, 10, 'Keterangan', 1, 0, 'C');
	$pdf->Cell(30, 5, 'Paraf', 1, 1, 'C');

	$pdf->Cell(290, 5, '', 0, 0, 'L');
	$pdf->Cell(15, 5, 'QC', 1, 0, 'C');
	$pdf->Cell(15, 5, 'Prod', 1, 0, 'C');
	$pdf->Cell(10, 5, '', 0, 1, 'C');

	foreach ($kontaminasi_data as $kontaminasi) {
		$formattedTime = date('H:i', strtotime($kontaminasi->time));
		$pdf->Cell(15, 20, $formattedTime, 1, 0, 'C');
		$pdf->Cell(30, 20, $kontaminasi->jenis_kontaminasi, 1, 0, 'L');
		$colWidth = 30;
		$colHeight = 20;
		$maxWidthImage = 25;  
		$maxHeightImage = 15; 
		$image_path = FCPATH . 'uploads/' . $kontaminasi->bukti;
		$pdf->Rect($pdf->GetX(), $pdf->GetY(), $colWidth, $colHeight);

		if (file_exists($image_path)) {
			list($width, $height) = getimagesize($image_path);
			$aspectRatio = $width / $height;
			if ($width > $maxWidthImage || $height > $maxHeightImage) {
				if ($width > $height) {
					$newWidth = $maxWidthImage;
					$newHeight = $newWidth / $aspectRatio;
				} else {
					$newHeight = $maxHeightImage;
					$newWidth = $newHeight * $aspectRatio; 
				}
			} else {
				$newWidth = $width;
				$newHeight = $height;
			}
			$xPos = $pdf->GetX() + ($colWidth - $newWidth) / 2; 
			$yPos = $pdf->GetY() + ($colHeight - $newHeight) / 2; 
			$pdf->Image($image_path, $xPos, $yPos, $newWidth, $newHeight);
			$pdf->SetX($pdf->GetX() + $colWidth);
		} else {
			$pdf->Cell($colWidth, $colHeight, 'Gambar Tidak Ada', 1, 0, 'C');
			$pdf->SetX($pdf->GetX() + $colWidth);
		}
		$pdf->Cell(50, 20, $kontaminasi->nama_produk. ' / ' . $kontaminasi->kode_produksi, 1, 0, 'C');
		$pdf->Cell(35, 20, $kontaminasi->tahapan, 1, 0, 'C');
		$pdf->Cell(45, 20, $kontaminasi->analisis, 1, 0, 'C');
		$pdf->Cell(45, 20, $kontaminasi->tindakan, 1, 0, 'C');
		$pdf->Cell(40, 20, !empty($kontaminasi->keterangan) ? $kontaminasi->keterangan : '-', 1, 0, 'C');
		$pdf->Cell(15, 20, $kontaminasi->username, 1, 0, 'C');
		$pdf->Cell(15, 20, $kontaminasi->nama_produksi, 1, 0, 'C');
		$pdf->Ln();
	}

	$this->load->model('Pegawai_model');
	$nama_lengkap_qc   = $this->Pegawai_model->get_nama_lengkap($data['kontaminasi']->username);
	$nama_lengkap_prod = $data['kontaminasi']->nama_produksi;
	$nama_lengkap_spv  = $this->Pegawai_model->get_nama_lengkap($data['kontaminasi']->nama_spv);

	$tanggal_update = $data['kontaminasi']->tgl_update_spv;
	$update_tanggal = (new DateTime($tanggal_update))->format('d-m-Y | H:i');

	$tanggal_update_prod = $data['kontaminasi']->tgl_update_produksi;
	$update_tanggal_prod = (new DateTime($tanggal_update_prod))->format('d-m-Y | H:i');

	$status_verifikasi = true;
	foreach ($kontaminasi_data as $item) {
		if ($item->status_spv != '1') {
			$status_verifikasi = false;
			break;
		}
	}

	$y_setelah_tabel = $pdf->GetY() + 3;
	$pdf->SetFont('times', '', 9);
	$pdf->SetXY(20, $y_setelah_tabel); 
	$pdf->Cell(100, 3, 'Catatan : ', 0, 1, 'L');
	foreach ($kontaminasi_data as $item) {
		if (!empty($item->catatan)) {
			$pdf->Cell(12, 0, '', 0, 0, 'L'); 
			$pdf->Cell(180, 0, ' - ' . $item->catatan, 0, 1, 'L');
		}
	}

	$y_after_keterangan = $pdf->GetY() + 5;
	if ($status_verifikasi) {
		$pdf->SetFont('times', '', 9);
		$pdf->SetTextColor(0, 0, 0);

	// QC
		$pdf->SetXY(50, $y_after_keterangan);
		$pdf->Cell(60, 5, 'Diperiksa Oleh,', 0, 0, 'C');
		$pdf->SetXY(50, $y_after_keterangan + 8);
		$pdf->SetFont('times', 'U', 9);
		$pdf->Cell(60, 5, $nama_lengkap_qc, 0, 1, 'C');
		$pdf->SetXY(50, $y_after_keterangan + 13);
		$pdf->SetFont('times', '', 9);
		$pdf->Cell(60, 5, 'QC Inspector', 0, 0, 'C');

	// Produksi (tanpa QR)
		$pdf->SetXY(140, $y_after_keterangan);
		$pdf->Cell(60, 5, 'Diketahui Oleh,', 0, 0, 'C');
		if (!empty($data['kontaminasi']->nama_produksi)) {
			$nama_lengkap_prod = $data['kontaminasi']->nama_produksi;
			$update_tanggal_prod = (new DateTime($data['kontaminasi']->tgl_update_produksi))->format('d-m-Y | H:i');

			$pdf->SetFont('times', 'U', 9);
			$pdf->SetXY(140, $y_after_keterangan + 8);
			$pdf->Cell(60, 5, $nama_lengkap_prod, 0, 1, 'C');

			$pdf->SetFont('times', '', 9);
			$pdf->SetXY(140, $y_after_keterangan + 13);
			$pdf->Cell(60, 5, 'Foreman/Forelady Produksi', 0, 1, 'C');

				// $pdf->SetXY(140, $y_after_keterangan + 18);
				// $pdf->Cell(60, 5, $update_tanggal_prod, 0, 0, 'C');
		} else {
			$pdf->SetFont('times', '', 9);
			$pdf->SetXY(140, $y_after_keterangan + 8);
			$pdf->Cell(60, 5, 'Belum Diverifikasi', 0, 0, 'C');
		}

	// Supervisor QC (tetap pakai QR)
		$pdf->SetXY(230, $y_after_keterangan);
		$pdf->Cell(60, 5, 'Disetujui Oleh,', 0, 0, 'C');
		$qr_text_spv = "Diverifikasi secara digital oleh,\n" . $nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
		$pdf->write2DBarcode($qr_text_spv, 'QRCODE,L', 252, $y_after_keterangan + 5, 16, 16, null, 'N');
		$pdf->SetXY(230, $y_after_keterangan + 20);
		$pdf->Cell(60, 5, 'Supervisor QC', 0, 0, 'C');

	} else {
		$pdf->SetTextColor(255, 0, 0);
		$pdf->SetFont('times', '', 9);
		$pdf->SetXY(230, $y_after_keterangan);
		$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
	}

	$pdf->setPrintFooter(false);

	$filename = "Kontaminasi Benda Asing_{$formatted_date2}.pdf";
	$pdf->Output($filename, 'I');
}
}

