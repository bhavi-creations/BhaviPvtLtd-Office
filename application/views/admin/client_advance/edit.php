<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('client_advances'); ?>">Client Advances</a></li>
            <li><a href="<?= base_url('client_advances/view/' . $advance['id']); ?>">View Advance</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Edit Client Advance Information</h3>
            </div>
            <?= form_open('client_advances/edit/' . $advance['id']); ?>
            <div class="box-body">
                <div class="form-group">
                    <label for="client_name">Client Name <span class="text-danger">*</span></label>
                    <input type="text" name="client_name" id="client_name" class="form-control" value="<?= set_value('client_name', $advance['client_name']); ?>" required placeholder="Enter client's full name">
                    <?= form_error('client_name', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="amount">Total Amount <span class="text-danger">*</span></label> <input type="number" name="amount" id="amount" class="form-control" value="<?= set_value('amount', $advance['amount']); ?>" step="0.01" required>
                    <?= form_error('amount', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="start_date">Start Date <span class="text-danger">*</span></label>
                    <input type="date" name="start_date" id="start_date" class="form-control" value="<?= set_value('start_date', $advance['start_date']); ?>" required>
                    <?= form_error('start_date', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="end_date">End Date (Optional, for planned completion)</label>
                    <input type="date" name="end_date" id="end_date" class="form-control" value="<?= set_value('end_date', $advance['end_date']); ?>">
                    <?= form_error('end_date', '<div class="text-danger">', '</div>'); ?>
                </div>
                
                <div class="form-group">
                    <label for="advance_type">Advance Type (Optional)</label>
                    <input type="text" name="advance_type" id="advance_type" class="form-control" value="<?= set_value('advance_type', $advance['advance_type']); ?>" placeholder="e.g., Cash Advance, Project Advance">
                    <?= form_error('advance_type', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="3"><?= set_value('description', $advance['description']); ?></textarea>
                    <?= form_error('description', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="status">Status <span class="text-danger">*</span></label>
                    <select name="status" id="status" class="form-control" required>
                        <option value="Active" <?= set_select('status', 'Active', ($advance['status'] == 'Active')); ?>>Active</option>
                        <option value="Completed" <?= set_select('status', 'Completed', ($advance['status'] == 'Completed')); ?>>Completed</option>
                        <option value="Canceled" <?= set_select('status', 'Canceled', ($advance['status'] == 'Canceled')); ?>>Canceled</option>
                        <option value="Pending" <?= set_select('status', 'Pending', ($advance['status'] == 'Pending')); ?>>Pending</option>
                    </select>
                    <?= form_error('status', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update Advance</button>
                <a href="<?= base_url('client_advances/view/' . $advance['id']); ?>" class="btn btn-default">Cancel</a>
            </div>
            <?= form_close(); ?>
        </div>
    </section>
</div>