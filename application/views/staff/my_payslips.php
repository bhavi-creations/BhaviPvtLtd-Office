 <div class="content-wrapper">
     <section class="content-header">
         <h1>
             My Payslips
             <small>View and download your salary slips</small>
         </h1>
         <ol class="breadcrumb">
             <li><a href="<?= base_url(); ?>"><i class="fa fa-dashboard"></i> Home</a></li>
             <li class="active">My Payslips</li>
         </ol>
     </section>

     <section class="content">
         <div class="row">
             <?php if ($this->session->flashdata('success')): ?>
                 <div class="col-md-12">
                     <div class="alert alert-success alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                         <h4><i class="icon fa fa-check"></i> Success!</h4>
                         <?= $this->session->flashdata('success'); ?>
                     </div>
                 </div>
             <?php elseif ($this->session->flashdata('error')): ?>
                 <div class="col-md-12">
                     <div class="alert alert-danger alert-dismissible">
                         <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                         <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                         <?= $this->session->flashdata('error'); ?>
                     </div>
                 </div>
             <?php endif; ?>

             <div class="col-xs-12">
                 <div class="box box-info">
                     <div class="box-header">
                         <h3 class="box-title">My Payslip History</h3>
                     </div>
                     <div class="box-body">
                         <div class="table-responsive">
                             <table id="example1" class="table table-bordered table-striped">
                                 <thead>
                                     <tr>
                                         <th>Slno.</th>
                                         <th>Month</th>
                                         <th>Year</th>
                                         <th>Action</th>
                                     </tr>
                                 </thead>
                                 <tbody>
                                     <?php
                                        if (!empty($payslips)):
                                            $i = 1;
                                            foreach ($payslips as $payslip):
                                        ?>
                                             <tr>
                                                 <td><?= $i; ?></td>
                                                 <td><?= date('F', mktime(0, 0, 0, $payslip['month'], 10)); ?></td>
                                                 <td><?= html_escape($payslip['year']); ?></td>
                                                 <td>
                                                     <?php if (!empty($payslip['payslip_pdf_path'])): ?>
                                                         <a href="<?= base_url('salary/download_my_payslip/' . $payslip['salary_id']); ?>" class="btn btn-warning" target="_blank">
                                                             <i class="fa fa-download"></i> Download
                                                         </a>
                                                     <?php else: ?>
                                                         <span class="label label-danger">Not Available</span>
                                                     <?php endif; ?>
                                                 </td>
                                             </tr>
                                         <?php
                                                $i++;
                                            endforeach;
                                        else:
                                            ?>
                                         <tr>
                                             <td colspan="4" class="text-center">No payslips found for your account.</td>
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