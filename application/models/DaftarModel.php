<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DaftarModel extends CI_Model
{
    public function getKode()
    {
        $query = $this->db->query("SELECT max(kodecustomer) as maxKode FROM pb_customer");
        foreach ($query->result_array() as $row) {
            $m = $row['maxKode'];
        }
        return $m;
    }

    var $column_order = array(null, 'kodecustomer', 'nama', 'telp', 'alamat', 'kodepos', 'kota', 'provinsi', 'email', 'website');
    var $column_search = array('kodecustomer', 'nama', 'telp', 'alamat', 'kodepos', 'kota', 'provinsi', 'email', 'website');
    var $order = array('nama' => 'DESC');

    private function getQuery()
    {
        $this->db->select('*');
        $this->db->from('pb_customer cs');
        $i = 0;
        foreach ($this->column_search as $item) {
            if (!empty($_POST['search']['value'])) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }
        if (!empty($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (!empty($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    public function getCustomerList()
    {
        $this->getQuery();
        if (!empty($_POST['length']) && $_POST['length'] < 1) {
            $_POST['length'] = '10';
        } else {
            $_POST['length'] = $_POST['length'];
        }
        if (!empty($_POST['start']) && $_POST['start'] > 1) {
            $_POST['start'] = $_POST['start'];
        }
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function countFiltered()
    {
        $this->getQuery();
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function countAll()
    {
        $this->getQuery();
        return $this->db->count_all_results();
    }
    public function save($table, $data)
    {
        $result = $this->db->insert($table, $data);
        
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}
?>