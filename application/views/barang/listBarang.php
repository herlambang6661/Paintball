<!DOCTYPE html>
<html lang="en">
    <!-- Library Header -->
    <?php $this->load->view('template/libHeader'); ?>
    
    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
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
                                            <h1 class="m-0"><i class="nav-icon fas fa-boxes fa-fw"></i> List Barang</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>Dashboard"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fas fa-box"></i> Barang</li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fas fa-boxes fa-fw"></i> List Barang</li>
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
                                                        <div class="card card-primary card-outline card-outline-tabs">
                                                            <div class="card-header p-0 border-bottom-0">
                                                                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                                                                    <li class="nav-item">
                                                                        <a class="nav-link active" id="custom-tabs-four-home-tab" data-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="false"><i class="fa-solid fa-list-ul"></i> List Barang</a>
                                                                    </li>
                                                                    <!-- <li class="nav-item">
                                                                        <a class="nav-link" id="custom-tabs-four-profile-tab" data-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Tambah Barang</a>
                                                                    </li> -->
                                                                </ul>
                                                            </div>
                                                            <div class="card-body">
                                                                <div class="tab-content" id="custom-tabs-four-tabContent">
                                                                    <div class="tab-pane fade active show" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                                                        <section class="content">
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-6">
                                                                                        <div class="card card-primary callout callout-success">
                                                                                                <div class="card-body">
                                                                                                    <form id="tambahBarang">
                                                                                                        <div class="form-group">
                                                                                                            <label for="tanggal">Tanggal</label>
                                                                                                            <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" value="<?= date('Y-m-d');?>">
                                                                                                        </div>
                                                                                                        <div class="form-group">
                                                                                                            <label for="namabarang">Nama Barang</label>
                                                                                                            <input type="text" class="form-control form-control-sm" name="namabarang" placeholder="Masukkan Nama Barang">
                                                                                                        </div>
                                                                                                    </form>
                                                                                                    <button type="submit" class="btn btn-primary btn-sm" id='add-barang'><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
                                                                                                    <br><br>
                                                                                                    <span id="msg"></span>
                                                                                                </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-6">
                                                                                        <div class="table-responsive">
                                                                                            <table id="example1" class="table table-sm table-bordered table-hover" width="100%">
                                                                                                <thead class="bg-navy">
                                                                                                    <tr>
                                                                                                        <th width="5%">Id</th>
                                                                                                        <th width="15%">Tanggal</th>
                                                                                                        <th width="15%">KodeBarang</th>
                                                                                                        <th>Barang</th>
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
                                                                    <!-- <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                                                        <section class="content">
                                                                            <div class="container-fluid">
                                                                                <div class="row">
                                                                                    <div class="col-lg-4 col-6">
                                                                                        <div class="card card-primary callout callout-success">
                                                                                            <form>
                                                                                                <div class="card-body">
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleInputEmail1">Nama Barang</label>
                                                                                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleInputPassword1">Password</label>
                                                                                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card-footer">
                                                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                    <div class="col-lg-8 col-6">
                                                                                        <div class="card card-primary callout callout-info">
                                                                                            <form>
                                                                                                <div class="card-body">
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleInputEmail1">Email address</label>
                                                                                                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleInputPassword1">Password</label>
                                                                                                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                                                                                                    </div>
                                                                                                    <div class="form-group">
                                                                                                        <label for="exampleInputFile">File input</label>
                                                                                                        <div class="input-group">
                                                                                                            <div class="custom-file">
                                                                                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                                                            </div>
                                                                                                            <div class="input-group-append">
                                                                                                                <span class="input-group-text">Upload</span>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="form-check">
                                                                                                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                                                                                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                                                                                    </div>
                                                                                                </div>
                                                                                                <div class="card-footer">
                                                                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                                                                </div>
                                                                                            </form>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </section>
                                                                    </div> -->
                                                                </div>
                                                            </div>
                                                        </div>
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
    <!-- Library Footer -->
    
    <!-- Page specific script -->
    <script>        
        jQuery(document).ready(function() {
            jQuery('#example1').dataTable({
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
                // "dom": "<'row mb-2'<'col-12 text-left'B>>" + "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'><'col-sm-7'p>>",
                "dom": "<'row'<'col-sm-6'l><'col-sm-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-5'><'col-sm-7'p>>",
                "buttons": [
                    // {
                    //     "className": 'btn btn-sm btn-primary',
                    //     "text": '<i class="fa fa-plus text-white"></i> Tambah Data Mesin',
                    //     "action": function (e, node, config){
                    //                 $('#staticMesin').modal('show')
                    //             }
                    // },
                    {
                        "className": 'btn btn-sm btn-info',
                        "text": '<i class="fa-solid fa-arrows-rotate"></i> Refresh',
                        "action": function ( e, dt, node, config ) {
                                    dt.ajax.reload();
                                }
                    }
                ],
                "ajax": {
                    "url": "<?= base_url(); ?>Barang/getBarangDatatables",
                    "cache": "false",
                    cache: false,
                    "type": "POST",
                },
                "columns": [{
                        "bVisible": false,
                        "aTargets": [0]
                    },
                    {className: "text-center"},
                    {className: "text-center"},
                    {className: "text-center"},
                    {
                        className: "text-center",
                        mRender: function(data, type, row) {
                            var bindHtml = '';
                            bindHtml += '<a data-toggle="modal" data-target="#update-barang" href="javascript:void(0);" title="Ubah Data Barang" class="update-barang-details ml-1 btn-ext-small btn btn-sm btn-primary" data-id="' + row[0] + '"><i class="fas fa-edit"></i></a>';
                            bindHtml += '<a data-toggle="modal" href="javascript:void(0);" title="Hapus Data Barang" class="remove ml-1 btn-ext-small btn btn-sm btn-danger" data-id="' + row[0] + '" data-nama="' + row[3] + '" data-kode="' + row[2] + '"><i class="fas fa-trash"></i></a>';
                            return bindHtml;
                        }
                    },

                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData[0]);
                }
            });

            function filterGlobal(v) {
                jQuery('#example1').DataTable().search(
                    v,
                    false,
                    false
                ).draw();
            }
            jQuery('input.global_filter').on('keyup click', function() {
                var v = jQuery(this).val();
                filterGlobal(v);
            });
            jQuery('input.column_filter').on('keyup click', function() {
                jQuery('#example1').DataTable().ajax.reload();
            });
        });
    
        $(function() {
            $('#add-barang').click(function() {
                var str     = $("form").serialize();
                // var str     = $("form#tambahBarang").serialize();
                alert(str);
                $.ajax({
                    url: "<?= base_url() ?>Barang/save",
                    type: "POST",
                    data: str,
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Mohon Menunggu',
                            html: '<center><lottie-player src="https://assets9.lottiefiles.com/private_files/lf30_al2qt2jz.json"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></center><br><h1 class="h4">Sedang Menambahkan Data</h1>',
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
                            html: 'Mohon menunggu hingga halaman di Refresh',
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
                });
            });
        });

        $('#example1').on('click', '.remove', function() {
            var id = $(this).data('id');
            var kode = $(this).data('kode');
            var nama = $(this).data('nama');

            swal.fire({
                title: 'Apakah Anda Yakin?',
                text: "Data akan dihapus : " + nama + "( "+ kode +" )",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak',
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                            url: '<?= base_url() ?>Barang/delete',
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
    </script>
</html>
