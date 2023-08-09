<?php 
if ($active == 'dashboard') {
    $dashboard = 'active';
    $mdashboard = 'menu-open';
    $mbarang = '';
    $mpengaturan = '';
    $stock = '';
    $mdaftar = '';
    $listbarang = '';
    $kedatangan = '';
    $penjualan = '';
    $pengguna = '';
} elseif ($active == 'kedatangan') {
    $mbarang = 'menu-open';
    $mpengaturan = '';
    $kedatangan = 'active';
    $stock = '';
    $mdaftar = '';
    $listbarang = '';
    $dashboard = '';
    $mdashboard = '';
    $penjualan = '';
    $pengguna = '';
} elseif ($active == 'listbarang') {
    $mbarang = 'menu-open';
    $mpengaturan = '';
    $listbarang = 'active';
    $stock = '';
    $mdaftar = '';
    $kedatangan = '';
    $dashboard = '';
    $mdashboard = '';
    $penjualan = '';
    $pengguna = '';
} elseif ($active == 'stock') {
    $mbarang = 'menu-open';
    $mpengaturan = '';
    $stock = 'active';
    $listbarang = '';
    $mdaftar = '';
    $kedatangan = '';
    $dashboard = '';
    $mdashboard = '';
    $penjualan = '';
    $pengguna = '';
} elseif ($active == 'penjualan') {
    $mbarang = 'menu-open';
    $mpengaturan = '';
    $stock = '';
    $listbarang = '';
    $mdaftar = '';
    $kedatangan = '';
    $dashboard = '';
    $mdashboard = '';
    $penjualan = 'active';
    $pengguna = '';
} elseif ($active == 'pengguna') {
    $mbarang = '';
    $mpengaturan = 'menu-open';
    $stock = '';
    $listbarang = '';
    $mdaftar = '';
    $kedatangan = '';
    $dashboard = '';
    $mdashboard = '';
    $penjualan = '';
    $pengguna = 'active';
} else {
    $mbarang = '';
    $mpengaturan = '';
    $dashboard = '';
    $stock = '';
    $pengeluaran = '';
    $mdashboard = '';
    $mdaftar = '';
    $pengguna = '';
}
?>
                <!-- Main Sidebar Container -->
                    <aside class="main-sidebar sidebar-dark-primary elevation-4">
                        <!-- Brand Logo -->
                            <a href="<?= base_url() ?>Dashboard" class="brand-link">
                                <img src="<?= base_url(); ?>assets/dist/img/paintballs.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                                <span class="brand-text font-weight-light">Paintball</span>
                            </a>
                        <!-- Brand Logo -->

                        <!-- Sidebar -->
                            <div class="sidebar">
                                <!-- Sidebar user panel (optional) -->
                                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                        <div class="image">
                                            <img src="<?= base_url(); ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                                        </div>
                                        <div class="info">
                                            <a href="#" class="d-block"><?php echo $this->session->userdata('nama'); ?></a>
                                        </div>
                                    </div>
                                <!-- Sidebar user panel (optional) -->
                                <!-- SidebarSearch Form -->
                                    <!-- <div class="form-inline">
                                        <div class="input-group" data-widget="sidebar-search">
                                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                                            <div class="input-group-append">
                                                <button class="btn btn-sidebar">
                                                <i class="fas fa-search fa-fw"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div> -->
                                <!-- SidebarSearch Form -->
                                <!-- Sidebar Menu -->
                                    <nav class="mt-2">
                                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                                            <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                                            <li class="nav-item <?php echo $mdashboard; ?>">
                                                <a href="<?= base_url(); ?>Dashboard" class="nav-link <?php echo $dashboard; ?>">
                                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                                    <p>
                                                        Dashboard
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item <?php echo $mdaftar; ?>">
                                                <a href="#" class="nav-link">
                                                    <!-- <i class="nav-icon fas fa-th"></i> -->
                                                    <!-- <i class="nav-icon fas fa-box"></i> -->
                                                    <i class="nav-icon fas fa-computer"></i>
                                                    <p>
                                                        Daftar
                                                        <i class="right fas fa-angle-right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="./index3.html" class="nav-link" style="margin-left: 15px">
                                                            <i class="fa-solid fa-truck-plane"></i>
                                                            <p>Ekspedisi</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            <li class="nav-item <?php echo $mbarang; ?>">
                                                <a href="#" class="nav-link">
                                                    <!-- <i class="nav-icon fas fa-th"></i> -->
                                                    <i class="nav-icon fas fa-box"></i>
                                                    <p>
                                                        Barang
                                                        <i class="right fas fa-angle-right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="<?= base_url(); ?>Barang/List" class="nav-link <?php echo $listbarang; ?>" style="margin-left: 15px">
                                                            <i class="nav-icon fas fa-boxes fa-fw"></i>
                                                            <p>List Barang</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="<?= base_url(); ?>Stock" class="nav-link <?php echo $stock; ?>" style="margin-left: 15px">
                                                            <i class="nav-icon fa-fw fa-solid fa-cubes-stacked"></i>
                                                            <p>Stock Barang</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="<?= base_url(); ?>Kedatangan" class="nav-link <?php echo $kedatangan; ?>" style="margin-left: 15px">
                                                            <i class="fas fa-truck nav-icon fa-fw"></i>
                                                            <p>Kedatangan</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="<?= base_url(); ?>Pengeluaran" class="nav-link <?php echo $pengeluaran; ?>" style="margin-left: 15px">
                                                            <i class="fa-solid fa-truck-ramp-box nav-icon"></i>
                                                            <p>Pengeluaran</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                            <li class="nav-item">
                                                <a href="#" class="nav-link">
                                                    <i class="fa-solid nav-icon fa-magnifying-glass-location"></i>
                                                    <p>
                                                        Lacak
                                                        <i class="fas fa-angle-right right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        <a href="pages/layout/top-nav.html" class="nav-link" style="margin-left: 15px">
                                                            <i class="fa-solid fa-cart-shopping"></i>
                                                            <p>Lacak Barang</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                            
                                            <li class="nav-item <?php echo $mdashboard; ?>">
                                                <a href="#" class="nav-link">
                                                    <i class="nav-icon fas fa-wrench"></i>
                                                    <p>
                                                        Pengaturan
                                                        <i class="fas fa-angle-right right"></i>
                                                    </p>
                                                </a>
                                                <ul class="nav nav-treeview">
                                                    <li class="nav-item">
                                                        <a class="nav-link <?php echo $pengguna; ?>" style="margin-left: 15px" href="<?= base_url('user') ?>">
                                                            <i class="fas fa-2xs fa-users nav-icon"></i>
                                                            <p>Pengguna</p>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a href="pages/layout/top-nav.html" class="nav-link" style="margin-left: 15px">
                                                            <i class="fas fa-trash-can nav-icon"></i>
                                                            <p>Trash</p>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </nav>
                                <!-- Sidebar Menu -->
                            </div>
                        <!-- /.sidebar -->
                    </aside>
                <!-- Main Sidebar Container -->