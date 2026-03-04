<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_timbangan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('list_timbangan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'list_timbangan' => $this->list_timbangan_model->get_all()
		);

		$this->active_nav = 'list_timbangan'; 
		$this->render('list_timbangan/list_timbangan', $data);
	}

	public function tambah()
	{
		$rules = $this->list_timbangan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->list_timbangan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data List Timbangan berhasil di simpan');
				redirect('list_timbangan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data List Timbangan gagal di simpan');
				redirect('list_timbangan');
			}
		}

		$this->active_nav = 'list_timbangan'; 
		$this->render('list_timbangan/list_timbangan-tambah');
	}

	public function edit($uuid)
	{
		$rules = $this->list_timbangan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->list_timbangan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data List Timbangan berhasil di Update');
				redirect('list_timbangan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data List Timbangan gagal di Update');
				redirect('list_timbangan');
			}
		}

		$data = array(
			'list_timbangan' => $this->list_timbangan_model->get_by_uuid($uuid)
		);

		$this->active_nav = 'list_timbangan'; 
		$this->render('list_timbangan/list_timbangan-edit', $data);
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('list_timbangan');
		}

		$deleted = $this->list_timbangan_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data List Timbangan berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal List Timbangan menghapus data.');
		}

		redirect('list_timbangan');
	}
}
