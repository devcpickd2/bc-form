<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Area_kebersihan_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'area',
				'label' => 'Name of Things',
				'rules' => 'required'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$area = $this->input->post('area');
		$plant = $this->session->userdata('plant');
		$username = $this->session->userdata('username');

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'area' => $area,
			'plant' => $plant
		);

		$this->db->insert('area_kebersihan', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$area = $this->input->post('area');

		$data = array(
			'area' => $area,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('area_kebersihan', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC'); 
		$data = $this->db->get('area_kebersihan')->result();
		return $data;
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('area_kebersihan', ['plant' => $plant])->result();
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('area_kebersihan', array('uuid' => $uuid))->row();
		return $data;
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('area_kebersihan');
	}
}