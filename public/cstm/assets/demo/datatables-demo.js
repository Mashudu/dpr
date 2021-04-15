// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable();
});

$(document).ready(function() {
  $('#dataTableProcesses').DataTable( {
      "lengthMenu": [[5, 10, 15,20,25,30,35, -1], [5, 10, 15,20,25,30,35, "All"]]
  });
} );
