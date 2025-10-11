<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('disposisi_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_disposisi';
		$data['logs'] = $this->disposisi_log_model->get_all_logs();
		$this->load->view('form/disposisi/logs', $data);
	}
}
