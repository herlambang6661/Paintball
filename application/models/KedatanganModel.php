<?php
defined('BASEPATH') or exit('No direct script access allowed');

class KedatanganModel extends CI_Model
{
    var $column_order = array(null, 'noform', 'kodebarang', 'kode_kedatangan', 'kodebarang', 'namabarang', 'qty', 'satuan', 'harga', 'kurs', 'trucking', 'bea_cukai');
    var $column_search = array('noform', 'kodekedatangan', 'kodebarang', 'namabarang', 'qty', 'satuan', 'harga', 'kurs', 'trucking', 'bea_cukai');
    var $order = array('namabarang' => 'ASC');

    private function getQuery()
    {
        // if (!empty($this->input->post('mesin'))) {
        //     $this->db->like('mesin', $this->input->post('mesin'), 'both');
        // }
        // if (!empty($this->input->post('unit'))) {
        //     $this->db->like('unit', $this->input->post('unit'), 'both');
        // }
        
        $this->db->select('*');
        $this->db->from('pb_kedatangan ke');
        $this->db->join('pb_kedatanganitm ki', 'ke.noform=ki.form_kedatangan', 'left');
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
    public function getKedatanganList()
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
    public function save($table, $data)
    {
        $result = $this->db->insert($table, $data);
        
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    public function getKodeKedatangan_add()
    {
        $query = $this->db->query("SELECT max(kodekedatangan) as maxKode FROM pb_kedatanganitm");
        foreach ($query->result_array() as $row) {
            $m = $row['maxKode'];
        }

        return $m;
    }
    
    public function getBarang($id)
    {
        $this->db->select('namabarang');
        $this->db->from("pb_barang");
        $this->db->where('kodebarang', $id);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->namabarang;
        }
        return $query;
    }
    public function updateStock($table, $kode, $value, $qty)
    {
        $this->db->set('qty', 'qty+'.$qty, false);
        $this->db->where($kode, $value);
        $this->db->update($table); 
    }
    public function get_kedatangan_detail($id)
    {
        $this->db->select('*');
        $this->db->from('pb_kedatangan');
        $this->db->where('noform', $id);
        $query = $this->db->get();

        return $query->result();
    }
    
    public function get_kedatangan_detailitm($id)
    {
        $this->db->select('*');
        $this->db->from('pb_kedatanganitm');
        $this->db->where('form_kedatangan', $id);
        $query = $this->db->get();

        return $query->result();
    }
}
?>