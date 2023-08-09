<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('status') != "login") {
            redirect(base_url());
        }
        date_default_timezone_set('Asia/Jakarta');
        // List of Models
        $models = array(
            'StockModel' => 'stock',
        );
        // Load Multiple Models
        foreach ($models as $file => $object_name) {
            $this->load->model($file, $object_name);
        }
        $this->load->helper(array('form', 'url'));
    }

	public function index()
	{
		$data['active'] = 'stock';
		$this->load->view('stock/index', $data);
	}
    
	public function getStockDatatables(){
        error_reporting(0);
        $json = array();
        $list = $this->stock->getStockList();
        $data = array();
        foreach ($list as $element) {
            $row = array();
            $row[] = $element['id_stock'];
            $row[] = $element['kodebarang'];
            $row[] = $element['nama'];
            $row[] = $element['qty'];
            $data[] = $row;
        }
        $json['data'] = array(
            "draw" => $_POST['draw'],
            "recordsTotal" => $this->stock->countAll(),
            "recordsFiltered" => $this->stock->countFiltered(),
            "data" => $data,
        );
        $this->output->set_header('Content-Type: application/json');
        echo json_encode($json['data']);
	}

    public function detail() 
    {
        $id = $_POST['rownoform'];
        $data = $this->stock->getData($id);
        $no = 1;
        foreach ($data as $u) { ?>
            <form action="#" id="form" class="form-horizontal" style="color: black;">
                <input type="hidden" value="" name="id" />
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="control-label col-md-12">Kode Barang</label>
                                    <input name="tanggal" value="<?php echo $u->kodebarang ?>" class="form-control form-control-sm" type="text" readonly>
                                    <span class="help-block"></span>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-12">Barang</label>
                                    <input name="tanggal" value="<?php echo $u->nama ?>" class="form-control form-control-sm" type="text" readonly>
                                    <span class="help-block"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-sm table-bordered text-nowrap text-center">
                        <thead class="bg-gradient-purple text-white">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Barang</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Satuan</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Kurs</th>
                                <th scope="col">Trucking</th>
                                <th scope="col">Bea Cukai</th>
                                <th scope="col">Jenis</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $data2 = $this->stock->getDataItm($id);
                            foreach ($data2 as $v) {?>
                                <tr class="">
                                    <td><?php echo $no;$no++ ?></td>
                                    <td><?php echo $v->tgl_kedatanganitm ?></td>
                                    <td><?php echo $v->namabarang ?></td>
                                    <td><?php echo $v->qty ?></td>
                                    <td><?php echo $v->satuan ?></td>
                                    <td><?php echo $v->harga ?></td>
                                    <td><?php echo $v->kurs ?></td>
                                    <td><?php echo $v->trucking ?></td>
                                    <td><?php echo $v->bea_cukai ?></td>
                                    <td><span class="badge rounded-pill bg-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Kedatangan"><i class="fa fa-plus" aria-hidden="true"></i></span></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                
            </form>
            <?php
        }
    }

}