<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magnettrap extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');  
		$this->load->model('magnettrap_model');
		$this->load->library('upload');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'magnettrap' => $this->magnettrap_model->get_data_by_plant(),
			'active_nav' => 'magnettrap', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'magnettrap' => $this->magnettrap_model->get_by_uuid($uuid),
			'active_nav' => 'magnettrap');

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-detail', $data);
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
		$rules = $this->magnettrap_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$config = array(
				'upload_path'   => "./uploads/",
				'allowed_types' => "jpg|png|jpeg|pdf", 
				'overwrite'     => TRUE,
				'max_size'      => 2048000, 
				'encrypt_name'  => TRUE
			);
			$this->upload->initialize($config);
			if (!$this->upload->do_upload('bukti')) {
				$error = $this->upload->display_errors();
				$this->session->set_flashdata('error_msg', 'Upload gagal: ' . $error);
				redirect('magnettrap/tambah');
			} else {
				$data = $this->upload->data();
				$file_name = $data['file_name'];

				$update = $this->magnettrap_model->insert($file_name);

				if ($update) {
					$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Magnet Trap berhasil disimpan');
					redirect('magnettrap');
				} else {
					$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Magnet Trap gagal disimpan');
					redirect('magnettrap');
				}
			}
		}

		$data = array(
			'magnettrap' => $this->magnettrap_model->get_data_by_plant(),
			'active_nav'  => 'magnettrap'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-tambah');
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$magnettrap = $this->magnettrap_model->get_by_uuid($uuid);
		$rules = $this->magnettrap_model->rules();
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

			if (!empty($_FILES['bukti']['name'])) {
				if (!$this->upload->do_upload('bukti')) {
					$error = $this->upload->display_errors();
					$this->session->set_flashdata('error_msg', 'Upload failed: ' . $error);
					redirect('magnettrap/edit/' . $uuid); 
				} else {
					$data = $this->upload->data();
					$file_name = $data['file_name'];
				}
			} else {
				$file_name = $magnettrap->bukti;
			}
			$update = $this->magnettrap_model->update($uuid, $file_name);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Magnet Trap berhasil diupdate');
				redirect('magnettrap');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Magnet Trap gagal diupdate');
				redirect('magnettrap');
			}
		}
		$data = array(
			'magnettrap' => $magnettrap,
			'active_nav' => 'magnettrap'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('magnettrap');
		}

		$deleted = $this->magnettrap_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('magnettrap');
	}

	public function verifikasi()
	{
		$data = array(
			'magnettrap' => $this->magnettrap_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-magnettrap', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-verifikasi', $data);
		$this->load->view('partials/footer');
	}

	public function status($uuid)
	{
		$rules = $this->magnettrap_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->magnettrap_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Magnet Trap berhasil di Update');
				redirect('magnettrap/verifikasi');
			} else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Magnet Trap gagal di Update');
				redirect('magnettrap/verifikasi');
			}
		}

		$data = array(
			'magnettrap' => $this->magnettrap_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-magnettrap'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'magnettrap' => $this->magnettrap_model->get_data_by_plant(),
			'active_nav' => 'diketahui-magnettrap', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-diketahui', $data);
		$this->load->view('partials/footer');
	}

	public function statuseng($uuid)
	{
		$rules = $this->magnettrap_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->magnettrap_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Magnet Trap berhasil di Update');
				redirect('magnettrap/diketahui');
			} else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Magnet Trap gagal di Update');
				redirect('magnettrap/diketahui');
			}
		}

		$data = array(
			'magnettrap' => $this->magnettrap_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-magnettrap'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/magnettrap/magnettrap-statuseng', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$tanggal = $this->input->post('tanggal');  
		$shift   = $this->input->post('shift'); 

		log_message('debug', 'Tanggal yang dipilih: ' . print_r($tanggal, true));

		if (empty($tanggal)) {
			show_error('Tidak ada tanggal yang dipilih', 404);
		}

		$plant = $this->session->userdata('plant');

		$magnettrap_data = $this->magnettrap_model->get_by_date($tanggal, $plant, $shift); 
		$magnettrap_data_verif = $this->magnettrap_model->get_last_verif_by_date($tanggal, $plant, $shift); 

		if (!$magnettrap_data || !$magnettrap_data_verif) {
			show_error('Data tidak ditemukan, Pilih tanggal yang ingin dicetak', 404);
		}

		$data['magnettrap'] = $magnettrap_data_verif;
		
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
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN MAGNET TRAP', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['magnettrap']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 10);
		$pdf->SetX(16);
		$pdf->Write(0, 'Hari / Tanggal : ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['magnettrap']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 11);

		$pdf->Cell(15, 10, 'Pukul', 1, 0, 'C');
		$pdf->Cell(35, 10, 'Tahapan', 1, 0, 'C');
		$pdf->Cell(50, 10, 'Jenis Kontaminasi', 1, 0, 'C');
		$pdf->Cell(45, 10, 'Bukti', 1, 0, 'C');
		$pdf->Cell(55, 10, 'Analisis Temuan', 1, 0, 'C');
		$pdf->Cell(50, 10, 'Tindakan Koreksi', 1, 0, 'C');
		$pdf->Cell(35, 10, 'Verifikasi', 1, 0, 'C');
		$pdf->Cell(35, 10, 'Keterangan', 1, 1, 'C');

		foreach ($magnettrap_data as $magnettrap) {
			$formattedTime = date('H:i', strtotime($magnettrap->time));
			$pdf->Cell(15, 20, $formattedTime, 1, 0, 'C');
			$pdf->Cell(35, 20, $magnettrap->tahapan, 1, 0, 'L');
			$pdf->Cell(50, 20, $magnettrap->kontaminasi, 1, 0, 'C');

			$colWidth = 45;
			$colHeight = 20;
			$maxWidthImage = 22;  
			$maxHeightImage = 12; 

			$image_path = FCPATH . 'uploads/' . $magnettrap->bukti;
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

			$pdf->Cell(55, 20, $magnettrap->analisis, 1, 0, 'C');
			$pdf->Cell(50, 20, $magnettrap->tindakan, 1, 0, 'C');
			$pdf->Cell(35, 20, $magnettrap->verifikasi, 1, 0, 'C');
			$pdf->Cell(35, 20, !empty($magnettrap->keterangan) ? $magnettrap->keterangan : '-', 1, 0, 'C');
			$pdf->Ln();
		}

		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(10, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($magnettrap_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(10, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$this->load->model('pegawai_model');
		$data['magnettrap']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['magnettrap']->username);
		$data['magnettrap']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['magnettrap']->nama_spv);
		$data['magnettrap']->nama_lengkap_enginer = $data['magnettrap']->nama_enginer;

		$y_after_keterangan = $pdf->GetY();
		$status_verifikasi = true;
		foreach ($magnettrap_data as $item) {
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
			$pdf->Cell(95, 5, $data['magnettrap']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(112, 5, 'QC Inspector', 0, 0, 'C');

		// // Diketahui oleh (Produksi)
		// 	$pdf->SetXY(90, $y_verifikasi + 5);
		// 	$pdf->Cell(135, 5, 'Diketahui Oleh,', 0, 0, 'C');
		// 	if ($data['magnettrap']->status_enginer == 1 && !empty($data['magnettrap']->nama_enginer)) {
		// 		$update_tanggal_enginer = (new DateTime($data['magnettrap']->tgl_update_enginer))->format('d-m-Y | H:i');
		// 		$qr_text_enginer = "Diketahui secara digital oleh,\n" . $data['magnettrap']->nama_lengkap_enginer . "\nForeman/Forelady Produksi\n" . $update_tanggal_enginer;
		// 		$pdf->write2DBarcode($qr_text_enginer, 'QRCODE,L', 150, $y_verifikasi + 10, 15, 15, null, 'N');
		// 		$pdf->SetXY(90, $y_verifikasi + 24);
		// 		$pdf->Cell(135, 5, 'Foreman/Forelady Engineering', 0, 0, 'C');
		// 	} else {
		// 		$pdf->SetXY(90, $y_verifikasi + 10);
		// 		$pdf->Cell(135, 5, 'Belum Diverifikasi', 0, 0, 'C');
		// 	}\
			
			// Diketahui oleh (Produksi) - tanpa barcode
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(135, 5, 'Diketahui Oleh,', 0, 0, 'C');

			if ($data['magnettrap']->status_enginer == 1 && !empty($data['magnettrap']->nama_enginer)) {
				$update_tanggal_enginer = (new DateTime($data['magnettrap']->tgl_update_enginer))->format('d-m-Y | H:i');

				$pdf->SetFont('times', 'U', 8);
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(135, 5, $data['magnettrap']->nama_enginer, 0, 1, 'C');

				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 15);
				$pdf->Cell(135, 5, 'Foreman/Forelady Engineering', 0, 1, 'C');

				// $pdf->SetXY(90, $y_verifikasi + 20);
				// $pdf->Cell(135, 5, $update_tanggal_enginer, 0, 0, 'C');
			} else {
				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(135, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}


		// Disetujui oleh (SPV)
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(189, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['magnettrap']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['magnettrap']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Pemeriksaan Magnet Trap_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');

	}
}

