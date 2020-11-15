<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-lg-none">
            <a class="nav-link" href="<?= site_url(); ?>panitia">
                <img src="<?= base_url(); ?>public/assets/frontend/images/logo.png" alt="FOKRI GAMES VI" class="brand-image img-circle mr-2" style="background: white; height: 20px;"><span class="text-bold">FOKRI GAMES VI</span>
            </a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fas fa-user-circle"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <a class="dropdown-item">
                    <!-- Message Start -->
                    <div class="media">
                        <!-- <img src="<?= base_url(); ?>public/assets/adminlte/dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle"> -->
                        <div class="media-body">
                            <h3 class="dropdown-item-title">
                                <?= $panitia->nama_panitia; ?>
                            </h3>
                            <p class="text-sm text-muted"><i class="fas fa-leaf mr-1"></i> Bidang <?= $panitia->nama_bidang; ?></p>
                        </div>
                    </div>
                    <!-- Message End -->
                </a>
                <div class="dropdown-divider"></div>
                <a href="<?= site_url(); ?>panitia/logout" class="dropdown-item">
                    <i class="fas fa-power-off mr-2"></i> Keluar
                </a>
            </div>
        </li>
    </ul>
</nav>

<aside class="main-sidebar sidebar-light-danger elevation-1">
    <!-- Brand Logo -->
    <a href="<?= site_url(); ?>panitia" class="brand-link">
        <img src="<?= base_url(); ?>public/assets/frontend/images/logo.png" alt="FOKRI GAMES VI" class="brand-image img-circle elevation-3" style="background: white;">
        <span class="brand-text">FOKRI GAMES VI</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar os-host os-theme-light os-host-overflow os-host-overflow-y os-host-resize-disabled os-host-scrollbar-horizontal-hidden os-host-transition">
        <div class="os-resize-observer-host">
            <div class="os-resize-observer observed" style="left: 0px; right: auto;"></div>
        </div>
        <div class="os-size-auto-observer" style="height: calc(100% + 1px); float: left;">
            <div class="os-resize-observer observed"></div>
        </div>
        <div class="os-content-glue" style="margin: 0px -8px;"></div>
        <div class="os-padding">
            <div class="os-viewport os-viewport-native-scrollbars-invisible" style="overflow-y: scroll; right: 0px; bottom: 0px;">
                <div class="os-content" style="padding: 0px 8px; height: 100%; width: 100%;">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <i class="fas fa-user-circle fa-2x py-3"></i>
                        </div>
                        <div class="info">
                            <span class="d-block"><?= $panitia->nama_panitia; ?></span>
                            <span class="d-block text-secondary"><i class="fas fa-leaf mr-1"></i> Bidang <?= $panitia->nama_bidang; ?></span>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                            <li class="nav-item">
                                <a href="<?= site_url(); ?>panitia" class="nav-link <?= (uri_string() == 'panitia') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-tachometer-alt"></i>
                                    <p>
                                        Dasbor Panitia
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url(); ?>panitia/pendaftar" class="nav-link <?= (uri_string() == 'panitia/pendaftar') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-user"></i>
                                    <p>
                                        Data PJ Kontingen
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url(); ?>panitia/peserta" class="nav-link <?= (uri_string() == 'panitia/peserta') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Data Peserta
                                    </p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= site_url(); ?>panitia/akun-panitia" class="nav-link <?= (uri_string() == 'panitia/akun-panitia') ? 'active' : ''; ?>">
                                    <i class="nav-icon fas fa-cogs"></i>
                                    <p>
                                        Akun Panitia
                                    </p>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-horizontal os-scrollbar-unusable os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="width: 100%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar os-scrollbar-vertical os-scrollbar-auto-hidden">
            <div class="os-scrollbar-track">
                <div class="os-scrollbar-handle" style="height: 45.3895%; transform: translate(0px, 0px);"></div>
            </div>
        </div>
        <div class="os-scrollbar-corner"></div>
    </div>
    <!-- /.sidebar -->
</aside>