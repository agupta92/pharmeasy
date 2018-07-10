var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    console.log('JQUERY FIRED');

    var table = $('#example').DataTable( {
        ajax: getRoot() + "/pharmeasy/apis/userRequests.php",
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
            { data: null, render: function(data,type,row){
                //console.log(data);
                if((data.userType == 'patient') ){
                    if((data.requestStatus === 'approved') || (data.requestStatus == 'NA'))
                        return  'Approved!';
                    else {
                        return  '<button class="btn-approve">Approve</button>';
                    }
                } else {
                    return 'NA';
                }}
            }
        ],
        select: true
    });

    var table = $('#nonRequestedRecords').DataTable( {
        ajax: getRoot() + "/pharmeasy/apis/getNonRequestedRecords.php",
        "columnDefs": [ {
            "targets": -1,
            "data": null,
            "defaultContent": "<button>Click!</button>"
        } ],
        columns: [
            { data: "recordId" },
            { data: "userName" },
            { data: "userEmail" },
            { data: "recordType" },
            { data: "createdAt" },
            { data: null, render: function(data,type,row){
                //console.log(data);
                if((data.userType != 'patient') ){
                    return  '<button class="btn-approve">Request</button>';
                } else {
                    return 'NA';
                }
            }}
        ],
        select: true
    });

    $('#nonRequestedRecords tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        var recordId = data.recordId;
        var user_id = data.userId;
        var jqxhr = $.get( getRoot() + "/pharmeasy/apis/createNewRequest.php?recordId=" + recordId + "&userId=" + user_id, function(data) {
            console.log('Successs: ' + data );
            alert( "Success" );
            location.reload();           
        })
          .done(function() {
            //alert( "second success" );
          })
          .fail(function() {
            alert( "error" );
          })
          .always(function() {
            //alert( "finished" );
          });
        //alert( data[0] +"'s salary is: "+ data[ 5 ] );
    } );

    $('#example tbody').on( 'click', 'button', function () {
        var data = table.row( $(this).parents('tr') ).data();
        console.log(data);
        var requestId = data.requestId;
        var jqxhr = $.get( getRoot() + "/pharmeasy/apis/userRequestApproved.php?requestId=" + requestId, function(data) {
            alert( "Success" );
            location.reload();
            console.log('Successs: ' + data );
        })
          .done(function() {
            //alert( "second success" );
          })
          .fail(function() {
            alert( "error" );
          })
          .always(function() {
            //alert( "finished" );
          });
        //alert( data[0] +"'s salary is: "+ data[ 5 ] );
    } );

    $("#logout").click(function(){
        //alert('clicked!');
            var jqxhr = $.get( getRoot() + "/pharmeasy/apis/logout.php", function(data) {
            //alert( "Success" );
            window.location.replace('login.html');
            console.log('Successs: ' + data );
        })
          .done(function() {
            //alert( "second success" );
          })
          .fail(function() {
            alert( "error" );
          })
          .always(function() {
            //alert( "finished" );
          });
    });


    
    var user = ReadCookie("userName");
    $("#user").html(user.toUpperCase());

} );

function ReadCookie(cookieName) {
    var theCookie=" "+document.cookie;
    var ind=theCookie.indexOf(" "+cookieName+"=");
    if (ind==-1) ind=theCookie.indexOf(";"+cookieName+"=");
    if (ind==-1 || cookieName=="") return "";
    var ind1=theCookie.indexOf(";",ind+1);
    if (ind1==-1) ind1=theCookie.length; 
        return unescape(theCookie.substring(ind+cookieName.length+2,ind1));
}

function getRoot(){
    var root = location.protocol + '//' + location.host;
    return root;
}