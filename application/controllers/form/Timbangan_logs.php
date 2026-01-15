<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Timbangan_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('timbangan_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_timbangan';
		$data['logs'] = $this->timbangan_log_model->get_all_logs();
		$this->load->view('form/timbangan/logs', $data);
	}
}
