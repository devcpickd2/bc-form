<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Produksi_model extends CI_Model {
	
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
				'label' => 'Produk Name',
				'rules' => 'required'
			],
			[
				'field' => 'kode_produksi',
				'label' => 'Product Code',
				'rules' => 'required'
			],	
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
		$status_produksi = "0";
		$status_spv = "0";

		$data = array(
			'uuid' => $uuid,
			'username' => $username,
			'date' => $date,
			'shift' => $shift,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,
			'status_spv' => $status_spv,
			'status_produksi' => $status_produksi,
		);

		$this->db->insert('mixing', $data);
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function update($uuid)
	{

		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$nama_produk = $this->input->post('nama_produk');
		$kode_produksi = $this->input->post('kode_produksi');

		$data = array(
			'date' => $date,
			'shift' => $shift,
			'nama_produk' => $nama_produk,
			'kode_produksi' => $kode_produksi,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_bahan()
	{
		return[
			[
				'field' => 'kode_produksi',
				'label' => 'Kode Produksi',
				'rules' => 'required'
			],
			[
				'field' => 'tegu_kode',
				'label' => 'Kode Tepung Terigu',
				'rules' => 'required'
			],
			[
				'field' => 'tegu_berat',
				'label' => 'Berat Tepung Terigu',
				'rules' => 'required'
			],
			[
				'field' => 'tegu_sens',
				'label' => 'Sensori Tepung Terigu',
				'rules' => 'required'
			],
			[
				'field' => 'tapioka_kode',
				'label' => 'Kode Tepung Tapioka',
				'rules' => 'required'
			],
			[
				'field' => 'tapioka_berat',
				'label' => 'Berat Tepung Tapioka',
				'rules' => 'required'
			],
			[
				'field' => 'tapioka_sens',
				'label' => 'Sensori Tepung Tapioka',
				'rules' => 'required'
			],
			[
				'field' => 'ragi_kode',
				'label' => 'Kode Ragi',
				'rules' => 'required'
			],
			[
				'field' => 'ragi_berat',
				'label' => 'Berat Ragi',
				'rules' => 'required'
			],
			[
				'field' => 'ragi_sens',
				'label' => 'Sensori Ragi',
				'rules' => 'required'
			],
			[
				'field' => 'bread_kode',
				'label' => 'Kode Bread Improver',
				'rules' => 'required'
			],
			[
				'field' => 'bread_berat',
				'label' => 'Berat Bread Improver',
				'rules' => 'required'
			],
			[
				'field' => 'bread_sens',
				'label' => 'Sensori Bread Improver',
				'rules' => 'required'
			],
			[
				'field' => 'premix_kode_1',
				'label' => 'Kode Premix',
			],
			[
				'field' => 'premix_berat_1',
				'label' => 'Berat Premix',
			],
			[
				'field' => 'premix_sens_1',
				'label' => 'Sensori Premix',
			],
			[
				'field' => 'premix_kode_2',
				'label' => 'Kode Premix',
			],
			[
				'field' => 'premix_berat_2',
				'label' => 'Berat Premix',
			],
			[
				'field' => 'premix_sens_2',
				'label' => 'Sensori Premix',
			],
			[
				'field' => 'premix_kode_3',
				'label' => 'Kode Premix',
			],
			[
				'field' => 'premix_berat_3',
				'label' => 'Berat Premix',
			],
			[
				'field' => 'premix_sens_3',
				'label' => 'Sensori Premix',
			],
			[
				'field' => 'shortening_kode',
				'label' => 'Kode Shortening',
				'rules' => 'required'
			],
			[
				'field' => 'shortening_berat',
				'label' => 'Berat Shortening',
				'rules' => 'required'
			],
			[
				'field' => 'shortening_sens',
				'label' => 'Sensori Shortening',
				'rules' => 'required'
			],
			[
				'field' => 'chill_water_kode',
				'label' => 'Kode Chill Water',
				'rules' => 'required'
			],
			[
				'field' => 'chill_water_berat',
				'label' => 'Berat Chill Water',
				'rules' => 'required'
			],
			[
				'field' => 'chill_water_sens',
				'label' => 'Sensori Chill Water',
				'rules' => 'required'
			],
		];
	} 

	public function material($uuid)
	{
		$username = $this->session->userdata('username');
		$kode_produksi = $this->input->post('kode_produksi');
		$kode_produk = $this->input->post('kode_produk'); 
		$tegu_kode = $this->input->post('tegu_kode');
		$tegu_berat = $this->input->post('tegu_berat');
		$tegu_sens = $this->input->post('tegu_sens');
		$tapioka_kode = $this->input->post('tapioka_kode');
		$tapioka_berat = $this->input->post('tapioka_berat');
		$tapioka_sens = $this->input->post('tapioka_sens');
		$ragi_kode = $this->input->post('ragi_kode');
		$ragi_berat = $this->input->post('ragi_berat');
		$ragi_sens = $this->input->post('ragi_sens');
		$bread_kode = $this->input->post('bread_kode');
		$bread_berat = $this->input->post('bread_berat');
		$bread_sens = $this->input->post('bread_sens');
		$shortening_kode = $this->input->post('shortening_kode');
		$shortening_berat = $this->input->post('shortening_berat');
		$shortening_sens = $this->input->post('shortening_sens');
		$chill_water_kode = $this->input->post('chill_water_kode');
		$chill_water_berat = $this->input->post('chill_water_berat');
		$chill_water_sens = $this->input->post('chill_water_sens');

		$premix_kode_1 = $this->input->post('premix_kode_1'); 
		$premix_berat_1 = $this->input->post('premix_berat_1');
		$premix_sens_1 = $this->input->post('premix_sens_1');
		$premix_kode_2 = $this->input->post('premix_kode_2'); 
		$premix_berat_2 = $this->input->post('premix_berat_2');
		$premix_sens_2 = $this->input->post('premix_sens_2');
		$premix_kode_3 = $this->input->post('premix_kode_3'); 
		$premix_berat_3 = $this->input->post('premix_berat_3');
		$premix_sens_3 = $this->input->post('premix_sens_3');

		$data = array(
			'username' => $username,
			'kode_produksi' => $kode_produksi,
			'tegu_kode' => $tegu_kode,
			'tegu_berat' => $tegu_berat,
			'tegu_sens' => $tegu_sens,
			'tapioka_kode' => $tapioka_kode,
			'tapioka_berat' => $tapioka_berat,
			'tapioka_sens' => $tapioka_sens,
			'ragi_kode' => $ragi_kode,
			'ragi_berat' => $ragi_berat,
			'ragi_sens' => $ragi_sens,
			'bread_kode' => $bread_kode,
			'bread_berat' => $bread_berat,
			'bread_sens' => $bread_sens,
			'premix_kode_1' => $premix_kode_1,
			'premix_berat_1' => $premix_berat_1,
			'premix_sens_1' => $premix_sens_1,
			'premix_kode_2' => $premix_kode_2,
			'premix_berat_2' => $premix_berat_2,
			'premix_sens_2' => $premix_sens_2,
			'premix_kode_3' => $premix_kode_3,
			'premix_berat_3' => $premix_berat_3,
			'premix_sens_3' => $premix_sens_3,
			'shortening_kode' => $shortening_kode,
			'shortening_berat' => $shortening_berat,
			'shortening_sens' => $shortening_sens,
			'chill_water_kode' => $chill_water_kode,
			'chill_water_berat' => $chill_water_berat,
			'chill_water_sens' => $chill_water_sens,
			'modified_at' => date("Y-m-d H:i:s")
		);


		$this->db->update('mixing', $data, ['uuid' => $uuid]);

		return ($this->db->affected_rows() > 0) ? true : false;
	}

	public function rules_mixing()
	{
		return[
			[
				'field' => 'mix_dough_waktu',
				'label' => 'Dough Time',
				'rules' => 'required'
			],
			[
				'field' => 'mix_dough_mesin',
				'label' => 'Machine Number',
				'rules' => 'required'
			], 
			[
				'field' => 'mix_dough_hasil',
				'label' => 'Mixed Result',
				'rules' => 'required'
			], 
			[
				'field' => 'mix_dough_cutting',
				'label' => 'Cutting Dough',
				'rules' => 'required'
			],
			[
				'field' => 'mix_dough_suhu_ruang',
				'label' => 'Room Temperature',
				'rules' => 'required'
			],	
			[
				'field' => 'mix_dough_rh_ruang',
				'label' => 'RH',
				'rules' => 'required'
			], 
			[
				'field' => 'mix_dough_suhu_adonan',
				'label' => 'Dough Temperature',
				'rules' => 'required'
			],	
		];
	}

	public function mixed($uuid)
	{

		$mix_dough_waktu = $this->input->post('mix_dough_waktu');
		$mix_dough_hasil = $this->input->post('mix_dough_hasil');
		$mix_dough_mesin = $this->input->post('mix_dough_mesin');
		$mix_dough_cutting = $this->input->post('mix_dough_cutting');
		$mix_dough_suhu_ruang = $this->input->post('mix_dough_suhu_ruang');
		$mix_dough_rh_ruang = $this->input->post('mix_dough_rh_ruang');
		$mix_dough_suhu_adonan = $this->input->post('mix_dough_suhu_adonan');

		$data = array(
			'mix_dough_waktu' => $mix_dough_waktu,
			'mix_dough_hasil' => $mix_dough_hasil,
			'mix_dough_mesin' => $mix_dough_mesin,
			'mix_dough_cutting' => $mix_dough_cutting,
			'mix_dough_suhu_ruang' => $mix_dough_suhu_ruang,
			'mix_dough_rh_ruang' => $mix_dough_rh_ruang,
			'mix_dough_suhu_adonan' => $mix_dough_suhu_adonan,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_fermen()
	{
		return[
			[
				'field' => 'fermen_suhu',
				'label' => 'Fermentation Temperature',
				'rules' => 'required'
			],
			[
				'field' => 'fermen_rh',
				'label' => 'Fermentation RH',
				'rules' => 'required'
			], 
			[
				'field' => 'fermen_jam_mulai',
				'label' => 'Fermentation Start',
				'rules' => 'required'
			],
			[
				'field' => 'fermen_jam_selesai',
				'label' => 'Fermentation End',
				'rules' => 'required'
			],	
			[
				'field' => 'fermen_lama_proses',
				'label' => 'Fermentation Time',
				'rules' => 'required'
			],
			[
				'field' => 'electric_baking_suhu',
				'label' => 'Electric Baking Temperature'
			],
			[
				'field' => 'electric_baking_mesin',
				'label' => 'Electric Baking Machine'
			],	
			[
				'field' => 'electric_baking_expand',
				'label' => 'Electric Baking Expand'
			],	
			[
				'field' => 'sens_kematangan',
				'label' => 'Boiled Sensory',
				'rules' => 'required'
			],
			[
				'field' => 'sens_rasa',
				'label' => 'Tasted Sensory',
				'rules' => 'required'
			],
			[
				'field' => 'sens_aroma',
				'label' => 'Aroma Sensory',
				'rules' => 'required'
			],
			[
				'field' => 'sens_tekstur',
				'label' => 'Texture Sensory',
				'rules' => 'required'
			],
			[
				'field' => 'sens_warna',
				'label' => 'Color Sensory',
				'rules' => 'required'
			],

		];
	}

	public function fermented($uuid)
	{

		$fermen_suhu = $this->input->post('fermen_suhu');
		$fermen_rh = $this->input->post('fermen_rh');
		$fermen_jam_mulai = $this->input->post('fermen_jam_mulai');
		$fermen_jam_selesai = $this->input->post('fermen_jam_selesai');
		$fermen_lama_proses = $this->input->post('fermen_lama_proses');
		$electric_baking_suhu = $this->input->post('electric_baking_suhu');
		$electric_baking_mesin = $this->input->post('electric_baking_mesin');
		$electric_baking_expand = $this->input->post('electric_baking_expand');
		$sens_kematangan = $this->input->post('sens_kematangan');
		$sens_rasa = $this->input->post('sens_rasa');
		$sens_aroma = $this->input->post('sens_aroma');
		$sens_tekstur = $this->input->post('sens_tekstur');
		$sens_warna = $this->input->post('sens_warna');

		$data = array(
			'fermen_suhu' => $fermen_suhu,
			'fermen_rh' => $fermen_rh,
			'fermen_jam_mulai' => $fermen_jam_mulai,
			'fermen_jam_selesai' => $fermen_jam_selesai,
			'fermen_lama_proses' => $fermen_lama_proses,
			'electric_baking_suhu' => $electric_baking_suhu,
			'electric_baking_mesin' => $electric_baking_mesin,
			'electric_baking_expand' => $electric_baking_expand,
			'sens_kematangan' => $sens_kematangan,
			'sens_rasa' => $sens_rasa,
			'sens_aroma' => $sens_aroma,
			'sens_tekstur' => $sens_tekstur,
			'sens_warna' => $sens_warna,

			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}



	public function rules_stalling()
	{
		return [
			[
				'field' => 'date_stall',
				'label' => 'Date Stall',
			],
			[
				'field' => 'shift_pack',
				'label' => 'Shift Pack',
			],
			[
				'field' => 'stall_jam_mulai',
				'label' => 'Jam Mulai Stall',
				'rules' => 'required'
			],
			[
				'field' => 'stall_jam_berhenti', 
				'label' => 'Jam Berhenti Stall',
				'rules' => 'required',
			],
			[
				'field' => 'stall_kadar_air', 
				'label' => 'Kadar Air',
				'rules' => 'required'
			]
		];
	}

	public function rest($uuid)
	{
		$username = $this->session->userdata('username');
		$date_stall = $this->input->post('date_stall'); 
		$shift_pack = $this->input->post('shift_pack');
		$stall_jam_mulai = $this->input->post('stall_jam_mulai');
		$stall_jam_berhenti = $this->input->post('stall_jam_berhenti');
		$stall_kadar_air = $this->input->post('stall_kadar_air'); 

		$data = array(
			'username' => $username,
			'date_stall' => $date_stall,
			'shift_pack' => $shift_pack,
			'stall_jam_mulai' => $stall_jam_mulai,
			'stall_jam_berhenti' => $stall_jam_berhenti,
			'stall_kadar_air' => $stall_kadar_air,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;
	}

	public function rules_drying()
	{
		return [
			[
				'field' => 'dry_suhu',
				'label' => 'Dry Temperature',
			],
			[
				'field' => 'dry_rotasi',
				'label' => 'Dry Rotation',
			],
			[
				'field' => 'dry_kadar_air',
				'label' => 'Dry Water Content',
				'rules' => 'required'
			],
			[
				'field' => 'produk_hasil', 
				'label' => 'Product result',
				'rules' => 'required',
			],
			[
				'field' => 'produk_rasa', 
				'label' => 'Product Taste',
				'rules' => 'required'
			],
			[
				'field' => 'produk_aroma', 
				'label' => 'Product aroma',
				'rules' => 'required'
			],
			[
				'field' => 'produk_tekstur', 
				'label' => 'Product Texture',
				'rules' => 'required'
			],
			[
				'field' => 'produk_warna', 
				'label' => 'Product Color',
				'rules' => 'required'
			]
		];
	}

	public function dry($uuid)
	{
		$username = $this->session->userdata('username');
		$dry_suhu = $this->input->post('dry_suhu'); 
		$dry_rotasi = $this->input->post('dry_rotasi');
		$dry_kadar_air = $this->input->post('dry_kadar_air');
		$produk_hasil = $this->input->post('produk_hasil');
		$produk_rasa = $this->input->post('produk_rasa');
		$produk_aroma = $this->input->post('produk_aroma');
		$produk_tekstur = $this->input->post('produk_tekstur');
		$produk_warna = $this->input->post('produk_warna'); 

		$data = array(
			'username' => $username,
			'dry_suhu' => $dry_suhu,
			'dry_rotasi' => $dry_rotasi,
			'dry_kadar_air' => $dry_kadar_air,
			'produk_hasil' => $produk_hasil,
			'produk_rasa' => $produk_rasa,
			'produk_aroma' => $produk_aroma,
			'produk_tekstur' => $produk_tekstur,
			'produk_warna' => $produk_warna,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function rules_packing()
	{
		return [
			[
				'field' => 'packing_nama_produk',
				'label' => 'Product Name',
				'rules' => 'required'
			],
			[
				'field' => 'packing_kode_kemasan',
				'label' => 'packaging code',
				'rules' => 'required'
			],
			[
				'field' => 'packing_bb',
				'label' => 'Best before',
				'rules' => 'required'
			],
			[
				'field' => 'packing_kondisi_kemasan', 
				'label' => 'Packaging condition',
				'rules' => 'required',
			],
			// [
			// 	'field' => 'nama_produksi', 
			// 	'label' => 'Name of Production'
			// ],
			[
				'field' => 'catatan', 
				'label' => 'Notes'
			]
		];
	}

	public function pack($uuid)
	{
		$username = $this->session->userdata('username');
		$packing_nama_produk = $this->input->post('packing_nama_produk'); 
		$packing_kode_kemasan = $this->input->post('packing_kode_kemasan');
		$packing_bb = $this->input->post('packing_bb');
		$packing_kondisi_kemasan = $this->input->post('packing_kondisi_kemasan');
		// $nama_produksi = $this->input->post('nama_produksi');
		$catatan = $this->input->post('catatan');

		$data = array(
			'username' => $username,
			'packing_nama_produk' => $packing_nama_produk,
			'packing_kode_kemasan' => $packing_kode_kemasan,
			'packing_bb' => $packing_bb,
			'packing_kondisi_kemasan' => $packing_kondisi_kemasan,
			// 'nama_produksi' => $nama_produksi,
			'catatan' => $catatan,
			'modified_at' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
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
			'tgl_update' => date("Y-m-d H:i:s")
		);

		$this->db->update('mixing', $data, array('uuid' => $uuid));
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
			'tgl_update_prod' => date("Y-m-d H:i:s")
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


	public function get_produksi()
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

	public function get_by_uuid_produksi($uuid_array)
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

	public function get_by_uuid_produksi_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update, date, shift, date_stall, nama_produk, shift_pack, catatan, status_spv, username');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update', 'DESC');  
		$this->db->limit(1);  
		$query = $this->db->get('mixing');

		$data_produksi = $query->row();  
		return $data_produksi; 
	}

	public function get_latest_today() {
		$this->db->where('date', date('Y-m-d'));
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('mixing', 1);
		return $query->row_array();
	}

	public function count_today_same_product() {
		$this->db->select('nama_produk');
		$this->db->order_by('created_at', 'DESC'); 
		$this->db->limit(1); 
		$last_updated_product = $this->db->get('mixing')->row_array();

		if (!$last_updated_product) {
			return 0;
		}

		$this->db->where('date', date('Y-m-d'));
		$this->db->where('nama_produk', $last_updated_product['nama_produk']);
		return $this->db->count_all_results('mixing');
	}


}