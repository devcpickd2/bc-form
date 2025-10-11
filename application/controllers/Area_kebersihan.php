<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_kebersihan extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('area_kebersihan_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'area_kebersihan' => $this->area_kebersihan_model->get_data_by_plant(),
			'active_nav' => 'area_kebersihan', 
		);

		$this->load->view('partials/head', $data);
		$this->load->view('area_kebersihan/area_kebersihan', $data);
		$this->load->view('partials/footer');
	}

	public function tambah()
	{

		$rules = $this->area_kebersihan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->area_kebersihan_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Area Kebersihan berhasil di simpan');
				redirect('area_kebersihan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Area Kebersihan gagal di simpan');
				redirect('area_kebersihan');
			}
		}

		$data = array(
			'active_nav' => 'area_kebersihan');

		$this->load->view('partials/head', $data);
		$this->load->view('area_kebersihan/area_kebersihan-tambah');
		$this->load->view('partials/footer');
	}


	public function edit($uuid)
	{
		$rules = $this->area_kebersihan_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->area_kebersihan_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Area Kebersihan berhasil di Update');
				redirect('area_kebersihan');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Area Kebersihan gagal di Update');
				redirect('area_kebersihan');
			}
		}

		$data = array('area_kebersihan' => $this->area_kebersihan_model->get_by_uuid($uuid),
			'active_nav' => 'area_kebersihan');

		$this->load->view('partials/head', $data);
		$this->load->view('area_kebersihan/area_kebersihan-edit', $data);
		$this->load->view('partials/footer');
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('area_kebersihan');
		}

		$deleted = $this->area_kebersihan_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('area_kebersihan');
	}
}
