<?php

include 'model.php';
admin_data();

$_SESSION['admin_username'] = true;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--CSS, Fontawesome, DataTables, Jquery, Bootstrap Links-->
    <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--JavaScript Links-->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/fc205a3b1a.js" crossorigin="anonymous"></script>
    <script src="js/inventory.js"></script>


    <title>Admin | Panel</title>
</head>
<body>


<!--Navigation Bar Start-->
<nav class="navbar navbar-light bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" 
    aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-dark" style="width: 200px;" tabindex="-1" id="offcanvasNavbar" 
    aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a href="logout.php" style="color: white;">Logout</a></h5>
        <button type="button" class="btn-close text-reset bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
      <p style="color: white;">Admin</p>
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item" style="border-bottom: 1px solid white;">
            <a class="nav-link active" aria-current="page" href="dashboard.php" style="color: white;">
            <i class="fa-solid fa-house"></i>  Home</a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid white;">
            <a class="nav-link active" aria-current="page" href="admins_data.php" style="color: white;">
            <i class="fa-solid fa-user"></i>  User's Data</a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid white;">
            <a class="nav-link active" aria-current="page" href="inventory_data.php" style="color: white;">
            <i class="fa-solid fa-user"></i>  Inventory Data</a>
          </li>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!--Navigation Bar End-->

<br><br><br>
<div class="container">
          <div class="row">
            <div class="col-md-12">
                  <div class="table-responsive">
                  <div class="mb-2" id="btnRight">
                  <button type="submit" id="btnCreate" class="btn btn-success" data-bs-toggle="modal" 
                  data-bs-target="#createModal">Add user</button>
                  <a href="export.php" style="float: right; margin-right: 1em;" class="btn btn-success"><i class="fa-solid fa-file-csv"></i>  Export to CSV</a>
                  </div>
                  <table id="example" class="display text-center" style="width:100%;">
                      <thead class="bg-dark text-center">
                          <tr style="color: white;">
                              <th class="text-center">Id</th>
                              <th class="text-center">Product Name</th>
                              <th class="text-center">Product Price</th>
                              <th class="text-center">Product Quantity</th>
                              <th class="text-center">Date Created</th>
                              <th class="text-center">Date Updated</th>
                              <th class="text-center">Options</th>
                          </tr>
                      </thead>
                  </table>
                </div>
            </div>
          </div>
      </div>


<!-- INSERT Modal -->
<div class="modal fade" id="createModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Add Product Item</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        

      <form id="form">
      <div class="mb-2 form-group">
        <input type="text" class="form-control" id="product_name"  placeholder="Product Name">
    </div>

    <div class="mb-2 form-group">
        <input type="text" class="form-control" id="product_price"  placeholder="Product Price">
    </div>

    <div class="mb-2 form-group">
        <input type="text" class="form-control" id="product_quantity"  placeholder="Quantity">
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-dark" onclick="addUser()">Create</button>
      </div>
      </form>
      </div>
    </div>
  </div>
</div>

<!-- INSERT Modal end -->

<!-- Update Modal -->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update Product Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

     
      <div class="mb-2 form-group">
        <input type="text" class="form-control" id="update_name"  placeholder="Product Name">
    </div>

    <div class="mb-2 form-group">
        <input type="text" class="form-control" id="update_price"  placeholder="Product Price">
    </div>

    <div class="mb-2 form-group">
        <input type="text" class="form-control" id="update_quantity"  placeholder="Quantity">
    </div>

      </div>
      <div class="modal-footer">
        <button type="button" onclick="UpdateDetails()" class="btn btn-dark">Update</button>
        <input type="hidden" id="hiddendata">
      </div>

      </div>
    </div>
  </div>
</div>



</body>
</html>