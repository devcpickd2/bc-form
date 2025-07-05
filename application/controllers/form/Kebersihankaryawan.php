<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');

class Kebersihankaryawan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('kebersihankaryawan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_data_by_plant(),
			'active_nav' => 'kebersihankaryawan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_by_uuid($uuid),
			'active_nav' => 'kebersihankaryawan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->kebersihankaryawan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->kebersihankaryawan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Karyawan berhasil di simpan');
				redirect('kebersihankaryawan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Karyawan gagal di simpan');
				redirect('kebersihankaryawan');
			}
		}

		$data = array(
			'active_nav' => 'kebersihankaryawan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->kebersihankaryawan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->kebersihankaryawan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Karyawan berhasil di Update');
				redirect('kebersihankaryawan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Karyawan gagal di Update');
				redirect('kebersihankaryawan');
			}
		}

		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_by_uuid($uuid),
			'active_nav' => 'kebersihankaryawan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('kebersihankaryawan');
		}

		$deleted = $this->kebersihankaryawan_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('kebersihankaryawan');
	}
	
	
	public function verifikasi()
	{
		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_data_by_plant(),
			'active_nav' => 'verifikasi-kebersihankaryawan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->kebersihankaryawan_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->kebersihankaryawan_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Kebersihan Karyawan berhasil di Update');
				redirect('kebersihankaryawan/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Kebersihan Karyawan gagal di Update');
				redirect('kebersihankaryawan/verifikasi');
			}
		}

		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-kebersihankaryawan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_data_by_plant(),
			'active_nav' => 'diketahui-kebersihankaryawan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->kebersihankaryawan_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->kebersihankaryawan_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Kebersihan Karyawan berhasil di Update');
				redirect('kebersihankaryawan/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Kebersihan Karyawan gagal di Update');
				redirect('kebersihankaryawan/diketahui');
			}
		}

		$data = array(
			'kebersihankaryawan' => $this->kebersihankaryawan_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-kebersihankaryawan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/kebersihankaryawan/kebersihankaryawan-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$kebersihankaryawan_data = $this->kebersihankaryawan_model->get_by_uuid_kebersihankaryawan($selected_items);

		$kebersihankaryawan_data_verif = $this->kebersihankaryawan_model->get_by_uuid_kebersihankaryawan_verif($selected_items);

		$data['kebersihankaryawan'] = $kebersihankaryawan_data_verif;


		if (!$data['kebersihankaryawan']) {
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
		$pdf->MultiCell(0, 5, 'KEBERSIHAN KARYAWAN', 0, 'C');
		$pdf->Ln(4);

		setlocale(LC_TIME, 'IND');
		$tanggal = $data['kebersihankaryawan']->date;
		$datetime = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $datetime->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $datetime->getTimestamp());

		$pdf->SetFont('times', '', 9);
		$pdf->SetX(10);
		$pdf->Write(0, 'Hari / Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 20);
		$pdf->Write(0, 'Shift: ' . $data['kebersihankaryawan']->shift);
		$pdf->Ln(5);

		$pdf->SetFont('times', '', 9);

		$pdf->Cell(10, 12, 'No.', 1, 0, 'C');
		$pdf->Cell(30, 12, 'Nama', 1, 0, 'C');
		$pdf->Cell(30, 12, 'Bagian', 1, 0, 'C');
		$pdf->Cell(80, 6, 'Kebersihan', 1, 0, 'C');
		$pdf->Cell(45, 12, 'Tindakan Koreksi', 1, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$pdf->Cell(70, 0, '', 0, 0, 'L');
		$pdf->Cell(10, 6, '1', 1, 0, 'C');
		$pdf->Cell(10, 6, '2', 1, 0, 'C');
		$pdf->Cell(10, 6, '3', 1, 0, 'C');
		$pdf->Cell(10, 6, '4', 1, 0, 'C');
		$pdf->Cell(10, 6, '5', 1, 0, 'C');
		$pdf->Cell(10, 6, '6', 1, 0, 'C');
		$pdf->Cell(10, 6, '7', 1, 0, 'C');
		$pdf->Cell(10, 6, '8', 1, 0, 'C');
		$pdf->Cell(10, 0, '', 0, 0, 'C');
		$pdf->Cell(10, 6, '', 0, 1, 'C');

		$no = 1;
		foreach ($kebersihankaryawan_data as $kebersihankaryawan) {
			$pdf->SetFont('times', '', 8);
			$pdf->Cell(10, 6, $no, 1, 0, 'C');
			$pdf->Cell(30, 6, $kebersihankaryawan->nama, 1, 0, 'L');
			$pdf->Cell(30, 6, $kebersihankaryawan->bagian, 1, 0, 'C');
			$pdf->SetFont('dejavusans', '', 10);	
			$pdf->Cell(10, 6, ($kebersihankaryawan->seragam == 'ok') ? '✔' : (($kebersihankaryawan->seragam == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->apron == 'ok') ? '✔' : (($kebersihankaryawan->apron == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->tangan_kuku == 'ok') ? '✔' : (($kebersihankaryawan->tangan_kuku == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->kosmetik == 'ok') ? '✔' : (($kebersihankaryawan->kosmetik == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->perhiasan == 'ok') ? '✔' : (($kebersihankaryawan->perhiasan == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->masker == 'ok') ? '✔' : (($kebersihankaryawan->masker == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->topi_hairnet == 'ok') ? '✔' : (($kebersihankaryawan->topi_hairnet == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->Cell(10, 6, ($kebersihankaryawan->sepatu == 'ok') ? '✔' : (($kebersihankaryawan->sepatu == 'tidak oke') ? '✘' : '−'), 1, 0, 'C');
			$pdf->SetFont('times', '', 8);
			$pdf->Cell(45, 6, $kebersihankaryawan->tindakan, 1, 0, 'C');
			$pdf->Ln();
			$no++;
		}

		$nama_spv = $data['kebersihankaryawan']->nama_spv;
		$tanggal_update = $data['kebersihankaryawan']->tgl_update_spv;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($kebersihankaryawan_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetY($pdf->GetY() + 3); 
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(10, 3, 'Keterangan : ', 0, 1, 'L'); 
		$pdf->Cell(30, 3, '1. Seragam', 0, 0, 'L');
		$pdf->Cell(30, 3, '4. Kosmetik', 0, 0, 'L'); 
		$pdf->Cell(40, 3, '7. Topi/Hairnet', 0, 0, 'L'); 
		$pdf->Cell(30, 3, 'V = OK', 0, 1, 'L'); 
		$pdf->Cell(30, 3, '2. Apron', 0, 0, 'L');
		$pdf->Cell(30, 3, '5. Perhiasan', 0, 0, 'L'); 
		$pdf->Cell(40, 3, '8. Sepatu Kerja', 0, 0, 'L');
		$pdf->Cell(30, 3, 'X = Tidak OK', 0, 1, 'L');  
		$pdf->Cell(30, 3, '3. Tangan dan Kuku', 0, 0, 'L');
		$pdf->Cell(70, 3, '6. Masker', 0, 0, 'L');
		$pdf->Cell(30, 3, ' -  = Tidak ada atau tidak digunakan', 0, 1, 'L');   
		$pdf->Ln();
		
		$this->load->model('pegawai_model');
		$data['kebersihankaryawan']->nama_lengkap_qc = $this->pegawai_model->get_nama_lengkap($data['kebersihankaryawan']->username);
		$data['kebersihankaryawan']->nama_lengkap_spv = $this->pegawai_model->get_nama_lengkap($data['kebersihankaryawan']->nama_spv);
		$data['kebersihankaryawan']->nama_lengkap_produksi = $this->pegawai_model->get_nama_lengkap($data['kebersihankaryawan']->nama_produksi);

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->SetFont('times', '', 8);
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L');
		foreach ($kebersihankaryawan_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(13, 0, '', 0, 0, 'L'); 
				$pdf->Cell(13, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY() + 2;
		$status_verifikasi = true;
		foreach ($kebersihankaryawan_data as $item) {
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
			$pdf->Cell(35, 5, $data['kebersihankaryawan']->nama_lengkap_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8); 
			$pdf->Cell(65, 5, 'QC Inspector', 0, 0, 'C');

		// Diketahui oleh (Produksi)
			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');
			if ($data['kebersihankaryawan']->status_produksi == 1 && !empty($data['kebersihankaryawan']->nama_produksi)) {
				$update_tanggal_produksi = (new DateTime($data['kebersihankaryawan']->tgl_update_produksi))->format('d-m-Y | H:i');
				$qr_text_produksi = "Diketahui secara digital oleh,\n" . $data['kebersihankaryawan']->nama_lengkap_produksi . "\nForeman/Forelady Produksi\n" . $update_tanggal_produksi;
				$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(90, $y_verifikasi + 24);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			} else {
				$pdf->SetXY(90, $y_verifikasi + 10);
				$pdf->Cell(35, 5, 'Belum Diverifikasi', 0, 0, 'C');
			}

		// Disetujui oleh (SPV)
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');
			$update_tanggal = (new DateTime($data['kebersihankaryawan']->tgl_update_spv))->format('d-m-Y | H:i');
			$qr_text = "Diverifikasi secara digital oleh,\n" . $data['kebersihankaryawan']->nama_lengkap_spv . "\nSPV QC Bread Crumb\n" . $update_tanggal;
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
		$filename = "Kebersihan karyawan_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}
}

