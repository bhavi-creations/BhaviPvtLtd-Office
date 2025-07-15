<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('client_advances'); ?>">Client Advances</a></li>
            <li class="active">View Details</li>
        </ol>
    </section>

    <section class="content">
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="alert alert-success"><?= $this->session->flashdata('success'); ?></div>
        <?php endif; ?>
        <?php if ($this->session->flashdata('error')) : ?>
            <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
        <?php endif; ?>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Advance Details</h3>
                    </div>
                    <div class="box-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>Client Name:</th>
                                <td><?= html_escape($advance['client_name']); ?></td>
                            </tr>
                            <tr>
                                <th>Advance Type:</th>
                                <td><?= html_escape($advance['advance_type'] ?? 'N/A'); ?></td>
                            </tr>
                            <tr>
                                <th>Total Amount:</th> <td><?= html_escape(number_format($advance['amount'], 2)); ?></td>
                            </tr>
                            <tr>
                                <th>Start Date:</th>
                                <td><?= html_escape(date('d-M-Y', strtotime($advance['start_date']))); ?></td>
                            </tr>
                            <?php if (!empty($advance['end_date'])): ?>
                            <tr>
                                <th>Planned End Date:</th>
                                <td><?= html_escape(date('d-M-Y', strtotime($advance['end_date']))); ?></td>
                            </tr>
                            <?php endif; ?>
                            <tr>
                                <th>Description:</th>
                                <td><?= html_escape($advance['description']); ?></td>
                            </tr>
                            <tr>
                                <th>Paid Amount:</th>
                                <td><?= html_escape(number_format($advance['paid_amount'], 2)); ?></td>
                            </tr>
                            <tr>
                                <th>Balance Amount:</th>
                                <td class="<?= ($advance['balance_amount'] <= 0) ? 'text-success' : 'text-danger'; ?>">
                                    <strong><?= html_escape(number_format($advance['balance_amount'], 2)); ?></strong>
                                </td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td><?= html_escape($advance['status']); ?></td>
                            </tr>
                            <tr>
                                <th>Created On:</th>
                                <td><?= html_escape(date('d-M-Y h:i A', strtotime($advance['created_at']))); ?></td>
                            </tr>
                        </table>
                        <a href="<?= base_url('client_advances'); ?>" class="btn btn-default">Back to List</a>
                        <a href="<?= base_url('client_advances/edit/' . $advance['id']); ?>" class="btn btn-warning">Edit Advance Details</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Installment Payments</h3>
                        <?php if ($advance['status'] != 'Completed'): ?>
                            <a href="<?= base_url('client_advances/add_payment/' . $advance['id']); ?>" class="btn btn-success btn-sm pull-right">Add Payment</a>
                        <?php endif; ?>
                    </div>
                    <div class="box-body">
                        <?php if (!empty($installments)): ?>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Amount Paid</th>
                                    <th>Method</th>
                                    <th>Remarks</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($installments as $installment): ?>
                                    <tr>
                                        <td><?= html_escape(date('d-M-Y', strtotime($installment['payment_date']))); ?></td>
                                        <td><?= html_escape(number_format($installment['amount_paid'], 2)); ?></td>
                                        <td><?= html_escape($installment['payment_method'] ?? 'N/A'); ?></td>
                                        <td><?= html_escape($installment['remarks'] ?? 'N/A'); ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php else: ?>
                            <p>No installment payments recorded for this advance yet.</p>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>