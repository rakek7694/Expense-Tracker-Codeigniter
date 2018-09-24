$(document).ready(function(){
    $('#data-table-simple').DataTable( {
      dom: 'Blfrtip',
      buttons: [
        {
          extend: 'copyHtml5',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        }, {
          extend: 'csvHtml5',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        }, {
          extend: 'excelHtml5',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        }, {
          extend: 'pdfHtml5',
          exportOptions: {
            columns: [ 0, 1, 2, 3, 4, 5 ]
          }
        }, 'print'
      ]});
    });