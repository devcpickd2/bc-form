<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Releasepacking_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('releasepacking_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_releasepacking';
		$data['logs'] = $this->releasepacking_log_model->get_all_logs();
		$this->load->view('form/releasepacking/logs', $data);
	}
}
