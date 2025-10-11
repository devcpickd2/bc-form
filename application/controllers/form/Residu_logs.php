<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Residu_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('residu_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_residu';
		$data['logs'] = $this->residu_log_model->get_all_logs();
		$this->load->view('form/residu/logs', $data);
	}
}
