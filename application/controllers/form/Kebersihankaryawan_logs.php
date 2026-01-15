<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebersihankaryawan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kebersihankaryawan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kebersihankaryawan';
		$data['logs'] = $this->kebersihankaryawan_log_model->get_all_logs();
		$this->load->view('form/kebersihankaryawan/logs', $data);
	}
}
