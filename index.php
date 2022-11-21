<?php 
include('functions.php');
/**************** DB CONNECTION */
$con = mysqli_connect("localhost","root","a13n1i14","dron");

if(!$con){
    echo mysqli_connect_error();
    die();
} 


/****************** SESSION START */
session_start();

//NOT LOGGED IN
if(!isset($_SESSION['id']) && (!isset($_SESSION['username']))) {

    //get post
    if (!empty($_POST)) {
        /*foreach($_POST as $key => $value) {
            echo "$key = $value <br/>";
        }*/

        //save to session
        $query = "SELECT * FROM users WHERE username='{$_POST['username']}' && password='{$_POST['password']}' ";
        $result = $con -> query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc())
            {
                echo $row['userID'] . " " .$row['username'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['id'] = $row['userID'];
                header("Location: ?pg=home");
                die();
            }
        } else {
            echo"nothing";
        }
    }

    //LOGIN FORM
    include("login.php");

} else {

    
/**************** GET CONTENT */
$query = "SELECT * FROM users";
$result = $con -> query($query);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc())
    {
        $users[] = $row;
    }
}

/**************** GET PAGE */
if (empty($_GET)) {
    $page = "home"; //default
} else {
    $page = $_GET['pg'];
}

//***************HTML CODE HERE */
echo <<<INT
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Envio</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="/" class="navbar-brand mx-4 mb-3">
                    <img class="w-100" src="img/logo.png" alt=""/>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.png" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{$_SESSION['username']}</h6>
                        <span></span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="index.html" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Inicio</a>
                    <div class="nav-item dropdown">
                        <a href="?pg=reservas" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-calendar me-2"></i>Reservas</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="?pg=reservas&estado=agendadas" class="dropdown-item">Agendadas</a>
                            <a href="?pg=reservas&estado=completadas" class="dropdown-item">Completadas</a>
                            <a href="?pg=reservas&estado=canceladas" class="dropdown-item">Canceladas</a>
                        </div>
                    </div>
                    <a href="?pg=inventario" class="nav-item nav-link"><i class="fa fa-laptop me-2"></i>Monitoreo</a>
                    
                    <div>
                        <button type="button" class="btn btn-lg btn-primary m-2 w-100" onClick="parent.location='?pg=nuevareserva'">Nueva reserva</button>
                    </div>

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0"></h6>
                        <a href="?pg=logout">Logout</a>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
INT;


/**************  INCLUDE PAGE */
if (file_exists($page.".php")){
    include($page.".php");
} else {
    echo "404";
}

echo <<<INT
            <!-- Footer Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded-top p-4">
                    <div class="row">
                        <div class="col-12 col-sm-6 text-center text-sm-start">
                            &copy; Envio @2022. 
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer End -->

        </div>
        <!-- Content End -->

                <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>



INT;
} 

?>