<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontaminasi extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');  
		$this->load->model('kontaminasi_model');
		$this->load->model('pegawai_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'kontaminasi' => $this->kontaminasi_model->get_data_by_plant()
		);

		$this->active_nav = 'kontaminasi'; 
		$this->render('form/kontaminasi/kontaminasi', $data);
	}

	public function detail($uuid)
	{
		$data = array(
			'kontaminasi' => $this->kontaminasi_model->get_by_uuid($uuid),
		);

		$this->active_nav = 'kontaminasi'; 
		$this->render('form/kontaminasi/kontaminasi-detail', $data);
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
		'kontaminasi' => $this->kontaminasi_model->get_data_by_plant()
	);

	$this->active_nav = 'kontaminasi'; 
	$this->render('form/kontaminasi/kontaminasi-tambah', $data);
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
		'kontaminasi' => $kontaminasi
	);

	$this->active_nav = 'kontaminasi'; 
	$this->render('form/kontaminasi/kontaminasi-edit', $data);
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
		'kontaminasi' => $this->kontaminasi_model->get_data_by_plant()
	);

	$this->active_nav = 'verifikasi-kontaminasi'; 
	$this->render('form/kontaminasi/kontaminasi-verifikasi', $data);
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
		'kontaminasi' => $this->kontaminasi_model->get_by_uuid($uuid)
	);

	$this->active_nav = 'verifikasi-kontaminasi'; 
	$this->render('form/kontaminasi/kontaminasi-status', $data);
}

// public function diketahui()
// {
// 	$data = array(
// 		'kontaminasi' => $this->kontaminasi_model->get_data_by_plant(),
// 		'active_nav' => 'diketahui-kontaminasi', 
// 	);

// 	$this->load->view('partials/head', $data);
// 	$this->load->view('form/kontaminasi/kontaminasi-diketahui', $data);
// 	$this->load->view('partials/footer');
// }

// public function statusprod($uuid)
// {
// 	$rules = $this->kontaminasi_model->rules_diketahui();
// 	$this->form_validation->set_rules($rules);

// 	if ($this->form_validation->run() == TRUE) {
// 		$update = $this->kontaminasi_model->diketahui_update($uuid);
// 		if ($update) {
// 			$this->session->set_flashdata('success_msg', 'Status Kontaminasi Benda Asing berhasil di Update');
// 			redirect('kontaminasi/diketahui');
// 		} else {
// 			$this->session->set_flashdata('error_msg', 'Status Kontaminasi Benda Asing gagal di Update');
// 			redirect('kontaminasi/diketahui');
// 		}
// 	}

// 	$data = array(
// 		'kontaminasi' => $this->kontaminasi_model->get_by_uuid($uuid),
// 		'active_nav' => 'diketahui-kontaminasi'
// 	);

