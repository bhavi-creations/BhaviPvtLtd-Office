<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="<?= base_url('client_advances'); ?>">Client Advances</a></li>
            <li><a href="<?= base_url('client_advances/view/' . $advance['id']); ?>">View Advance</a></li>
            <li class="active">Add Payment</li>
        </ol>
    </section>

    <section class="content">
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Add Payment for Advance ID: <?= html_escape($advance['id']); ?> (<?= html_escape($advance['client_name']); ?>)</h3>
            </div>
            <?= form_open('client_advances/add_payment/' . $advance['id']); ?>
            <div class="box-body">
                <p><strong>Total Amount:</strong> <?= html_escape(number_format($advance['amount'], 2)); ?></p> <p><strong>Paid Amount So Far:</strong> <?= html_escape(number_format($advance['paid_amount'], 2)); ?></p>
                <p><strong>Remaining Balance:</strong> <span class="text-danger"><?= html_escape(number_format($advance['balance_amount'], 2)); ?></span></p>
                <div class="form-group">
                    <label for="amount_paid">Amount Paid <span class="text-danger">*</span></label>
                    <input type="number" name="amount_paid" id="amount_paid" class="form-control" value="<?= set_value('amount_paid', ''); ?>" step="0.01" required max="<?= $advance['balance_amount']; ?>">
                    <?= form_error('amount_paid', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="payment_date">Payment Date <span class="text-danger">*</span></label>
                    <input type="date" name="payment_date" id="payment_date" class="form-control" value="<?= set_value('payment_date', date('Y-m-d')); ?>" required>
                    <?= form_error('payment_date', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="payment_method">Payment Method</label>
                    <input type="text" name="payment_method" id="payment_method" class="form-control" value="<?= set_value('payment_method'); ?>" placeholder="e.g., Cash, Bank Transfer">
                    <?= form_error('payment_method', '<div class="text-danger">', '</div>'); ?>
                </div>

                <div class="form-group">
                    <label for="remarks">Remarks</label>
                    <textarea name="remarks" id="remarks" class="form-control" rows="3"><?= set_value('remarks'); ?></textarea>
                    <?= form_error('remarks', '<div class="text-danger">', '</div>'); ?>
                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit Payment</button>
                <a href="<?= base_url('client_advances/view/' . $advance['id']); ?>" class="btn btn-default">Cancel</a>
            </div>
            <?= form_close(); ?>
        </div>
    </section>
</div>