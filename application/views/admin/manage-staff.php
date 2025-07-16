<div class="content-wrapper">
    <section class="content-header">
      <h1>
        Staff
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Staff Management</a></li>
        <li class="active">Manage Staff</li>
      </ol>
    </section>

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
              <h3 class="box-title">Manage Staff</h3>
            </div>
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Employee Id</th>
                    <th>Name</th>
                    <th>Pic</th>
                    <th>Files</th>
                    <th>Department</th>
                    <th>Designation</th>
                    <th>Bank Name</th>
                    <th>Bank Account No</th>
                    <th>IFSC Code</th>
                    <th>PAN/Aadhar No</th>
                    <th>Gender</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Date of Birth</th>
                    <th>Date of Joining</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Salary</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                      // to stop displaying admin
                      if($cnt['id']!=1){
                    ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['employee_id']; ?></td>
                        <td><?php echo $cnt['staff_name']; ?></td>
                        <td><img src="<?php echo base_url(); ?>uploads/profile-pic/<?php echo $cnt['pic'] ?>" class="img-circle" width="50px" alt="User Image"></td>
                        <td>
                          <?php
                            $links = explode(',',$cnt['files']);
                            foreach ($links as $key => $value) {
                              $filename = explode('_',$value,2);
                              if(!isset($filename['1'])){
                                $filename['1'] = $value;
                              }
                              echo '
                                <a href="'.base_url().'uploads/staff-files/'.$value.'" download>
                                '.$filename['1'].'
                                </a><br>
                              ';
                            }
                          ?>
                        </td>
                        <td><?php echo $cnt['department_name']; ?></td>
                        <td><?php echo $cnt['designation']; ?></td>
                        <td><?php echo $cnt['bank_name']; ?></td>
                        <td><?php echo $cnt['bank_account_no']; ?></td>
                        <td><?php echo $cnt['ifsc_code']; ?></td>
                        <td><?php echo $cnt['pan_adhar_no']; ?></td>
                        <td><?php echo $cnt['gender']; ?></td>
                        <td><?php echo $cnt['mobile']; ?></td>
                        <td><?php echo $cnt['email']; ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['dob'])); ?></td>
                        <td><?php echo date('d-m-Y', strtotime($cnt['doj'])); ?></td>
                        <td><?php echo $cnt['address']; ?></td>
                        <td><?php echo $cnt['city']; ?></td>
                        <td><?php echo $cnt['state']; ?></td>
                        <td><?php echo $cnt['country']; ?></td>
                        <td><?php echo number_format($cnt['salary'], 2); ?></td>

                        <td>
                          <a href="<?php echo base_url(); ?>edit-staff/<?php echo $cnt['id']; ?>" class="btn btn-info">Edit</a>
                          <a href="<?php echo base_url(); ?>delete-staff/<?php echo $cnt['id']; ?>" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php 
                      $i++;
                      }
                      endforeach;
                      endif; 
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
    </div>