  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Clients
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Clients</a></li>
        <li class="active">Add Client</li>
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
              <h3 class="box-title">Add Client</h3>
              <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" onclick="showQuotationTable()">Quote</button>
              </div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?php echo base_url(); ?>insert-client" method="POST">
              <div class="box-body">

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Client Name">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Mobile</label>
                    <input type="text" name="mobile" class="form-control" placeholder="Mobile">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Refered by</label>
                    <input type="text" name="refered" class="form-control" placeholder="Refered By">
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Address</label>
                    <textarea class="form-control" name="address" id="address" cols="30" rows="5"></textarea>
                  </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputPassword1">Details</label>
                    <textarea class="form-control" name="details" id="details" cols="30" rows="5"></textarea>
                  </div>
                </div>


                <div id="quotation_table" style="display: none;">

                  <div class="box-body">
                    <div class="row">
                      <div class="mt-4">
                        <h4>Quotation</h4>
                      </div>

                      <button type="button" class="btn btn-danger pull-right" onclick="closeQuotationTable()">Close</button>
                    </div>
                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-6">
                        <label for="Project ">Project Duraion</label>
                        <input type="text" class="form-control" name="project_duration">
                      </div>
                      <div class="col-md-6">
                        <label for="Project ">Digital Services</label>
                        <textarea name="digital_services" id="" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="row " style="padding-top: 20px;">
                      <div class="col-md-6 ">
                        <label for="images ">Images</label>
                        <select name="images" id="" class="form-control">
                          <option value="not-selected">Select</option>
                          <option value="monthly">monthly</option>
                          <option value="yearly">yearly</option>
                          <option value="day">Day</option>
                        </select>
                      </div>
                      <div class="col-md-6">
                        <label for="Project ">Description</label>
                        <textarea name="description" id="" cols="30" rows="2" class="form-control"></textarea>
                      </div>
                    </div>
                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-6 ">
                        <label>
                          <input type="checkbox" id="toggleCheckbox"> SEO
                        </label>

                      </div>
                      <div class="form-group col-md-6" id="textareaContainer" style="display: none;">
                        <label for="textarea">Key word and Description</label>
                        <textarea name="SEO" class="form-control" id="textarea" rows="3"></textarea>
                      </div>
                    </div>

                    <div class="row" style="padding-top: 20px;">
                      <div class="col-md-6 ">
                        <label>Links</label>
                        <textarea name="links" id="" cols="30" rows="3" class="form-control"></textarea>
                      </div>
                      <div class="col-md-6 ">
                        <label>
                          <input type="checkbox" id="payCheckbox"> Payments(installments)
                        </label>
                        <div class="form-group" id="textareapayments" style="display: none;">
                          <select name="payment_installments" id="" class="form-control">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <!-- Modal -->
                <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Quotation</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="row">
                          <div class="col-md-6">
                            <label for="Project ">Project Duraion</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="col-md-6">
                            <label for="Project ">Digital Services</label>
                            <textarea name="services" id="" cols="30" rows="2" class="form-control"></textarea>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <label for="Project ">Project Duraion</label>
                            <input type="text" class="form-control">
                          </div>
                          <div class="col-md-6">
                            <label for="Project ">Digital Services</label>
                            <textarea name="services" id="" cols="30" rows="2" class="form-control"></textarea>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </div>
                </div> -->

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

  <!-- Button trigger modal -->

  <!-- Modal -->



  <script>
    // $('#myModal').on('shown.bs.modal', function() {
    //   $('#myInput').trigger('focus')
    // })


    document.addEventListener('DOMContentLoaded', function() {
      var checkbox = document.getElementById('toggleCheckbox');
      var textareaContainer = document.getElementById('textareaContainer');
      var payCheckbox = document.getElementById('payCheckbox');
      var paycontainer = document.getElementById('textareapayments');

      // Add event listener to the first checkbox
      checkbox.addEventListener('change', function() {
        textareaContainer.style.display = checkbox.checked ? 'block' : 'none';
      });

      // Add event listener to the second checkbox
      payCheckbox.addEventListener('change', function() {
        paycontainer.style.display = payCheckbox.checked ? 'block' : 'none';
      });
    });


    function showQuotationTable() {
      var quotationTable = document.getElementById('quotation_table');
      quotationTable.style.display = 'block';
    }


    function closeQuotationTable() {
      var quotationTable = document.getElementById('quotation_table');
      quotationTable.style.display = 'none';
    }
  </script>