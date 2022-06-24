const addUser = () => {

    const product_name = $('#product_name').val();
    const product_price = $('#product_price').val();
    const product_quantity = $('#product_quantity').val();

    $.ajax({
        url: "product_insert.php",
        type: "post",
        data: {
            product_name: product_name,
            product_price: product_price,
            product_quantity: product_quantity,
        },
        success: function(data, status){
            $('#createModal').modal('hide');
            $('#example').DataTable().ajax.reload();

        }

    });
    
    $("#form")[0].reset();

}


const DeleteUser = (deleteid) => {

    const confirm_delete = confirm("Are you sure you want delete this id# "+ deleteid +" record?");
    if(confirm_delete == true){

        $.ajax({
            url: "delete_product.php",
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


$(document).ready(function () {

    $('#example').dataTable({
        "destroy": true,
        "order": [[0, "desc"]],
        ajax: {
            url: "inventory_processing.php",
            'dataSrc': ""
        },
        "columns": [
            { "data": "id"  },
            { "data": "product_name"  },
            { "data": "product_price"  },
            { "data": "product_quantity"  },
            { "data": "created_at"  },
            { "data": "updated_at"  },
            { "data": "update"  },
            
            
            
            
        ]
    });


    });




const GetDetails = (updateid) => {

    $('#hiddendata').val(updateid);


    $.post("product_update.php", {
        updateid: updateid
    }, function(data, status){
        const item = JSON.parse(data);
        $('#update_name').val(item.product_name);
        $('#update_price').val(item.product_price);
        $('#update_quantity').val(item.product_quantity);

    });

    $('#updateModal').modal("show");


}



const UpdateDetails = () => {

    const update_name = $('#update_name').val();
    const update_price = $('#update_price').val();
    const update_quantity = $('#update_quantity').val();
    const hiddendata = $('#hiddendata').val();



    $.ajax({
        url: "product_update.php",
        type: "post",
        data: {
            update_name: update_name,
            update_price: update_price,
            update_quantity: update_quantity,
            hiddendata: hiddendata
        },
        success: function(data, status){
            $('#updateModal').modal('hide');
            $('#example').DataTable().ajax.reload();

        }

    });

}


$(document).ready(function(){
    $('.nav_btn').click(function(){
      $('.mobile_nav_items').toggleClass('active');
    });
  });





