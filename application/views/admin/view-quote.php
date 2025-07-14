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
      <li class="active">View Quote</li>
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
            <h3 class="box-title">View Quotes</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div id="quotation_table">

              <div class="box-body">
                <?php
                if (isset($content)) :
                  foreach ($content as $cnt) :
                ?>
                    <div class="row">
                      <div class="mt-4">
                        <h4>Quotation</h4>
                      </div>
                    </div>

                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-6">
                        <label for="Project ">Project Duraion</label>
                        <input type="text" class="form-control" name="project_duration" value="<?php echo $cnt['project_duration'] ?>" readonly>
                      </div>
                      <div class="col-md-6">
                        <label for="Project ">Digital Services</label>
                        <textarea name="digital_services" id="" cols="30" rows="2" class="form-control" readonly><?php echo $cnt['digital_services'] ?></textarea>
                      </div>
                    </div>
                    <div class="row " style="padding-top: 20px;">
                      <div class="col-md-6 ">
                        <label for="images ">Images</label>
                        <input type="text" class="form-control" readonly value="<?php echo $cnt['images'] ?>">
                      </div>
                      <div class="col-md-6">
                        <label for="Project ">Description</label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control" readonly><?php echo $cnt['description'] ?></textarea>
                      </div>
                    </div>
                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-6 ">
                        <label>
                          SEO
                        </label>

                      </div>
                      <div class="form-group col-md-6" id="textareaContainer" style="display: block;">
                        <label for="textarea">Key word and Description</label>
                        <textarea name="SEO" class="form-control" id="textarea" rows="3" readonly><?php echo $cnt['SEO'] ?></textarea>
                      </div>
                    </div>

                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-6 ">
                        <label>Links</label>
                        <textarea name="links" id="" cols="30" rows="3" class="form-control" readonly><?php echo $cnt['links'] ?></textarea>
                      </div>
                      <div class="col-md-6 ">
                        <label>
                          Payments(installments)
                        </label>
                        <div class="form-group" style="display: block;">
                          <input type="text" class="form-control" value="<?php echo $cnt['payment_installments'] ?>" readonly>
                        </div>
                      </div>
                    </div>
                <?php
                  endforeach;
                endif;
                ?>
              </div>
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