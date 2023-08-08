<!DOCTYPE html>
<html lang="en">
    <!-- Library Header -->
    <?php $this->load->view('template/libHeader'); ?>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link href="<?= base_url(); ?>assets/select2-4.1.0/dist/css/select2.css" rel="stylesheet" />
    <link href="<?= base_url(); ?>assets/select2-bootstrap/dist/select2-bootstrap.css" rel="stylesheet" />
    <!-- Library Header -->
    <body class="hold-transition sidebar-mini layout-fixed">
        <!-- ./wrapper -->
            <div class="wrapper">
                <!-- Navbar -->
                <?php $this->load->view('template/navbar'); ?>
                <!-- Navbar -->

                <!-- Sidebar -->
                <?php $this->load->view('template/sidebar'); ?>
                <!-- Sidebar -->

                <!-- Content Wrapper. Contains page content -->
                    <div class="content-wrapper">
                        <!-- Content Header (Page header) -->
                            <div class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-6">
                                            <h1 class="m-0"><i class="fas fa-truck nav-icon fa-fw"></i> Kedatangan Barang</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>Dashboard"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fas fa-box"></i> Barang</li>
                                                <li class="breadcrumb-item active"><i class="fas fa-truck nav-icon fa-fw"></i> Kedatangan Barang</li>
                                            </ol>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div>
                        <!-- /.content-header -->

                        <!-- Main content -->
                            <section class="content">
                                <div class="container-fluid">
                                    <!-- Main row -->
                                        <div class="row">
                                            <!-- Left col -->
                                                <section class="col-lg-12 connectedSortable">
                                                    <!-- Custom tabs (Charts with tabs)-->
                                                        <!-- card -->
                                                        <form id="add-form" accept-charset="utf-8" onkeydown="return event.key != 'Enter';">
                                                            <div class="card card-primary card-outline card-outline-tabs">
                                                                <div class="card-header p-0 border-bottom-0">
                                                                    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                                        <li class="nav-item">
                                                                            <a class="nav-link active" id="custom-tabs-four-1-tab" data-toggle="pill" href="#custom-tabs-four-1" role="tab" aria-controls="custom-tabs-four-1" aria-selected="false"><i class="fa-solid fa-list-ul"></i> List Kedatangan</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-2-tab" data-toggle="pill" href="#custom-tabs-four-2" role="tab" aria-controls="custom-tabs-four-2" aria-selected="false"><i class="fa-solid fa-boxes-packing"></i> Tambah Kedatangan</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                                                        <div class="tab-pane fade active show" id="custom-tabs-four-1" role="tabpanel" aria-labelledby="custom-tabs-four-1-tab">
                                                                            <section class="content">
                                                                                <div class="container-fluid">
                                                                                    <div class="row">
                                                                                        <div class="col-lg-12 col-12">
                                                                                            <div class="table-responsive">
                                                                                                <table id="example1" class="table table-sm table-bordered table-hover" width="100%">
                                                                                                    <thead class="bg-navy">
                                                                                                        <tr>
                                                                                                            <th width="5%">Id</th>
                                                                                                            <th width="15%">KodeBarang</th>
                                                                                                            <th>Barang</th>
                                                                                                            <th>Qty</th>
                                                                                                            <th>Satuan</th>
                                                                                                            <th>Harga</th>
                                                                                                            <th>Kurs</th>
                                                                                                            <th width="10%">Opsi</th>
                                                                                                        </tr>
                                                                                                    </thead>
                                                                                                </table>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </section>                                                                        
                                                                        </div>
                                                                        <div class="tab-pane fade" id="custom-tabs-four-2" role="tabpanel" aria-labelledby="custom-tabs-four-2-tab">
                                                                            <div class="row">
                                                                                <div class="col">
                                                                                    <div class="card">
                                                                                        <div class="card-body">
                                                                                            <div class="mb-3">
                                                                                                <label for="" class="form-label">Nomor Form</label>
                                                                                                <input type="text" readonly class="form-control form-control-sm" placeholder="" aria-describedby="helpId" value="<?php echo $kodeBarang; ?>">
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <label for="" class="form-label">Tanggal</label>
                                                                                                <input type="date" name="" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId" value="<?php echo date('Y-m-d');?>">
                                                                                            </div>
                                                                                            <div class="mb-3">
                                                                                                <button type="button" class="btn btn-sm btn-primary" onclick="tambahItem(); return false;"><i class="fas fa-plus-circle"></i> Tambah Barang</button>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-lg-9">
                                                                                </div>
                                                                            </div>
                                                                            
                                                                            <input id="idf" value="1" type="hidden" />
                                                                            <table id="detail_transaksi"class="table table-sm control-group text-nowrap" border="1" style="width: 100%;text-align:center;font-weight: bold;">
                                                                                <thead>
                                                                                    <td style="border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;" width="5%"></td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="20%">Nama</td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="10%">Qty</td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="10%">Satuan</td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="10%">Harga</td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="10%">Kurs</td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="10%">Trucking</td>
                                                                                    <td style="border-color:black" class="bg-gradient-primary text-white" width="10%">Bea Cukai</td>
                                                                                </thead>
                                                                            </table>
                                                                            <button type="button" class="btn btn-success" onclick="simpandata();"><i class="fas fa-save"></i> Simpan</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                        <!-- card -->
                                                    <!-- Custom tabs (Charts with tabs)-->
                                                </section>
                                            <!-- /.Left col -->

                                            <!-- right col (We are only adding the ID to make the widgets sortable)-->
                                            <!-- right col -->
                                        </div>
                                    <!-- /.row (main row) -->
                                </div>
                                <!-- /.container-fluid -->
                            </section>
                        <!-- /.Main content -->
                    </div>
                <!-- /.content-wrapper -->

                <!-- Main Footer -->
                <?php $this->load->view('template/mainfooter'); ?>
                <!-- Main Footer -->

            <!-- Main Sidebar Container -->
        </div>
        <!-- ./wrapper -->

    </body>
    <!-- Library Footer -->
    <?php $this->load->view('template/libFooter'); ?>
    
    <!-- DataTables  & Plugins -->
    <script src="<?= base_url(); ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url(); ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
    <script src="<?= base_url(); ?>assets/select2-4.1.0/dist/js/select2.full.min.js"></script>
    <!-- Library Footer -->
    <script>

        function tambahItem() {
            
            var idf = document.getElementById("idf").value;

            var detail_transaksi = document.getElementById("detail_transaksi");
            
            var tr = document.createElement("tr");
            tr.setAttribute("id", "btn-remove"+idf);

            // Kolom 1 Hapus
            var td = document.createElement("td");
            td.setAttribute("align","center");
            td.setAttribute("style", "border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
            td.innerHTML += '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusElemen('+idf+');"><i class="fa-regular fa-trash-can"></i> </button>';
            tr.appendChild(td);

            // Kolom 2 Nama Barang
            var td = document.createElement("td");
            td.innerHTML += '<select name="namabarang[]" class="form-control form-control-sm elementbrn inputNone" style="width:100%"><option></option></select>';
            tr.appendChild(td);

            // Kolom 3 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' name='qty[]' id='qty_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 4 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='satuan[]' id='satuan_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 5 Harga
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' name='harga[]' id='harga_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Kurs
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' name='kurs[]' id='kurs_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Trucking
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' name='trucking[]' id='trucking_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Bea Cukai
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' name='beacukai[]' id='beacukai_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Here is the callback
            // tr.onload = function(){
            //     $('select[name*="produk_"]').select2();
            // }

            // $("#kodeproduk"+idf).select2(); 
            // tr.onload = function(){ 
            //     $('.select2').select2(); 
            // }

            detail_transaksi.appendChild(tr);
            
            idf = (idf - 1) + 2;
            document.getElementById("idf").value = idf;
            
            $(".elementbrn").select2({
                language: "id",
                placeholder: "Pilih Mesin",
                ajax: {
                    url: "<?= base_url(); ?>/Kedatangan/getBarang",
                    type: "post",
                    dataType: 'json',
                    delay: 250,
                    data: function (params) {
                        return {
                            searchTerm: params.term // search term
                        };
                    },
                    processResults: function (response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                },
            });
        }
        function hapusElemen(idf) {
            // $(idf).remove();
            $("#btn-remove"+idf).remove();
        }

        function simpandata() {
            var str     = $("form#add-form").serialize();
            $.ajax({
                url: "<?= base_url() ?>Kedatangan/save",
                type: "POST",
                data: str,                
                // type: "POST",
                beforeSend: function() {
                    Swal.fire({
                        title: 'Mohon Menunggu',
                        html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang Menyambungkan ke Database</h1>',
                        showConfirmButton: false,
                        timerProgressBar: true,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    })
                },
                success: function(response) {
                    if (response == "success") {
                        Swal.fire({
                                icon: 'success',
                                title: 'Berhasil menyimpan',
                                text: 'Halaman akan di refresh. Mohon menunggu hingga halaman di refresh',
                                timer: 2000,
                                showCancelButton: false,
                                showConfirmButton: false,
                                timerProgressBar: true,
                                didOpen: () => {
                                    Swal.showLoading()
                                    const b = Swal.getHtmlContainer().querySelector('b')
                                    timerInterval = setInterval(() => {
                                        b.textContent = Swal.getTimerLeft()
                                    }, 100)
                                },
                                willClose: () => {
                                    clearInterval(timerInterval)
                                },
                            })
                            .then(function() {
                                window.location.href = "<?php echo base_url() ?>Dashboard";
                            });
                    } else {
                        Swal.fire({
                            title: 'Gagal Masuk',
                            text: 'Username & Password tidak cocok',
                            html: '<center><lottie-player src="https://assets7.lottiefiles.com/private_files/lf30_GjhcdO.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Username & Password tidak cocok</h1>',
                            imageWidth: 400,
                            imageAlt: 'Error Login',
                        });
                    }
                    console.log(response);
                },
                error: function(response) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Opps! unable to connect to database. Error Code : ',
                        // text: 'Please Contact Administrator. Error Code : ' + response['status'] + response['statusText'],
                        html: response['responseText'],
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                    });
                    console.log(response);
                }
            });
        }
    </script>
    <!-- Page specific script -->
</html>
