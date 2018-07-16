 $(document).ready(function() {
	 $('.container').css( 'display', 'block' );
		
	  $('table.display').dataTable( {
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.16/i18n/Polish.json"},
		  		"autoWidth": false,
				  "columnDefs": [
    				{ "width": "80%",
					  "targets"  : 'no-sort',
     				  "orderable": false
					}
  					]
            
        } );
   
 
$("thead th").removeClass("sorting_asc"); 
 } );
