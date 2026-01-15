<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sanitasiwarehouse_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('sanitasiwarehouse_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_sanitasiwarehouse';
		$data['logs'] = $this->sanitasiwarehouse_log_model->get_all_logs();
		$this->load->view('form/sanitasiwarehouse/logs', $data);
	}
}
