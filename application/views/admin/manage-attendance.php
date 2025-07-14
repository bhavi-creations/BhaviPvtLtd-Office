<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attendance
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Attendance Management</a></li>
        <li class="active">Manage Attendance</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php if($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
        <?php endif; ?>
          
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Manage Attendance</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="row" style="margin-bottom:10px">
                <div class="col-md-4">
                  <label for="staff">Staff/Employee</label>
                  <select name="staff" id="staff" class="form-control selectpicker" data-live-search="true">
                      <option value="">All</option>
                      <?php
                      if(isset($staff))
                      {
                        foreach($staff as $cnt)
                        {
                          print "<option value='".$cnt['staff_name']."'>".$cnt['staff_name']."</option>";
                        }
                      } 
                      ?>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="min">From Date</label>
                  <input type="date" id="min" name="min" class="form-control" value="<?=date('Y-m-01')?>">
                </div>
                <div class="col-md-4">
                  <label for="max">To Date</label>
                  <input type="date" id="max" name="max" class="form-control" value="<?=date('Y-m-d')?>">
                </div>
              </div>
              <div class="table-responsive">
                <table id="attendance" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Name</th>
                    <th>Login</th>
                    <th>Logout</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <!-- if you are adding/deleting any fields, please change the data index used for filtering in footer.php -->
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><?php echo date('d-m-Y h:i A', strtotime($cnt['login_date_time'])); ?></td>
                        <td><?php 
                            if($cnt['logout_date_time'] == null){
                                echo "--";
                            }else{
                                echo date('d-m-Y h:i A', strtotime($cnt['logout_date_time'])); 
                            }
                        ?></td>
                        <td><?php echo $cnt['email']; ?></td>
                        <td><?php echo $cnt['mobile']; ?></td>
                      </tr>
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

