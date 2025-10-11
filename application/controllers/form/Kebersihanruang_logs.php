<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kebersihanruang_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kebersihanruang_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kebersihanruang';
		$data['logs'] = $this->kebersihanruang_log_model->get_all_logs();
		$this->load->view('form/kebersihanruang/logs', $data);
	}
}
