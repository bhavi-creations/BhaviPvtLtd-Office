<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Client Services & Payments</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Basic Client Information</h3>
                        </div>
                        <div class="card-body">
                            <p><strong>Name:</strong> <?php echo $client['client_name']; ?></p>
                            <p><strong>Email:</strong> <?php echo $client['client_email']; ?></p>
                            <p><strong>Mobile:</strong> <?php echo $client['client_mobile']; ?></p>
                            <p><strong>Address:</strong> <?php echo $client['client_address']; ?></p>
                            <p><strong>Refered By:</strong> <?php echo $client['refered_by']; ?></p>
                            <p><strong>Total Outstanding:</strong> <span class="badge badge-danger">₹ <?php echo number_format($total_outstanding, 2); ?></span></p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Client Services / Packages</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addServiceModal">
                                    Add New Service
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addPaymentModal">
                                    Add General Payment
                                </button>
                                <!-- <button type="button" class="btn btn-info btn-sm" id="viewGeneralPaymentsBtn" data-client-id="<?php echo $client['client_id']; ?>">
                                    <i class="fas fa-list"></i> View General Payments
                                </button> -->
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if (!empty($services)): ?>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Service Name</th>
                                            <th>Amount (₹)</th>
                                            <th>Paid (₹)</th>
                                            <th>Outstanding (₹)</th>
                                            <!-- <th>Method</th> -->
                                            <!-- <td><?php echo !empty($service['payment_method']) ? $service['payment_method'] : '-'; ?></td> -->

                                            <th>Service Start Date</th>
                                            <th>Service End Date</th>
                                            <th>Status</th>
                                            <th>Added On</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($services)): ?>
                                            <?php foreach ($services as $service): ?>
                                                <tr>
                                                    <td><?php echo $service['service_name']; ?></td>
                                                    <td><?php echo number_format($service['amount'], 2); ?></td>
                                                    <td><?php echo number_format($service['paid_amount'], 2); ?></td>
                                                    <td><?php echo number_format($service['amount'] - $service['paid_amount'], 2); ?></td>
                                                    <td><?php echo date('d-M-Y', strtotime($service['service_date'])); ?></td>
                                                    <td>
                                                        <?php
                                                        echo !empty($service['service_end_date']) ? date('d-M-Y', strtotime($service['service_end_date'])) : '-';
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $status_class = '';
                                                        switch ($service['status']) {
                                                            case 'paid':
                                                                $status_class = 'badge-success';
                                                                break;
                                                            case 'partially_paid':
                                                                $status_class = 'badge-warning';
                                                                break;
                                                            case 'pending':
                                                                $status_class = 'badge-danger';
                                                                break;
                                                            default:
                                                                $status_class = 'badge-secondary';
                                                                break;
                                                        }
                                                        ?>
                                                        <span class="badge <?php echo $status_class; ?>"><?php echo ucfirst(str_replace('_', ' ', $service['status'])); ?></span>
                                                    </td>
                                                    <td><?php echo date('d-M-Y h:i A', strtotime($service['added_on'])); ?></td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-xs view-payments-btn"
                                                            data-service-id="<?php echo $service['id']; ?>"
                                                            data-service-name="<?php echo $service['service_name']; ?>">
                                                            Payments
                                                        </button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else: ?>
                                            <tr>
                                                <td colspan="10" class="text-center">No services found for this client.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            <?php else: ?>
                                <p>No services/packages found for this client. Click "Add New Service" to get started.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-labelledby="addServiceModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addServiceModalLabel">Add New Service for <?php echo $client['client_name']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addServiceForm">
                <div class="modal-body">
                    <div id="serviceFormMessage"></div>
                    <input type="hidden" name="client_id" value="<?php echo $client['client_id']; ?>">
                    <div class="form-group">
                        <label for="service_name">Service Name</label>
                        <input type="text" class="form-control" id="service_name" name="service_name" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Amount (₹)</label>
                        <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="service_date">Service Date</label>
                        <input type="date" class="form-control" id="service_date" name="service_date" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="service_end_date">Service End Date (Optional)</label>
                        <input type="date" class="form-control" id="service_end_date" name="service_end_date">
                    </div>
                    <div class="form-group">
                        <label for="description">Description (Optional)</label>
                        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveServiceBtn">Save Service</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="addPaymentModal" tabindex="-1" role="dialog" aria-labelledby="addPaymentModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPaymentModalLabel">Add Payment for <?php echo $client['client_name']; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="addPaymentForm">
                <div class="modal-body">
                    <div id="paymentFormMessage"></div>
                    <div class="form-group">
                        <label for="package_id">Link to Service (Optional)</label>
                        <select class="form-control" id="package_id" name="package_id">
                            <option value="">-- General Payment --</option>
                            <?php if (!empty($services)): ?>
                                <?php foreach ($services as $service): ?>
                                    <option value="<?php echo $service['id']; ?>"><?php echo $service['service_name']; ?> (Due: ₹<?php echo number_format($service['amount'] - $service['paid_amount'], 2); ?>)</option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        <small class="form-text text-muted">Leave blank for a general payment not tied to a specific service.</small>
                    </div>

                    <div class="form-group">
                        <label for="expected_amount">Expected Amount from Client (₹)</label>
                        <input type="number" step="0.01" class="form-control" id="expected_amount" name="expected_amount">
                        <small class="form-text text-muted">The total amount expected for this payment entry.</small>
                    </div>

                    <div class="form-group">
                        <label for="payment_amount">Payment Amount (₹)</label>
                        <input type="number" step="0.01" class="form-control" id="payment_amount" name="payment_amount" required>
                    </div>

                    <div class="form-group">
                        <label for="payment_status">Payment Status</label>
                        <select class="form-control" id="payment_status" name="payment_status" required>
                            <option value="Pending">Pending</option>
                            <option value="Received" selected>Received</option>
                            <option value="Partial">Partial</option>
                            <option value="Overdue">Overdue</option>
                            <option value="Refunded">Refunded</option>
                            <option value="Cancelled">Cancelled</option>
                        </select>
                        <small class="form-text text-muted">Status of this specific payment amount.</small>
                    </div>

                    <div class="form-group">
                        <label for="payment_date">Payment Date</label>
                        <input type="date" class="form-control" id="payment_date" name="payment_date" value="<?php echo date('Y-m-d'); ?>" required>
                    </div>
                    <div class="form-group">
                        <label for="payment_method">Payment Method</label>
                        <input type="text" class="form-control" id="payment_method" name="payment_method" required placeholder="e.g., Cash, Bank Transfer, UPI">
                    </div>
                    <div class="form-group">
                        <label for="payment_notes">Notes (Optional)</label>
                        <textarea class="form-control" id="payment_notes" name="notes" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="savePaymentBtn">Record Payment</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="viewPaymentsModal" tabindex="-1" role="dialog" aria-labelledby="viewPaymentsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPaymentsModalLabel">Payments for: <span id="viewPaymentsServiceTitle"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="viewPaymentsModalBody">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        // IMPORTANT: Ensure your CodeIgniter base_url is correctly configured in application/config/config.php
        // This 'BASE_URL' constant should be defined only once.
        console.log("JavaScript is running!");
        const BASE_URL = '<?php echo base_url(); ?>';

        // Function to reload the page content after an action (simplest way to update data)
        function refreshClientDetails() {
            window.location.reload();
        }

        // Handle Add Service Form Submission (AJAX)
        $('#saveServiceBtn').on('click', function() {
            var formData = $('#addServiceForm').serialize();
            $('#serviceFormMessage').empty(); // Clear previous messages
            $.ajax({
                url: BASE_URL + 'client/add_service_action', // Controller method URL
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#serviceFormMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        setTimeout(function() {
                            $('#addServiceModal').modal('hide');
                            refreshClientDetails(); // Reload page to show new service
                        }, 1000);
                    } else {
                        $('#serviceFormMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#serviceFormMessage').html('<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>');
                }
            });
        });

        // Handle Add Payment Form Submission (AJAX)
        $('#savePaymentBtn').on('click', function() {
            var formData = $('#addPaymentForm').serialize();
            $('#paymentFormMessage').empty(); // Clear previous messages
            $.ajax({
                url: BASE_URL + 'client/add_payment_action', // Controller method URL
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#paymentFormMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        setTimeout(function() {
                            $('#addPaymentModal').modal('hide');
                            refreshClientDetails(); // Reload page to show updated outstanding/paid amounts
                        }, 1000);
                    } else {
                        $('#paymentFormMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#paymentFormMessage').html('<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>');
                }
            });
        });

        // Handle View Payments Button Click (AJAX to load payments for a specific service)
        // This is now inside $(document).ready()
        $(document).on('click', '.view-payments-btn', function() {
            var serviceId = $(this).data('service-id'); // Use data-service-id as per your HTML (hyphenated)
            var serviceName = $(this).data('service-name'); // Use data-service-name as per your HTML (hyphenated)
            $('#viewPaymentsServiceTitle').text(serviceName); // Set modal title
            $('#viewPaymentsModalBody').html('<p>Loading payments...</p>'); // Show loading message

            $.ajax({
                url: BASE_URL + 'client/get_service_payments_ajax/' + serviceId, // Controller method URL
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success' && response.payments && response.payments.length > 0) { // Added check for response.payments
                        let paymentsHtml = `
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Payment Date</th>
                                    <th>Amount (₹)</th>
                                    <th>Expected Amount (₹)</th>
                                    <th>Status</th>
                                    <th>Method</th>
                                    <th>Notes</th>
                                    <th>Added On</th>
                                </tr>
                            </thead>
                            <tbody>`;

                        $.each(response.payments, function(index, payment) {
                            let statusClass = '';
                            let paymentStatusDisplay = ''; // New variable to hold display text

                            // Check if payment.payment_status exists and is not null before processing
                            if (payment && payment.payment_status) { // Added check for payment object itself
                                switch (payment.payment_status.toLowerCase()) {
                                    case 'received':
                                        statusClass = 'badge-success';
                                        break;
                                    case 'partial':
                                        statusClass = 'badge-warning';
                                        break;
                                    case 'pending':
                                        statusClass = 'badge-danger';
                                        break;
                                    case 'overdue':
                                        statusClass = 'badge-danger';
                                        break;
                                    case 'refunded':
                                        statusClass = 'badge-info';
                                        break;
                                    case 'cancelled':
                                        statusClass = 'badge-secondary';
                                        break;
                                    default:
                                        statusClass = 'badge-secondary'; // Default for unknown status
                                        break;
                                }
                                paymentStatusDisplay = payment.payment_status.replace(/_/g, ' ').toUpperCase();
                            } else {
                                // Handle cases where payment_status or payment itself is undefined/null
                                statusClass = 'badge-secondary'; // A default neutral color
                                paymentStatusDisplay = 'N/A'; // Or 'UNKNOWN', 'MISSING STATUS'
                            }

                            paymentsHtml += `
                                <tr>
                                    <td>${moment(payment.payment_date).format('DD-MMM-YYYY')}</td>
                                    <td>₹${parseFloat(payment.payment_amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                                    <td>₹${payment.expected_amount ? parseFloat(payment.expected_amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-'}</td>
                                    <td><span class="badge ${statusClass}">${paymentStatusDisplay}</span></td>
                                    <td>${payment.payment_transaction_method || '-'}</td>
                                    <td>${payment.notes || '-'}</td>
                                    <td>${moment(payment.added_on).format('DD-MMM-YYYY h:mm A')}</td>
                                </tr>`;
                        });

                        paymentsHtml += `
                            </tbody>
                        </table>`;
                        $('#viewPaymentsModalBody').html(paymentsHtml);
                    } else {
                        $('#viewPaymentsModalBody').html('<p>No payments found for this service.</p>');
                    }
                },
                error: function() {
                    $('#viewPaymentsModalBody').html('<div class="alert alert-danger">Failed to load payments. An error occurred.</div>');
                }
            });
            $('#viewPaymentsModal').modal('show'); // This line shows the modal
        });


        // Handle View General Payments Button Click (AJAX to load general payments for the client)
        // This is now inside $(document).ready()
        $('#viewGeneralPaymentsBtn').on('click', function() {
            var clientId = $(this).data('client-id');
            $('#viewPaymentsServiceTitle').text('All General Payments'); // Update modal title
            $('#viewPaymentsModalBody').html('<p>Loading general payments...</p>'); // Show loading message
            $.ajax({
                url: BASE_URL + 'client/get_general_payments_ajax/' + clientId, // NEW Controller method URL
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success' && response.payments && response.payments.length > 0) { // Added check for response.payments
                        let paymentsHtml = `
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Payment Date</th>
                                    <th>Amount (₹)</th>
                                    <th>Expected Amount (₹)</th>
                                    <th>Status</th>
                                    <th>Method</th>
                                    <th>Notes</th>
                                    <th>Added On</th>
                                </tr>
                            </thead>
                            <tbody>`;
                        $.each(response.payments, function(index, payment) {
                            // Apply the same status check as for service payments here
                            let statusClass = '';
                            let paymentStatusDisplay = '';
                            if (payment && payment.payment_status) { // Added check for payment object itself
                                switch (payment.payment_status.toLowerCase()) {
                                    case 'received':
                                        statusClass = 'badge-success';
                                        break;
                                    case 'partial':
                                        statusClass = 'badge-warning';
                                        break;
                                    case 'pending':
                                        statusClass = 'badge-danger';
                                        break;
                                    case 'overdue':
                                        statusClass = 'badge-danger';
                                        break;
                                    case 'refunded':
                                        statusClass = 'badge-info';
                                        break;
                                    case 'cancelled':
                                        statusClass = 'badge-secondary';
                                        break;
                                    default:
                                        statusClass = 'badge-secondary';
                                        break;
                                }
                                paymentStatusDisplay = payment.payment_status.replace(/_/g, ' ').toUpperCase();
                            } else {
                                statusClass = 'badge-secondary';
                                paymentStatusDisplay = 'N/A';
                            }
                            paymentsHtml += `
                                <tr>
                                    <td>${moment(payment.payment_date).format('DD-MMM-YYYY')}</td>
                                    <td>₹${parseFloat(payment.payment_amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2})}</td>
                                    <td>₹${payment.expected_amount ? parseFloat(payment.expected_amount).toLocaleString('en-IN', {minimumFractionDigits: 2, maximumFractionDigits: 2}) : '-'}</td>
                                    <td><span class="badge ${statusClass}">${paymentStatusDisplay}</span></td>
                                    <td>${payment.payment_transaction_method || '-'}</td>
                                    <td>${payment.notes || '-'}</td>
                                    <td>${moment(payment.added_on).format('DD-MMM-YYYY h:mm A')}</td>
                                </tr>`;
                        });
                        paymentsHtml += `
                            </tbody>
                        </table>`;
                        $('#viewPaymentsModalBody').html(paymentsHtml);
                    } else {
                        $('#viewPaymentsModalBody').html('<p>No general payments found for this client.</p>');
                    }
                },
                error: function() {
                    $('#viewPaymentsModalBody').html('<div class="alert alert-danger">Failed to load general payments. An error occurred.</div>');
                }
            });
            $('#viewPaymentsModal').modal('show'); // Reuse the existing viewPaymentsModal
        });

        // Reset forms when modals are closed
        $('#addServiceModal').on('hidden.bs.modal', function() {
            $('#addServiceForm')[0].reset(); // Reset the form fields
            $('#serviceFormMessage').empty(); // Clear messages
        });

        $('#addPaymentModal').on('hidden.bs.modal', function() {
            $('#addPaymentForm')[0].reset(); // Reset the form fields
            $('#paymentFormMessage').empty(); // Clear messages
        });

    }); // END of consolidated $(document).ready() block. All your JS should be inside this one.
</script>