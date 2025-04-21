<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;

class Premix_model extends CI_Model {

    public function get_by_produksi_uuid($uuid) {
        $this->db->select('*');
        $this->db->from('premix');
        $this->db->where('produksi_uuid', $uuid);

        return $this->db->get()->result();
    }
    public function get_produk_by_produksi_uuid($produksi_uuid) {
        $this->db->select('premix_kode, premix_berat, premix_sensori');
        $this->db->from('premix');
        $this->db->where('produksi_uuid', $produksi_uuid);

        return $this->db->get()->result();
    }

    public function get_all()
    {
        $data = $this->db->get('premix')->result();
        return $data;
    }
}  