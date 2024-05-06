<?php
include_once 'functions/menu/offcanva-menu.php';
include_once 'functions/authentication.php';
include_once 'functions/tables/datatables.php'; 
if (isset($_SESSION['id'])) {
    $row = customer_info($_SESSION['id']);
    $fullname = $row['fullname'] ?? '';
    $address = $row['address'] ?? '';
    $phone = $row['phone'] ?? '';
}
?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Rental - MGARDEN</title>
    <meta name="description" content="MGARDEN M Garden Beach Resort's">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="icon" type="image/png" sizes="128x128" href="assets/img/icon.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/Nunito.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/Application-Form.css">
    <link rel="stylesheet" href="assets/css/Articles-Cards-images.css">
    <link rel="stylesheet" href="assets/css/bootstrap-select.min.css">
    <link rel="stylesheet" href="assets/css/Navbar-Centered-Links-icons.css">
</head>

<body id="page-top">
    <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
        <nav class="navbar navbar-light navbar-expand-md sticky-top navbar-shrink py-3" id="mainNav">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="/"><img src="assets/img/icon.png" width="32"><span> M Garden Beach Resort</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link active" href="dashboard.php">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="rent.php">Reservation List</a></li>
                    <li class="nav-item"><a class="nav-link" href="my-reservation-list.php">My Reservations</a></li>
                    <li class="nav-item"><a class="nav-link" href="transaction.php">My History</a></li>
                    <li class="nav-item"><a class="nav-link" href="my-account.php">My Account</a></li>
                </ul><a class="btn btn-primary" type="button" href="functions/logout.php">Sign Out</a>
            </div>
        </div>
    </nav>
    <div class="container py-4 py-xl-5"> <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Cottage Rental</h3>
                    </div>

                    <div class="row">
                        <div class="col">
                            <div class="d-sm-flex justify-content-between align-items-center mb-4">
                            <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" data-bs-target="#search" data-bs-toggle="modal"><i class="fas fa-user fa-sm text-white-50"></i>&nbsp;Check Cottage Available</a>
                                <!-- <a class="btn btn-primary btn-sm d-none d-sm-inline-block" role="button" href="#" data-bs-target="#add" data-bs-toggle="modal"><i class="fas fa-user fa-sm text-white-50"></i>&nbsp;Add Cottage</a> -->
                            </div>            
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col">
                                    <p class="text-success m-0 fw-bold">Cottage List</p>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-xl-3">
                                <?php 
                                    if (isset($_GET['start']) && isset($_GET['end'])) {
                                        cottage_available_list($_GET['start'], $_GET['end'], $_GET['type']); 
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                <hr>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <p class="text-success m-0 fw-bold">Cottage List</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                        <table class="table my-0 table-display" id="dataTable">
                                            <thead>
                                                <tr>
                                                    <th>Cottage</th>
                                                    <th>Start Date</th>
                                                    <th>End Date</th>
                                                    <th>Type</th>
                                                    <th class="text-center">Option</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php transaction_list(); ?>
                                            </tbody>
                                            <tfoot>
                                                <tr></tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © MGARDEN 2024</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
<?php menu(); ?>
    <div class="modal fade" role="dialog" tabindex="-1" id="select">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Select Customer</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/transaction-create.php" method="post">
                        <div class="mb-1"><label class="form-label">Customer</label><select class="selectpicker select" data-live-search="true" name="id">
                                <optgroup label="SELECT CUSTOMER">
                                    <?php customers(); ?>
                                </optgroup>
                            </select></div>
                    </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade needs-validation" role="dialog" tabindex="-1" id="add">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Cottage</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/transaction-add.php" method="post">
                        
                        <input type="hidden" name="id" class="form-control" value="<?=  $_SESSION['cottage_id']?> ">
                        <div class="mb-1">
                            <label class="form-label">TYPE</label>
                            <select class="form-select" name="type">
                                <optgroup label="SELECT TYPE">
                                    <option value="DAY" selected="">DAY</option>
                                    <option value="NIGHT">NIGHT</option>
                                    <option value="PACKAGE">PACKAGE</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="row">                        
                        <label class="form-label">PACKS</label>
                        <br>
                        <div class="col-md-6"><input type="number" class="form-control" id="inputKids" placeholder="Kid/s" required></div>
                        <div class="col-md-6"><input type="number" class="form-control" id="inputAdult" placeholder="Adult/s" required></div>
                        </div>
                        <div class="mb-1"><label class="form-label">Rental Date &amp; Time (start, end)</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6"><input class="form-control" name="start" required type="date" value="<?= $_GET['start']?>"/></div>
                                    <div class="col-md-6"><input class="form-control" name="end" required type="date" value="<?= $_GET['end']?>"/></div>
                                </div>
                            </div>
                        </div>
                        
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="update">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Update Cottage</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="functions/transaction-update.php" method="post">
                        <input type="hidden" name="id">
                        <div class="mb-1">
                            <label class="form-label">TYPE</label>
                            <select class="form-select" name="type">
                                <optgroup label="SELECT TYPE">
                                    <option value="DAY" selected="">DAY</option>
                                    <option value="NIGHT">NIGHT</option>
                                    <option value="PACKAGE">PACKAGE</option>
                                </optgroup>
                            </select>
                        </div>
                        <div class="mb-1"><label class="form-label">Rental Date &amp; Time (start, end)</label>
                            <div class="container">
                                <div class="row">
                                    <div class="col-md-6"><input class="form-control" name="start" required type="date" /></div>
                                    <div class="col-md-6"><input class="form-control" name="end" required type="date" /></div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="remove">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Remove Cottage</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to remove this Cottage?</p>
                </div>
                <form action="functions/transaction-remove.php" method="post">
                    <input type="hidden" name="id">
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-danger" type="submit">Remove</button></div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="cancel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Cancel</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to cancel this transaction?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-danger" type="button" href="functions/transaction-cancel.php">Cancel</a></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="proceed">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Proceed Transaction</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Are you sure you want to proceed this transaction?</p>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><a class="btn btn-primary" type="button" href="functions/transaction-proceed.php">Save</a></div>
            </div>
        </div>
    </div>
    <div class="modal fade" role="dialog" tabindex="-1" id="search">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Check Cottage Available</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form class="needs-validation" action="rent.php" method="get" novalidate>
                        <div class="mb-1"><label class="form-label">TYPE</label><select class="selectpicker select" data-live-search="true" name="type">
                            <optgroup label="SELECT TYPE">
                                <option value="NIPA">NIPA</option>
                                <option value="ROOM">ROOM</option>
                            </optgroup>
                        </select></div>
                        <div class="mb-1"><label class="form-label">Rental Date &amp; Time (start, end)</label>
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" name="start" required type="date" /></div>
                                <div class="col-md-6"><input class="form-control" name="end" required type="date" /></div>
                            </div>
                        </div>
                   
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="submit">Save</button></div>
                </form>
            </div>
        </div>
    </div>
 </div>
           



    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
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