<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Bendapecah_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'nama_benda',
				'label' => 'Name of Things',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah',
				'label' => 'Amount'
			],
			[
				'field' => 'pemilik',
				'label' => 'Owners'
			],
			[
				'field' => 'area',
				'label' => 'Area'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$nama_benda = $this->input->post('nama_benda');
		$jumlah = $this->input->post('jumlah');
		$pemilik = $this->input->post('pemilik');
		$area = $this->input->post('area');
		$username = $this->session->userdata('username');

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'nama_benda' => $nama_benda,
			'pemilik' => $pemilik,
			'area' => $area,
			'jumlah' => $jumlah
		);

		$this->db->insert('benda', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{
		$nama_benda = $this->input->post('nama_benda');
		$jumlah = $this->input->post('jumlah');
		$pemilik = $this->input->post('pemilik');
		$area = $this->input->post('area');

		$data = array(
			'nama_benda' => $nama_benda,
			'jumlah' => $jumlah,
			'pemilik' => $pemilik,
			'area' => $area,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('benda', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC'); 
		$data = $this->db->get('benda')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('benda', array('uuid' => $uuid))->row();
		return $data;
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('benda');
	}

	public function get_all_benda()
	{
		return $this->db->get('benda')->result();
	}

}