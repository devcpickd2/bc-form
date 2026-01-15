<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penerimaankemasan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('penerimaankemasan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_penerimaankemasan';
		$data['logs'] = $this->penerimaankemasan_log_model->get_all_logs();
		$this->load->view('form/penerimaankemasan/logs', $data);
	}
}
