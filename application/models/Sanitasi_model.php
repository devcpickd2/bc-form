<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;


class Sanitasi_model extends CI_Model {
	
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
				'field' => 'waktu',
				'label' => 'Time',
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

		$produksi_data = $this->session->userdata('produksi_data');
		$nama_produksi = $produksi_data['nama_produksi'] ?? '';

		$uuid = Uuid::uuid4()->toString();
		$username = $this->session->userdata('username');
		$plant = $this->session->userdata('plant');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$waktu = $this->input->post('waktu');
		$catatan = $this->input->post('catatan');
		$status_produksi = "1";
		$status_spv = "0";

		$sub_area = $this->input->post('sub_area');
		$standar = $this->input->post('standar');
		$aktual = $this->input->post('aktual');
		$suhu_air = $this->input->post('suhu_air');
		$keterangan = $this->input->post('keterangan');
		$tindakan = $this->input->post('tindakan');

		$area = [];

		for ($i = 0; $i < count($sub_area); $i++) {
			$gambar = null;
			if (!empty($_FILES['gambar']['name'][$i])) {
				$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
				$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['gambar']['error'][$i];
				$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

				$config['upload_path']   = './uploads/sanitasi/';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';
				$config['file_name']     = 'gambar_' . time() . '_' . $i;
				$config['overwrite']     = false;

				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$gambar = $uploadData['file_name'];
				} else {
					log_message('error', 'Upload gagal: ' . $this->upload->display_errors());
				}
			}

