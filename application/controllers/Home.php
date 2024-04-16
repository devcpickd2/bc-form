<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('auth_model');
		$this->load->model('post_mortem_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}

	}

	public function index()
	{
		$pegawai = $this->auth_model->current_user();
		// $post_mortem = $this->post_mortem_model->get_data_today();

		// $data['dataHariIni'] = $this->post_mortem_model->get_data_today();
		// $this->load->view('home', $data);

		$data = array(
			'nama_pegawai' => ($pegawai) ? $pegawai->nama : "Tamu",
			'data_today' => $this->post_mortem_model->get_data_today(),
			'count_today' => $this->post_mortem_model->count_today(),
			'latest_today' => $this->post_mortem_model->get_latest_today(),
			// 'daily' => $this->post_mortem_model->get_daily_data(),
			// 'days_ago' => $this->post_mortem_model->get_days_ago(),
			'active_nav' => 'home'
		);

        // $data['nama_pegawai'] = ($pegawai) ? $pegawai->nama : "Tamu";
        // $data['active_nav'] = 'home';
 
		$this->load->view('partials/head', $data);
		$this->load->view('home/home', $data);
		$this->load->view('partials/footer');
	}
}
