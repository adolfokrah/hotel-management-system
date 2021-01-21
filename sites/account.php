<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Millenium Hotel - Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
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
<!-- Main wrapper - style you can find in pages.scss -->
<!-- ============================================================== -->
<div id="main-wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php  include '../assets/includes/header.php'?>
    <!-- ============================================================== -->
    <!-- End Topbar header -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php include '../assets/includes/sidebar.php'; ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html#">Settings</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Account </li>
                            </ol>
                        </nav>
                    </div>
                </div>
<!--                div for something to be placed at right top corner-->
                <div class="col-7 align-self-center">
                </div>
<!--                end of right top corner-->
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Sales chart -->
            <!-- ============================================================== -->
            <div class="row justify-content-md-center">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div class="col-md-12">
                                    <h4 class="card-title">Change Password</h4>
                                    <h5 class="card-subtitle">Enter Old and New Password to Change Account Password</h5>
                                    <hr>
                                    <form action="account" method="post" class="needs-validation"  oninput='r_newPass.setCustomValidity(r_newPass.value != newPass.value ? "Passwords do not match." : "");' novalidate>
                                        <div class="form-row">
                                            <div class="col-md-12 mb-12">
                                                <label for="validationCustom01">Old Password</label>
                                                <input type="password" class="form-control" id="validationCustom01" placeholder="Enter Old Password" name="oldPass" required>
                                                <div class="valid-feedback">
                                                    Looks good!
                                                </div>
                                                <div class="invalid-feedback">
                                                    Field is required!
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="col-12">
                                                <label for="validationCustom03">New Password</label>
                                                <input type="password" class="form-control" id="validationCustom03" placeholder="Enter New Password" name="newPass" required>
                                                <div class="invalid-feedback">
                                                    Passwords do not match!
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-row">
                                            <div class="col-12 mb-12">
                                                <label for="validationCustom03">Repeat Password</label>
                                                <input type="password" class="form-control" id="validationCustom03" placeholder="Repeat New Password" name="r_newPass" required>
                                                <div class="invalid-feedback">
                                                    Passwords do not match!
                                                </div>
                                            </div>
                                        </div>

                                        <button class="btn btn-primary float-right" name="submit" type="submit" style="margin-top: 20px;">Submit</button>
                                    </form>


                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- ============================================================== -->
            <!-- Recent comment and chats -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Millenium Hotel. Designed and Developed by <a href="https://perple.org">Perple</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->

<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- apps -->
<script src="../dist/js/app.min.js"></script>
<script src="../dist/js/app.init.light-sidebar.js"></script>
<script src="../dist/js/app-style-switcher.js"></script>
<!-- slimscrollbar scrollbar JavaScript -->
<script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
<script src="../assets/extra-libs/sparkline/sparkline.js"></script>
<!--Wave Effects -->
<script src="../dist/js/waves.js"></script>
<!--Menu sidebar -->
<script src="../dist/js/sidebarmenu.js"></script>
<!--Custom JavaScript -->
<script src="../dist/js/custom.min.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<!--c3 charts -->
<script src="../assets/extra-libs/c3/d3.min.js"></script>
<script src="../assets/extra-libs/c3/c3.min.js"></script>
<!--chartjs -->
<script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="../dist/js/pages/dashboards/dashboard1.js"></script>
<script>
    // Bootstrap form validation
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
</script>
</body>

</html>
<?php
$user = $_SESSION['username'];
//php code to run if bootstrap form validation is successful
//checking if the button submit button was clicked
if (isset($_POST['submit'])) {
    //checking if the request was a post request
    if ($_SERVER['REQUEST_METHOD'] != "POST") {
        //if not exit script
        exit();
    }else{
        //getting post values from form
        $pwd = mysqli_real_escape_string($conn,$_POST['newPass']);
        $oldPwd = mysqli_real_escape_string($conn,$_POST['oldPass']);
        $pwd = md5($pwd);
        $oldPwd = md5($oldPwd);

//checking if such account and password combination exist

        $sql = "SELECT * FROM admins WHERE username = '$user' and password = '$oldPwd'";
        $result = $conn ->query($sql);
        if (!$result) {
            die("Unexpected Error occurred");
        }
        if($result->num_rows < 1) {
            die("<script>
                    Swal.fire({
  icon: 'error',
  title: 'Error',
  text: 'Old Password Inaccurate!'
})
                </script>");
        }
        $sql = "UPDATE admins set password = '$pwd' where username = '$user'";

        $result = $conn->query($sql);
        if(!$result){
            die('An Unexpected Error Occurred');
        }
        echo "<script>
                    Swal.fire({
  icon: 'success',
  title: 'Success',
  text: 'Password Successfully Changed!'
}).then((result) => {
  if (result.value) {
    location.replace('logout');
  }
})
                </script>";

        $conn->close();


    }
}
