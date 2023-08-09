<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengeluaranModel extends CI_Model
{
    public function getKode()
    {
        $query = $this->db->query("SELECT max(noform) as maxKode FROM pb_kedatangan WHERE `noform` LIKE '%K-%'");
        foreach ($query->result_array() as $row) {
            $m = $row['maxKode'];
        }
        return $m;
    }
    
    public function ambilBarang($id)
    {
        $this->db->select("*");
        $this->db->from("pb_kedatanganitm ke");
        // $this->db->join('pb_kedatanganitm ki', 'ke.noform=pi.noform', 'left');
        $this->db->where("namabarang like '%$id%'");
        $this->db->or_where("kodebarang like '%$id%'");
        $this->db->or_where("kodekedatangan like '%$id%'");
        $this->db->order_by('tgl_kedatanganitm', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}