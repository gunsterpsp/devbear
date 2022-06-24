const addUser = () => {

    const company = $('#company').val();
    const username = $('#username').val();
    const email = $('#email').val();
    const password = $('#password').val();

    $.ajax({
        url: "insert.php",
        type: "post",
        data: {
            company: company,
            username: username,
            email: email,
            password: password,
        },
        success: function(data, status){
            $('#createModal').modal('hide');
            $('#example').DataTable().ajax.reload();

        }

    });
    
    $("#form")[0].reset();

}



$(document).ready(function () {

    $('#example').dataTable({
        "destroy": true,
        "order": [[0, "desc"]],
        ajax: {
            url: "server_processing.php",
            'dataSrc': ""
        },
        "columns": [
            { "data": "id"  },
            { "data": "company"  },
            { "data": "username"  },
            { "data": "email"  },
            { "data": "password"  },
            { "data": "update"  },
            { "data": "status"  },
            { "data": "toggle"  },
            
 
        ]
    });
    
    
    });






const DeleteUser = (deleteid) => {

    const confirm_delete = confirm("Are you sure you want delete this id# "+ deleteid +" record?");
    if(confirm_delete == true){

        $.ajax({
            url: "delete.php",
            type: "POST",
            data: {
                deleteid: deleteid
            },
            success: function(data, status){
                $('#example').DataTable().ajax.reload();
            }
        });
    }
}


const GetDetails = (updateid) => {

    $('#hiddendata').val(updateid);


    $.post("update.php", {
        updateid: updateid
    }, function(data, status){
        const userid = JSON.parse(data);
        $('#updatecompany').val(userid.company);
        $('#updateusername').val(userid.username);
        $('#updateemail').val(userid.email);
        $('#updatepassword').val(userid.password);

    });

    $('#updateModal').modal("show");


}



const UpdateDetails = () => {

    const updatecompany = $('#updatecompany').val();
    const updateusername = $('#updateusername').val();
    const updateemail = $('#updateemail').val();
    const updatepassword = $('#updatepassword').val();
    const hiddendata = $('#hiddendata').val();
    
    $.ajax({
        url: "update.php",
        type: "post",
        data: {
            updatecompany: updatecompany,
            updateusername: updateusername,
            updateemail: updateemail,
            updatepassword: updatepassword,
            hiddendata: hiddendata
        },
        success: function(data, status){
            $('#updateModal').modal('hide');
            $('#example').DataTable().ajax.reload();

        }

    });

}


const statdeactive = (deactive_id) => {

    const confirm_deactivate = confirm("Are you sure you want to deactivate this user?");
    if(confirm_deactivate == true){

        $.ajax({
            url: "deactivate.php",
            type: "POST",
            data: {
                deactive_id: deactive_id
            },
            success: function(data, status){
                $('#example').DataTable().ajax.reload();
            }
        });
    } 

}

const statactive = (active_id) => {


    const confirm_activate = confirm("Do you want to activate this user?");
    if(confirm_activate == true){

        $.ajax({
            url: "active.php",
            type: "POST",
            data: {
                active_id: active_id
            },
            success: function(data, status){
                $('#example').DataTable().ajax.reload();
            }
        });
    } 

}



