<?php
include_once 'functions/menu/offcanva-menu.php';
include_once 'functions/authentication.php';
include_once 'functions/tables/datatables.php';

?>
<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Reports - MGARDEN</title>
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
            <nav class="navbar navbar-expand-md bg-body py-3 mb-5">
                <div class="container-fluid"><img src="assets/img/icon.png" width="32"><a class="navbar-brand d-flex align-items-center" href="#"><span>&nbsp; M Garden Beach Resort</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-2"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navcol-2">
                        <ul class="navbar-nav ms-auto"></ul><button class="btn btn-light ms-md-2" data-bs-toggle="offcanvas" data-bss-tooltip="" data-bs-placement="left" type="button" data-bs-target="#offcanvas-menu" title="Here you can see all the menu list of the site such as (Dashboard, Customers, Rents and etc.).">Menu</button>
                    </div>
                </div>
            </nav>
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Demand Analytics</h3>
                    </div>
                    <?php
// Read the interactive plot JSON data
$plot_json = file_get_contents('plot.json');

// Display the interactive plot using Plotly's JavaScript library
echo <<<HTML
<!DOCTYPE html>
<html>
<head>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
</head>
<body>
    <div id="plotly-chart"></div>
    <script>
        var plotlyData = $plot_json;
        Plotly.newPlot('plotly-chart', plotlyData.data, plotlyData.layout);
    </script>
</body>
</html>
HTML;
?><script>
var plotlyData = $plot_json;
Plotly.newPlot('plotly-chart', plotlyData.data, plotlyData.layout);

document.getElementById('plotly-chart').on('plotly_hover', function(data){
    var point = data.points[0];
    alert(`Month: ${point.x}<br>Sales: ${point.y}`);
});
</script>
                  
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
    <!-- <div class="modal fade" role="dialog" tabindex="-1" id="report">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Generate Report</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Select Datetime to generate report</p>
                    <form>
                        <div class="container">
                            <div class="row">
                                <div class="col-md-6"><input class="form-control" type="date" name="date_start"></div>
                                <div class="col-md-6"><input class="form-control" type="date" name="date_end"></div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer"><button class="btn btn-light" type="button" data-bs-dismiss="modal">Close</button><button class="btn btn-primary" type="button">Generate</button></div>
            </div>
        </div>
    </div> -->
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