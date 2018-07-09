var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    console.log('JQUERY FIRED');

    var table = $('#example').DataTable( {
        ajax: "http://localhost/pharmeasy/apis/userRequests.php",
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button>Click!</button>"
        } ],
        columns: [
            { data: "recordId" },
            { data: "patientName" },
            { data: "recordType" },
            { data: "requestedBy" },
            { data: "requestStatus" },
            { data: "filePath" },
            { data: "docCreatedDate" },
            { data: "requestUpdatedDate" },
            { data: [ {
                "targets": -1,
                "data": null,
                "defaultContent": "<button>Click!</button>"
                } ]}
        ],
        select: true,
        buttons: [
            { extend: "create", editor: editor },
            { extend: "edit",   editor: editor },
            { extend: "remove", editor: editor }
        ],

    });


    $('#example tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        
        //alert( data[0] +"'s salary is: "+ data[ 5 ] );
    } );

} );