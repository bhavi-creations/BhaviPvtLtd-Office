 <footer class="main-footer">
    <!-- <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.13
    </div> -->
    <strong>Copyright &copy; <?=date('Y')?> <a href="https://bhavicreations.com" target="blank">Bhavi Creations</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->


<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url(); ?>assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url(); ?>assets/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url(); ?>assets/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url(); ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<!-- Boostrap Toogle Script -->
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

<!-- (Optional) Latest compiled and minified JavaScript translation files -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/i18n/defaults-*.min.js"></script>

<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Date Picker -->
<script>
    $('#datepicker').datepicker({
      autoclose: true
    })
</script>

<!-- Datatable -->
<script>
  $(function () {
    $('#example1, #attendance, #salary, #leave, #work_reports, #project_tasks').DataTable({
      dom: 'Bfrtip',
      buttons: [
          'copy', 'csv', 'excel',
      ]
    })
    
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })

  var minDate, maxDate, staff;
 
  // Custom filtering function which will search data in column four between two values
  // attendance
  $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
          console.log(settings.nTable.id);
          if ( settings.nTable.id !== 'attendance' ) {
            return true;
          }

          staff = $('#staff').val();
          var min = new Date($('#min').val()+' 00:00:00');
          var max = new Date($('#max').val()+' 23:59:59');

          var staffName = data[1];
          var loginDate = data[2].split(' ');
          var loginDateIndexes = loginDate[0].split('-');
          var date = new Date( loginDateIndexes[2]+' '+loginDateIndexes[1]+' '+loginDateIndexes[0]);
          console.log(min);
          console.log(max);
          console.log(loginDateIndexes[2]+' '+loginDateIndexes[1]+' '+loginDateIndexes[0]);
          console.log(date);
          if (
              ( min === null && max === null ) ||
              ( min === null && date <= max ) ||
              ( min <= date   && max === null ) ||
              ( min <= date   && date <= max ) ||
              ( min === date  || date === max )
          ) {
            if(staff != ''){
              if(staff == staffName){
                return true;
              }else{
                return false;
              }
            }else{
              return true;
            }
          }
          return false;
      }
  );

  // salary 
  $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
          console.log(settings.nTable.id);
          if ( settings.nTable.id !== 'salary' ) {
            return true;
          }

          var staff = $('#salary_staff').val();
          var min = new Date($('#salary_min').val()+' 00:00:00');
          var max = new Date($('#salary_max').val()+' 23:59:59');

          var staffName = data[1];
          var staffDate = data[8].split(' ');
          var staffDateIndexes = data[8].split('-');
          var date = new Date( staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
          console.log(min);
          console.log(max);
          console.log(staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
          console.log(date);
          if (
              ( min === null && max === null ) ||
              ( min === null && date <= max ) ||
              ( min <= date   && max === null ) ||
              ( min <= date   && date <= max ) ||
              ( min === date  || date === max )
          ) {
            if(staff != ''){
              if(staff == staffName){
                return true;
              }else{
                return false;
              }
            }else{
              return true;
            }
          }
          return false;
      }
  );

  // leave
  $.fn.dataTable.ext.search.push(
      function( settings, data, dataIndex ) {
          console.log(settings.nTable.id);
          if ( settings.nTable.id !== 'leave' ) {
            return true;
          }

          var staff = $('#leave_staff').val();
          var min = new Date($('#leave_min').val()+' 00:00:00');
          var max = new Date($('#leave_max').val()+' 23:59:59');

          var staffName = data[1];
          var staffDate = data[5].split(' ');
          var staffDateIndexes = data[5].split('-');
          var date = new Date( staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
          console.log(min);
          console.log(max);
          console.log(staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
          console.log(date);
          if (
              ( min === null && max === null ) ||
              ( min === null && date <= max ) ||
              ( min <= date   && max === null ) ||
              ( min <= date   && date <= max ) ||
              ( min === date  || date === max )
          ) {
            if(staff != ''){
              if(staff == staffName){
                return true;
              }else{
                return false;
              }
            }else{
              return true;
            }
          }
          return false;
      }
  );

  // work_reports
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        console.log(settings.nTable.id);
        if ( settings.nTable.id !== 'work_reports' ) {
          return true;
        }

        var staff = $('#work_reports_staff').val();
        var min = new Date($('#work_reports_min').val()+' 00:00:00');
        var max = new Date($('#work_reports_max').val()+' 23:59:59');

        var staffName = data[3];
        var staffDateIndexes = data[6].split('-');
        var date = new Date( staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
        console.log(min);
        console.log(max);
        console.log(staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
        console.log(date);
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max ) ||
            ( min === date  || date === max )
        ) {
          if(staff != ''){
            if(staff == staffName){
              return true;
            }else{
              return false;
            }
          }else{
            return true;
          }
        }
        return false;
    }
  );

  // project_tasks
  $.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        console.log(settings.nTable.id);
        if ( settings.nTable.id !== 'project_tasks' ) {
          return true;
        }

        var staff = $('#project_tasks_staff').val();
        var filter_by = $('#filter_by').val();
        var min = new Date($('#project_tasks_min').val()+' 00:00:00');
        var max = new Date($('#project_tasks_max').val()+' 23:59:59');

        var staffName = data[2];  
        if(filter_by == 'due_date'){
          var staffDateIndexes = data[6].split('-');
        }else if(filter_by == 'completed_date'){
          var staffDateIndexes = data[7].split('-');
        }else{
          var staffDateIndexes = data[6].split('-');
          min = null;
          max = null;
        }
        var date = new Date( staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
        console.log(min);
        console.log(max);
        console.log(staffDateIndexes[2]+' '+staffDateIndexes[1]+' '+staffDateIndexes[0]);
        console.log(date);
        if (
            ( min === null && max === null ) ||
            ( min === null && date <= max ) ||
            ( min <= date   && max === null ) ||
            ( min <= date   && date <= max ) ||
            ( min === date  || date === max )
        ) {
          if(staff != ''){
            if(staffName.indexOf(staff) !== -1){
            // if(staff == staffName){
              return true;
            }else{
              return false;
            }
          }else{
            return true;
          }
        }
        return false;
    }
  );
  
  $(document).ready(function() {
      // attendance 
      // Create date inputs
      minDate = new Date($('#min').val());
      maxDate = new Date($('#max').val());
      staff = $('#staff').val();

      console.log(minDate)
      console.log(maxDate)
      console.log(staff)
  
      // DataTables initialisation
      var table = $('#attendance').DataTable();
  
      // Refilter the table
      $('#min, #max, #staff').on('change', function () {
          table.draw();
      });
      // attendance 


      // Salary
      // DataTables initialisation
      var salaryTable = $('#salary').DataTable();
      // Refilter the salaryTable
      $('#salary_min, #salary_max, #salary_staff').on('change', function () {
          salaryTable.draw();
      });
      // Salary 

      // Leave
      // DataTables initialisation
      var leaveTable = $('#leave').DataTable();
      // Refilter the leaveTable
      $('#leave_min, #leave_max, #leave_staff').on('change', function () {
          leaveTable.draw();
      });
      // Leave 

      // Work Reports
      // DataTables initialisation
      var workReportsTable = $('#work_reports').DataTable();
      // Refilter the workReportsTable
      $('#work_reports_min, #work_reports_max, #work_reports_staff').on('change', function () {
          workReportsTable.draw();
      });
      // Work Reports 

      // Project tasks
      // DataTables initialisation
      var projectTasksTable = $('#project_tasks').DataTable();
      // Refilter the projectTasksTable
      $('#project_tasks_min, #project_tasks_max, #project_tasks_staff, #filter_by').on('change', function () {
          projectTasksTable.draw();
      });
      // Project tasks 
  });
</script>
<script>
  function deleteItem(link){
    if(confirm('Are you sure to delete?')){
      window.location = link;
    }else{
      return false;
    }
  }
</script>
</body>
</html>
