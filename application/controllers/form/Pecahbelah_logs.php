<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pecahbelah_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pecahbelah_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pecahbelah';
		$data['logs'] = $this->pecahbelah_log_model->get_all_logs();
		$this->load->view('form/pecahbelah/logs', $data);
	}
}
