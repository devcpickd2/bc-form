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
				'field' => 'keterangan',
				'label' => 'Notes'
				// 'rules' => 'required'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$date_metal = $this->input->post('date_metal');
		$shift = $this->input->post('shift');
		$time = $this->input->post('time');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$no_program = $this->input->post('no_program');
		$std_fe = $this->input->post('std_fe');
		$std_nonfe = $this->input->post('std_nonfe');
		$std_sus304 = $this->input->post('std_sus304');
		$keterangan = $this->input->post('keterangan');
		$status_produksi = "0";
		$status_spv = "0";
		$status_produksi_false = "0";
		$status_spv_false = "0";

		$data = array(
			'uuid' => $uuid,
			'username_1' => $username,
			'date_metal' => $date_metal,
			'shift' => $shift,
			'time' => $time,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'no_program' => $no_program,
			'std_fe' => $std_fe,
			'std_nonfe' => $std_nonfe,
			'std_sus304' => $std_sus304,
			'keterangan' => $keterangan,
			'status_produksi' => $status_produksi,
			'status_spv' => $status_spv,
			'status_produksi_false' => $status_produksi_false,
			'status_spv_false' => $status_spv_false
		);

		$this->db->insert('metal', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_update()
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
				'field' => 'keterangan',
				'label' => 'Notes'
				// 'rules' => 'required'
			]
		];
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
		$std_fe = $this->input->post('std_fe');
		$std_nonfe = $this->input->post('std_nonfe');
		$std_sus304 = $this->input->post('std_sus304');
		$keterangan = $this->input->post('keterangan');

		$data = array(
			'username_1' => $username,
			'date_metal' => $date_metal,
			'shift' => $shift,
			'time' => $time,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'no_program' => $no_program,
			'std_fe' => $std_fe,
			'std_nonfe' => $std_nonfe,
			'std_sus304' => $std_sus304,
			'keterangan' => $keterangan,

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
		$this->db->select('nama_spv_metal, tgl_update_spv_metal, date_metal, shift, username_1, username_2');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv_metal', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('metal');

		$data_metal = $query->row();  
		return $data_metal; 
	}


}