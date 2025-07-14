<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Projects
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Projects</a></li>
        <li class="active">Manage Projects</li>
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
              <h3 class="box-title">Manage Projects</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Project Name</th>
                    <th>Project Link</th>
                    <th>Project Details</th>
                    <th>Project Files</th>
                    <th>Status</th>
                    <th>Added On</th>
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
                        <td><?php echo $cnt['project_name']; ?></td>
                        <td><?php echo '<a target="_blank" href="'.$cnt['project_link'].'">'.$cnt['project_link'].'</a>'; ?></td>
                        <td><?php echo $cnt['project_details']; ?></td>
                        <td>
                          <?php
                            $links = explode(',',$cnt['project_files']);
                            foreach ($links as $key => $value) {
                              $filename = explode('_',$value,2);
                              if(!isset($filename['1'])){
                                $filename['1'] = $value;
                              }
                              echo '
                                <a href="'.base_url().'uploads/project-files/'.$value.'" download>
                                '.$filename['1'].'
                                </a><br>
                              ';
                            }
                          ?>
                        </td>
                        <td><?php 
                          if($cnt['status'] == 1){
                            echo '<span class="label label-success">Active</span>';
                          }else{
                            echo '<span class="label label-danger">Inactive</span>';
                          }
                        ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['date_time'])); ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>edit-projects/<?php echo $cnt['id']; ?>" class="btn btn-info">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-projects/<?php echo $cnt['id']; ?>" class="btn btn-danger">Delete</a>
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

    