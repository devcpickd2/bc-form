<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Metal_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('metal_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_metal';
		$data['logs'] = $this->metal_log_model->get_all_logs();
		$this->load->view('form/metal/logs', $data);
	}
}
