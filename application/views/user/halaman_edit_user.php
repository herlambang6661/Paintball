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
                                            <h1 class="m-0"><i class="fas fa-truck nav-icon fa-fw"></i> Halaman</h1>
                                        </div><!-- /.col -->
                                        <div class="col-sm-6">
                                            <ol class="breadcrumb float-sm-right">
                                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>Dashboard"><i class="nav-icon fas fa-tachometer-alt"></i> Pengaturan</a></li>
                                                <li class="breadcrumb-item active"><i class="nav-icon fas fa-box"></i> Pengguna</li>
                                                <li class="breadcrumb-item active"><i class="fas fa-truck nav-icon fa-fw"></i> Halaman Pengguna</li>
                                            </ol>
                                        </div><!-- /.col -->
                                    </div><!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div>
                        <!-- /.content-header -->

            <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Edit User</h1>

                </div>
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>

                <div class="card mb-3">
                    <div class="card-header">
                        <a href="<?php echo site_url('user') ?>"><i class="fas fa-arrow-left"></i> Kembali</a>
                    </div>
                    <div class="card-body">

                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="id" value="<?php echo $produk->id ?>" />
                            <div class="form-group mb-3">
                                <label for="nama">Nama*</label>
                                <input class="form-control <?php echo form_error('nama') ? 'is-invalid' : '' ?>" type="text" name="nama" value="<?php echo $produk->nama ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('nama') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama">No Telp*</label>
                                <input class="form-control <?php echo form_error('notelp') ? 'is-invalid' : '' ?>" type="text" name="notelp" value="<?php echo $produk->notelp ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('notelp') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="nama">Email*</label>
                                <input class="form-control <?php echo form_error('email') ? 'is-invalid' : '' ?>" type="text" name="email" value="<?php echo $produk->email ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('email') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password*</label>
                                <input class="form-control <?php echo form_error('password') ? 'is-invalid' : '' ?>" type="text" name="password" value="<?php echo $produk->password ?>" />
                                <div class="invalid-feedback">
                                    <?php echo form_error('password') ?>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="akses">Role*</label>
                                <select class="form-select" aria-label="Data Role" name="akses">
                                    <option value="admin" <?= ($produk->level == 'admin') ? 'selected' : '' ?>>administrator</option>
                                    <option value="supir" <?= ($produk->level == 'supir') ? 'selected' : '' ?>>supir</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?php echo form_error('akses') ?>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mb-3">
                                <input class="btn btn-success" type="submit" name="btn" value="Save" />
                            </div>

                        </form>

                    </div>
            </main>
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
                url: "<?= base_url() ?>Kedatangan/kedatangansave",
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
                                window.location.href = "<?php echo base_url() ?>Kedatangan";
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

            $('#kedatanganlist').dataTable({
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
                    "url": "<?= base_url(); ?>Kedatangan/getKedatanganDatatables",
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
                $('#kedatanganlist').DataTable().search(
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
                $('#kedatanganlist').DataTable().ajax.reload();
            });
            
            $('#kedatanganlist').on('click', '.remove', function() {
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
        });
    </script>
    <!-- Page specific script -->
    <script src="<?= base_url() ?>assets/summernote/summernote-bs4.js"></script>
</html>
