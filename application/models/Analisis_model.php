<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Analisis_model extends CI_Model {

	protected $table = 'analisis_lab';
	
	public function rules()
	{
		return [
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'tipe_sampel',
				'label' => 'Type of Sample',
				'rules' => 'required'
			],
			[
				'field' => 'penyimpanan',
				'label' => 'Storage',
				'rules' => 'required'
			],
			[
				'field' => 'nama_produk',
				'label' => 'Name of Product',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Production Code',
				'rules' => 'required'
			],
			[
				'field' => 'best_before',
				'label' => 'Best Before',
				'rules' => 'required'
			],
			[
				'field' => 'jumlah_sampel',
				'label' => 'Quantity of Sample'
			]
		];
	}

	public function insert()
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$tipe_sampel = $this->input->post('tipe_sampel');
		$penyimpanan = $this->input->post('penyimpanan');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$best_before = $this->input->post('best_before');
		$jumlah_sampel = $this->input->post('jumlah_sampel');
		$status_spv = "0";
		$status_produksi = "0";
		$status_lab = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'tipe_sampel' => $tipe_sampel,
			'penyimpanan' => $penyimpanan,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'best_before' => $best_before,
			'jumlah_sampel' => $jumlah_sampel,
			'status_spv' => $status_spv,
			'status_produksi' => $status_produksi,
			'status_lab' => $status_lab
		);

		$this->db->insert('analisis_lab', $data);
		return ($this->db->affected_rows() > 0) ? true : false;
	}

	public function update($uuid)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$tipe_sampel = $this->input->post('tipe_sampel');
		$penyimpanan = $this->input->post('penyimpanan');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');
		$best_before = $this->input->post('best_before');
		$jumlah_sampel = $this->input->post('jumlah_sampel');

		$data = array(
			'username' => $username,
			'date' => $date,
			'tipe_sampel' => $tipe_sampel,
			'penyimpanan' => $penyimpanan,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'best_before' => $best_before,
			'jumlah_sampel' => $jumlah_sampel,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('analisis_lab', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;
	}

	public function analysis($uuid)
	{
		$username = $this->session->userdata('username');
		$analisis = $this->input->post('analisis');

		if (is_array($analisis)) {
			$analisis = array_filter($analisis, fn($v) => trim($v) !== '');
			$analisis = implode(',', $analisis);
		} else {
			$analisis = '';
		}

		$catatan = $this->input->post('catatan');
		$data = [
			'username' => $username,
			'analisis' => $analisis,
			'catatan' => $catatan,
			'modified_at' => date('Y-m-d H:i:s'),
		];

		$this->db->update('analisis_lab', $data, ['uuid' => $uuid]);
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
			'tgl_update_spv' => date("Y-m-d H:i:s")
		);

		$this->db->update('analisis_lab', $data, array('uuid' => $uuid));
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

		$this->db->update('analisis_lab', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_diterima()
	{
		return[
			[
				'field' => 'status_lab',
				'label' => 'Status',
				'rules' => 'required'
			],
			[
				'field' => 'catatan_lab',
				'label' => 'Notes'
			]

		];
	}

	public function diterima_update($uuid)
	{

		$nama_lab = $this->session->userdata('username');
		$status_lab = $this->input->post('status_lab');
		$catatan_lab = $this->input->post('catatan_lab');

		$data = array(
			'nama_lab' => $nama_lab,
			'status_lab' => $status_lab,
			'catatan_lab' => $catatan_lab,
			'tgl_update_lab' => date("Y-m-d H:i:s")
		);

		$this->db->update('analisis_lab', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('analisis_lab')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('analisis_lab', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_bagian_by_uuid($uuid)
	{
		return $this->db->get_where('analisis_lab', ['uuid' => $uuid])->result_array();
	}

	public function get_details_by_uuid($uuid)
	{
		return $this->db->get_where('analisis_detail', ['uuid_analisis' => $uuid])->result_array();
	}

	public function get_detail($uuid)
	{
		return $this->db->get_where('analisis_lab', ['uuid' => $uuid])->row();
	}

	public function get_by_uuid_analisis($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('analisis_lab');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_analisis_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, nama_produksi, tipe_sampel, penyimpanan, nama_lab, tgl_update_lab, status_lab, catatan_lab, status_produksi, tgl_update_produksi');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('analisis_lab');

		$data_analisis = $query->row();  
		return $data_analisis; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('analisis_lab', ['plant' => $plant])->result();
	}
	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('analisis_lab');
	}

}