			$area[] = [
				'sub_area'   => $sub_area[$i],
				'standar'    => isset($standar[$i]) ? $standar[$i] : '',
				'aktual'     => isset($aktual[$i]) ? $aktual[$i] : '',
				'suhu_air'   => isset($suhu_air[$i]) ? $suhu_air[$i] : '',
				'keterangan' => isset($keterangan[$i]) ? $keterangan[$i] : '',
				'tindakan'   => isset($tindakan[$i]) ? $tindakan[$i] : '',
				'gambar'     => $gambar
			];
		}

		$data = array(
			'uuid'            => $uuid,
			'username'        => $username,
			'plant' 		  => $plant,
			'date'            => $date,
			'shift'           => $shift,
			'waktu'           => $waktu,
			'area'            => json_encode($area),
			'catatan'         => $catatan,
			'status_produksi' => $status_produksi,
			'nama_produksi'   => $nama_produksi,
			'status_spv'      => $status_spv
		);

		$this->db->insert('sanitasi', $data);
		return ($this->db->affected_rows() > 0);
	}

	public function update($uuid)
	{
		$username = $this->session->userdata('username');
		$date = $this->input->post('date');
		$shift = $this->input->post('shift');
		$waktu = $this->input->post('waktu');
		$catatan = $this->input->post('catatan');

		$sub_area   = $this->input->post('sub_area');
		$standar    = $this->input->post('standar');
		$aktual     = $this->input->post('aktual');
		$suhu_air   = $this->input->post('suhu_air');
		$keterangan = $this->input->post('keterangan');
		$tindakan   = $this->input->post('tindakan');
		$gambar_lama = $this->input->post('gambar_lama');
		$old_data = $this->db->get_where('sanitasi', ['uuid'=>$uuid])->row_array();

		$area = [];

		for ($i = 0; $i < count($sub_area); $i++) {
			$gambar = isset($gambar_lama[$i]) ? $gambar_lama[$i] : null;

			if (!empty($_FILES['gambar']['name'][$i])) {
				$_FILES['file']['name']     = $_FILES['gambar']['name'][$i];
				$_FILES['file']['type']     = $_FILES['gambar']['type'][$i];
				$_FILES['file']['tmp_name'] = $_FILES['gambar']['tmp_name'][$i];
				$_FILES['file']['error']    = $_FILES['gambar']['error'][$i];
				$_FILES['file']['size']     = $_FILES['gambar']['size'][$i];

				$config['upload_path']   = './uploads/sanitasi/';
				$config['allowed_types'] = 'jpg|jpeg|png|webp';
				$config['file_name']     = 'gambar_' . time() . '_' . $i;
				$config['overwrite']     = false;

				$this->load->library('upload');
				$this->upload->initialize($config);

				if ($this->upload->do_upload('file')) {
					$uploadData = $this->upload->data();
					$gambar = $uploadData['file_name'];
				} else {
					log_message('error', 'Upload gagal (update): ' . $this->upload->display_errors());
				}
			}

			$area[] = [
				'sub_area'   => $sub_area[$i],
				'standar'    => $standar[$i],
				'aktual'     => $aktual[$i],
				'suhu_air'   => $suhu_air[$i],
				'keterangan' => $keterangan[$i],
				'tindakan'   => $tindakan[$i],
				'gambar'     => $gambar
			];
		}

		$data = array(
			'username'     => $username,
			'date'         => $date,
			'shift'        => $shift,
			'waktu'        => $waktu,
			'area'         => json_encode($area),
			'catatan'      => $catatan,
			'modified_at'  => date("Y-m-d H:i:s")
		);
		$this->db->update('sanitasi', $data, ['uuid' => $uuid]);

        // ambil data baru setelah update
		$new_data = $this->db->get_where('sanitasi', ['uuid'=>$uuid])->row_array();

		if ($this->db->affected_rows() > 0) {
            // simpan log ke tabel khusus sanitasi_logs
			$this->activity_logger->log_activity(
				'update',
                'sanitasi_logs', // nama tabel log khusus sanitasi
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

		$this->db->update('sanitasi', $data, array('uuid' => $uuid));
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

		$this->db->update('sanitasi', $data, array('uuid' => $uuid));
		return($this->db->affected_rows() > 0) ? true :false;

	}

	public function get_all()
	{
		$this->db->order_by('created_at', 'DESC');
		$data = $this->db->get('sanitasi')->result();
		return $data;
	}

	public function get_by_uuid($uuid)
	{
		$data = $this->db->get_where('sanitasi', array('uuid' => $uuid))->row();
		return $data;
	}

	public function get_by_uuid_sanitasi($uuid_array)
	{
		if (empty($uuid_array)) {
			return false; 
		}
		log_message('debug', 'Array UUID yang diterima: ' . print_r($uuid_array, true));

		$this->db->where_in('uuid', $uuid_array);
		$query = $this->db->get('sanitasi');

		log_message('debug', 'Query yang dijalankan: ' . $this->db->last_query());

		if ($query->num_rows() > 0) {
			return $query->result(); 
		}	
		return false;  
	}

	public function get_by_uuid_sanitasi_verif($uuid_array)
	{
		$this->db->select('nama_spv, tgl_update_spv, username, date, shift, nama_produksi, tgl_update_produksi, status_produksi');
		$this->db->where_in('uuid', $uuid_array);
		$this->db->order_by('tgl_update_spv', 'DESC');   
		$this->db->limit(1);  
		$query = $this->db->get('sanitasi');

		$data_sanitasi = $query->row();  
		return $data_sanitasi; 
	}

	public function get_data_by_plant()
	{
		$this->db->order_by('created_at', 'DESC');
		$plant = $this->session->userdata('plant');
		return $this->db->get_where('sanitasi', ['plant' => $plant])->result();
	}

	public function delete_by_uuid($uuid)
	{
		$this->db->where('uuid', $uuid);
		return $this->db->delete('sanitasi');
	}

	public function get_by_date($date, $plant = null)
	{
		$this->db->where('DATE(date)', $date);
		if (!empty($plant)) {
			$this->db->where('plant', $plant);
		}
		$query = $this->db->get('sanitasi');
		log_message('debug', 'QUERY SANITASI: ' . $this->db->last_query());
		return $query->result();
	}


}