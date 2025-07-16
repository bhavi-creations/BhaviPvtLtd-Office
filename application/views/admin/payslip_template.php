<!DOCTYPE html>
<html>

<head>
    <title>Payslip - <?= html_escape($staff->staff_name ?? 'N/A') ?> - <?= html_escape($month_name) ?> <?= html_escape($year) ?></title>
    <style>
        /* Global Styles */
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 10.5px;
            /* Slightly smaller base font for more content */
            margin: 0;
            
            /* Reduced body padding */
            color: #333;
            line-height: 1.4;
            /* Tighter line height */
        }

        .container {
            width: 100%;
            max-width: 760px;
            /* Slightly adjusted width */
            margin: 0 auto;
            
            padding: 15px;
            /* Reduced internal spacing */
            box-sizing: border-box;
            background-color: #fff;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.04);
            /* Subtle shadow */
        }

        /* Header Section */
        .header {
            text-align: center;
            margin-bottom: 10px;
            /* Reduced space below header */
            position: relative;
            padding-bottom: 10px;
            /* Reduced padding */
             
            /* Lighter separator line */
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
            /* Slightly smaller for company name */
            color: #2c3e50;
            margin-bottom: 3px;
            /* Reduced margin */
        }

        .header p {
            margin: 0;
            font-size: 11px;
            /* Slightly smaller */
            color: #666;
            line-height: 1.3;
            /* Tighter line height */
        }

        .header h2 {
            font-size: 16px;
            /* Slightly smaller */
            color: #34495e;
            margin-top: 10px;
            /* Reduced margin */
            margin-bottom: 0;
            padding: 3px 0;
            /* Reduced padding */
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
            background-color: #f9f9f9;
        }

        /* Company Logo */
        .company-logo {
            position: absolute;
            top: 12px;
            left: 0;
            width: 120px;
            /* Optimized size */
            height: auto;
            max-width: 120px;
        }

        /* Section Headings */
        h3 {
            font-size: 13px;
            /* Slightly smaller */
            color: #34495e;
            margin-top:  0px;
            /* Reduced margin */
            margin-bottom: 8px;
            /* Reduced margin */
            border-bottom: 1px solid #ddd;
            padding-bottom: 3px;
            /* Reduced padding */
        }

        /* Details and Salary Tables */
        .details-table,
        .salary-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
            /* Reduced space below tables */
        }

        .details-table th,
        .details-table td,
        .salary-table th,
        .salary-table td {
            border: 1px solid #eee;
            padding: 8px 10px;
            /* Reduced padding */
            text-align: left;
            vertical-align: top;
            font-size: 10.5px;
            /* Consistent font size */
        }

        .details-table th,
        .salary-table th {
            background-color: #f8f8f8;
            color: #555;
            font-weight: bold;
            width: 30%;
        }

        .details-table td,
        .salary-table td {
            width: 70%;
        }

        /* Salary Table Specifics */
        .salary-table thead th {
            background-color: #eef;
            color: #333;
            font-size: 11px;
            /* Slightly larger for table headers */
        }

        .salary-table tbody tr:nth-child(even) {
            background-color: #fdfdfd;
        }

        .salary-table tfoot td {
            background-color: #eef;
            font-weight: bold;
            font-size: 11.5px;
            /* Consistent with other footers */
            color: #333;
            border-top: 2px solid #ddd;
        }

        .salary-table tfoot strong {
            color: #2c3e50;
        }

        /* Net Payable */
        .net-payable {
            font-size: 15px;
            /* Slightly smaller */
            font-weight: bold;
            text-align: right;
            margin-top: 15px;
            /* Reduced margin */
            padding: 8px 12px;
            /* Reduced padding */
            background-color: #e8f5e9;
            border: 1px solid #c8e6c9;
            color: #2e7d32;
            display: inline-block;
            float: right;
            clear: both;
            margin-bottom: 15px;
            /* Reduced margin */
        }

        /* Working Days Details */
        /* Consider if this section is essential for the PDF and if it can be condensed or moved */
        .working-days-info {
            margin-top: 15px;
            /* Reduced margin */
            padding-top: 0px;
            /* Reduced padding */
            border-top: 1px dashed #ccc;
            font-size: 10.5px;
            /* Consistent font size */
            color: #555;
            clear: both;
        }

        .working-days-info p {
            margin: 3px 0;
            /* Reduced margin */
        }

        /* Footer Section */
        .footer {
            margin-top: 0px;
            /* Reduced space before footer */
            text-align: right;
            border-top: 1px solid #eee;
            padding-top: 15px;
            /* Reduced padding */
        }

        .stamp-signature {
            width: 80px;
            /* Adjusted size for stamp */
            height: auto;
            margin-bottom: 5px;
            /* Reduced margin */
            opacity: 0.7;
            display: block;
            margin-left: auto;
        }

        .digital-signature {
            width: 120px;
            /* Adjusted size for signature */
            height: auto;
            margin-top: 5px;
            display: block;
            margin-left: auto;
        }

        .signature-line {
            text-align: right;
            margin-top: 3px;
            /* Reduced margin */
            font-size: 11px;
            /* Consistent font size */
            color: #444;
            margin-right: 0;
        }

        .computer-generated-note {
            text-align: center;
            margin-top: 25px;
            /* Reduced space above this note */
            font-size: 9.5px;
            /* Smallest font for this note */
            color: #888;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">


            <div class="container">
                <div class="row">
                    <div class="col-4"> <?php if (!empty($company_assets->company_logo_path)) : ?>
                            <img src="<?= base_url($company_assets->company_logo_path); ?>" alt="Company Logo" class="company-logo">
                        <?php endif; ?>
                    </div>
                    <div class="col-8">
                        <h1>Bhavi Creations Pvt Ltd</h1>
                        <p>Plot no 28, H No 70, 17-28, RTO Office Rd, Ranga Rao Nagar, Kakinada, Andhra Pradesh 533003.</p>
                        <p>Phone : 9642343434 | Email : admin@bhavicreations.com</p>
                        <h2>Payslip for <?= html_escape($month_name) ?> <?= html_escape($year) ?></h2>
                    </div>
                </div>
            </div>



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
                <th>Bank Name:</th>
                <td><?= html_escape($staff->bank_name ?? 'N/A') ?></td>
            </tr>
            <tr>
                <th>IFSC Code:</th>
                <td><?= html_escape($staff->ifsc_code ?? 'N/A') ?></td>
                <th>PAN/Aadhar No:</th>
                <td><?= html_escape($staff->pan_adhar_no ?? 'N/A') ?></td>
            </tr>
            <tr>
                <th>Monthly Basic Salary (Full):</th>
                <td>&#8377;<?= html_escape(number_format($salary->basic_salary ?? 0, 2)) ?> (for <?= html_escape($salary->working_days ?? 'N/A') ?> days)</td>
                <th></th>
                <td></td>
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
                    <td>Worked Days:</td>
                    <td><?= html_escape($salary->worked_days ?? 'N/A') ?></td>
                    <td>Provident Fund (PF)</td>
                    <td>&#8377;<?= html_escape(number_format($salary->pf_deduction ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>Actual Login Days:</td>
                    <td><?= html_escape($salary->actual_login_days ?? 'N/A') ?></td>
                    <td>ESI Deduction</td>
                    <td>&#8377;<?= html_escape(number_format($salary->esi_deduction ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>Added Working Days:</td>
                    <td><?= html_escape($salary->added_working_days ?? 'N/A') ?></td>
                    <td>Professional Tax (PT)</td>
                    <td>&#8377;<?= html_escape(number_format($salary->professional_tax_deduction ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td>Allowance</td>
                    <td>&#8377;<?= html_escape(number_format($salary->allowance ?? 0, 2)) ?></td>
                    <td>TDS Deduction</td>
                    <td>&#8377;<?= html_escape(number_format($salary->tds_deduction ?? 0, 2)) ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td>Other Deduction</td>
                    <td>&#8377;<?= html_escape(number_format($salary->other_deductions ?? 0, 2)) ?></td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td><strong>Gross Earnings:</strong></td>
                    <td><strong>&#8377;<?= html_escape(number_format($salary->total ?? 0, 2)) ?></strong></td>
                    <td><strong>Total Deductions:</strong></td>
                    <td><strong>&#8377;<?= html_escape(number_format(($salary->pf_deduction ?? 0) + ($salary->esi_deduction ?? 0) + ($salary->professional_tax_deduction ?? 0) + ($salary->tds_deduction ?? 0) + ($salary->other_deductions ?? 0), 2)) ?></strong></td>
                </tr>
            </tfoot>
        </table>

        <div class="net-payable">
            <strong>Net Payable Salary: &#8377;<?= html_escape(number_format($salary->total ?? 0, 2)) ?></strong>
        </div>

        <div class="working-days-info">



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

            <p class="computer-generated-note">This is a computer generated payslip, hence no signature is required.</p>
        </div>
</body>

</html>