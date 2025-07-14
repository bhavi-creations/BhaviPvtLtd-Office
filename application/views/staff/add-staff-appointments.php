
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
        <li class="active">Add Appointments</li>
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
              <h3 class="box-title">Add Appointments</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Appointments/staff_insert');?>
              <div class="box-body">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Client Name</label>
                    <input type="text" name="client" class="form-control" placeholder="Client Name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Status</label>
                    <input type="text" name="status" class="form-control" placeholder="Status">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Remarks</label>
                    <textarea type="text" name="remarks" class="form-control" placeholder="Remarks" rows="12"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Service</label>
                    <input type="text" name="service" class="form-control" placeholder="Service">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                      <label>Images</label>
                      <input type="file" name="files[]" class="form-control" placeholder="Files" multiple>
                  </div>
                </div>

                <div class="col-md-2">
                  <div class="form-group">
                    <label>Location</label>
                    <input type="hidden" id="location" name="location" class="form-control" placeholder="location points">
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
                        <option value="hot">Hot</option>
                        <option value="cold">Cold</option>
                    </select>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Date</label>
                    <input type="date" name="date" class="form-control" placeholder="Date" value="<?php echo date('Y-m-d'); ?>">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Follow up Date</label>
                    <input type="date" name="follow_up_date" class="form-control" placeholder="Follow up Date" value="<?php echo date('Y-m-d', strtotime("+1 week")); ?>">
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Close Status</label>
                    <select name="close_status" class="form-control">
                        <option value="closing">Closing</option>
                        <option value="non-closing">Non Closing</option>
                    </select>
                  </div>
                </div>

              </div>
              <!-- /.box-body -->
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
  </script>