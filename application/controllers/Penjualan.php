<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'PenjualanModel' => 'penjualan',
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
            $query = $this->penjualan->getKode();
            $y = substr($query, 2, 2);
            if (date('y') == $y) {
                $noUrut = substr($query, 4, 5);
                $na = $noUrut + 1;
                $char = date('y');
                $kodeBarang = "K-" . $char . sprintf("%05s", $na);
            } else {
                $noUrut = substr($query, 10, 7);
                $kodeBarang = "K-" . date('y') . "00001";
            }
        // GET NOFORM
		$data['active'] = 'penjualan';
		$data['kodeBarang'] = $kodeBarang;
		$this->load->view('penjualan/index', $data);
	}
}