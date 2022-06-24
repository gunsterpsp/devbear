<?php
session_start();
include '../connect/connection.php';


// function for admin.php
function admin_login(){
	global $connect;
    if(isset($_POST['login'])){
        if (isset($_POST['admin_username']) && isset($_POST['password'])) {
            function validate($data){
               $data = ($data);
               $data = stripslashes($data);
               $data = htmlspecialchars($data);
               return $data;
            }
              $uname = validate($_POST['admin_username']);
              $pass  = validate($_POST['password']);
            if (empty($uname)) {
                header("Location: admin.php?error=Username is required");
                exit();
            }else if(empty($pass)){
                header("Location: admin.php?error=Password is required");
                exit();
            }else{
                 $sql = "SELECT * FROM admin WHERE admin_username ='$uname' AND password ='$pass'";
              $result = mysqli_query($connect, $sql);
            $username = $_POST['admin_username'];
            $password = $_POST['password'];
                 $sql = mysqli_query($connect, "SELECT * FROM admin where admin_username = '$username' and password = '$password' ");
                 $row = mysqli_fetch_array($sql);
    
                if($row['status'] == 'Disabled'){
                    echo "<script>alert('Your account is disabled');</script>";
                }
    
                else if (mysqli_num_rows($result) === 1) {
                    $row = mysqli_fetch_assoc($result);
                    if ($row['admin_username'] === $uname && $row['password'] === $pass) {
                        $_SESSION['admin_username'] = $row['admin_username'];
                        header("Location: dashboard.php");
                        exit();
                    }
                    else{
                        header("Location: admin.php?error=Incorrect Username or password");
                        exit();
                    }
                }else{
                    header("Location: admin.php?error=Incorrect Username or password");
                    exit();
                }
            }
        }else{
            header("Location: admin.php");
            exit();
        }
    }

}
// function for admin.php end






// function for admin.php
function admin_data(){
    
    if(!isset($_SESSION['admin_username'])){
        header("Location: users_dashboard.php");
    }
}
// function for admin.php





// function for admins_data.php
function admin_insert(){
	global $connect;
	extract($_POST);
	if(isset($_POST['company'])  && isset($_POST['username']) 
	&& isset($_POST['email']) && isset($_POST['password'])){
    $sql = "INSERT INTO company_list (company, username, email, password) VALUES 
	('$company', '$username', '$email', '$password')";
    $result = mysqli_query($connect, $sql);

}
}
// function for admins_data.php end





// function for delete.php
function admin_delete(){

	global $connect;

	if(isset($_POST['deleteid'])){
	
		$userid       = $_POST['deleteid'];
		$delete_query = "DELETE FROM company_list WHERE id = '$userid' ";
		mysqli_query($connect, $delete_query);
	}

}
// function for delete.php end





// function for update.php
function admin_update(){

	global $connect;

    if(isset($_POST['updateid'])){
        $admin_id = $_POST['updateid'];


        $sql         = "SELECT * FROM `company_list` WHERE id = '$admin_id' ";
        $result      = mysqli_query($connect, $sql);

        $response    = array();
        while($row   = mysqli_fetch_assoc($result)){
        $response    = $row;
        }
        echo json_encode($response);
    }else {
        $response['status'] = 200;
        $response['message'] = "Invalid or data not found";
    }

    if(isset($_POST['hiddendata'])){
        $uniqueid       = $_POST['hiddendata'];
        $updatecompany  = $_POST['updatecompany'];
        $updateusername = $_POST['updateusername'];
        $updateemail    = $_POST['updateemail'];
        $updatepassword = $_POST['updatepassword'];


        $sql = "UPDATE `company_list` SET company = '$updatecompany', username 
		= '$updateusername', email = '$updateemail', password = '$updatepassword' WHERE id = '$uniqueid' ";

        $result = mysqli_query($connect, $sql);

    }	
}
// function for update.php end




