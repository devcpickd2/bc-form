<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Post_mortem_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('post_mortem_model');
		$this->load->library('form_validation');
	} 

	public function rules()
	{
		return[
			[
				'field' => 'nama_farm',
				'label' => 'Name'
				// 'rules' => 'required'
			],
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'nomor_truk',
				'label' => 'Truck Number'
				// 'rules' => 'required'
			],
			[
				'field' => 'ch_oh',
				'label' => 'CH / OH'
				// 'rules' => 'required'
			],
			[
				'field' => 'waktu_kedatangan',
				'label' => 'Time of Arrival'
				// 'rules' => 'required'
			],
			[
				'field' => 'shift',
				'label' => 'Shift'
				// 'rules' => 'required'
			],
			[
				'field' => 'jumlah_ayam',
				'label' => 'Amount of chicken'
				// 'rules' => 'required'
			],
			[
				'field' => 'average_farm',
				'label' => 'Average Farm'
				// 'rules' => 'required'
			],
			[
				'field' => 'average_rpa',
				'label' => 'Average RPA'
				// 'rules' => 'required'
			],
			[
				'field' => 'ekspedisi',
				'label' => 'Carrier'
				// 'rules' => 'required'
			],
			[
				'field' => 'nama_mesin',
				'label' => 'Machine Name'
				// 'rules' => 'required'
			],
			// defect tunggal
			[
				'field' => 'sayap_memar_kebiruan_defect',
				'label' => 'Sayap Memar'
				// 'rules' => 'required'
			],
			[
				'field' => 'sayap_patah_memar_defect',
				'label' => 'Sayap Patah'
			],
			[
				'field' => 'kaki_memar_defect',
				'label' => 'Kaki Memar'
			],
			[
				'field' => 'kaki_patah_defect',
				'label' => 'Kaki Patah'
			],
			[
				'field' => 'kaki_arthritis_defect',
				'label' => 'Kaki Arthritis'
			],
			[
				'field' => 'hock_bruise_defect',
				'label' => 'Hock Bruise'
			],
			[
				'field' => 'hock_burn_defect',
				'label' => 'Hock Burn'
			],
			[
				'field' => 'dada_memar_defect',
				'label' => 'Dada Memar Kebiruan'
			],
			[
				'field' => 'breast_burn_defect',
				'label' => 'Breast Burn'
			],
			[
				'field' => 'punggung_memar_defect',
				'label' => 'Punggung Memar'
			],
			[
				'field' => 'luka_parut_defect',
				'label' => 'Luka Parut'
			],
			[
				'field' => 'kulit_berjamur_defect',
				'label' => 'Kulit Berjamur'
			],
			[
				'field' => 'penyakit_kulit_defect',
				'label' => 'Penyakit Bisul di Kulit'
			],
			[
				'field' => 'kulit_daging_bintik_defect',
				'label' => 'Kulit Daging Bintik Merah'
			],
			[
				'field' => 'pertumbuhan_tidak_normal_defect',
				'label' => 'Pertumbuhan tidak Normal'
			],
			// Defect > 1
			[
				'field' => 'sayap_memar_kebiruan_defect_lebih',
				'label' => 'Sayap Memar'
			],
			[
				'field' => 'sayap_patah_memar_defect_lebih',
				'label' => 'Sayap Patah'
			],
			[
				'field' => 'kaki_memar_kebiruan_defect_lebih',
				'label' => 'Kaki Memar'
			],
			[
				'field' => 'kaki_patah_memar_defect_lebih',
				'label' => 'Kaki Patah'
			],
			[
				'field' => 'arthritis_defect_lebih',
				'label' => 'Kaki Arthritis'
			],
			[
				'field' => 'hock_bruise_defect_lebih',
				'label' => 'Hock Bruise'
			],
			[
				'field' => 'hock_burn_defect_lebih',
				'label' => 'Hock Burn'
			],
			[
				'field' => 'dada_memar_kebiruan_defect_lebih',
				'label' => 'Dada Memar Kebiruan'
			],
			[
				'field' => 'breast_burn_defect_lebih',
				'label' => 'Breast Burn'
			],
			[
				'field' => 'punggung_memar_kebiruan_defect_lebih',
				'label' => 'Punggung Memar'
			],
			[
				'field' => 'luka_parut_defect_lebih',
				'label' => 'Luka Parut'
			],
			[
				'field' => 'kulit_berjamur_defect_lebih',
				'label' => 'Kulit Berjamur'
			],
			[
				'field' => 'penyakit_bisul_defect_lebih',
				'label' => 'Penyakit Bisul di Kulit'
			],
			[
				'field' => 'kulit_bintik_merah_defect_lebih',
				'label' => 'Kulit Daging Bintik Merah'
			],
			[
				'field' => 'pertumbuhan_tidak_normal_defect_lebih',
				'label' => 'Pertumbuhan tidak Normal'
			],
			// Defect tunggal
			[
				'field' => 'hati_tidak_normal_defect',
				'label' => 'Hati tidak Normal'
			],
			[
				'field' => 'jantung_tidak_normal_defect',
				'label' => 'Jantung tidak Normal'
			],
			[
				'field' => 'organ_dalam_tidak_normal_defect',
				'label' => 'Organ Dalam tidak Normal'
			],
			// Defect Tunggal
			[
				'field' => 'sg_sayap_memar_defect',
				'label' => 'Sayap Memar Kemerahan'
			],
			[
				'field' => 'sg_kaki_memar_defect',
				'label' => 'Kaki Memar Kemerahan'
			],
			[
				'field' => 'sg_dada_memar_defect',
				'label' => 'Dada Memar Kemerahan'
			],
			[
				'field' => 'sg_punggung_memar_defect',
				'label' => 'Punggung Memar Kemerahan'
			],
			// Defect > 1
			[
				'field' => 'sg_sayap_memar_kemerahan_defect_lebih',
				'label' => 'Sayap Memar Kemerahan'
			],
			[
				'field' => 'sg_kaki_memar_kemerahan_defect_lebih',
				'label' => 'Kaki Memar Kemerahan'
			],
			[
				'field' => 'sg_dada_memar_kemerahan_defect_lebih',
				'label' => 'Dada Memar Kemerahan'
			],
			[
				'field' => 'sg_punggung_memar_kemerahan_defect_lebih',
				'label' => 'Punggung Memar Kemerahan'
			],
			// Defect Tunggal
			[
				'field' => 'rpa_over_scalder_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_sayap_patah_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_kaki_patah_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_kulit_sobek_dp_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_kulit_sobek_dada_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_kulit_sobek_paha_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_karkas_rusak_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_empedu_pecah_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_daging_dada_bawah_cut_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_daging_dada_atas_cut_defect',
				'label' => ''
			],
			[
				'field' => 'rpa_kaki_terpotong_defect',
				'label' => ''
			],
			// Defect > 1
			[
				'field' => 'rpa_over_scalder_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_sayap_patah_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_kaki_patah_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_kulit_sobek_dp_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_kulit_sobek_dada_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_kulit_sobek_paha_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_karkas_rusak_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_empedu_pecah_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_daging_dada_bawah_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_daging_dada_atas_defect_lebih',
				'label' => ''
			],
			[
				'field' => 'rpa_kaki_terpotong_defect_lebih',
				'label' => ''
			],
			// Defect Tunggal
			[
				'field' => 'ip_hati_hancur_ringan_defect',
				'label' => ''
			],
			[
				'field' => 'ip_hati_hancur_berat_defect',
				'label' => ''
			],
			[
				'field' => 'ayam_defect_lebih_dari_satu',
				'label' => ''
			]
			// Defect > 1
			// [
			// 	'field' => 'ip_hati_hancur_ringan_defect_lebih',
			// 	'label' => ''
			// ],
			// [
			// 	'field' => 'ip_hati_hancur_berat_defect_lebih',
			// 	'label' => ''
			// ]
		];
	}


	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$nama_farm = $this->input->post('nama_farm');
		$date = $this->input->post('date');
		$nomor_truk = $this->input->post('nomor_truk');
		$ch_oh = $this->input->post('ch_oh');
		$waktu_kedatangan = $this->input->post('waktu_kedatangan');
		$shift = $this->input->post('shift');
		$jumlah_ayam = $this->input->post('jumlah_ayam');
		$average_farm = $this->input->post('average_farm');
		$average_rpa = $this->input->post('average_rpa');
		$ekspedisi = $this->input->post('ekspedisi');
		$nama_mesin = $this->input->post('nama_mesin');
		$username = $this->session->userdata('username');

		// Defect Tunggal
		$sayap_memar_kebiruan_defect = $this->input->post('sayap_memar_kebiruan_defect');
		$sayap_patah_memar_defect = $this->input->post('sayap_patah_memar_defect');
		$kaki_memar_defect = $this->input->post('kaki_memar_defect');
		$kaki_patah_defect = $this->input->post('kaki_patah_defect');
		$kaki_arthritis_defect = $this->input->post('kaki_arthritis_defect');
		$hock_bruise_defect = $this->input->post('hock_bruise_defect');
		$hock_burn_defect = $this->input->post('hock_burn_defect');
		$dada_memar_defect = $this->input->post('dada_memar_defect');
		$breast_burn_defect = $this->input->post('breast_burn_defect');
		$punggung_memar_defect = $this->input->post('punggung_memar_defect');
		$luka_parut_defect = $this->input->post('luka_parut_defect');
		$kulit_berjamur_defect = $this->input->post('kulit_berjamur_defect');
		$penyakit_kulit_defect = $this->input->post('penyakit_kulit_defect');
		$kulit_daging_bintik_defect = $this->input->post('kulit_daging_bintik_defect');
		$pertumbuhan_tidak_normal_defect = $this->input->post('pertumbuhan_tidak_normal_defect');

		// Defect > 1
		$sayap_memar_kebiruan_defect_lebih = $this->input->post('sayap_memar_kebiruan_defect_lebih');
		$sayap_patah_memar_defect_lebih = $this->input->post('sayap_patah_memar_defect_lebih');
		$kaki_memar_kebiruan_defect_lebih = $this->input->post('kaki_memar_kebiruan_defect_lebih');
		$kaki_patah_memar_defect_lebih = $this->input->post('kaki_patah_memar_defect_lebih');
		$arthritis_defect_lebih = $this->input->post('arthritis_defect_lebih');
		$hock_bruise_defect_lebih = $this->input->post('hock_bruise_defect_lebih');
		$hock_burn_defect_lebih = $this->input->post('hock_burn_defect_lebih');
		$dada_memar_kebiruan_defect_lebih = $this->input->post('dada_memar_kebiruan_defect_lebih');
		$breast_burn_defect_lebih = $this->input->post('breast_burn_defect_lebih');
		$punggung_memar_kebiruan_defect_lebih = $this->input->post('punggung_memar_kebiruan_defect_lebih');
		$luka_parut_defect_lebih = $this->input->post('luka_parut_defect_lebih');
		$kulit_berjamur_defect_lebih = $this->input->post('kulit_berjamur_defect_lebih');
		$penyakit_bisul_defect_lebih = $this->input->post('penyakit_bisul_defect_lebih');
		$kulit_bintik_merah_defect_lebih = $this->input->post('kulit_bintik_merah_defect_lebih');
		$pertumbuhan_tidak_normal_defect_lebih = $this->input->post('pertumbuhan_tidak_normal_defect_lebih');

		$sayap_memar_kebiruan_persen = ($sayap_memar_kebiruan_defect *100) / $jumlah_ayam;
		$sayap_patah_memar_persen = ($sayap_patah_memar_defect *100) / $jumlah_ayam;
		$kaki_memar_persen = ($kaki_memar_defect *100) / $jumlah_ayam;
		$kaki_patah_persen = ($kaki_patah_defect *100) / $jumlah_ayam;
		$kaki_arthritis_persen = ($kaki_arthritis_defect *100) / $jumlah_ayam;
		$hock_bruise_persen = ($hock_bruise_defect *100) / $jumlah_ayam;
		$hock_burn_persen =($hock_burn_defect *100) / $jumlah_ayam;
		$dada_memar_persen = ($dada_memar_defect *100) / $jumlah_ayam;
		$breast_burn_persen = ($breast_burn_defect *100) / $jumlah_ayam;
		$punggung_memar_persen = ($punggung_memar_defect *100) / $jumlah_ayam;
		$luka_parut_persen = ($luka_parut_defect *100) / $jumlah_ayam;
		$kulit_berjamur_persen = ($kulit_berjamur_defect *100) / $jumlah_ayam;
		$penyakit_kulit_persen = ($penyakit_kulit_defect *100) / $jumlah_ayam;
		$kulit_daging_bintik_persen = ($kulit_daging_bintik_defect *100) / $jumlah_ayam;
		$pertumbuhan_tidak_normal_persen = ($pertumbuhan_tidak_normal_defect *100) / $jumlah_ayam;

		// Jumlah_defect_a
		$sub_total_farm_defect = $sayap_memar_kebiruan_defect + $sayap_patah_memar_defect + $kaki_memar_defect + $kaki_patah_defect + $kaki_arthritis_defect + $hock_bruise_defect + $hock_burn_defect + $dada_memar_defect + $breast_burn_defect + $punggung_memar_defect + $luka_parut_defect + $kulit_berjamur_defect + $penyakit_kulit_defect + $kulit_daging_bintik_defect + $pertumbuhan_tidak_normal_defect;

		$sub_total_farm_persen = ($sub_total_farm_defect * 100) / $jumlah_ayam;

		// Jumlah_defect_d
		$sub_total_farm_defect_lebih = $sayap_memar_kebiruan_defect_lebih + $sayap_patah_memar_defect_lebih + $kaki_memar_kebiruan_defect_lebih + $kaki_patah_memar_defect_lebih + $arthritis_defect_lebih + $hock_bruise_defect_lebih + $hock_burn_defect_lebih + $dada_memar_kebiruan_defect_lebih + $breast_burn_defect_lebih + $punggung_memar_kebiruan_defect_lebih + $luka_parut_defect_lebih + $kulit_berjamur_defect_lebih + $penyakit_bisul_defect_lebih + $kulit_bintik_merah_defect_lebih + $pertumbuhan_tidak_normal_defect_lebih;
		$jumlah_defect_d = $sub_total_farm_defect + $sub_total_farm_defect_lebih;

		// Defect Tunggal
		$hati_tidak_normal_defect = $this->input->post('hati_tidak_normal_defect');
		$jantung_tidak_normal_defect = $this->input->post('jantung_tidak_normal_defect');
		$organ_dalam_tidak_normal_defect = $this->input->post('organ_dalam_tidak_normal_defect');

		$hati_tidak_normal_persen = ($hati_tidak_normal_defect *100) / $jumlah_ayam;
		$jantung_tidak_normal_persen = ($jantung_tidak_normal_defect *100) / $jumlah_ayam;
		$organ_dalam_tidak_normal_persen = ($organ_dalam_tidak_normal_defect *100) / $jumlah_ayam;

		$sub_total_ordal_farm_defect = $hati_tidak_normal_defect + $jantung_tidak_normal_defect + $organ_dalam_tidak_normal_defect;
		$sub_total_ordal_farm_persen = ($sub_total_ordal_farm_defect * 100) / $jumlah_ayam;

		// Defect Tunggal
		$sg_sayap_memar_defect = $this->input->post('sg_sayap_memar_defect');
		$sg_kaki_memar_defect = $this->input->post('sg_kaki_memar_defect');
		$sg_dada_memar_defect = $this->input->post('sg_dada_memar_defect');
		$sg_punggung_memar_defect = $this->input->post('sg_punggung_memar_defect');

		// Defect > 1
		$sg_sayap_memar_kemerahan_defect_lebih = $this->input->post('sg_sayap_memar_kemerahan_defect_lebih');
		$sg_kaki_memar_kemerahan_defect_lebih = $this->input->post('sg_kaki_memar_kemerahan_defect_lebih');
		$sg_dada_memar_kemerahan_defect_lebih = $this->input->post('sg_dada_memar_kemerahan_defect_lebih');
		$sg_punggung_memar_kemerahan_defect_lebih = $this->input->post('sg_punggung_memar_kemerahan_defect_lebih');

		$sg_sayap_memar_persen = ($sg_sayap_memar_defect *100) / $jumlah_ayam;
		$sg_kaki_memar_persen = ($sg_kaki_memar_defect *100) / $jumlah_ayam;
		$sg_dada_memar_persen = ($sg_dada_memar_defect *100) / $jumlah_ayam;
		$sg_punggung_memar_persen = ($sg_punggung_memar_defect *100) / $jumlah_ayam;

		// Jumlah_defect_b
		$sub_total_sg_defect = $sg_sayap_memar_defect + $sg_kaki_memar_defect + $sg_dada_memar_defect + $sg_punggung_memar_defect;
		$sub_total_sg_persen = ($sub_total_sg_defect * 100) / $jumlah_ayam;

		// Jumlah_defect_e
		$sub_total_sg_defect_lebih = $sg_sayap_memar_kemerahan_defect_lebih + $sg_kaki_memar_kemerahan_defect_lebih + $sg_dada_memar_kemerahan_defect_lebih + $sg_punggung_memar_kemerahan_defect_lebih;
		$jumlah_defect_e = $sub_total_sg_defect + $sub_total_sg_defect_lebih;

		// Defect Tunggal
		$rpa_over_scalder_defect = $this->input->post('rpa_over_scalder_defect');
		$rpa_sayap_patah_defect = $this->input->post('rpa_sayap_patah_defect');
		$rpa_kaki_patah_defect = $this->input->post('rpa_kaki_patah_defect');
		$rpa_kulit_sobek_dp_defect = $this->input->post('rpa_kulit_sobek_dp_defect');
		$rpa_kulit_sobek_dada_defect = $this->input->post('rpa_kulit_sobek_dada_defect');
		$rpa_kulit_sobek_paha_defect = $this->input->post('rpa_kulit_sobek_paha_defect');
		$rpa_karkas_rusak_defect = $this->input->post('rpa_karkas_rusak_defect');
		$rpa_empedu_pecah_defect = $this->input->post('rpa_empedu_pecah_defect');
		$rpa_daging_dada_bawah_cut_defect = $this->input->post('rpa_daging_dada_bawah_cut_defect');
		$rpa_daging_dada_atas_cut_defect = $this->input->post('rpa_daging_dada_atas_cut_defect');
		$rpa_kaki_terpotong_defect = $this->input->post('rpa_kaki_terpotong_defect');

		// Defect > 1
		$rpa_over_scalder_defect_lebih = $this->input->post('rpa_over_scalder_defect_lebih');
		$rpa_sayap_patah_defect_lebih = $this->input->post('rpa_sayap_patah_defect_lebih');
		$rpa_kaki_patah_defect_lebih = $this->input->post('rpa_kaki_patah_defect_lebih');
		$rpa_kulit_sobek_dp_defect_lebih = $this->input->post('rpa_kulit_sobek_dp_defect_lebih');
		$rpa_kulit_sobek_dada_defect_lebih = $this->input->post('rpa_kulit_sobek_dada_defect_lebih');
		$rpa_kulit_sobek_paha_defect_lebih = $this->input->post('rpa_kulit_sobek_paha_defect_lebih');
		$rpa_karkas_rusak_defect_lebih = $this->input->post('rpa_karkas_rusak_defect_lebih');
		$rpa_empedu_pecah_defect_lebih = $this->input->post('rpa_empedu_pecah_defect_lebih');
		$rpa_daging_dada_bawah_defect_lebih = $this->input->post('rpa_daging_dada_bawah_defect_lebih');
		$rpa_daging_dada_atas_defect_lebih = $this->input->post('rpa_daging_dada_atas_defect_lebih');
		$rpa_kaki_terpotong_defect_lebih = $this->input->post('rpa_kaki_terpotong_defect_lebih');

		$rpa_over_scalder_persen = ($rpa_over_scalder_defect *100) / $jumlah_ayam;
		$rpa_sayap_patah_persen = ($rpa_sayap_patah_defect *100) / $jumlah_ayam;
		$rpa_kaki_patah_persen = ($rpa_kaki_patah_defect *100) / $jumlah_ayam;
		$rpa_kulit_sobek_dp_persen = ($rpa_kulit_sobek_dp_defect *100) / $jumlah_ayam;
		$rpa_kulit_sobek_dada_persen = ($rpa_kulit_sobek_dada_defect *100) / $jumlah_ayam;
		$rpa_kulit_sobek_paha_persen = ($rpa_kulit_sobek_paha_defect *100) / $jumlah_ayam;
		$rpa_karkas_rusak_persen = ($rpa_karkas_rusak_defect *100) / $jumlah_ayam;
		$rpa_empedu_pecah_persen = ($rpa_empedu_pecah_defect *100) / $jumlah_ayam;
		$rpa_daging_dada_bawah_cut_persen = ($rpa_daging_dada_bawah_cut_defect *100) / $jumlah_ayam;
		$rpa_daging_dada_atas_cut_persen = ($rpa_daging_dada_atas_cut_defect *100) / $jumlah_ayam;
		$rpa_kaki_terpotong_persen = ($rpa_kaki_terpotong_defect *100) / $jumlah_ayam;

		// Jumlah_defect_c
		$sub_total_rpa_defect = $rpa_over_scalder_defect + $rpa_sayap_patah_defect + $rpa_kaki_patah_defect + $rpa_kulit_sobek_dp_defect + $rpa_kulit_sobek_dada_defect + $rpa_kulit_sobek_paha_defect + $rpa_karkas_rusak_defect + $rpa_empedu_pecah_defect + $rpa_daging_dada_bawah_cut_defect + $rpa_daging_dada_atas_cut_defect + $rpa_kaki_terpotong_defect;
		$sub_total_rpa_persen = ($sub_total_rpa_defect * 100) / $jumlah_ayam;

		// jumlah_defect_f
		$sub_total_rpa_defect_lebih = $rpa_over_scalder_defect_lebih + $rpa_sayap_patah_defect_lebih + $rpa_kaki_patah_defect_lebih + $rpa_kulit_sobek_dp_defect_lebih + $rpa_kulit_sobek_dada_defect_lebih + $rpa_kulit_sobek_paha_defect_lebih + $rpa_karkas_rusak_defect_lebih + $rpa_empedu_pecah_defect_lebih + $rpa_daging_dada_bawah_defect_lebih + $rpa_daging_dada_atas_defect_lebih + $rpa_kaki_terpotong_defect_lebih;
		$jumlah_defect_f = $sub_total_rpa_defect + $sub_total_rpa_defect_lebih;

		// Defect Tunggal
		$ip_hati_hancur_ringan_defect = $this->input->post('ip_hati_hancur_ringan_defect');
		$ip_hati_hancur_berat_defect = $this->input->post('ip_hati_hancur_berat_defect');

		// Defect > 1
		$ip_hati_hancur_ringan_defect_lebih = $this->input->post('ip_hati_hancur_ringan_defect_lebih');
		$ip_hati_hancur_berat_defect_lebih = $this->input->post('ip_hati_hancur_berat_defect_lebih');

		$ip_hati_hancur_ringan_persen = ($ip_hati_hancur_ringan_defect *100) / $jumlah_ayam;
		$ip_hati_hancur_berat_persen = ($ip_hati_hancur_berat_defect *100) / $jumlah_ayam;

		$sub_total_ip_defect = $ip_hati_hancur_berat_defect + $ip_hati_hancur_ringan_defect;
		$sub_total_ip_persen = ($sub_total_ip_defect * 100) / $jumlah_ayam;

		$ayam_defect_lebih_dari_satu = $this->input->post('ayam_defect_lebih_dari_satu');
		$ayam_defect_lebih_dari_satu_persen = ($ayam_defect_lebih_dari_satu * 100) / $jumlah_ayam;

		// jumlah_defect_g

		// $sub_total_ip_defect_lebih = $ip_hati_hancur_ringan_defect_lebih + $ip_hati_hancur_berat_defect_lebih;
		// $jumlah_defect_g = $sub_total_ip_defect + $sub_total_ip_defect_lebih;

		$total_defect = $sub_total_farm_defect + $sub_total_rpa_defect;
		$total_persen = ($total_defect * 100) / $jumlah_ayam;

		$total_ayam_defect = $sub_total_farm_defect + $sub_total_sg_defect + $sub_total_rpa_defect + $ayam_defect_lebih_dari_satu;
		$total_defect_ayam_lebih = $jumlah_defect_d + $jumlah_defect_e + $jumlah_defect_f;

		$total_ayam_defect_persen = ($total_ayam_defect *100) / $jumlah_ayam;
		$total_defect_ayam_lebih_persen = ($total_defect_ayam_lebih *100) / $jumlah_ayam;

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'nama_farm' => $nama_farm,
			'date' => $date,
			'nomor_truk' => $nomor_truk,
			'ch_oh' => $ch_oh,
			'waktu_kedatangan' => $waktu_kedatangan,
			'shift' => $shift,
			'jumlah_ayam' => $jumlah_ayam,
			'average_farm' => $average_farm,
			'average_rpa' => $average_rpa,
			'ekspedisi' => $ekspedisi,
			'nama_mesin' => $nama_mesin,
			'sayap_memar_kebiruan_defect' => $sayap_memar_kebiruan_defect,
			'sayap_patah_memar_defect' => $sayap_patah_memar_defect,
			'kaki_memar_defect' => $kaki_memar_defect,
			'kaki_patah_defect' => $kaki_patah_defect,
			'kaki_arthritis_defect' => $kaki_arthritis_defect,
			'hock_bruise_defect' => $hock_bruise_defect,
			'hock_burn_defect' => $hock_burn_defect,
			'dada_memar_defect' => $dada_memar_defect,
			'breast_burn_defect' => $breast_burn_defect,
			'punggung_memar_defect' => $punggung_memar_defect,
			'luka_parut_defect' => $luka_parut_defect,
			'kulit_berjamur_defect' => $kulit_berjamur_defect,
			'penyakit_kulit_defect' => $penyakit_kulit_defect,
			'kulit_daging_bintik_defect' => $kulit_daging_bintik_defect,
			'pertumbuhan_tidak_normal_defect' => $pertumbuhan_tidak_normal_defect,
			'sayap_memar_kebiruan_persen' => $sayap_memar_kebiruan_persen,
			'sayap_patah_memar_persen' => $sayap_patah_memar_persen,
			'kaki_memar_persen' => $kaki_memar_persen,
			'kaki_patah_persen' => $kaki_patah_persen,
			'kaki_arthritis_persen' => $kaki_arthritis_persen,
			'hock_bruise_persen' => $hock_bruise_persen,
			'hock_burn_persen' => $hock_burn_persen,
			'dada_memar_persen' => $dada_memar_persen,
			'breast_burn_persen' => $breast_burn_persen,
			'punggung_memar_persen' => $punggung_memar_persen,
			'luka_parut_persen' => $luka_parut_persen,
			'kulit_berjamur_persen' => $kulit_berjamur_persen,
			'penyakit_kulit_persen' => $penyakit_kulit_persen,
			'kulit_daging_bintik_persen' => $kulit_daging_bintik_persen,
			'pertumbuhan_tidak_normal_persen' => $pertumbuhan_tidak_normal_persen,
			'sub_total_farm_defect' => $sub_total_farm_defect,
			'sub_total_farm_persen' => $sub_total_farm_persen,
			'sayap_memar_kebiruan_defect_lebih' => $sayap_memar_kebiruan_defect_lebih,
			'sayap_patah_memar_defect_lebih' => $sayap_patah_memar_defect_lebih,
			'kaki_memar_kebiruan_defect_lebih' => $kaki_memar_kebiruan_defect_lebih,
			'kaki_patah_memar_defect_lebih' => $kaki_patah_memar_defect_lebih,
			'arthritis_defect_lebih' => $arthritis_defect_lebih,
			'hock_bruise_defect_lebih' => $hock_bruise_defect_lebih,
			'hock_burn_defect_lebih' => $hock_burn_defect_lebih,
			'dada_memar_kebiruan_defect_lebih' => $dada_memar_kebiruan_defect_lebih,
			'breast_burn_defect_lebih' => $breast_burn_defect_lebih,
			'punggung_memar_kebiruan_defect_lebih' => $punggung_memar_kebiruan_defect_lebih,
			'luka_parut_defect_lebih' => $luka_parut_defect_lebih,
			'kulit_berjamur_defect_lebih' => $kulit_berjamur_defect_lebih,
			'penyakit_bisul_defect_lebih' => $penyakit_bisul_defect_lebih,
			'kulit_bintik_merah_defect_lebih' => $kulit_bintik_merah_defect_lebih,
			'pertumbuhan_tidak_normal_defect_lebih' => $pertumbuhan_tidak_normal_defect_lebih,
			'jumlah_defect_d' => $jumlah_defect_d,
			'hati_tidak_normal_defect' => $hati_tidak_normal_defect,
			'jantung_tidak_normal_defect' => $jantung_tidak_normal_defect,
			'organ_dalam_tidak_normal_defect' => $organ_dalam_tidak_normal_defect,
			'hati_tidak_normal_persen' => $hati_tidak_normal_persen,
			'jantung_tidak_normal_persen' => $jantung_tidak_normal_persen,
			'organ_dalam_tidak_normal_persen' => $organ_dalam_tidak_normal_persen,
			'sub_total_ordal_farm_defect' => $sub_total_ordal_farm_defect,
			'sub_total_ordal_farm_persen' => $sub_total_ordal_farm_persen,
			'sg_sayap_memar_defect' => $sg_sayap_memar_defect,
			'sg_kaki_memar_defect' => $sg_kaki_memar_defect,
			'sg_dada_memar_defect' => $sg_dada_memar_defect,
			'sg_punggung_memar_defect' => $sg_punggung_memar_defect,
			'sg_sayap_memar_persen' => $sg_sayap_memar_persen,
			'sg_kaki_memar_persen' => $sg_kaki_memar_persen,
			'sg_dada_memar_persen' => $sg_dada_memar_persen,
			'sg_punggung_memar_persen' => $sg_punggung_memar_persen,
			'sub_total_sg_defect' => $sub_total_sg_defect,
			'sub_total_sg_persen' => $sub_total_sg_persen,
			'sg_sayap_memar_kemerahan_defect_lebih' => $sg_sayap_memar_kemerahan_defect_lebih,
			'sg_kaki_memar_kemerahan_defect_lebih' => $sg_kaki_memar_kemerahan_defect_lebih,
			'sg_dada_memar_kemerahan_defect_lebih' => $sg_dada_memar_kemerahan_defect_lebih,
			'sg_punggung_memar_kemerahan_defect_lebih' => $sg_punggung_memar_kemerahan_defect_lebih,
			'jumlah_defect_e' => $jumlah_defect_e,
			'rpa_over_scalder_defect' => $rpa_over_scalder_defect,
			'rpa_sayap_patah_defect' => $rpa_sayap_patah_defect,
			'rpa_kaki_patah_defect' => $rpa_kaki_patah_defect,
			'rpa_kulit_sobek_dp_defect' => $rpa_kulit_sobek_dp_defect,
			'rpa_kulit_sobek_dada_defect' => $rpa_kulit_sobek_dada_defect,
			'rpa_kulit_sobek_paha_defect' => $rpa_kulit_sobek_paha_defect,
			'rpa_karkas_rusak_defect' => $rpa_karkas_rusak_defect,
			'rpa_empedu_pecah_defect' => $rpa_empedu_pecah_defect,
			'rpa_daging_dada_bawah_cut_defect' => $rpa_daging_dada_bawah_cut_defect,
			'rpa_daging_dada_atas_cut_defect' => $rpa_daging_dada_atas_cut_defect,
			'rpa_kaki_terpotong_defect' => $rpa_kaki_terpotong_defect,
			'rpa_over_scalder_persen' => $rpa_over_scalder_persen,
			'rpa_sayap_patah_persen' => $rpa_sayap_patah_persen,
			'rpa_kaki_patah_persen' => $rpa_kaki_patah_persen,
			'rpa_kulit_sobek_dp_persen' => $rpa_kulit_sobek_dp_persen,
			'rpa_kulit_sobek_dada_persen' => $rpa_kulit_sobek_dada_persen,
			'rpa_kulit_sobek_paha_persen' => $rpa_kulit_sobek_paha_persen,
			'rpa_karkas_rusak_persen' => $rpa_karkas_rusak_persen,
			'rpa_empedu_pecah_persen' => $rpa_empedu_pecah_persen,
			'rpa_daging_dada_bawah_cut_persen' => $rpa_daging_dada_bawah_cut_persen,
			'rpa_daging_dada_atas_cut_persen' => $rpa_daging_dada_atas_cut_persen,
			'rpa_kaki_terpotong_persen' => $rpa_kaki_terpotong_persen,
			'sub_total_rpa_defect' => $sub_total_rpa_defect,
			'sub_total_rpa_persen' => $sub_total_rpa_persen,
			'rpa_over_scalder_defect_lebih' => $rpa_over_scalder_defect_lebih,
			'rpa_sayap_patah_defect_lebih' => $rpa_sayap_patah_defect_lebih,
			'rpa_kaki_patah_defect_lebih' => $rpa_kaki_patah_defect_lebih,
			'rpa_kulit_sobek_dp_defect_lebih' => $rpa_kulit_sobek_dp_defect_lebih,
			'rpa_kulit_sobek_dada_defect_lebih' => $rpa_kulit_sobek_dada_defect_lebih,
			'rpa_kulit_sobek_paha_defect_lebih' => $rpa_kulit_sobek_paha_defect_lebih,
			'rpa_karkas_rusak_defect_lebih' => $rpa_karkas_rusak_defect_lebih,
			'rpa_empedu_pecah_defect_lebih' => $rpa_empedu_pecah_defect_lebih,
			'rpa_daging_dada_bawah_defect_lebih' => $rpa_daging_dada_bawah_defect_lebih,
			'rpa_daging_dada_atas_defect_lebih' => $rpa_daging_dada_atas_defect_lebih,
			'rpa_kaki_terpotong_defect_lebih' => $rpa_kaki_terpotong_defect_lebih,
			'jumlah_defect_f' => $jumlah_defect_f,
			'ip_hati_hancur_ringan_defect' => $ip_hati_hancur_ringan_defect,
			'ip_hati_hancur_berat_defect' => $ip_hati_hancur_berat_defect,
			'ip_hati_hancur_ringan_persen' => $ip_hati_hancur_ringan_persen,
			'ip_hati_hancur_berat_persen' => $ip_hati_hancur_berat_persen,
			'sub_total_ip_defect' => $sub_total_ip_defect,
			'sub_total_ip_persen' => $sub_total_ip_persen,
			'ayam_defect_lebih_dari_satu' => $ayam_defect_lebih_dari_satu,
			'ayam_defect_lebih_dari_satu_persen' => $ayam_defect_lebih_dari_satu_persen,
			'total_defect' => $total_defect,
			'total_persen' => $total_persen,
			// 'ip_hati_hancur_ringan_defect_lebih' => $ip_hati_hancur_ringan_defect_lebih,
			// 'ip_hati_hancur_berat_defect_lebih' => $ip_hati_hancur_berat_defect_lebih,
			// 'jumlah_defect_g' => $jumlah_defect_g,
			'total_ayam_defect' => $total_ayam_defect,
			'total_defect_ayam_lebih' => $total_defect_ayam_lebih,
			'total_ayam_defect_persen' => $total_ayam_defect_persen,
			'total_defect_ayam_lebih_persen' => $total_defect_ayam_lebih_persen
		);

