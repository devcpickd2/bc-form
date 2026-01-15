<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengayakan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pengayakan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pengayakan';
		$data['logs'] = $this->pengayakan_log_model->get_all_logs();
		$this->load->view('form/pengayakan/logs', $data);
	}
}
