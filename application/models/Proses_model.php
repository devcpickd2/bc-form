<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Proses_model extends CI_Model {
	
	public function rules()
	{
		return [
			[
				'field' => 'date',
				'label' => 'Tanggal',
				'rules' => 'required'
			],
			[
				'field' => 'shift',
				'label' => 'Shift',
				'rules' => 'required'
			],
			[
				'field' => 'nama_produk',
				'label' => 'Nama Produk',
				'rules' => 'required'
			],
			[
				'field' => 'catatan',
				'label' => 'Notes'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$produksi_data = $this->session->userdata('produksi_data');
		$nama_produksi = $produksi_data['nama_produksi'] ?? '';
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');

		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$nama_produk = $this->input->post('nama_produk');
		$catatan = $this->input->post('catatan');
		$status_produksi = "1";
		$status_spv = "0";

		$proses_input = $this->input->post('proses_produksi');
		$cleaned = [];

		if (is_array($proses_input)) {
			foreach ($proses_input as $kategori => $params) {
				$max_index = 0;
				foreach ($params as $param => $cols) {
					foreach ($cols as $i => $val) {
						if (trim($val) !== '') {
							$max_index = max($max_index, (int)$i);
						}
					}
				}
				for ($i = 0; $i <= $max_index; $i++) {
					foreach ($params as $param => $cols) {
						$cleaned[$kategori][$param][$i] = isset($cols[$i]) ? $cols[$i] : '';
					}
				}
			}
		}

		$json_proses = json_encode($cleaned);

		$data = [
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'shift' => $shift,
			'jenis_produk' => $nama_produk,
			'nama_produk' => $nama_produk,
			'catatan' => $catatan,
			'status_spv' => $status_spv,
			'status_produksi' => $status_produksi,
			'nama_produksi' => $nama_produksi,
			'proses_produksi' => $json_proses
		];

		$this->db->insert('mixing', $data);
		return $this->db->affected_rows() > 0;
	}

	public function update($uuid)
	{
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$nama_produk = $this->input->post('nama_produk');
		$catatan = $this->input->post('catatan');

		$proses_input = $this->input->post('proses_produksi');
		$cleaned = [];

		if (is_array($proses_input)) {
			foreach ($proses_input as $kategori => $params) {
				foreach ($params as $param => $cols) {
					for ($i = 0; $i < 10; $i++) { 
						$cleaned[$kategori][$param][$i] = isset($cols[$i]) ? trim($cols[$i]) : '';
					}
				}
			}
		}

		$json_proses = json_encode($cleaned);

		$data = [
			'date'             => $date,
			'shift'            => $shift,
			'nama_produk'      => $nama_produk,
			'jenis_produk'     => $nama_produk,
			'catatan' 		   => $catatan,
			'proses_produksi'  => $json_proses,
			'modified_at'      => date('Y-m-d H:i:s')
		];

		$this->db->where('uuid', $uuid);
		$this->db->update('mixing', $data);

		return $this->db->affected_rows() > 0;
	}


	public function rules_packing()
	{
		return [
			[
				'field' => 'date_stall',
				'label' => 'Tanggal',
				'rules' => 'required'
			],
			[
				'field' => 'shift_pack',
				'label' => 'Shift',
				'rules' => 'required'
			],
			[
				'field' => 'catatan_packing',
				'label' => 'Notes'
			],
		];
	}

	public function update_packing($uuid)
	{
		$date_stall      = $this->input->post('date_stall');
		$shift_pack      = $this->input->post('shift_pack');
		$proses_packing  = $this->input->post('packing'); 
		$catatan_packing  = $this->input->post('catatan_packing');

		if (!is_array($proses_packing)) {
			$proses_packing = [];
		}

		$packing_json = json_encode($proses_packing);

		$data = [
			'date_stall'      => $date_stall,
			'shift_pack'      => $shift_pack,
			'catatan_packing' => $catatan_packing,
			'proses_packing'  => $packing_json,
			'updated_at'     => date('Y-m-d H:i:s')
		];

		$this->db->where('uuid', $uuid);
		$this->db->update('mixing', $data); 

		return $this->db->affected_rows() > 0;
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
			'tgl_update' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('mixing')->result();
		return $data;
	}


	public function get_proses()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('mixing')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('mixing', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_proses($uuid_array)
	{
		if (empty($uuid_array)) {
			return false;
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('mixing');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_proses_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update, date, shift, date_stall, nama_produk, shift_pack, catatan, status_spv, username, premix, nama_produksi, tgl_update_prod, status_produksi');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update', 'DESC');  
		$this->db->limit(1);  
		$query = $this->db->get('mixing');

		$data_produksi = $query->row();  
		return $data_produksi; 
	}

	public function get_latest_today() {
		$plant = $this->session->userdata('plant');

		$this->db->where('date', date('Y-m-d'));
		$this->db->where('plant', $plant);
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('mixing', 1);

		return $query->row_array();
	}

	public function count_today_same_product() {
		$plant = $this->session->userdata('plant'); 

		$this->db->select('nama_produk');
		$this->db->where('plant', $plant);
		$this->db->order_by('created_at', 'DESC'); 
		$this->db->limit(1); 
		$last_updated_product = $this->db->get('mixing')->row_array();

		if (!$last_updated_product) {
			return 0;
		}

		$this->db->where('date', date('Y-m-d'));
		$this->db->where('nama_produk', $last_updated_product['nama_produk']);
		$this->db->where('plant', $plant);
		return $this->db->count_all_results('mixing');
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('mixing', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('mixing');
	}

// application/models/Proses_model.php
	public function getLastKodeproduksiHariIni($plant = null)
	{
		$today = date('Y-m-d');
		$this->db->select('kode_produksi');
		$this->db->from('mixing'); 

		$this->db->where('DATE(created_at)', $today);

		if (!empty($plant)) {
			$this->db->where('plant', $plant);
		}

		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(1);

		$query = $this->db->get();
		if ($query->num_rows() > 0) {
			return $query->row()->kode_produksi;
		}

		return null;
	}


}