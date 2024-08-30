<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Dompdf\Dompdf;
setlocale(LC_TIME, 'id_ID.UTF-8');


class Post_mortem extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('post_mortem_model');
		$this->load->library('form_validation');

		if(!$this->auth_model->current_user()){ 
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'post_mortem' => $this->post_mortem_model->get_all_refresh(),
			'active_nav' => 'post-mortem'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('post-mortem/post-mortem');
		$this->load->view('partials/footer');
	}


	public function tambah()
	{
		$rules = $this->post_mortem_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->post_mortem_model->insert();

			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Post Mortem berhasil di simpan');
				redirect('post-mortem');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Post Mortem gagal di simpan');
				redirect('post-mortem');
			}
		}

		$data = array(
			'active_nav' => 'post-mortem'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('post-mortem/post-mortem-tambah', $data);
		$this->load->view('partials/footer');
	}

	public function edit($uuid)
	{
		$rules = $this->post_mortem_model->rules();
		$this->form_validation->set_rules($rules);

		$data = $this->post_mortem_model->get_by_uuid($uuid);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->post_mortem_model->update($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Post Mortem berhasil di update');
				redirect('post-mortem');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Post Mortem gagal di update');
				redirect('post-mortem');
			}
		}

		$data = array(
			'post_mortem' => $this->post_mortem_model->get_by_uuid($uuid),
			'active_nav' => 'post-mortem' 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('post-mortem/post-mortem-edit', $data);
		$this->load->view('partials/footer');
	}

	public function cetak($uuid)
	{
		require_once APPPATH.'third_party/tcpdf/tcpdf.php';

		$data['post_mortem'] = $this->post_mortem_model->get_by_uuid($uuid);

		if (!$data['post_mortem']) {
			show_error('Data tidak ditemukan', 404);
		}

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
		$pdf->SetMargins(10, 9.5, 10);
		$pdf->AddPage();
		$pdf->SetFont('times', 'B', 12);

		$logo = base_url('assets/img/logo.jpg');

		$logo_path = FCPATH . 'assets/img/logo.jpg';

		if (file_exists($logo_path)) {
			$pdf->Image($logo_path, 10, 10, 30);
		} else {
			$pdf->Write(7, "Logo tidak ditemukan". "\n");
		}

		$pdf->Write(7, "". "\n");
		$pdf->MultiCell(0, 5, 'PEMERIKSAAN POST MORTEM', 0, 'C');
		$pdf->Ln(2);

		$tanggal = $data['post_mortem']->date;
		$date = new DateTime($tanggal);
		$formatted_date = strftime('%A, %d %B %Y', $date->getTimestamp());

		$pdf->SetFont('helvetica', '', 7);
		$pdf->Write(0, 'Tanggal: ' . $formatted_date);
		$pdf->Write(0, 'Shift: '. $data['post_mortem']->shift, 2, 0, 'R');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Waktu:', 1, 0, 'L');
		$pdf->Cell(100, 4, $data['post_mortem']->waktu_kedatangan, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'No. Truck:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->nomor_truk, 1, 0, 'L');
		$pdf->Cell(40, 4, 'Nopol Truk:', 1, 0, 'L');
		$pdf->Cell(20, 4, $data['post_mortem']->nopol_truk, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Farm:', 1, 0, 'L');
		$pdf->Cell(100, 4, $data['post_mortem']->nama_farm, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Jumlah Ayam:', 1, 0, 'L');
		$pdf->Cell(100, 4, $data['post_mortem']->jumlah_ayam .' Ekor', 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Average Farm:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->average_farm .' Kg', 1, 0, 'L');
		$pdf->Cell(40, 4, 'Average RPA:', 1, 0, 'L');
		$pdf->Cell(20, 4, $data['post_mortem']->average_rpa.' Kg', 1, 0, 'L');
		$pdf->Ln(5);
		$pdf->SetFont('times', 'B', 8);
		$pdf->Cell(130, 5, 'DEFECT TUNGGAL', 1, 	0, 'C');
		$pdf->Cell(60, 5, 'DEFECT > 1', 1, 0, 'C');
		$pdf->Ln();
		$pdf->SetFont('helvetica', '', 7);
		$pdf->Cell(90, 4, 'Defect Farm', 1, 0, 'L');
		$pdf->Cell(40, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(10, 4, 'TOTAL', 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '1. Sayap Memar Kebiruan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sayap_memar_kebiruan_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->sayap_memar_kebiruan_defect_lebih, 1, 0, 'L');
		$total_sayap_memar_kebiruan = $data['post_mortem']->sayap_memar_kebiruan_defect + $data['post_mortem']->sayap_memar_kebiruan_defect_lebih;
		$pdf->Cell(10, 4, $total_sayap_memar_kebiruan, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '2. Sayap Patah Memar:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sayap_patah_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->sayap_patah_memar_defect_lebih, 1, 0, 'L');
		$total_sayap_patah_memar = $data['post_mortem']->sayap_patah_memar_defect + $data['post_mortem']->sayap_patah_memar_defect_lebih;
		$pdf->Cell(10, 4, $total_sayap_patah_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '3. Kaki Memar Kebiruan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->kaki_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->kaki_memar_kebiruan_defect_lebih, 1, 0, 'L');
		$total_kaki_memar = $data['post_mortem']->kaki_memar_defect + $data['post_mortem']->kaki_memar_kebiruan_defect_lebih;
		$pdf->Cell(10, 4, $total_kaki_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '4. Kaki Patah Memar:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->kaki_patah_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->kaki_patah_memar_defect_lebih, 1, 0, 'L');
		$total_kaki_patah = $data['post_mortem']->kaki_patah_defect + $data['post_mortem']->kaki_patah_memar_defect_lebih;
		$pdf->Cell(10, 4, $total_kaki_patah, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '5. Arthritis:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->kaki_arthritis_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->arthritis_defect_lebih, 1, 0, 'L');
		$total_arthritis = $data['post_mortem']->kaki_arthritis_defect + $data['post_mortem']->arthritis_defect_lebih;
		$pdf->Cell(10, 4, $total_arthritis, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '6. Hock Bruise:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->hock_bruise_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->hock_bruise_defect_lebih, 1, 0, 'L');
		$total_hock_bruise = $data['post_mortem']->hock_bruise_defect + $data['post_mortem']->hock_bruise_defect_lebih;
		$pdf->Cell(10, 4, $total_hock_bruise, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '7. Hock Burn:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->hock_burn_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->hock_burn_defect_lebih, 1, 0, 'L');
		$total_hock_burn = $data['post_mortem']->hock_burn_defect + $data['post_mortem']->hock_burn_defect_lebih;
		$pdf->Cell(10, 4, $total_hock_burn, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '8. Dada Memar kebiruaan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->dada_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->dada_memar_kebiruan_defect_lebih, 1, 0, 'L');
		$total_dada_memar = $data['post_mortem']->dada_memar_defect + $data['post_mortem']->dada_memar_kebiruan_defect_lebih;
		$pdf->Cell(10, 4, $total_dada_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '9. Breast burn/dada terbakar:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->breast_burn_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->breast_burn_defect_lebih, 1, 0, 'L');
		$total_breast_burn = $data['post_mortem']->breast_burn_defect + $data['post_mortem']->breast_burn_defect_lebih;
		$pdf->Cell(10, 4, $total_breast_burn, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '10. Punggung memar kebiruan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->punggung_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->punggung_memar_kebiruan_defect_lebih, 1, 0, 'L');
		$total_punggung_memar = $data['post_mortem']->punggung_memar_defect + $data['post_mortem']->punggung_memar_kebiruan_defect_lebih;
		$pdf->Cell(10, 4, $total_punggung_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '11. Luka Parut:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->luka_parut_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->luka_parut_defect_lebih, 1, 0, 'L');
		$total_luka_parut = $data['post_mortem']->luka_parut_defect + $data['post_mortem']->luka_parut_defect_lebih;
		$pdf->Cell(10, 4, $total_luka_parut, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '12. Kulit Berjamur:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->kulit_berjamur_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->kulit_berjamur_defect_lebih, 1, 0, 'L');
		$total_kulit_berjamur = $data['post_mortem']->kulit_berjamur_defect + $data['post_mortem']->kulit_berjamur_defect_lebih;
		$pdf->Cell(10, 4, $total_kulit_berjamur, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '13. Penyakit bisul dikulit :', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->penyakit_kulit_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->penyakit_bisul_defect_lebih, 1, 0, 'L');
		$total_penyakit_kulit = $data['post_mortem']->penyakit_kulit_defect + $data['post_mortem']->penyakit_bisul_defect_lebih;
		$pdf->Cell(10, 4, $total_penyakit_kulit, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '14. Kulit & daging merah tua/ada bintik merah darah:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->kulit_daging_bintik_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->kulit_bintik_merah_defect_lebih, 1, 0, 'L');
		$total_kulit_bintik = $data['post_mortem']->kulit_daging_bintik_defect + $data['post_mortem']->kulit_bintik_merah_defect_lebih;
		$pdf->Cell(10, 4, $total_kulit_bintik, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '15. Pertumbuhan / fisik tidak normal:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->pertumbuhan_tidak_normal_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->pertumbuhan_tidak_normal_defect_lebih, 1, 0, 'L');
		$total_abnormal = $data['post_mortem']->pertumbuhan_tidak_normal_defect + $data['post_mortem']->pertumbuhan_tidak_normal_defect_lebih;
		$pdf->Cell(10, 4, $total_abnormal, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'JUMLAH DEFECT AYAM (A):', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sub_total_farm_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH DEFECT AYAM (D):', 1, 0, 'L');
		$pdf->Cell(10, 4, $data['post_mortem']->jumlah_defect_d, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Defect Farm Internal Organ', 1, 0, 'L');
		$pdf->Cell(40, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '16. Hati tdk normal/berpenyakit:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->hati_tidak_normal_defect, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '17. Jantung tdk normal/berpenyakit:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->jantung_tidak_normal_defect, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '18. Organ dalam lain tdk normal:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->organ_dalam_tidak_normal_defect, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'JUMLAH ORGAN DALAM DEFECT:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sub_total_ordal_farm_defect, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Sortir Gliller (Memar Kemerahan)', 1, 0, 'L');
		$pdf->Cell(40, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(10, 4, 'TOTAL', 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '19. Sayap memar kemerahan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sg_sayap_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->sg_sayap_memar_kemerahan_defect_lebih, 1, 0, 'L');
		$total_sg_sayap_memar = $data['post_mortem']->sg_sayap_memar_defect + $data['post_mortem']->sg_sayap_memar_kemerahan_defect_lebih;
		$pdf->Cell(10, 4, $total_sg_sayap_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '20. Kaki memar kemerahan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sg_kaki_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->sg_kaki_memar_kemerahan_defect_lebih, 1, 0, 'L');
		$total_sg_kaki_memar = $data['post_mortem']->sg_kaki_memar_defect + $data['post_mortem']->sg_kaki_memar_kemerahan_defect_lebih;
		$pdf->Cell(10, 4, $total_sg_kaki_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '21. Dada memar kemerahan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sg_dada_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->sg_dada_memar_kemerahan_defect_lebih, 1, 0, 'L');
		$total_sg_dada_memar = $data['post_mortem']->sg_dada_memar_defect + $data['post_mortem']->sg_dada_memar_kemerahan_defect_lebih;
		$pdf->Cell(10, 4, $total_sg_dada_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '22. Punggung Memar Kemerahan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sg_punggung_memar_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->sg_punggung_memar_kemerahan_defect_lebih, 1, 0, 'L');
		$total_sg_punggung_memar = $data['post_mortem']->sg_punggung_memar_defect + $data['post_mortem']->sg_punggung_memar_kemerahan_defect_lebih;
		$pdf->Cell(10, 4, $total_sg_punggung_memar, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'JUMLAH AYAM DEFECT (B):', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sub_total_sg_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH AYAM DEFECT (E):', 1, 0, 'L');
		$pdf->Cell(10, 4, $data['post_mortem']->jumlah_defect_e, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Defect Proses Produksi', 1, 0, 'L');
		$pdf->Cell(40, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(10, 4, 'TOTAL', 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '23. Over Scalder:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_over_scalder_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_over_scalder_defect_lebih, 1, 0, 'L');
		$total_rpa_over_scalder = $data['post_mortem']->rpa_over_scalder_defect + $data['post_mortem']->rpa_over_scalder_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_over_scalder, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '24. Sayap patah tanpa memar:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_sayap_patah_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_sayap_patah_defect_lebih, 1, 0, 'L');
		$total_rpa_sayap_patah = $data['post_mortem']->rpa_sayap_patah_defect + $data['post_mortem']->rpa_sayap_patah_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_sayap_patah, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '25. Kaki patah tanpa memar:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_kaki_patah_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_kaki_patah_defect_lebih, 1, 0, 'L');
		$total_rpa_kaki_patah = $data['post_mortem']->rpa_kaki_patah_defect + $data['post_mortem']->rpa_kaki_patah_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_kaki_patah, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '26. Kulit sobek dada - paha:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_kulit_sobek_dp_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_kulit_sobek_dp_defect_lebih, 1, 0, 'L');
		$total_rpa_kulit_dp = $data['post_mortem']->rpa_kulit_sobek_dp_defect + $data['post_mortem']->rpa_kulit_sobek_dp_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_kulit_dp, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '27. Kulit sobek dada:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_kulit_sobek_dada_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_kulit_sobek_dada_defect_lebih, 1, 0, 'L');
		$total_rpa_kulit_dada = $data['post_mortem']->rpa_kulit_sobek_dada_defect + $data['post_mortem']->rpa_kulit_sobek_dada_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_kulit_dada, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '28. Kulit sobek paha:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_kulit_sobek_paha_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_kulit_sobek_paha_defect_lebih, 1, 0, 'L');
		$total_rpa_kulit_paha = $data['post_mortem']->rpa_kulit_sobek_paha_defect + $data['post_mortem']->rpa_kulit_sobek_paha_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_kulit_paha, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '29. Karkas rusak:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_karkas_rusak_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_karkas_rusak_defect_lebih, 1, 0, 'L');
		$total_rpa_karkas = $data['post_mortem']->rpa_karkas_rusak_defect + $data['post_mortem']->rpa_karkas_rusak_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_karkas, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '30. Empedu Pecah:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_empedu_pecah_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_empedu_pecah_defect_lebih, 1, 0, 'L');
		$total_rpa_empedu = $data['post_mortem']->rpa_empedu_pecah_defect + $data['post_mortem']->rpa_empedu_pecah_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_empedu, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '31. Daging dada bawah terpotong:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_daging_dada_bawah_cut_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_daging_dada_bawah_defect_lebih, 1, 0, 'L');
		$total_rpa_daging_bawah = $data['post_mortem']->rpa_daging_dada_bawah_cut_defect + $data['post_mortem']->rpa_daging_dada_bawah_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_daging_bawah, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '32. Daging dada atas terpotong:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_daging_dada_atas_cut_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_daging_dada_atas_defect_lebih, 1, 0, 'L');
		$total_rpa_daging_atas = $data['post_mortem']->rpa_daging_dada_atas_cut_defect + $data['post_mortem']->rpa_daging_dada_atas_defect_lebih; 
		$pdf->Cell(10, 4, $total_rpa_daging_atas, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '33. kaki terpotong:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->rpa_kaki_terpotong_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->rpa_kaki_terpotong_defect_lebih, 1, 0, 'L');
		$total_rpa_kaki_terpotong = $data['post_mortem']->rpa_kaki_terpotong_defect + $data['post_mortem']->rpa_kaki_terpotong_defect_lebih;
		$pdf->Cell(10, 4, $total_rpa_kaki_terpotong, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'JUMLAH AYAM DEFECT(C)', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sub_total_rpa_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH DEFECT AYAM (F):', 1, 0, 'L');
		$pdf->Cell(10, 4, $data['post_mortem']->jumlah_defect_f, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'Defect Proses Internal Organ', 1, 0, 'L');
		$pdf->Cell(40, 4, 'JUMLAH', 1, 0, 'L');
		$pdf->Cell(60, 4, 'AYAM DENGAN DEFECT > 1', 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '34. Hati hancur ringan:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->ip_hati_hancur_ringan_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, $data['post_mortem']->ayam_defect_lebih_dari_satu, 1, 0, 'L');
		$pdf->Cell(10, 4, $data['post_mortem']->ayam_defect_lebih_dari_satu, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, '35. Hati hancur berat:', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->ip_hati_hancur_berat_defect, 1, 0, 'L');
		$pdf->Ln();
		$pdf->Cell(90, 4, 'JUMLAH ORGAN DALAM DEFECT', 1, 0, 'L');
		$pdf->Cell(40, 4, $data['post_mortem']->sub_total_ip_defect, 1, 0, 'L');
		$pdf->Cell(50, 4, 'JUMLAH AYAM DEFECT > 1 (G):', 1, 0, 'L');
		$pdf->Cell(10, 4, $data['post_mortem']->ayam_defect_lebih_dari_satu, 1, 0, 'L');
		$pdf->Ln();

		$pdf->SetFont('helvetica', '', 8);
		$pdf->Ln();
		$pdf->Cell(45, 4, 'Total Ayam Defect (A+B+C+G) = ', 0, 0, 'L');
		$pdf->Cell(20, 4, $data['post_mortem']->total_ayam_defect . ' ekor', 0, 0, 'L');
		$pdf->Cell(45, 4, 'Total Defect Ayam (D+E+F) = ', 0, 0, 'L');
		$pdf->Cell(10, 4, $data['post_mortem']->total_defect_ayam_lebih . ' ekor', 0, 0, 'L');
		$pdf->Ln(); 
		$pdf->Cell(45, 4, 'Presentase Ayam Defect = ', 0, 0, 'L');
		$pdf->Cell(20, 4, number_format($data['post_mortem']->total_ayam_defect_persen, 2) . ' %', 0, 0, 'L');
		$pdf->Cell(45, 4, 'Presentase Defect Ayam = ', 0, 0, 'L');
		$pdf->Cell(10, 4, number_format($data['post_mortem']->total_defect_ayam_lebih_persen, 2) . ' %', 0, 0, 'L');
		$pdf->Ln();
		$pdf->Ln();
		$pdf->Cell(70, 4, 'Catatan : Mesin autoevisceration yang digunakan ', 0, 0, 'L');
		$pdf->Cell(45, 4, $data['post_mortem']->nama_mesin , 0, 0, 'L');
		$pdf->Ln(1);

		$pdf->SetFont('helvetica', 'B', 8);

		$pdf->Cell(60, 18, 'Dibuat oleh', 0, 0, 'C');
		$pdf->Cell(60, 18, 'Diketahui oleh', 0, 0, 'C');
		$pdf->Cell(60, 18, 'Disetujui oleh', 0, 0, 'C');
		$pdf->Ln();

		$pdf->Cell(60, 5, '......................................', 0, 0, 'C');
		$pdf->Cell(60, 5, '......................................', 0, 0, 'C');
		$pdf->Cell(60, 5, '......................................', 0, 0, 'C');
		$pdf->Ln(3);

		$pdf->Cell(60, 5, 'Qc Inspector', 0, 0, 'C');
		$pdf->Cell(60, 5, 'SPV/Foreman/Lady Produksi', 0, 0, 'C');
		$pdf->Cell(60, 5, 'SPV/Foreman/Lady Qc', 0, 0, 'C');
		$pdf->Ln();


		// $pdf->Write(0, 'Waktu: ' . $data['post_mortem']->waktu_kedatangan . "\n");

		$pdf->Output("PostMortem.pdf", 'I');
	}

	public function tunggal($uuid)
	{
		$rules = $this->post_mortem_model->rules2();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$update = $this->post_mortem_model->tunggal($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Defect Tunggal berhasil diupdate');
			} else {
				$this->session->set_flashdata('error_msg', 'Data Defect Tunggal gagal diupdate');
			}redirect('post-mortem'); // Redirect setelah berhasil memperbarui data

		} else {
			$this->session->set_flashdata('error_msg', validation_errors());
		}

		$data = array(
			'post_mortem' => $this->post_mortem_model->get_by_uuid($uuid),
			'active_nav' => 'post-mortem',
			'uuid' => $uuid
		);

		$this->load->view('partials/head', $data);
		$this->load->view('post-mortem/post-mortem-tunggal', $data);
		$this->load->view('partials/footer');
	}

	public function detail($uuid)
	{

		$data = array(
			'post_mortem' => $this->post_mortem_model->get_by_uuid($uuid),
			'active_nav' => 'post-mortem' 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('post-mortem/post-mortem-detail', $data);
		$this->load->view('partials/footer');
	}
	public function report_pm() {

		$data['active_nav'] = 'report-pm'; 
		// $data['list_plant'] = $this->plant_model->get_all();
		$this->load->view('partials/head', $data);
		$this->load->view('report/report-pm');
		$this->load->view('partials/footer');
	}

	public function export_excel() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$today = $this->input->post('today'); 

			if ($today) {
				$data['post_mortem'] = $this->post_mortem_model->get_pm($today);
				// var_dump($data);
				// exit();

				if (!empty($data['post_mortem'])) {
					$spreadsheet = new Spreadsheet();
					$sheet = $spreadsheet->getActiveSheet();

					$sheet->setCellValue('A1', 'Laporan RPA Post Mortem')->getStyle('A1')->getFont()->setBold(true)->setSize(16);
					$sheet->setCellValue('A2', 'PT . Charoen Pokphand Indonesia - Food Division')->getStyle('A2')->getFont()->setSize(16);
					$sheet->setCellValue('A3', 'Banyumas - Jawa Tengah')->getStyle('A3')->getFont()->setSize(11);

					$sheet->mergeCells('B5:H5');
					$sheet->setCellValue('B5', 'Identitas')->getStyle('B5')->getFont()->setBold(true);
					$sheet->mergeCells('B6:B8');
					$sheet->getStyle('B6:B8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('B6', 'No Truck');
					$sheet->mergeCells('C6:C8');
					$sheet->getStyle('C6:C8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('C6', 'Nama Farm');
					$sheet->mergeCells('D6:D8');
					$sheet->getStyle('D6:D8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('D6', 'CH / OH');
					$sheet->mergeCells('E6:E8');
					$sheet->getStyle('E6:E8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('E6', 'Waktu');
					$sheet->mergeCells('F6:F8');
					$sheet->getStyle('F6:F8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('F6', 'Ayam di Proses');
					$sheet->mergeCells('G6:G8');
					$sheet->getStyle('G6:G8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('G6', 'Average Farm (Kg/Ekor)');
					$sheet->mergeCells('H6:H8');
					$sheet->getStyle('H6:H8')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('H6', 'Average RPA (Kg/Ekor)');

					$sheet->mergeCells('I5:AN5');
					$sheet->setCellValue('I5', 'Kondisi Ayam dari Farm')->getStyle('I5')->getFont()->setBold(true);

					$sheet->mergeCells('I6:L6');
					$sheet->setCellValue('I6', 'Sayap');
					$sheet->mergeCells('I7:J7');
					$sheet->setCellValue('I7', 'Memar Kebiruan');
					$sheet->setCellValue('I8', 'Defect');
					$sheet->setCellValue('J8', '%');
					$sheet->mergeCells('K7:L7');
					$sheet->setCellValue('K7', 'Patah Memar');
					$sheet->setCellValue('K8', 'Defect');
					$sheet->setCellValue('L8', '%');

					$sheet->mergeCells('M6:V6');
					$sheet->setCellValue('M6', 'Kaki');
					$sheet->mergeCells('M7:N7');
					$sheet->setCellValue('M7', 'Memar Kebiruan');
					$sheet->setCellValue('M8', 'Defect');
					$sheet->setCellValue('N8', '%');
					$sheet->mergeCells('O7:P7');
					$sheet->setCellValue('O7', 'Patah Memar');
					$sheet->setCellValue('O8', 'Defect');
					$sheet->setCellValue('P8', '%');
					$sheet->mergeCells('Q7:R7');
					$sheet->setCellValue('Q7', 'Arthritis');
					$sheet->setCellValue('Q8', 'Defect');
					$sheet->setCellValue('R8', '%');
					$sheet->mergeCells('Q7:R7');
					$sheet->setCellValue('Q7', 'Arthritis');
					$sheet->setCellValue('Q8', 'Defect');
					$sheet->setCellValue('R8', '%');
					$sheet->mergeCells('S7:T7');
					$sheet->setCellValue('S7', 'Hock Bruise');
					$sheet->setCellValue('S8', 'Defect');
					$sheet->setCellValue('T8', '%');
					$sheet->mergeCells('U7:V7');
					$sheet->setCellValue('U7', 'Hock Burn');
					$sheet->setCellValue('U8', 'Defect');
					$sheet->setCellValue('V8', '%');

					$sheet->mergeCells('W6:Z6');
					$sheet->setCellValue('W6', 'Dada');
					$sheet->mergeCells('W7:X7');
					$sheet->setCellValue('W7', 'Memar Kebiruan');
					$sheet->setCellValue('W8', 'Defect');
					$sheet->setCellValue('X8', '%');
					$sheet->mergeCells('Y7:Z7');
					$sheet->setCellValue('Y7', 'Breast Burn');
					$sheet->setCellValue('Y8', 'Defect');
					$sheet->setCellValue('Z8', '%');

					$sheet->mergeCells('AA6:AB7');
					$sheet->getStyle('AA6:AB7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AA6', 'Punggung Memar Kebiruan');
					$sheet->setCellValue('AA8', 'Defect');
					$sheet->setCellValue('AB8', '%');
					$sheet->mergeCells('AC6:AD7');
					$sheet->getStyle('AC6:AD7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AC6', 'Luka Parut');
					$sheet->setCellValue('AC8', 'Defect');
					$sheet->setCellValue('AD8', '%');
					$sheet->mergeCells('AE6:AF7');
					$sheet->getStyle('AE6:AF7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AE6', 'Kulit Berjamur');
					$sheet->setCellValue('AE8', 'Defect');
					$sheet->setCellValue('AF8', '%');
					$sheet->mergeCells('AG6:AH7');
					$sheet->getStyle('AG6:AH7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AG6', 'Penyakit Bisul');
					$sheet->setCellValue('AG8', 'Defect');
					$sheet->setCellValue('AH8', '%');
					$sheet->mergeCells('AI6:AJ7');
					$sheet->getStyle('AI6:AJ7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AI6', 'Kulit & Daging Merah Tua/ada Bintik Merah Darah');
					$sheet->setCellValue('AI8', 'Defect');
					$sheet->setCellValue('AJ8', '%');
					$sheet->mergeCells('AK6:AL7');
					$sheet->getStyle('AK6:AL7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AK6', 'Pertumbuhan / Fisik tidak Normal');
					$sheet->setCellValue('AK8', 'Defect');
					$sheet->setCellValue('AL8', '%');
					$sheet->mergeCells('AM6:AN7');
					$sheet->getStyle('AM6:AN7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AM6', 'Sub Total Defect');
					$sheet->setCellValue('AM8', 'Defect');
					$sheet->setCellValue('AN8', '%');

					$sheet->mergeCells('AO5:AX5');
					$sheet->setCellValue('AO5', 'Defect Handling Farm - RPHU')->getStyle('AO5')->getFont()->setBold(true);
					$sheet->mergeCells('AO6:AP7');
					$sheet->getStyle('AO6:AP7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AO6', 'Sayap Memar Kemerahan');
					$sheet->setCellValue('AO8', 'Defect');
					$sheet->setCellValue('AP8', '%');
					$sheet->mergeCells('AQ6:AR7');
					$sheet->getStyle('AQ6:AR7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AQ6', 'Kaki Memar Kemerahan');
					$sheet->setCellValue('AQ8', 'Defect');
					$sheet->setCellValue('AR8', '%');
					$sheet->mergeCells('AS6:AT7');
					$sheet->getStyle('AS6:AT7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AS6', 'Dada Memar Kemerahan');
					$sheet->setCellValue('AS8', 'Defect');
					$sheet->setCellValue('AT8', '%');
					$sheet->mergeCells('AU6:AV7');
					$sheet->getStyle('AU6:AV7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AU6', 'Punggung Memar Kemerahan');
					$sheet->setCellValue('AU8', 'Defect');
					$sheet->setCellValue('AV8', '%');
					$sheet->mergeCells('AW6:AX7');
					$sheet->getStyle('AW6:AX7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('AW6', 'Sub Total Defect');
					$sheet->setCellValue('AW8', 'Defect');
					$sheet->setCellValue('AX8', '%');

					$sheet->mergeCells('AY5:BV5');
					$sheet->setCellValue('AY5', 'Kondisi Ayam Akibat Proses RPA')->getStyle('AY5')->getFont()->setBold(true);
					$sheet->mergeCells('AY6:BJ6');
					$sheet->setCellValue('AY6', 'Karena Mesin Auto-Evisceration');
					$sheet->mergeCells('AY7:AZ7');
					$sheet->setCellValue('AY7', 'Kulit Sobek Dada');
					$sheet->setCellValue('AY8', 'Defect');
					$sheet->setCellValue('AZ8', '%');
					$sheet->mergeCells('BA7:BB7');
					$sheet->setCellValue('BA7', 'Kulit Sobek Paha');
					$sheet->setCellValue('BA8', 'Defect');
					$sheet->setCellValue('BB8', '%');
					$sheet->mergeCells('BC7:BD7');
					$sheet->setCellValue('BC7', 'Karkas Rusak');
					$sheet->setCellValue('BC8', 'Defect');
					$sheet->setCellValue('BD8', '%');
					$sheet->mergeCells('BE7:BF7');
					$sheet->setCellValue('BE7', 'Empedu Pecah');
					$sheet->setCellValue('BE8', 'Defect');
					$sheet->setCellValue('BF8', '%');
					$sheet->mergeCells('BG7:BH7');
					$sheet->setCellValue('BG7', 'Daging Dada Bawah Terpotong');
					$sheet->setCellValue('BG8', 'Defect');
					$sheet->setCellValue('BH8', '%');
					$sheet->mergeCells('BI7:BJ7');
					$sheet->setCellValue('BI7', 'Daging Dada Atas Terpotong');
					$sheet->setCellValue('BI8', 'Defect');
					$sheet->setCellValue('BJ8', '%');

					$sheet->mergeCells('BK6:BN6');
					$sheet->setCellValue('BK6', 'Karena Mesin Plucker');
					$sheet->mergeCells('BK7:BL7');
					$sheet->setCellValue('BK7', 'Sayap Patah Tanpa Memar');
					$sheet->setCellValue('BK8', 'Defect');
					$sheet->setCellValue('BL8', '%');
					$sheet->mergeCells('BM7:BN7');
					$sheet->setCellValue('BM7', 'Kulit Sobek Dada - Paha');
					$sheet->setCellValue('BM8', 'Defect');
					$sheet->setCellValue('BN8', '%');

					$sheet->mergeCells('BO6:BP7');
					$sheet->getStyle('BO6:BP7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('BO6', 'Over Scalder');
					$sheet->setCellValue('BO8', 'Defect');
					$sheet->setCellValue('BP8', '%');
					$sheet->mergeCells('BQ6:BR7');
					$sheet->getStyle('BQ6:BR7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('BQ6', 'Kaki Patah Tanpa Memar');
					$sheet->setCellValue('BQ8', 'Defect');
					$sheet->setCellValue('BR8', '%');
					$sheet->mergeCells('BS6:BT6');
					$sheet->setCellValue('BS6', 'Karena Leg Cutter');
					$sheet->mergeCells('BS7:BT7');
					$sheet->setCellValue('BS7', 'Kaki Terpotong');
					$sheet->setCellValue('BS8', 'Defect');
					$sheet->setCellValue('BT8', '%');
					$sheet->mergeCells('BU6:BV7');
					$sheet->getStyle('BU6:BV7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('BU6', 'Sub Total Defect');
					$sheet->setCellValue('BU8', 'Defect');
					$sheet->setCellValue('BV8', '%');
					$sheet->mergeCells('BW5:BX7');
					$sheet->getStyle('BW5:BX7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('BW5', 'Total Defect');
					$sheet->setCellValue('BW8', 'Defect');
					$sheet->setCellValue('BX8', '%');

					$sheet->mergeCells('BZ5:CC5');
					$sheet->setCellValue('BZ5', 'Ayam Defect')->getStyle('BZ5')->getFont()->setBold(true);
					$sheet->mergeCells('BZ6:CA7');
					$sheet->getStyle('BZ6:CA7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('BZ6', 'Ayam Defect');
					$sheet->setCellValue('BZ8', 'Defect');
					$sheet->setCellValue('CA8', '%');
					$sheet->mergeCells('CB6:CC7');
					$sheet->getStyle('CB6:CC7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('CB6', 'Defect > 1');
					$sheet->setCellValue('CB8', 'Defect');
					$sheet->setCellValue('CC8', '%');
					$sheet->mergeCells('CD5:CE7');
					$sheet->getStyle('CD5:CE7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('CD5', 'Total Ayam Defect');
					$sheet->setCellValue('CD8', 'Ayam Defect');
					$sheet->setCellValue('CE8', '%');

					$sheet->mergeCells('CG5:CR5');
					$sheet->setCellValue('CG5', 'Reject Hati Sortir Post Mortem')->getStyle('CG5')->getFont()->setBold(true);
					$sheet->mergeCells('CG6:CJ6');
					$sheet->setCellValue('CG6', 'Hancur');
					$sheet->mergeCells('CG7:CH7');
					$sheet->setCellValue('CG7', 'Ringan');
					$sheet->setCellValue('CG8', 'Defect');
					$sheet->setCellValue('CH8', '%');
					$sheet->mergeCells('CI7:CJ7');
					$sheet->setCellValue('CI7', 'Berat');
					$sheet->setCellValue('CI8', 'Ayam Defect');
					$sheet->setCellValue('CJ8', '%');
					$sheet->mergeCells('CK6:CL7');
					$sheet->getStyle('CK6:CL7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('CK6', 'Hati Tidak Normal / Berpenyakit');
					$sheet->setCellValue('CK8', 'Defect');
					$sheet->setCellValue('CL8', '%');
					$sheet->mergeCells('CM6:CN7');
					$sheet->getStyle('CM6:CN7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('CM6', 'Jantung Tdk Normal / Berpenyakit');
					$sheet->setCellValue('CM8', 'Defect');
					$sheet->setCellValue('CN8', '%');
					$sheet->mergeCells('CO6:CP7');
					$sheet->getStyle('CO6:CP7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('CO6', 'Organ Dalam Lain Tidak Normal');
					$sheet->setCellValue('CO8', 'Defect');
					$sheet->setCellValue('CP8', '%');
					$sheet->mergeCells('CQ6:CR7');
					$sheet->getStyle('CQ6:CR7')->getAlignment()->setWrapText(true);
					$sheet->setCellValue('CQ6', 'Sub Total Defect');
					$sheet->setCellValue('CQ8', 'Defect');
					$sheet->setCellValue('CR8', '%');

					// Add data
					$row = 9; 
					foreach ($data['post_mortem'] as $val) {
						$sheet->setCellValue('B' . $row, $val->nomor_truk);
						$sheet->setCellValue('C' . $row, $val->nama_farm);
						if ($val->ch_oh == 0) {
							$ch_oh = "CH";
						} elseif ($val->ch_oh == 1) {
							$ch_oh = "OH";
						}
						$sheet->setCellValue('D' . $row, $ch_oh);
						$sheet->setCellValue('E' . $row, $val->waktu_kedatangan);
						$sheet->setCellValue('F' . $row, $val->jumlah_ayam);
						$sheet->setCellValue('G' . $row, $val->average_farm);
						$sheet->setCellValue('H' . $row, $val->average_rpa);
						$sheet->setCellValue('I' . $row, $val->sayap_memar_kebiruan_defect + $val->sayap_memar_kebiruan_defect_lebih);
						$sheet->setCellValue('J' . $row, (($val->sayap_memar_kebiruan_defect + $val->sayap_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('K' . $row, $val->sayap_patah_memar_defect + $val->sayap_patah_memar_defect_lebih);
						$sheet->setCellValue('L' . $row, (($val->sayap_patah_memar_defect + $val->sayap_patah_memar_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('M' . $row, $val->kaki_memar_defect + $val->kaki_memar_kebiruan_defect_lebih);
						$sheet->setCellValue('N' . $row, (($val->kaki_memar_defect + $val->kaki_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('O' . $row, $val->kaki_patah_defect + $val->kaki_patah_memar_defect_lebih);
						$sheet->setCellValue('P' . $row, (($val->kaki_patah_defect + $val->kaki_patah_memar_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('Q' . $row, $val->kaki_arthritis_defect + $val->arthritis_defect_lebih);
						$sheet->setCellValue('R' . $row, (($val->kaki_arthritis_defect + $val->arthritis_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('S' . $row, $val->hock_bruise_defect + $val->hock_bruise_defect_lebih);
						$sheet->setCellValue('T' . $row, (($val->hock_bruise_defect + $val->hock_bruise_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('U' . $row, $val->hock_burn_defect + $val->hock_burn_defect_lebih);
						$sheet->setCellValue('V' . $row, (($val->hock_burn_defect + $val->hock_burn_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('W' . $row, $val->dada_memar_defect + $val->dada_memar_kebiruan_defect_lebih);
						$sheet->setCellValue('X' . $row, (($val->dada_memar_defect + $val->dada_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('Y' . $row, $val->breast_burn_defect + $val->breast_burn_defect_lebih);
						$sheet->setCellValue('Z' . $row, (($val->breast_burn_defect + $val->breast_burn_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AA' . $row, $val->punggung_memar_defect + $val->punggung_memar_kebiruan_defect_lebih);
						$sheet->setCellValue('AB' . $row, (($val->punggung_memar_defect + $val->punggung_memar_kebiruan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AC' . $row, $val->luka_parut_defect + $val->luka_parut_defect_lebih);
						$sheet->setCellValue('AD' . $row, (($val->luka_parut_defect + $val->luka_parut_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AE' . $row, $val->kulit_berjamur_defect + $val->kulit_berjamur_defect_lebih);
						$sheet->setCellValue('AF' . $row, (($val->kulit_berjamur_defect + $val->kulit_berjamur_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AG' . $row, $val->penyakit_kulit_defect + $val->penyakit_bisul_defect_lebih);
						$sheet->setCellValue('AH' . $row, (($val->penyakit_kulit_defect + $val->penyakit_bisul_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AI' . $row, $val->kulit_daging_bintik_defect + $val->kulit_bintik_merah_defect_lebih);
						$sheet->setCellValue('AJ' . $row, (($val->kulit_daging_bintik_defect + $val->kulit_bintik_merah_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AK' . $row, $val->pertumbuhan_tidak_normal_defect + $val->pertumbuhan_tidak_normal_defect_lebih);
						$sheet->setCellValue('AL' . $row, (($val->pertumbuhan_tidak_normal_defect + $val->pertumbuhan_tidak_normal_defect_lebih) / $val->jumlah_ayam) * 100 );

						$total_farm_all = $val->sub_total_farm_defect + $val->sayap_memar_kebiruan_defect_lebih + $val->sayap_patah_memar_defect_lebih + $val->kaki_memar_kebiruan_defect_lebih + $val->kaki_patah_memar_defect_lebih + $val->arthritis_defect_lebih + $val->hock_bruise_defect_lebih + $val->hock_burn_defect_lebih + $val->dada_memar_kebiruan_defect_lebih + $val->breast_burn_defect_lebih + $val->punggung_memar_kebiruan_defect_lebih + $val->luka_parut_defect_lebih + $val->kulit_berjamur_defect_lebih + $val->penyakit_bisul_defect_lebih + $val->kulit_bintik_merah_defect_lebih + $val->pertumbuhan_tidak_normal_defect_lebih;

						$sheet->setCellValue('AM' . $row, $total_farm_all);
						$sheet->setCellValue('AN' . $row, (($total_farm_all) / $val->jumlah_ayam) * 100);

					//RPHU
						$sheet->setCellValue('AO' . $row, $val->sg_sayap_memar_defect + $val->sg_sayap_memar_kemerahan_defect_lebih);
						$sheet->setCellValue('AP' . $row, (($val->sg_sayap_memar_defect + $val->sg_sayap_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AQ' . $row, $val->sg_kaki_memar_defect + $val->sg_kaki_memar_kemerahan_defect_lebih);
						$sheet->setCellValue('AR' . $row, (($val->sg_kaki_memar_defect + $val->sg_kaki_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AS' . $row, $val->sg_dada_memar_defect + $val->sg_dada_memar_kemerahan_defect_lebih);
						$sheet->setCellValue('AT' . $row, (($val->sg_dada_memar_defect + $val->sg_dada_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('AU' . $row, $val->sg_punggung_memar_defect + $val->sg_punggung_memar_kemerahan_defect_lebih);
						$sheet->setCellValue('AV' . $row, (($val->sg_punggung_memar_defect + $val->sg_punggung_memar_kemerahan_defect_lebih) / $val->jumlah_ayam) * 100 );

						$total_rphu_all = $val->sub_total_sg_defect + $val->sg_sayap_memar_kemerahan_defect_lebih + $val->sg_kaki_memar_kemerahan_defect_lebih + $val->sg_dada_memar_kemerahan_defect_lebih + $val->sg_punggung_memar_kemerahan_defect_lebih;

						$sheet->setCellValue('AW' . $row, $total_rphu_all);
						$sheet->setCellValue('AX' . $row, (($total_rphu_all) / $val->jumlah_ayam) * 100 );

					//RPA
						$sheet->setCellValue('AY' . $row, $val->rpa_kulit_sobek_dada_defect + $val->rpa_kulit_sobek_dada_defect_lebih);
						$sheet->setCellValue('AZ' . $row, (($val->rpa_kulit_sobek_dada_defect + $val->rpa_kulit_sobek_dada_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BA' . $row, $val->rpa_kulit_sobek_paha_defect + $val->rpa_kulit_sobek_paha_defect_lebih);
						$sheet->setCellValue('BB' . $row, (($val->rpa_kulit_sobek_paha_defect + $val->rpa_kulit_sobek_paha_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BC' . $row, $val->rpa_karkas_rusak_defect + $val->rpa_karkas_rusak_defect_lebih);
						$sheet->setCellValue('BD' . $row, (($val->rpa_karkas_rusak_defect + $val->rpa_karkas_rusak_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BE' . $row, $val->rpa_empedu_pecah_defect + $val->rpa_empedu_pecah_defect_lebih);
						$sheet->setCellValue('BF' . $row, (($val->rpa_empedu_pecah_defect + $val->rpa_empedu_pecah_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BG' . $row, $val->rpa_daging_dada_bawah_cut_defect + $val->rpa_daging_dada_bawah_defect_lebih);
						$sheet->setCellValue('BH' . $row, (($val->rpa_daging_dada_bawah_cut_defect + $val->rpa_daging_dada_bawah_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BI' . $row, $val->rpa_daging_dada_atas_cut_defect + $val->rpa_daging_dada_atas_defect_lebih);
						$sheet->setCellValue('BJ' . $row, (($val->rpa_daging_dada_atas_cut_defect + $val->rpa_daging_dada_atas_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BK' . $row, $val->rpa_sayap_patah_defect + $val->rpa_sayap_patah_defect_lebih);
						$sheet->setCellValue('BL' . $row, (($val->rpa_sayap_patah_defect + $val->rpa_sayap_patah_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BM' . $row, $val->rpa_kulit_sobek_dp_defect + $val->rpa_kulit_sobek_dp_defect_lebih);
						$sheet->setCellValue('BN' . $row, (($val->rpa_kulit_sobek_dp_defect + $val->rpa_kulit_sobek_dp_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BO' . $row, $val->rpa_over_scalder_defect + $val->rpa_over_scalder_defect_lebih);
						$sheet->setCellValue('BP' . $row, (($val->rpa_over_scalder_defect + $val->rpa_over_scalder_defect_lebih) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BQ' . $row, $val->rpa_kaki_patah_defect + $val->rpa_kaki_patah_defect_lebih);
						$sheet->setCellValue('BR' . $row, (($val->rpa_kaki_patah_defect + $val->rpa_kaki_patah_defect_lebih) /$val->jumlah_ayam) * 100 );
						$sheet->setCellValue('BS' . $row, $val->rpa_kaki_terpotong_defect + $val->rpa_kaki_terpotong_defect_lebih);
						$sheet->setCellValue('BT' . $row, (($val->rpa_kaki_terpotong_defect + $val->rpa_kaki_terpotong_defect_lebih) / $val->jumlah_ayam) * 100 );

						$total_rpa_all = $val->sub_total_rpa_defect + $val->rpa_kulit_sobek_dada_defect_lebih + $val->rpa_kulit_sobek_paha_defect_lebih + $val->rpa_karkas_rusak_defect_lebih + $val->rpa_empedu_pecah_defect_lebih + $val->rpa_daging_dada_bawah_defect_lebih + $val->rpa_daging_dada_atas_defect_lebih + $val->rpa_sayap_patah_defect_lebih + $val->rpa_kulit_sobek_dp_defect_lebih + $val->rpa_over_scalder_defect_lebih + $val->rpa_kaki_patah_defect_lebih + $val->rpa_kaki_terpotong_defect_lebih;

						$sheet->setCellValue('BU' . $row, $total_rpa_all);
						$sheet->setCellValue('BV' . $row, (($total_rpa_all) / $val->jumlah_ayam) * 100 );

						//total defect
						$sheet->setCellValue('BW' . $row, $total_farm_all + $total_rphu_all + $total_rpa_all);
						$sheet->setCellValue('BX' . $row, (($total_farm_all + $total_rphu_all + $total_rpa_all) / $val->jumlah_ayam) * 100 );

						//Ayam defect
						$sheet->setCellValue('BZ' . $row, $val->sub_total_farm_defect + $val->sub_total_sg_defect + $val->sub_total_rpa_defect);
						$sheet->setCellValue('CA' . $row, (($val->sub_total_farm_defect + $val->sub_total_sg_defect + $val->sub_total_rpa_defect) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('CB' . $row, $val->ayam_defect_lebih_dari_satu);
						$sheet->setCellValue('CC' . $row, (($val->ayam_defect_lebih_dari_satu) / $val->jumlah_ayam) * 100 );
						$sheet->setCellValue('CD' . $row, $val->total_ayam_defect);
						$sheet->setCellValue('CE' . $row, (($val->total_ayam_defect) / $val->jumlah_ayam) * 100);                          

					//reject hati
						$sheet->setCellValue('CG' . $row, $val->ip_hati_hancur_ringan_defect);
						$sheet->setCellValue('CH' . $row, $val->ip_hati_hancur_ringan_persen);
						$sheet->setCellValue('CI' . $row, $val->ip_hati_hancur_berat_defect);
						$sheet->setCellValue('CJ' . $row, $val->ip_hati_hancur_berat_persen);
						$sheet->setCellValue('CK' . $row, $val->hati_tidak_normal_defect);
						$sheet->setCellValue('CL' . $row, $val->hati_tidak_normal_persen);
						$sheet->setCellValue('CM' . $row, $val->jantung_tidak_normal_defect);
						$sheet->setCellValue('CN' . $row, $val->jantung_tidak_normal_persen);
						$sheet->setCellValue('CO' . $row, $val->organ_dalam_tidak_normal_defect);
						$sheet->setCellValue('CP' . $row, $val->organ_dalam_tidak_normal_persen);
						$sheet->setCellValue('CQ' . $row, $val->sub_total_ip_defect + $val->sub_total_ordal_farm_defect);
						$sheet->setCellValue('CR' . $row, (($val->sub_total_ip_defect + $val->sub_total_ordal_farm_defect) / $val->jumlah_ayam) * 100);

						$row++;
					}

					$lastColumnIndex = $sheet->getHighestColumn();
					$lastRowIndex = $sheet->getHighestRow();
					$range = 'B5:' . $lastColumnIndex . $lastRowIndex;

					$styleArray = [
						'borders' => [
							'allBorders' => [
								'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
								'color' => ['rgb' => '000000'],
							],
						],
					];

					$sheet->getStyle('E:E')->getNumberFormat()->setFormatCode('HH:MM');
					$sheet->getStyle('B5:CR1000')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
					$sheet->getStyle('B5:CR8')->getAlignment()->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);

					$sheet->getStyle($range)->applyFromArray($styleArray);
					$column = ['G', 'H', 'J', 'L', 'N', 'P', 'R', 'T', 'V', 'X', 'Z', 'AB', 'AD', 'AF', 'AH', 'AJ', 'AL', 'AN', 'AP', 'AR', 'AT', 'AV', 'AX', 'AZ', 'BB', 'BD', 'BF', 'BH', 'BJ', 'BL', 'BN', 'BP', 'BR', 'BT', 'BV', 'BX', 'CA', 'CC', 'CE', 'CH', 'CJ', 'CL', 'CN', 'CP', 'CR'];

					foreach ($column as $index) {
						$spreadsheet->getActiveSheet()->getStyle($index.'9:'.$index.'500')->getNumberFormat()->setFormatCode('0.00');
					}

					header('Content-Type: application/vnd.ms-excel');
					header('Content-Disposition: attachment;filename="post_mortem_report_' . $today . '.xls"');
					header('Cache-Control: max-age=0');

					// Save to file
					$writer = new Xls($spreadsheet);
					$writer->save('php://output');
					return; 
				}
			}
		}

		$data['active_nav'] = 'report-pm'; 
		$this->load->view('partials/head', $data);
		$this->load->view('report/report-pm');
		$this->load->view('partials/footer');
	}

}
