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
			'produksi' => $this->produksi_model->get_data_by_plant(),
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

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('produksi');
		}

		$deleted = $this->produksi_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('produksi');
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

	public function baking($uuid)
	{
		$rules = $this->produksi_model->rules_bake();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->baked($uuid);
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
		$this->load->view('form/produksi/produksi-baking', $data);
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

	public function grinding($uuid)
	{
		$rules = $this->produksi_model->rules_grinding();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->produksi_model->grind($uuid);
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
		$this->load->view('form/produksi/produksi-grinding', $data);
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
			'produksi' => $this->produksi_model->get_data_by_plant(),
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
			'produksi' => $this->produksi_model->get_data_by_plant(),
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
		$this->load->model('pegawai_model');
		$nama_qc = $this->pegawai_model->get_nama_lengkap($data['produksi']->username);
		$nama_prod = $this->pegawai_model->get_nama_lengkap($data['produksi']->nama_produksi);
		$nama_spv = $this->pegawai_model->get_nama_lengkap($data['produksi']->nama_spv);

		require_once APPPATH . 'third_party/tcpdf/tcpdf.php';

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, 'LEGAL', true, 'UTF-8', false);
		$pdf->setPrintHeader(false); 
		$pdf->SetMargins(9, 10, 8);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 13);

		$logo_path = FCPATH . 'assets/img/logo.jpg';
		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 35);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan\n");
		}

		$pdf->Write(11, "\n");
		$pdf->MultiCell(0, 5, 'VERIFIKASI PROSES PRODUKSI', 0, 'C');
		$pdf->Ln(5);

		setlocale(LC_TIME, 'id_ID.UTF-8', 'id_ID', 'indonesian');
		$tanggal = $data['produksi']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());
		$formatted_date2 = strftime('%d %B %Y', $date->getTimestamp());

		$pdf->SetFont('times', '', 8);
		$pdf->SetX(8);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Shift: ' . $data['produksi']->shift);
		$pdf->SetX($pdf->GetX() + 10);
		$pdf->Write(0, 'Produk: ' . $data['produksi']->nama_produk);
		$pdf->Ln(4);

		$pdf->Cell(35, 4, 'Jenis Produk', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->nama_produk, 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kode Produksi', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->kode_produksi, 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(35, 4, 'Parameter', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;
		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, 'Kode', 1, 0, 'C');
			$pdf->Cell(10, 4, 'Kg', 1, 0, 'C');
			$pdf->Cell(10, 4, 'Sens', 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, 'Kode', 1, 0, 'C'); 
			$pdf->Cell(10, 4, 'Kg', 1, 0, 'C'); 
			$pdf->Cell(10, 4, 'Sens', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(195, 4, 'Raw Material', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Tepung Terigu', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->tegu_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tegu_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tegu_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, '', 1, 0, 'C');
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Tapioka Stract', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->tapioka_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tapioka_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->tapioka_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, '', 1, 0, 'C');
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Ragi', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->ragi_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->ragi_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->ragi_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, '', 1, 0, 'C');
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
			$pdf->Cell(10, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Bread Improver', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->bread_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->bread_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->bread_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, '', 1, 0, 'C'); 
			$pdf->Cell(10, 4, '', 1, 0, 'C');
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
		}
		$pdf->Ln();

		$maxColumns = 4;
		$selectedProduksi = array_slice($produksi_data, 0, $maxColumns);

		$premixColumns = [];
		foreach ($selectedProduksi as $item) {
			$premixData = json_decode($item->premix, true);
			$premixColumns[] = is_array($premixData) ? $premixData : [];
		}

		$maxRows = 0;
		foreach ($premixColumns as $col) {
			$maxRows = max($maxRows, count($col));
		}

		for ($row = 0; $row < $maxRows; $row++) {
			$pdf->Cell(35, 4, ($row === 0) ? 'Premix' : '', 1, 0, 'L');

			for ($col = 0; $col < $maxColumns; $col++) {
				$kode  = $premixColumns[$col][$row]['kode']  ?? '';
				$berat = $premixColumns[$col][$row]['berat'] ?? '';
				$sens  = $premixColumns[$col][$row]['sens']  ?? '';

				$pdf->Cell(20, 4, $kode, 1, 0, 'C');
				$pdf->Cell(10, 4, $berat, 1, 0, 'C');
				$pdf->Cell(10, 4, $sens, 1, 0, 'C');
			}

			$pdf->Ln();
		}

		$pdf->Cell(35, 4, 'Shortening', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->shortening_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->shortening_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->shortening_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, '', 1, 0, 'C');
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Chill Water (15 ± 1°C)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(20, 4, $item->chill_water_kode, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->chill_water_berat, 1, 0, 'C');
			$pdf->Cell(10, 4, $item->chill_water_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(20, 4, '', 1, 0, 'C');
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
			$pdf->Cell(10, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Mixing Dough', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Waktu Mixing (Speed 1/ Speed 2)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_waktu_1 . " / " . $item->mix_dough_waktu_2, 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Hasil & Nomor Mesin', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$hasil = ($item->mix_dough_hasil == 1) ? 'Oke' : 'Tidak Oke';
			$pdf->Cell(40, 4, $hasil . ' / ' . $item->mix_dough_mesin, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Sensori', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_sens, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Dough Cutting(630-670 g)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_cutting, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Suhu & RH Ruang', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_suhu_ruang. ' / '. $item->mix_dough_rh_ruang, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Suhu Adonan (29-31°C)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->mix_dough_suhu_adonan, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Fermentasi', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Suhu (°C)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_suhu, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'RH (%)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_rh, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Jam Mulai', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$jam_mulai = date('H:i', strtotime($item->fermen_jam_mulai));
			$pdf->Cell(40, 4, $jam_mulai, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Jam Selesai', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$jam_selesai = date('H:i', strtotime($item->fermen_jam_selesai));
			$pdf->Cell(40, 4, $jam_selesai, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Lama Proses', 1, 0, 'L');

		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_lama_proses, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Hasil Proofing', 1, 0, 'L');

		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->fermen_hasil_proof, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Electric Baking', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Baking Time (High / Low)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->electric_baking_time_high. ' / '. $item->electric_baking_time_low, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Suhu Produk(80-97°C)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->electric_baking_suhu, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'No.Mesin & Expand Roti(%)', 1, 0, 'L');
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->electric_baking_mesin. ' / '. $item->electric_baking_expand, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Sensori', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Kematangan', 1, 0, 'L');

		$pdf->SetFont('dejavusans', '', 7);	
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_kematangan == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Rasa', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_rasa == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Aroma', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_aroma == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Tekstur', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_tekstur == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->SetFont('times', 'B', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Warna', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);	
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->sens_warna == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln(6);
		$pdf->SetFont('times', '', 8);
		$tanggal_stall = $data['produksi']->date_stall;
		$stall = new DateTime($tanggal_stall);
		$formatted_stall = strftime('%A, %d %B %Y', $stall->getTimestamp());
		$pdf->SetX(8);
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
		$dataCount = count($produksi_data);
		$emptyColumns = 4 - $dataCount;

		foreach ($produksi_data as $item) {
			$jamMulai = date('H:i', strtotime($item->stall_jam_mulai));
			$pdf->Cell(40, 4, $jamMulai, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();

		$pdf->Cell(35, 4, 'Jam Berhenti', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$jamBerhenti = date('H:i', strtotime($item->stall_jam_berhenti));
			$pdf->Cell(40, 4, $jamBerhenti, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();

		$pdf->Cell(35, 4, 'Lama Aging', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$jamBerhenti = date('H:i', strtotime($item->stall_aging));
			$pdf->Cell(40, 4, $jamBerhenti, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kadar Air 32-34(%)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->stall_kadar_air, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();

		$pdf->SetFont('times', 'B', 7);
		$pdf->Cell(195, 4, 'Grinding', 1, 0, 'L');
		$pdf->Ln();
		$pdf->SetFont('times', '', 7);

		$pdf->Cell(35, 4, 'Hasil Grinding', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->hasil_grinding, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
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

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Speed Rotasi (4-6 RPM)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->dry_rotasi, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kadar Air 4-8(%)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->dry_kadar_air, 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
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

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kode Kemasan', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->packing_kode_kemasan, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Best Before', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$bestBefore = date('d-m-Y', strtotime($item->packing_bb));
			$pdf->Cell(40, 4, $bestBefore, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
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

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Rasa', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);    
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_rasa == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();
		$pdf->Cell(35, 4, 'Aroma', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);    
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_aroma == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();

		$pdf->Cell(35, 4, 'Tekstur', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);    
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_tekstur == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C');
		}

		$pdf->SetFont('times', '', 7);
		$pdf->Ln();

		$pdf->Cell(35, 4, 'Warna', 1, 0, 'L');
		$pdf->SetFont('dejavusans', '', 7);    
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, ($item->produk_warna == 'oke') ? '✔' : '✘', 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->SetFont('times', '', 7);
		$pdf->Cell(35, 4, 'Kondisi Kemasan / Ketepatan', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$kondisi = ($item->packing_kondisi_kemasan == 1) ? 'Oke' : 'Tidak Oke';
			$pdf->Cell(40, 4, $kondisi . " / " . $item->packing_ketepatan, 1, 0, 'C');
		}
		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Kode Supplier Kemasan', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->packing_kode_supplier, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();
		$pdf->Cell(35, 4, 'Net Weight (9.850 - 10.100 g)', 1, 0, 'L');
		foreach ($produksi_data as $item) {
			$pdf->Cell(40, 4, $item->packing_net_weight, 1, 0, 'C');
		}

		for ($i = 0; $i < $emptyColumns; $i++) {
			$pdf->Cell(40, 4, '', 1, 0, 'C'); 
		}

		$pdf->Ln();

		$tanggal_update = $data['produksi']->tgl_update;
		$update = new DateTime($tanggal_update); 
		$update_tanggal = $update->format('d-m-Y | H:i');

		$tanggal_update = $data['produksi']->tgl_update_prod;
		$update_prod = new DateTime($tanggal_update); 
		$update_tanggal_prod = $update_prod->format('d-m-Y | H:i');

		$status_verifikasi = true;
		foreach ($produksi_data as $item) {
			if ($item->status_spv != '1') {
				$status_verifikasi = false;
				break; 
			}
		}

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->SetFont('dejavusans', '', 5);
		$pdf->MultiCell(0, 7, "✓ : Ok\n✗ : Tidak Ok", 0, 'L');

		$pdf->SetY($pdf->GetY() + 2); 
		$pdf->Cell(5, 3, 'Catatan : ', 0, 1, 'L'); 
		foreach ($produksi_data as $item) {
			if (!empty($item->catatan)) {
				$pdf->Cell(8, 0, '', 0, 0, 'L'); 
				$pdf->Cell(200, 0, ' - ' . $item->catatan, 0, 1, 'L');
			}
		}

		$y_after_keterangan = $pdf->GetY();

		if ($status_verifikasi) {
			$pdf->SetFont('times', '', 8);
			$pdf->SetTextColor(0, 0, 0);
			$y_verifikasi = $y_after_keterangan;

			$pdf->SetXY(25, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Dibuat Oleh,', 0, 0, 'C');

			$pdf->SetXY(25, $y_verifikasi + 10);
			$pdf->SetFont('times', 'U', 8);
			$pdf->Cell(35, 5, $nama_qc, 0, 1, 'C');
			$pdf->SetFont('times', '', 8);
			$pdf->Cell(67, 5, 'QC Inspector', 0, 0, 'C');

			$pdf->SetXY(90, $y_verifikasi + 5);
			$pdf->Cell(35, 5, 'Diketahui Oleh,', 0, 0, 'C');

			if (!empty($data['produksi']->nama_produksi)) {
				$qr_text_produksi = "Diketahui secara digital oleh,\n" 
				. $nama_prod . "\n"
				. "Foreman/Forelady Produksi\n"
				. $update_tanggal_prod;

				$pdf->write2DBarcode($qr_text_produksi, 'QRCODE,L', 100, $y_verifikasi + 10, 15, 15, null, 'N');
				$pdf->SetXY(90, $y_verifikasi + 24);
				$pdf->Cell(35, 5, 'Foreman/Forelady Produksi', 0, 0, 'C');
			}
			$pdf->SetXY(150, $y_verifikasi + 5);
			$pdf->Cell(49, 5, 'Disetujui Oleh,', 0, 0, 'C');

			$qr_text = "Diverifikasi secara digital oleh,\n"
			. $nama_spv . "\n"
			. "SPV QC Bread Crumb\n"
			. $update_tanggal;

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
		$filename = "Verifikasi Produksi_{$formatted_date2}.pdf";
		$pdf->Output($filename, 'I');
	}

}

