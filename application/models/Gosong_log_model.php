<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;

class Gosong_log_model extends CI_Model {
	
	// public function __construct() {
	// 	parent::__construct();
	// }

	public function get_all_logs(){
		$this->db->order_by('created_at', 'DESC');
		$query = $this->db->get('roti_gosong_logs');
		return $query->result();
	}
	
}
