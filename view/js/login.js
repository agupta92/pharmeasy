var editor; // use a global for the submit and return data rendering in the examples
 
$(document).ready(function() {
    var root = location.protocol + '//' + location.host;
    //alert(root);
    console.log('Inside Login.js');
    $('#loginform').submit(function() {

        $.ajax({
            type: "GET",
            url: root + '/pharmeasy/apis/login.php',
            data: {
                username: $("#username").val(),
                password: $("#password").val()
            },
            success: function(data)
            {   
                //console.log('Success Login', data);
                if (data.data.user_id) {
                    document.cookie = 'userName='+data.data.user_name +'-' + data.data.user_type;
                    window.location.replace('dashboard.html');
                }
                else {
                    alert('Invalid Credentials');
                }
            }
        });
         return false;
    });
} );