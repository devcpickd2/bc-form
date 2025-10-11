<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kondisikerja_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kondisikerja_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kondisikerja';
		$data['logs'] = $this->kondisikerja_log_model->get_all_logs();
		$this->load->view('form/kondisikerja/logs', $data);
	}
}
