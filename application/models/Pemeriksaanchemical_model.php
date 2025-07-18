<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Pemeriksaanchemical_model extends CI_Model {
	
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
				'field' => 'jenis_chemical',
				'label' => 'Chemicals',
				'rules' => 'required'
			],
			[
				'field' => 'pemasok',
				'label' => 'Supplier',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Production Code',
				'rules' => 'required'
			],
			[
				'field' => 'expired',
				'label' => 'Expired',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah_barang',
				'label' => 'Amount of Chemicals',
				'rules' => 'required'
			],
			[
				'field' => 'sampel',
				'label' => 'Sample',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah_reject',
				'label' => 'Rejected',
				'rules' => 'required'
			], 
			[
				'field' => 'kemasan',
				'label' => 'Packaging'
			],
			[
				'field' => 'warna',
				'label' => 'Color'
			],
			[
				'field' => 'ph',
				'label' => 'Ph'
			],
			[
				'field' => 'halal_berlaku',
				'label' => 'Halal Applicable'
			],
			[
				'field' => 'segel',
				'label' => 'Seal'
			],
			[
				'field' => 'coa',
				'label' => 'COA'
			],
			[
				'field' => 'bukti_coa',
				'label' => 'Evidence',
				'rules' => 'callback_file_check'
			],
			[
				'field' => 'penerimaan',
				'label' => 'received'
			],
			[
				'field' => 'keterangan',
				'label' => 'Notes'
			],
			[
				'field' => 'catatan',
				'label' => 'Notes'
			]
		];
	}

	public function insert($file_name)
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$jenis_chemical = $this->input->post('jenis_chemical');
		$pemasok = $this->input->post('pemasok');
		$kode_produksi = $this->input->post('kode_produksi');
		$expired = $this->input->post('expired');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$sampel = $this->input->post('sampel');
		$jumlah_reject = $this->input->post('jumlah_reject');
		$kemasan = $this->input->post('kemasan');
		$warna = $this->input->post('warna');
		$ph = $this->input->post('ph');
		$halal_berlaku = $this->input->post('halal_berlaku');
		$segel = $this->input->post('segel');
		$coa = $this->input->post('coa');
		$penerimaan = $this->input->post('penerimaan');
		$keterangan = $this->input->post('keterangan');
		$catatan = $this->input->post('catatan');
		$status_spv = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'shift' => $shift,
			'jenis_chemical' => $jenis_chemical,
			'pemasok' => $pemasok,
			'kode_produksi' => $kode_produksi,
			'expired' => $expired,
			'jumlah_barang' => $jumlah_barang,
			'sampel' => $sampel,
			'jumlah_reject' => $jumlah_reject,
			'kemasan' => $kemasan,
			'warna' => $warna,
			'ph' => $ph,
			'halal_berlaku' => $halal_berlaku,
			'segel' => $segel,
			'coa' => $coa,
			'bukti_coa' => $file_name,
			'penerimaan' => $penerimaan,
			'keterangan' => $keterangan,
			'catatan' => $catatan,
			'status_spv' => $status_spv
		);

		$this->db->insert('pemeriksaan_chemical', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid, $file_name)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$jenis_chemical = $this->input->post('jenis_chemical');
		$pemasok = $this->input->post('pemasok');
		$kode_produksi = $this->input->post('kode_produksi');
		$expired = $this->input->post('expired');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$sampel = $this->input->post('sampel');
		$jumlah_reject = $this->input->post('jumlah_reject');
		$kemasan = $this->input->post('kemasan');
		$warna = $this->input->post('warna');
		$ph = $this->input->post('ph');
		$halal_berlaku = $this->input->post('halal_berlaku');
		$segel = $this->input->post('segel');
		$coa = $this->input->post('coa');
		$penerimaan = $this->input->post('penerimaan');
		$keterangan = $this->input->post('keterangan');
		$catatan = $this->input->post('catatan');

		$data = array(
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'jenis_chemical' => $jenis_chemical,
			'pemasok' => $pemasok,
			'kode_produksi' => $kode_produksi,
			'expired' => $expired,
			'jumlah_barang' => $jumlah_barang,
			'sampel' => $sampel,
			'jumlah_reject' => $jumlah_reject,
			'kemasan' => $kemasan,
			'warna' => $warna,
			'ph' => $ph,
			'halal_berlaku' => $halal_berlaku,
			'segel' => $segel,
			'coa' => $coa,
			'bukti_coa' => $file_name,
			'penerimaan' => $penerimaan,
			'keterangan' => $keterangan,
			'catatan' => $catatan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('pemeriksaan_chemical', $data, array('uuid' => $uuid));
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

		$this->db->update('pemeriksaan_chemical', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('pemeriksaan_chemical')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('pemeriksaan_chemical', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_pemeriksaanchemical($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('pemeriksaan_chemical');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_pemeriksaanchemical_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, shift');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('pemeriksaan_chemical');

		$data_pemeriksaan_chemical = $query->row();  
		return $data_pemeriksaan_chemical; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('pemeriksaan_chemical', ['plant' => $plant])->result();
	}

	public function get_latest_chemical() {
		$user_plant = $this->session->userdata('plant'); 

		$this->db->select('jenis_chemical, kode_produksi, pemasok, jumlah_barang');
		$this->db->from('pemeriksaan_chemical');
		$this->db->where('plant', $user_plant);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(10);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('pemeriksaan_chemical');
	}

}