$this->db->insert('post_mortem', $data);
return($this->db->affected_rows() > 0) ? true :false;
}

public function update($uuid)
{
	$nama_farm = $this->input->post('nama_farm');
	$date = $this->input->post('date');
	$nomor_truk = $this->input->post('nomor_truk');
	$ch_oh = $this->input->post('ch_oh');
	$waktu_kedatangan = $this->input->post('waktu_kedatangan');
	$shift = $this->input->post('shift');
	$jumlah_ayam = $this->input->post('jumlah_ayam');
	$average_farm = $this->input->post('average_farm');
	$average_rpa = $this->input->post('average_rpa');
	$ekspedisi = $this->input->post('ekspedisi');
	$nama_mesin = $this->input->post('nama_mesin');
	$username = $this->session->userdata('username');

			// Defect Tunggal
	$sayap_memar_kebiruan_defect = $this->input->post('sayap_memar_kebiruan_defect');
	$sayap_patah_memar_defect = $this->input->post('sayap_patah_memar_defect');
	$kaki_memar_defect = $this->input->post('kaki_memar_defect');
	$kaki_patah_defect = $this->input->post('kaki_patah_defect');
	$kaki_arthritis_defect = $this->input->post('kaki_arthritis_defect');
	$hock_bruise_defect = $this->input->post('hock_bruise_defect');
	$hock_burn_defect = $this->input->post('hock_burn_defect');
	$dada_memar_defect = $this->input->post('dada_memar_defect');
	$breast_burn_defect = $this->input->post('breast_burn_defect');
	$punggung_memar_defect = $this->input->post('punggung_memar_defect');
	$luka_parut_defect = $this->input->post('luka_parut_defect');
	$kulit_berjamur_defect = $this->input->post('kulit_berjamur_defect');
	$penyakit_kulit_defect = $this->input->post('penyakit_kulit_defect');
	$kulit_daging_bintik_defect = $this->input->post('kulit_daging_bintik_defect');
	$pertumbuhan_tidak_normal_defect = $this->input->post('pertumbuhan_tidak_normal_defect');

		// Defect > 1
	$sayap_memar_kebiruan_defect_lebih = $this->input->post('sayap_memar_kebiruan_defect_lebih');
	$sayap_patah_memar_defect_lebih = $this->input->post('sayap_patah_memar_defect_lebih');
	$kaki_memar_kebiruan_defect_lebih = $this->input->post('kaki_memar_kebiruan_defect_lebih');
	$kaki_patah_memar_defect_lebih = $this->input->post('kaki_patah_memar_defect_lebih');
	$arthritis_defect_lebih = $this->input->post('arthritis_defect_lebih');
	$hock_bruise_defect_lebih = $this->input->post('hock_bruise_defect_lebih');
	$hock_burn_defect_lebih = $this->input->post('hock_burn_defect_lebih');
	$dada_memar_kebiruan_defect_lebih = $this->input->post('dada_memar_kebiruan_defect_lebih');
	$breast_burn_defect_lebih = $this->input->post('breast_burn_defect_lebih');
	$punggung_memar_kebiruan_defect_lebih = $this->input->post('punggung_memar_kebiruan_defect_lebih');
	$luka_parut_defect_lebih = $this->input->post('luka_parut_defect_lebih');
	$kulit_berjamur_defect_lebih = $this->input->post('kulit_berjamur_defect_lebih');
	$penyakit_bisul_defect_lebih = $this->input->post('penyakit_bisul_defect_lebih');
	$kulit_bintik_merah_defect_lebih = $this->input->post('kulit_bintik_merah_defect_lebih');
	$pertumbuhan_tidak_normal_defect_lebih = $this->input->post('pertumbuhan_tidak_normal_defect_lebih');

	$sayap_memar_kebiruan_persen = ($sayap_memar_kebiruan_defect *100) / $jumlah_ayam;
	$sayap_patah_memar_persen = ($sayap_patah_memar_defect *100) / $jumlah_ayam;
	$kaki_memar_persen = ($kaki_memar_defect *100) / $jumlah_ayam;
	$kaki_patah_persen = ($kaki_patah_defect *100) / $jumlah_ayam;
	$kaki_arthritis_persen = ($kaki_arthritis_defect *100) / $jumlah_ayam;
	$hock_bruise_persen = ($hock_bruise_defect *100) / $jumlah_ayam;
	$hock_burn_persen =($hock_burn_defect *100) / $jumlah_ayam;
	$dada_memar_persen = ($dada_memar_defect *100) / $jumlah_ayam;
	$breast_burn_persen = ($breast_burn_defect *100) / $jumlah_ayam;
	$punggung_memar_persen = ($punggung_memar_defect *100) / $jumlah_ayam;
	$luka_parut_persen = ($luka_parut_defect *100) / $jumlah_ayam;
	$kulit_berjamur_persen = ($kulit_berjamur_defect *100) / $jumlah_ayam;
	$penyakit_kulit_persen = ($penyakit_kulit_defect *100) / $jumlah_ayam;
	$kulit_daging_bintik_persen = ($kulit_daging_bintik_defect *100) / $jumlah_ayam;
	$pertumbuhan_tidak_normal_persen = ($pertumbuhan_tidak_normal_defect *100) / $jumlah_ayam;

		// Jumlah_defect_a
	$sub_total_farm_defect = $sayap_memar_kebiruan_defect + $sayap_patah_memar_defect + $kaki_memar_defect + $kaki_patah_defect + $kaki_arthritis_defect + $hock_bruise_defect + $hock_burn_defect + $dada_memar_defect + $breast_burn_defect + $punggung_memar_defect + $luka_parut_defect + $kulit_berjamur_defect + $penyakit_kulit_defect + $kulit_daging_bintik_defect + $pertumbuhan_tidak_normal_defect;

	$sub_total_farm_persen = ($sub_total_farm_defect * 100) / $jumlah_ayam;

		// Jumlah_defect_d
	$sub_total_farm_defect_lebih = $sayap_memar_kebiruan_defect_lebih + $sayap_patah_memar_defect_lebih + $kaki_memar_kebiruan_defect_lebih + $kaki_patah_memar_defect_lebih + $arthritis_defect_lebih + $hock_bruise_defect_lebih + $hock_burn_defect_lebih + $dada_memar_kebiruan_defect_lebih + $breast_burn_defect_lebih + $punggung_memar_kebiruan_defect_lebih + $luka_parut_defect_lebih + $kulit_berjamur_defect_lebih + $penyakit_bisul_defect_lebih + $kulit_bintik_merah_defect_lebih + $pertumbuhan_tidak_normal_defect_lebih;
	$jumlah_defect_d = $sub_total_farm_defect + $sub_total_farm_defect_lebih;

		// Defect Tunggal
	$hati_tidak_normal_defect = $this->input->post('hati_tidak_normal_defect');
	$jantung_tidak_normal_defect = $this->input->post('jantung_tidak_normal_defect');
	$organ_dalam_tidak_normal_defect = $this->input->post('organ_dalam_tidak_normal_defect');

	$hati_tidak_normal_persen = ($hati_tidak_normal_defect *100) / $jumlah_ayam;
	$jantung_tidak_normal_persen = ($jantung_tidak_normal_defect *100) / $jumlah_ayam;
	$organ_dalam_tidak_normal_persen = ($organ_dalam_tidak_normal_defect *100) / $jumlah_ayam;

	$sub_total_ordal_farm_defect = $hati_tidak_normal_defect + $jantung_tidak_normal_defect + $organ_dalam_tidak_normal_defect;
	$sub_total_ordal_farm_persen = ($sub_total_ordal_farm_defect * 100) / $jumlah_ayam;

		// Defect Tunggal
	$sg_sayap_memar_defect = $this->input->post('sg_sayap_memar_defect');
	$sg_kaki_memar_defect = $this->input->post('sg_kaki_memar_defect');
	$sg_dada_memar_defect = $this->input->post('sg_dada_memar_defect');
	$sg_punggung_memar_defect = $this->input->post('sg_punggung_memar_defect');

		// Defect > 1
	$sg_sayap_memar_kemerahan_defect_lebih = $this->input->post('sg_sayap_memar_kemerahan_defect_lebih');
	$sg_kaki_memar_kemerahan_defect_lebih = $this->input->post('sg_kaki_memar_kemerahan_defect_lebih');
	$sg_dada_memar_kemerahan_defect_lebih = $this->input->post('sg_dada_memar_kemerahan_defect_lebih');
	$sg_punggung_memar_kemerahan_defect_lebih = $this->input->post('sg_punggung_memar_kemerahan_defect_lebih');

	$sg_sayap_memar_persen = ($sg_sayap_memar_defect *100) / $jumlah_ayam;
	$sg_kaki_memar_persen = ($sg_kaki_memar_defect *100) / $jumlah_ayam;
	$sg_dada_memar_persen = ($sg_dada_memar_defect *100) / $jumlah_ayam;
	$sg_punggung_memar_persen = ($sg_punggung_memar_defect *100) / $jumlah_ayam;

		// Jumlah_defect_b
	$sub_total_sg_defect = $sg_sayap_memar_defect + $sg_kaki_memar_defect + $sg_dada_memar_defect + $sg_punggung_memar_defect;
	$sub_total_sg_persen = ($sub_total_sg_defect * 100) / $jumlah_ayam;

		// Jumlah_defect_e
	$sub_total_sg_defect_lebih = $sg_sayap_memar_kemerahan_defect_lebih + $sg_kaki_memar_kemerahan_defect_lebih + $sg_dada_memar_kemerahan_defect_lebih + $sg_punggung_memar_kemerahan_defect_lebih;
	$jumlah_defect_e = $sub_total_sg_defect + $sub_total_sg_defect_lebih;

		// Defect Tunggal
	$rpa_over_scalder_defect = $this->input->post('rpa_over_scalder_defect');
	$rpa_sayap_patah_defect = $this->input->post('rpa_sayap_patah_defect');
	$rpa_kaki_patah_defect = $this->input->post('rpa_kaki_patah_defect');
	$rpa_kulit_sobek_dp_defect = $this->input->post('rpa_kulit_sobek_dp_defect');
	$rpa_kulit_sobek_dada_defect = $this->input->post('rpa_kulit_sobek_dada_defect');
	$rpa_kulit_sobek_paha_defect = $this->input->post('rpa_kulit_sobek_paha_defect');
	$rpa_karkas_rusak_defect = $this->input->post('rpa_karkas_rusak_defect');
	$rpa_empedu_pecah_defect = $this->input->post('rpa_empedu_pecah_defect');
	$rpa_daging_dada_bawah_cut_defect = $this->input->post('rpa_daging_dada_bawah_cut_defect');
	$rpa_daging_dada_atas_cut_defect = $this->input->post('rpa_daging_dada_atas_cut_defect');
	$rpa_kaki_terpotong_defect = $this->input->post('rpa_kaki_terpotong_defect');

		// Defect > 1
	$rpa_over_scalder_defect_lebih = $this->input->post('rpa_over_scalder_defect_lebih');
	$rpa_sayap_patah_defect_lebih = $this->input->post('rpa_sayap_patah_defect_lebih');
	$rpa_kaki_patah_defect_lebih = $this->input->post('rpa_kaki_patah_defect_lebih');
	$rpa_kulit_sobek_dp_defect_lebih = $this->input->post('rpa_kulit_sobek_dp_defect_lebih');
	$rpa_kulit_sobek_dada_defect_lebih = $this->input->post('rpa_kulit_sobek_dada_defect_lebih');
	$rpa_kulit_sobek_paha_defect_lebih = $this->input->post('rpa_kulit_sobek_paha_defect_lebih');
	$rpa_karkas_rusak_defect_lebih = $this->input->post('rpa_karkas_rusak_defect_lebih');
	$rpa_empedu_pecah_defect_lebih = $this->input->post('rpa_empedu_pecah_defect_lebih');
	$rpa_daging_dada_bawah_defect_lebih = $this->input->post('rpa_daging_dada_bawah_defect_lebih');
	$rpa_daging_dada_atas_defect_lebih = $this->input->post('rpa_daging_dada_atas_defect_lebih');
	$rpa_kaki_terpotong_defect_lebih = $this->input->post('rpa_kaki_terpotong_defect_lebih');

	$rpa_over_scalder_persen = ($rpa_over_scalder_defect *100) / $jumlah_ayam;
	$rpa_sayap_patah_persen = ($rpa_sayap_patah_defect *100) / $jumlah_ayam;
	$rpa_kaki_patah_persen = ($rpa_kaki_patah_defect *100) / $jumlah_ayam;
	$rpa_kulit_sobek_dp_persen = ($rpa_kulit_sobek_dp_defect *100) / $jumlah_ayam;
	$rpa_kulit_sobek_dada_persen = ($rpa_kulit_sobek_dada_defect *100) / $jumlah_ayam;
	$rpa_kulit_sobek_paha_persen = ($rpa_kulit_sobek_paha_defect *100) / $jumlah_ayam;
	$rpa_karkas_rusak_persen = ($rpa_karkas_rusak_defect *100) / $jumlah_ayam;
	$rpa_empedu_pecah_persen = ($rpa_empedu_pecah_defect *100) / $jumlah_ayam;
	$rpa_daging_dada_bawah_cut_persen = ($rpa_daging_dada_bawah_cut_defect *100) / $jumlah_ayam;
	$rpa_daging_dada_atas_cut_persen = ($rpa_daging_dada_atas_cut_defect *100) / $jumlah_ayam;
	$rpa_kaki_terpotong_persen = ($rpa_kaki_terpotong_defect *100) / $jumlah_ayam;

		// Jumlah_defect_c
	$sub_total_rpa_defect = $rpa_over_scalder_defect + $rpa_sayap_patah_defect + $rpa_kaki_patah_defect + $rpa_kulit_sobek_dp_defect + $rpa_kulit_sobek_dada_defect + $rpa_kulit_sobek_paha_defect + $rpa_karkas_rusak_defect + $rpa_empedu_pecah_defect + $rpa_daging_dada_bawah_cut_defect + $rpa_daging_dada_atas_cut_defect + $rpa_kaki_terpotong_defect;
	$sub_total_rpa_persen = ($sub_total_rpa_defect * 100) / $jumlah_ayam;

		// jumlah_defect_f
	$sub_total_rpa_defect_lebih = $rpa_over_scalder_defect_lebih + $rpa_sayap_patah_defect_lebih + $rpa_kaki_patah_defect_lebih + $rpa_kulit_sobek_dp_defect_lebih + $rpa_kulit_sobek_dada_defect_lebih + $rpa_kulit_sobek_paha_defect_lebih + $rpa_karkas_rusak_defect_lebih + $rpa_empedu_pecah_defect_lebih + $rpa_daging_dada_bawah_defect_lebih + $rpa_daging_dada_atas_defect_lebih + $rpa_kaki_terpotong_defect_lebih;
	$jumlah_defect_f = $sub_total_rpa_defect + $sub_total_rpa_defect_lebih;

		// Defect Tunggal
	$ip_hati_hancur_ringan_defect = $this->input->post('ip_hati_hancur_ringan_defect');
	$ip_hati_hancur_berat_defect = $this->input->post('ip_hati_hancur_berat_defect');

		// Defect > 1
	$ip_hati_hancur_ringan_defect_lebih = $this->input->post('ip_hati_hancur_ringan_defect_lebih');
	$ip_hati_hancur_berat_defect_lebih = $this->input->post('ip_hati_hancur_berat_defect_lebih');

	$ip_hati_hancur_ringan_persen = ($ip_hati_hancur_ringan_defect *100) / $jumlah_ayam;
	$ip_hati_hancur_berat_persen = ($ip_hati_hancur_berat_defect *100) / $jumlah_ayam;

	$sub_total_ip_defect = $ip_hati_hancur_berat_defect + $ip_hati_hancur_ringan_defect;
	$sub_total_ip_persen = ($sub_total_ip_defect * 100) / $jumlah_ayam;

	$ayam_defect_lebih_dari_satu = $this->input->post('ayam_defect_lebih_dari_satu');
	$ayam_defect_lebih_dari_satu_persen = ($ayam_defect_lebih_dari_satu * 100) / $jumlah_ayam;

		// jumlah_defect_g
	// $sub_total_ip_defect_lebih = $ip_hati_hancur_ringan_defect_lebih + $ip_hati_hancur_berat_defect_lebih;
	// $jumlah_defect_g = $sub_total_ip_defect + $sub_total_ip_defect_lebih;
	$total_defect = $sub_total_farm_defect + $sub_total_rpa_defect;
	$total_persen = ($total_defect * 100) / $jumlah_ayam;

	$total_ayam_defect = $sub_total_farm_defect + $sub_total_sg_defect + $sub_total_rpa_defect + $ayam_defect_lebih_dari_satu;
	$total_defect_ayam_lebih = $jumlah_defect_d + $jumlah_defect_e + $jumlah_defect_f;

	$total_ayam_defect_persen = ($total_ayam_defect *100) / $jumlah_ayam;
	$total_defect_ayam_lebih_persen = ($total_defect_ayam_lebih *100) / $jumlah_ayam;

	$data = array(
		'username' => $username,
		'nama_farm' => $nama_farm,
		'date' => $date,
		'nomor_truk' => $nomor_truk,
		'ch_oh' => $ch_oh,
		'waktu_kedatangan' => $waktu_kedatangan,
		'shift' => $shift,
		'jumlah_ayam' => $jumlah_ayam,
		'average_farm' => $average_farm,
		'average_rpa' => $average_rpa,
		'ekspedisi' => $ekspedisi,
		'nama_mesin' => $nama_mesin,

			// Defect Tunggal
		'sayap_memar_kebiruan_defect' => $sayap_memar_kebiruan_defect,
		'sayap_patah_memar_defect' => $sayap_patah_memar_defect,
		'kaki_memar_defect' => $kaki_memar_defect,
		'kaki_patah_defect' => $kaki_patah_defect,
		'kaki_arthritis_defect' => $kaki_arthritis_defect,
		'hock_bruise_defect' => $hock_bruise_defect,
		'hock_burn_defect' => $hock_burn_defect,
		'dada_memar_defect' => $dada_memar_defect,
		'breast_burn_defect' => $breast_burn_defect,
		'punggung_memar_defect' => $punggung_memar_defect,
		'luka_parut_defect' => $luka_parut_defect,
		'kulit_berjamur_defect' => $kulit_berjamur_defect,
		'penyakit_kulit_defect' => $penyakit_kulit_defect,
		'kulit_daging_bintik_defect' => $kulit_daging_bintik_defect,
		'pertumbuhan_tidak_normal_defect' => $pertumbuhan_tidak_normal_defect,

		'sayap_memar_kebiruan_persen' => $sayap_memar_kebiruan_persen,
		'sayap_patah_memar_persen' => $sayap_patah_memar_persen,
		'kaki_memar_persen' => $kaki_memar_persen,
		'kaki_patah_persen' => $kaki_patah_persen,
		'kaki_arthritis_persen' => $kaki_arthritis_persen,
		'hock_bruise_persen' => $hock_bruise_persen,
		'hock_burn_persen' => $hock_burn_persen,
		'dada_memar_persen' => $dada_memar_persen,
		'breast_burn_persen' => $breast_burn_persen,
		'punggung_memar_persen' => $punggung_memar_persen,
		'luka_parut_persen' => $luka_parut_persen,
		'kulit_berjamur_persen' => $kulit_berjamur_persen,
		'penyakit_kulit_persen' => $penyakit_kulit_persen,
		'kulit_daging_bintik_persen' => $kulit_daging_bintik_persen,
		'pertumbuhan_tidak_normal_persen' => $pertumbuhan_tidak_normal_persen,

		'sub_total_farm_defect' => $sub_total_farm_defect,
		'sub_total_farm_persen' => $sub_total_farm_persen,

			// Defect > 1
		'sayap_memar_kebiruan_defect_lebih' => $sayap_memar_kebiruan_defect_lebih,
		'sayap_patah_memar_defect_lebih' => $sayap_patah_memar_defect_lebih,
		'kaki_memar_kebiruan_defect_lebih' => $kaki_memar_kebiruan_defect_lebih,
		'kaki_patah_memar_defect_lebih' => $kaki_patah_memar_defect_lebih,
		'arthritis_defect_lebih' => $arthritis_defect_lebih,
		'hock_bruise_defect_lebih' => $hock_bruise_defect_lebih,
		'hock_burn_defect_lebih' => $hock_burn_defect_lebih,
		'dada_memar_kebiruan_defect_lebih' => $dada_memar_kebiruan_defect_lebih,
		'breast_burn_defect_lebih' => $breast_burn_defect_lebih,
		'punggung_memar_kebiruan_defect_lebih' => $punggung_memar_kebiruan_defect_lebih,
		'luka_parut_defect_lebih' => $luka_parut_defect_lebih,
		'kulit_berjamur_defect_lebih' => $kulit_berjamur_defect_lebih,
		'penyakit_bisul_defect_lebih' => $penyakit_bisul_defect_lebih,
		'kulit_bintik_merah_defect_lebih' => $kulit_bintik_merah_defect_lebih,
		'pertumbuhan_tidak_normal_defect_lebih' => $pertumbuhan_tidak_normal_defect_lebih,

		'jumlah_defect_d' => $jumlah_defect_d,

			// Defect Tunggal
		'hati_tidak_normal_defect' => $hati_tidak_normal_defect,
		'jantung_tidak_normal_defect' => $jantung_tidak_normal_defect,
		'organ_dalam_tidak_normal_defect' => $organ_dalam_tidak_normal_defect,

		'hati_tidak_normal_persen' => $hati_tidak_normal_persen,
		'jantung_tidak_normal_persen' => $jantung_tidak_normal_persen,
		'organ_dalam_tidak_normal_persen' => $organ_dalam_tidak_normal_persen,

		'sub_total_ordal_farm_defect' => $sub_total_ordal_farm_defect,
		'sub_total_ordal_farm_persen' => $sub_total_ordal_farm_persen,

			// Defect Tunggal
		'sg_sayap_memar_defect' => $sg_sayap_memar_defect,
		'sg_kaki_memar_defect' => $sg_kaki_memar_defect,
		'sg_dada_memar_defect' => $sg_dada_memar_defect,
		'sg_punggung_memar_defect' => $sg_punggung_memar_defect,

		'sg_sayap_memar_persen' => $sg_sayap_memar_persen,
		'sg_kaki_memar_persen' => $sg_kaki_memar_persen,
		'sg_dada_memar_persen' => $sg_dada_memar_persen,
		'sg_punggung_memar_persen' => $sg_punggung_memar_persen,

		'sub_total_sg_defect' => $sub_total_sg_defect,
		'sub_total_sg_persen' => $sub_total_sg_persen,

			// Defect > 1
		'sg_sayap_memar_kemerahan_defect_lebih' => $sg_sayap_memar_kemerahan_defect_lebih,
		'sg_kaki_memar_kemerahan_defect_lebih' => $sg_kaki_memar_kemerahan_defect_lebih,
		'sg_dada_memar_kemerahan_defect_lebih' => $sg_dada_memar_kemerahan_defect_lebih,
		'sg_punggung_memar_kemerahan_defect_lebih' => $sg_punggung_memar_kemerahan_defect_lebih,

		'jumlah_defect_e' => $jumlah_defect_e,

			// Defect Tunggal
		'rpa_over_scalder_defect' => $rpa_over_scalder_defect,
		'rpa_sayap_patah_defect' => $rpa_sayap_patah_defect,
		'rpa_kaki_patah_defect' => $rpa_kaki_patah_defect,
		'rpa_kulit_sobek_dp_defect' => $rpa_kulit_sobek_dp_defect,
		'rpa_kulit_sobek_dada_defect' => $rpa_kulit_sobek_dada_defect,
		'rpa_kulit_sobek_paha_defect' => $rpa_kulit_sobek_paha_defect,
		'rpa_karkas_rusak_defect' => $rpa_karkas_rusak_defect,
		'rpa_empedu_pecah_defect' => $rpa_empedu_pecah_defect,
		'rpa_daging_dada_bawah_cut_defect' => $rpa_daging_dada_bawah_cut_defect,
		'rpa_daging_dada_atas_cut_defect' => $rpa_daging_dada_atas_cut_defect,
		'rpa_kaki_terpotong_defect' => $rpa_kaki_terpotong_defect,

		'rpa_over_scalder_persen' => $rpa_over_scalder_persen,
		'rpa_sayap_patah_persen' => $rpa_sayap_patah_persen,
		'rpa_kaki_patah_persen' => $rpa_kaki_patah_persen,
		'rpa_kulit_sobek_dp_persen' => $rpa_kulit_sobek_dp_persen,
		'rpa_kulit_sobek_dada_persen' => $rpa_kulit_sobek_dada_persen,
		'rpa_kulit_sobek_paha_persen' => $rpa_kulit_sobek_paha_persen,
		'rpa_karkas_rusak_persen' => $rpa_karkas_rusak_persen,
		'rpa_empedu_pecah_persen' => $rpa_empedu_pecah_persen,
		'rpa_daging_dada_bawah_cut_persen' => $rpa_daging_dada_bawah_cut_persen,
		'rpa_daging_dada_atas_cut_persen' => $rpa_daging_dada_atas_cut_persen,
		'rpa_kaki_terpotong_persen' => $rpa_kaki_terpotong_persen,

		'sub_total_rpa_defect' => $sub_total_rpa_defect,
		'sub_total_rpa_persen' => $sub_total_rpa_persen,

			// Defect > 1
		'rpa_over_scalder_defect_lebih' => $rpa_over_scalder_defect_lebih,
		'rpa_sayap_patah_defect_lebih' => $rpa_sayap_patah_defect_lebih,
		'rpa_kaki_patah_defect_lebih' => $rpa_kaki_patah_defect_lebih,
		'rpa_kulit_sobek_dp_defect_lebih' => $rpa_kulit_sobek_dp_defect_lebih,
		'rpa_kulit_sobek_dada_defect_lebih' => $rpa_kulit_sobek_dada_defect_lebih,
		'rpa_kulit_sobek_paha_defect_lebih' => $rpa_kulit_sobek_paha_defect_lebih,
		'rpa_karkas_rusak_defect_lebih' => $rpa_karkas_rusak_defect_lebih,
		'rpa_empedu_pecah_defect_lebih' => $rpa_empedu_pecah_defect_lebih,
		'rpa_daging_dada_bawah_defect_lebih' => $rpa_daging_dada_bawah_defect_lebih,
		'rpa_daging_dada_atas_defect_lebih' => $rpa_daging_dada_atas_defect_lebih,
		'rpa_kaki_terpotong_defect_lebih' => $rpa_kaki_terpotong_defect_lebih,

		'jumlah_defect_f' => $jumlah_defect_f,

			// Defect Tunggal
		'ip_hati_hancur_ringan_defect' => $ip_hati_hancur_ringan_defect,
		'ip_hati_hancur_berat_defect' => $ip_hati_hancur_berat_defect,

		'ip_hati_hancur_ringan_persen' => $ip_hati_hancur_ringan_persen,
		'ip_hati_hancur_berat_persen' => $ip_hati_hancur_berat_persen,

		'sub_total_ip_defect' => $sub_total_ip_defect,
		'sub_total_ip_persen' => $sub_total_ip_persen,

		'total_defect' => $total_defect,
		'total_persen' => $total_persen,

		'ayam_defect_lebih_dari_satu' => $ayam_defect_lebih_dari_satu,
		'ayam_defect_lebih_dari_satu_persen' => $ayam_defect_lebih_dari_satu_persen,

				// Defect > 1
		// 'ip_hati_hancur_ringan_defect_lebih' => $ip_hati_hancur_ringan_defect_lebih,
		// 'ip_hati_hancur_berat_defect_lebih' => $ip_hati_hancur_berat_defect_lebih,

		// 'jumlah_defect_g' => $jumlah_defect_g,

		'total_ayam_defect' => $total_ayam_defect,
		'total_defect_ayam_lebih' => $total_defect_ayam_lebih,
		'total_ayam_defect_persen' => $total_ayam_defect_persen,
		'total_defect_ayam_lebih_persen' => $total_defect_ayam_lebih_persen,

		'modified_at' => date("Y-m-d H:i:s")
	);

$this->db->update('post_mortem', $data, array('uuid' => $uuid));
return($this->db->affected_rows() > 0) ? true :false;
}



