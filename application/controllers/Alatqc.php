<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alatqc extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('alatqc_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'alatqc' => $this->alatqc_model->get_all()
		);

		$this->active_nav = 'alatqc'; 
		$this->render('alatqc/alatqc', $data);
	}

	public function tambah()
	{
		$rules = $this->alatqc_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->alatqc_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Inventaris QC berhasil di simpan');
				redirect('alatqc');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Inventaris QC gagal di simpan');
				redirect('alatqc');
			}
		}

		$this->active_nav = 'alatqc'; 
		$this->render('alatqc/alatqc-tambah');
	}

	public function edit($uuid)
	{
		$rules = $this->alatqc_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->alatqc_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Inventaris QC berhasil di Update');
				redirect('alatqc');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Inventaris QC gagal di Update');
				redirect('alatqc');
			}
		}

		$data = array(
			'alatqc' => $this->alatqc_model->get_by_uuid($uuid)
		);

		$this->active_nav = 'alatqc'; 
		$this->render('alatqc/alatqc-edit', $data);
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('alatqc');
		}

		$deleted = $this->alatqc_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('alatqc');
	}
}
