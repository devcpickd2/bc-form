<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Residu_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'area',
				'label' => 'Area',
				'rules' => 'required'
			], 
			[
				'field' => 'titik_sampling',
				'label' => 'Point Sampler',
				'rules' => 'required'
			], 
			[
				'field' => 'standar',
				'label' => 'Standart',
				'rules' => 'required'
			],
			[
				'field' => 'hasil_pemeriksaan',
				'label' => 'Result',
				'rules' => 'required'
			],
			[
				'field' => 'keterangan',
				'label' => 'Notes'
			],
			[
				'field' => 'tindakan',
				'label' => 'Corrective Action'
			],
			[
				'field' => 'verifikasi',
				'label' => 'Verification'
			],
			[
				'field' => 'catatan',
				'label' => 'Notes',
			]
			
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();

		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$area = $this->input->post('area');
		$titik_sampling = $this->input->post('titik_sampling');
		$standar = $this->input->post('standar');
		$hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
		$keterangan = $this->input->post('keterangan');
		$tindakan = $this->input->post('tindakan');
		$verifikasi = $this->input->post('verifikasi');
		$catatan = $this->input->post('catatan');
		$status_spv = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,	
			'plant' => $plant,
			'date' => $date,
			'area' => $area,
			'titik_sampling' => $titik_sampling,
			'standar' => $standar,
			'hasil_pemeriksaan' => $hasil_pemeriksaan,
			'keterangan' => $keterangan,
			'tindakan' => $tindakan,
			'verifikasi' => $verifikasi,
			'catatan' => $catatan,
			'status_spv' => $status_spv
		);

		$this->db->insert('residu', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$area = $this->input->post('area');
		$titik_sampling = $this->input->post('titik_sampling');
		$standar = $this->input->post('standar');
		$hasil_pemeriksaan = $this->input->post('hasil_pemeriksaan');
		$keterangan = $this->input->post('keterangan');
		$tindakan = $this->input->post('tindakan');
		$verifikasi = $this->input->post('verifikasi');
		$catatan = $this->input->post('catatan');

		$data = array(
			'username' => $username,
			'date' => $date,
			'area' => $area,
			'titik_sampling' => $titik_sampling,
			'standar' => $standar,
			'hasil_pemeriksaan' => $hasil_pemeriksaan,
			'keterangan' => $keterangan,
			'tindakan' => $tindakan,
			'verifikasi' => $verifikasi,
			'catatan' => $catatan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('residu', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}


	public function rules_verifikasi()
	{
		return[
			[
				'field' => 'status_spv',
				'label' => 'Status',
				'rules' => 'required'
			],
			[
				'field' => 'catatan_spv',
				'label' => 'Notes'
			]
			
		];
	}


	public function verifikasi_update($uuid)
	{

		$nama_spv = $this->session->userdata('username');
		$status_spv = $this->input->post('status_spv');
		$catatan_spv = $this->input->post('catatan_spv');

		$data = array(
			'nama_spv' => $nama_spv,
			'status_spv' => $status_spv,
			'catatan_spv' => $catatan_spv,
			'tgl_update_spv' => date("Y-m-d H:i:s")
		);

		$this->db->update('residu', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('residu')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('residu', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_residu($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('residu');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_residu_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update, date');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('residu');

		$data_residu = $query->row();  
		return $data_residu; 
	}

	public function get_residu_by_month($start, $end)
	{
		$this->db->where('date >=', $start);
		$this->db->where('date <=', $end);
		$this->db->order_by('date', 'ASC'); 
		return $this->db->get('residu')->result();
	}

	public function get_one_verified_by_month($start, $end)
	{
		$this->db->where('date >=', $start);
		$this->db->where('date <=', $end);
		$this->db->where('status_spv', 1);
		$this->db->limit(1);
		return $this->db->get('residu')->row();
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('residu', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('residu');
	}
}