// 	$this->load->view('partials/head', $data);
// 	$this->load->view('form/kontaminasi/kontaminasi-statusprod', $data);
// 	$this->load->view('partials/footer');
// }

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

	$tanggal = $data['kontaminasi']->date;
	$dt = new DateTime($tanggal);

	$hari = [
		'Sunday'    => 'Minggu',
		'Monday'    => 'Senin',
		'Tuesday'   => 'Selasa',
		'Wednesday' => 'Rabu',
		'Thursday'  => 'Kamis',
		'Friday'    => 'Jumat',
		'Saturday'  => 'Sabtu',
	];

	$bulan = [
		1 => 'Januari','Februari','Maret','April','Mei','Juni',
		'Juli','Agustus','September','Oktober','November','Desember'
	];

	$nama_hari  = $hari[$dt->format('l')];
	$nama_bulan = $bulan[(int)$dt->format('m')];

	$formatted_date  = $nama_hari . ', ' . $dt->format('d') . ' ' . $nama_bulan . ' ' . $dt->format('Y');
	$formatted_date2 = $dt->format('d') . ' ' . $nama_bulan . ' ' . $dt->format('Y');

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

	$rowHeight = 20;

	foreach ($kontaminasi_data as $k) {

		$startX = $pdf->GetX();
		$startY = $pdf->GetY();

    // Pukul
		$pdf->MultiCell(15, $rowHeight, date('H:i', strtotime($k->time)), 1, 'C', false, 0);

    // Jenis
		$pdf->MultiCell(30, $rowHeight, $k->jenis_kontaminasi, 1, 'L', false, 0);

    // Bukti (gambar)
		$xImage = $pdf->GetX();
		$yImage = $pdf->GetY();

		$pdf->Cell(30, $rowHeight, '', 1, 0);

		$image_path = FCPATH . 'uploads/kontaminasi/' . $k->bukti;
		if (file_exists($image_path)) {
			$pdf->Image($image_path, $xImage + 2, $yImage + 2, 26, 16);
		}

    // Produk
		$pdf->MultiCell(50, $rowHeight, $k->nama_produk . "\n" . $k->kode_produksi, 1, 'C', false, 0);

    // Tahapan
		$pdf->MultiCell(35, $rowHeight, $k->tahapan, 1, 'C', false, 0);

    // Analisis
		$pdf->MultiCell(45, $rowHeight, $k->analisis, 1, 'C', false, 0);

    // Tindakan
		$pdf->MultiCell(45, $rowHeight, $k->tindakan, 1, 'C', false, 0);

    // Keterangan
		$pdf->MultiCell(40, $rowHeight, $k->keterangan ?: '-', 1, 'C', false, 0);

    // QC & Prod
		$pdf->MultiCell(15, $rowHeight, $k->username, 1, 'C', false, 0);
		$pdf->MultiCell(15, $rowHeight, $k->nama_produksi, 1, 'C', false, 1);
	}

	$pdf->SetFont('times', 'I', 7);
	$pdf->Cell(315, 5, 'QB 09/00', 0, 1, 'R'); 

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

	// $y_after_keterangan = $pdf->GetY() + 5;
	// if ($status_verifikasi) {
	// 	$pdf->SetFont('times', '', 9);
	// 	$pdf->SetTextColor(0, 0, 0);

	// // QC
	// 	$pdf->SetXY(50, $y_after_keterangan);
	// 	$pdf->Cell(60, 5, 'Diperiksa Oleh,', 0, 0, 'C');
	// 	$pdf->SetXY(50, $y_after_keterangan + 8);
	// 	$pdf->SetFont('times', 'U', 9);
	// 	$pdf->Cell(60, 5, $nama_lengkap_qc, 0, 1, 'C');
	// 	$pdf->SetXY(50, $y_after_keterangan + 13);
	// 	$pdf->SetFont('times', '', 9);
	// 	$pdf->Cell(60, 5, 'QC Inspector', 0, 0, 'C');

	// // Produksi (tanpa QR)
	// 	$pdf->SetXY(140, $y_after_keterangan);
	// 	$pdf->Cell(60, 5, 'Diketahui Oleh,', 0, 0, 'C');
	// 	if (!empty($data['kontaminasi']->nama_produksi)) {
	// 		$nama_lengkap_prod = $data['kontaminasi']->nama_produksi;
	// 		$update_tanggal_prod = (new DateTime($data['kontaminasi']->tgl_update_produksi))->format('d-m-Y | H:i');

	// 		$pdf->SetFont('times', 'U', 9);
	// 		$pdf->SetXY(140, $y_after_keterangan + 8);
	// 		$pdf->Cell(60, 5, $nama_lengkap_prod, 0, 1, 'C');

	// 		$pdf->SetFont('times', '', 9);
	// 		$pdf->SetXY(140, $y_after_keterangan + 13);
	// 		$pdf->Cell(60, 5, 'Foreman/Forelady Produksi', 0, 1, 'C');

	// 			// $pdf->SetXY(140, $y_after_keterangan + 18);
	// 			// $pdf->Cell(60, 5, $update_tanggal_prod, 0, 0, 'C');
	// 	} else {
	// 		$pdf->SetFont('times', '', 9);
	// 		$pdf->SetXY(140, $y_after_keterangan + 8);
	// 		$pdf->Cell(60, 5, 'Belum Diverifikasi', 0, 0, 'C');
	// 	}

	// // Supervisor QC (tetap pakai QR)
	// 	$pdf->SetXY(230, $y_after_keterangan);
	// 	$pdf->Cell(60, 5, 'Disetujui Oleh,', 0, 0, 'C');
	// 	$qr_text_spv = "Diverifikasi secara digital oleh,\n" . $nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
	// 	$pdf->write2DBarcode($qr_text_spv, 'QRCODE,L', 252, $y_after_keterangan + 5, 16, 16, null, 'N');
	// 	$pdf->SetXY(230, $y_after_keterangan + 20);
	// 	$pdf->Cell(60, 5, 'Supervisor QC', 0, 0, 'C');

	// } else {
	// 	$pdf->SetTextColor(255, 0, 0);
	// 	$pdf->SetFont('times', '', 9);
	// 	$pdf->SetXY(230, $y_after_keterangan);
	// 	$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
	// }

	$pdf->SetFont('times', '', 9);
	$pdf->SetTextColor(0, 0, 0);

	$y_ttd   = $pdf->GetY() + 6;
	$qr_size = 15;

