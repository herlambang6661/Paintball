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

        $idbarang   = $_POST['namabarang'];
        $qty        = $_POST['qty'];
        $satuan     = $_POST['satuan'];
        $harga      = $_POST['harga'];
        $kurs       = $_POST['kurs'];
        $trucking   = $_POST['trucking'];
        $beacukai   = $_POST['beacukai'];
        $matauang   = $post['matauang'];

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
                    'matauang' => $matauang[$i],
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

    function getDetailKedatangan() {
        $post = $this->input->post();

        $id = $post['rowid'];
        $data = $this->kedatangan->get_kedatangan_detail($id);
        foreach ($data as $u) {
            ?>
            <div class="row" style="color: black;">
                <div class="col-sm-3">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="last_name">
                                        <h6>Tanggal</h6>
                                    </label>
                                    <input type="date" class="form-control form-control-sm" value="<?php print $u->tgl ?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h6>No. Form</h6>
                                    </label>
                                    <input type="text" class="form-control form-control-sm" value="<?php print $u->noform ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <div class="card-body" style="overflow-y: scroll; height: 260px">
                            <i>*Note :</i><br>
                            <?php echo $u->keterangan ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            $data2 = $this->kedatangan->get_kedatangan_detailitm($u->noform);
            $no1 = 1;
            ?>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered table-sm text-nowrap" style="font-size: 14px; height: 2px;">
                    <thead>
                        <th class="border border-dark">#</th>
                        <th class="border border-dark">Kode Kedatangan</th>
                        <th class="border border-dark">Kode Barang</th>
                        <th class="border border-dark">Barang</th>
                        <th class="border border-dark">Qty</th>
                        <th class="border border-dark">Satuan</th>
                        <th class="border border-dark">Mata Uang</th>
                        <th class="border border-dark">Harga</th>
                        <th class="border border-dark">Kurs</th>
                        <th class="border border-dark">Trucking</th>
                        <th class="border border-dark">Bea Cukai</th>
                    </thead>

                    <?php foreach ($data2 as $w) { ?>
                        <tr>
                            <td class="border border-dark text-dark"><?php echo $no1++ ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->kodekedatangan ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->kodebarang ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->namabarang ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->qty ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->satuan ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->matauang ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->harga ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->kurs ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->trucking ?></td>
                            <td class="border border-dark text-dark"><?php echo $w->bea_cukai ?></td>
                        </tr>
                    <?php
                        // foreach ($stts as $key) {
                        //     if ($key == "PENGADAAN") {
                        //         echo '<div class="col"><button type="button" class="btn btn-danger" data-dismiss="modal">Hapus</button></div><hr>';
                        //     } else {
                        //         echo '<div class="col"><button type="button" class="btn btn-danger" data-dismiss="modal" disabled>Hapus</button></div><hr>';
                        //     }
                        // }
                    } ?>
                </table>
            </div>
        <?php
        }
    }
}