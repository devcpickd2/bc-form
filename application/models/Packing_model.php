<?php 
date_default_timezone_set('Asia/Jakarta');
use Ramsey\Uuid\Uuid;

class Packing_model extends CI_Model {

    public function get_by_produksi_uuid($uuid) {
        $this->db->select('*');
        $this->db->from('mixing_finish');
        $this->db->where('produksi_uuid', $uuid);

        return $this->db->get()->result();
    }
    public function get_produk_by_produksi_uuid($produksi_uuid) {
        $this->db->select('shift_pack, stall_jam_mulai, stall_jam_berhenti, stall_kadar_air, dry_suhu, dry_rotasi, dry_kadar_air, produk_hasil, produk_rasa, produk_aroma, produk_tekstur, produk_warna, packing_nama_produk, packing_kode_kemasan, packing_bb, packing_kondisi_kemasan');
        $this->db->from('mixing_finish');
        $this->db->where('produksi_uuid', $produksi_uuid);

        return $this->db->get()->result();
    }

    public function get_all()
    {
        $data = $this->db->get('mixing_finish')->result();
        return $data;
    }
}  