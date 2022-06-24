<?php

include 'connect/connection.php';


$sql = mysqli_query($connect, "SELECT * FROM company_list");

$data = array();
while ($row = mysqli_fetch_assoc($sql))
{
    $update_delete = '<button class="btn btn-warning" onclick="GetDetails('.$row['id'].')" data-bs-toggle="modal" data-bs-target="#updateModal""><i class="fa-solid fa-pen-to-square"></i></button>
    <button onclick="DeleteUser('.$row['id'].')" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>';

    $toggle = '<button class="btn btn-success" id="statactive" onclick="statactive('.$row['id'].')">Active</button>
    <button class="btn btn-danger" id="statdeactive" onclick="statdeactive('.$row['id'].')">Disable</button>';

    $data[] = array(
        "id"=> $row['id'],
        "company"=> $row['company'],
        "username"=> $row['username'],
        "email"=> $row['email'],
        "password"=> $row['password'],
        "update"=> $update_delete,
        "status"=> $row['status'],
        "toggle"=> $toggle,
        
    );
}


 
echo json_encode($data);




?>


