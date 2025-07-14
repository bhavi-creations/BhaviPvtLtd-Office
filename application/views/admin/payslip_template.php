    <!DOCTYPE html>
    <html>
    <head>
        <title>Payslip - <?php echo $employee_data['staff_name']; ?> - <?php echo $pay_month; ?> <?php echo $pay_year; ?></title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 0;
                padding: 20px;
                font-size: 10px; /* Reduced font size for better fit on A4 */
            }
            .container {
                width: 100%;
                margin: 0 auto;
                border: 1px solid #ccc;
                padding: 20px;
                box-sizing: border-box;
            }
            .header, .footer {
                text-align: center;
                margin-bottom: 20px;
            }
            .header img {
                max-width: 150px;
                height: auto;
                margin-bottom: 10px;
            }
            .company-info {
                font-size: 12px;
                font-weight: bold;
                margin-bottom: 15px;
            }
            .employee-details, .salary-details {
                width: 100%;
                margin-bottom: 20px;
                border-collapse: collapse;
            }
            .employee-details th, .employee-details td,
            .salary-details th, .salary-details td {
                border: 1px solid #eee;
                padding: 8px;
                text-align: left;
            }
            .employee-details th, .salary-details th {
                background-color: #f2f2f2;
                font-weight: bold;
            }
            .salary-summary {
                width: 100%;
                border-collapse: collapse;
                margin-top: 20px;
            }
            .salary-summary th, .salary-summary td {
                border: 1px solid #eee;
                padding: 8px;
                text-align: left;
            }
            .salary-summary .total-row th, .salary-summary .total-row td {
                font-weight: bold;
                background-color: #e0e0e0;
            }
            .signatures {
                margin-top: 40px;
                display: flex;
                justify-content: space-between;
                align-items: flex-end;
                clear: both; /* Ensure signatures are below other content */
            }
            .signature-block {
                width: 48%;
                text-align: center;
            }
            .signature-block img {
                max-width: 100px;
                height: auto;
                display: block;
                margin: 0 auto 5px auto;
            }
            .signature-block p {
                margin: 0;
                padding: 0;
                border-top: 1px solid #000;
                display: inline-block;
                padding-top: 5px;
            }
            .text-right {
                text-align: right;
            }
            .text-center {
                text-align: center;
            }
            .stamp-section {
                text-align: center;
                margin-top: 20px;
            }
            .stamp-section img {
                max-width: 120px;
                height: auto;
                opacity: 0.7; /* Make stamp slightly transparent */
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="header">
                <?php if (!empty($company_logo_path)): ?>
                    <img src="<?php echo base_url($company_logo_path); ?>" alt="Company Logo">
                <?php endif; ?>
                <div class="company-info">
                    <p><strong>[Your Company Name Here]</strong></p>
                    <p>[Your Company Address]</p>
                    <p>[Your Company Contact Info]</p>
                </div>
                <h2>Payslip for <?php echo $pay_month; ?> <?php echo $pay_year; ?></h2>
            </div>

            <table class="employee-details">
                <tr>
                    <th colspan="2">Employee Details</th>
                </tr>
                <tr>
                    <td>Employee Name:</td>
                    <td><?php echo $employee_data['staff_name'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Designation:</td>
                    <td><?php echo $employee_data['designation'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Department:</td>
                    <td><?php echo $employee_data['department_name'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Employee ID:</td>
                    <td><?php echo $employee_data['id'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td><?php echo $employee_data['email'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Phone:</td>
                    <td><?php echo $employee_data['phone'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Address:</td>
                    <td><?php echo $employee_data['address'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Bank A/C No:</td>
                    <td><?php echo $employee_data['bank_account_no'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>PAN/Aadhar No:</td>
                    <td><?php echo $employee_data['pan_adhar_no'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Working Days in Month:</td>
                    <td><?php echo $employee_data['working_days'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Days Worked:</td>
                    <td><?php echo $employee_data['worked_days'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>No. of Leaves:</td>
                    <td><?php echo $employee_data['no_of_leaves'] ?? ''; ?></td>
                </tr>
                <tr>
                    <td>Login Days (Attendance):</td>
                    <td><?php echo $employee_data['login_days'] ?? 'N/A'; ?></td>
                </tr>
            </table>

            <table class="salary-details">
                <tr>
                    <th>Earnings</th>
                    <th>Amount (INR)</th>
                    <th>Deductions</th>
                    <th>Amount (INR)</th>
                </tr>
                <tr>
                    <td>Basic Salary:</td>
                    <td><?php echo number_format($employee_data['basic_salary'] ?? 0, 2); ?></td>
                    <td>Provident Fund (PF):</td>
                    <td><?php echo number_format($employee_data['pf_deduction'] ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <td>Allowance:</td>
                    <td><?php echo number_format($employee_data['allowance'] ?? 0, 2); ?></td>
                    <td>ESI Deduction:</td>
                    <td><?php echo number_format($employee_data['esi_deduction'] ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <td>Gross Salary:</td>
                    <td><?php echo number_format($employee_data['gross_salary'] ?? 0, 2); ?></td>
                    <td>Professional Tax:</td>
                    <td><?php echo number_format($employee_data['professional_tax_deduction'] ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <td>Salary Per Day:</td>
                    <td><?php echo number_format($employee_data['salary_per_day'] ?? 0, 2); ?></td>
                    <td>TDS:</td>
                    <td><?php echo number_format($employee_data['tds_deduction'] ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <td>Total Earnings:</td>
                    <td><?php echo number_format($employee_data['gross_salary'] ?? 0, 2); ?></td>
                    <td>Other Deductions:</td>
                    <td><?php echo number_format($employee_data['other_deductions'] ?? 0, 2); ?></td>
                </tr>
                <tr class="total-row">
                    <td></td>
                    <td></td>
                    <td>Total Deductions:</td>
                    <td><?php echo number_format($employee_data['total_deductions'] ?? 0, 2); ?></td>
                </tr>
            </table>

            <table class="salary-summary">
                <tr class="total-row">
                    <th class="text-right">Net Pay:</th>
                    <td class="text-right"><?php echo number_format($employee_data['net_payable_salary'] ?? 0, 2); ?></td>
                </tr>
                <tr>
                    <th>Net Pay in Words:</th>
                    <td><?php echo $net_pay_in_words; ?></td>
                </tr>
            </table>

            <div class="signatures">
                <div class="signature-block">
                    <?php if (!empty($authorized_signature_path)): ?>
                        <img src="<?php echo base_url($authorized_signature_path); ?>" alt="Authorized Signature">
                    <?php endif; ?>
                    <p>Authorized Signature</p>
                </div>
                <div class="signature-block">
                    <p>Employee Signature</p>
                </div>
            </div>

            <?php if (!empty($company_stamp_path)): ?>
                <div class="stamp-section">
                    <img src="<?php echo base_url($company_stamp_path); ?>" alt="Company Stamp">
                </div>
            <?php endif; ?>

            <div class="footer text-center">
                <p>This is a computer generated payslip, no signature is required.</p>
            </div>
        </div>
    </body>
    </html> 