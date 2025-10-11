<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kekuatanmagnet_logs extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->model('kekuatanmagnet_log_model'); 
		$this->load->helper('url');
	}

	public function index()
	{
		$data['active_nav'] = 'logs_kekuatanmagnet';
		$data['logs'] = $this->kekuatanmagnet_log_model->get_all_logs();
		$this->load->view('form/kekuatanmagnet/logs', $data);
	}
}
