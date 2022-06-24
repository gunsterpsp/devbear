

<?php
include 'model.php';
admin_login();
?>
<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Fonts -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
<link rel="stylesheet" href="css/style.css">


<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
<title>Login Form</title>
</head>
<body>

<!--Navbar Start-->

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
        <a class="navbar-brand" href="#">Login Form</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" 
        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" 
        aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="admin.php" style="font-weight:bold; 
                    color:black; text-decoration:underline">Admin Login</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!--Navbar End-->


<!--Main Login form-->
<center>
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header">Admin Login</div>
                        <div class="card-body">
                            <form action="" method="post" name="login">
                                <?php if (isset($_GET['error'])) { ?>
                                    <p class="error"><?php echo $_GET['error']; ?></p>
                                <?php } ?>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" name="admin_username" placeholder="Username">
                                </div>

                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                    </div>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                <div class="input-group center">
                                <button type="submit" class="btn btn-danger btn-round" name="login">Login</button>
                                </div><br>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</center>

<!--Main Login form ends-->



</body>
</html>

