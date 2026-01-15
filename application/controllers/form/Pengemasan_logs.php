<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengemasan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('pengemasan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_pengemasan';
		$data['logs'] = $this->pengemasan_log_model->get_all_logs();
		$this->load->view('form/pengemasan/logs', $data);
	}
}
