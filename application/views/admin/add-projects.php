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
        <li class="active">Add Projects</li>
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
              <h3 class="box-title">Add Projects</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Projects/insert');?>
              <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Project Name</label>
                        <input type="text" name="project_name" class="form-control" placeholder="Project Name">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Project Link</label>
                        <input type="text" name="project_link" class="form-control" placeholder="Project Link">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Project Details</label>
                        <textarea type="text" name="project_details" class="form-control" rows="5" placeholder="Project Details"></textarea>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Project Files</label>
                        <input type="file" name="project_files[]" class="form-control" placeholder="Project Files" multiple>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Project Date</label>
                        <input type="date" name="project_date" class="form-control" value="<?php echo date('Y-m-d')?>" placeholder="DATE">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Project Status</label><br>
                        <input type="checkbox" name="project_status" class="form-control" data-toggle="toggle" value="1" checked="checked" placeholder="Project Status">
                    </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">Submit</button>
              </div>
            </form>
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