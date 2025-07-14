  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Appointments
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Appointments</a></li>
        <li class="active">Edit Appointments</li>
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
              <h3 class="box-title">Edit Appointments</h3>
            </div>
            <!-- /.box-header -->
            <?php if(isset($content)): ?>
                <?php foreach($content as $cnt): ?>
                    <!-- form start -->
                    <?php echo form_open_multipart('Appointments/update');?>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Client Name</label>
                                <input type="hidden" name="appointment_id" value="<?php echo $cnt['appointment_id'] ?>" class="form-control" placeholder="Full Name">
                                <input type="text" name="client" class="form-control" placeholder="Client Name" value="<?php echo $cnt['client'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Status</label>
                                <input type="text" name="status" class="form-control" placeholder="Status" value="<?php echo $cnt['status'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Remarks</label>
                                <textarea type="text" name="remarks" class="form-control" placeholder="Remarks" rows="12"><?php echo $cnt['remarks'] ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Service</label>
                                <input type="text" name="service" class="form-control" placeholder="Service" value="<?php echo $cnt['service'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                              <label>Images</label>
                              <input type="hidden" name="prev_files" class="form-control" placeholder="Files" value="<?php echo $cnt['images'] ?>">
                              <input type="file" name="files[]" class="form-control" placeholder="Files" multiple>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group" style="background-color: #ecf0f5; padding:10px; border-radius:5px">
                              <?php
                                  $links = explode(',',$cnt['images']);
                                  if($cnt['images']!=''){
                                    foreach ($links as $key => $value) {
                                      $filename = explode('_',$value,2);
                                      if(!isset($filename['1'])){
                                        $filename['1'] = $value;
                                      }
                                      if($value != ''){
                                        echo '
                                          <div class"d-flex" style="margin:10px">
                                            <a href="'.base_url().'uploads/marketing/'.$value.'" target="_blank">
                                              <img src="'.base_url().'uploads/marketing/'.$value.'" width="150"/>
                                              '.$filename['1'].'
                                            </a>
                                            <a class="label label-danger" style="margin-left:20px" href="'.base_url().'delete-marketing-file/'.$cnt['appointment_id'].'/'.$value.'">
                                            Delete
                                            </a>
                                            <br>
                                          </div>
                                        ';
                                      }
                                    }
                                  }else{
                                    echo'No Files';
                                  }
                                ?>
                          </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                            <label>Location</label>
                            <input type="hidden" id="location" name="location" class="form-control" placeholder="location points" value="<?php echo $cnt['location'] ?>">
                            <div id="location-details">Click on the 'Pick Location' Button</div>
                            <a class="btn btn-primary" id="get-location">Pick Location</a>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <div class="map"></div>
                          </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Lead Type</label>
                                <select name="lead_type" class="form-control">
                                    <?php 
                                        if($cnt['lead_type'] == 'hot'){
                                            echo '
                                            <option value="hot" selected>Hot</option>
                                            <option value="cold" >Cold</option>
                                            ';
                                        }else{
                                            echo '
                                            <option value="hot">Hot</option>
                                            <option value="cold" selected>Cold</option>
                                            ';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Date</label>
                                <input type="date" name="date" class="form-control" placeholder="Date" value="<?php echo $cnt['date'] ?>">
                            </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label>Follow up Date</label>
                            <input type="date" name="follow_up_date" class="form-control" placeholder="Follow up Date" value="<?php echo $cnt['follow_up_date'] ?>">
                          </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Close Status</label>
                                <select name="close_status" class="form-control">
                                    <?php 
                                        if($cnt['close_status'] == 'closing'){
                                            echo '
                                            <option value="closing" selected>Closing</option>
                                            <option value="non-closing" >Non Closing</option>
                                            ';
                                        }else{
                                            echo '
                                            <option value="closing">Closing</option>
                                            <option value="non-closing" selected>Non Closing</option>
                                            ';
                                        }
                                    ?>
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


  <script>
    let locationButton = document.getElementById("get-location");
    let locationDiv = document.getElementById("location-details");

    locationButton.addEventListener("click", () => {
      //Geolocation APU is used to get geographical position of a user and is available inside the navigator object
      if (navigator.geolocation) {
        //returns position(latitude and longitude) or error
        navigator.geolocation.getCurrentPosition(showLocation, checkError);
      } else {
        //For old browser i.e IE
        locationDiv.innerText = "The browser does not support geolocation";
      }
    });

    //Error Checks
    const checkError = (error) => {
      switch (error.code) {
        case error.PERMISSION_DENIED:
          locationDiv.innerText = "Please allow access to location";
          break;
        case error.POSITION_UNAVAILABLE:
          //usually fired for firefox
          locationDiv.innerText = "Location Information unavailable";
          break;
        case error.TIMEOUT:
          locationDiv.innerText = "The request to get user location timed out";
      }
    };

    const showLocation = async (position) => {
      //We user the NOminatim API for getting actual addres from latitude and longitude
      let response = await fetch(
        `https://nominatim.openstreetmap.org/reverse?lat=${position.coords.latitude}&lon=${position.coords.longitude}&format=json`
      );
      console.log(position.coords.latitude)
      console.log(position.coords.longitude)
      //store response object
      let data = await response.json();
      locationDiv.innerText = `${data.address.city}, ${data.address.country}`;
      
      $('#location').val(position.coords.latitude+','+position.coords.longitude);
      $('.map').html('<iframe src="https://maps.google.com/maps?q=' + position.coords.latitude + ',' + position.coords.longitude + '&t=&z=15&ie=UTF8&iwloc=&output=embed" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>');
    };

    $(document).ready(function(){
      let points = '<?php echo $cnt['location']; ?>';
      let pointsArr = points.split(',');
      let lat = pointsArr['0'];
      let lang = pointsArr['1'];
      console.log(lat+' , '+lang);
      $('.map').html('<iframe src="https://maps.google.com/maps?q=' + lat + ',' + lang + '&t=&z=15&ie=UTF8&iwloc=&output=embed" width="auto" height="auto" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>');
    })
  </script>