<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Client Advances</li>
        </ol>
    </section>

    <section class="content">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <div class="box">
            <div class="box-header">
                <h3 class="box-title">All Client Advances</h3>
                <a href="<?= base_url('client_advances/add'); ?>" class="btn btn-primary pull-right">Add New Advance</a>
            </div>
            <div class="box-body">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>S.No.</th> <th>Client Name</th>
                            <th>Advance Type</th>
                            <th>Total Amount</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Balance</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($advances)): ?>
                            <?php $s_no = 1; ?> <?php foreach ($advances as $advance): ?>
                                <tr>
                                    <td><?= $s_no++; ?></td> <td><?= html_escape($advance['client_name']); ?></td>
                                    <td><?= html_escape($advance['advance_type'] ?? 'N/A'); ?></td>
                                    <td><?= html_escape(number_format($advance['amount'], 2)); ?></td>
                                    <td><?= html_escape(date('d-M-Y', strtotime($advance['start_date']))); ?></td>
                                    <td><?= html_escape(!empty($advance['end_date']) ? date('d-M-Y', strtotime($advance['end_date'])) : 'N/A'); ?></td>
                                    <td><?= html_escape(number_format($advance['balance_amount'], 2)); ?></td>
                                    <td><?= html_escape($advance['status']); ?></td>
                                    <td>
                                        <a href="<?= base_url('client_advances/view/' . $advance['id']); ?>" class="btn btn-info btn-xs">View</a>
                                        <a href="<?= base_url('client_advances/edit/' . $advance['id']); ?>" class="btn btn-warning btn-xs">Edit</a>
                                        <a href="<?= base_url('client_advances/delete/' . $advance['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this advance and all its payments?');">Delete</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr><td colspan="9">No client advances found.</td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>