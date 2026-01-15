<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitasi_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('sanitasi_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_sanitasi';
		$data['logs'] = $this->sanitasi_log_model->get_all_logs();
		$this->load->view('form/sanitasi/logs', $data);
	}
}
