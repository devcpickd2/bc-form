<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Material_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'material',
				'label' => 'Name of Material',
				'rules' => 'required'
			],
			[
				'field' => 'berat',
				'label' => 'Weight of Material',
				'rules' => 'required'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$material = $this->input->post('material');
		$berat = $this->input->post('berat');
		$username = $this->session->userdata('username');

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'material' => $material,
			'berat' => $berat
		);

		$this->db->insert('material', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$material = $this->input->post('material');
		$berat = $this->input->post('berat');

		$data = array(
			'material' => $material,
			'berat' => $berat,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('material', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC'); 
		$data = $this->db->get('material')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('material', array('uuid' => $uuid))->row();
		return $data;
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('material');
	}
}