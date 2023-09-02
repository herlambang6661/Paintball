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
    
    <style>
        #overlay{	
            position: fixed;
            top: 0;
            z-index: 100;
            width: 100%;
            height:100%;
            display: none;
            background: rgba(0,0,0,0.6);
        }
        .cv-spinner {
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;  
        }
        .spinner {
            /* width: 40px;
            height: 40px;
            border: 4px #ddd solid;
            border-top: 4px #2e93e6 solid;
            border-radius: 50%;
            animation: sp-anime 0.8s infinite linear;
            display: inline-block; */
            width: 50px;
            height: 50px;
            border: 5px solid #fff;
            border-radius: 50%;
            border-top-color: #2e93e6;
            animation: spin 1s ease-in-out infinite;
            -webkit-animation: spin 1s ease-in-out infinite;
        }
        @keyframes sp-anime {
            100% { 
                transform: rotate(360deg); 
            }
        }
        .is-hide{
            display:none;
        }

    @keyframes spin {
    to { -webkit-transform: rotate(360deg); }
    }
    @-webkit-keyframes spin {
    to { -webkit-transform: rotate(360deg); }
    }
    </style>
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
                                            <h1 class="m-0"><i class="nav-icon fa-fw fa-solid fa-cubes-stacked"></i> History Barang</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>Dashboard"><i class="nav-icon fas fa-tachometer-alt"></i> Dashboard</a></li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fas fa-box"></i> Barang</li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fa-fw fa-solid fa-cubes-stacked"></i> History Barang</li>
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
                                                                            <a class="nav-link active" id="custom-tabs-four-1-tab" data-toggle="pill" href="#custom-tabs-four-1" role="tab" aria-controls="custom-tabs-four-1" aria-selected="false"><i class="fa-solid fa-list-ul"></i> List History Barang</a>
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
                                                                                            <div class="col-md-12 col-lg-6">
                                                                                                <div class="table-responsive">
                                                                                                    <table id="stocklist" class="table table-sm table-bordered table-hover text-nowrap" width="100%">
                                                                                                        <thead class="bg-navy">
                                                                                                            <tr>
                                                                                                                <th width="5%">Id</th>
                                                                                                                <th width="8%">KodeBarang</th>
                                                                                                                <th>Barang</th>
                                                                                                                <th>Qty</th>
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
        $(document).ajaxSend(function() {
            $("#overlay").fadeIn(300);
        });
        $(document).ready(function(){
            $('#stocklist').dataTable({
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
                    "url": "<?= base_url(); ?>Stock/getStockDatatables",
                    "cache": "false",
                    cache: false,
                    "type": "POST",
                },
                "columns": [{
                        // "bVisible": false,
                        "aTargets": [0]
                    },
                    {className: "text-center"},
                    {className: "text-center"},
                    {className: "text-center"},
                    {
                        className: "text-center",
                        mRender: function(data, type, row) {
                            var bindHtml = '';
                            // bindHtml += '<a data-toggle="modal" data-target="#view-barang" href="javascript:void(0);" title="Lihat Detail Barang" class="viewDetail ml-1 btn-ext-small btn btn-sm btn-primary" data-id="' + row[0] + '"><i class="fas fa-eye"></i></a>';
                            bindHtml += '<a style="margin:2px" href="#myModal" class="btn ml-1 btn-ext-small btn btn-sm btn-primary" id="custId" data-toggle="modal" data-id="' + row[0] + '" data-kodebarang="' + row[1] + '"><i class="fas fa-eye fa-fw"></i></a> ';
                            return bindHtml;
                        }
                    },
                ],
                "fnCreatedRow": function(nRow, aData, iDataIndex) {
                    $(nRow).attr('id', aData[0]);
                }
            });
            function filterGlobal(v) {
                $('#stocklist').DataTable().search(
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
                $('#stocklist').DataTable().ajax.reload();
            });

            
            $('#myModal').on('show.bs.modal', function(e) {
                var rownoform = $(e.relatedTarget).data('kodebarang');
                //menggunakan fungsi ajax untuk pengambilan data
                $.ajax({
                    type: 'POST',
                    url: '<?php echo base_url(); ?>Stock/detail',
                    data: {
                        rownoform: rownoform
                    },
                    success: function(data) {
                        $('.fetched-data').html(data); //menampilkan data ke dalam modal
                    }
                }).done(function() {
                    setTimeout(function(){
                        $("#overlay").fadeOut(300);
                    },500);
                });
            });
        });
    </script>
    <!-- Page specific script -->
    
    <!-- Start Modal Detail -->
        <div class="modal fade" id="myModal" role="dialog">
            <div id="overlay">
                <div class="cv-spinner">
                    <span class="spinner"></span>
                </div>
            </div>
            <div class="modal-dialog modal-xl" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa-solid fa-circle-info"></i> Detail History Barang</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="fetched-data"></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Keluar</button>
                    </div>
                </div>
            </div>
        </div>
    <!-- End Modal Detail -->
</html>
