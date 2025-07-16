<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Staff Management
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Staff Management</a></li>
      <li class="active">Add Staff</li>
    </ol>
  </section>

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

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Add Staff</h3>
          </div>
          <?php echo form_open_multipart('Staff/insert'); ?>
          <div class="box-body">



            <div class="col-md-6">
              <div class="form-group">
                <label>Full Name</label>
                <input type="text" name="txtname" class="form-control" placeholder="Full Name">
              </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                <label>Designation</label>
                <input type="text" name="txtdesignation" class="form-control" placeholder="Designation">
              </div>
            </div>



            <div class="col-md-6">
              <div class="form-group">
                <label>Department</label>
                <select class="form-control selectpicker" data-live-search="true" name="slcdepartment">
                  <option value="">Select</option>
                  <?php
                  if (isset($department)) {
                    foreach ($department as $cnt) {
                      print "<option value='" . $cnt['id'] . "'>" . $cnt['department_name'] . " " . $cnt['city'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Salary</label>
                <input type="number" name="txtsalary" class="form-control" placeholder="Salary">
              </div>
            </div>


            <div class="col-md-6">
              <div class="form-group">
                <label>Gender</label>
                <select class="form-control selectpicker" data-live-search="true" name="slcgender">
                  <option value="">Select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                  <option value="Others">Others</option>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" name="txtemail" class="form-control" placeholder="Email">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Mobile</label>
                <input type="text" name="txtmobile" class="form-control" placeholder="Mobile">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Photo</label>
                <input type="file" name="filephoto" class="form-control">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Birth</label>
                <input type="date" name="txtdob" class="form-control" placeholder="DOB">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Date of Joining</label>
                <input type="date" name="txtdoj" class="form-control" placeholder="DOJ">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Employee Id</label>
                <input type="text" name="employee_id" class="form-control" placeholder="Employee Id">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Blood Group</label>
                <input type="text" name="blood_group" class="form-control" placeholder="Blood Group">
              </div>
            </div>




            <div class="col-md-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" name="txtcity" class="form-control" placeholder="City">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>State</label>
                <input type="text" name="txtstate" class="form-control" placeholder="State">
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
                      print "<option value='" . $cnt1['country_name'] . "'>" . $cnt1['country_name'] . "</option>";
                    }
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Address</label>
                <textarea class="form-control" name="txtaddress"></textarea>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Images</label>
                <input type="file" name="files[]" class="form-control" placeholder="Files" multiple>
              </div>
            </div>



            <div class="col-md-12">
              <h4>Bank & Identification Details</h4>
              <hr>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Bank Name</label>
                <input type="text" name="txtbank_name" class="form-control" placeholder="Bank Name">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>Bank Account No</label>
                <input type="text" name="txtbank_account_no" class="form-control" placeholder="Bank Account Number">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>IFSC Code</label>
                <input type="text" name="txtifsc_code" class="form-control" placeholder="IFSC Code">
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label>PAN/Aadhar No</label>
                <input type="text" name="txtpan_adhar_no" class="form-control" placeholder="PAN/Aadhar Number">
              </div>
            </div>


          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-info pull-right">Submit</button>
          </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>