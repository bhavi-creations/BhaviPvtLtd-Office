  <style>
    .floatybox {
      display: inline-block;
      width: 123px;
    }
  </style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Staff Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Management</a></li>
        <li class="active">Edit Staff</li>
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

        <?php if ($this->session->flashdata('success')): ?>
          <div class="col-md-12">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <h4><i class="icon fa fa-check"></i> Success!</h4>
              <?php echo $this->session->flashdata('success'); ?>
            </div>
          </div>
        <?php elseif ($this->session->flashdata('error')): ?>
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
              <h3 class="box-title">Edit Staff</h3>
            </div>
            <!-- /.box-header -->

            <?php if (isset($content)): ?>
              <?php foreach ($content as $cnt): ?>
                <!-- form start -->
                <?php echo form_open_multipart('Staff/update'); ?>
                <div class="box-body">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Full Name</label>
                      <input type="hidden" name="txtid" value="<?php echo $cnt['id'] ?>" class="form-control" placeholder="Full Name">
                      <input type="text" name="txtname" value="<?php echo $cnt['staff_name'] ?>" class="form-control" placeholder="Full Name">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="txtsalary">Salary</label>
                      <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="txtsalary"
                        id="txtsalary"
                        value="<?php echo isset($cnt['salary']) ? $cnt['salary'] : set_value('txtsalary'); ?>"
                        class="form-control"
                        placeholder="Salary" />
                    </div>
                  </div>


                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Department</label>
                      <select class="form-control selectpicker" data-live-search="true" name="slcdepartment">
                        <option value="">Select</option>
                        <?php
                        if (isset($department)) {
                          foreach ($department as $cnt1) {
                            if ($cnt1['id'] == $cnt['department_id']) {
                              print "<option value='" . $cnt1['id'] . "' selected>" . $cnt1['department_name'] . " " . $cnt1['city'] . "</option>";
                            } else {
                              print "<option value='" . $cnt1['id'] . "'>" . $cnt1['department_name'] . " " . $cnt1['city'] . "</option>";
                            }
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Gender</label>
                      <select class="form-control selectpicker" data-live-search="true" name="slcgender">
                        <option value="">Select</option>
                        <?php
                        if ($cnt['gender'] == 'Male') {
                          print '<option value="Male" selected>Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others">Others</option>';
                        } elseif ($cnt['gender'] == 'Femle') {
                          print '<option value="Male">Male</option>
                                    <option value="Female" selected>Female</option>
                                    <option value="Others">Others</option>';
                        } elseif ($cnt['gender'] == 'Others') {
                          print '<option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Others" selected>Others</option>';
                        } else {
                          print '<option value="Male">Male</option>
                              <option value="Female">Female</option>
                              <option value="Others">Others</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email</label>
                      <input type="text" name="txtemail" value="<?php echo $cnt['email'] ?>" class="form-control" placeholder="Email" readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mobile</label>
                      <input type="text" name="txtmobile" value="<?php echo $cnt['mobile'] ?>" class="form-control" placeholder="Mobile" readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Photo</label>
                      <input type="file" name="filephoto" value="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="form-control">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date of Birth</label>
                      <input type="date" name="txtdob" value="<?php echo $cnt['dob'] ?>" class="form-control" placeholder="DOB">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date of Joining</label>
                      <input type="date" name="txtdoj" value="<?php echo $cnt['doj'] ?>" class="form-control" placeholder="DOJ">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Employee Id</label>
                      <input type="text" name="employee_id" value="<?php echo $cnt['employee_id'] ?>" class="form-control" placeholder="Employee Id">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Blood Group</label>
                      <input type="text" name="blood_group" value="<?php echo $cnt['blood_group'] ?>" class="form-control" placeholder="Blood Group">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>City</label>
                      <input type="text" name="txtcity" value="<?php echo $cnt['city'] ?>" class="form-control" placeholder="City">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>State</label>
                      <input type="text" name="txtstate" value="<?php echo $cnt['state'] ?>" class="form-control" placeholder="State">
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Country</label>
                      <select class="form-control selectpicker" data-live-search="true" name="slccountry">
                        <option value="">Select</option>
                        <?php
                        if (isset($country)) {
                          foreach ($country as $cnt1) {
                            if ($cnt1['country_name'] == $cnt['country']) {
                              print "<option value='" . $cnt1['country_name'] . "' selected>" . $cnt1['country_name'] . "</option>";
                            } else {
                              print "<option value='" . $cnt1['country_name'] . "'>" . $cnt1['country_name'] . "</option>";
                            }
                          }
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Address</label>
                      <textarea class="form-control" name="txtaddress"><?php echo $cnt['address'] ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Files</label>
                      <input type="hidden" name="prev_files" class="form-control" placeholder="Files" value="<?php echo $cnt['files'] ?>">
                      <input type="file" name="files[]" class="form-control" placeholder="Files" multiple>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group" style="background-color: #ecf0f5; padding:10px; border-radius:5px">
                      <?php
                      $links = explode(',', $cnt['files']);
                      if ($cnt['files'] != '') {
                        foreach ($links as $key => $value) {
                          $filename = explode('_', $value, 2);
                          if (!isset($filename['1'])) {
                            $filename['1'] = $value;
                          }
                          if ($value != '') {
                            echo '
                                      <div class"d-flex" style="margin:10px">
                                      <a href="' . base_url() . 'uploads/staff-files/' . $value . '" download>
                                      ' . $filename['1'] . '
                                      </a>
                                      <a class="label label-danger" style="margin-left:20px" href="' . base_url() . 'delete-staff-file/' . $cnt['id'] . '/' . $value . '">
                                      Delete
                                      </a>
                                      <br>
                                      </div>
                                    ';
                          }
                        }
                      } else {
                        echo 'No Files';
                      }
                      ?>
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

          <!-- general form elements -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Edit Staff Permissions</h3>
            </div>
            <!-- /.box-header -->

            <?php if (isset($content)): ?>
              <?php foreach ($content as $cnt): ?>
                <?php
                if (isset($cnt['permissions']['0'])) {
                  $permission = $cnt['permissions']['0']['permission'];
                } else {
                  $permission = 'no_access';
                }
                ?>
                <!-- form start -->
                <?php echo form_open_multipart('Staff/update_staff_permissions'); ?>
                <div class="box-body">

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Module</label>
                      <input type="hidden" name="staff_id" value="<?php echo $cnt['id'] ?>" class="form-control" placeholder="Staff Id">
                      <select class="form-control selectpicker" data-live-search="true" name="module">
                        <option value="marketing">Marketing</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Permission</label>
                      <select class="form-control selectpicker" data-live-search="true" name="permission">
                        <option value="no_access" <?php if ($permission == 'no_access') {
                                                    echo "selected";
                                                  } ?>>No Access</option>
                        <option value="view_access" <?php if ($permission == 'view_access') {
                                                      echo "selected";
                                                    } ?>>View Access</option>
                        <option value="edit_access" <?php if ($permission == 'edit_access') {
                                                      echo "selected";
                                                    } ?>>Edit Access</option>
                      </select>
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