<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Thermometer_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('thermometer_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_thermometer';
		$data['logs'] = $this->thermometer_log_model->get_all_logs();
		$this->load->view('form/thermometer/logs', $data);
	}
}
