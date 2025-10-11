<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebersihanmesin_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kebersihanmesin_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kebersihanmesin';
		$data['logs'] = $this->kebersihanmesin_log_model->get_all_logs();
		$this->load->view('form/kebersihanmesin/logs', $data);
	}
}
