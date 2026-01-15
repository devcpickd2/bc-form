<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loading_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('loading_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_loading';
		$data['logs'] = $this->loading_log_model->get_all_logs();
		$this->load->view('form/loading/logs', $data);
	}
}
