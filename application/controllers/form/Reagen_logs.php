<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reagen_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('reagen_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_reagen';
		$data['logs'] = $this->reagen_log_model->get_all_logs();
		$this->load->view('form/reagen/logs', $data);
	}
}
