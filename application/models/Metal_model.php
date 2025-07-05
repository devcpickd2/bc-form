<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Metal_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'date_metal',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'shift',
				'label' => 'Shift',
				'rules' => 'required'
			], 
			[
				'field' => 'time',
				'label' => 'Time',
				'rules' => 'required'
			], 
			[
				'field' => 'nama_produk',
				'label' => 'Produk Name',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Product Code',
				'rules' => 'required'
			],
			[
				'field' => 'no_program',
				'label' => 'Program Number',
				'rules' => 'required'
			],
			[
				'field' => 'deteksi_ng',
				'label' => 'NG Detection',
				'rules' => 'required'
			],
			[
				'field' => 'std_fe',
				'label' => 'STD Fe',
				'rules' => 'required'
			],
			[
				'field' => 'std_nonfe',
				'label' => 'STD Non Fe',
				'rules' => 'required'
			],
			[
				'field' => 'std_sus304',
				'label' => 'STD SUS 304',
				'rules' => 'required'
			],
			[
				'field' => 'fe_d',
				'label' => 'First'
			],
			[
				'field' => 'nonfe_d',
				'label' => 'First'
			],
			[
				'field' => 'sus_d',
				'label' => 'Last'
			],
			[
				'field' => 'keterangan',
				'label' => 'Notes'
			],
			[
				'field' => 'catatan_metal',
				'label' => 'Notes'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date_metal = $this->input->post('date_metal');
		$shift = $this->input->post('shift');
		$time = $this->input->post('time');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$no_program = $this->input->post('no_program');
		$deteksi_ng = $this->input->post('deteksi_ng');
		$std_fe = $this->input->post('std_fe');
		$std_nonfe = $this->input->post('std_nonfe');
		$std_sus304 = $this->input->post('std_sus304');
		$fe_d = $this->input->post('fe_d');
		$nonfe_d = $this->input->post('nonfe_d');
		$sus_d = $this->input->post('sus_d');
		$keterangan = $this->input->post('keterangan');
		$catatan_metal = $this->input->post('catatan_metal');
		$status_produksi = "0";
		$status_spv = "0";
		$status_produksi_false = "0";
		$status_spv_false = "0";

		$data = array(
			'uuid' => $uuid,
			'username_1' => $username,
			'plant' => $plant,
			'date_metal' => $date_metal,
			'shift' => $shift,
			'time' => $time,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'no_program' => $no_program,
			'deteksi_ng' => $deteksi_ng,
			'std_fe' => $std_fe,
			'std_nonfe' => $std_nonfe,
			'std_sus304' => $std_sus304,
			'fe_d' => $fe_d,
			'nonfe_d' => $nonfe_d,
			'sus_d' => $sus_d,
			'keterangan' => $keterangan,
			'catatan_metal' => $catatan_metal,
			'status_produksi' => $status_produksi,
			'status_spv' => $status_spv,
			'status_produksi_false' => $status_produksi_false,
			'status_spv_false' => $status_spv_false
		);

		$this->db->insert('metal', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{
		$username= $this->session->userdata('username');
		$date_metal = $this->input->post('date_metal');
		$shift = $this->input->post('shift');
		$time = $this->input->post('time');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$no_program = $this->input->post('no_program');
		$deteksi_ng = $this->input->post('deteksi_ng');
		$std_fe = $this->input->post('std_fe');
		$std_nonfe = $this->input->post('std_nonfe');
		$std_sus304 = $this->input->post('std_sus304');
		$fe_d = $this->input->post('fe_d');
		$nonfe_d = $this->input->post('nonfe_d');
		$sus_d = $this->input->post('sus_d');
		$keterangan = $this->input->post('keterangan');
		$catatan_metal = $this->input->post('catatan_metal');

		$data = array(
			'username_1' => $username,
			'date_metal' => $date_metal,
			'shift' => $shift,
			'time' => $time,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'no_program' => $no_program,
			'deteksi_ng' => $deteksi_ng,
			'std_fe' => $std_fe,
			'std_nonfe' => $std_nonfe,
			'std_sus304' => $std_sus304,
			'fe_d' => $fe_d,
			'nonfe_d' => $nonfe_d,
			'sus_d' => $sus_d,
			'keterangan' => $keterangan,
			'catatan_metal' => $catatan_metal,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('metal', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_update2()
	{
		return[
			[
				'field' => 'deteksi_ng',
				'label' => 'Detection NG',
				'rules' => 'required'
			],
			[
				'field' => 'fe_t',
				'label' => 'FE Middle'
			],
			[
				'field' => 'nonfe_t',
				'label' => 'Non FE Middle'
			],
			[
				'field' => 'sus_t',
				'label' => 'SUS Middle'
			]
			
		];
	}


	public function update2($uuid)
	{
		$username= $this->session->userdata('username');
		$deteksi_ng = $this->input->post('deteksi_ng');
		$fe_t = $this->input->post('fe_t');
		$nonfe_t = $this->input->post('nonfe_t');
		$sus_t = $this->input->post('sus_t');

		$data = array(
			'username_1' => $username,
			'deteksi_ng' => $deteksi_ng,
			'fe_t' => $fe_t,
			'nonfe_t' => $nonfe_t,
			'sus_t' => $sus_t,
			'update_time_t' => date("Y-m-d H:i:s"),

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('metal', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_update3()
	{
		return[
			[
				'field' => 'deteksi_ng',
				'label' => 'Detection NG',
				'rules' => 'required'
			],
			[
				'field' => 'fe_b',
				'label' => 'FE Middle'
			],
			[
				'field' => 'nonfe_b',
				'label' => 'Non FE Middle'
			],
			[
				'field' => 'sus_b',
				'label' => 'SUS Middle'
			]
			
		];
	}

	public function update3($uuid)
	{
		$username= $this->session->userdata('username');
		$deteksi_ng = $this->input->post('deteksi_ng');
		$fe_b = $this->input->post('fe_b');
		$nonfe_b = $this->input->post('nonfe_b');
		$sus_b = $this->input->post('sus_b');

		$data = array(
			'username_1' => $username,
			'deteksi_ng' => $deteksi_ng,
			'fe_b' => $fe_b,
			'nonfe_b' => $nonfe_b,
			'sus_b' => $sus_b,
			'update_time_b' => date("Y-m-d H:i:s"),

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('metal', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}
	public function rules_verifikasi()
	{
		return[
			[
				'field' => 'status_spv',
				'label' => 'Date',
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
			'nama_spv_metal' => $nama_spv,
			'status_spv' => $status_spv,
			'catatan_spv' => $catatan_spv,
			'tgl_update_spv_metal' => date("Y-m-d H:i:s")
		);

		$this->db->update('metal', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_diketahui()
	{
		return[
			[
				'field' => 'status_produksi',
				'label' => 'Status',
				'rules' => 'required'
			],
			[
				'field' => 'catatan_produksi',
				'label' => 'Notes'
			]
			
		];
	}


	public function diketahui_update($uuid)
	{

		$nama_produksi = $this->session->userdata('username');
		$status_produksi = $this->input->post('status_produksi');
		$catatan_produksi = $this->input->post('catatan_produksi');

		$data = array(
			'nama_produksi_metal' => $nama_produksi,
			'status_produksi' => $status_produksi,
			'catatan_produksi' => $catatan_produksi,
			'tgl_update_produksi_metal' => date("Y-m-d H:i:s")
		);

		$this->db->update('metal', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('metal')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('metal', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_metal($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('metal');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_metal_verif($uuid_array)
	{
		$this->db->select('nama_spv_metal, tgl_update_spv_metal, date_metal, shift, username_1, username_2, std_fe,std_nonfe,std_sus304, nama_produksi_metal, status_spv, nama_produksi_metal, tgl_update_produksi_metal');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv_metal', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('metal');

		$data_metal = $query->row();  
		return $data_metal; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('metal', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('metal');
	}
}