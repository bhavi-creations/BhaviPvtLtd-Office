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
        <li class="active">Manage Products</li>
      </ol>
    </section>

    <!-- Main content -->
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
              <h3 class="box-title">Manage Products</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Slno.</th>
                    <th>Name</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Added On</th>
                    <th>Expiry date</th>
                    <th>Original Price</th>
                    <th>Selling Price</th>
                    <th>Supplier</th>
                    <th>QTY</th>
                    <th>QTY left</th>
                    <th>Actions</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php 
                    if(isset($content)):
                    $i=1; 
                    foreach($content as $cnt): 
                  ?>
                      <tr>
                        <td><?php echo $i; ?></td>
                        <td><?php echo $cnt['product_name']; ?></td>
                        <td><?php echo $cnt['brand_name']; ?></td>
                        <td><?php echo $cnt['category']; ?></td>
                        <td><?php echo $cnt['date_added']; ?></td>
                        <td><?php echo $cnt['expiry_date']; ?></td>
                        <td><?php echo $cnt['original_price']; ?></td>
                        <td><?php echo $cnt['selling_price']; ?></td>
                        <td><?php echo $cnt['supplier_name']; ?></td>
                        <td><?php echo $cnt['quantity']; ?></td>
                        <td><?php echo $cnt['quantity_left']; ?></td>
                        <td>
                          <a href="<?php echo base_url(); ?>edit-products/<?php echo $cnt['product_id']; ?>" class="btn btn-info">Edit</a>
                          <a href="#" onclick="deleteItem('<?php echo base_url(); ?>delete-products/<?php echo $cnt['product_id']; ?>')" class="btn btn-danger">Delete</a>
                        </td>
                      </tr>
                    <?php 
                      $i++;
                      endforeach;
                      endif; 
                    ?>
                  
                  </tbody>
                </table>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->