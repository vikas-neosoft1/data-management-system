<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $heading;?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <?php /*<!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  */?>
   <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo base_url(ASSETS);?>plugins/summernote/summernote-bs4.min.css">
   
  <link rel="stylesheet" href="<?php echo base_url(ASSETS)?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(ASSETS)?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url(ASSETS)?>plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <script src="<?php echo base_url(ASSETS);?>plugins/jquery/jquery.min.js"></script>  
   
    <style>
       .error{color:red;}
    </style>
</head>
 <body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">
 
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      
    </ul>

    
  </nav>
  <!-- /.navbar --> 
 
 <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">DMS</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <i class="fa fa-user"></i> 
          <?php /* <img src="<?php echo base_url(ASSETS);?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          */?>
         </div>  
        <div class="info">
          <a href="#" class="d-block"><?php echo $this->session->first_name;?>(<?php echo $this->session->user_role;?>)</a>
        </div>
      </div>

    <?php $userRole = $this->session->role;?>
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <?php if($userRole == 1) { ?> 
          <li class="nav-item menu-open">
            <a href="<?php echo base_url('home');?>" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>
           
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User  Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("user/add_edit");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("user")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Users</p>
                </a>
              </li>
            </ul>  
          </li> 
           
          <?php } ?>
           
          
           <?php ## user admnin  
            if($userRole ==2) { ?>
             <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user"></i>
              <p>
                User  Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("user/add_edit");?>" class="nav-link">
                  <i class="far fa-plus"></i>
                  <p>Add User</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("user")?>" class="nav-link">
                  <i class="far fa-list"></i>
                  <p>View Users</p>
                </a>
              </li>
            </ul>  
          </li>  
          <?php  } ?>
           
          <?php if($userRole == 3) {   ?> 
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Category  Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("product/add_edit_category");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Category</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("product/category")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Categories</p>
                </a>
              </li>
            </ul>  
          </li> 
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Product  Management
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="<?php echo base_url("product/add_edit");?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Product</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url("product")?>" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Products</p>
                </a>
              </li>
            </ul>  
          </li> 
           
          <?php } ?> 
           
          <li class="nav-header"></li>
          <li class="nav-item">
            <a href="<?php echo base_url("home/logout")?>" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Logout</p>
            </a>
          </li>   
          
          
          
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
   
    
   