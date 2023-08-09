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
                $kodeBarang = "K-" . $char . sprintf("%05s", $na);
            } else {
                $noUrut = substr($query, 10, 7);
                $kodeBarang = "K-" . date('y') . "00001";
            }
        // GET NOFORM
		$data['active'] = 'pengeluaran';
		$data['kodeBarang'] = $kodeBarang;
		$this->load->view('pengeluaran/index', $data);
	}
    
    public function cari()
    {
        $cari = trim(strip_tags($_POST['keyword']));
        if ($cari == '') {
        } else {
            $data = $this->pengeluaran->ambilBarang($cari); ?>
            <div class="row">
                <div class="col">
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
                                    data-satuan="<?php echo $u->satuan; ?>"
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
                </div>
            </div>
            <?php
        }
    }
}