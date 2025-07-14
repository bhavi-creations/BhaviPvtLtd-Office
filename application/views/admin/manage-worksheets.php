<!-- <head><link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script></head> -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Worksheets
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Project Tasks</a></li>
      <li class="active">Manage Worksheets</li>
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
            <h3 class="box-title">Manage Worksheets</h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <div class="row" style="margin-bottom:10px">
              <div class="col-md-3">
                <label for="project_tasks_staff">Branch</label>
                <select name="branch" id="branch" class="form-control ">
                  <option value="7">Branch1</option>
                  <option value="13">Branch2</option>
                  <option value="12">Branch3</option>
                  <option value="10">Branch3</option>
                  <option value="11">Branch3</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="project_tasks_staff">Department</label>
                <select name="department" id="department" class="form-control " data-live-search="false">
                  <option value="7">All</option>
                  <option value="11">Designing</option>
                  <option value="6">Socialmedia</option>
                  <option value="16">Website</option>
                  <option value="15">SEO</option>
                </select>
              </div>
              <div class="col-md-3">
                <label for="project_tasks_staff">Filter By Date</label>
                <input type="date" class="form-control" name="date" data-live-search="true">
              </div>
            </div>
            <div id="allrecords" class="table-responsive">
              <table id="project_tasks" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Si.No</th>
                    <th>client_name</th>
                    <th>Assign Date</th>
                    <th>Assigned to</th>
                    <th>Work Designer</th>
                    <th>Work Socialmedia</th>
                    <th>Work website</th>
                    <th>Desc Designer</th>
                    <th>Desc Socialmedia</th>
                    <th>Desc Website</th>
                    <th>Desc SEO</th>
                    <th>REF link Designer</th>
                    <th>Content Designer</th>
                    <th>Ref File Designer</th>
                    <th>Present Key Word SEO</th>
                    <th>Target Key Word SEO</th>
                    <th>GMB SEO</th>
                    <th>Delivery Date</th>
                    <!-- <th>FB Ads Social Media</th> -->
                    <th>G Ads Social media</th>
                    <!-- <th>Actions</th> -->
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
                        <td><?php echo $cnt['client_name']; ?></td>
                        <td>
                          <?php
                          echo date('d - M - Y', strtotime($cnt['assign_date']));
                          ?>
                        </td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><?php echo $cnt['work_type_designer']; ?></td>
                        <td><?php echo $cnt['work_type_socialmedia']; ?></td>
                        <td><?php echo $cnt['website_type']; ?></td>
                        <td>
                          <?php
                          echo $cnt['desc_designer'];
                          ?>
                        </td>
                        <td>
                          <?php
                          echo $cnt['desc_socialmedia'];
                          ?>
                        </td>
                        <td>
                          <?php
                          echo $cnt['desc_website'];
                          ?>
                        </td>
                        <td>
                          <?php echo $cnt['desc_SEO']; ?>
                        </td>
                        <td><?php echo $cnt['ref_link_designer']; ?></td>
                        <td><?php echo $cnt['content_designer']; ?></td>
                        <td><?php echo $cnt['ref_file_designer']; ?></td>
                        <td><?php echo $cnt['p_kw_SEO']; ?></td>
                        <td><?php echo $cnt['target_kw_SEO']; ?></td>
                        <td><?php echo $cnt['gmb_SEO']; ?></td>
                        <td><?php echo $cnt['delivery_date']; ?></td>
                        <td><?php echo $cnt['fb_ads_socialmedia']; ?></td>
                        <td><?php echo $cnt['g_ads_socialmedia']; ?></td>
                      </tr>
                  <?php
                      $i++;
                    endforeach;
                  endif;
                  ?>

                </tbody>
              </table>
            </div>
            <div id="designerTable" style="display: none;">
              <div class="box-body">
                <div class="table-responsive">
                  <!-- <button type="button" class="addDesignerRow mb-2">Add row +</button> -->
                  <table id="example1_designer" class="table table-bordered table-striped">
                    <thead id="design-tbody">
                      <tr>
                        <th>SI no</th>
                        <th>Date</th>
                        <th>Assigned to</th>
                        <th>Client</th>
                        <th>Type of work</th>
                        <th>Description</th>
                        <th>Ref Link</th>
                        <th>Content</th>
                        <th>Ref Image</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($designer)) :
                        $i = 1;
                        foreach ($designer as $descnt) :
                      ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php
                                echo $descnt['assign_date'];
                                ?></td>
                            <td>
                              <?php echo $descnt['staff_name'];
                              ?>
                            </td>
                            <td>
                              <?php echo $descnt['client_name'] ?>
                            </td>
                            <td><?php echo $descnt['work_type_designer']; ?></td>
                            <td><?php echo $descnt['desc_designer']; ?></td>
                            <td><?php echo $descnt['ref_link_designer']; ?></td>
                            <td><?php echo $descnt['content_designer']; ?></td>
                            <?php
                            $imagePaths = unserialize($descnt['ref_file_designer']);

                            if (is_array($imagePaths)) {
                            ?>
                              <td>
                                <?php
                                foreach ($imagePaths as $imagePath) {
                                ?>
                                  <a href="<?php echo $imagePath; ?>" download>Download Image</a><br>
                                <?php
                                }
                                ?>
                              </td>
                            <?php
                            } else {
                              echo "Invalid data type. Expected a serialized array.";
                            }
                            ?>
                            <td>
                              <a href="<?php echo base_url(); ?>edit-project-tasks/<?php echo $descnt['project_task_id']; ?>" class="btn btn-info">Edit</a>
                              <a href="<?php echo base_url(); ?>delete-worksheets/<?php echo $descnt['id']; ?>" class="btn btn-danger">Delete</a>
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
            </div>
            <div id="socialmedia" style="display: none;">
              <div class="box-body">
                <!-- <button type="button" class="addSocialmediaRow mb-2">Add row +</button> -->
                <div class="table-responsive">
                  <table id="example1_socialmedia" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Si No</th>
                        <th class="form-control">Date</th>
                        <th>Assigned to</th>
                        <th>Client Name</th>
                        <th>Work</th>
                        <th>Description</th>
                        <th>Google Ads</th>
                        <th>Fb Ads</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($social)) :
                        $i = 1;
                        foreach ($social as $socnt) :
                      ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $socnt['assign_date']; ?></td>
                            <td><?php echo $socnt['staff_name']; ?></td>
                            <td><?php echo $socnt['client_name']; ?></td>
                            <td><?php echo $socnt['work_type_socialmedia']; ?></td>
                            <td><?php echo $socnt['desc_socialmedia']; ?></td>
                            <td><?php echo $socnt['fb_ads_socialmedia']; ?></td>
                            <td><?php echo $socnt['g_ads_socialmedia']; ?></td>
                            <td>
                            <a href="<?php echo base_url(); ?>edit-project-tasks/<?php echo $socnt['project_task_id']; ?>" class="btn btn-info">Edit</a> 
                            <a href="<?php echo base_url(); ?>delete-worksheets/<?php echo $socnt['id']; ?>" class="btn btn-danger">Delete</a>
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
            </div>
            <div id="websitetable" style="display: none;">
              <div class="box-body">
                <!-- <button type="button" class="addWebsiteRow mb-2">Add row +</button> -->
                <div class="table-responsive">
                  <table id="example1_website" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Si No</th>
                        <th>Date</th>
                        <th>Assigned to</th>
                        <th>Client Name</th>
                        <th>Type of Website</th>
                        <th>Description</th>
                        <th>Delivey Date</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($website)) :
                        $i = 1;
                        foreach ($website as $web) :

                      ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $web['assign_date']; ?></td>
                            <td><?php echo $web['staff_name']; ?></td>
                            <td><?php echo $web['client_name']; ?></td>
                            <td><?php echo $web['website_type']; ?></td>
                            <td><?php echo $web['desc_website']; ?></td>
                            <td><?php echo $web['delivery_date']; ?></td>
                            <td> 
                              <a href="<?php echo base_url(); ?>edit-project-tasks/<?php echo $web['project_task_id']; ?>" class="btn btn-info">Edit</a> 
                              <a href="<?php echo base_url(); ?>delete-worksheets/<?php echo $web['id']; ?>" class="btn btn-danger">Delete</a>
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
            </div>
            <div id="SEOtable" style="display: none;">
              <div class="box-body">
                <!-- <button type="button" class="addSEORow mb-2">Add row +</button> -->
                <div class="table-responsive">
                  <table id="example1_SEO" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Si No</th>
                        <th>Date</th>
                        <th>Assigned to</th>
                        <th>Client Name</th>
                        <th>Present keyword</th>
                        <th>Target Keyword</th>
                        <th>Google My business</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      if (isset($seo)) :
                        $i = 1;
                        foreach ($seo as $seocnt) :

                      ?>
                          <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $seocnt['assign_date']; ?></td>
                            <td><?php echo $seocnt['staff_name']; ?></td>
                            <td><?php echo $seocnt['client_name']; ?></td>
                            <td><?php echo $seocnt['p_kw_SEO']; ?></td>
                            <td><?php echo $seocnt['target_kw_SEO']; ?></td>
                            <td><?php echo $seocnt['gmb_SEO']; ?></td>
                            <td>
                            <a href="<?php echo base_url(); ?>edit-project-tasks/<?php echo $seocnt['project_task_id']; ?>" class="btn btn-info">Edit</a>   
                            <a href="<?php echo base_url(); ?>delete-worksheets/<?php echo $seocnt['id']; ?>" class="btn btn-danger">Delete</a></td>
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

<script>
  document.getElementById('department').addEventListener('change', function() {
    document.getElementById('allrecords').style.display = 'none';
    document.getElementById('designerTable').style.display = 'none';
    document.getElementById('socialmedia').style.display = 'none';
    document.getElementById('websitetable').style.display = 'none';
    document.getElementById('SEOtable').style.display = 'none';

    var selectedDeptId = this.value;
    console.log("Selected Department ID:", selectedDeptId);

    if (selectedDeptId == 11) {
      document.getElementById('designerTable').style.display = 'block';
    } else if (selectedDeptId == 7) {
      document.getElementById('allrecords').style.display = 'block';
    } else if (selectedDeptId == 6) {
      document.getElementById('socialmedia').style.display = 'block';
    } else if (selectedDeptId == 16) {
      document.getElementById('websitetable').style.display = 'block';
    } else if (selectedDeptId == 15 || selectedDeptId == 17) {
      document.getElementById('SEOtable').style.display = 'block';
    }
  });
 
</script>