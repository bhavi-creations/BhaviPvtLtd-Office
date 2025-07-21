<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Clients with Assigned Services</h1>
                </div>
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
            <?php if ($this->session->flashdata('success')): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('success'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('error')): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('error'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <?php if ($this->session->flashdata('info')): ?>
                <div class="alert alert-info alert-dismissible fade show" role="alert">
                    <?php echo $this->session->flashdata('info'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">List of Clients with Services</h3>
                    <div class="card-tools">
                        <a href="<?php echo base_url('client/add_service_page'); ?>" class="btn btn-primary btn-sm">
                             Add New Service
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <?php if (!empty($clients)): ?>
                        <table class="table table-bordered table-striped dataTable" id="clientsTable">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Mobile</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($clients as $client): ?>
                                    <tr>
                                        <td></td>
                                        <td><?php echo $client['client_name']; ?></td>
                                        <td><?php echo $client['client_email']; ?></td>
                                        <td><?php echo $client['client_mobile']; ?></td>
                                        <td>
                                            <a href="<?php echo base_url('client/view_details/' . $client['client_id']); ?>" class="btn btn-info btn-sm">
                                                 View
                                            </a>
                                            <a href="<?php echo base_url('client/delete_client_services/' . $client['client_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete ALL services for this client? This action cannot be undone.');">
                                                 Delete Services
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php else: ?>
                        <p>No clients found with assigned services. Click "Add New Service" to get started.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
    $(document).ready(function() {
        $('#clientsTable').DataTable(); // Initialize DataTables
    });
</script>


<script>
    $(document).ready(function() {
        // Initialize DataTables and store the instance
        var table = $('#clientsTable').DataTable({
            "columnDefs": [ {
                "searchable": false,
                "orderable": false,
                "targets": 0 // This targets the first column (0-indexed)
            } ],
            "order": [[ 1, 'asc' ]], // Order by the second column (Name) by default
            "retrieve": true // This prevents the "Cannot reinitialise" warning
        });

        // Attach the S.No. generation function to DataTables events
        // and trigger it immediately with .draw()
        table.on('order.dt draw.dt', function () {
            var api = new $.fn.dataTable.Api(this);
            api.column(0, {search:'applied', order:'applied'}).nodes().each(function (cell, i) {
                cell.innerHTML = i + 1;
            });
        }).draw(); // This call will populate the S.No. for the first time
    });
</script>