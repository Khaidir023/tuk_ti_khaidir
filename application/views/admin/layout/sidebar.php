<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo base_url(); ?>" class="nav-link">Home</a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="<?php echo base_url(); ?>" class="nav-link">Contact</a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url(); ?>auth/logout" role="button">
                    <i class="fas fa-th-large"></i> Logout
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="auth" class="brand-link">
            <img src="<?php echo base_url(); ?>assets/adminLTE/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
                class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">Selamat Datang</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url(); ?>assets/adminLTE/dist/img/user2-160x160.jpg"
                        class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">
                        <?php echo $this->session->userdata('nama') ?>
                    </a>
                </div>
            </div>



            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard" class="nav-link <?php if ($page_title == 'Dashboard')
                               echo 'active'; ?> ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard/mahasiswa" class="nav-link <?php if ($page_title == 'Mahasiswa')
                               echo 'active'; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Mahasiswa
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard/beasiswa" class="nav-link <?php if ($page_title == 'Beasiswa')
                               echo 'active'; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Beasiswa
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>dashboard/kost" class="nav-link <?php if ($page_title == 'kost')
                               echo 'active'; ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kost
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="<?php echo base_url(); ?>auth/logout" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">
                            <?php echo $page_title ?>
                        </h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">
                                <?php echo $page_title ?>
                            </li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->