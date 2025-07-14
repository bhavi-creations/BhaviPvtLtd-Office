  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Products
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Products</a></li>
        <li class="active">Add Product</li>
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
              <h3 class="box-title">Add Products</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <?php echo form_open_multipart('Products/insert');?>
              <div class="box-body">
                <div class="col-md-4">
                  <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="product_name" class="form-control" placeholder="Product Name">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Brand Name</label>
                    <input type="text" name="brand_name" class="form-control" placeholder="Brand Name">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="category" class="form-control" placeholder="Category">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Date Added</label>
                    <input type="date" name="date_added" class="form-control" placeholder="Date Added">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Expiry Date</label>
                    <input type="date" name="expiry_date" class="form-control" placeholder="Expiry Date">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Original Price</label>
                    <input type="text" name="original_price" class="form-control" placeholder="Original Price">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Selling Price</label>
                    <input type="text" name="selling_price" class="form-control" placeholder="Selling Price">
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Supplier</label>
                    <select name="supplier" id="supplier" class="form-control">
                        <option value="">Select Supplier</option>
                        <?php
                            if(isset($suppliers))
                            {
                                foreach($suppliers as $cnt)
                                {
                                    print "<option value='".$cnt['id']."'>".$cnt['supplier_name']."</option>";
                                }
                            } 
                        ?>
                    </select>
                  </div>
                </div>

                <div class="col-md-4">
                  <div class="form-group">
                    <label>Quantity</label>
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity">
                    <input type="hidden" name="quantity_left" class="form-control" placeholder="Quantity left">
                    <input type="hidden" name="status" class="form-control" placeholder="status" value="1">
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