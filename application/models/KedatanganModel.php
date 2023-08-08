<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KedatanganModel extends CI_Model
{
    public function getKode()
    {
        $query = $this->db->query("SELECT max(noform) as maxKode FROM pb_kedatangan WHERE `noform` LIKE '%K-%'");
        foreach ($query->result_array() as $row) {
            $m = $row['maxKode'];
        }
        return $m;
    }
    
    public function getBarangModel($search = null) //default parameter nya null
    {
        $this->db->from("pb_barang");
        $this->db->like('namabarang', $search);
        $this->db->or_like('kodebarang', $search);
        $query = $this->db->get();

        return $query->result();
    }
}
?>