<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sensori_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('sensori_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_sensori';
		$data['logs'] = $this->sensori_log_model->get_all_logs();
		$this->load->view('form/sensori/logs', $data);
	}
}
