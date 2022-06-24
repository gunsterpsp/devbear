<?php

include 'model.php';
admin_dashboard();

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <link href="css/bootstrap5.0.1.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/datatables-1.10.25.min.css" />
    <link rel="stylesheet" href="css/style.css">

    <title>Admin | Panel</title>
</head>
<body>


<!--Navigation Bar Start-->
<nav class="navbar navbar-light bg-warning fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Dashboard</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="offcanvas offcanvas-end bg-dark" style="width: 200px;" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><a href="logout.php" style="color: white;">Logout</a></h5>
        <button type="button" class="btn-close text-reset bg-light" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body">
        <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
          <li class="nav-item" style="border-bottom: 1px solid white;">
            <a class="nav-link active" aria-current="page" href="dashboard.php" style="color: white;">
            <i class="fa-solid fa-house"></i>  Home</a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid white;">
            <a class="nav-link active" aria-current="page" href="admins_data.php" style="color: white;"><i class="fa-solid fa-user"></i>  Admin Data</a>
          </li>
          <li class="nav-item" style="border-bottom: 1px solid white;">
            <a class="nav-link active" aria-current="page" href="inventory_data.php" style="color: white;"><i class="fa-solid fa-newspaper"></i>  Inventory Data</a>
          </li>
        </ul>
      </div>
    </div>
  </div>
</nav>

<!--Navigation Bar End-->


<script src="js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/fc205a3b1a.js" crossorigin="anonymous"></script>



</body>
</html>