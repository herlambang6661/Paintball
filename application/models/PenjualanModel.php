<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PenjualanModel extends CI_Model
{
    public function getKode()
    {
        $query = $this->db->query("SELECT max(noform) as maxKode FROM pb_kedatangan WHERE `noform` LIKE '%K-%'");
        foreach ($query->result_array() as $row) {
            $m = $row['maxKode'];
        }
        return $m;
    }
}