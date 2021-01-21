<?php
ob_start();
?>
<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Millennium Dashboard-Login</title>
	<link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- Custom CSS -->

    <link href="dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="alertifyjs/css/alertify.min.css" />
    <link rel="stylesheet" href="alertifyjs/css/themes/default.min.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body style="background: #dee6ee;">
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->

        <h2 class="font-medium m-b-20" style="position:absolute;top:14%; text-align:center; width:100%;height:100%;">MILLENIUM HOTEL (HMS)</h2>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center">

            <div class="auth-box" style="padding: 50px;">

                <div id="loginform">

                    <div class="logo">
<!--                        <span class="db"><img src="assets/images/logo-icon.png" alt="logo" /></span>-->
                        <h5 class="font-medium m-b-20">LOGIN TO YOUR DASHBOARD</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form class="form-horizontal m-t-20" id="loginform" action="index" method="POST">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input type="text" name="username" class="form-control form-control-lg" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
<!--                                            <a href="javascript:void(0)" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>-->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button class="btn btn-block btn-lg btn-info" name="submit" type="submit">Log In</button>
                                    </div>
                                </div>
<!--
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                        <div class="social">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10">
                                    <div class="col-sm-12 text-center">
                                        Don't have an account? <a href="authentication-register1.html" class="text-info m-l-5"><b>Sign Up</b></a>
                                    </div>
                                </div>
-->
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db"><img src="assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12" action="index.html">
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="email" required="" placeholder="Username">
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ==============================================================
    // Login and Recover Password
    // ==============================================================
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
    <script src="alertifyjs/alertify.min.js"></script>

</body>

</html>
<?php
 include('assets/includes/connect.php');
 //redirect user to dashboard if he/she has already log in
 if(isset($_SESSION['role']) || !empty($_SESSION['role'])) {
    header("Location: sites/dashboard");
}


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if (isset($_POST['submit'])) {
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        exit();
    } else {



        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['password']);
        $pwd = md5($pwd);
        if(empty($username || empty($pwd))) {
            echo ("<script>
    alertify.set('notifier','position', 'top-right');
        alertify.error('&#9888; All Input Fields Required');
    </script>");
    exit();
        }
        if (!isset($username) && !isset($pwd)) {
            header("Location:index");
            exit();
        } else {
            $sql = "SELECT * FROM admins where username = '$username' and password = '$pwd' and active = true ";
            $result = $conn->query($sql);
            if ($result->num_rows < 1) {
                echo ("<script>
    alertify.set('notifier','position', 'top-right');
        alertify.error('&#9888; Invalid Username/Password');
    </script>");
    exit();
            }else{
                $arr = array();
                $row = $result->fetch_assoc();
                $arr[] = $row;
                $_SESSION['user_id'] = $arr[0]['id'];
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $arr[0]['role'];
                $_SESSION['fullname'] = $arr[0]['firstname']." ".$arr[0]['lastname'];
                $_SESSION['email'] = $arr[0]['email'];
                // if($arr[0]['role'] == 'hotel'){
                //     header("Location: sites/new-booking");
                // }

                if($arr[0]['role'] == 'admin' || $arr[0]['role'] == 'manager' || $arr[0]['role'] == 'hotel'){
                  header("Location: sites/dashboard");
                }

                if( $arr[0]['role'] == 'bar'){
                    header("Location: sites/newsales");
                }

                if( $arr[0]['role'] == 'pool'){
                    header("Location: sites/pool-records");
                }
                exit();
            }
        }
    }
}
ob_end_flush();
?>