// function for logout.php
function admin_logout(){
    session_start();
    session_destroy();
    header("Location: admin.php");
}
// function for logout.php end





// function for dashboard.php
function admin_dashboard(){
    global $connect;

    if(!isset($_SESSION['admin_username'])){
        header("Location: users_dashboard.php");
    }

    $sql = mysqli_query($connect, "SELECT * FROM admin");
    while ($row = mysqli_fetch_assoc($sql));
}
// function for dashboard.php end



// Active function 

function active(){
    global $connect;
    if(isset($_POST['active_id'])){
        $id = $_POST['active_id'];
        $sql = "UPDATE company_list SET `status`= 'Active' WHERE id = '$id' ";
        mysqli_query($connect, $sql);
    }
}

// Active function end





// Deactivate function
function deactivate(){
    global $connect;
    if(isset($_POST['deactive_id'])){
        $id = $_POST['deactive_id'];
        $sql = "UPDATE company_list SET `status`= 'Disabled' WHERE id = '$id' ";
        mysqli_query($connect, $sql);
    }

}
// Deactivate function end


?>






<?php

// INVENTORY DATA FUNCTIONS

@session_start();
@ob_start();
include '../connect/connection.php';


function delete_product(){
    global $connect;

	if(isset($_POST['deleteid'])){
	
		$userid       = $_POST['deleteid'];
		$delete_query = "DELETE FROM inventory WHERE id = '$userid' ";
		mysqli_query($connect, $delete_query);
	}

}


function export(){
    include 'connect/connection.php';

$sql = "SELECT * FROM inventory";
$query = $connect->query($sql);

if($query->num_rows > 0){
	$delimiter = ',';
	//create a download filename
	$filename  = 'inventory ' . date('Y-m-d') . ".csv";

	$f = fopen('php://memory', 'w');

	$headers = array('ID', 'PRODUCT NAME', 'PRODUCT PRICE', 'QUANTITY', 'CREATED', 'UPDATED'); 
	fputcsv($f, $headers, $delimiter);

	while($row = $query->fetch_array()){
		$lines = array($row['id'], $row['product_name'], $row['product_price'], $row['product_quantity'], $row['created_at'], $row['updated_at']);
		fputcsv($f, $lines, $delimiter);
	}

	fseek($f, 0);
	header('Content-Type: text/csv');
	header('Content-Disposition: attachment; filename="' . $filename . '";');
	fpassthru($f);
	exit;
}
else{
	$_SESSION['message'] = 'Cannot export. Data empty';
	header('location: data.php');
}

}



function product_insert(){
    global $connect;

extract($_POST);

if(isset($_POST['product_name'])  && isset($_POST['product_price']) && isset($_POST['product_quantity'])){

    $sql = "INSERT INTO `inventory` (product_name, product_price, product_quantity) VALUES ('$product_name', '$product_price', '$product_quantity')";

    $result = mysqli_query($connect, $sql);

}

}

function product_update(){

    global $connect;

    if(isset($_POST['updateid'])){
        $item = $_POST['updateid'];


        $sql = "SELECT * FROM `inventory` WHERE id = '$item' ";
        $result = mysqli_query($connect, $sql);

        $response = array();
        while($row = mysqli_fetch_assoc($result)){
            $response = $row;
        }
        echo json_encode($response);
    }else {
        $response['status'] = 200;
        $response['message'] = "Invalid or data not found";
    }



    if(isset($_POST['hiddendata'])){
        $uniqueid = $_POST['hiddendata'];
        $update_name = $_POST['update_name'];
        $update_price = $_POST['update_price'];
        $update_quantity = $_POST['update_quantity'];

        $sql = "UPDATE `inventory` SET product_name = '$update_name', product_price = 
        '$update_price', product_quantity = '$update_quantity' WHERE id = '$uniqueid' ";

        $result = mysqli_query($connect, $sql);

    }


}


?>