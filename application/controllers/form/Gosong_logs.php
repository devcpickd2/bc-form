<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gosong_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('gosong_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_gosong';
		$data['logs'] = $this->gosong_log_model->get_all_logs();
		$this->load->view('form/gosong/logs', $data);
	}
}
