<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Add New Service</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('dashboard'); ?>">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('client/select_client_for_services'); ?>">Client Services & Payments</a></li>
                        <li class="breadcrumb-item active">Add Service</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Service Details</h3>
                </div>
                <form id="addServiceFormPage">
                    <div class="card-body">
                        <div id="serviceFormPageMessage"></div>
                        <div class="form-group">
                            <label for="client_id">Select Client</label>
                            <select class="form-control" id="client_id" name="client_id" required>
                                <option value="">-- Select a Client --</option>
                                <?php if (!empty($all_clients)): ?>
                                    <?php foreach ($all_clients as $client): ?>
                                        <option value="<?php echo $client['client_id']; ?>"><?php echo $client['client_name']; ?> (ID: <?php echo $client['client_id']; ?>)</option>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="service_name">Service Name</label>
                            <input type="text" class="form-control" id="service_name" name="service_name" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount (₹)</label>
                            <input type="number" step="0.01" class="form-control" id="amount" name="amount" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <input type="text" class="form-control" id="payment_method" name="payment_method" placeholder="e.g., Cash, UPI, Bank Transfer (for this service)" required>
                            <small class="form-text text-muted">This indicates the primary payment method used for this service when it was recorded.</small>
                        </div> -->
                        <div class="form-group">
                            <label for="service_date">Service Start Date</label>
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
                    <div class="card-footer">
                        <button type="button" class="btn btn-primary" id="submitServiceBtn">Add Service</button>
                        <a href="<?php echo base_url('client/select_client_for_services'); ?>" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        const BASE_URL = '<?php echo base_url(); ?>';

        $('#submitServiceBtn').on('click', function(e) {
            e.preventDefault(); // Prevent default form submission

            var formData = $('#addServiceFormPage').serialize();
            $('#serviceFormPageMessage').empty(); // Clear previous messages

            $.ajax({
                url: BASE_URL + 'client/add_service_action', // Reusing the existing AJAX action
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        $('#serviceFormPageMessage').html('<div class="alert alert-success">' + response.message + '</div>');
                        // Redirect back to the filtered list after a short delay
                        setTimeout(function() {
                            window.location.href = BASE_URL + 'client/select_client_for_services';
                        }, 1500);
                    } else {
                        $('#serviceFormPageMessage').html('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function() {
                    $('#serviceFormPageMessage').html('<div class="alert alert-danger">An unexpected error occurred. Please try again.</div>');
                }
            });
        });
    });
</script>