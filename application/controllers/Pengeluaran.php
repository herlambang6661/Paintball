<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengeluaran extends CI_Controller {

    public function __construct() 
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'PengeluaranModel' => 'pengeluaran',
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
            $query = $this->pengeluaran->getKode();
            $y = substr($query, 2, 2);
            if (date('y') == $y) {
                $noUrut = substr($query, 4, 5);
                $na = $noUrut + 1;
                $char = date('y');
                $kodeBarang = "E-" . $char . sprintf("%05s", $na);
            } else {
                $noUrut = substr($query, 10, 7);
                $kodeBarang = "E-" . date('y') . "00001";
            }
        // GET NOFORM
        $data['mbarang'] = 'menu-open';
		$data['pengeluaran'] = 'active';
		$data['kodeBarang'] = $kodeBarang;
		$this->load->view('pengeluaran/index', $data);
	}
    
    public function cari()
    {
        $cari = trim(strip_tags($_POST['keyword']));
        if ($cari == '') {
        } else {
            $data = $this->pengeluaran->ambilBarang($cari); ?>
                        <table class="table table-stripped table-hover table-bordered table-sm text-nowrap" width="100%" id="example2" style="color: black;width:100%; text-transform:uppercase">
                            <thead>
                                <tr>
                                    <th>KodeBarang</th>
                                    <th>Tanggal</th>
                                    <th>KodeKedatangan</th>
                                    <th>Nama</th>
                                    <th>Qty</th>
                                    <th>Satuan</th>
                                    <th>Harga</th>
                                    <th>Kurs</th>
                                    <th>Trucking</th>
                                    <th>Bea Cukai</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <?php foreach ($data as $u) { ?>
                            <tr>
                                <td><?php echo $u->kodebarang; ?></td>
                                <td><?php echo $u->tgl_kedatanganitm; ?></td>
                                <td><?php echo $u->kodekedatangan; ?></td>
                                <td><?php echo $u->namabarang; ?></td>
                                <td><?php echo $u->qty; ?></td>
                                <td><?php echo $u->satuan; ?></td>
                                <td><?php echo $u->harga; ?></td>
                                <td><?php echo $u->kurs; ?></td>
                                <td><?php echo $u->trucking; ?></td>
                                <td><?php echo $u->bea_cukai; ?></td>
                                <td><button type="button" class="btn btn-sm btn-primary tambahkebawah"
                                        data-qty="<?php echo $u->qty; ?>"
                                        data-customer="<?php echo $u->satuan; ?>"
                                        data-harga="<?php echo $u->harga; ?>"
                                        data-kurs="<?php echo $u->kurs; ?>"
                                        data-trucking="<?php echo $u->trucking; ?>"
                                        data-beacukai="<?php echo $u->bea_cukai; ?>"
                                        data-namabrg="<?php echo $u->namabarang; ?>"
                                        data-idbrg="<?php echo $u->kodebarang; ?>"
                                        
                                        ><i class="fa-solid fa-plus"></i></button></td>
                            </tr>
                            <?php }?>
                        </table>
            <?php
        }
    }
    
    public function pengeluaransave() {
        $post = $this->input->post();
        
        // GET NOFORM
            $query = $this->pengeluaran->getKode();
            $y = substr($query, 2, 2);
            if (date('y') == $y) {
                $noUrut = substr($query, 4, 5);
                $na = $noUrut + 1;
                $char = date('y');
                $kodeBarang = "E-" . $char . sprintf("%05s", $na);
            } else {
                $noUrut = substr($query, 10, 7);
                $kodeBarang = "E-" . date('y') . "00001";
            }
        // GET NOFORM

        $tanggal = $post['tanggal'];
        $noform = $kodeBarang;
        $keteranganform = $post['keteranganform'];
        $dibuat = $this->session->userdata("nama");

        $dataPengeluaran = array(
            'tgl' => $tanggal,
            'noform' => $noform,
            'keterangan' => $keteranganform,
            'dibuat' => $dibuat
        );

        $idbarang       = $_POST['namabarang'];
        $qty            = $_POST['qty'];
        $harga          = $_POST['harga'];
        $harga_satuan   = $_POST['harga_satuan'];
        $customer       = $_POST['customer'];

        // Jika Item Barang Terisi => input barang
        if (!empty($idbarang)) {
            $this->pengeluaran->save('pb_pengeluaran', $dataPengeluaran);
            $jml_mbl = count($idbarang);
            for ($i = 0; $i < $jml_mbl; $i++) {
                if ($this->pengeluaran->getKodePengeluaran_add() == null) {
                    $kodes = "F-00001";
                } else {
                    $kod = $this->pengeluaran->getKodePengeluaran_add();
                    // Get Latest Kode Barang
                    $noUrut = (int) substr($kod, -5);
                    $noUrut++;
                    $char = 'F-';
                    $kodes = $char . sprintf("%05s", $noUrut);
                    // Get Latest Kode Barang
                }
                // insert ke tb pengeluaran
                $data = array(
                    'tgl_pengeluaranitm' => $tanggal,
                    'form_pengeluaran' => $noform,
                    'kodepengeluaran' => $kodes,
                    'kodebarang' => $idbarang[$i],
                    'namabarang' => $this->pengeluaran->getBarang($idbarang[$i]),
                    'qty' => $qty[$i],
                    'harga' => $harga[$i],
                    'harga_satuan' => $harga_satuan[$i],
                    'customer' => $customer[$i],
                    'dibuat' => $dibuat,
                    'status' => 'PENJUALAN',
                );
                $insert = $this->pengeluaran->save('pb_pengeluaranitm', $data);
            }
            echo "success";
        } else {
            echo "error";
        }
    }
    
	public function getPengeluaranDatatables(){
        error_reporting(0);
        $json = array();
        $list = $this->pengeluaran->getPengeluaranList();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id_pengeluaran'];
            $row[] = $element['form_pengeluaran'];
            $row[] = $element['kodepengeluaran'];
            $row[] = $element['kodebarang'];
            $row[] = $element['namabarang'];
            $row[] = $element['qty'];
            $row[] = $element['harga'];
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->pengeluaran->countAll(),
            "recordsFiltered" => $this->pengeluaran->countFiltered(),
            "data" => $data,
        );
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
	}
    
    public function getCustomer()
    {
        if(!isset($_POST['searchTerm'])){ 
            $fetchData = $this->pengeluaran->getCustomerModel();
        }else{ 
            $search = $_POST['searchTerm'];   
            $fetchData = $this->pengeluaran->getCustomerModel($search);
        } 

        $data = array();
        foreach ($fetchData as $u) {
            $data[] = array("id"=>$u->kodecustomer , "text"=>"(".$u->kodecustomer.") ".$u->nama);
        }
        echo json_encode($data);
    }
}