<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Thermometer_model extends CI_Model {
	
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
				'field' => 'kode_thermo',
				'label' => 'Thermometer Code',
				'rules' => 'required'
			], 
			[
				'field' => 'area',
				'label' => 'Area',
				'rules' => 'required'
			],
			[
				'field' => 'model',
				'label' => 'Type of Thermometer',
				'rules' => 'required'
			],
			[
				'field' => 'tindakan_perbaikan',
				'label' => 'Corrective Action'
			],
			[
				'field' => 'keterangan',
				'label' => 'Notes'
			],
		];
	}

	public function insert()
	{
		$produksi_data = $this->session->userdata('produksi_data');
		$nama_produksi = $produksi_data['nama_produksi'] ?? '';
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$kode_thermo = $this->input->post('kode_thermo');
		$area = $this->input->post('area');
		$model = $this->input->post('model');
		$tindakan_perbaikan = $this->input->post('tindakan_perbaikan');
		$keterangan = $this->input->post('keterangan');
		$status_produksi = "1";
		$status_spv = "0";

		$pukul = $this->input->post('pukul');
		$standar = $this->input->post('standar');
		$hasil = $this->input->post('hasil');

		$peneraan_hasil = [];
		for ($i = 0; $i < count($pukul); $i++) {
			$peneraan_hasil[] = [
				'pukul' => $pukul[$i],
				'standar' => isset($standar[$i]) ? $standar[$i] : '',
				'hasil' => isset($hasil[$i]) ? $hasil[$i] : '',
			];
		}

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'shift' => $shift,
			'kode_thermo' => $kode_thermo,
			'area' => $area,
			'model' => $model,
			'peneraan_hasil' => json_encode($peneraan_hasil),
			'tindakan_perbaikan' => $tindakan_perbaikan,
			'keterangan' => $keterangan,
			'status_produksi' => $status_produksi,
			'nama_produksi' => $nama_produksi,
			'status_spv' => $status_spv
		);

		$this->db->insert('thermometer', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$kode_thermo = $this->input->post('kode_thermo');
		$area = $this->input->post('area');
		$model = $this->input->post('model');
		$tindakan_perbaikan = $this->input->post('tindakan_perbaikan');
		$keterangan = $this->input->post('keterangan');

		$pukul = $this->input->post('pukul');
		$standar = $this->input->post('standar');
		$hasil = $this->input->post('hasil');

		$peneraan_hasil = [];
		foreach ($pukul as $i => $b) {
			$peneraan_hasil[] = [
				'pukul'   => $b,
				'standar'  => $standar[$i],
				'hasil'  => $hasil[$i],
			];
		}

		$data = array(
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'kode_thermo' => $kode_thermo,
			'area' => $area,
			'model' => $model,
			'peneraan_hasil' => json_encode($peneraan_hasil),
			'tindakan_perbaikan' => $tindakan_perbaikan,
			'keterangan' => $keterangan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('thermometer', $data, array('uuid' => $uuid));
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

		$this->db->update('thermometer', $data, array('uuid' => $uuid));
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

		$this->db->update('thermometer', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('thermometer')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('thermometer', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_thermometer($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('thermometer');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_thermometer_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, nama_produksi, tgl_update_produksi, status_produksi');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('thermometer');

		$data_thermometer = $query->row();  
		return $data_thermometer; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('thermometer', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('thermometer');
	}

	public function get_by_date($tanggal, $plant = null)
	{
		if (empty($tanggal)) {
			return false;
		}

		$this->db->where('DATE(date)', $tanggal);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('date', 'ASC');
		$query = $this->db->get('thermometer');

		log_message('debug', 'Query get_by_date: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return false;
	}

	public function get_last_verif_by_date($tanggal, $plant = null)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, nama_produksi, tgl_update_produksi, status_produksi');
		$this->db->where('DATE(date)', $tanggal);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('tgl_update_spv', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('thermometer');

		return $query->row();
	}

}