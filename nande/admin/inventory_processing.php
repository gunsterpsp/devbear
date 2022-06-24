<?php
include '../connect/connection.php';

$sql = mysqli_query($connect, "SELECT * FROM inventory");

$data = array();
while ($row = mysqli_fetch_assoc($sql))
{
    $update_delete = '<button class="btn btn-warning" onclick="GetDetails('.$row['id'].')" data-bs-toggle="modal" data-bs-target="#updateModal""><i class="fa-solid fa-pen-to-square"></i></button>
    <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>';
    
    $data[] = array(
        "id"=> $row['id'],
        "product_name"=> $row['product_name'],
        "product_price"=> $row['product_price'],
        "product_quantity"=> $row['product_quantity'],
        "created_at"=> $row['created_at'],
        "updated_at"=> $row['updated_at'],
        "update"=>$update_delete,


    );
}
 
echo json_encode($data);


?>