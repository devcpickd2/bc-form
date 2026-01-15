<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Material extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('material_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'material' => $this->material_model->get_all()
		);

		$this->active_nav = 'material'; 
		$this->render('material/material', $data);
	}

	public function tambah()
	{
		$rules = $this->material_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->material_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data List Raw Material berhasil di simpan');
				redirect('material');
			}else {
				$this->session->set_flashdata('error_msg', 'Data List Raw Material gagal di simpan');
				redirect('material');
			}
		}

		$this->active_nav = 'material'; 
		$this->render('material/material-tambah');
	}

	public function edit($uuid)
	{
		$rules = $this->material_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->material_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data List Raw Material berhasil di Update');
				redirect('material');
			}else {
				$this->session->set_flashdata('error_msg', 'Data List Raw Material gagal di Update');
				redirect('material');
			}
		}

		$data = array('material' => $this->material_model->get_by_uuid($uuid));

		$this->active_nav = 'material'; 
		$this->render('material/material-edit', $data);
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('material');
		}

		$deleted = $this->material_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('material');
	}
}
