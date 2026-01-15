<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Analisis_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('analisis_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_analisis';
		$data['logs'] = $this->analisis_log_model->get_all_logs();
		$this->load->view('form/analisis/logs', $data);
	}
}
