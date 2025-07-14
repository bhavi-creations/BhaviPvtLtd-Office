<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active">Manage Clients</li>
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
              <h3 class="box-title">Manage Clients</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Slno.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Address</th>
                  <th>Details</th>
                  <th>Refered</th>
                  <th>Quote</th>
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
                      <td><?php echo $cnt['client_name']; ?></td>
                      <td><?php echo $cnt['client_email']; ?></td>
                      <td><?php echo $cnt['client_mobile']; ?></td>
                      <td><?php echo $cnt['client_address']; ?></td>
                      <td><?php echo $cnt['client_details']; ?></td>
                      <td><?php echo $cnt['refered_by']; ?></td>
                      <td>
                        <a href="<?php echo base_url(); ?>view-quote/<?php echo $cnt['client_id']; ?>" class="btn btn-info">view</a>
                      </td>
                      <td>
                        <a href="<?php echo base_url(); ?>edit-client/<?php echo $cnt['client_id']; ?>" class="btn btn-info">Edit</a>
                        <a href="<?php echo base_url(); ?>delete-client/<?php echo $cnt['client_id']; ?>" class="btn btn-danger">Delete</a>
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

    