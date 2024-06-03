<?php
session_start();
if (isset($_SESSION['username'])){
    header('Location: ./index.php');
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>MGARDEN</title>
    <meta name="description" content="MGARDEN M Garden Beach Resort's">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/css/Application-Form.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
</head>

<body>
    <nav class="navbar navbar-expand-md bg-body py-3 mb-5">
        <div class="container-fluid"><img src="assets/img/icon.png" width="5%"><a class="navbar-brand d-flex align-items-center" href="#"><span>&nbsp; M Garden Beach Resort</span></a><button data-bs-toggle="offcanvas" data-bs-target="#offcanvas-menu" class="navbar-toggler"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-2">
                <ul class="navbar-nav ms-auto"></ul><button class="btn btn-light ms-md-2" data-bs-toggle="offcanvas" data-bs-placement="left" type="button" title="Here you can see all the menu list of the site such as (Dashboard, Customers, Rents and etc.)."><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            </div>
        </div>
    </nav>
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2>Create an Account</h2>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary">
    <img src="assets\img\icons\login.gif" width="100px" alt="">
</div>
<form class="needs-validation" method="post" action="functions/newcustomer.php" novalidate>
<div class="mb-1"><label class="form-label"></label><input class="form-control" type="text" placeholder="Fullname" name="fullname" pattern="^(?![\s.]).*$" required="">
                        <div class="invalid-feedback">
                            Please enter your fullname.
                        </div>
                    </div>
<div class="mb-1"><label class="form-label"></label><input class="form-control" type="text" placeholder="Username" name="username" pattern="^(?![\s.]).*$" required="">
                        <div class="invalid-feedback">
                            Please enter your username.
                        </div>
                    </div>
                        <div class="mb-1"><label class="form-label"></label><input class="form-control" type="password" placeholder="Password" name="password" pattern="^(?![\s.]).*$" required="">
                        <div class="invalid-feedback">
                            Please enter your password.
                        </div>
                    </div>
                        <div class="mb-1"><label class="form-label"></label><input class="form-control" type="text" placeholder="Address" name="address" pattern="^(?![\s.]).*$" required="">
                        <div class="invalid-feedback">
                            Please enter your address.
                        </div>
                    </div>
                        <div class="mb-1"><label class="form-label"></label><input class="form-control" type="text" placeholder="Phone" name="phone" pattern="[0-9]+" minlength="11" maxlength="11" required="">
                        <div class="invalid-feedback">
                            Please enter your phone number.
                        </div>
                        <br>
                    </div>

    <button class="btn btn-primary d-block w-100 mb-3" type="submit">Create Account</button>

    <p>Already have an account? <a href="login.php" class="btn btn-link btn-sm">Login</a></p>
</form> <p>By clicking create account, you agree with MGARDEN Beach & Resort's<button type="button" class="btn btn-link" data-bs-toggle="modal" data-bs-target="#exampleModal">Privacy Policy</button></p>
<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel">Privacy Policy</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 <?php include_once 'privacy.php';?>      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
            

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bootstrap-select.min.js"></script>
    <script src="assets/js/datatables.min.js"></script>
    <script src="assets/js/pdfmake.min.js"></script>
    <script src="assets/js/vfs_fonts.js"></script>
    <script src="assets/js/jszip.min.js"></script>
    <script src="assets/js/theme.js"></script>
    <script src="assets/js/buttons.print.min.js"></script>
    <script src="assets/js/buttons.html5.min.js"></script>
    <script src="assets/js/sweetalert2.all.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/index.global.min.js"></script>
    <script src="assets/js/tinymce.min.js"></script>
</body>

</html>