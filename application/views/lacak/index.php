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
    <link rel="stylesheet" href="<?= base_url(); ?>assets/summernote/summernote-bs4.css">
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
                                            <h1 class="m-0"><i class="fa-solid fa-cart-shopping"></i> Lacak Barang</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>Dashboard"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fas fa-box"></i> Barang</li>
                                                <li class="breadcrumb-item active"><i class="fa-solid fa-cart-shopping"></i> Lacak Barang</li>
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
                                                                            <a class="nav-link active" id="custom-tabs-four-1-tab" data-toggle="pill" href="#custom-tabs-four-1" role="tab" aria-controls="custom-tabs-four-1" aria-selected="false"><i class="fa-solid fa-list-ul"></i> List Barang</a>
                                                                        </li>
                                                                        <li class="nav-item">
                                                                            <a class="nav-link" id="custom-tabs-four-2-tab" data-toggle="pill" href="#custom-tabs-four-2" role="tab" aria-controls="custom-tabs-four-2" aria-selected="false"><i class="fa-solid fa-truck-ramp-box"></i> Tambah Pengeluaran</a>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="card-body">
                                                                    <div class="tab-content" id="custom-tabs-four-tabContent">
                                                                        <!-- panel 1 -->
                                                                            <div class="tab-pane fade active show" id="custom-tabs-four-1" role="tabpanel" aria-labelledby="custom-tabs-four-1-tab">
                                                                                <section class="content">
                                                                                    <div class="container-fluid">
                                                                                        <div class="row">
                                                                                            <div class="col-lg-12 col-12">
                                                                                                <div class="table-responsive">
                                                                                                    <table id="pengeluaranlist" class="table table-sm table-bordered table-hover text-nowrap" width="100%">
                                                                                                        <thead class="bg-green">
                                                                                                            <tr>
                                                                                                                <th width="5%">Id</th>
                                                                                                                <th width="8%">No Form</th>
                                                                                                                <th width="8%">KodeItem</th>
                                                                                                                <th width="8%">KodeBarang</th>
                                                                                                                <th>Barang</th>
                                                                                                                <th>Qty</th>
                                                                                                                <th>Harga</th>
                                                                                                                <th width="8%">Opsi</th>
                                                                                                            </tr>
                                                                                                        </thead>
                                                                                                    </table>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </section>                                                                        
                                                                            </div>
                                                                        <!-- panel 1 -->
                                                                        <!-- panel 2 -->
                                                                            <div class="tab-pane fade" id="custom-tabs-four-2" role="tabpanel" aria-labelledby="custom-tabs-four-2-tab">
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                <div class="mb-3">
                                                                                                    <label for="" class="form-label">Nomor Form Keluar</label>
                                                                                                    <input type="text" readonly class="form-control form-control-sm" placeholder="" aria-describedby="helpId" value="<?php echo $kodeBarang; ?>">
                                                                                                </div>
                                                                                                <div class="mb-3">
                                                                                                    <label for="" class="form-label">Tanggal</label>
                                                                                                    <input type="date" name="tanggal" id="" class="form-control form-control-sm" placeholder="" aria-describedby="helpId" value="<?php echo date('Y-m-d');?>">
                                                                                                </div>
                                                                                                <div class="mb-3">
                                                                                                    <label for="" class="form-label">Pilih Barang</label>
                                                                                                    <div class="d-inline"><select class="caribarang" class="form-control form-control-sm" style="width:100%"></select></div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-9">
                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                <div class="mb-3">
                                                                                                    <div class="col-lg-5">
                                                                                                        <!-- <div class="d-inline"><button type="button" class="btn btn-sm btn-primary"><i class="fa fa-check" aria-hidden="true"></i></button></div> -->
                                                                                                        <div id="tunggu"></div>
                                                                                                        <div id="resCarBar"></div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                
                                                                                <input id="idf" value="1" type="hidden" />
                                                                                <table id="detail_transaksi" class="table table-sm control-group text-nowrap" border="1" style="width: 100%;text-align:center;font-weight: bold;">
                                                                                    <thead>
                                                                                        <td style="border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;" width="5%"></td>
                                                                                        <td style="border-color:black" class="bg-gradient-success text-white" width="20%">Nama</td>
                                                                                        <td style="border-color:black" class="bg-gradient-success text-white" width="10%">Qty</td>
                                                                                        <td style="border-color:black" class="bg-gradient-success text-white" width="10%">Satuan</td>
                                                                                    </thead>
                                                                                </table>
                                                                                <div class="row">
                                                                                    <div class="col">
                                                                                        <div class="card">
                                                                                            <div class="card-body">
                                                                                                <label class="form-label">Keterangan Tambahan</label>
                                                                                                <textarea  name="keteranganform" id="keteranganform"></textarea>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <button type="button" class="btn btn-info" onclick="simpandata()"><i class="fas fa-save"></i> Simpan</button>
                                                                            </div>
                                                                        <!-- panel 2 -->
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
        
        $(document).on('click', '.tambahkebawah', function() {
            var qty_atas = $(this).data('qty');
            var satuan_atas = $(this).data('satuan');
            var harga_atas = $(this).data('harga');
            var kurs_atas = $(this).data('kurs');
            var trucking_atas = $(this).data('trucking');
            var beacukai_atas = $(this).data('beacukai');
            
            var namabrg_atas = $(this).data('namabrg');
            var idbrg_atas = $(this).data('idbrg');
            
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
            td.innerHTML += '<select name="namabarang[]" class="form-control form-control-sm elementbrn inputNone" style="width:100%"><option value="'+idbrg_atas+'" selected="selected">('+idbrg_atas+') ' +namabrg_atas+'</option></select>';
            tr.appendChild(td);

            // Kolom 3 Qty
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' name='qty[]' value='"+qty_atas+"' id='qty_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 4 Satuan
            var td = document.createElement("td");
            td.innerHTML += "<input type='text' readonly name='satuan[]' value='"+satuan_atas+"' id='satuan_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 5 Harga
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' readonly name='harga[]' value='"+harga_atas+"' id='harga_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Kurs
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' readonly name='kurs[]' value='"+kurs_atas+"' id='kurs_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Trucking
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' readonly name='trucking[]' value='"+kurs_atas+"' id='trucking_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

            // Kolom 6 Bea Cukai
            var td = document.createElement("td");
            td.innerHTML += "<input type='number' readonly name='beacukai[]' value='"+beacukai_atas+"' id='beacukai_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
            tr.appendChild(td);

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
        });
        // function tambahItem() {
            
        //     var idf = document.getElementById("idf").value;
        //     var detail_transaksi = document.getElementById("detail_transaksi");
            
        //     var tr = document.createElement("tr");
        //     tr.setAttribute("id", "btn-remove"+idf);

        //     // Kolom 1 Hapus
        //     var td = document.createElement("td");
        //     td.setAttribute("align","center");
        //     td.setAttribute("style", "border-left-color:#FFFFFF;border-top-color:#FFFFFF;border-bottom-color:#FFFFFF;");
        //     td.innerHTML += '<button class="btn btn-danger btn-sm remove" type="button" onclick="hapusElemen('+idf+');"><i class="fa-regular fa-trash-can"></i> </button>';
        //     tr.appendChild(td);

        //     // Kolom 2 Nama Barang
        //     var td = document.createElement("td");
        //     td.innerHTML += '<select name="namabarang[]" class="form-control form-control-sm elementbrn inputNone" style="width:100%"><option></option></select>';
        //     tr.appendChild(td);

        //     // Kolom 3 Qty
        //     var td = document.createElement("td");
        //     td.innerHTML += "<input type='number' name='qty[]' id='qty_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
        //     tr.appendChild(td);

        //     // Kolom 4 Satuan
        //     var td = document.createElement("td");
        //     td.innerHTML += "<input type='text' name='satuan[]' id='satuan_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
        //     tr.appendChild(td);

        //     // Kolom 5 Harga
        //     var td = document.createElement("td");
        //     td.innerHTML += "<input type='number' name='harga[]' id='harga_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
        //     tr.appendChild(td);

        //     // Kolom 6 Kurs
        //     var td = document.createElement("td");
        //     td.innerHTML += "<input type='number' name='kurs[]' id='kurs_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
        //     tr.appendChild(td);

        //     // Kolom 6 Trucking
        //     var td = document.createElement("td");
        //     td.innerHTML += "<input type='number' name='trucking[]' id='trucking_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
        //     tr.appendChild(td);

        //     // Kolom 6 Bea Cukai
        //     var td = document.createElement("td");
        //     td.innerHTML += "<input type='number' name='beacukai[]' id='beacukai_"+idf+"' class='form-control form-control-sm inputNone' style='border-color:black;text-transform: uppercase;'>";
        //     tr.appendChild(td);

        //     detail_transaksi.appendChild(tr);
            
        //     idf = (idf - 1) + 2;
        //     document.getElementById("idf").value = idf;
            
        //     $(".elementbrn").select2({
        //         language: "id",
        //         placeholder: "Pilih Mesin",
        //         ajax: {
        //             url: "<?= base_url(); ?>/Kedatangan/getBarang",
        //             type: "post",
        //             dataType: 'json',
        //             delay: 250,
        //             data: function (params) {
        //                 return {
        //                     searchTerm: params.term // search term
        //                 };
        //             },
        //             processResults: function (response) {
        //                 return {
        //                     results: response
        //                 };
        //             },
        //             cache: true
        //         },
        //     });
        // }
        function hapusElemen(idf) {
            // $(idf).remove();
            $("#btn-remove"+idf).remove();
        }

        function simpandata() {
            var str     = $("form#add-form").serialize();
            $.ajax({
                url: "<?= base_url() ?>Pengeluaran/pengeluaransave",
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
                                window.location.href = "<?php echo base_url() ?>Pengeluaran";
                            });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Gagal Menyimpan',
                            text: 'Tidak ada data yang diinput, pastikan input anda benar',
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

        
        $(document).ready(function(){
            $('#keteranganform').summernote({
                height: 100,                 // set editor height
                minHeight: null,             // set minimum height of editor
                maxHeight: null,             // set maximum height of editor
                focus: true,                  // set focus to editable area after initializing summernote
                // placeholder: 'Masukkan Keterangan tambahan jika diperlukan',
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    // ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontsize', ['fontsize']],
                    // ['color', ['color']],
                    ['para', [
                        'ul', 
                        'ol', 
                        // 'paragraph'
                    ]],
                    ['misc', ['undo', 'redo']]
                    // ['height', ['height']]
                ]
            });

            $('#pengeluaranlist').dataTable({
                "lengthChange": true,
                "paging": true,
                "processing": true,
                "serverSide": true,
                "order": [],
                "lengthMenu": [
                    [30, 5, 10, 25, 50, -1],
                    ['Default', '5', '10', '25', '50', 'Tampilkan Semua']
                ],
                "language": {
                    "lengthMenu": "_MENU_ ",
                    "zeroRecords": "Data Tidak Ditemukan",
                    "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ total data",
                    "infoEmpty": "Data Tidak Ditemukan",
                    "infoFiltered": "(Difilter dari _MAX_ total records)",
                    "processing": '<b>Sedang memuat data<b><br><span class="loader"></span>',
                    "search": "<i class='fas fa-search'></i>",
                    "paginate": {
                        "first":      "Awal",
                        "last":       "Akhir",
                        "next":       "<i class='fa-solid fa-forward'></i>",
                        "previous":   "<i class='fa-solid fa-backward'></i>"
                    },
                },
                // "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'><'col-sm-7'p>>",
                "buttons": [
                    {
                        "className": 'btn btn-sm btn-info',
                        "text": '<i class="fa-solid fa-arrows-rotate"></i> Refresh',
                        "action": function ( e, dt, node, config ) {
                                    dt.ajax.reload();
                                }
                    }
                ],
                "ajax": {
                    "url": "<?= base_url(); ?>pengeluaran/getPengeluaranDatatables",
                    "cache": "false",
                    cache: false,
                    "type": "POST",
                },
                "columns": [{
                        "bVisible": false,
                        "aTargets": [0]
                    },{
                        "bVisible": false,
                        "aTargets": [0]
                    },
                    {className: "text-center"},
                    {className: "text-center"},
                    {className: "text-center"},
                    {className: "text-center"},
                    {className: "text-center"},
                    {
                        className: "text-center",
                        mRender: function(data, type, row) {
                            var bindHtml = '';
                            bindHtml += '<a data-toggle="modal" data-target="#update-barang" href="javascript:void(0);" title="Ubah Data Barang" class="update-barang-details ml-1 btn-ext-small btn btn-sm btn-primary" data-id="' + row[0] + '"><i class="fas fa-edit"></i></a>';
                            bindHtml += '<a data-toggle="modal" href="javascript:void(0);" title="Hapus Data Barang" class="remove ml-1 btn-ext-small btn btn-sm btn-danger" data-id="' + row[0] + '" data-nama="' + row[4] + '" data-kode="' + row[2] + '"><i class="fas fa-trash"></i></a>';
                            return bindHtml;
                        }
                    },

                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData[0]);
                }
            });

            function filterGlobal(v) {
                $('#pengeluaranlist').DataTable().search(
                    v,
                    false,
                    false
                ).draw();
            }
            $('input.global_filter').on('keyup click', function() {
                var v = $(this).val();
                filterGlobal(v);
            });
            $('input.column_filter').on('keyup click', function() {
                $('#pengeluaranlist').DataTable().ajax.reload();
            });
            
            $('#pengeluaranlist').on('click', '.remove', function() {
                var id = $(this).data('id');
                var kode = $(this).data('kode');
                var nama = $(this).data('nama');

                swal.fire({
                    title: 'Apakah Anda Yakin?',
                    text: "Data akan dihapus : " + nama + " ( " + kode + " ) ",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya',
                    cancelButtonText: 'Tidak',
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                                url: '<?= base_url() ?>Barang/',
                                type: 'POST',
                                data: {
                                    id: id,
                                },
                                dataType: 'json',
                            
                                beforeSend: function() {
                                    Swal.fire({
                                        title: 'Mohon Menunggu',
                                        html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang Menghapus Data</h1>',
                                        showConfirmButton: false,
                                        timerProgressBar: true,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                    })
                                },
                                success: function (returnhtml) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: "Berhasil!",
                                        html: 'Data sudah terhapus, Mohon menunggu hingga halaman di Refresh',
                                        showConfirmButton: false,
                                        allowOutsideClick: false,
                                        allowEscapeKey: false,
                                        showCancelButton: false,
                                        showConfirmButton: false
                                    });
                                    location.reload(true);
                                },
                                error: function(xhr) { // if error occured
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'Something went wrong! Error Code:'+xhr,
                                    })
                                },
                                
                            })
                            .done(function(response) {
                                swal.fire('Terhapus', response.message, response.status);
                                table.ajax.reload(null, false);
                                location.reload();
                            })
                            .fail(function() {
                                swal.fire('Oops...', 'Something went wrong with ajax !', 'error');
                            });
                    }

                })
            });
        });
        $(document).ready(function() {
            // $('.js-example-basic-single').select2();
            
            $(".caribarang").select2({
                language: "id",
                placeholder: "Pilih Barang",
                theme: "classic",
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
            $('.caribarang').on('select2:select', function (e) {
                var data = e.params.data;
                console.log(data.id);
                
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url() ?>Pengeluaran/cari",
                    data:{ keyword: data.id },
                    beforeSend: function(){
                        $("#resCarBar").hide();
                        $("#tunggu").html('<p style="color:green"><blink>tunggu sebentar</blink></p>');
                    },
                    success: function(html){
                        $("#tunggu").html('');
                        $("#resCarBar").show();
                        $("#resCarBar").html(html);
                    }
                });
            });
        });
    </script>
    <!-- Page specific script -->
    <script src="<?= base_url() ?>assets/summernote/summernote-bs4.js"></script>
</html>
