<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Reagen_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'nama_larutan',
				'label' => 'Name of Solvent',
				'rules' => 'required'
			], 
			[
				'field' => 'no_lot',
				'label' => 'Lot Number',
				'rules' => 'required'
			],
			[
				'field' => 'best_before',
				'label' => 'Best Before',
				'rules' => 'required'
			],
			[
				'field' => 'tgl_buka_botol',
				'label' => 'Open Bottle Date',
				'rules' => 'required'
			],
			[
				'field' => 'volume_penggunaan',
				'label' => 'Volume of Use',
				'rules' => 'required'
			],
			[
				'field' => 'volume_akhir',
				'label' => 'Last Volume',
				'rules' => 'required'
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
		$nama_larutan = $this->input->post('nama_larutan');
		$no_lot = $this->input->post('no_lot');
		$best_before = $this->input->post('best_before');
		$tgl_buka_botol = $this->input->post('tgl_buka_botol');
		$volume_penggunaan = $this->input->post('volume_penggunaan');
		$volume_akhir = $this->input->post('volume_akhir');
		$catatan = $this->input->post('catatan');
		$status_spv = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'nama_larutan' => $nama_larutan,
			'no_lot' => $no_lot,
			'best_before' => $best_before,
			'tgl_buka_botol' => $tgl_buka_botol,
			'volume_penggunaan' => $volume_penggunaan,
			'volume_akhir' => $volume_akhir,
			'catatan' => $catatan,
			'status_spv' => $status_spv
		);

		$this->db->insert('reagen', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$nama_larutan = $this->input->post('nama_larutan');
		$no_lot = $this->input->post('no_lot');
		$best_before = $this->input->post('best_before');
		$tgl_buka_botol = $this->input->post('tgl_buka_botol');
		$volume_penggunaan = $this->input->post('volume_penggunaan');
		$volume_akhir = $this->input->post('volume_akhir');
		$catatan = $this->input->post('catatan');
		$old_data = $this->db->get_where('reagen', ['uuid'=>$uuid])->row_array();
		
		$data = array(
			'username' => $username,
			'date' => $date,
			'nama_larutan' => $nama_larutan,
			'no_lot' => $no_lot,
			'best_before' => $best_before,
			'tgl_buka_botol' => $tgl_buka_botol,
			'volume_penggunaan' => $volume_penggunaan,
			'volume_akhir' => $volume_akhir,
			'catatan' => $catatan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		
		$this->db->update('reagen', $data, ['uuid' => $uuid]);

        // ambil data baru setelah update
		$new_data = $this->db->get_where('reagen', ['uuid'=>$uuid])->row_array();

		if ($this->db->affected_rows() > 0) {
            // simpan log ke tabel khusus reagen_logs
			$this->activity_logger->log_activity(
				'update',
                'reagen_logs', // nama tabel log khusus reagen
                $uuid,
                $old_data,
                $new_data
            );
			return true;
		}
		return false;

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

		$this->db->update('reagen', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('reagen')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('reagen', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_reagen($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('reagen');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_reagen_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, date');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('reagen');

		$data_reagen = $query->row();  
		return $data_reagen; 
	} 

	// public function get_Reagen_by_month($start, $end)
	// {
	// 	$this->db->where('date >=', $start);
	// 	$this->db->where('date <=', $end);
	// 	$this->db->order_by('date', 'ASC'); 
	// 	return $this->db->get('reagen')->result();
	// }

	// public function get_one_verified_by_month($start, $end)
	// {
	// 	$this->db->where('date >=', $start);
	// 	$this->db->where('date <=', $end);
	// 	$this->db->where('status_spv', 1);
	// 	$this->db->limit(1);
	// 	return $this->db->get('reagen')->row();
	// }

	public function get_by_month($start_date, $end_date, $plant = null)
	{
		// $this->db->select('date, standar, hasil_pemeriksaan, keterangan, tindakan, verifikasi, username, catatan'); 

		$this->db->where('date >=', $start_date);
		$this->db->where('date <=', $end_date);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('date', 'ASC');
		$query = $this->db->get('reagen');

		log_message('debug', 'Query get_by_month: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return false;
	}

	public function get_last_verif_by_month($start_date, $end_date, $plant = null)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date');
		$this->db->where('date >=', $start_date);
		$this->db->where('date <=', $end_date);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('tgl_update_spv', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('reagen'); 

		return $query->row();
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('reagen', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('reagen');
	}

	public function get_all_no_lot()
	{
		$this->db->select('no_lot');
		$this->db->distinct();
		$query = $this->db->get('reagen');
		return $query->result_array(); 
	}

}