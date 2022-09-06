<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
   <!-- Brand Logo -->
   <a href="index3.html" class="brand-link">
      <img src="<?= base_url('assets/img/logo/fs-logo.png'); ?>" alt="FS Logo" class="brand-image img-circle my-1 ms-2" height="27" width="27"
         style="filter: invert(1);">
      <span class="brand-text font-weight-light ms-4">FS Admin</span>
   </a>

   <!-- Sidebar -->
   <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
         <div class="image">
            <img src="<?= base_url('template'); ?>/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
         </div>
         <div class="info">
            <a href="#" class="d-block"><?= $this->session->userdata('nama_user'); ?></a>
         </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
         <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
               <a href="<?= base_url('admin'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == '') {
                                                                        echo "active";
                                                                     } ?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                     Dashboard
                  </p>
               </a>
            </li>

            <li class="nav-item <?php if ($this->uri->segment(1) == 'stuff' && 'category' && 'brand') {
                                    echo "menu-open";
                                 } ?>">
               <a href="#" class="nav-link nav-item <?php if ($this->uri->segment(1) == 'stuff') {
                                                         echo "active";
                                                      } ?>">
                  <i class="nav-icon fas fa-home"></i>
                  <p>
                     Store
                     <i class="right fas fa-angle-left"></i>
                  </p>
               </a>
               <ul class="nav nav-treeview">
                  <li class="nav-item">
                     <a href="<?= base_url('stuff'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'stuff') {
                                                                              echo "active";
                                                                           } ?>">
                        <i class="far fa-<?php if ($this->uri->segment(1) == 'stuff') {
                                             echo "dot-";
                                          } ?>circle nav-icon"></i>
                        <p>Stuff</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('category'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'category') {
                                                                                 echo "active";
                                                                              } ?>">
                        <i class="far fa-<?php if ($this->uri->segment(1) == 'category') {
                                             echo "dot-";
                                          } ?>circle nav-icon"></i>
                        <p>Categories</p>
                     </a>
                  </li>
                  <li class="nav-item">
                     <a href="<?= base_url('brand'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'brand') {
                                                                              echo "active";
                                                                           } ?>">
                        <i class="far fa-<?php if ($this->uri->segment(1) == 'brand') {
                                             echo "dot-";
                                          } ?>circle nav-icon"></i>
                        <p>Brand</p>
                     </a>
                  </li>
               </ul>
            </li>

            <li class="nav-item">
               <a href="<?= base_url('pic'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'pic') {
                                                                     echo "active";
                                                                  } ?>">
                  <i class="nav-icon fas fa-solid fa-image"></i>
                  <p>
                     Pictures
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?= base_url('admin/orders'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'admin' and $this->uri->segment(2) == 'orders') {
                                                                              echo "active";
                                                                           } ?>">
                  <i class="nav-icon fas fa-solid fa-download"></i>
                  <p>
                     Incoming Order
                     <span class="right badge badge-primary">3</span>
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?= base_url('user'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') {
                                                                     echo "active";
                                                                  } ?>">
                  <i class="nav-icon fas fa-users"></i>
                  <p>
                     User
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?= base_url('report'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'report') {
                                                                        echo "active";
                                                                     } ?>">
                  <i class="nav-icon fas fa-solid fa-book"></i>
                  <p>
                     Sales Report
                  </p>
               </a>
            </li>

            <li class="nav-item">
               <a href="<?= base_url('admin/setting'); ?>" class="nav-link <?php if ($this->uri->segment(1) == 'setting') {
                                                                              echo "active";
                                                                           } ?>">
                  <i class="nav-icon fas fa-solid fa-gear"></i>
                  <p>
                     Setting
                  </p>
               </a>
            </li>


            <li class="nav-item">
               <a href="<?= base_url('auth/logout_user'); ?>" class="nav-link text-danger ">
                  <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
                  <p class="float-bottom">
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
               <h1 class="m-0"><?= $title; ?></h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a class=" text-muted" href="<?= base_url('admin'); ?>">Admin</a></li>
                  <li class="breadcrumb-item"><strong><?= $title; ?></strong></li>
               </ol>
            </div><!-- /.col -->
         </div><!-- /.row -->
      </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->

   <!-- Main content -->
   <div class="content">
      <div class="container-fluid">
         <div class="row">