<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Office Management System | Bhavi Creations</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/Ionicons/css/ionicons.min.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">


  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <!-- Bootstrap Toggle Css -->
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">

    <header class="main-header">
      <!-- Logo -->
      <a href="index2.html" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>B</b>C</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Bhavi</b> Creations</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="<?php echo base_url(); ?>assets/dist/img/bhavi.jpg" class="user-image" alt="User Image">
                <span class="hidden-xs">Admin</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/dist/img/bhavi.jpg" class="img-circle" alt="User Image">
                  <p>Admin</p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url(); ?>admin-profile" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="<?php echo base_url(); ?>assets/dist/img/bhavi.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>Admin</p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>


          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Department</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-department"><i class="fa fa-circle-o"></i> Add Department</a></li>
              <li><a href="<?php echo base_url(); ?>manage-department"><i class="fa fa-circle-o"></i> Manage Department</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-user"></i> <span>Staff</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-staff"><i class="fa fa-circle-o"></i> Add Staff</a></li>
              <li><a href="<?php echo base_url(); ?>manage-staff"><i class="fa fa-circle-o"></i> Manage Staff</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-inr"></i> <span>Salary</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-salary"><i class="fa fa-circle-o"></i> Add Salary</a></li>
              <li><a href="<?php echo base_url(); ?>manage-salary"><i class="fa fa-circle-o"></i> Manage Salary</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-users"></i> <span>Clients</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-client"><i class="fa fa-circle-o"></i> Add Client</a></li>
              <li><a href="<?php echo base_url(); ?>manage-client"><i class="fa fa-circle-o"></i> Manage Client</a></li>
            </ul>
          </li>

          <!--<li class="treeview">-->
          <!--  <a href="#">-->
          <!--    <i class="fa fa-cubes"></i> <span>Suppliers</span>-->
          <!--    <span class="pull-right-container">-->
          <!--      <i class="fa fa-angle-left pull-right"></i>-->
          <!--    </span>-->
          <!--  </a>-->
          <!--  <ul class="treeview-menu">-->
          <!--    <li><a href="<?php echo base_url(); ?>add-suppliers"><i class="fa fa-circle-o"></i> Add Suppliers</a></li>-->
          <!--    <li><a href="<?php echo base_url(); ?>manage-suppliers"><i class="fa fa-circle-o"></i> Manage Suppliers</a></li>-->
          <!--  </ul>-->
          <!--</li>-->

          <!--<li class="treeview">-->
          <!--  <a href="#">-->
          <!--    <i class="fa fa-cubes"></i> <span>Stock</span>-->
          <!--    <span class="pull-right-container">-->
          <!--      <i class="fa fa-angle-left pull-right"></i>-->
          <!--    </span>-->
          <!--  </a>-->
          <!--  <ul class="treeview-menu">-->
          <!--    <li><a href="<?php echo base_url(); ?>add-products"><i class="fa fa-circle-o"></i> Add Stock</a></li>-->
          <!--    <li><a href="<?php echo base_url(); ?>manage-products"><i class="fa fa-circle-o"></i> Manage Stock</a></li>-->
          <!--  </ul>-->
          <!--</li>-->

          <li class="treeview">
            <a href="#">
              <i class="fa fa-star"></i> <span>Projects</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-projects"><i class="fa fa-circle-o"></i> Add Projects</a></li>
              <li><a href="<?php echo base_url(); ?>manage-projects"><i class="fa fa-circle-o"></i> Manage Projects</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-star"></i> <span>Project Tasks</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-project-tasks"><i class="fa fa-circle-o"></i> Add Project Tasks</a></li>
              <li><a href="<?php echo base_url(); ?>manage-project-tasks"><i class="fa fa-circle-o"></i> Manage Project Tasks</a></li>
                <li><a href="<?php echo base_url(); ?>manage-worksheets"><i class="fa fa-circle-o"></i>Manage Worksheets</a></li>  <!--aaded by raklumar-->
            </ul>
          </li>
          <!-- <li class="treeview"><span>Manage Worksheets</span></li> -->
         
      

          <li class="treeview">
            <a href="#">
              <i class="fa fa-table"></i> <span>Work Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-work-reports"><i class="fa fa-circle-o"></i> Add Work Reports</a></li>
              <li><a href="<?php echo base_url(); ?>manage-work-reports"><i class="fa fa-circle-o"></i> View Work Reports</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-check-circle"></i> <span>Leave</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>approve-leave"><i class="fa fa-circle-o"></i> Approve Leave</a></li>
              <li><a href="<?php echo base_url(); ?>leave-history"><i class="fa fa-circle-o"></i> Leave History</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-snowflake-o"></i> <span>Holidays</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-holidays"><i class="fa fa-circle-o"></i> Add holidays</a></li>
              <li><a href="<?php echo base_url(); ?>manage-holidays"><i class="fa fa-circle-o"></i> Manage Holidays</a></li>
            </ul>
          </li>

           <li class="treeview">
            <a href="#">
              <i class="fa fa-cogs"></i> <span>Settings</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('Company_settings'); ?>"><i class="fa fa-circle-o"></i> Company Assets</a></li>
            </ul>
          </li>

          <!--<li class="treeview">-->
          <!--  <a href="#">-->
          <!--    <i class="fa fa-list"></i> <span>Marketing</span>-->
          <!--    <span class="pull-right-container">-->
          <!--      <i class="fa fa-angle-left pull-right"></i>-->
          <!--    </span>-->
          <!--  </a>-->
          <!--  <ul class="treeview-menu">-->
          <!--    <li><a href="<?php echo base_url(); ?>add-appointments"><i class="fa fa-circle-o"></i> Add Appointments</a></li>-->
          <!--    <li><a href="<?php echo base_url(); ?>manage-appointments"><i class="fa fa-circle-o"></i> Manage Appointments</a></li>-->
          <!--  </ul>-->
          <!--</li>-->

          <li><a href="<?php echo base_url(); ?>manage-attendance"><i class="fa fa-clock-o"></i> <span>Attendance</span></a></li>


        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <?php
    if ($this->session->userdata('usertype') != 1) {
      redirect('login');
    }
    ?>