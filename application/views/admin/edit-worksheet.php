  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project Tasks
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Worksheets</a></li>
        <li class="active">Edit Worksheets</li>
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

        <!-- column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Worksheets</h3>
            </div>
            <!-- /.box-header -->
            <?php if (isset($content)) : ?>
              <?php foreach ($content as $cnt) : ?>
                <!-- form start -->
                <?php echo form_open_multipart('Project_Tasks/update_worksheets'); ?>
                <div class="col-lg" style="display: none;">
                  <div class="form-group">
                    <label>Department</label>
                    <select class="form-control selectpicker" id="department" name="department">
                      <option value="<?php echo $cnt['department']; ?>">All</option>
                    </select>
                  </div>
                </div>
                <div class="box-body">
                  <input type="text" name="worksheet_id" hidden value="<?php echo$cnt['id']; ?>">
                  <div id="designerTable" style="display: none;">
                    <div class="box-body">
                      <div class="table-responsive">
                        <!-- <button type="button" class="addDesignerRow mb-2">Add row +</button> -->
                        <table id="example1_designer" class="table table-bordered table-striped">
                          <thead id="design-tbody">
                            <tr>

                              <th>Date</th>
                              <th>Assign to</th>
                              <th>Client Name</th>
                              <th>Type of work</th>
                              <th>Description</th>
                              <th>Ref Link</th>
                              <th>Content</th>
                              <th>Ref Image</th>
                            </tr>
                          </thead>
                          <tbody>
                            <tr id="designer-row-0">
                              <td><input type="date" name="assign_date[]" class="form-control" value="<?php echo $cnt['assign_date'] ?>"></td>
                              <td><?php echo $cnt['staff_name'] ?></td>
                              <td>
                                <select name="client_name[]" class="form-control">
                                  <option value="">Select</option>
                                  <?php
                                  if (isset($clients)) {
                                    foreach ($clients as $clt) {
                                      $selected = ($clt['client_name'] == $cnt['client_name']) ? 'selected' : '';
                                      echo "<option value='{$clt['client_name']}' $selected>{$clt['client_name']}</option>";
                                    }
                                  }
                                  ?>
                                </select>
                              </td>
                              <td>
                                <select name="work_type_designer[]" id="" class="form-control">
                                  <option value="not-selected">Select</option>
                                  <?php
                                  $workTypes = ["image", "phamplet", "video", "reels", "visiting-cards", "flex", "logo"]; // Define your work types

                                  foreach ($workTypes as $type) {
                                    $selected = ($type == $cnt['work_type_designer']) ? 'selected' : '';
                                    echo "<option value='$type' $selected>$type</option>";
                                  }
                                  ?>
                                </select>

                              </td>
                              <td><textarea name="desc_designer[]" id="" cols="30" rows="2"><?php echo $cnt['desc_designer'] ?></textarea></td>
                              <td><textarea name="ref_link_designer[]" id="" cols="30" rows="2"><?php echo $cnt['ref_link_designer'] ?></textarea></td>
                              <td><textarea name="content_designer[]" id="" cols="30" rows="2"><?php echo $cnt['content_designer'] ?></textarea></td>
                              <td><input name="ref_file_designer_0[]" type="file" multiple></td>
                              <!-- <td> <button type="button" class="removeRow mb-2">Remove row -</button>
                              </td> -->
                            </tr>
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
                              <th>Assigned to</th>
                              <th>Client Name</th>
                              <th>Work</th>
                              <th>Description</th>
                              <th>Google Ads</th>
                              <th>Facebook Ads</th>
                            </tr>
                          </thead>
                          <tbody>
                            <td><input type="date" name="assign_date_socialmedia[]" class="form-control" value="<?php echo $cnt['assign_date'] ?>"></td>
                            <td><?php echo $cnt['staff_name'] ?></td>
                            <td> <select name="client_name_socialmedia[]" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (isset($clients)) {
                                  foreach ($clients as $clt) {
                                    $selected = ($clt['client_name'] == $cnt['client_name']) ? 'selected' : '';
                                    echo "<option value='{$clt['client_name']}' $selected>{$clt['client_name']}</option>";
                                  }
                                }
                                ?>
                              </select></td>
                            <td><select name="work_type_socialmedia[]" id="" class="form-control">
                                <option value="not_selected">Select</option>
                                <?php
                                $socialMediaOptions = ["Facebook", "Instagram", "Pintrest", "Linkedin", "Youtube"]; // Define your social media options

                                foreach ($socialMediaOptions as $option) {
                                  $selected = ($option == $cnt['work_type_socialmedia']) ? 'selected' : '';
                                  echo "<option value='$option' $selected>$option</option>";
                                }
                                ?>
                              </select></td>
                            <td><textarea name="desc_socialmedia[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['desc_socialmedia']; ?></textarea></td>
                            <td><textarea name="g_ads_socialmedia[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['g_ads_socialmedia']; ?></textarea></td>
                            <td><textarea name="fb_ads_socialmedia[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['fb_ads_socialmedia']; ?></textarea></td>
                            <!-- <td> <input name="" type="text" class="form-control"></td> -->
                            <!-- <td> <button type="button" class="removeRow mb-2" class="form-control">Remove row -</button> -->
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
                              <th>Assigned to</th>
                              <th>Client Name</th>
                              <th>Type of Website</th>
                              <th>Description</th>
                              <th>Delivey Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            <td><input type="date" name="assign_date_web[]" class="form-control" value="<?php echo $cnt['assign_date']; ?>"></td>
                            <td><?php echo $cnt['staff_name'] ?></td>
                            <td> <select name="client_name_web[]" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (isset($clients)) {
                                  foreach ($clients as $clt) {
                                    $selected = ($clt['client_name'] == $cnt['client_name']) ? 'selected' : '';
                                    echo "<option value='{$clt['client_name']}' $selected>{$clt['client_name']}</option>";
                                  }
                                }
                                ?>
                                </select< /td>
                            <td><select name="website_type[]" id="" class="form-control">
                                <option value="not_selected">Select</option>
                                <?php
                                $websiteTypeOptions = ["Static", "Dynamic", "Single Page", "other"]; // Define your website type options

                                foreach ($websiteTypeOptions as $option) {
                                  $selected = ($option == $cnt['website_type']) ? 'selected' : '';
                                  echo "<option value='$option' $selected>$option</option>";
                                }
                                ?>
                              </select></td>
                            <td><textarea name="desc_website[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['desc_website'] ?></textarea></td>
                            <td><input name="delivery_date[]" type="date" class="form-control" value="<?php echo $cnt['delivery_date'] ?>"></td>
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
                              <th>Assigned to</th>
                              <th>Client Name</th>
                              <th>Presentkeyword</th>
                              <th>Target Keyword Date</th>
                              <th>Google My business</th>
                            </tr>
                          </thead>
                          <tbody>
                            <td><input name="assign_date_seo[]" type="date" class="form-control" value="<?php echo $cnt['assign_date'] ?>"></td>
                            <td><?php echo $cnt['staff_name']; ?> </td>
                            <td><select name="client_name_seo[]" class="form-control">
                                <option value="">Select</option>
                                <?php
                                if (isset($clients)) {
                                  foreach ($clients as $clt) {
                                    $selected = ($clt['client_name'] == $cnt['client_name']) ? 'selected' : '';
                                    echo "<option value='" . $clt['client_name'] . "' $selected>" . $clt['client_name'] . "</option>";
                                  }
                                }
                                ?>
                              </select>
                            </td>
                            <td><textarea name="p_kw_SEO[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['p_kw_SEO']; ?></textarea></td>
                            <td><textarea name="target_kw_SEO[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['target_kw_SEO']; ?></textarea></td>
                            <td><textarea name="gmb_SEO[]" id="" cols="30" rows="2" class="form-control"><?php echo $cnt['gmb_SEO'] ?></textarea></td>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>

                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right">Update</button>
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

  <script>
    $(document).ready(function() {
      $('#department').on('change', function() {

        document.getElementById('designerTable').style.display = 'none';
        document.getElementById('socialmedia').style.display = 'none';
        document.getElementById('websitetable').style.display = 'none';
        document.getElementById('SEOtable').style.display = 'none';

        var selectedDeptId = this.value;
        console.log("Selected Department ID:", selectedDeptId);

        if (selectedDeptId == 13) {
          document.getElementById('designerTable').style.display = 'block';
        } else if (selectedDeptId == 12) {
          document.getElementById('socialmedia').style.display = 'block';
        } else if (selectedDeptId == 10) {
          document.getElementById('websitetable').style.display = 'block';
        } else if (selectedDeptId == 11) {
          document.getElementById('SEOtable').style.display = 'block';
        }
      });
      $('#department').trigger('change');
    });
  </script>