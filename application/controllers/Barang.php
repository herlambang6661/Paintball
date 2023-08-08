<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
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

	public function index()
	{
		$data['active'] = 'listbarang';
		$this->load->view('barang/listBarang', $data);
	}

	public function getBarangDatatables(){
        error_reporting(0);
        $json = array();
        $list = $this->barang->getBarangList();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id_barang'];
            $row[] = date("d-m-Y", strtotime($element['tgl_input']));
            $row[] = $element['kodebarang'];
            $row[] = $element['namabarang'];
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->barang->countAll(),
            "recordsFiltered" => $this->barang->countFiltered(),
            "data" => $data,
        );
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
	}
	

    public function save()
    {
        $post = $this->input->post();
		// Get Latest Kode Barang
        $query = $this->barang->getKode();
		$noUrut = (int) substr($query, -5);
		$noUrut++;
		// $char = date('y-');
		$char = 'B-';
		$kodeBarang = $char . sprintf("%05s", $noUrut);
		// Get Latest Kode Barang

        $tanggal	= $post['tanggal'];
        $kode 		= $kodeBarang;
        $namabarang = $post['namabarang'];
        $dibuat 	= $this->session->userdata("nama");

        $dataBarang = array(
            'tgl_input' => $tanggal,
            'kodebarang' => $kode,
            'namabarang' => $namabarang,
            'user_input' => $dibuat
        );
        $this->barang->save('barang', $dataBarang);
        redirect('Barang/index', $data);
    }

	public function delete(){
        // id yang telah diparsing pada ajax ajaxcrud.php data{id:id}
        $id = $this->input->post('id');

        $data = $this->barang->deleteBarang('barang', 'id_barang', $id);

        if ($data) {
            $output['status'] = 'success';
            $output['message'] = 'Data Berhasil Terhapus';
        } else {
            $output['status'] = 'error';
            $output['message'] = 'Something went wrong in deleting the data, Please Contact IT Administrator';
        }

        echo json_encode($output);
	}
}
