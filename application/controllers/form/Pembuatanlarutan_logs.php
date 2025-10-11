<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembuatanlarutan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pembuatanlarutan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pembuatanlarutan';
		$data['logs'] = $this->pembuatanlarutan_log_model->get_all_logs();
		$this->load->view('form/pembuatanlarutan/logs', $data);
	}
}
