<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('proses_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_proses';
		$data['logs'] = $this->proses_log_model->get_all_logs();
		$this->load->view('form/proses/logs', $data);
	}
}
