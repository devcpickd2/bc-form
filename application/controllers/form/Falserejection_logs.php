<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Falserejection_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('falserejection_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_falserejection';
		$data['logs'] = $this->falserejection_log_model->get_all_logs();
		$this->load->view('form/falserejection/logs', $data);
	}
}
