<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Project Tasks
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Project Tasks</a></li>
      <li class="active">Manage Project Tasks</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <?php if ($this->session->flashdata('success')) : ?>
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-check"></i> Success!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php elseif ($this->session->flashdata('error')) : ?>
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
            <h3 class="box-title">Manage Project Tasks</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" style="margin-bottom:10px">
              <div class="col-md-3">
                <label for="project_tasks_staff">Staff/Employee</label>
                <select name="project_tasks_staff" id="project_tasks_staff" class="form-control selectpicker" data-live-search="true">
                  <option value="">All</option>
                  <?php
                  if (isset($staff)) {
                    foreach ($staff as $cnt) {
                      print "<option value='" . $cnt['staff_name'] . "'>" . $cnt['staff_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="col-md-3">
                <label for="filter_by">Filter By</label>
                <select name="filter_by" id="filter_by" class="form-control selectpicker" data-live-search="true">
                  <option value="">Select</option>
                  <option value="due_date">Due Date</option>
                  <option value="completed_date">Completed Date</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="project_tasks_min">From Date</label>
                <input type="date" id="project_tasks_min" name="project_tasks_min" class="form-control" value="<?= date('Y-m-01') ?>">
              </div>
              <div class="col-md-3">
                <label for="project_tasks_max">To Date</label>
                <input type="date" id="project_tasks_max" name="project_tasks_max" class="form-control" value="<?= date('Y-m-d') ?>">
              </div>
            </div>
            <div class="table-responsive">
              <table id="project_tasks" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Sl.no</th>
                    <th>Project id</th>
                    <th>Assigned to</th>
                    <th>Task Name</th>
                    <th>Task Details</th>
                    <th>Task Status</th>
                    <th>Due Date</th>
                    <th>Completed date</th>
                    <th>Daily Task</th>
                    <th>Priority</th>
                    <th>Actions</th>
                    <!-- if you are adding/deleting any fields, please change the data index used for filtering in footer.php -->
                  </tr>
                </thead>
                <tbody>
                  <?php
                  if (isset($content)) :
                    $i = 1;
                    foreach ($content as $cnt) :  
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['project_name']; ?></td>
                        <td>
                          <?php
                          $staff_data = $cnt['staff_data'];
                          if(is_array($staff_data)) {
                            foreach ($staff_data as $key => $staff) {
                              if(isset($staff['staff_name'])){
                                if ($key == 0) {
                                  echo $staff['staff_name'];
                                } else {
                                  echo " , " . $staff['staff_name'];
                                }
                              }
                            }
                          }
                          ?>
                        </td>
                        <td><?php echo $cnt['task_name']; ?></td>
                        <td><?php echo $cnt['task_details']; ?></td>
                        <td><?php echo $cnt['task_status']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['due_date'])); ?></td>
                        <td>
                          <?php
                          if ($cnt['completed_date'] == "0000-00-00") {
                            echo "-";
                          } else {
                            echo date('d-m-Y', strtotime($cnt['completed_date']));
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if ($cnt['task_daily']) {
                            echo " <span class='text-capitalize label label-success' style='font-size:12px;'>yes</span> ";
                          } else {
                            echo " <span class='text-capitalize label label-danger' style='font-size:12px;'>no</span> ";
                          }
                          ?>
                        </td>
                        <td>
                          <?php
                          if ($cnt['task_priority'] == 'low') {
                            echo " <span class='text-capitalize label label-info' style='font-size:12px;'>" . $cnt['task_priority'] . "</span> ";
                          } else if ($cnt['task_priority'] == 'medium') {
                            echo " <span class='text-capitalize label label-success' style='font-size:12px;'>" . $cnt['task_priority'] . "</span> ";
                          } else if ($cnt['task_priority'] == 'high') {
                            echo " <span class='text-capitalize label label-warning' style='font-size:12px;'>" . $cnt['task_priority'] . "</span> ";
                          }
                          ?>
                        </td>
                        <td>
                          <a href="<?php echo base_url(); ?>edit-project-tasks/<?php echo $cnt['p_id']; ?>" class="btn btn-info">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-project-tasks/<?php echo $cnt['p_id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
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