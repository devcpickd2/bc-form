<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Alatqc_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'nama_alat',
				'label' => 'Name of Things',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah',
				'label' => 'Amount',
				'rules' => 'required'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$nama_alat = $this->input->post('nama_alat');
		$jumlah = $this->input->post('jumlah');
		$username = $this->session->userdata('username');

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'nama_alat' => $nama_alat,
			'jumlah' => $jumlah
		);

		$this->db->insert('alat', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$nama_alat = $this->input->post('nama_alat');
		$jumlah = $this->input->post('jumlah');

		$data = array(
			'nama_alat' => $nama_alat,
			'jumlah' => $jumlah,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('alat', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC'); 
		$data = $this->db->get('alat')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('alat', array('uuid' => $uuid))->row();
		return $data;
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('alat');
	}
}