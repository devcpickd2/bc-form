<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seasoning_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('seasoning_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_seasoning';
		$data['logs'] = $this->seasoning_log_model->get_all_logs();
		$this->load->view('form/seasoning/logs', $data);
	}
}
