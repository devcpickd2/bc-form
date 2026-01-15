<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Retain_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('retain_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_retain';
		$data['logs'] = $this->retain_log_model->get_all_logs();
		$this->load->view('form/retain/logs', $data);
	}
}
