<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Penerimaankemasan_model extends CI_Model {
	
	public function rules()
	{
		return [
			['field' => 'date', 'label' => 'Date', 'rules' => 'required'],
			['field' => 'shift', 'label' => 'Shift', 'rules' => 'required'],
			['field' => 'jenis_kemasan', 'label' => 'Packaging', 'rules' => 'required'],
			['field' => 'pemasok', 'label' => 'Supplier', 'rules' => 'required'],
			['field' => 'jenis_mobil', 'label' => 'Transportation', 'rules' => 'required'],
			['field' => 'no_polisi', 'label' => 'Police Number', 'rules' => 'required'],
			['field' => 'identitas_pengantar', 'label' => 'Identity', 'rules' => 'required'],
			['field' => 'no_po', 'label' => 'PO Number', 'rules' => 'required'],
			['field' => 'kode_produksi', 'label' => 'Production Code', 'rules' => 'required'],
			['field' => 'jumlah_datang', 'label' => 'Incoming', 'rules' => 'required'],
			['field' => 'sampel', 'label' => 'Sample', 'rules' => 'required'],
			['field' => 'jumlah_reject', 'label' => 'Rejected', 'rules' => 'required'],
			['field' => 'warna', 'label' => 'Color'],
			['field' => 'panjang', 'label' => 'Long'],
			['field' => 'diameter', 'label' => 'Diameter'],
			['field' => 'lebar', 'label' => 'Width'],
			['field' => 'tinggi', 'label' => 'Height'],
			['field' => 'berat', 'label' => 'Weight'],
			['field' => 'delaminasi', 'label' => 'Delamination'],
			['field' => 'bau', 'label' => 'Smell'],
			['field' => 'desain', 'label' => 'Design'],
			['field' => 'segel', 'label' => 'Seal'],
			['field' => 'coa', 'label' => 'COA'],
			['field' => 'bukti_coa', 'label' => 'Evidence', 'rules' => 'callback_file_check'],
			['field' => 'penerimaan', 'label' => 'received'],
			['field' => 'keterangan', 'label' => 'Notes']
		];
	} 

	public function insert($file_name)
	{
		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$jenis_kemasan = $this->input->post('jenis_kemasan');
		$pemasok = $this->input->post('pemasok');
		$jenis_mobil = $this->input->post('jenis_mobil');
		$no_polisi = $this->input->post('no_polisi');
		$identitas_pengantar = $this->input->post('identitas_pengantar');
		$no_po = $this->input->post('no_po');
		$kode_produksi = $this->input->post('kode_produksi');
		$jumlah_datang = $this->input->post('jumlah_datang');
		$sampel = $this->input->post('sampel');
		$jumlah_reject = $this->input->post('jumlah_reject');
		$warna = $this->input->post('warna');
		$panjang = $this->input->post('panjang');
		$diameter = $this->input->post('diameter');
		$lebar = $this->input->post('lebar');
		$tinggi = $this->input->post('tinggi');
		$berat = $this->input->post('berat');
		$delaminasi = $this->input->post('delaminasi');
		$bau = $this->input->post('bau');
		$desain = $this->input->post('desain');
		$segel = $this->input->post('segel');
		$coa = $this->input->post('coa');
		$penerimaan = $this->input->post('penerimaan');
		$keterangan = $this->input->post('keterangan');
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
			'shift' => $shift,
			'jenis_kemasan' => $jenis_kemasan,
			'pemasok' => $pemasok,
			'jenis_mobil' => $jenis_mobil,
			'no_polisi' => $no_polisi,
			'identitas_pengantar' => $identitas_pengantar,
			'no_po' => $no_po,
			'kode_produksi' => $kode_produksi,
			'jumlah_datang' => $jumlah_datang,
			'sampel' => $sampel,
			'jumlah_reject' => $jumlah_reject,
			'warna' => $warna,
			'panjang' => $panjang,
			'diameter' => $diameter,
			'lebar' => $lebar,
			'tinggi' => $tinggi,
			'berat' => $berat,
			'delaminasi' => $delaminasi,
			'bau' => $bau,
			'desain' => $desain,
			'segel' => $segel,
			'coa' => $coa,
			'bukti_coa' => $file_name,
			'penerimaan' => $penerimaan,
			'keterangan' => $keterangan,
			'kondisi_mobil' => $kondisi_mobil_str,
			'status_spv' => $status_spv
		);

		$this->db->insert('penerimaan_kemasan', $data);
		return ($this->db->affected_rows() > 0) ? true : false;
	}

	public function update($uuid, $file_name)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$jenis_kemasan = $this->input->post('jenis_kemasan');
		$pemasok = $this->input->post('pemasok');
		$jenis_mobil = $this->input->post('jenis_mobil');
		$no_polisi = $this->input->post('no_polisi');
		$identitas_pengantar = $this->input->post('identitas_pengantar');
		$no_po = $this->input->post('no_po');
		$kode_produksi = $this->input->post('kode_produksi');
		$jumlah_datang = $this->input->post('jumlah_datang');
		$sampel = $this->input->post('sampel');
		$jumlah_reject = $this->input->post('jumlah_reject');
		$warna = $this->input->post('warna');
		$panjang = $this->input->post('panjang');
		$diameter = $this->input->post('diameter');
		$lebar = $this->input->post('lebar');
		$tinggi = $this->input->post('tinggi');
		$berat = $this->input->post('berat');
		$delaminasi = $this->input->post('delaminasi');
		$bau = $this->input->post('bau');
		$desain = $this->input->post('desain');
		$segel = $this->input->post('segel');
		$coa = $this->input->post('coa');
		$penerimaan = $this->input->post('penerimaan');
		$keterangan = $this->input->post('keterangan');
		
		$kondisi_mobil = $this->input->post('kondisi_mobil'); 
		if(empty($kondisi_mobil)) {
			$kondisi_mobil = ['Tidak Sesuai'];
		}
		$kondisi_mobil_str = implode(", ", $kondisi_mobil);

		$data = array(
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'jenis_kemasan' => $jenis_kemasan,
			'pemasok' => $pemasok,
			'jenis_mobil' => $jenis_mobil,
			'no_polisi' => $no_polisi,
			'identitas_pengantar' => $identitas_pengantar,
			'no_po' => $no_po,
			'kode_produksi' => $kode_produksi,
			'jumlah_datang' => $jumlah_datang,
			'sampel' => $sampel,
			'jumlah_reject' => $jumlah_reject,
			'warna' => $warna,
			'panjang' => $panjang,
			'diameter' => $diameter,
			'lebar' => $lebar,
			'tinggi' => $tinggi,
			'berat' => $berat,
			'delaminasi' => $delaminasi,
			'bau' => $bau,
			'desain' => $desain,
			'segel' => $segel,
			'coa' => $coa,
			'bukti_coa' => $file_name,
			'penerimaan' => $penerimaan,
			'keterangan' => $keterangan,
			'kondisi_mobil' => $kondisi_mobil_str,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->where('uuid', $uuid);
		$result = $this->db->update('penerimaan_kemasan', $data);

		if(!$result){
			log_message('error', 'Update gagal: ' . $this->db->last_query());
			log_message('error', 'DB error: ' . json_encode($this->db->error()));
		}

		return ($this->db->affected_rows() > 0) ? true : false;
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

		$this->db->update('penerimaan_kemasan', $data, array('uuid' => $uuid));
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

		$this->db->update('penerimaan_kemasan', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('penerimaan_kemasan')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('penerimaan_kemasan', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_penerimaankemasan($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('penerimaan_kemasan');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_penerimaankemasan_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, shift');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('penerimaan_kemasan');

		$data_penerimaan_kemasan = $query->row();  
		return $data_penerimaan_kemasan; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('penerimaan_kemasan', ['plant' => $plant])->result();
	}

	public function get_latest_kemasan() {
		$user_plant = $this->session->userdata('plant'); 

		$this->db->select('jenis_kemasan, kode_produksi, pemasok, jumlah_datang');
		$this->db->from('penerimaan_kemasan');
		$this->db->where('plant', $user_plant); 
		$this->db->order_by('created_at', 'DESC');
		$this->db->limit(10);

		$query = $this->db->get();
		return $query->result_array();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('penerimaan_kemasan');
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
		$query = $this->db->get('penerimaan_kemasan');

		log_message('debug', 'Query get_by_date: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result();
		}

		return false;
	}

	public function get_last_verif_by_date($tanggal, $plant = null)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, shift, created_at');
		$this->db->where('DATE(date)', $tanggal);

		if (!empty($plant)) {
			$this->db->where('plant', $plant); 
		}

		$this->db->order_by('tgl_update_spv', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('penerimaan_kemasan');

		return $query->row();
	}


}