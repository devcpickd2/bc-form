<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;

class Produksi_baru_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'bulan',
				'label' => 'Month',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah_hari',
				'label' => 'Number of Days',
				'rules' => 'required'
			],
			[
				'field' => 'tonase_produksi',
				'label' => 'Production Tonnage',
				'rules' => 'required'
			],
			[
				'field' => 'hk_produksi',
				'label' => 'Production Working Days',
				'rules' => 'required'
			],
			[
				'field' => 'keterangan',
				'label' => 'Notes'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$bulan = $this->input->post('bulan') . '-01';
		$jumlah_hari = $this->input->post('jumlah_hari');
		$tonase_produksi = $this->input->post('tonase_produksi');
		$hk_produksi = $this->input->post('hk_produksi');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'bulan' => $bulan,
			'jumlah_hari' => $jumlah_hari,
			'tonase_produksi' => $tonase_produksi,
			'hk_produksi' => $hk_produksi,
			'plant' => $this->session->userdata('plant'),
			'keterangan' => $keterangan,
		);

		$this->db->insert('produksi_baru', $data);
		return($this->db->affected_rows() > 0) ? true :false;
	}

	public function update($uuid)
	{
		$bulan = $this->input->post('bulan') . '-01';
		$jumlah_hari = $this->input->post('jumlah_hari');
		$tonase_produksi = $this->input->post('tonase_produksi');
		$hk_produksi = $this->input->post('hk_produksi');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'bulan' => $bulan,
			'jumlah_hari' => $jumlah_hari,
			'tonase_produksi' => $tonase_produksi,
			'hk_produksi' => $hk_produksi,
			'keterangan' => $keterangan,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('produksi_baru', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC'); 
		$data = $this->db->get('produksi_baru')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('produksi_baru', array('uuid' => $uuid))->row();
		return $data;
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('produksi_baru');
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('produksi_baru', ['plant' => $plant])->result();
	}

}