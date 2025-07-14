  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Work Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Work Reports</a></li>
        <li class="active">Edit Work Report</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">

        <?php echo validation_errors('<div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>', '</div>
          </div>'); ?>

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
        <?php endif;?>

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Work Report</h3>
            </div>
            <!-- /.box-header -->
            <?php if(isset($content)): ?>
                <?php foreach($content as $cnt): ?>
                    <!-- form start -->
                    <?php echo form_open_multipart('Work_Reports/update');?>
                    <div class="box-body">
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Project</label>
                                <input type="hidden" name="work_report_id" value="<?php echo $cnt['id'] ?>" class="form-control" placeholder="Task ID">
                                <select class="form-control selectpicker" data-live-search="true" name="project_id">
                                <option value="">Select</option>
                                <?php
                                if(isset($projects))
                                {
                                    foreach($projects as $cnt1)
                                    {
                                        if($cnt1['id']==$cnt['project_id'])
                                        {
                                            print "<option value='".$cnt1['id']."' selected>".$cnt1['project_name']."</option>";
                                        }
                                        else{
                                            print "<option value='".$cnt1['id']."'>".$cnt1['project_name']."</option>";
                                        }
                                    }
                                } 
                                ?>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Task</label>
                                <select class="form-control selectpicker" data-live-search="true" name="task_id">
                                <option value="">Select</option>
                                <?php
                                if(isset($tasks))
                                {
                                    foreach($tasks as $cnt1)
                                    {
                                        if($cnt1['p_id'] == $cnt['task_id'])
                                        {
                                            print "<option value='".$cnt1['p_id']."' selected>".$cnt1['task_name']."</option>";
                                        }
                                        else{
                                            print "<option value='".$cnt1['p_id']."'>".$cnt1['task_name']."</option>";
                                        }
                                    }
                                } 
                                ?>
                                </select>
                            </div>
                            </div>

                            <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Staff</label> -->
                                <input type="hidden" name="staff_id" class="form-control" value="<?php echo $cnt['staff_id'] ?>" placeholder="staff_id">
                            <!-- </div>
                            </div> -->

                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Work Details</label>
                                <textarea type="text" name="work_details" class="form-control" placeholder="work details"><?php echo $cnt['work_details'] ?></textarea>
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Work Status</label>
                                <input type="text" name="work_status" class="form-control" value="<?php echo $cnt['work_status'] ?>" placeholder="work status">
                            </div>
                            </div>

                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="on_date" class="form-control" value="<?php echo $cnt['on_date'] ?>" placeholder="DATE">
                            </div>
                            </div>
                        
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-info pull-right">Submit</button>
                    </div>
                    </form>
                <?php endforeach; ?>
            <?php endif; ?>
          </div>
          <!-- /.box -->
        </div>
        <!--/.col (left) -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->