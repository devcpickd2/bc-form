<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemusnahan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pemusnahan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pemusnahan';
		$data['logs'] = $this->pemusnahan_log_model->get_all_logs();
		$this->load->view('form/pemusnahan/logs', $data);
	}
}
