<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magnettrap_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('magnettrap_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_magnettrap';
		$data['logs'] = $this->magnettrap_log_model->get_all_logs();
		$this->load->view('form/magnettrap/logs', $data);
	}
}
