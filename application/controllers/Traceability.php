<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Traceability extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->library('TraceabilityService');
		$this->load->model('auth_model');

		if (!$this->auth_model->current_user()) {
			redirect('login');
		}
	}

	public function index()
	{
		$data = [
			'results' => [],
			'production_code' => '',
			'date' => ''
		];

		$this->active_nav = 'traceability';

		$data['page_title'] = 'Traceability';

		$this->render('traceability/index', $data);
	}

	public function search()
	{
		$production_code = trim(
			(string) $this->input->get('production_code', TRUE)
		);

		$date = $this->input->get('date', TRUE);

		if ($production_code === '' && empty($date)) {

			$this->session->set_flashdata(
				'error_msg',
				'Masukkan kode produksi, nama produk, atau pilih tanggal.'
			);

			redirect('traceability');

			return;
		}

		/*
		|--------------------------------------------------------------------------
		| PAGINATION
		|--------------------------------------------------------------------------
		*/

		$limit = (int) $this->input->get('limit', TRUE);
		$offset = (int) $this->input->get('offset', TRUE);

		$limit = $limit > 0 ? min($limit, 100) : 20;
		$offset = $offset >= 0 ? $offset : 0;

		$results = $this->traceabilityservice
			->traceByBatch(
				$production_code,
				$date,
				$limit,
				$offset
			);

		$data = [
			'results' => $results,
			'production_code' => $production_code,
			'date' => $date,
			'limit' => $limit,
			'offset' => $offset,
			'page_title' => 'Traceability'
		];

		$this->active_nav = 'traceability';

		$this->render('traceability/index', $data);
	}

	public function form_details()
	{
		$module = $this->input->get('module', TRUE);
		$form_key = $this->input->get('form_key', TRUE);
		$search = $this->input->get('search', TRUE);
		$date = $this->input->get('date', TRUE);

		if (!$module || !$form_key) {

			return $this->output
				->set_status_header(422)
				->set_content_type('application/json')
				->set_output(json_encode([
					'error' => 'Parameter tidak lengkap.'
				]));
		}

		$data = $this->traceabilityservice
			->getFormDetails(
				$module,
				$form_key,
				$search,
				$date
			);

		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode($data));
	}

	public function load_more()
	{
		$production_code = trim(
			(string) $this->input->get('production_code', TRUE)
		);

		$date = $this->input->get('date', TRUE);

		$limit = (int) $this->input->get('limit', TRUE);
		$offset = (int) $this->input->get('offset', TRUE);

		$limit = $limit > 0 ? min($limit, 100) : 20;
		$offset = $offset >= 0 ? $offset : 0;

		if ($production_code === '' && empty($date)) {

			return $this->output
				->set_status_header(422)
				->set_content_type('application/json')
				->set_output(json_encode([
					'success' => false,
					'message' => 'Parameter pencarian tidak lengkap.'
				]));
		}

		$results = $this->traceabilityservice
			->traceByBatch(
				$production_code,
				$date,
				$limit,
				$offset
			);

		return $this->output
			->set_content_type('application/json')
			->set_output(json_encode([
				'success' => true,
				'results' => $results,
				'limit' => $limit,
				'offset' => $offset
			]));
	}
}
