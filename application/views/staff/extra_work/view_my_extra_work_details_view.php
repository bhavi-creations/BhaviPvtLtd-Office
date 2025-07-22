<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Extra Work Entry Details</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo base_url('extra-work/my/manage'); ?>"><i class="mdi mdi-home-outline"></i> Your Extra Work</a></li>
                                <li class="breadcrumb-item" aria-current="page">Manage Entries</li>
                                <li class="breadcrumb-item active" aria-current="page">View Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <section class="content">
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h4 class="box-title">Details for Work ID: <?php echo html_escape($entry['work_id']); ?></h4>
                            <div class="box-tools pull-right">
                                <a href="<?php echo base_url('extra-work/my/edit/' . html_escape($entry['work_id'])); ?>" class="btn btn-info btn-sm">Edit Entry</a>
                                <a href="<?php echo base_url('extra-work/my/manage'); ?>" class="btn btn-secondary btn-sm">Back to List</a>
                            </div>
                        </div>
                        <div class="box-body">
                            <?php if (!empty($entry)) : ?>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Project Name:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo html_escape($entry['project_name']); ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Task:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo nl2br(html_escape($entry['task'])); ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Description:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo nl2br(html_escape($entry['work_description'])); ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Hours Worked:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo html_escape($entry['hours_worked']); ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Date:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo html_escape(date('Y-m-d', strtotime($entry['work_date']))); ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Assigned By:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo html_escape($entry['assigned_by']); ?></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Work Status:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo html_escape(ucwords(str_replace('_', ' ', $entry['work_status']))); ?></p>
                                    </div>
                                </div>
                                <?php if (!empty($entry['notes'])) : ?>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label">Additional Notes:</label>
                                        <div class="col-sm-9">
                                            <p class="form-control-static"><?php echo nl2br(html_escape($entry['notes'])); ?></p>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Added On:</label>
                                    <div class="col-sm-9">
                                        <p class="form-control-static"><?php echo html_escape(date('Y-m-d H:i:s', strtotime($entry['added_on']))); ?></p>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p>No details found for this extra work entry.</p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>