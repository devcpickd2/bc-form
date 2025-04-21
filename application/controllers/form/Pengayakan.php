<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengayakan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('pengayakan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'pengayakan' => $this->pengayakan_model->get_all(),
			'active_nav' => 'pengayakan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{
		$data = array(
			'pengayakan' => $this->pengayakan_model->get_by_uuid($uuid),
			'active_nav' => 'pengayakan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->pengayakan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->pengayakan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Pengayakan berhasil di simpan');
				redirect('pengayakan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pengayakan gagal di simpan');
				redirect('pengayakan');
			}
		}

		$data = array(
			'active_nav' => 'pengayakan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->pengayakan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->pengayakan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Pengayakan berhasil di Update');
				redirect('pengayakan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Pengayakan gagal di Update');
				redirect('pengayakan');
			}
		}

		$data = array(
			'pengayakan' => $this->pengayakan_model->get_by_uuid($uuid),
			'active_nav' => 'pengayakan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-edit', $data);
		$this->load->view('partials/footer');
	}

	public function verifikasi()
	{
		$data = array(
			'pengayakan' => $this->pengayakan_model->get_all(),
			'active_nav' => 'verifikasi-pengayakan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->pengayakan_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->pengayakan_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pengayakan berhasil di Update');
				redirect('pengayakan/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pengayakan gagal di Update');
				redirect('pengayakan/verifikasi');
			}
		}

		$data = array(
			'pengayakan' => $this->pengayakan_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-pengayakan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-status', $data);
		$this->load->view('partials/footer');
	}


	public function diketahui()
	{
		$data = array(
			'pengayakan' => $this->pengayakan_model->get_all(),
			'active_nav' => 'diketahui-pengayakan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->pengayakan_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->pengayakan_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Pengayakan berhasil di Update');
				redirect('pengayakan/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Pengayakan gagal di Update');
				redirect('pengayakan/diketahui');
			}
		}

		$data = array(
			'pengayakan' => $this->pengayakan_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-pengayakan');

		$this->load->view('partials/head', $data);
		$this->load->view('form/pengayakan/pengayakan-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$pengayakan_data = $this->pengayakan_model->get_by_uuid_pengayakan($selected_items);

		$pengayakan_data_verif = $this->pengayakan_model->get_by_uuid_pengayakan_verif($selected_items);

		$data['pengayakan'] = $pengayakan_data_verif;


		if (!$data['pengayakan']) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(10, 9.5, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 10);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 30);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(7, "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN PENGAYAKAN', 0, 'C');
		$pdf->Ln(3);

		$pdf->SetFont('times', '', 7);

		$pdf->Cell(15, 8, 'Tanggal', 1, 0, 'C');
		$pdf->Cell(8, 8, 'Shift', 1, 0, 'C');
		$pdf->Cell(24, 8, 'Nama Barang', 1, 0, 'C');
		$pdf->Cell(18, 8, 'Kode Produksi', 1, 0, 'C');
		$pdf->Cell(15, 8, 'Exp. Date', 1, 0, 'C');
		$pdf->Cell(16, 8, 'Jum.Barang', 1, 0, 'C');
		$pdf->Cell(34, 4, 'Kontaminasi Benda Asing', 1, 0, 'C');
		$pdf->Cell(24, 4, 'Paraf', 1, 0, 'C');
		$pdf->Cell(36, 8, 'Kondisi Screen Ayakan', 1, 0, 'C');
		$pdf->Cell(25, 4, '', 0, 1, 'C');

		$pdf->Cell(96, 0, '', 0, 0, 'L');
		$pdf->Cell(12, 4, 'Sc. Mess', 1, 0, 'C');   
		$pdf->Cell(11, 4, 'Kerikil', 1, 0, 'C');  
		$pdf->Cell(11, 4, 'Benang', 1, 0, 'C');    
		$pdf->Cell(12, 4, 'Produksi', 1, 0, 'C'); 
		$pdf->Cell(12, 4, 'QC', 1, 0, 'C');

		$pdf->Cell(36, 0, '', 0, 0, 'C');
		$pdf->Cell(25, 4, '', 0, 1, 'C');

		foreach ($pengayakan_data as $pengayakan) {
			$tanggal = $pengayakan->date;
			$date = new DateTime($tanggal); 
			$created_date = $date->format('d-m-Y');

			$expired = $pengayakan->expired_date;
			$ed = new DateTime($expired); 
			$ex_date = $ed->format('d-m-Y');
			$pdf->Cell(15, 5, $created_date, 1, 0, 'C');
			$pdf->Cell(8, 5, $pengayakan->shift, 1, 0, 'C');
			$pdf->Cell(24, 5, $pengayakan->nama_barang, 1, 0, 'L');
			$pdf->Cell(18, 5, $pengayakan->kode_produksi, 1, 0, 'C');
			$pdf->Cell(15, 5, $ex_date, 1, 0, 'C');
			$pdf->Cell(16, 5, $pengayakan->jumlah_barang, 1, 0, 'C');
			$pdf->Cell(12, 5, $pengayakan->kba_screenmess, 1, 0, 'C');
			$pdf->Cell(11, 5, $pengayakan->kba_kerikil, 1, 0, 'C');
			$pdf->Cell(11, 5, $pengayakan->kba_benang, 1, 0, 'C');
			$pdf->Cell(12, 5, $pengayakan->nama_produksi, 1, 0, 'C');
			$pdf->Cell(12, 5, $pengayakan->username, 1, 0, 'C');
			$pdf->Cell(36, 5, $pengayakan->kondisi, 1, 0, 'C');
			$pdf->Ln();
		}

		$nama_spv = $data['pengayakan']->nama_spv;
		$tanggal_update = $data['pengayakan']->tgl_update;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($pengayakan_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetFont('times', 'I', 7);
		$pdf->SetXY(190, 258); 
		$pdf->Cell(5, 3, 'QB 21/00', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 8);
		$pdf->SetXY(15, 260); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($pengayakan_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(12, 0, '', 0, 0, 'L'); 
				$pdf->Cell(12, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		if ($status_verifikasi) {
			$url = 'Diverifikasi secara digital oleh,' . "\n" . $nama_spv . "\n" . 'SPV QC Bread Crumb' . "\n" . $update_tanggal;

			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(150, 280); 
			$pdf->Cell(60, 4, 'Disetujui oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($url, 'QRCODE,L', 171, 285, 18, 18, null, 'N'); 
			$pdf->SetXY(150, 304); 
			$pdf->Cell(60, 4, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0);
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(150, 280); 
			$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		// $pdf->Output("Pengayakan.pdf", 'I');

		$currentDate = date('d-m-Y');
		$filename = "Pengayakan_{$currentDate}.pdf";
		$pdf->Output($filename, 'I');


	}
}

