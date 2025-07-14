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
        <li class="active">Add Project Tasks</li>
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
              <h3 class="box-title">Add Project Tasks</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Project_Tasks/insert'); ?>

            <div class="box-body">
              <div class="col-md-6">
                <div class="form-group">
                  <label>Task Name</label>
                  <input type="text" name="task_name" class="form-control" placeholder="Task Name">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Task Details</label>
                  <textarea type="text" name="task_details" class="form-control" placeholder="Task Name"></textarea>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Project</label>
                  <select class="form-control selectpicker" data-live-search="true" name="project_id">
                    <option value="">Select</option>
                    <?php
                    if (isset($projects)) {
                      foreach ($projects as $cnt) {
                        print "<option value='" . $cnt['id'] . "'>" . $cnt['project_name'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Staff</label>
                  <select class="form-control selectpicker" id="assignedto" data-live-search="true" name="assigned_to[]">
                    <option value="">Select</option>
                    <?php
                    if (isset($staff)) {
                      foreach ($staff as $cnt) {
                        print "<option value='" . $cnt['id'] . "'>" . $cnt['staff_name'] . " Dep Id " . $cnt['department_id'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Department</label>
                  <select class="form-control selectpicker" id="department" data-live-search="true" name="department[]">
                    <option value="">Select</option>
                    <?php
                    if (isset($departments)) {
                      foreach ($departments as $cnt) {
                        print "<option value='" . $cnt['id'] . "'>" . $cnt['department_name'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
              </div>


              <div class="col-md-6">
                <div class="form-group">
                  <label>Task Status</label>
                  <input type="text" name="task_status" class="form-control" placeholder="task status">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Due Date</label>
                  <input type="date" name="due_date" class="form-control" placeholder="DATE">
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label>Completed Date</label>
                  <input type="date" name="completed_date" class="form-control" placeholder="DATE">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Priority</label>
                  <select name="task_priority" id="task_priority" class="form-control">
                    <option value="low">Low</option>
                    <option value="medium">Medium</option>
                    <option value="high">High</option>
                  </select>
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <label>Daily Task</label><br>
                  <input type="hidden" name="task_daily" class="form-control" data-toggle="toggle" value="0" placeholder="Daily Task">
                  <input type="checkbox" name="task_daily" class="form-control" data-toggle="toggle" value="1" placeholder="Daily Task">
                </div>
              </div>
              </div>
              <div id="designerTable" style="display: none;">
                <div class="box-body">
                  <div class="table-responsive">
                    <button type="button" class="addDesignerRow mb-2">Add row +</button>
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
                        <tr id="designer-row-0">
                          <td><input type="date" name="assign_date[]" class="form-control"></td>
                          <td>
                            <select name="client_name[]" class="form-control">
                              <option value> select </option>
                              <?php
                              if (isset($clients)) {
                                foreach ($clients as $clt) {
                                  print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                                }
                              }
                              ?>
                            </select>
                          </td>
                          <td>
                            <select name="work_type_designer[]" id="" class="form-control">
                              <option value="not-selected">Select</option>
                              <option value="image">Image</option>
                              <option value="phamplet">Phamplet</option>
                              <option value="video">Video</option>
                              <option value="reels">Reels</option>
                              <option value="visiting-cards">Visiting Cards</option>
                              <option value="flex">Flex</option>
                              <option value="logo">Logo</option>
                            </select>
                          </td>
                          <td><textarea name="desc_designer[]" id="" cols="30" rows="2"></textarea></td>
                          <td><textarea name="ref_link_designer[]" id="" cols="30" rows="2"></textarea></td>
                          <td><textarea name="content_designer[]" id="" cols="30" rows="2"></textarea></td>
                          <td><input name="ref_file_designer_0[]" type="file" multiple></td>
                          <td> <button type="button" class="removeRow mb-2">Remove row -</button>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div id="socialmedia" style="display: none;">
                <div class="box-body">
                  <button type="button" class="addSocialmediaRow mb-2">Add row +</button>
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
                        </tr>
                      </thead>
                      <tbody>
                        <td><input type="date" name="assign_date_socialmedia[]" class="form-control"></td>
                        <td><select name="client_name_socialmedia[]" class="form-control">
                            <option value> select </option>
                            <?php
                            if (isset($clients)) {
                              foreach ($clients as $clt) {
                                print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                              }
                            }
                            ?>
                          </select></td>
                        <td><select name="work_type_socialmedia[]" id="" class="form-control">
                            <option value="not_selected">Select</option>
                            <option value="Facebook">Facebook</option>
                            <option value="Instagram">Instagram</option>
                            <option value="Pintrest">Pintrest</option>
                            <option value="Linkedin">Linkedin</option>
                            <option value="Youtube">Youtube</option>
                          </select></td>
                        <td><textarea name="desc_socialmedia[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                        <td><input name="g_ads_socialmedia[]" type="text" class="form-control"></td>
                        <td> <input name="fb_ads_socialmedia[]" type="text" class="form-control"></td>
                        <td> <button type="button" class="removeRow mb-2" class="form-control">Remove row -</button>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div id="websitetable" style="display: none;">
                <div class="box-body">
                  <button type="button" class="addWebsiteRow mb-2">Add row +</button>
                  <div class="table-responsive">
                    <table id="example1_website" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Client</th>
                          <th>Type of Website</th>
                          <th>Description</th>
                          <th>Delivey Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td><input type="date" name="assign_date_web[]" class="form-control"></td>
                        <td><select name="client_name_web[]" class="form-control">
                            <option value> select </option>
                            <?php
                            if (isset($clients)) {
                              foreach ($clients as $clt) {
                                print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                              }
                            }
                            ?>
                          </select></td>
                        <td><select name="website_type[]" id="" class="form-control">
                            <option value="not-selected">Select</option>
                            <option value="Static">Static</option>
                            <option value="Dynamic">Dynamic</option>
                            <option value="Single Page">Single Page</option>
                            <option value="other">other</option>
                          </select></td>
                        <td><textarea name="desc_website[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                        <td><input name="delivery_date[]" type="date" class="form-control"></td>
                        <td> <button type="button" class="removeRow mb-2">Remove row -</button>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
              <div id="SEOtable" style="display: none;">
                <div class="box-body">
                  <button type="button" class="addSEORow mb-2">Add row +</button>
                  <div class="table-responsive">
                    <table id="example1_SEO" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Date</th>
                          <th>Client</th>
                          <th>Presentkeyword</th>
                          <th>Target Keyword Date</th>
                          <th>Google My business</th>
                        </tr>
                      </thead>
                      <tbody>
                        <td><input name="assign_date_seo[]" type="date" class="form-control"></td>
                        <td><select name="client_name_seo[]" class="form-control">
                            <option value> select </option>
                            <?php
                            if (isset($clients)) {
                              foreach ($clients as $clt) {
                                print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                              }
                            }
                            ?>
                          </select></td>
                        <td><textarea name="p_kw_SEO[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                        <td><textarea name="target_kw_SEO[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                        <td><textarea name="gmb_SEO[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                        <td> <button type="button" class="removeRow mb-2">Remove row -</button>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
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



  <!-- /. js for display the tables -->
  <script>
    // $(document).ready(function() {
    //   $('#myTextarea').wysihtml5();
    // });

    document.getElementById('department').addEventListener('change', function() {

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

    document.addEventListener("DOMContentLoaded", function() {
      function addDesignerRow() {
        var table = document.getElementById("designerTable");
        var count = 0;
        var elements = table.querySelectorAll('[id^="designer-row"]');
        count = elements.length;

        var tableBody = document.getElementById("designerTable").querySelector('tbody');
        var newRow = document.createElement("tr");
        newRow.id = "designer-row-"+count;

        newRow.innerHTML = `
        <td><input type="date" name="assign_date[]" class="form-control"></td>
        <td>
            <select name="client_name[]" class="form-control" >
                <option value="">select</option>
                \<?php
                  if (isset($clients)) {
                    foreach ($clients as $clt) {
                      echo "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                    }
                  }
                  ?>\
            </select>
        </td>
        <td>
            <select name="work_type_designer[]" class="form-control">
                <option value="image">Image</option>
                <option value="phamplet">Phamplet</option>
                <option value="video">Video</option>
                <option value="reels">Reels</option>
                <option value="visiting-cards">Visiting Cards</option>
                <option value="flex">Flex</option>
                <option value="logo">Logo</option>
            </select>
        </td>
        <td><textarea name="desc_designer[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
        <td><input type="text" name="ref_link_designer[]" class="form-control"></td>
        <td><textarea name="content_designer[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
        <td><input name="ref_file_designer_`+count+`[]" type="file" class="form-control" multiple></td>
        <td> <button type="button" class="removeRow">Remove row -</button></td>
      `;

        tableBody.appendChild(newRow);

        newRow.querySelector(".removeRow").addEventListener("click", function() {
          tableBody.removeChild(newRow);
        });
      }

      function addSocialMediaRow() {
        var tableBody = document.getElementById("socialmedia").querySelector('tbody');
        var newRow = document.createElement("tr");

        newRow.innerHTML = `
        <td><input type="date" name="assign_date_socialmedia[]" class="form-control"></td>
                      <td><select name="client_name_socialmedia[]" class="form-control">
                          <option value> select </option>
                          \<?php
                            if (isset($clients)) {
                              foreach ($clients as $clt) {
                                print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                              }
                            }
                            ?>\
                        </select></td>
                      <td><select name="work_type_socialmedia[]" id="" class="form-control">
                         <option value="not_selected">Select</option>
                          <option value="Facebook">Facebook</option>
                          <option value="Instagram">Instagram</option>
                          <option value="Pintrest">Pintrest</option>
                          <option value="Linkedin">Linkedin</option>
                          <option value="Youtube">Youtube</option>
                        </select></td>
                      <td><textarea name="desc_socialmedia[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                      <td><input name="g_ads_socialmedia[]" type="text" class="form-control"></td>
                      <td> <input name="fb_ads_socialmedia[]" type="text" class="form-control"></td>
                      <td> <button type="button" class="removeRow">Remove row -</button></td>
      `;

        tableBody.appendChild(newRow);
        newRow.querySelector(".removeRow").addEventListener("click", function() {
          tableBody.removeChild(newRow);
        });
      }

      function addWebsiteTableRow() {
        var tableBody = document.getElementById("websitetable").querySelector('tbody');
        var newRow = document.createElement("tr");

        newRow.innerHTML = `
        <td><input type="date" name="assign_date_web[]" class="form-control"></td>
                      <td><select name="client_name_web[]" class="form-control">
                      <option value> select </option>
                           \<?php
                            if (isset($clients)) {
                              foreach ($clients as $clt) {
                                print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                              }
                            }
                            ?>\
                        </select></td>
                        <td><select name="website_type[]" id="" class="form-control">
                          <option value="not-selected">Select</option>
                          <option value="Static">Static</option>
                          <option value="Dynamic">Dynamic</option>
                          <option value="Single Page">Single Page</option>
                          <option value="other">other</option>
                        </select></td>
                        <td><textarea name="desc_website[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                      <td><input type="date" name="delivery_date[]" class="form-control"></td>
                      <td> <button type="button" class="removeRow">Remove row -</button></td>
      `;

        tableBody.appendChild(newRow);
        newRow.querySelector(".removeRow").addEventListener("click", function() {
          tableBody.removeChild(newRow);
        });
      }

      function addSEORow() {
        var tableBody = document.getElementById("SEOtable").querySelector('tbody');
        var newRow = document.createElement("tr");

        newRow.innerHTML = `
        <td><input name="assign_date_seo[]" type="date" class="form-control"></td>
                      <td><select name="client_name_seo[]" class="form-control">
                      <option value> select </option>
                            \<?php
                              if (isset($clients)) {
                                foreach ($clients as $clt) {
                                  print "<option value='" . $clt['client_name'] . "'>" . $clt['client_name'] . "</option>";
                                }
                              }
                              ?>\
                        </select></td>
                      <td><textarea name="p_kw_SEO[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                      <td><textarea name="target_kw_SEO[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                      <td><textarea name="gmb_SEO[]" id="" cols="30" rows="2" class="form-control"></textarea></td>
                      <td> <button type="button" class="removeRow">Remove row -</button></td>
      `;

        tableBody.appendChild(newRow);
        newRow.querySelector(".removeRow").addEventListener("click", function() {
          tableBody.removeChild(newRow);
        });
      }

      // Event listeners for the "Add" buttons
      document.querySelector("#designerTable .addDesignerRow").addEventListener("click", addDesignerRow);
      document.querySelector("#socialmedia .addSocialmediaRow").addEventListener("click", addSocialMediaRow);
      document.querySelector("#websitetable .addWebsiteRow").addEventListener("click", addWebsiteTableRow);
      document.querySelector("#SEOtable .addSEORow").addEventListener("click", addSEORow);
    });
  </script>
  <!-- Include jQuery library -->
  <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

  <!-- Include jQuery UI library -->
  <!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> -->