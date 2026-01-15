<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('produksi_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_produksi';
		$data['logs'] = $this->produksi_log_model->get_all_logs();
		$this->load->view('form/produksi/logs', $data);
	}
}
