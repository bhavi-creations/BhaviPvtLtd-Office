<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Salary
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">Salary</a></li>
      <li class="active">Add Salary</li>
    </ol>
  </section>

  <section class="content">
    <div class="row">

      <?php if($this->session->flashdata('success')): ?>
        <div class="col-md-12">
          <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                <?php echo $this->session->flashdata('success'); ?>
          </div>
        </div>
      <?php elseif($this->session->flashdata('error')):?>
        <div class="col-md-12">
            <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Failed!</h4>
                  <?php echo $this->session->flashdata('error'); ?>
            </div>
          </div>
      <?php endif;?>

      <div class="col-md-12">
        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Add Salary</h3>
          </div>
         <?php echo form_open('Salary/insert'); ?>
            <div class="box-body">
              
              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleInputPassword1">Department Name</label>
                  <select class="form-control selectpicker" data-live-search="true" name="slcdepartment" onchange="getstaff(this.value)">
                    <option value="">Select</option>
                      <?php
                        if(isset($departments))
                        {
                          foreach($departments as $cnt)
                          {
                            print "<option value='".$cnt['id']."'>".$cnt['department_name']." ".$cnt['city']."</option>";
                          }
                        } 
                      ?>
                  </select>
                </div>
              </div>
            </div>
            <div id="salarydiv">
            </div>
            
          </form>
        </div>
        </div>
      </div>
    </section>
  </div>
<script>
    // Function to perform calculations for a single staff row
    function calculateSalary(row) {
        // Get values from the current row
        const basicSalary = parseFloat(row.find('.basic-salary').val().replace(/,/g, '')) || 0;
          const totalWorkingDaysMonth = 25;
        const employeeLoginDays = parseInt(row.find('.employee-login-days').val()) || 0;
        const addWorkingDays = parseInt(row.find('.add-working-days').val()) || 0;
        const addAllowance = parseFloat(row.find('.add-allowance').val()) || 0;

        // Calculate No. of Leaves
        let noOfLeaves = totalWorkingDaysMonth - employeeLoginDays;
        if (noOfLeaves < 0) noOfLeaves = 0; // Ensure it's not negative

        // Update No. of Leaves field (read-only, but good to set its value)
        row.find('.no-of-leaves').val(noOfLeaves);

        // Calculate Salary per Day
        let salaryPerDay = 0;
        if (basicSalary > 0 && totalWorkingDaysMonth > 0) {
            salaryPerDay = basicSalary / totalWorkingDaysMonth;
        }

        // Calculate Salary to be Paid
        let salaryToBePaid = 0;
        if (salaryPerDay > 0) {
            const effectiveWorkedDays = employeeLoginDays + addWorkingDays;
            salaryToBePaid = (salaryPerDay * effectiveWorkedDays) + addAllowance;
        } else {
            salaryToBePaid = addAllowance; // If no basic salary, only allowance applies
        }

        // Update Salary to be Paid field
        row.find('.salary-to-be-paid').val(salaryToBePaid.toFixed(2)); // Format to 2 decimal places
    }

    // Event listener for changes in department selection
    // When department changes, the #salarydiv content is reloaded, so we need to
    // re-attach event listeners to the new inputs.
    // This uses a MutationObserver to detect when #salarydiv content changes.
    const observer = new MutationObserver(function(mutationsList, observer) {
        for(let mutation of mutationsList) {
            if (mutation.type === 'childList' && mutation.addedNodes.length > 0) {
                // Content of #salarydiv has likely changed.
                // Attach event listeners to the newly loaded inputs.
                $('#salarydiv').find('.add-working-days, .add-allowance').off('keyup change').on('keyup change', function() {
                    const currentRow = $(this).parents('tr');
                    calculateSalary(currentRow);
                });

                // Also trigger initial calculation for all rows after load
                $('#salarydiv').find('tbody tr').each(function() {
                    calculateSalary($(this));
                });
            }
        }
    });

    // Start observing the #salarydiv for changes in its children
    const salaryDiv = document.getElementById('salarydiv');
    if (salaryDiv) {
        observer.observe(salaryDiv, { childList: true });
    }

    // Initial setup for the department dropdown change (already exists)
    function getstaff(dept) {
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Salary/get_salary_list'); ?>",
            data: 'dept=' + dept,
            success: function(data){
                $('#salarydiv').html(data);
                // The MutationObserver will now handle attaching new event listeners
            }
        });
    }

    // The old keyup functions for 'expenses', 'working_days', 'no_of_leaves' are removed
    // as they are replaced by the new calculation logic above.
</script>