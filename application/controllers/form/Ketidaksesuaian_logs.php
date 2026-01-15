<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ketidaksesuaian_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('ketidaksesuaian_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_ketidaksesuaian';
		$data['logs'] = $this->ketidaksesuaian_log_model->get_all_logs();
		$this->load->view('form/ketidaksesuaian/logs', $data);
	}
}
