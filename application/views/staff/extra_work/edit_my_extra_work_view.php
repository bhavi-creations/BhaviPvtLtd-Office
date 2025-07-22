<div class="content-wrapper">
    <div class="container-full">
        <div class="content-header">
            <div class="d-flex align-items-center">
                <div class="mr-auto">
                    <h3 class="page-title">Edit Your Extra Work Entry</h3>
                    <div class="d-inline-block align-items-center">
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
                                <li class="breadcrumb-item" aria-current="page">Your Extra Work</li>
                                <li class="breadcrumb-item active" aria-current="page">Edit Entry</li>
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
                            <h4 class="box-title">Extra Work Details</h4>
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

                            <?php echo form_open('extra-work/my/update/' . $work_entry['work_id']); ?>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Work Date <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control" name="work_date" value="<?php echo set_value('work_date', $work_entry['work_date']); ?>">
                                        <?php echo form_error('work_date', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Project Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="project_name" value="<?php echo set_value('project_name', $work_entry['project_name']); ?>" placeholder="e.g., Website Redesign">
                                        <?php echo form_error('project_name', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Task <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="task" value="<?php echo set_value('task', $work_entry['task']); ?>" placeholder="e.g., Develop Login Module">
                                <?php echo form_error('task', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="form-group">
                                <label>Work Description <span class="text-danger">*</span></label>
                                <textarea class="form-control" name="work_description" rows="5" placeholder="Detailed description of the extra work performed..."><?php echo set_value('work_description', $work_entry['work_description']); ?></textarea>
                                <?php echo form_error('work_description', '<div class="text-danger">', '</div>'); ?>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Hours Worked <span class="text-danger">*</span></label>
                                        <input type="number" step="0.01" class="form-control" name="hours_worked" value="<?php echo set_value('hours_worked', $work_entry['hours_worked']); ?>" placeholder="e.g., 8.5">
                                        <?php echo form_error('hours_worked', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Assigned By</label>
                                        <input type="text" class="form-control" name="assigned_by" value="<?php echo set_value('assigned_by', $work_entry['assigned_by']); ?>" placeholder="e.g., Manager Name">
                                        <?php echo form_error('assigned_by', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Work Status <span class="text-danger">*</span></label>
                                        <select class="form-control" name="work_status">
                                            <option value="not_yet_started" <?php echo set_select('work_status', 'not_yet_started', ($work_entry['work_status'] == 'not_yet_started')); ?>>Not Yet Started</option>
                                            <option value="on_going" <?php echo set_select('work_status', 'on_going', ($work_entry['work_status'] == 'on_going')); ?>>On Going</option>
                                            <option value="completed" <?php echo set_select('work_status', 'completed', ($work_entry['work_status'] == 'completed')); ?>>Completed</option>
                                            <option value="pending" <?php echo set_select('work_status', 'pending', ($work_entry['work_status'] == 'pending')); ?>>Pending (e.g., for review)</option>
                                        </select>
                                        <?php echo form_error('work_status', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Additional Notes</label>
                                        <textarea class="form-control" name="notes" rows="3" placeholder="Any additional notes..."><?php echo set_value('notes', $work_entry['notes']); ?></textarea>
                                        <?php echo form_error('notes', '<div class="text-danger">', '</div>'); ?>
                                    </div>
                                </div>
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary pull-right">Update My Extra Work Entry</button>
                                <a href="<?php echo base_url('extra-work/my/manage'); ?>" class="btn btn-default pull-left">Cancel</a>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                        </div>
                    </div>
            </div>
        </section>
        </div>
</div>