/* ===========================
   QC MULTI USER
   =========================== */
   $qc_usernames  = [];
   $qc_created_at = null;

   foreach ($kontaminasi_data as $item) {
   	if (!empty($item->username)) {
   		$qc_usernames[] = $item->username;
   	}

   	if (!$qc_created_at && !empty($item->created_at)) {
   		$qc_created_at = $item->created_at;
   	}
   }

   $qc_usernames = array_unique($qc_usernames);

   $qc_nama_lengkap = [];
   foreach ($qc_usernames as $username) {
   	$nama = $this->Pegawai_model->get_nama_lengkap($username);
   	if (!empty($nama)) {
   		$qc_nama_lengkap[] = $nama;
   	}
   }

   $qc_nama_text = !empty($qc_nama_lengkap)
   ? implode(', ', $qc_nama_lengkap)
   : '-';

   $qc_tanggal = $qc_created_at
   ? (new DateTime($qc_created_at))->format('d-m-Y | H:i')
   : '-';

   $qr_qc_text = "Dibuat secara digital oleh,\n"
   . $qc_nama_text . "\n"
   . "QC Inspector\n"
   . $qc_tanggal;


/* ===========================
   PRODUKSI
   =========================== */
   $nama_lengkap_prod = !empty($data['kontaminasi']->nama_produksi)
   ? $this->Pegawai_model->get_nama_lengkap($data['kontaminasi']->nama_produksi)
   : '-';

   $prod_tanggal = !empty($data['kontaminasi']->tgl_update_produksi)
   ? (new DateTime($data['kontaminasi']->tgl_update_produksi))->format('d-m-Y | H:i')
   : '-';

   $qr_produksi_text = "Diketahui secara digital oleh,\n"
   . ($nama_lengkap_prod ?: $data['kontaminasi']->nama_produksi) . "\n"
   . "Foreman/Forelady Produksi\n"
   . $prod_tanggal;


/* ===========================
   SPV
   =========================== */
   $nama_lengkap_spv = !empty($data['kontaminasi']->nama_spv)
   ? $this->Pegawai_model->get_nama_lengkap($data['kontaminasi']->nama_spv)
   : '-';

   $spv_tanggal = !empty($data['kontaminasi']->tgl_update_spv)
   ? (new DateTime($data['kontaminasi']->tgl_update_spv))->format('d-m-Y | H:i')
   : '-';

   $qr_spv_text = "Disetujui secara digital oleh,\n"
   . ($nama_lengkap_spv ?: $data['kontaminasi']->nama_spv) . "\n"
   . "Supervisor QC Bread Crumb\n"
   . $spv_tanggal;

   if ($status_verifikasi) {
   	$pdf->SetFont('times', '', 8);
   	$pdf->SetXY(20, $y_ttd);
   	$pdf->Cell(45, 5, 'Dibuat Oleh,', 0, 0, 'C');
   	$pdf->SetXY(85, $y_ttd);
   	$pdf->Cell(130, 5, 'Diketahui Oleh,', 0, 0, 'C');
   	$pdf->SetXY(150, $y_ttd);
   	$pdf->Cell(220, 5, 'Disetujui Oleh,', 0, 1, 'C');
   	$pdf->write2DBarcode($qr_qc_text, 'QRCODE,L', 35,$y_ttd + 5, $qr_size, $qr_size, null, 'N');
   	if ($qr_produksi_text) {
   		$pdf->write2DBarcode($qr_produksi_text, 'QRCODE,L', 143, $y_ttd + 5, $qr_size, $qr_size, null, 'N');
   	}
   	$pdf->write2DBarcode($qr_spv_text, 'QRCODE,L', 253, $y_ttd + 5, $qr_size, $qr_size, null, 'N');
   	$pdf->SetXY(20, $y_ttd + 20);
   	$pdf->Cell(45, 5, 'QC Inspector', 0, 0, 'C');
   	$pdf->SetXY(85, $y_ttd + 20);
   	$pdf->Cell(130, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
   	$pdf->SetXY(150, $y_ttd + 20);
   	$pdf->Cell(220, 5, 'Supervisor QC', 0, 1, 'C');
   } else {
   	$pdf->SetFont('times', '', 8);
   	$pdf->SetTextColor(255, 0, 0);
   	$pdf->SetXY(80, $y_ttd);
   	$pdf->Cell(80, 6, 'Data Belum Diverifikasi', 0, 1, 'C');
   	$pdf->SetTextColor(0, 0, 0);
   }

   $pdf->setPrintFooter(false);

   $filename = "Kontaminasi Benda Asing_{$formatted_date2}.pdf";
   $pdf->Output($filename, 'I');
}
}

