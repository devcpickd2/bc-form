<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Larutan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('larutan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_larutan';
		$data['logs'] = $this->larutan_log_model->get_all_logs();
		$this->load->view('form/larutan/logs', $data);
	}
}
