<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pembuatanlarutan_model extends CI_Model {
	
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
				'field' => 'pukul',
				'label' => 'Time',
				'rules' => 'required'
			],
			[
				'field' => 'nama_chemical',
				'label' => 'Chemicals',
				'rules' => 'required'
			],
			[
				'field' => 'expired',
				'label' => 'Expired',
				'rules' => 'required'
			],
			[
				'field' => 'konsentrasi',
				'label' => 'Concentration',
				'rules' => 'required'
			],
			[
				'field' => 'larutan_beku',
				'label' => 'Froze Solvent'
			],
			[
				'field' => 'air',
				'label' => 'water'
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
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$area = $this->input->post('area');
		$pukul = $this->input->post('pukul');
		$nama_chemical = $this->input->post('nama_chemical');
		$expired = $this->input->post('expired');
		$konsentrasi = $this->input->post('konsentrasi');
		$larutan_beku = $this->input->post('larutan_beku');
		$air = $this->input->post('air');
		$catatan = $this->input->post('catatan');
		$status_spv = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'area' => $area,
			'pukul' => $pukul,
			'nama_chemical' => $nama_chemical,
			'expired' => $expired,
			'konsentrasi' => $konsentrasi,
			'larutan_beku' => $larutan_beku,
			'air' => $air,
			'catatan' => $catatan,
			'status_spv' => $status_spv
		);

		$this->db->insert('pembuatan_larutan', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	} 

	public function update($uuid)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$area = $this->input->post('area');
		$pukul = $this->input->post('pukul');
		$nama_chemical = $this->input->post('nama_chemical');
		$expired = $this->input->post('expired');
		$konsentrasi = $this->input->post('konsentrasi');
		$larutan_beku = $this->input->post('larutan_beku');
		$air = $this->input->post('air');
		$catatan = $this->input->post('catatan');

		$old_data = $this->db->get_where('pembuatan_larutan', ['uuid'=>$uuid])->row_array();

		$data = array(
			'username' => $username,
			'date' => $date,
			'area' => $area,
			'pukul' => $pukul,
			'nama_chemical' => $nama_chemical,
			'expired' => $expired,
			'konsentrasi' => $konsentrasi,
			'larutan_beku' => $larutan_beku,
			'air' => $air,
			'catatan' => $catatan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('pembuatan_larutan', $data, ['uuid' => $uuid]);

        // ambil data baru setelah update
		$new_data = $this->db->get_where('pembuatan_larutan', ['uuid'=>$uuid])->row_array();

		if ($this->db->affected_rows() > 0) {
            // simpan log ke tabel khusus pembuatan_larutan_logs
			$this->activity_logger->log_activity(
				'update',
                'pembuatan_larutan_logs', // nama tabel log khusus pembuatan_larutan
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

		$this->db->update('pembuatan_larutan', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('pembuatan_larutan')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('pembuatan_larutan', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_pembuatanlarutan($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('pembuatan_larutan');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_pembuatanlarutan_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, area');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('pembuatan_larutan');

		$data_pembuatan_larutan = $query->row();  
		return $data_pembuatan_larutan; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('pembuatan_larutan', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('pembuatan_larutan');
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
		$query = $this->db->get('pembuatan_larutan');

		log_message('debug', 'Query get_by_date: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return false;
	}

	public function get_last_verif_by_date($tanggal, $plant = null)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, area');
		$this->db->where('DATE(date)', $tanggal);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('tgl_update_spv', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('pembuatan_larutan');

		return $query->row();
	}

}