<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suhu_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('suhu_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_suhu';
		$data['logs'] = $this->suhu_log_model->get_all_logs();
		$this->load->view('form/suhu/logs', $data);
	}
}