public function get_all()
{
	$this->db->order_by('created_at', 'DESC');
	$data = $this->db->get('post_mortem')->result();
	return $data;
}

public function get_all_refresh()
{
	$this->db->order_by('date', 'DESC');
	$this->db->order_by('waktu_kedatangan', 'DESC');
	$data = $this->db->get('post_mortem')->result();
	return $data;
}

public function get_by_uuid($uuid)
{
	$data = $this->db->get_where('post_mortem', array('uuid' => $uuid))->row();
	return $data;
}

public function get_jumlah_ayam($uuid) {
	$this->db->select('jumlah_ayam');
	$this->db->where('uuid', $uuid);
	$query = $this->db->get('post_mortem');
}

public function get_data_today() {
	$dateToday = date('Y-m-d');
	$this->db->order_by('created_at', 'DESC');
	$this->db->where('date', $dateToday);
	return $this->db->get('post_mortem')->result_array();
}
public function count_today() {
	$this->db->where('date', date('Y-m-d'));
	return $this->db->count_all_results('post_mortem');
}
public function get_latest_today() {
	$this->db->where('date', date('Y-m-d'));
	$this->db->order_by('created_at', 'DESC');
	$query = $this->db->get('post_mortem', 1);
	return $query->row_array();
}

public function get_days_ago() {
	$days_ago = date('Y-m-d', strtotime('-1 days'));

	$this->db->where('date >=', $days_ago);
	$query = $this->db->get('post_mortem');
	return $query->result_array();
}

public function get_pm($today){
	$this->db->select('*');
	$this->db->from('post_mortem');
	$this->db->like('date', $today, 'after'); 
	$query = $this->db->get();
	return $query->result();
}

}