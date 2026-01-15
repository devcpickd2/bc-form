<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontaminasi_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kontaminasi_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kontaminasi';
		$data['logs'] = $this->kontaminasi_log_model->get_all_logs();
		$this->load->view('form/kontaminasi/logs', $data);
	}
}
