<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Seasoning_model extends CI_Model {
	
	public function rules()
	{
		return[
			[
				'field' => 'date',
				'label' => 'Date',
				'rules' => 'required'
			],
			[
				'field' => 'jenis_seasoning',
				'label' => 'Seasoning',
				'rules' => 'required'
			],
			[
				'field' => 'spesifikasi',
				'label' => 'Specification',
				'rules' => 'required'
			], 
			[
				'field' => 'pemasok',
				'label' => 'Supplier',
				'rules' => 'required'
			],
			['field' => 'jenis_mobil', 'label' => 'Transportation', 'rules' => 'required'],
			['field' => 'no_polisi', 'label' => 'Police Number', 'rules' => 'required'],
			['field' => 'identitas_pengantar', 'label' => 'Identity', 'rules' => 'required'],
			['field' => 'no_po', 'label' => 'PO Number', 'rules' => 'required'],
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
				'field' => 'kotoran',
				'label' => 'Dirt'
			],
			[
				'field' => 'aroma',
				'label' => 'Smell'
			],
			[
				'field' => 'logo_halal',
				'label' => 'Halal Stamp'
			],
			[
				'field' => 'kadar_air',
				'label' => 'Water Content'
			],
			[
				'field' => 'negara_asal',
				'label' => 'Country of Origin'
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
				'field' => 'sertif_halal',
				'label' => 'Halal Sertification'
			],
			[
				'field' => 'allergen',
				'label' => 'Allergen'
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
		$jenis_seasoning = $this->input->post('jenis_seasoning');
		$spesifikasi = $this->input->post('spesifikasi');
		$pemasok = $this->input->post('pemasok');
		$jenis_mobil = $this->input->post('jenis_mobil');
		$no_polisi = $this->input->post('no_polisi');
		$identitas_pengantar = $this->input->post('identitas_pengantar');
		$no_po = $this->input->post('no_po');
		$kode_produksi = $this->input->post('kode_produksi');
		$expired = $this->input->post('expired');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$sampel = $this->input->post('sampel');
		$jumlah_reject = $this->input->post('jumlah_reject');
		$kemasan = $this->input->post('kemasan');
		$warna = $this->input->post('warna');
		$kotoran = $this->input->post('kotoran');
		$aroma = $this->input->post('aroma');
		$logo_halal = $this->input->post('logo_halal');
		$kadar_air = $this->input->post('kadar_air');
		$negara_asal = $this->input->post('negara_asal');
		$segel = $this->input->post('segel');
		$coa = $this->input->post('coa');
		$sertif_halal = $this->input->post('sertif_halal');
		$penerimaan = $this->input->post('penerimaan');
		$allergen = $this->input->post('allergen');
		$keterangan = $this->input->post('keterangan');
		$catatan = $this->input->post('catatan');
		$status_spv = "0";

		$kondisi_mobil = $this->input->post('kondisi_mobil'); 
		if(empty($kondisi_mobil)) {
			$kondisi_mobil = ['Tidak Sesuai'];
		}
		$kondisi_mobil_str = implode(", ", $kondisi_mobil);

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'plant' => $plant,
			'date' => $date,
			'jenis_seasoning' => $jenis_seasoning,
			'spesifikasi' => $spesifikasi,
			'pemasok' => $pemasok,
			'jenis_mobil' => $jenis_mobil,
			'no_polisi' => $no_polisi,
			'identitas_pengantar' => $identitas_pengantar,
			'no_po' => $no_po,
			'kondisi_mobil' => $kondisi_mobil_str,
			'kode_produksi' => $kode_produksi,
			'expired' => $expired,
			'jumlah_barang' => $jumlah_barang,
			'sampel' => $sampel,
			'jumlah_reject' => $jumlah_reject,
			'kemasan' => $kemasan,
			'warna' => $warna,
			'kotoran' => $kotoran,
			'aroma' => $aroma,
			'logo_halal' => $logo_halal,
			'kadar_air' => $kadar_air,
			'negara_asal' => $negara_asal,
			'segel' => $segel,
			'coa' => $coa,
			'bukti_coa' => $file_name,
			'sertif_halal' => $sertif_halal,
			'penerimaan' => $penerimaan,
			'allergen' => $allergen,
			'keterangan' => $keterangan,
			'catatan' => $catatan,
			'status_spv' => $status_spv
		);

		$this->db->insert('seasoning', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid, $file_name)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$jenis_seasoning = $this->input->post('jenis_seasoning');
		$spesifikasi = $this->input->post('spesifikasi');
		$pemasok = $this->input->post('pemasok');
		$jenis_mobil = $this->input->post('jenis_mobil');
		$no_polisi = $this->input->post('no_polisi');
		$identitas_pengantar = $this->input->post('identitas_pengantar');
		$no_po = $this->input->post('no_po');
		$kode_produksi = $this->input->post('kode_produksi');
		$expired = $this->input->post('expired');
		$jumlah_barang = $this->input->post('jumlah_barang');
		$sampel = $this->input->post('sampel');
		$jumlah_reject = $this->input->post('jumlah_reject');
		$kemasan = $this->input->post('kemasan');
		$warna = $this->input->post('warna');
		$kotoran = $this->input->post('kotoran');
		$aroma = $this->input->post('aroma');
		$logo_halal = $this->input->post('logo_halal');
		$kadar_air = $this->input->post('kadar_air');
		$negara_asal = $this->input->post('negara_asal');
		$segel = $this->input->post('segel');
		$coa = $this->input->post('coa');
		$sertif_halal = $this->input->post('sertif_halal');
		$penerimaan = $this->input->post('penerimaan');
		$allergen = $this->input->post('allergen');
		$keterangan = $this->input->post('keterangan');
		$catatan = $this->input->post('catatan');
		$kondisi_mobil = $this->input->post('kondisi_mobil'); 
		if(empty($kondisi_mobil)) {
			$kondisi_mobil = ['Tidak Sesuai'];
		}
		$kondisi_mobil_str = implode(", ", $kondisi_mobil);

		$data = array(
			'username' => $username,
			'date' => $date,
			'jenis_seasoning' => $jenis_seasoning,
			'spesifikasi' => $spesifikasi,
			'pemasok' => $pemasok,
			'jenis_mobil' => $jenis_mobil,
			'no_polisi' => $no_polisi,
			'identitas_pengantar' => $identitas_pengantar,
			'no_po' => $no_po,
			'kode_produksi' => $kode_produksi,
			'expired' => $expired,
			'jumlah_barang' => $jumlah_barang,
			'sampel' => $sampel,
			'jumlah_reject' => $jumlah_reject,
			'kemasan' => $kemasan,
			'warna' => $warna,
			'kotoran' => $kotoran,
			'aroma' => $aroma,
			'logo_halal' => $logo_halal,
			'kadar_air' => $kadar_air,
			'negara_asal' => $negara_asal,
			'segel' => $segel,
			'coa' => $coa,
			'bukti_coa' => $file_name,
			'sertif_halal' => $sertif_halal,
			'penerimaan' => $penerimaan,
			'allergen' => $allergen,
			'keterangan' => $keterangan,
			'catatan' => $catatan,
			'kondisi_mobil' => $kondisi_mobil_str,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('seasoning', $data, array('uuid' => $uuid));
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

		$this->db->update('seasoning', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('seasoning')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('seasoning', array('uuid' => $uuid))->row();
		return $data;
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
		$query = $this->db->get('seasoning');

		log_message('debug', 'Query get_by_date: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return false;
	}

	public function get_last_verif_by_date($tanggal, $plant = null)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date');
		$this->db->where('DATE(date)', $tanggal);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('tgl_update_spv', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('seasoning');

		return $query->row();
	}


	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('seasoning', ['plant' => $plant])->result();
	}

	public function get_latest_seasoning() {
		$user_plant = $this->session->userdata('plant'); 

		$this->db->select('jenis_seasoning, kode_produksi, pemasok, jumlah_barang');
		$this->db->from('seasoning');
		$this->db->where('plant', $user_plant);
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(10);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('seasoning');
	}
}