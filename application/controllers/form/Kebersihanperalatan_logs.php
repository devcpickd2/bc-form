<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebersihanperalatan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kebersihanperalatan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kebersihanperalatan';
		$data['logs'] = $this->kebersihanperalatan_log_model->get_all_logs();
		$this->load->view('form/kebersihanperalatan/logs', $data);
	}
}
