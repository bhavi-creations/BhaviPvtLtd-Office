<footer class="main-footer">
  <strong>Copyright &copy; <?= date('Y') ?> <a href="https://bhavicreations.com" target="blank">Bhavi Creations</a>.</strong> All rights
  reserved.
</footer>

</div>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-ui/jquery-ui.min.js"></script> 
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<script>
  $('#datepicker').datepicker({
    autoclose: true
  })
</script>
<script>
  $(document).ready(function() { // THIS IS THE SINGLE, CONSOLIDATED READY BLOCK

    // Global variables for filter inputs (if needed elsewhere)
    var minDate, maxDate, staff;

    // --- DataTables Custom Filtering Functions (Defined ONCE) ---

    // attendance
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        // console.log(settings.nTable.id); // Uncomment for debugging
        if (settings.nTable.id !== 'attendance') {
          return true;
        }

        var staff = $('#staff').val();
        var min = new Date($('#min').val() + ' 00:00:00');
        var max = new Date($('#max').val() + ' 23:59:59');

        var staffName = data[1];
        var loginDate = data[2].split(' ');
        var loginDateIndexes = loginDate[0].split('-');
        var date = new Date(loginDateIndexes[2], loginDateIndexes[1] - 1, loginDateIndexes[0]); // YYYY, MM-1, DD

        // console.log("Attendance Filter Debug:", { min, max, staffName, date, staff }); // Uncomment for debugging
        if (isNaN(date.getTime())) { // Check for Invalid Date
          console.warn("Invalid Date for attendance row", dataIndex, ":", data[2]);
          return false;
        }

        var passFilter = true;

        if (min && !isNaN(min.getTime())) {
          if (date.getTime() < min.getTime()) {
            passFilter = false;
          }
        }
        if (max && !isNaN(max.getTime())) {
          if (date.getTime() > max.getTime()) {
            passFilter = false;
          }
        }

        if (passFilter && staff != '') {
          if (staff != staffName) { // Assuming exact match for staff name
            passFilter = false;
          }
        }
        return passFilter;
      }
    );

    // salary
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        // console.log(settings.nTable.id); // Uncomment for debugging
        if (settings.nTable.id !== 'salary') {
          return true;
        }

        var staff = $('#salary_staff').val();
        var min = $('#salary_min').val(); // Get as string
        var max = $('#salary_max').val(); // Get as string

        // Convert filter dates to Date objects
        var minDateObj = min ? new Date(min + ' 00:00:00') : null;
        var maxDateObj = max ? new Date(max + ' 23:59:59') : null;


        var staffName = data[1]; // Staff Name column
        var paidOnDateString = data[11]; // CORRECTED: 'Paid On' column is index 11

        // Parse DD-MM-YYYY string from HTML to Date object
        var dateParts = paidOnDateString.split('-');
        // Use YYYY, MM-1, DD format for Date constructor for reliability
        var rowDateObj = new Date(dateParts[2], dateParts[1] - 1, dateParts[0]);


        // --- DEBUGGING LOGS FOR SALARY FILTER ---
        // console.log("--- Salary Filter Debug (Row Index:", dataIndex, ") ---");
        // console.log("Min Input:", min, " | Max Input:", max);
        // console.log("Row Paid On Date String (from HTML):", paidOnDateString);
        // console.log("Row Date Object:", rowDateObj, " (Valid:", !isNaN(rowDateObj.getTime()), ")");
        // console.log("Min Date Object:", minDateObj, " (Valid:", minDateObj ? !isNaN(minDateObj.getTime()) : true, ")");
        // console.log("Max Date Object:", maxDateObj, " (Valid:", maxDateObj ? !isNaN(maxDateObj.getTime()) : true, ")");
        // console.log("Staff Filter Input:", staff);
        // console.log("Staff Name Column (from HTML):", staffName);
        // --- END DEBUGGING LOGS ---

        // Check for invalid dates that would break comparisons
        if (isNaN(rowDateObj.getTime())) {
          // console.warn("Invalid row Paid On date for index", dataIndex, ":", paidOnDateString);
          return false; // Exclude rows with invalid dates
        }
        if (min && isNaN(minDateObj.getTime())) {
          // console.warn("Invalid min date input value:", min);
          return false; // Exclude if min date input itself is invalid
        }
        if (max && isNaN(maxDateObj.getTime())) {
          // console.warn("Invalid max date input value:", max);
          return false; // Exclude if max date input itself is invalid
        }

        var passFilter = true; // Assume row passes filter by default

        // Apply Date Range Filter
        if (minDateObj && rowDateObj.getTime() < minDateObj.getTime()) {
          passFilter = false;
        }
        if (maxDateObj && rowDateObj.getTime() > maxDateObj.getTime()) {
          passFilter = false;
        }

        // Apply Staff Name Filter
        if (passFilter && staff != '') { // Only apply staff filter if date filter passes or no date filter
          if (staffName.indexOf(staff) === -1) { // Check if staff name contains the filter text
            passFilter = false;
          }
        }
        // console.log("Salary Filter Result for row", dataIndex, ":", passFilter); // Uncomment for debugging
        return passFilter;
      }
    );

    // leave
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        // console.log(settings.nTable.id); // Uncomment for debugging
        if (settings.nTable.id !== 'leave') {
          return true;
        }

        var staff = $('#leave_staff').val();
        var min = new Date($('#leave_min').val() + ' 00:00:00');
        var max = new Date($('#leave_max').val() + ' 23:59:59');

        var staffName = data[1];
        var staffDateIndexes = data[5].split('-'); // Assuming data[5] is DD-MM-YYYY
        var date = new Date(staffDateIndexes[2], staffDateIndexes[1] - 1, staffDateIndexes[0]); // YYYY, MM-1, DD

        if (isNaN(date.getTime())) { // Check for Invalid Date
          console.warn("Invalid Date for leave row", dataIndex, ":", data[5]);
          return false;
        }

        var passFilter = true;

        if (min && !isNaN(min.getTime())) {
          if (date.getTime() < min.getTime()) {
            passFilter = false;
          }
        }
        if (max && !isNaN(max.getTime())) {
          if (date.getTime() > max.getTime()) {
            passFilter = false;
          }
        }

        if (passFilter && staff != '') {
          if (staff != staffName) { // Assuming exact match for staff name
            passFilter = false;
          }
        }
        return passFilter;
      }
    );

    // work_reports
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        // console.log(settings.nTable.id); // Uncomment for debugging
        if (settings.nTable.id !== 'work_reports') {
          return true;
        }

        var staff = $('#work_reports_staff').val();
        var min = new Date($('#work_reports_min').val() + ' 00:00:00');
        var max = new Date($('#work_reports_max').val() + ' 23:59:59');

        var staffName = data[3];
        var staffDateIndexes = data[6].split('-'); // Assuming data[6] is DD-MM-YYYY
        var date = new Date(staffDateIndexes[2], staffDateIndexes[1] - 1, staffDateIndexes[0]); // YYYY, MM-1, DD

        if (isNaN(date.getTime())) { // Check for Invalid Date
          console.warn("Invalid Date for work_reports row", dataIndex, ":", data[6]);
          return false;
        }

        var passFilter = true;

        if (min && !isNaN(min.getTime())) {
          if (date.getTime() < min.getTime()) {
            passFilter = false;
          }
        }
        if (max && !isNaN(max.getTime())) {
          if (date.getTime() > max.getTime()) {
            passFilter = false;
          }
        }

        if (passFilter && staff != '') {
          if (staff != staffName) { // Assuming exact match for staff name
            passFilter = false;
          }
        }
        return passFilter;
      }
    );

    // project_tasks
    $.fn.dataTable.ext.search.push(
      function(settings, data, dataIndex) {
        // console.log(settings.nTable.id); // Uncomment for debugging
        if (settings.nTable.id !== 'project_tasks') {
          return true;
        }

        var staff = $('#project_tasks_staff').val();
        var filter_by = $('#filter_by').val();
        var min = $('#project_tasks_min').val();
        var max = $('#project_tasks_max').val();

        var minDateObj = min ? new Date(min + ' 00:00:00') : null;
        var maxDateObj = max ? new Date(max + ' 23:59:59') : null;

        var staffName = data[2];
        var staffDateIndexes;
        if (filter_by == 'due_date') {
          staffDateIndexes = data[6].split('-'); // Assuming data[6] is DD-MM-YYYY
        } else if (filter_by == 'completed_date') {
          staffDateIndexes = data[7].split('-'); // Assuming data[7] is DD-MM-YYYY
        } else {
          staffDateIndexes = data[6].split('-'); // Default to due_date or handle appropriately
          minDateObj = null; // Clear filters if not by specific date type
          maxDateObj = null;
        }

        // Check if staffDateIndexes is defined before creating Date object
        var date = null;
        if (staffDateIndexes && staffDateIndexes.length === 3) {
          date = new Date(staffDateIndexes[2], staffDateIndexes[1] - 1, staffDateIndexes[0]); // YYYY, MM-1, DD
        }

        if (date === null || isNaN(date.getTime())) { // Check for Invalid Date
          // console.warn("Invalid Date for project_tasks row", dataIndex, ":", (filter_by === 'due_date' ? data[6] : data[7]));
          // If filter_by is not 'due_date' or 'completed_date', the date might be irrelevant
          // If it's a valid filter type, exclude invalid dates.
          if (filter_by === 'due_date' || filter_by === 'completed_date') {
            return false;
          } else {
            // If filter_by is not date-based, pass (only apply staff filter)
            date = new Date(); // Or some default valid date for comparisons not needing it
          }
        }

        var passFilter = true;

        if (minDateObj && !isNaN(minDateObj.getTime())) {
          if (date.getTime() < minDateObj.getTime()) {
            passFilter = false;
          }
        }
        if (maxDateObj && !isNaN(maxDateObj.getTime())) {
          if (date.getTime() > maxDateObj.getTime()) {
            passFilter = false;
          }
        }

        if (passFilter && staff != '') {
          if (staffName.indexOf(staff) === -1) { // Check if staff name contains the filter text
            passFilter = false;
          }
        }
        return passFilter;
      }
    );

    // --- DataTables Initializations (Defined ONCE) ---

    // Initialize DataTables for multiple tables with buttons
    // Initialize DataTables for multiple tables with buttons
    $('#example1, #attendance, #salary, #leave, #work_reports, #project_tasks').DataTable({
      dom: 'Bfrtip',
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ],
      // Add scrolling options specifically for #example1 if it's the primary table,
      // otherwise consider applying them individually or checking if all these tables need scrolling.
      // For now, applying generally as example1 usually implies main table.
      "scrollX": true, // For horizontal scrolling
      "scrollY": "400px", // For vertical scrolling
      "scrollCollapse": true // Often recommended with scrollY
    });

    // Initialize example2 if it's a separate table
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    });


    // --- Event Listeners for Filters (Defined ONCE) ---

    // attendance filters
    $('#min, #max, #staff').on('change', function() {
      $('#attendance').DataTable().draw();
    });

    // salary filters
    $('#salary_min, #salary_max, #salary_staff').on('change', function() {
      $('#salary').DataTable().draw();
    });

    // leave filters
    $('#leave_min, #leave_max, #leave_staff').on('change', function() {
      $('#leave').DataTable().draw();
    });

    // work_reports filters
    $('#work_reports_min, #work_reports_max, #work_reports_staff').on('change', function() {
      $('#work_reports').DataTable().draw();
    });

    // project_tasks filters
    $('#project_tasks_min, #project_tasks_max, #project_tasks_staff, #filter_by').on('change', function() {
      $('#project_tasks').DataTable().draw();
    });
  }); // END of consolidated $(document).ready() block
</script>

<script>
  function deleteItem(link) {
    if (confirm('Are you sure to delete?')) {
      window.location = link;
    } else {
      return false;
    }
  }
</script>


</body>

</html>