<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'BarangModel' => 'barang',
        );
        // Load Multiple Models
        foreach ($models as $file => $object_name) {
            $this->load->model($file, $object_name);
        }
        $this->load->helper(array('form', 'url'));
    }

	public function ekspedisi()
	{
        $data['mdaftar'] = 'menu-open';
		$data['daftarekspedisi'] = 'active';
		$this->load->view('daftar/ekspedisi', $data);
	}

}
