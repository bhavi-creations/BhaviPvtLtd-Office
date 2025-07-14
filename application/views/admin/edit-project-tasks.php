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
        <li class="active">Edit Project Tasks</li>
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
              <h3 class="box-title">Edit Project Tasks</h3>
            </div>
            <!-- /.box-header -->
            <?php if (isset($content)) : ?>
              <?php foreach ($content as $cnt) : ?>
                <!-- form start -->
                <?php echo form_open_multipart('Project_Tasks/update'); ?>
                <div class="box-body">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Task Name</label>
                      <input type="hidden" name="id" value="<?php echo $cnt['p_id'] ?>" class="form-control" placeholder="Task ID">
                      <input type="text" name="task_name" value="<?php echo $cnt['task_name'] ?>" class="form-control" placeholder="Task Name">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Task Details</label>
                      <textarea type="text" name="task_details" class="form-control" placeholder="Task Details"><?php echo $cnt['task_details'] ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Project</label>
                      <select class="form-control selectpicker" data-live-search="true" name="project_id">
                        <option value="">Select</option>
                        <?php
                        if (isset($projects)) {
                          foreach ($projects as $cnt1) {
                            if ($cnt1['id'] == $cnt['project_id']) {
                              print "<option value='" . $cnt1['id'] . "' selected>" . $cnt1['project_name'] . "</option>";
                            } else {
                              print "<option value='" . $cnt1['id'] . "'>" . $cnt1['project_name'] . "</option>";
                            }
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Staff</label>
                      <select class="form-control selectpicker" data-live-search="true" name="assigned_to[]">
                        <option value="">Select</option>
                        <?php
                        if (isset($staff)) {
                          foreach ($staff as $cnt1) {
                            if (in_array($cnt1['id'], explode(',', $cnt['assigned_to']))) {
                              print "<option value='" . $cnt1['id'] . "' selected>" . $cnt1['staff_name'] . "</option>";
                            } else {
                              print "<option value='" . $cnt1['id'] . "'>" . $cnt1['staff_name'] . "</option>";
                            }
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>


                  <div class="col-md-6" style="display: none;">
                    <div class="form-group">
                      <label>Department</label>
                      <select class="form-control selectpicker" id="department" name="department">
                        <option value="<?php echo $cnt['department']; ?>">All</option>
                      </select>
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Task Status</label>
                      <input type="text" name="task_status" value="<?php echo $cnt['task_status'] ?>" class="form-control" placeholder="task status">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Due Date</label>
                      <input type="date" name="due_date" value="<?php echo $cnt['due_date']; ?>" class="form-control" placeholder="DATE">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Completed Date</label>
                      <input type="date" name="completed_date" value="<?php echo $cnt['completed_date']; ?>" class="form-control" placeholder="DATE">
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Priority</label>
                      <select name="task_priority" id="task_priority" class="form-control">
                        <option value="low" <?php if ($cnt['task_priority'] == 'low') {
                                              echo "selected";
                                            } ?>>Low</option>
                        <option value="medium" <?php if ($cnt['task_priority'] == 'medium') {
                                                  echo "selected";
                                                } ?>>Medium</option>
                        <option value="high" <?php if ($cnt['task_priority'] == 'high') {
                                                echo "selected";
                                              } ?>>High</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                      <label>Daily Task</label><br>
                      <input type="hidden" name="task_daily" class="form-control" data-toggle="toggle" value="0" placeholder="Daily Task">
                      <input type="checkbox" name="task_daily" class="form-control" data-toggle="toggle" value="1" <?php if ($cnt['task_daily'] == 1) {
                                                                                                                      echo 'checked';
                                                                                                                    } ?> placeholder="Daily Task">
                    </div>
                  </div>

                  <div class="col-lg-12">
                    <div id="designerTable" style="display: none;">
                      <div class="box-body">
                        <div class="table-responsive">
                          <!-- <button type="button" class="addDesignerRow mb-2">Add row +</button> -->
                          <table id="example1_designer" class="table table-bordered table-striped">
                            <thead id="design-tbody">
                              <tr>
                                <th>Date</th>
                                <th>Client</th>
                                <th>Type of work</th>
                                <th>Description</th>
                                <th>Ref Link</th>
                                <th>Content</th>
                                <th>Ref Image</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($worksheet as $index => $designer_row) : ?>
                                <tr id="designer-row-<?php echo $index; ?>">
                                  <td><input type="date" name="assign_date[]" class="form-control" value="<?php echo $designer_row['assign_date']; ?>"></td>
                                  <td>
                                    <select name="client_name[]" class="form-control">
                                      <option value> select </option>
                                      <?php
                                      if (isset($clients)) {
                                        foreach ($clients as $clt) {
                                          $selected = ($clt['client_name'] == $designer_row['client_name']) ? 'selected' : '';
                                          print "<option value='" . $clt['client_name'] . "' $selected>" . $clt['client_name'] . "</option>";
                                        }
                                      }
                                      ?>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="work_type_designer[]" id="" class="form-control">
                                      <option value="not-selected">Select</option>
                                      <?php
                                      $work_type_selected = $designer_row['work_type_designer'];
                                      $work_types = array("image", "phamplet", "video", "reels", "visiting-cards", "flex", "logo");
                                      foreach ($work_types as $type) {
                                        $selected = ($type == $work_type_selected) ? 'selected' : '';
                                        echo "<option value='$type' $selected>$type</option>";
                                      }
                                      ?>
                                    </select>
                                  </td>
                                  <input type="text" name="designer_id[]" value="<?php echo $designer_row['id']; ?>" hidden>
                                  <td><textarea name="desc_designer[]" id="" cols="30" rows="2"><?php echo $designer_row['desc_designer']; ?></textarea></td>
                                  <td><input type="link" name="ref_link_designer[]" value="<?php echo $designer_row['ref_link_designer']; ?>"></td>
                                  <td><textarea name="content_designer[]" id="" cols="30" rows="2"><?php echo $designer_row['content_designer']; ?></textarea></td>
                                  <td><input name="ref_file_designer_0[]" type="file" multiple></td>
                                  <!-- <td><button type="button" class="removeRow mb-2">Remove row -</button></td> -->
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
                                <th>Client</th>
                                <th>Work</th>
                                <th>Description</th>
                                <th>Google Ads</th>
                                <th>Fb Ads</th>
                                <!-- <th>Remove</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($worksheet as $index => $socialmedia_row) : ?>
                                <tr id="socialmedia-row-<?php echo $index; ?>">
                                  <td><input type="date" name="assign_date_socialmedia[]" class="form-control" value="<?php echo $socialmedia_row['assign_date']; ?>"></td>
                                  <td>
                                    <select name="client_name_socialmedia[]" class="form-control">
                                      <option value="">Select</option>
                                      <?php
                                      if (isset($clients)) {
                                        foreach ($clients as $clt) {
                                          $selected = ($clt['client_name'] == $socialmedia_row['client_name']) ? 'selected' : '';
                                          print "<option value='" . $clt['client_name'] . "' $selected>" . $clt['client_name'] . "</option>";
                                        }
                                      }
                                      ?>
                                    </select>
                                  </td>
                                  <td>
                                    <select name="work_type_socialmedia[]" class="form-control">
                                      <option value="not_selected">Select</option>
                                      <option value="Facebook" <?php echo ($socialmedia_row['work_type_socialmedia'] == 'Facebook') ? 'selected' : ''; ?>>Facebook</option>
                                      <option value="Instagram" <?php echo ($socialmedia_row['work_type_socialmedia'] == 'Instagram') ? 'selected' : ''; ?>>Instagram</option>
                                      <option value="Pintrest" <?php echo ($socialmedia_row['work_type_socialmedia'] == 'Pintrest') ? 'selected' : ''; ?>>Pintrest</option>
                                      <option value="Linkedin" <?php echo ($socialmedia_row['work_type_socialmedia'] == 'Linkedin') ? 'selected' : ''; ?>>Linkedin</option>
                                      <option value="Youtube" <?php echo ($socialmedia_row['work_type_socialmedia'] == 'Youtube') ? 'selected' : ''; ?>>Youtube</option>
                                    </select>
                                  </td>
                                  <input type="text" name="socialmedia_id[]" value="<?php echo $socialmedia_row['id']; ?>" hidden>
                                  <td><textarea name="desc_socialmedia[]" class="form-control" cols="30" rows="2"><?php echo $socialmedia_row['desc_socialmedia']; ?></textarea></td>
                                  <td><input name="g_ads_socialmedia[]" type="text" class="form-control" value="<?php echo $socialmedia_row['g_ads_socialmedia']; ?>"></td>
                                  <td><input name="fb_ads_socialmedia[]" type="text" class="form-control" value="<?php echo $socialmedia_row['fb_ads_socialmedia']; ?>"></td>
                                  <!-- <td><button type="button" class="removeRow mb-2" class="form-control">Remove row -</button></td> -->
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
                                <th>Client</th>
                                <th>Type of Website</th>
                                <th>Description</th>
                                <th>Delivery Date</th>
                                <!-- <th>Remove</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($worksheet as $index => $website_row) : ?>
                                <tr id="website-row-<?php echo $index; ?>">
                                  <td><input type="date" name="assign_date_web[]" class="form-control" value="<?php echo $website_row['assign_date']; ?>"></td>
                                  <td>
                                    <select name="client_name_web[]" class="form-control">
                                      <option value="">Select</option>
                                      <?php
                                      if (isset($clients)) {
                                        foreach ($clients as $clt) {
                                          $selected = ($clt['client_name'] == $website_row['client_name']) ? 'selected' : '';
                                          print "<option value='" . $clt['client_name'] . "' $selected>" . $clt['client_name'] . "</option>";
                                        }
                                      }
                                      ?>
                                    </select>
                                  </td>
                                  <td>  
                                    <select name="website_type[]" class="form-control">
                                      <option value="not-selected">Select</option>
                                      <option value="Static" <?php echo ($website_row['website_type'] == 'Static') ? 'selected' : ''; ?>>Static</option>
                                      <option value="Dynamic" <?php echo ($website_row['website_type'] == 'Dynamic') ? 'selected' : ''; ?>>Dynamic</option>
                                      <option value="Single Page" <?php echo ($website_row['website_type'] == 'Single Page') ? 'selected' : ''; ?>>Single Page</option>
                                      <option value="other" <?php echo ($website_row['website_type'] == 'other') ? 'selected' : ''; ?>>Other</option>
                                    </select>
                                  </td>
                                  <input type="text" name="website_id[]" value="<?php echo $website_row['id']; ?>" hidden>
                                  <td><textarea name="desc_website[]" class="form-control" cols="30" rows="2"><?php echo $website_row['desc_website']; ?></textarea></td>
                                  <td><input name="delivery_date[]" type="date" class="form-control" value="<?php echo $website_row['delivery_date']; ?>"></td>
                                  <!-- <td><button type="button" class="removeRow mb-2">Remove row -</button></td> -->
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
                                <th>Client</th>
                                <th>Present Keyword</th>
                                <th>Target Keyword Date</th>
                                <th>Google My Business</th>
                                <!-- <th>Remove</th> -->
                              </tr>
                            </thead>
                            <tbody>
                              <?php foreach ($worksheet as $index => $seo_row) : ?>
                                <tr id="seo-row-<?php echo $index; ?>">
                                  <td><input name="assign_date_seo[]" type="date" class="form-control" value="<?php echo $seo_row['assign_date']; ?>"></td>
                                  <td>
                                    <select name="client_name_seo[]" class="form-control">
                                      <option value="">Select</option>
                                      <?php
                                      if (isset($clients)) {
                                        foreach ($clients as $clt) {
                                          $selected = ($clt['client_name'] == $seo_row['client_name']) ? 'selected' : '';
                                          print "<option value='" . $clt['client_name'] . "' $selected>" . $clt['client_name'] . "</option>";
                                        }
                                      }
                                      ?>
                                    </select>
                                  </td>
                                  <input type="text" name="SEO_id[]" value="<?php echo $seo_row['id']; ?>" hidden>
                                  <td><textarea name="p_kw_SEO[]" class="form-control" cols="30" rows="2"><?php echo $seo_row['p_kw_SEO']; ?></textarea></td>
                                  <td><textarea name="target_kw_SEO[]" class="form-control" cols="30" rows="2"><?php echo $seo_row['target_kw_SEO']; ?></textarea></td>
                                  <td><textarea name="gmb_SEO[]" class="form-control" cols="30" rows="2"><?php echo $seo_row['gmb_SEO']; ?></textarea></td>
                                  <!-- <td><button type="button" class="removeRow mb-2">Remove row -</button></td> -->
                                </tr>
                              <?php endforeach; ?>
                            </tbody>
                          </table>
                        </div>
                      </div>
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

  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

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