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
        <li class="active">Edit Product</li>
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
              <h3 class="box-title">Edit Products</h3>
            </div>
            <!-- /.box-header -->
            <?php if(isset($content)): ?>
                <?php foreach($content as $cnt): ?>
                    <!-- form start -->
                    <?php echo form_open_multipart('Products/update');?>
                        <div class="box-body">
                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Product Name</label>
                                <input type="hidden" name="product_id" value="<?php echo $cnt['product_id'] ?>" class="form-control" placeholder="product Id">
                                <input type="text" name="product_name" class="form-control" placeholder="Product Name"  value="<?php echo $cnt['product_name'] ?>">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input type="text" name="brand_name" class="form-control" placeholder="Brand Name"  value="<?php echo $cnt['brand_name'] ?>">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Category</label>
                                <input type="text" name="category" class="form-control" placeholder="Category"  value="<?php echo $cnt['category'] ?>">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Date Added</label>
                                <input type="date" name="date_added" class="form-control" placeholder="Date Added" value="<?php echo $cnt['date_added'] ?>">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Expiry Date</label>
                                <input type="date" name="expiry_date" class="form-control" placeholder="Expiry Date" value="<?php echo $cnt['expiry_date'] ?>">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Original Price</label>
                                <input type="text" name="original_price" class="form-control" placeholder="Original Price"  value="<?php echo $cnt['original_price'] ?>">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Selling Price</label>
                                <input type="text" name="selling_price" class="form-control" placeholder="Selling Price"  value="<?php echo $cnt['selling_price'] ?>">
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
                                            foreach($suppliers as $cnt1)
                                            {
                                                if($cnt1['id']==$cnt['supplier'])
                                                {
                                                    print "<option value='".$cnt1['id']."' selected>".$cnt1['supplier_name']."</option>";
                                                }else{
                                                    print "<option value='".$cnt1['id']."'>".$cnt1['supplier_name']."</option>";
                                                }
                                            }
                                        } 
                                    ?>
                                </select>
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity" class="form-control" placeholder="Quantity"  value="<?php echo $cnt['quantity'] ?>">
                                <input type="hidden" name="status" class="form-control" placeholder="status" value="1">
                            </div>
                            </div>

                            <div class="col-md-4">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input type="number" name="quantity_left" class="form-control" placeholder="Quantity left"  value="<?php echo $cnt['quantity_left'] ?>">
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