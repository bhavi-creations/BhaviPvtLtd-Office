<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Extra Work Entry Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('admin/dashboard'); ?>"><i class="mdi mdi-home-outline"></i> Admin Dashboard</a></li>
                                <li class="breadcrumb-item" aria-current="page"><a href="<?php echo base_url('admin/extra-work/manage'); ?>">Extra Work Entries</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Details</li>
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
                            <h4 class="box-title">Details for Work ID: <?php echo html_escape($entry['work_id']); ?></h4>
                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url('admin/extra-work/manage'); ?>" class="btn btn-block btn-info btn-sm">Back to List</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tbody>
                                        
                                        <tr>
                                            <th>Employee ID:</th>
                                            <td><?php echo html_escape($entry['staff_employee_id']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Employee Name:</th>
                                            <td><?php echo html_escape($entry['staff_name']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Department:</th>
                                            <td><?php echo html_escape($entry['department_name']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Project Name:</th>
                                            <td><?php echo html_escape($entry['project_name']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Task Description:</th>
                                            <td><?php echo html_escape($entry['task']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Hours Worked:</th>
                                            <td><?php echo html_escape($entry['hours_worked']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Work Date:</th>
                                            <td><?php echo date('Y-m-d', strtotime($entry['work_date'])); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Assigned By:</th>
                                            <td><?php echo html_escape($entry['assigned_by']); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Work Status:</th>
                                            <td><?php echo ucwords(str_replace('_', ' ', $entry['work_status'])); ?></td>
                                        </tr>
                                        <tr>
                                            <th>Additional  Notes:</th>
                                            <td><?php echo html_escape($entry['notes'] ?? 'N/A'); ?></td>
                                        </tr>
                                         
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