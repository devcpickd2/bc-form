<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Pecahbelah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->model('auth_model'); 
		$this->load->model('pecahbelah_model');
		$this->load->model('bendapecah_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'pecahbelah' => $this->pecahbelah_model->get_data_by_plant(),
			'active_nav' => 'pecahbelah', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'pecahbelah' => $this->pecahbelah_model->get_by_uuid($uuid),
			'active_nav' => 'pecahbelah');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{
		$rules = $this->pecahbelah_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->pecahbelah_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Benda Mudah Pecah berhasil di simpan');
				redirect('pecahbelah');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Benda Mudah Pecah gagal di simpan');
				redirect('pecahbelah');
			}
		}

		$data = [
			'active_nav' => 'pecahbelah',
			'benda_list' => $this->bendapecah_model->get_all_benda()
		];

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-tambah', $data);
		$this->load->view('partials/footer');
	}



	public function edit($uuid)
	{
		$rules = $this->pecahbelah_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->pecahbelah_model->update($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Benda Mudah Pecah berhasil diupdate.');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Benda Mudah Pecah gagal diupdate.');
			}

			redirect('pecahbelah');
		}

		$data = [
			'pecahbelah' => $this->pecahbelah_model->get_by_uuid($uuid),
			'active_nav' => 'pecahbelah'
		];

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-edit', $data);
		$this->load->view('partials/footer');
	}

	public function check($uuid)
	{
		$this->form_validation->set_rules('kondisi_akhir[]', 'Kondisi Akhir', 'required|in_list[Ok,Tidak Ok]');

		if ($this->form_validation->run() == TRUE) {
			$update = $this->pecahbelah_model->update_check($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Benda Mudah Pecah berhasil diupdate.');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Benda Mudah Pecah gagal diupdate.');
			}

			redirect('pecahbelah');
		}

		$data = [
			'pecahbelah' => $this->pecahbelah_model->get_by_uuid($uuid),
			'active_nav' => 'pecahbelah'
		];

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-check', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('pecahbelah');
		}

		$deleted = $this->pecahbelah_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('pecahbelah');
	}

	public function verifikasi()
	{
		$data = array(
			'pecahbelah' => $this->pecahbelah_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-pecahbelah', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->pecahbelah_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->pecahbelah_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pemeriksaan Benda Mudah Pecah berhasil di Update');
				redirect('pecahbelah/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pemeriksaan Benda Mudah Pecah gagal di Update');
				redirect('pecahbelah/verifikasi');
			}
		}

		$data = array(
			'pecahbelah' => $this->pecahbelah_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-pecahbelah');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'pecahbelah' => $this->pecahbelah_model->get_data_by_plant(),
			'active_nav' => 'diketahui-pecahbelah', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->pecahbelah_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->pecahbelah_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pemeriksaan Benda Mudah Pecah berhasil di Update');
				redirect('pecahbelah/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pemeriksaan Benda Mudah Pecah gagal di Update');
				redirect('pecahbelah/diketahui');
			}
		}

		$data = array(
			'pecahbelah' => $this->pecahbelah_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-pecahbelah');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pecahbelah/pecahbelah-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$pecahbelah_data = $this->pecahbelah_model->get_by_uuid_pecahbelah($selected_items);

		$pecahbelah_data_verif = $this->pecahbelah_model->get_by_uuid_pecahbelah_verif($selected_items);

		$data['pecahbelah'] = $pecahbelah_data_verif;


		if (!$data['pecahbelah']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

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
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN BENDA MUDAH PECAH', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['pecahbelah']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$awal = $data['pecahbelah']->created_at;
		$date = new DateTime($awal);
		$jam_awal = date('H:i', $date->getTimestamp());
		$akhir = $data['pecahbelah']->modified_at;
		$date = new DateTime($akhir);
		$jam_akhir = date('H:i', $date->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['pecahbelah']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 10);

		$pdf->Cell(10, 10, 'No.', 1, 0, 'C');
		$pdf->Cell(40, 10, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(40, 10, 'Area / Pemilik', 1, 0, 'C');
		$pdf->Cell(20, 10, 'Jumlah', 1, 0, 'C');
		$pdf->Cell(40, 5, 'Kondisi', 1, 0, 'C');
		$pdf->Cell(40, 10, 'Keterangan', 1, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$pdf->SetFont('times', '', 8);
		$pdf->Cell(110, 10, '', 0, 0, 'L');
		$pdf->Cell(20, 5, 'Awal : ' . $jam_awal, 1, 0, 'C');
		$pdf->Cell(20, 5, 'Akhir : ' . $jam_akhir, 1, 0, 'C');
		$pdf->Cell(40, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 5, '', 0, 1, 'C');

		$no = 1;
		foreach ($pecahbelah_data as $pecahbelah_item) {
			$pdf->SetFont('times', '', 9);

			$pecahbelah = json_decode($pecahbelah_item->benda_pecah);

			if ($pecahbelah && is_array($pecahbelah)) {
				foreach ($pecahbelah as $item) {
					$nama_barang = isset($item->nama_barang) ? $item->nama_barang : '-';
					$area = isset($item->area) ? $item->area : '-';
					$pemilik = isset($item->pemilik) ? $item->pemilik : '-';
					$jumlah = isset($item->jumlah) ? $item->jumlah : '-';
					$kondisi_awal = isset($item->kondisi_awal) ? $item->kondisi_awal : '-';
					$kondisi_akhir = isset($item->kondisi_akhir) ? $item->kondisi_akhir : '-';
					$keterangan = isset($item->keterangan) ? $item->keterangan : '-';

					$pdf->SetFont('times', '', 8);
					$x = $pdf->GetX();
					$y = $pdf->GetY();
					$height_nama_barang = $pdf->getStringHeight(40, $nama_barang);
					$height_area_pemilik = $pdf->getStringHeight(40, "$area / $pemilik");
					$height_keterangan = $pdf->getStringHeight(40, $keterangan);
					$row_height = max($height_nama_barang, $height_area_pemilik, $height_keterangan, 5);
					$pdf->MultiCell(10, $row_height, $no, 1, 'C', false, 0);
					$pdf->MultiCell(40, $row_height, $nama_barang, 1, 'L', false, 0);
					$pdf->MultiCell(40, $row_height, "$area / $pemilik", 1, 'L', false, 0);
					$pdf->MultiCell(20, $row_height, $jumlah, 1, 'C', false, 0);
					$pdf->MultiCell(20, $row_height, $kondisi_awal, 1, 'C', false, 0);
					$pdf->MultiCell(20, $row_height, $kondisi_akhir, 1, 'C', false, 0);
					$pdf->MultiCell(40, $row_height, $keterangan, 1, 'L', false, 1);

					$no++;
				}
			}
		}

		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('dejavusans', '', 6);
		$pdf->MultiCell(0, 10, "✓ : Ok, kondisi masih utuh, tidak pecah\n✗ : Tidak Ok, kondisi tidak utuh, pecah / retak", 0, 'L');

		$this->load->model('pegawai_model');
		$data['pecahbelah']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['pecahbelah']->username);
		$data['pecahbelah']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['pecahbelah']->nama_spv);
		$data['pecahbelah']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['pecahbelah']->nama_produksi);
		
		$y_after_keterangan = $pdf->GetY();
		$status_verifikasi = true;
		foreach ($pecahbelah_data as $item) {
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
			$pdf->Cell(35, 5, $data['pecahbelah']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

		// // Diketahui oleh (Produksi)
		// 	$pdf->SetXY(90, $y_verifikasi + 5);
		// 	$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
		// 	if ($data['pecahbelah']->status_produksi == 1 && !empty($data['pecahbelah']->nama_produksi)) {
		// 		$update_tanggal_produksi = (new DateTime($data['pecahbelah']->tgl_update_produksi))->format('d-m-Y | H:i');
		// 		$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['pecahbelah']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
		// 		$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
		// 		$pdf->SetXY(90, $y_verifikasi + 24);
		// 		$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
		// 	} else {
		// 		$pdf->SetXY(90, $y_verifikasi + 10);
		// 		$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
		// 	}

// Diketahui oleh (Produksi) - tanpa barcode
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');

			if ($data['pecahbelah']->status_produksi == 1 && !empty($data['pecahbelah']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['pecahbelah']->tgl_update_produksi))->format('d-m-Y | H:i');

				$pdf->SetFont('times', 'U', 8);
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, $data['pecahbelah']->nama_lengkap_produksi, 0, 1, 'C');

				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 15);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 1, 'C');

				$pdf->SetXY(90, $y_verifikasi + 20);
				$pdf->Cell(35, 5, $update_tanggal_produksi, 0, 0, 'C');
			} else {
				$pdf->SetFont('times', '', 8);
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

		// Disetujui oleh (SPV)
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['pecahbelah']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['pecahbelah']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Checklist pecahbelah Peralatan QC_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}
}

