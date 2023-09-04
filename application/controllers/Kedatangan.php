<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kedatangan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url());
        }
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
        $data['mbarang'] = 'menu-open';
		$data['kedatangan'] = 'active';
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
    
	public function getKedatanganDatatables(){
        error_reporting(0);
        $json = array();
        $list = $this->kedatangan->getKedatanganList();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id_kedatangan'];
            $row[] = $element['form_kedatangan'];
            $row[] = $element['kodekedatangan'];
            $row[] = $element['kodebarang'];
            $row[] = $element['namabarang'];
            $row[] = $element['qty'];
            $row[] = $element['satuan'];
            $row[] = $element['harga'];
            $row[] = $element['kurs'];
            $row[] = $element['trucking'];
            $row[] = $element['bea_cukai'];
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->kedatangan->countAll(),
            "recordsFiltered" => $this->kedatangan->countFiltered(),
            "data" => $data,
        );
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
	}

    public function kedatangansave() {
        $post = $this->input->post();
        
        // GET NOFORM
            $query = $this->kedatangan->getKode();
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

        $tanggal = $post['tanggal'];
        $noform = $kodeBarang;
        $keteranganform = $post['keteranganform'];
        $dibuat = $this->session->userdata("nama");

        $dataPermintaan = array(
            'tgl' => $tanggal,
            'noform' => $noform,
            'keterangan' => $keteranganform,
            'dibuat' => $dibuat
        );

        $idbarang = $_POST['namabarang'];
        $qty        = $_POST['qty'];
        $satuan     = $_POST['satuan'];
        $harga      = $_POST['harga'];
        $kurs       = $_POST['kurs'];
        $trucking   = $_POST['trucking'];
        $beacukai   = $_POST['beacukai'];

        // Jika Item Barang Terisi => input barang
        if (!empty($idbarang)) {
            $this->kedatangan->save('pb_kedatangan', $dataPermintaan);
            $jml_mbl = count($idbarang);
            for ($i = 0; $i < $jml_mbl; $i++) {
                
                if ($this->kedatangan->getKodeKedatangan_add() == null) {
                    $kodes = "D-00001";
                } else {
                    $kod = $this->kedatangan->getKodeKedatangan_add();
                    // Get Latest Kode Barang
                    $noUrut = (int) substr($kod, -5);
                    $noUrut++;
                    $char = 'D-';
                    $kodes = $char . sprintf("%05s", $noUrut);
                    // Get Latest Kode Barang
                }
                // insert ke tb kedatangan
                $data = array(
                    'tgl_kedatanganitm' => $tanggal,
                    'form_kedatangan' => $noform,
                    'kodekedatangan' => $kodes,
                    'kodebarang' => $idbarang[$i],
                    'namabarang' => $this->kedatangan->getBarang($idbarang[$i]),
                    'qty' => $qty[$i],
                    'satuan' => $satuan[$i],
                    'harga' => $harga[$i],
                    'kurs' => $kurs[$i],
                    'trucking' => $kurs[$i],
                    'bea_cukai' => $beacukai[$i],
                    'dibuat' => $dibuat,
                );
                $insert = $this->kedatangan->save('pb_kedatanganitm', $data);
                // update stock barang
                // $update = array(
                //     'kodebarang' => $idbarang[$i],
                //     'namabarang' => $this->kedatangan->getBarang($idbarang[$i]),
                //     'qty' => $qty[$i],
                // );
                $this->kedatangan->updateStock('pb_stock', 'kodebarang', $idbarang[$i], $qty[$i]);
            }
            echo "success";
        } else {
            echo "error";
        }
        
        // // GET NOFORM
        //     $query = $this->kedatangan->getKode();
        //     $y = substr($query, 7, 2);
        //     if (date('y') == $y) {
        //         $noUrut = substr($query, 10, 7);
        //         $na = $noUrut + 1;
        //         $char = date('y');
        //         $kodeBarangnew = "K-" . $char . sprintf("%05s", $na);
        //     } else {
        //         $kodeBarangnew = "K-" . date('y') . "00001";
        //     }
        // // GET NOFORM
		// $data['active'] = 'kedatangan';
		// $data['kodeBarang'] = $kodeBarangnew;
        // redirect('kedatangan/index', $data);
    }
}