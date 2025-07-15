<!DOCTYPE html>
<html>
<head>
    <title>Payslip - <?= html_escape($staff->staff_name ?? 'N/A') ?> - <?= html_escape($month_name) ?> <?= html_escape($year) ?></title>
    <style>
        /* Basic styling for the payslip */
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
            margin: 20px;
        }
        .container {
            width: 100%;
            max-width: 800px; /* Adjust as needed for your PDF size */
            margin: 0 auto;
            border: 1px solid #ccc;
            padding: 20px;
            box-sizing: border-box;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            position: relative; /* For logo positioning */
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        /* Style for Company Logo */
        .company-logo {
            position: absolute;
            top: 0; /* Adjust vertical position */
            right: 0; /* Adjust horizontal position (e.g., left: 0;) */
            width: 150px; /* Adjust size as needed */
            height: auto;
            max-width: 200px; /* Prevent logo from getting too big */
        }
        .details-table, .salary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .details-table th, .details-table td,
        .salary-table th, .salary-table td {
            border: 1px solid #eee;
            padding: 8px;
            text-align: left;
        }
        .salary-table th {
            background-color: #f2f2f2;
        }
        .footer {
            margin-top: 50px;
            text-align: right; /* Align stamp/signature to right */
        }
        /* Styles for Stamp and Digital Signature */
        .stamp-signature {
            width: 150px; /* Adjust size as needed */
            height: auto;
            margin-bottom: 10px;
            opacity: 0.8; /* Make stamp slightly transparent for a realistic look */
            display: block; /* Ensures it takes up its own line */
            margin-left: auto; /* Aligns to right within parent when display: block */
        }
        .digital-signature {
            width: 180px; /* Adjust size as needed */
            height: auto;
            margin-top: 5px;
            display: block; /* Ensures it takes up its own line */
            margin-left: auto; /* Aligns to right within parent when display: block */
        }
        .signature-line {
            text-align: right;
            margin-top: 5px;
            margin-right: 10px; /* Adjust if needed to align with signature */
        }
        /* More styling for net payable, etc. */
        .net-payable {
            font-size: 16px;
            font-weight: bold;
            text-align: right;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <?php if (!empty($company_assets->company_logo_path)) : ?>
                <img src="<?= base_url($company_assets->company_logo_path); ?>" alt="Company Logo" class="company-logo">
            <?php endif; ?>
            <h1>Bhavi Pvt Ltd</h1>
            <p>Office Address, City, State, ZIP</p>
            <p>Phone: (123) 456-7890 | Email: info@bhavipvt.com</p>
            <h2>Payslip for <?= html_escape($month_name) ?> <?= html_escape($year) ?></h2>
        </div>

        <h3>Employee Details:</h3>
        <table class="details-table">
            <tr>
                <th>Employee ID:</th>
                <td><?= html_escape($staff->employee_id ?? 'N/A') ?></td>
                <th>Name:</th>
                <td><?= html_escape($staff->staff_name ?? 'N/A') ?></td>
            </tr>
            <tr>
                <th>Department:</th>
                <td><?= html_escape($staff->department_name ?? 'N/A') ?></td>
                <th>Designation:</th>
                <td><?= html_escape($staff->designation ?? 'N/A') ?></td>
            </tr>
            <tr>
                <th>Bank A/C No:</th>
                <td><?= html_escape($staff->bank_account_no ?? 'N/A') ?></td>
                <th>PAN/Aadhar No:</th>
                <td><?= html_escape($staff->pan_adhar_no ?? 'N/A') ?></td>
            </tr>
        </table>

        <h3>Salary Details:</h3>
        <table class="salary-table">
            <thead>
                <tr>
                    <th>Earnings</th>
                    <th>Amount</th>
                    <th>Deductions</th>
                    <th>Amount</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Basic Salary</td>
                    <td><?= html_escape(number_format($salary->basic_salary ?? 0, 2)) ?></td>
                    <td>Provident Fund (PF)</td>
                    <td><?= html_escape(number_format($salary->pf ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>House Rent Allowance (HRA)</td>
                    <td><?= html_escape(number_format($salary->hra ?? 0, 2)) ?></td>
                    <td>Professional Tax (PT)</td>
                    <td><?= html_escape(number_format($salary->professional_tax ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>Conveyance Allowance</td>
                    <td><?= html_escape(number_format($salary->conveyance_allowance ?? 0, 2)) ?></td>
                    <td>Income Tax (IT)</td>
                    <td><?= html_escape(number_format($salary->income_tax ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>Medical Allowance</td>
                    <td><?= html_escape(number_format($salary->medical_allowance ?? 0, 2)) ?></td>
                    <td>Loan/Advance Deduction</td>
                    <td><?= html_escape(number_format($salary->loan_deduction ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>Other Allowance</td>
                    <td><?= html_escape(number_format($salary->other_allowance ?? 0, 2)) ?></td>
                    <td>Other Deduction</td>
                    <td><?= html_escape(number_format($salary->other_deduction ?? 0, 2)) ?></td>
                </tr>
                </tbody>
            <tfoot>
                <tr>
                    <td><strong>Gross Earnings:</strong></td>
                    <td><strong><?= html_escape(number_format($salary->gross_salary ?? 0, 2)) ?></strong></td>
                    <td><strong>Total Deductions:</strong></td>
                    <td><strong><?= html_escape(number_format($salary->total_deduction ?? 0, 2)) ?></strong></td>
                </tr>
            </tfoot>
        </table>

        <p class="net-payable"><strong>Net Payable Salary: <?= html_escape(number_format($salary->net_payable_salary ?? 0, 2)) ?></strong></p>

        <p>Worked Days: <?= html_escape($salary->worked_days ?? 'N/A') ?></p>
        <p>Actual Login Days: <?= html_escape($salary->actual_login_days ?? 'N/A') ?></p>
        <p>Added Working Days: <?= html_escape($salary->added_working_days ?? 'N/A') ?></p>

        <div class="footer">
            <?php if (!empty($company_assets->company_stamp_path)) : ?>
                <img src="<?= base_url($company_assets->company_stamp_path); ?>" alt="Company Stamp" class="stamp-signature">
            <?php endif; ?>
            <br>
            <?php if (!empty($company_assets->digital_signature_path)) : ?>
                <img src="<?= base_url($company_assets->digital_signature_path); ?>" alt="Digital Signature" class="digital-signature">
            <?php endif; ?>
            <p class="signature-line">_________________________</p>
            <p class="signature-line">Authorized Signatory</p>
        </div>

        <p style="text-align: center; margin-top: 30px;">This is a computer generated payslip, hence no signature is required.</p>
    </div>
</body>
</html>