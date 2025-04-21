<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model'); 
		$this->load->model('produksi_model');
		$this->load->model('packing_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'produksi' => $this->produksi_model->get_produksi(),
			'active_nav' => 'produksi',  
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi', $data);
		$this->load->view('partials/footer'); 
	}

	public function detail($uuid)
	{
		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-detail', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->produksi_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->produksi_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di simpan');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di simpan');
				redirect('produksi');
			}
		}

		$data = array(
			'active_nav' => 'produksi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->produksi_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->produksi_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array('produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-edit', $data);
		$this->load->view('partials/footer');
	}

	public function bahan($uuid)
	{
		$rules = $this->produksi_model->rules_bahan();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->produksi_model->material($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-bahan', $data);
		$this->load->view('partials/footer');
	}

	public function mixing($uuid)
	{
		$rules = $this->produksi_model->rules_mixing();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->mixed($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-mixing', $data);
		$this->load->view('partials/footer');
	}

	public function fermentasi($uuid)
	{
		$rules = $this->produksi_model->rules_fermen();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->fermented($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-fermentasi', $data);
		$this->load->view('partials/footer');
	}

	public function stalling($uuid)
	{
		$rules = $this->produksi_model->rules_stalling();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->rest($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-stalling', $data);
		$this->load->view('partials/footer');
	}

	public function drying($uuid)
	{
		$rules = $this->produksi_model->rules_drying();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->dry($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-drying', $data);
		$this->load->view('partials/footer');
	}

	public function packing($uuid)
	{
		$rules = $this->produksi_model->rules_packing();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->pack($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'produksi'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-packing', $data);
		$this->load->view('partials/footer');
	}

	public function verifikasi()
	{
		$data = array(
			'produksi' => $this->produksi_model->get_all(),
			'active_nav' => 'verifikasi-produksi', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-verifikasi', $data);
		$this->load->view('partials/footer');
	}


	public function status($uuid)
	{
		$rules = $this->produksi_model->rules_verifikasi();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->produksi_model->verifikasi_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Verifikasi Produksi berhasil di Update');
				redirect('produksi/verifikasi');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Verifikasi Produksi gagal di Update');
				redirect('produksi/verifikasi');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'verifikasi-produksi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-status', $data);
		$this->load->view('partials/footer');
	}

	public function diketahui()
	{
		$data = array(
			'produksi' => $this->produksi_model->get_all(),
			'active_nav' => 'diketahui-produksi', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-diketahui', $data);
		$this->load->view('partials/footer');
	}


	public function statusprod($uuid)
	{
		$rules = $this->produksi_model->rules_diketahui();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->produksi_model->diketahui_update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Status Verifikasi Produksi berhasil di Update');
				redirect('produksi/diketahui');
			}else {
				$this->session->set_flashdata('error_msg', 'Status Verifikasi Produksi gagal di Update');
				redirect('produksi/diketahui');
			}
		}

		$data = array(
			'produksi' => $this->produksi_model->get_by_uuid($uuid),
			'active_nav' => 'diketahui-produksi');

		$this->load->view('partials/head', $data);
		$this->load->view('form/produksi/produksi-statusprod', $data);
		$this->load->view('partials/footer');
	}

	public function cetak()
	{
		$selected_items = $this->input->post('checkbox'); 

		log_message('debug', 'UUID yang dipilih: ' . print_r($selected_items, true));

		if (empty($selected_items)) {
			show_error('Tidak ada item yang dipilih', 404);
		}

		$produksi_data = $this->produksi_model->get_by_uuid_produksi($selected_items);

		$produksi_data_verif = $this->produksi_model->get_by_uuid_produksi_verif($selected_items);

		$data['produksi'] = $produksi_data_verif;

		if (empty($produksi_data)) {
			show_error('Data tidak ditemukan, Pilih data yang ingin dicetak', 404);
		}

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(8, 9.5, 8);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 10);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 30);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(8, "\n");
		$pdf->MultiCell(0, 5, 'VERIFIKASI PROSES PRODUKSI', 0, 'C');
		$pdf->Ln(3);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['produksi']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 7);
		$pdf->SetX(10);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Shift: ' . $data['produksi']->shift);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Produk: ' . $data['produksi']->nama_produk);
		$pdf->Ln(4);
		
		$pdf->Cell(35, 4, 'jenis Produk', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->nama_produk, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kode Produksi', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->kode_produksi, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(35, 4, 'Parameter', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, 'Kode', 1, 0, 'C');
			$pdf->Cell(10, 4, 'Kg', 1, 0, 'C');
			$pdf->Cell(10, 4, 'Sens', 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(195, 4, 'Raw Material', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Tepung Terigu', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->tegu_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tegu_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tegu_sens, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Tapioka Stract', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->tapioka_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tapioka_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tapioka_sens, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Ragi', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->ragi_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->ragi_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->ragi_sens, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Bread Improver', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->bread_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->bread_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->bread_sens, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Premix', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->premix_kode_1, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->premix_berat_1, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->premix_sens_1, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, '', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->premix_kode_2, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->premix_berat_2, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->premix_sens_2, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, '', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->premix_kode_3, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->premix_berat_3, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->premix_sens_3, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Shortening', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->shortening_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->shortening_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->shortening_sens, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Chill Water (15 ± 1°C)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->chill_water_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->chill_water_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->chill_water_sens, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Mixing Dough', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Waktu Mixing (1) Menit', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_waktu, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Hasil & Nomor Mesin', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_hasil. ' / '. $item->mix_dough_mesin, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Dough Cutting(630-670 g)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_cutting, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Suhu & RH Ruang', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_suhu_ruang. ' / '. $item->mix_dough_rh_ruang, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Suhu Adonan (29-31°C)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_suhu_adonan, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Fermentasi', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Suhu (°C)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_suhu, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'RH (%)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_rh, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Jam Mulai', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$jam_mulai = date('H:i', strtotime($item->fermen_jam_mulai));
			$pdf->Cell(40, 4, $jam_mulai, 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Jam Selesai', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$jam_selesai = date('H:i', strtotime($item->fermen_jam_selesai));
			$pdf->Cell(40, 4, $jam_selesai, 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Lama Proses', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_lama_proses, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Electric Baking', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Suhu Produk(80-97°C)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->electric_baking_suhu, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'No.Mesin & Expand Roti(%)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->electric_baking_mesin. ' / '. $item->electric_baking_expand , 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Sensori', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Kematangan', 1, 0, 'L');

		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_kematangan == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}	

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Rasa', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_rasa == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Aroma', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_aroma == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Tekstur', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_tekstur == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Warna', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_warna == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}	
		$pdf->Ln(6);

		$tanggal_stall = $data['produksi']->date_stall;
		$stall = new DateTime($tanggal_stall);
		$formatted_stall = strftime('%A, %d %B %Y', $stall->getTimestamp());
		$pdf->SetX(10);
		$pdf->Write(0, 'Tanggal: ' . $formatted_stall);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Shift: ' . $data['produksi']->shift_pack);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Produk: ' . $data['produksi']->nama_produk);
		$pdf->Ln(4);
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Stalling', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Jam Mulai', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$jamMulai = date('H:i', strtotime($item->stall_jam_mulai));
			$pdf->Cell(40, 4, $jamMulai, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Jam Berhenti', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$jamBerhenti = date('H:i', strtotime($item->stall_jam_berhenti));
			$pdf->Cell(40, 4, $jamBerhenti, 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kadar Air 32-34(%)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->stall_kadar_air, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Drying', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Suhu (°C)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->dry_suhu, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Speed Rotasi (4-6 RPM)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->dry_rotasi, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kadar Air 4-8(%)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->dry_kadar_air, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Produk', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Hasil', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_hasil == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Rasa', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_rasa == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Aroma', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_aroma == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Tekstur', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_tekstur == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Warna', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_warna == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Packing Area', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Nama Produk', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->packing_nama_produk, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kode Kemasan', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->packing_kode_kemasan, 1, 0, 'C');
		}
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Best Before', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$bestBefore = date('d-m-Y', strtotime($item->packing_bb));
			$pdf->Cell(40, 4, $bestBefore, 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kondisi Kemasan', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->packing_kondisi_kemasan, 1, 0, 'C');
		}
		$pdf->Ln();

		$pdf->SetFont('dejavusans', '', 7);
		$pdf->SetXY(8, 250); 
		$pdf->Cell(5, 3, '✔ : Ok', 0, 1, 'L');
		$pdf->Cell(5, 3, '✘ : Tdk Ok', 0, 1, 'L'); 

		$pdf->SetFont('times', 'I', 7);
		$pdf->SetXY(195, 250); 
		$pdf->Cell(5, 3, 'QB 06/02', 0, 1, 'R'); 
		$pdf->SetFont('times', '', 7);
		$pdf->SetXY(33, 250); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($produksi_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(12, 0, '', 0, 0, 'L'); 
				$pdf->Cell(12, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$pdf->SetXY(13, 275); 
		$pdf->Cell(60, 5, 'Diperiksa Oleh : '. $data['produksi']->username, 0, 0, 'C');

		$nama_spv = $data['produksi']->nama_spv; 
		$tanggal_update = $data['produksi']->tgl_update;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$status_verifikasi = true;

		foreach ($produksi_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		if ($status_verifikasi) {

			$url = 'Diverifikasi secara digital oleh,' . "\n" . $nama_spv . "\n" . 'SPV QC Bread Crumb' . "\n" . $update_tanggal;
			$pdf->SetFont('times', '', 7);
			$pdf->SetXY(150, 275); 
			$pdf->Cell(60, 5, 'Disetujui oleh,', 0, 0, 'C');
			$pdf->write2DBarcode($url, 'QRCODE,L', 172, 280, 16, 16, null, 'N'); 
			$pdf->SetXY(150, 295); 
			$pdf->Cell(60, 5, 'Supervisor QC', 0, 0, 'C');
		} else {
			$pdf->SetTextColor(255, 0, 0); 
			$pdf->SetFont('times', '', 8);
			$pdf->SetXY(150, 275); 
			$pdf->Cell(60, 4, 'Data Belum Diverifikasi', 0, 0, 'C');
		}

		$pdf->setPrintFooter(false);
		// $pdf->Output("Verifikasi Produksi.pdf", 'I');
		$filename = "Verifikasi Produksi_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}

}

