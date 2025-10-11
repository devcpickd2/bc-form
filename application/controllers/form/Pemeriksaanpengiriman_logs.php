<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaanpengiriman_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pemeriksaanpengiriman_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pemeriksaanpengiriman';
		$data['logs'] = $this->pemeriksaanpengiriman_log_model->get_all_logs();
		$this->load->view('form/pemeriksaanpengiriman/logs', $data);
	}
}
