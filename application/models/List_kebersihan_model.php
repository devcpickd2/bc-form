<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;

class List_kebersihan_model extends CI_Model {
	
	public function rules()
	{
		return[
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

		$area = $this->input->post('area');
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant'); 

		$bagian = $this->input->post('bagian');
		$bagian_json = json_encode($bagian);

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'area' => $area,
			'plant' => $plant,
			'bagian'   => $bagian_json
		);

		$this->db->insert('list_kebersihan', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{
		$area   = $this->input->post('area');
		$bagian = $this->input->post('bagian');

    // Hapus input kosong
		$bagian = array_filter($bagian);

    // Reset index array
		$bagian = array_values($bagian);

		$data = array(
			'area'        => $area,
			'bagian'      => json_encode($bagian),
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('uuid', $uuid);
		$this->db->update('list_kebersihan', $data);

		return ($this->db->affected_rows() > 0);
	}
	
	public function get_all()
	{
		$plant = $this->session->userdata('plant');

		$this->db->where('plant', $plant);
		$this->db->order_by('created_at', 'DESC');

		return $this->db->get('list_kebersihan')->result();
	}

	public function get_by_uuid($uuid)
	{
		$plant = $this->session->userdata('plant');

		return $this->db
		->where('uuid', $uuid)
		->where('plant', $plant)
		->get('list_kebersihan')
		->row();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('list_kebersihan');
	}
}