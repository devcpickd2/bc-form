<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemeriksaanchemical_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pemeriksaanchemical_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pemeriksaanchemical';
		$data['logs'] = $this->pemeriksaanchemical_log_model->get_all_logs();
		$this->load->view('form/pemeriksaanchemical/logs', $data);
	}
}
