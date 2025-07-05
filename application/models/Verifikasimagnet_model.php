<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Verifikasimagnet_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'shift',
				'label' => 'Shift',
				'rules' => 'required'
			], 
			[
				'field' => 'nama_produk',
				'label' => 'Product Name',
				'rules' => 'required'
			], 
			[
				'field' => 'kode_produksi',
				'label' => 'Production Code',
				'rules' => 'required'
			], 
			[
				'field' => 'jumlah_temuan',
				'label' => 'Amount of Findings',
				'rules' => 'required'
			], 
			[
				'field' => 'keterangan',
				'label' => 'Notes'
				// 'rules' => 'required'
			],
			[
				'field' => 'catatan',
				'label' => 'Notes'
				// 'rules' => 'required'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$jumlah_temuan = $this->input->post('jumlah_temuan');
		$keterangan = $this->input->post('keterangan');
		$catatan = $this->input->post('catatan');
		$status_produksi = "0";
		$status_spv = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'jumlah_temuan' => $jumlah_temuan,
			'keterangan' => $keterangan,
			'catatan' => $catatan,
			'status_produksi' => $status_produksi,
			'status_spv' => $status_spv
		);

		$this->db->insert('verifikasi_mt', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	// public function rules_update()
	// {
	// 	return[
	// 		[
	// 			'field' => 'date',
	// 			'label' => 'Date',
	// 			'rules' => 'required'
	// 		],
	// 		[
	// 			'field' => 'nama_alat',
	// 			'label' => 'Things',
	// 			'rules' => 'required'
	// 		], 
	// 		[
	// 			'field' => 'nilai',
	// 			'label' => 'Measurement Value',
	// 			'rules' => 'required'
	// 		], 
	// 		[
	// 			'field' => 'keterangan',
	// 			'label' => 'Notes'
	// 			// 'rules' => 'required'
	// 		]
	// 	];
	// }

	public function update($uuid)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$jumlah_temuan = $this->input->post('jumlah_temuan');
		$keterangan = $this->input->post('keterangan');
		$catatan = $this->input->post('catatan');

		$data = array(
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'jumlah_temuan' => $jumlah_temuan,
			'keterangan' => $keterangan,
			'catatan' => $catatan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('verifikasi_mt', $data, array('uuid' => $uuid));
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
			'nama_spv' => $nama_spv,
			'status_spv' => $status_spv,
			'catatan_spv' => $catatan_spv,
			'tgl_update_spv' => date("Y-m-d H:i:s")
		);

		$this->db->update('verifikasi_mt', $data, array('uuid' => $uuid));
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
			'nama_produksi' => $nama_produksi,
			'status_produksi' => $status_produksi,
			'catatan_produksi' => $catatan_produksi,
			'tgl_update_produksi' => date("Y-m-d H:i:s")
		);

		$this->db->update('verifikasi_mt', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('verifikasi_mt')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('verifikasi_mt', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_verifikasimagnet($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('verifikasi_mt');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_verifikasimagnet_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('verifikasi_mt');

		$data_verifikasimagnet = $query->row();  
		return $data_verifikasimagnet; 
	}


}