<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kedatangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'KedatanganModel' => 'kedatangan',
        );
        // Load Multiple Models
        foreach ($models as $file => $object_name) {
            $this->load->model($file, $object_name);
        }
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
        // GET NOFORM
            $query = $this->kedatangan->getKode();
            $y = substr($query, 7, 2);
            if (date('y') == $y) {
                $noUrut = substr($query, 10, 7);
                $na = $noUrut + 1;
                $char = date('y');
                $kodeBarang = "K-" . $char . sprintf("%05s", $na);
            } else {
                $kodeBarang = "K-" . date('y') . "00001";
            }
        // GET NOFORM
		$data['active'] = 'kedatangan';
		$data['kodeBarang'] = $kodeBarang;
		$this->load->view('kedatangan/index', $data);
	}

    public function getBarang()
    {
        if(!isset($_POST['searchTerm'])){ 
            $fetchData = $this->kedatangan->getBarangModel();
        }else{ 
            $search = $_POST['searchTerm'];   
            $fetchData = $this->kedatangan->getBarangModel($search);
        } 

        $data = array();
        foreach ($fetchData as $u) {
            $data[] = array("id"=>$u->kodebarang , "text"=>"(".$u->kodebarang.") ".$u->namabarang);
        }
        echo json_encode($data);
    }
}