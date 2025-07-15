<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $title ?>
            <small>Manage all generated payslips</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active"><?= $title ?></li>
        </ol>
    </section>

    <section class="content">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">List of Payslips</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="payslips_table" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Employee ID</th>
                            <th>Staff Name</th>
                            <th>Month</th>
                            <th>Year</th>
                            <th>Payslip</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($all_payslips)): ?>
                            <?php foreach ($all_payslips as $payslip): ?>
                                <tr>
                                    <td><?= html_escape($payslip['employee_id']) ?></td>
                                    <td><?= html_escape($payslip['staff_name']) ?></td>
                                    <td><?= html_escape(date('F', mktime(0, 0, 0, $payslip['month'], 10))) ?></td>
                                    <td><?= html_escape($payslip['year']) ?></td>
                                    <td>
                                        <?php if (!empty($payslip['payslip_pdf_path'])): ?>
                                            <a href="<?= base_url('Salary/view_payslip/' . $payslip['salary_id']) ?>" class="btn btn-primary btn-sm" target="_blank">
                                                <i class="fa fa-download"></i> Download PDF
                                            </a>
                                        <?php else: ?>
                                            <span class="label label-danger">Not Generated</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5">No payslips have been generated yet.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </section>
    </div>
<script>
    $(function () {
        $('#payslips_table').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });
    });
</script>