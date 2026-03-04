<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class List_kebersihan extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('list_kebersihan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'list_kebersihan' => $this->list_kebersihan_model->get_all()
		);

		$this->active_nav = 'list_kebersihan'; 
		$this->render('list_kebersihan/list_kebersihan', $data);
	}

	public function tambah()
	{
		$rules = $this->list_kebersihan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->list_kebersihan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data List Kebersihan berhasil di simpan');
				redirect('list_kebersihan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data List Kebersihan gagal di simpan');
				redirect('list_kebersihan');
			}
		}

		$this->active_nav = 'list_kebersihan'; 
		$this->render('list_kebersihan/list_kebersihan-tambah');
	}

	public function edit($uuid)
	{
		$rules = $this->list_kebersihan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {

			$update = $this->list_kebersihan_model->update($uuid);

			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data List Kebersihan berhasil di Update');
			} else {
				$this->session->set_flashdata('error_msg', 'Data List Kebersihan gagal di Update');
			}

			redirect('list_kebersihan');
		}

		$row = $this->list_kebersihan_model->get_by_uuid($uuid);

		if (!$row) {
			show_404();
		}

		$data = array(
			'list_kebersihan' => $row,
        'bagian' => json_decode($row->bagian, true) // WAJIB decode
    );

		$this->active_nav = 'list_kebersihan'; 
		$this->render('list_kebersihan/list_kebersihan-edit', $data);
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('list_kebersihan');
		}

		$deleted = $this->list_kebersihan_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data List Kebersihan berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal List Kebersihan menghapus data.');
		}

		redirect('list_kebersihan');
	}
}
