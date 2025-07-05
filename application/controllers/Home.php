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
		if(!$this->auth_model->current_user()){
			redirect('login');
		}

	}

	public function index()  
	{
		$pegawai = $this->auth_model->current_user();

		$data = array(
			'nama_pegawai' => ($pegawai) ? $pegawai->nama : "Tamu",
			'latest_today' => $this->produksi_model->get_latest_today(),
			'count_batch' => $this->produksi_model->count_today_same_product(),
			'packaging' => $this->penerimaankemasan_model->get_latest_kemasan(),
			'seasoning' => $this->seasoning_model->get_latest_seasoning(),
			'chemical' => $this->pemeriksaanchemical_model->get_latest_chemical(),
			'loading' => $this->loading_model->get_latest_loading(),
			'jumlah_temuan' => $this->kontaminasi_model->get_temuan_per_hari(),
			'temuan' => $this->kontaminasi_model->get_latest_temuan_bulan_ini(),
			'active_nav' => 'home'
		);

		$this->load->view('partials/head', $data);
		$this->load->view('home/home', $data);
		$this->load->view('partials/footer');
	}
}
