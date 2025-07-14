<div class="content-wrapper">
    <section class="content-header">
        <h1><?= $title; ?></h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Company Settings</li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <?php if ($this->session->flashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-check"></i> Success!</h4>
                        <?= $this->session->flashdata('success'); ?>
                    </div>
                <?php endif; ?>
                <?php if ($this->session->flashdata('error')) : ?>
                    <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Error!</h4>
                        <?= $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company Logo</h3>
                    </div>
                    <?php echo form_open_multipart('Company_settings/upload_asset'); ?>
                    <div class="box-body">
                        <?php if (!empty($assets['company_logo_path'])) : ?>
                            <div class="form-group">
                                <label>Current Logo:</label>
                                <img src="<?= base_url($assets['company_logo_path']); ?>" alt="Company Logo" style="max-width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                <a href="<?= base_url('Company_settings/delete_asset/company_logo/' . $assets['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this logo?');">Delete Logo</a>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="company_logo">Upload New Logo (JPG, PNG, GIF, Max 2MB)</label>
                            <input type="file" id="company_logo" name="company_logo">
                            <p class="help-block">Recommended size: Optimal for your payslip design.</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="asset_type" value="company_logo">
                        <input type="hidden" name="asset_id" value="<?= $assets['id']; ?>">
                        <button type="submit" class="btn btn-primary">Upload Logo</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Company Stamp</h3>
                    </div>
                    <?php echo form_open_multipart('Company_settings/upload_asset'); ?>
                    <div class="box-body">
                        <?php if (!empty($assets['company_stamp_path'])) : ?>
                            <div class="form-group">
                                <label>Current Stamp:</label>
                                <img src="<?= base_url($assets['company_stamp_path']); ?>" alt="Company Stamp" style="max-width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                <a href="<?= base_url('Company_settings/delete_asset/company_stamp/' . $assets['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this stamp?');">Delete Stamp</a>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="company_stamp">Upload New Stamp (JPG, PNG, GIF, Max 2MB)</label>
                            <input type="file" id="company_stamp" name="company_stamp">
                            <p class="help-block">Recommended size: Optimal for your payslip design.</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="asset_type" value="company_stamp">
                        <input type="hidden" name="asset_id" value="<?= $assets['id']; ?>">
                        <button type="submit" class="btn btn-primary">Upload Stamp</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>

            <div class="col-md-4">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Digital Signature (Image)</h3>
                    </div>
                    <?php echo form_open_multipart('Company_settings/upload_asset'); ?>
                    <div class="box-body">
                        <?php if (!empty($assets['digital_signature_path'])) : ?>
                            <div class="form-group">
                                <label>Current Signature:</label>
                                <img src="<?= base_url($assets['digital_signature_path']); ?>" alt="Digital Signature" style="max-width: 100%; height: auto; display: block; margin-bottom: 10px;">
                                <a href="<?= base_url('Company_settings/delete_asset/digital_signature/' . $assets['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this signature?');">Delete Signature</a>
                            </div>
                        <?php endif; ?>
                        <div class="form-group">
                            <label for="digital_signature">Upload New Signature (JPG, PNG, GIF, Max 2MB)</label>
                            <input type="file" id="digital_signature" name="digital_signature">
                            <p class="help-block">Recommended size: Optimal for your payslip design.</p>
                        </div>
                    </div>
                    <div class="box-footer">
                        <input type="hidden" name="asset_type" value="digital_signature">
                        <input type="hidden" name="asset_id" value="<?= $assets['id']; ?>">
                        <button type="submit" class="btn btn-primary">Upload Signature</button>
                    </div>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
</div>