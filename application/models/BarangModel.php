<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BarangModel extends CI_Model
{
    var $column_order = array(null, 'tgl_input', 'kodebarang', 'namabarang');
    var $column_search = array('tgl_input', 'kodebarang', 'namabarang');
    var $order = array('namabarang' => 'DESC');

    private function getQuery()
    {
        // if (!empty($this->input->post('mesin'))) {
        //     $this->db->like('mesin', $this->input->post('mesin'), 'both');
        // }
        // if (!empty($this->input->post('unit'))) {
        //     $this->db->like('unit', $this->input->post('unit'), 'both');
        // }
        
        $this->db->select('*');
        $this->db->from('pb_barang');
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
    public function getBarangList()
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
    
    public function getKode()
    {
        // $y = date('y');
        $char = 'B-';
        $query = $this->db->query("SELECT max(kodebarang) as maxKode FROM pb_barang WHERE `kodebarang` LIKE '%" . $char . "%'");
        foreach ($query->result_array() as $row) {
            $m = $row['maxKode'];
        }

        return $m;
    }
    public function save($table, $data)
    {
        return $this->db->insert($table, $data);
    }
    public function deleteBarang($table, $id, $value)
    {
        $this->db->where($id, $value);
        return $this->db->delete($table);
    }
}
?>