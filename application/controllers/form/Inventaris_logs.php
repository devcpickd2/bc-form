<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inventaris_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('inventaris_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_inventaris';
		$data['logs'] = $this->inventaris_log_model->get_all_logs();
		$this->load->view('form/inventaris/logs', $data);
	}
}
