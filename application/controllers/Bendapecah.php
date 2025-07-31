<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bendapecah extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('bendapecah_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'bendapecah' => $this->bendapecah_model->get_all(),
			'active_nav' => 'bendapecah', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('bendapecah/bendapecah', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->bendapecah_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->bendapecah_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Daftar Benda Pecah Belah berhasil di simpan');
				redirect('bendapecah');
			}else {
				$this->session->set_flashdata('error_msg', 'Daftar Benda Pecah Belah gagal di simpan');
				redirect('bendapecah');
			}
		}

		$data = array(
			'active_nav' => 'bendapecah');

		$this->load->view('partials/head', $data);
		$this->load->view('bendapecah/bendapecah-tambah');
		$this->load->view('partials/footer');
	}

	// public function tambah()
	// {
	// 	$rules = $this->bendapecah_model->rules();
	// 	$this->form_validation->set_rules($rules);

	// 	$data = array(
	// 		'active_nav' => 'bendapecah',
	// 		'form_values' => array() 
	// 	);

	// 	if ($this->form_validation->run() == TRUE) {
	// 		$insert = $this->bendapecah_model->insert();
	// 		if ($insert) {
	// 			$data['success_msg'] = 'Daftar Benda Pecah Belah berhasil disimpan';
	// 			$data['form_values'] = array(); 
	// 		} else {
	// 			$data['error_msg'] = 'Daftar Benda Pecah Belah gagal disimpan';
	// 			$data['form_values'] = $this->input->post(NULL, TRUE);
	// 		}
	// 	} else {
	// 		$data['form_values'] = $this->input->post(NULL, TRUE);
	// 	}

	// 	$this->load->view('partials/head', $data);
	// 	$this->load->view('bendapecah/bendapecah-tambah', $data);
	// 	$this->load->view('partials/footer');
	// }

	public function edit($uuid)
	{
		$rules = $this->bendapecah_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->bendapecah_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Daftar Benda Pecah Belah berhasil di Update');
				redirect('bendapecah');
			}else {
				$this->session->set_flashdata('error_msg', 'Daftar Benda Pecah Belah gagal di Update');
				redirect('bendapecah');
			}
		}

		$data = array('bendapecah' => $this->bendapecah_model->get_by_uuid($uuid),
			'active_nav' => 'bendapecah');

		$this->load->view('partials/head', $data);
		$this->load->view('bendapecah/bendapecah-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('bendapecah');
		}

		$deleted = $this->bendapecah_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('bendapecah');
	}
}
