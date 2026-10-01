<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produksi_baru extends MY_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('auth_model');
		$this->load->model('produksi_baru_model');
		if(!$this->auth_model->current_user()){
			redirect('login');
		}
	}

	public function index()
	{
		$data = array(
			'produksi_baru' => $this->produksi_baru_model->get_data_by_plant()
		);

		$this->active_nav = 'produksi_baru'; 
		$this->render('produksi/produksi_baru', $data);
	}

	public function tambah()
	{
		$rules = $this->produksi_baru_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			$insert = $this->produksi_baru_model->insert();
			if ($insert) {
				$this->session->set_flashdata('success_msg', 'Data Produksi Baru berhasil di simpan');
				redirect('produksi_baru');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Produksi Baru gagal di simpan');
				redirect('produksi_baru');
			}
		}

		$this->active_nav = 'produksi_baru'; 
		$this->render('produksi/produksi_baru-tambah');
	}

	public function edit($uuid)
	{
		$rules = $this->produksi_baru_model->rules();
		$this->form_validation->set_rules($rules);

		if ($this->form_validation->run() == TRUE) {
			
			$update = $this->produksi_baru_model->update($uuid);
			if ($update) {
				$this->session->set_flashdata('success_msg', 'Data Produksi Baru berhasil di Update');
				redirect('produksi_baru');
			}else {
				$this->session->set_flashdata('error_msg', 'Data Produksi Baru gagal di Update');
				redirect('produksi_baru');
			}
		}

		$data = array(
			'produksi_baru' => $this->produksi_baru_model->get_by_uuid($uuid)
		);

		$this->active_nav = 'produksi_baru'; 
		$this->render('produksi/produksi_baru-edit', $data);
	}

	public function delete($uuid)
	{
		if (!$uuid) {
			$this->session->set_flashdata('error_msg', 'ID tidak ditemukan.');
			redirect('produksi_baru');
		}

		$deleted = $this->produksi_baru_model->delete_by_uuid($uuid);

		if ($deleted) {
			$this->session->set_flashdata('success_msg', 'Data Produksi Baru berhasil dihapus.');
		} else {
			$this->session->set_flashdata('error_msg', 'Gagal menghapus data.');
		}

		redirect('produksi_baru');
	}
}
