<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Manage All Extra Work Entries (Admin)</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="mdi mdi-home-outline"></i> Admin Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page">Extra Work</li>
                                <li class="breadcrumb-item active" aria-current="page">Manage All Entries</li>
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
                            <h4 class="box-title">All Extra Work Entries</h4>
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
                                <table id="all_extra_work_entries_table" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Employee ID</th>
                                            <th>Employee Name</th>
                                            <th>Department</th>
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
                                            <?php $s_no = 1; ?>
                                            <?php foreach ($work_entries as $entry) : ?>
                                                <tr>
                                                    <td><?php echo $s_no++; ?></td>
                                                    <td><?php echo html_escape($entry['staff_employee_id']); ?></td>
                                                    <td><?php echo html_escape($entry['staff_name']); ?></td>
                                                    <td><?php echo html_escape($entry['department_name']); ?></td>
                                                    <td><?php echo html_escape($entry['project_name']); ?></td>
                                                    <td><?php echo character_limiter($entry['task'], 30); ?></td>
                                                    <td><?php echo html_escape($entry['hours_worked']); ?></td>
                                                    <td><?php echo date('Y-m-d', strtotime($entry['work_date'])); ?></td>
                                                    <td><?php echo html_escape($entry['assigned_by']); ?></td>
                                                    <td><?php echo ucwords(str_replace('_', ' ', $entry['work_status'])); ?></td>
                                                    <td>
                                                        <a href="<?php echo base_url('admin/extra-work/view/' . $entry['work_id']); ?>" class="btn btn-primary btn-sm">View</a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <tr>
                                                <td colspan="11">No extra work entries found in the system.</td>
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

 