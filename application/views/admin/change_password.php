<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Change Password
            <small>Update your admin panel password</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change Password</li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header with-border"> <h3 class="box-title">Change Your Account Password</h3>
            </div>
            <div class="box-body">
                <?php
                // Display success or error messages (flash data)
                if ($this->session->flashdata('success')):
                ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                <?php
                endif;

                if ($this->session->flashdata('error')):
                ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php
                endif;
                ?>

                <?php echo form_open('home/change_password'); // Form action points to the Home controller's change_password method ?>
                    <div class="form-group">
                        <label for="current_password">Current Password:</label>
                        <input type="password" class="form-control" id="current_password" name="current_password" placeholder="Enter current password" required>
                        <?php echo form_error('current_password', '<div class="text-danger">', '</div>'); // Uses Bootstrap text-danger class ?>
                    </div>

                    <div class="form-group">
                        <label for="new_password">New Password:</label>
                        <input type="password" class="form-control" id="new_password" name="new_password" placeholder="Enter new password" required>
                        <?php echo form_error('new_password', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="form-group">
                        <label for="confirm_password">Confirm New Password:</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm new password" required>
                        <?php echo form_error('confirm_password', '<div class="text-danger">', '</div>'); ?>
                    </div>

                    <div class="box-footer"> <button type="submit" class="btn btn-primary">Change Password</button>
                    </div>
                <?php echo form_close(); ?>

            </div>
            </div>
        </section>
    </div>