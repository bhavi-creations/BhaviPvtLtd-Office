<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Appointments</a></li>
        <li class="active">Manage Appointments</li>
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
        <?php endif;?>

        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Manage Appointments</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Client</th>
                    <th>Status</th>
                    <th>Remarks</th>
                    <th>Service</th>
                    <th>Lead Type</th>
                    <th>Date</th>
                    <th>Follow up Date</th>
                    <th>Close Status</th>
                    <th>Actions</th>
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
                        <td><?php echo $cnt['client']; ?></td>
                        <td><?php echo $cnt['status']; ?></td>
                        <td><?php echo $cnt['remarks']; ?></td>
                        <td><?php echo $cnt['service']; ?></td>
                        <td><?php echo $cnt['lead_type']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['date'])); ?></td>
                        <td><?php if($cnt['follow_up_date']!='0000-00-00'){echo date('d-m-Y', strtotime($cnt['follow_up_date']));}else{echo '-';} ?></td>
                        <td><?php echo $cnt['close_status']; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>edit-appointments/<?php echo $cnt['appointment_id']; ?>" class="btn btn-info">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-appointments/<?php echo $cnt['appointment_id']; ?>" class="btn btn-danger">Delete</a>
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

    