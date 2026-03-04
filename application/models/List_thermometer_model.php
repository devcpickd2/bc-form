<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;

class List_thermometer_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'kode_thermometer',
				'label' => 'Kode Thermometer',
				'rules' => 'required'
			],
			[
				'field' => 'model',
				'label' => 'Model',
				'rules' => 'required'
			],
			[
				'field' => 'area',
				'label' => 'Area',
				'rules' => 'required'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$kode_thermometer = $this->input->post('kode_thermometer');
		$model = $this->input->post('model');
		$area = $this->input->post('area');
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant'); 

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'kode_thermometer' => $kode_thermometer,
			'area' => $area,
			'model' => $model,
			'plant' => $plant
		);
		
		$this->db->insert('list_thermometer', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$kode_thermometer = $this->input->post('kode_thermometer');
		$model = $this->input->post('model');
		$area = $this->input->post('area');

		$data = array(
			'kode_thermometer' => $kode_thermometer,
			'area' => $area,
			'model' => $model,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('list_thermometer', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$plant = $this->session->userdata('plant');

		$this->db->where('plant', $plant);
		$this->db->order_by('created_at', 'DESC');

		return $this->db->get('list_thermometer')->result();
	}

	public function get_by_uuid($uuid)
	{
		$plant = $this->session->userdata('plant');

		return $this->db
		->where('uuid', $uuid)
		->where('plant', $plant)
		->get('list_thermometer')
		->row();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('list_thermometer');
	}

	public function get_by_plant()
	{
		$plant = $this->session->userdata('plant');

		return $this->db
		->where('plant', $plant)
		->order_by('kode_thermometer', 'ASC')
		->get('list_thermometer')
		->result();
	}
}