<?php
$staff_data = $this->session->userdata('staff_data');

if ($this->session->userdata('usertype') == 2) {
  if (isset($staff_data['permissions']) && is_array($staff_data['permissions'])) {
    $permissions = $staff_data['permissions'];

    if (isset($permissions[0]) && isset($permissions[0]['permission'])) {
      $permission = $permissions[0]['permission'];
    } else {
      $permission = 'no_access';
    }
  } else {
    $permission = 'no_access';
  }
} else {
  $permission = 'edit_access';
}


$permissions = isset($staff_data['permissions']) ? $staff_data['permissions'] : null;

$today = date('Y-m-d');
$staff_id = $this->session->userdata('staff_data')['id'];
$attendance_today = $this->Attendance_model->select_attendance_by_date($staff_id, $today);
$last_login = $this->Attendance_model->get_last_login($staff_id);

if (!function_exists('format_datetime')) {
  function format_datetime($datetime)
  {
    return date('d M Y, h:i A', strtotime($datetime));
  }
}
?>

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
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css">


  <!-- jQuery 3 -->
  <script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

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
                <span class="hidden-xs">Staff</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/dist/img/bhavi.jpg" class="img-circle" alt="User Image">
                  <p>
                    Staff
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url(); ?>profile" class="btn btn-default btn-flat">Profile</a>
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
            <p><?php echo $this->session->userdata('staff_data')['staff_name']; ?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <div class="user-panel">
          <p style="color: #fff;">Last Login: <?php echo $last_login ? format_datetime($last_login['login_date_time']) : 'N/A'; ?></p>
          <?php if ($attendance_today): ?>
            <button class="btn btn-danger" style="width: 100%;" id="logout-time">Logout Time</button>
          <?php else: ?>
            <button class="btn btn-success" style="width: 100%;" id="login-time">Login Time</button>
          <?php endif; ?>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MAIN NAVIGATION</li>

          <li class="active"><a href="<?php echo base_url(); ?>"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>

          <li><a href="<?php echo base_url(); ?>view-salary"><i class="fa fa-inr"></i> My Salary</a></li>

          <li class="treeview">
            <a href="#">
              <i class="fa fa-check-circle"></i> <span>Leave</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>apply-leave"><i class="fa fa-circle-o"></i> Apply Leave</a></li>
              <li><a href="<?php echo base_url(); ?>view-leave"><i class="fa fa-circle-o"></i> View Leave</a></li>
            </ul>
          </li>
          <li> <a href="<?= base_url(); ?>my-payslips"> <i class="fa fa-money"></i> <span>My Payslips</span> </a>
          </li>
          <li><a href="<?php echo base_url(); ?>view-holidays"><i class="fa fa-snowflake-o"></i> Holidays</a></li>
          <li><a href="<?php echo base_url(); ?>view-attendance"><i class="fa fa-clock-o"></i> <span>Attendance</span></a></li>
          <li><a href="<?php echo base_url(); ?>view-projects"><i class="fa fa-star"></i> <span>Projects</span></a></li>
          <li><a href="<?php echo base_url(); ?>view-project-tasks"><i class="fa fa-star"></i> <span>Project Tasks</span></a></li>
          <!-- <li><a href="<?php echo base_url(); ?>view-worksheets"><i class="fa fa-check-circle"></i> <span>Work Sheets</span></a></li> -->

          <!--<?php if ($permission != 'no_access') { ?>-->
          <!--  <li class="treeview">-->
          <!--    <a href="#">-->
          <!--      <i class="fa fa-list"></i> <span>Marketing</span>-->
          <!--      <span class="pull-right-container">-->
          <!--        <i class="fa fa-angle-left pull-right"></i>-->
          <!--      </span>-->
          <!--    </a>-->
          <!--    <ul class="treeview-menu">-->
          <!--      <?php if ($permission == 'edit_access') { ?>-->
          <!--        <li><a href="<?php echo base_url(); ?>add-staff-appointments"><i class="fa fa-circle-o"></i> Add Appointments</a></li>-->
          <!--      <?php } ?>-->
          <!--      <?php if ($permission == 'view_access' || $permission == 'edit_access') { ?>-->
          <!--        <li><a href="<?php echo base_url(); ?>view-staff-appointments"><i class="fa fa-circle-o"></i> View Appointments</a></li>-->
          <!--      <?php } ?>-->
          <!--    </ul>-->
          <!--  </li>-->
          <!--<?php } ?>-->

          <li class="treeview">
            <a href="#">
              <i class="fa fa-check-circle"></i> <span>Work Reports</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="<?php echo base_url(); ?>add-staff-work-reports"><i class="fa fa-circle-o"></i> Add Work Report</a></li>
              <li><a href="<?php echo base_url(); ?>view-work-reports"><i class="fa fa-circle-o"></i> View Work Reports</a></li>

              <li class="treeview">
                <a href="#">
                  <i class="mdi mdi-clipboard-text"></i>
                  <span>My Extra Work</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-right pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href="<?php echo base_url('employee_extra_work/add_my_entry'); ?>"><i class="ti-more"></i>Add My Work Sheet</a></li>
                  <li><a href="<?php echo base_url('employee_extra_work/manage_my_entries'); ?>"><i class="ti-more"></i>Manage My Work Sheets</a></li>
                </ul>
              </li>
            </ul>
          </li>


          
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <?php
    if ($this->session->userdata('usertype') != 2) {
      redirect('login');
    }
    ?>

    <script>
      $(document).ready(function() {
        $('#login-time').click(function() {
          $.post('<?php echo base_url(); ?>home/insert_login_record', {}, function(response) {
            location.reload();
          });
        });

        $('#logout-time').click(function() {
          if (confirm('Are you sure you want to logout?')) {
            $.post('<?php echo base_url(); ?>home/logout_record', {}, function(response) {
              location.reload();
            });
          }
        });
      });
    </script>