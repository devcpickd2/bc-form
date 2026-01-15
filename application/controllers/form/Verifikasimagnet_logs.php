<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasimagnet_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('verifikasimagnet_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_verifikasimagnet';
		$data['logs'] = $this->verifikasimagnet_log_model->get_all_logs();
		$this->load->view('form/verifikasimagnet/logs', $data);
	}
}
