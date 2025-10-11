<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Activity_logger {

    protected $CI;

    public function __construct() {
        $this->CI =& get_instance();
        $this->CI->load->database();
        $this->CI->load->library('session');
    }

    public function log_activity($action, $log_table, $record_id, $old_data = null, $new_data = null){
        // $log_table = nama tabel log sesuai modul, misalnya 'disposisi_logs'

        $log_data = [
            'username'    => $this->CI->session->userdata('username'),
            'action'     => $action,          // insert/update/delete
            'record_id'  => $record_id,
            'old_data'   => $old_data ? json_encode($old_data) : null,
            'new_data'   => $new_data ? json_encode($new_data) : null,
            'created_at' => date('Y-m-d H:i:s')
        ];

        $this->CI->db->insert($log_table, $log_data);
    }
}
