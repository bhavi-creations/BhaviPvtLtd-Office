<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Work Sheets
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Project Tasks</a></li>
      <li class="active">View Worksheets</li>
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
            <h3 class="box-title">View Worksheets</h3>
          </div>

          <!-- /.box-header -->
          <?php if (isset($content)) : ?>
            <?php foreach ($content as $cnt) : ?>
              <!-- form start -->

              <div class="col-lg" style="display: none;">
                <div class="form-group">
                  <label>Department</label>
                  <select class="form-control selectpicker" id="department" name="department">
                    <option value="<?php echo $cnt['department']; ?>">All</option>
                  </select>
                </div>
              </div>
            <?php endforeach; ?>
          <?php endif; ?>
          <div class="box-body">
            <div id="designerTable" style="display: block;">
              <div class="box-body">
                <div class="table-responsive">
                  <table id="example1_designer" class="table table-bordered table-striped">
                    <thead id="design-tbody">
                      <tr>
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Type of work</th>
                        <th>Description</th>
                        <th>Ref Link</th>
                        <th>Content</th>
                        <th>Ref Image</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($content as $cnt) : ?>
                        <tr>
                          <td><?php echo $cnt['assign_date']; ?></td>
                          <td><?php echo $cnt['client_name']; ?></td>
                          <td><?php echo $cnt['work_type_designer']; ?></td>
                          <td><?php echo $cnt['desc_designer']; ?></td>
                          <td><?php echo $cnt['ref_link_designer']; ?></td>
                          <td><?php echo $cnt['content_designer']; ?></td>
                          <?php
                          $imagePaths = unserialize($cnt['ref_file_designer']);

                          if (is_array($imagePaths)) {
                          ?>
                            <td>
                              <?php
                              foreach ($imagePaths as $imagePath) {
                                $imageUrl = base_url( $imagePath);
                              ?>
                                <a href="<?php echo $imageUrl; ?>" download>Download Image</a><br>
                              <?php
                              }
                              ?>
                            </td>
                          <?php
                          } else {
                            echo "Invalid data type. Expected a serialized array.";
                          }
                          ?>

                        </tr>
                      <?php endforeach; ?>
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
                        <th class="form-control">Date</th>
                        <th>Client Name</th>
                        <th>Work</th>
                        <th>Description</th>
                        <th>Google Ads</th>
                        <th>Facebook Ads</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($content as $cnt) : ?>
                        <tr>
                        <td><?php echo $cnt['assign_date'] ?></td>
                        <td>
                          <?php
                          echo $cnt['client_name'];
                          ?>
                        </td>
                        <td><?php echo $cnt['work_type_socialmedia']; ?></td>
                        <td><?php echo $cnt['desc_socialmedia']; ?></td>
                        <td><?php echo $cnt['g_ads_socialmedia']; ?></td>
                        <td><?php echo $cnt['fb_ads_socialmedia']; ?></td>
                        <!-- <td> <input name="" type="text" class="form-control"></td> -->
                        <!-- <td> <button type="button" class="removeRow mb-2" class="form-control">Remove row -</button> -->
                        </tr>
                      <?php endforeach; ?>
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
                        <th>Date</th>

                        <th>Client Name</th>
                        <th>Type of Website</th>
                        <th>Description</th>
                        <th>Delivey Date</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($content as $cnt) : ?>
                        <tr>
                        <td><?php echo $cnt['assign_date']; ?></td>

                        <td><?php echo $cnt['client_name']; ?></td>
                        <td><?php echo $cnt['website_type']; ?></td>
                        <td><?php echo $cnt['desc_website'] ?></td>
                        <td><?php echo $cnt['delivery_date'] ?></td>
                        </tr>
                      <?php endforeach; ?>
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
                        <th>Date</th>
                        <th>Client Name</th>
                        <th>Presentkeyword</th>
                        <th>Target Keyword Date</th>
                        <th>Google My business</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($content as $cnt) : ?>
                        <tr>
                        <td><?php echo $cnt['assign_date']; ?></td>
                        <td><?php echo $cnt['client_name']; ?></td>
                        <td><?php echo $cnt['p_kw_SEO']; ?></textarea></td>
                        <td><?php echo $cnt['target_kw_SEO']; ?></td>
                        <td><?php echo $cnt['gmb_SEO'] ?></td>
                        </tr>
                      <?php endforeach; ?>
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
      <!--/.col (left) -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  $(document).ready(function() {
    $('#department').on('change', function() {

      document.getElementById('designerTable').style.display = 'none';
      document.getElementById('socialmedia').style.display = 'none';
      document.getElementById('websitetable').style.display = 'none';
      document.getElementById('SEOtable').style.display = 'none';

      var selectedDeptId = this.value;
      console.log("Selected Department ID:", selectedDeptId);

      if (selectedDeptId == 11) {
        document.getElementById('designerTable').style.display = 'block';
      } else if (selectedDeptId == 6) {
        document.getElementById('socialmedia').style.display = 'block';
      } else if (selectedDeptId == 16) {
        document.getElementById('websitetable').style.display = 'block';
      } else if (selectedDeptId == 15 || selectedDeptId == 17) {
        document.getElementById('SEOtable').style.display = 'block';
      }
    });
    $('#department').trigger('change');
  });
</script>