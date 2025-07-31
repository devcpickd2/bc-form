<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('auth_model');
		$this->load->model('produksi_model');
		$this->load->model('penerimaankemasan_model');
		$this->load->model('seasoning_model');
		$this->load->model('pemeriksaanchemical_model');
		$this->load->model('loading_model');
		$this->load->model('kontaminasi_model');
		$this->load->model('pegawai_model');
		$this->load->model('suhu_model');

		if (!$this->auth_model->current_user()) {
			redirect('login');
		}
	}

	public function index() 
	{
		$pegawai = $this->auth_model->current_user();
		$show_modal = false;

		if (!$this->session->userdata('produksi_data') && $this->session->userdata('show_produksi_modal')) {
			$show_modal = true;
		}

		$plant_uuid = $this->session->userdata('plant');

		// Ambil tanggal dari GET, fallback ke hari ini
		$tanggal = $this->input->get('tanggal');
		if (!$tanggal || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $tanggal)) {
			$tanggal = date('Y-m-d');
		}

		$suhu_data = $this->suhu_model->get_suhu_today_by_plant($plant_uuid, $tanggal);

		// Ambil data proses_produksi dan proses_packing
		$proses = $this->produksi_model->get_produksi_by_plant_and_date($plant_uuid, $tanggal);
		$proses_produksi = [];
		$proses_packing = [];

		if ($proses) {
			$proses_produksi = json_decode($proses->proses_produksi, true);
			$proses_packing = json_decode($proses->proses_packing, true);
		}

		// Inisialisasi array dan info produk
		$kadar_air_arr = [];
		$suhu_produk_arr = [];
		$bulk_density_arr = [];

		$kadar_air_info = [];
		$suhu_produk_info = [];
		$bulk_density_info = [];

		if (is_array($proses_packing)) {
			foreach ($proses_packing as $item) {
				$p = $item['pemeriksaan_finished_product'] ?? []; 

				$kadar = trim($p['kadar_air_produk'][0] ?? '');
				$suhu = trim($p['suhu_sebelum_packing'][0] ?? '');
				$bdens = trim($p['bulk_density'][0] ?? '');

				$nama_produk = trim($p['nama_produk'][0] ?? '');
				$kode_produksi = trim($p['kode_produksi'][0] ?? '');

				if (is_numeric($kadar)) {
					$kadar = (float)$kadar;
					$kadar_air_arr[] = $kadar;
					$kadar_air_info[] = [
						'nilai' => $kadar,
						'produk' => $nama_produk,
						'kode' => $kode_produksi
					];
				}

				if (is_numeric($suhu)) {
					$suhu = (float)$suhu;
					$suhu_produk_arr[] = $suhu;
					$suhu_produk_info[] = [
						'nilai' => $suhu,
						'produk' => $nama_produk,
						'kode' => $kode_produksi
					];
				}

				if (is_numeric($bdens)) {
					$bdens = (float)$bdens;
					$bulk_density_arr[] = $bdens;
					$bulk_density_info[] = [
						'nilai' => $bdens,
						'produk' => $nama_produk,
						'kode' => $kode_produksi
					];
				}
			}
		}

		// Fungsi bantu ambil info ekstrem
		function ambil_extreme_info($info_array, $tipe = 'max') {
			if (empty($info_array)) return [null, '', ''];
			$fungsi = ($tipe === 'max') ? 'max' : 'min';
			$nilai_ekstrim = $fungsi(array_column($info_array, 'nilai'));
			foreach ($info_array as $info) {
				if ($info['nilai'] === $nilai_ekstrim) {
					return [$nilai_ekstrim, $info['produk'], $info['kode']];
				}
			}
			return [null, '', ''];
		}

		// Ambil nilai dan info final
		list($ka_max, $ka_max_produk, $ka_max_kode) = ambil_extreme_info($kadar_air_info, 'max');
		list($ka_min, $ka_min_produk, $ka_min_kode) = ambil_extreme_info($kadar_air_info, 'min');

		list($suhu_max, $suhu_max_produk, $suhu_max_kode) = ambil_extreme_info($suhu_produk_info, 'max');
		list($suhu_min, $suhu_min_produk, $suhu_min_kode) = ambil_extreme_info($suhu_produk_info, 'min');

		list($bd_max, $bd_max_produk, $bd_max_kode) = ambil_extreme_info($bulk_density_info, 'max');
		list($bd_min, $bd_min_produk, $bd_min_kode) = ambil_extreme_info($bulk_density_info, 'min');

		$data = [
			'nama_pegawai' => $pegawai ? $pegawai->nama : "Tamu",
			'latest_today' => $this->produksi_model->get_latest_today(),
			'count_batch' => $this->produksi_model->count_today_same_product(),
			'packaging' => $this->penerimaankemasan_model->get_latest_kemasan(),
			'seasoning' => $this->seasoning_model->get_latest_seasoning(),
			'chemical' => $this->pemeriksaanchemical_model->get_latest_chemical(),
			'loading' => $this->loading_model->get_latest_loading(),
			'jumlah_temuan' => $this->kontaminasi_model->get_temuan_per_hari(),
			'temuan' => $this->kontaminasi_model->get_latest_temuan_bulan_ini(),
			'pegawai_produksi' => $this->pegawai_model->get_pegawai_produksi_by_plant($plant_uuid),
			'show_modal' => $show_modal,
			'suhu_data' => $suhu_data,
			'tanggal_dipilih' => $tanggal,
			'active_nav' => 'home',

			// Tambahan untuk dashboard:
			'kadar_air_max' => $ka_max,
			'kadar_air_max_produk' => $ka_max_produk,
			'kadar_air_max_kode' => $ka_max_kode,
			'kadar_air_min' => $ka_min,
			'kadar_air_min_produk' => $ka_min_produk,
			'kadar_air_min_kode' => $ka_min_kode,

			'suhu_produk_max' => $suhu_max,
			'suhu_produk_max_produk' => $suhu_max_produk,
			'suhu_produk_max_kode' => $suhu_max_kode,
			'suhu_produk_min' => $suhu_min,
			'suhu_produk_min_produk' => $suhu_min_produk,
			'suhu_produk_min_kode' => $suhu_min_kode,

			'bulk_density_max' => $bd_max,
			'bulk_density_max_produk' => $bd_max_produk,
			'bulk_density_max_kode' => $bd_max_kode,
			'bulk_density_min' => $bd_min,
			'bulk_density_min_produk' => $bd_min_produk,
			'bulk_density_min_kode' => $bd_min_kode,
		];

		$this->load->view('partials/head', $data);
		$this->load->view('home/home', $data);
		$this->load->view('partials/footer');
	}

	public function set_produksi_data()
	{
		$this->session->set_userdata('produksi_data', [
			'tanggal' => $this->input->post('tanggal'),
			'shift' => $this->input->post('shift'),
			'nama_produksi' => $this->input->post('nama_produksi')
		]);

		$this->session->unset_userdata('show_produksi_modal');
		redirect('home');
	}
}
