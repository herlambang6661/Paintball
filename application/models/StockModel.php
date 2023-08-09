<?php
defined('BASEPATH') or exit('No direct script access allowed');

class StockModel extends CI_Model
{
    var $column_order = array(null, 'tgl_input', 'kodebarang', 'namabarang');
    var $column_search = array('tgl_input', 'kodebarang', 'namabarang');
    var $order = array('nama' => 'DESC');

    private function getQuery()
    {
        // if (!empty($this->input->post('mesin'))) {
        //     $this->db->like('mesin', $this->input->post('mesin'), 'both');
        // }
        // if (!empty($this->input->post('unit'))) {
        //     $this->db->like('unit', $this->input->post('unit'), 'both');
        // }
        
        $this->db->select('id_stock, st.kodebarang, nama, st.qty');
        $this->db->from('pb_stock st');
        $this->db->join('pb_barang br', 'st.kodebarang=br.kodebarang', 'left');
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
    public function getStockList()
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
    
    public function getData($id)
    {
        $this->db->from("pb_stock");
        $this->db->where('kodebarang', $id);
        $query = $this->db->get();

        return $query->result();
    }
    
    public function getDataItm($id)
    {
        $this->db->from("pb_kedatanganitm");
        $this->db->where('kodebarang', $id);
        $query = $this->db->get();

        return $query->result();
    }
}
?>