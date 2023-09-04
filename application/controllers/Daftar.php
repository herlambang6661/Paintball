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
            'DaftarModel' => 'daftar',
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

	public function customer()
	{
        $data['mdaftar'] = 'menu-open';
		$data['daftarcustomer'] = 'active';
		$this->load->view('daftar/customer', $data);
	}
    
	public function getCustomerDatatables(){
        error_reporting(0);
        $json = array();
        $list = $this->daftar->getCustomerList();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id_customer'];
            $row[] = $element['kodecustomer'];
            $row[] = $element['nama'];
            $row[] = $element['telp'];
            $row[] = $element['alamat'];
            $row[] = $element['kodepos'];
            $row[] = $element['kota'];
            $row[] = $element['provinsi'];
            $row[] = $element['email'];
            $row[] = $element['website'];
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->daftar->countAll(),
            "recordsFiltered" => $this->daftar->countFiltered(),
            "data" => $data,
        );
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
	}

    function prosTambahCustomer() { 
        // START GENERATE KODE CUSTOMER =======================================================================================
            if ($this->daftar->getKode() == null) {
                $kodes = 1;
            } else {
                $kod = $this->daftar->getKode();
                $kodes = $kod + 1;
            }
        // END GENERATE KODE CUSTOMER ========================================================================================
        ?>
        <form action="#" id="formtambahcustomer" class="form-horizontal" style="color: black;">
            <input type="hidden" value="" name="id" />
            <div class="row">
                <div class="col-lg-4">
                    <div class="card border-dark">
                        <div class="card-body">
                            <div class="form-group">
                                <label class="control-label col-md-12">Kode Customer</label>
                                <input value="<?= $kodes ?>" class="form-control form-control-sm" type="text" readonly>
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">Nama</label>
                                <input name="nama" value="" class="form-control form-control-sm" type="text">
                                <span class="help-block"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label col-md-12">Telp</label>
                                <input name="telp" value="" class="form-control form-control-sm" type="text">
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="card border-dark">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Alamat</label>
                                        <input name="alamat" value="" class="form-control form-control-sm" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Kodepos</label>
                                        <input name="kodepos" value="" class="form-control form-control-sm" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Kota</label>
                                        <input name="kota" value="" class="form-control form-control-sm" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Provinsi</label>
                                        <input name="provinsi" value="" class="form-control form-control-sm" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Email</label>
                                        <input name="email" value="" class="form-control form-control-sm" type="email">
                                        <span class="help-block"></span>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-md-12">Website</label>
                                        <input name="website" value="" class="form-control form-control-sm" type="text">
                                        <span class="help-block"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </form>
    <?php
    }

    function tambahCustomer(){

        // START GENERATE KODE CUSTOMER =======================================================================================
            if ($this->daftar->getKode() == null) {
                $kodes = 1;
            } else {
                $kod = $this->daftar->getKode();
                $kodes = $kod + 1;
            }
        // END GENERATE KODE CUSTOMER ========================================================================================

        $nama       = $_POST['nama'];
        $telp       = $_POST['telp'];
        $alamat     = $_POST['alamat'];
        $kodepos    = $_POST['kodepos'];
        $kota       = $_POST['kota'];
        $provinsi   = $_POST['provinsi'];
        $email      = $_POST['email'];
        $website    = $_POST['website'];
        $dibuat = $this->session->userdata("nama");
        
        $data = array(
            'kodecustomer' => $kodes,
            'nama' => $nama,
            'telp' => $telp,
            'alamat' => $alamat,
            'kodepos' => $kodepos,
            'kota' => $kota,
            'provinsi' => $provinsi,
            'email' => $email,
            'website' => $website,
            'dibuat' => $dibuat,
        );
        $this->daftar->save('pb_customer', $data);
    }
}
