<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Manage Your Extra Work Entries</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Your Extra Work</li>
                                <li class="breadcrumb-item active" aria-current="page">Manage Entries</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Your Extra Work Entries</h4>
                            <a href="<?php echo base_url('extra-work/my/add'); ?>" class="btn btn-success btn-sm pull-right">Add New Extra Work Entry</a>
                        </div>
                        <div class="box-body">
                            <?php if ($this->session->flashdata('success')) : ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger">
                                    <?php echo $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>

                            <div class="table-responsive">
                                <table id="my_extra_work_entries_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Project</th>
                                            <th>Task</th>
                                            <th>Hours</th>
                                            <th>Date</th>
                                            <th>Assigned By</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php if (!empty($work_entries)) : ?>
                                            <?php $s_no = 1; // Initialize serial number counter 
                                            ?>
                                            <?php foreach ($work_entries as $entry) : ?>
                                                <tr>
                                                    <td><?php echo $s_no++; // Display and increment serial number 
                                                        ?></td>
                                                    <td><?php echo $entry['project_name']; ?></td>
                                                    <td><?php echo character_limiter($entry['task'], 30); ?></td>
                                                    <td><?php echo $entry['hours_worked']; ?></td>
                                                    <td><?php echo date('Y-m-d', strtotime($entry['work_date'])); ?></td>
                                                    <td><?php echo $entry['assigned_by']; ?></td>
                                                    <td><?php echo ucwords(str_replace('_', ' ', $entry['work_status'])); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('extra-work/my/view/' . $entry['work_id']); ?>" class="btn btn-primary btn-sm">View</a>
                                                        <a href="<?php echo base_url('extra-work/my/edit/' . $entry['work_id']); ?>" class="btn btn-info btn-sm">Edit</a>
                                                        <a href="<?php echo base_url('extra-work/my/delete/' . $entry['work_id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this extra work entry?');">Delete</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="8">No extra work entries found for you.</td>
                                            </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#my_extra_work_entries_table').DataTable();
    });
</script>