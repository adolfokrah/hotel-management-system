<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
if (!isset($_GET['start']) || !isset($_GET['end'])) {
    $start = date('Y-m-d');
    $end = date('Y-m-d');
} else {
    $start = $_GET['start'];
    $end = $_GET['end'];
} ?>
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
    <title>Millennium Hotel - Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <link href="../assets/libs/morris.js/morris.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" integrity="sha256-+N4/V/SbAFiW1MPBCXnfnP9QSN3+Keu+NlB+0ev/YKQ=" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        .ti-receipt:hover {
            color: #7460EE;
            cursor: pointer;
        }
        #close:hover {
          cursor: pointer;
          color: #000;
        }
    </style>
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
    <?php include '../assets/includes/sidebar.php';
    $username = '';
    if(isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_SESSION['role']) && !empty($_SESSION['role'])){
        $username = $_SESSION['username'];

        if($_SESSION['role'] == 'hotel'){
            header("Location: sites/new-booking");
        }

        if($_SESSION['role'] == 'bar'){
            header("Location: sites/newsales");
        }

        if($_SESSION['role'] == 'pool'){
            header("Location: sites/pool-records");
        }



        if($_SESSION['role'] == 'manager'){
          echo '<script>window.open("newsales","_self")</script>';
        }
    }

    ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- End Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page wrapper  -->
    <!-- ============================================================== -->
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Temp - Earnings -->
        <!-- ============================================================== -->
        <div class="card gredient-info-bg m-t-0 m-b-0">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <h4 class="card-title text-white">Welcome <?php echo $username; ?></h4>
                        <h5 class="card-subtitle text-white op-5">Dashboard</h5>
                    </div>
                    <div class="col-md-4 offset-md-4">

                    </div>
                </div>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" hidden></button>

                <!-- Details Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th>Name</th>
                                            <th>Quantity</th>
                                            <th>Subtotal</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody id="modal-table"></tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <div id="spin"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DETAILS MODAL -->




                <!-- START DRINKS SHORTAGE MODAL -->
                <div class="modal fade" id="limitModal" tabindex="-1" role="dialog" aria-labelledby="limitModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="limitModalLabel">Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="table-responsive">
                                    <table class="table table-borderless table-striped">
                                        <thead class="table-secondary">
                                        <tr>
                                            <th>Name</th>
                                            <th>Qty Remaining</th>
                                        </tr>
                                        </thead>
                                        <tbody><?php
                                        $limit_exceed = $conn->query("SELECT * FROM `bar_products` WHERE quantity <= limit_alert");
                                        if (!$limit_exceed) {
                                            die($conn->error);
                                        }
                                        while ($drink_shortage = $limit_exceed->fetch_assoc()) {
                                            echo "<tr><td>".$drink_shortage['product_name']."</td><td>".$drink_shortage['quantity']."</td></tr>";
                                        }

                                         ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END DRINKS SHORTAGE MODAL -->







                <div class="row m-t-30 m-b-20">
                    <!-- col -->
                    <div class="col-sm-12 col-lg-4">
                      <ul class="search-box">
                          <li><span class="mdi mdi-calendar"></span></li>
                          <li style="width:90%"><input type="text" style="border-width:0px; width:100%;" id="date" placeholder="Date Range" />
                          </li>
                      </ul>

                    </div>
                    <!-- col -->
                    <div class="col-sm-12 col-lg-8">
                        <div class="row">
                            <!-- col -->
                            <div class="col-sm-12 col-md-4">
                                <div class="info d-flex align-items-center">
                                    <div class="m-r-10">
                                        <i class="fa fa-money-check-alt text-white display-5 op-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white m-b-0">&#8373;<?php
                                            $total_sales = $conn->query("SELECT SUM(subtotal) AS total_sales FROM bar_sales WHERE DATE(date_time) BETWEEN '$start' and '$end'");
                                            if(!$total_sales) {
                                                die($conn->error);
                                            }
                                            $row = $total_sales->fetch_assoc();
                                            $total_sales = $row['total_sales'];
                                            $total_sales = floatval($total_sales);
                                            echo number_format($total_sales,2);
                                            ?></h3>
                                        <span class="text-white op-5">Total Sales</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <!-- col -->
                            <div class="col-sm-12 col-md-4">
                                <div class="info d-flex align-items-center">
                                    <div class="m-r-10">
                                        <i class="fa fa-wine-bottle text-white display-5 op-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white m-b-0"><?php $total_qty = $conn->query("SELECT SUM(quantity) AS total_qty FROM bar_sales WHERE DATE(date_time) BETWEEN '$start' and '$end'");
                                            if(!$total_qty) {
                                                die($conn->error);
                                            }
                                            $row = $total_qty->fetch_assoc();
                                            $total_qty = $row['total_qty'];
                                            $total_qty = floatval($total_qty);
                                            echo number_format($total_qty);?></h3>
                                        <span class="text-white op-5">Total Quantity Sold</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <!-- col -->
                            <div class="col-sm-12 col-md-4">
                                <div class="info d-flex align-items-center">
                                    <div class="m-r-10">
                                        <i class="ti ti-stats-up text-white display-5 op-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white m-b-0">&#8373;<?php
                                            // $_start = new DateTime($start);
                                            // $_end = new DateTime($end);
                                            // $diff = $_end->diff($_start)->format("%a");
                                            // $diff = ($diff == 0) ? 1 : $diff ;
                                            // $avg_sales = $total_sales/$diff;
                                            // echo number_format($avg_sales,2);
                                            $total_profit = $conn->query("SELECT SUM(profit) AS total_profit FROM bar_sales WHERE DATE(date_time) BETWEEN '$start' and '$end'");
                                                if(!$total_profit) {
                                                    die($conn->error);
                                                }
                                                $row = $total_profit->fetch_assoc();
                                                $total_profit = $row['total_profit'];
                                                $total_profit = floatval($total_profit);
                                                echo number_format($total_profit);
                                            ?></h3>
                                        <span class="text-white op-5">Profit</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                </div>














                <div class="row m-t-30 m-b-20">
                    <!-- col -->
                    <div class="col-sm-12 col-lg-4">
                      <div class="temp d-flex align-items-center flex-row">
                          <div class="display-5 text-white"><i class="icon  icon-clock"></i> <span id="time"></span></div>
                          <div class="m-l-10">
                              <h3 class="m-b-0 text-white"><?php echo date('l') ?></h3><small class="text-white op-5"><?php echo date('d M, Y')?></small>
                          </div>
                      </div>
                    </div>
                    <!-- col -->
                    <div class="col-sm-12 col-lg-8">
                        <div class="row">
                            <!-- col -->
                            <div class="col-sm-12 col-md-4">
                                <div class="info d-flex align-items-center">
                                    <div class="m-r-10">
                                        <i class="mdi mdi-arrow-up text-white display-5 op-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white m-b-0"><?php
                                            $total_inc = $conn->query("SELECT SUM(figure) AS fig FROM bar_operations_history WHERE DATE(date) BETWEEN '$start' and '$end' and detail_type = 'quantity' and action = 'increased'");
                                            if(!$total_inc) {
                                                die($conn->error);
                                            }
                                            $row = $total_inc->fetch_assoc();
                                            $total_inc = $row['fig'];
                                            $total_inc = floatval($total_inc);
                                            echo number_format($total_inc);
                                            ?></h3>
                                        <span class="text-white op-5">Total Increment</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <!-- col -->
                            <div class="col-sm-12 col-md-4">
                                <div class="info d-flex align-items-center">
                                    <div class="m-r-10">
                                        <i class="mdi mdi-arrow-down text-white display-5 op-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white m-b-0"><?php
                                        $total_dec = $conn->query("SELECT SUM(figure) AS fig FROM bar_operations_history WHERE DATE(date) BETWEEN '$start' and '$end' and detail_type = 'quantity' and action = 'decreased'");
                                        if(!$total_dec) {
                                            die($conn->error);
                                        }
                                        $row = $total_dec->fetch_assoc();
                                        $total_dec = $row['fig'];
                                        $total_dec = floatval($total_dec);
                                        echo number_format($total_dec);?></h3>
                                        <span class="text-white op-5">Total Decrement</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                            <!-- col -->
                            <div class="col-sm-12 col-md-4">
                                <div class="info d-flex align-items-center">
                                    <div class="m-r-10">
                                        <i class="ti ti-close text-white display-5 op-5"></i>
                                    </div>
                                    <div>
                                        <h3 class="text-white m-b-0"><?php
                                          $total_del = $conn->query("SELECT SUM(quantity) AS quantity FROM bar_history WHERE action = 'deletion' and DATE(date) BETWEEN '$start' and '$end'");
                                          if (!$total_del) {
                                            die($conn->error);
                                          }
                                          $row = $total_del->fetch_assoc();
                                          $total_del = $row['quantity'];
                                          $total_del = floatval($total_del);
                                            echo number_format($total_del);
                                            ?></h3>
                                        <span class="text-white op-5">Total Deleted</span>
                                    </div>
                                </div>
                            </div>
                            <!-- col -->
                        </div>
                    </div>
                </div>



            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <!-- ============================================================== -->
            <!-- Devices - Income - Sales -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Projects of the month -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Table -->
            <!-- ============================================================== -->
            <div class="row">
              <div class="col-lg-12">
                <?php
                $limit_exceed = $conn->query("SELECT * FROM `bar_products` WHERE quantity <= limit_alert");
                if (!$limit_exceed) {
                    die($conn->error);
                }
                if ($limit_exceed ->num_rows >= 1) {
                  echo '<div class="alert alert-danger">
            <i class="fa fa-exclamation-trianle"></i>
            Some drinks are running low in the Inventory. <a href="javascript:void(0)"  data-toggle="modal" data-target="#limitModal" role="alert">Click here</a><i class="fa fa-times float-right text-secondary" id="close"></i> to see them!
          </div>';
                }

                 ?>
              </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-md-flex align-items-center">
                                <div class="col-12" style="padding:15px;">
                                    <h4 class="card-title">Inventory Management and sales Summary <span></span></h4>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table no-wrap v-middle">
                                    <thead>
                                    <tr class="border-0">
                                        <th class="border-0">User</th>
                                        <th class="border-0">New</th>
                                        <th class="border-0">Stock Deleted</th>
                                        <th class="border-0">Stock Increase</th>
                                        <th class="border-0">Stock Decrease</th>
                                        <th class="border-0">Sales Made</th>
<!--                                        <th class="border-0">Quantity Sold</th>-->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $get_users = $conn->query("SELECT * FROM admins WHERE (role = 'admin' or role = 'bar') and deleted = false");
                                    if (!$get_users) {
                                        die($conn->error);
                                    }
                                    while ($row = $get_users->fetch_assoc()) {
                                        $users_array[] = $row;
                                    }
                                    //looping through users to fetch their activities
                                    foreach ($users_array as $user) {
                                        $fullname = $user['firstname']." ".$user['lastname'];
                                        //getting stock new added and worth
                                        $get_new = $conn->query("SELECT SUM(quantity) AS quantity, SUM(worth) AS worth FROM bar_history WHERE user = '$fullname' and DATE(date) BETWEEN '$start' and '$end' and action = 'insertion'");
                                        if (!$get_new) {
                                            die($conn->error);
                                        }
                                        $row = $get_new->fetch_assoc();
                                        $new_qty = $row['quantity'];
                                        $new_worth = $row['worth'];
                                        if (is_null($new_qty)){
                                            $new_qty = 0;
                                        }
                                        if (is_null($new_worth)){
                                            $new_worth = 0;
                                        }
                                        //getting stock deleted and worth
                                        $get_del = $conn->query("SELECT SUM(quantity) AS del_qty, SUM(worth) AS del_worth FROM bar_history WHERE user = '$fullname' and DATE(date) BETWEEN '$start' and '$end' and action = 'deletion'");
                                        if (!$get_del) {
                                            die($conn->error);
                                        }
                                        $row = $get_del->fetch_assoc();
                                        $del_qty = $row['del_qty'];
                                        $del_worth = $row['del_worth'];
                                        //getting stock increased and worth
                                        $get_inc = $conn->query("SELECT SUM(figure) AS increase, SUM(action_worth) AS inc_worth FROM bar_operations_history WHERE DATE(date) BETWEEN '$start' and '$end' and user = '$fullname' and action = 'increased' and detail_type = 'quantity'");
                                        if (!$get_inc) {
                                            die($conn->error);
                                        }
                                        $row = $get_inc->fetch_assoc();
                                        $inc = $row['increase'];
                                        $inc_worth = $row['inc_worth'];
                                        //getting decrease
                                        $get_dec = $conn->query("SELECT SUM(figure) AS decrease, SUM(action_worth) AS dec_worth FROM bar_operations_history WHERE DATE(date) BETWEEN '$start' and '$end' and user = '$fullname' and action = 'decreased' and detail_type = 'quantity'");
                                        if (!$get_dec) {
                                            die($conn->error);
                                        }
                                        $row = $get_dec->fetch_assoc();
                                        $dec = $row['decrease'];
                                        $dec_worth = $row['dec_worth'];

                                        //getting sales made
                                        $get_sales = $conn->query("SELECT SUM(quantity) AS sales_qty, SUM(subtotal) AS sales_worth FROM bar_sales WHERE DATE(date_time) BETWEEN '$start' and '$end' and user = '$fullname' and quantity != 0");
                                        if (!$get_sales) {
                                            die($conn->error);
                                        }
                                        $row = $get_sales->fetch_assoc();
                                        $sales_qty = $row['sales_qty'];
                                        $sales_worth = $row['sales_worth'];
                                        echo "<tr>
                                                <td>".$fullname."</td>
                                                <td>&#8373;".number_format($new_worth,2)." (".number_format($new_qty)."pcs) "."<i id=\"$fullname\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-tippy-content=\"View Details\" onclick=\"fetch_details(this.id,'new')\" class='ti ti-receipt float-right'></i></td>
                                                <td>&#8373;".number_format($del_worth,2)." (".number_format($del_qty)."pcs) "."<i id=\"$fullname\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-tippy-content=\"View Details\" onclick=\"fetch_details(this.id,'del')\"  class='ti ti-receipt float-right'></i></td>
                                                <td>&#8373;".number_format($inc_worth,2)." (".number_format($inc)."pcs) "."<i id=\"$fullname\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-tippy-content=\"View Details\" onclick=\"fetch_details(this.id,'inc')\"  class='ti ti-receipt float-right'></i></td>
                                                <td>&#8373;".number_format($dec_worth,2)." (".number_format($dec)."pcs) "."<i id=\"$fullname\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-tippy-content=\"View Details\" onclick=\"fetch_details(this.id,'dec')\"  class='ti ti-receipt float-right'></i></td>
                                                <td>&#8373;".number_format($sales_worth,2)." (".number_format($sales_qty)."pcs) "."<i id=\"$fullname\" data-toggle=\"modal\" data-target=\"#exampleModal\" data-tippy-content=\"View Details\" onclick=\"fetch_details(this.id,'sale')\"  class='ti ti-receipt float-right'></i></td>
                                              </tr>";

                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="row">
              <!-- NEW STOCK ADDED TABLE COLUMN -->
              <div class="col-md-12"  style="padding:15px;">
              <div class="card"  style="padding:15px;">
                <div class="card-title">
                  <div class="row">
                    <div class="col-lg-6">
                    <h5><i class="mdi mdi-barcode-scan text-success float-left" style="font-size:18px;margin-right:5px;"></i>Additions</h5>
                    </div>
                    <div class="col-lg-6">
                      <button type="button" name="button" class="btn btn-info float-right" onclick="exportTableToExcel('additions','additions')">Export to Excel</button>
                    </div>

                  </div>

                </div>
                  <div class="table-responsive">
                    <table class="table table-striped" id="additions">
                      <thead class="table-success">
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Qty Added</th>
                          <th>Price</th>
                          <th>Total Worth</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $additions = $conn->query("SELECT * FROM bar_history WHERE action = 'insertion' and DATE(date) BETWEEN '$start' and '$end'");
                          if (!$additions) {
                            die($conn->error);
                          }
                          if ($additions->num_rows < 1) {
                            echo"<tr><td colspan='6'class='text-center'>No data Available</td></tr>";
                          }
                          while ($row = $additions->fetch_assoc()) {
                            $date = $row['date'];
                            // $date = new DateTime($date);
                            $date = date('D F d Y H:i:s', strtotime($date));
                            echo "<tr>
                                    <td>".$row['user']."</td>
                                    <td>".$row['item']."</td>
                                    <td>".$row['quantity']."</td>
                                    <td>".$row['price']."</td>
                                    <td>".$row['worth']."</td>
                                    <td>".$date."</td>
                                  </tr>";
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- END OF NEW STOCK ADDED TABLE COLUMN -->



              <!-- NEW STOCK DELETED TABLE COLUMN -->
              <div class="col-md-12"  style="padding:15px;">
              <div class="card"  style="padding:15px;">
                <div class="card-title">
                  <div class="row">
                    <div class="col-lg-6">
                      <h5><i class="icon ion-md-close text-danger float-left" style="font-size:19px;margin-right:5px;"></i>Deletions</h5>
                    </div>
                    <div class="col-lg-6">
                      <button type="button" name="button" class="btn btn-info float-right" onclick="exportTableToExcel('deletions','deletions')">Export to Excel</button>
                    </div>
                  </div>

                </div>
                  <div class="table-responsive">
                    <table class="table table-striped" id="deletions">
                      <thead class="table-danger">
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Qty Deleted</th>
                          <th>Total Worth</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $deletions = $conn->query("SELECT * FROM bar_history WHERE action = 'deletion' and DATE(date) BETWEEN '$start' and '$end'");
                          if (!$deletions) {
                            die($conn->error);
                          }
                          if ($deletions->num_rows < 1) {
                            echo"<tr><td colspan='5'class='text-center'>No data Available</td></tr>";
                          }
                          while ($row = $deletions->fetch_assoc()) {
                            $date = $row['date'];
                            // $date = new DateTime($date);
                            $date = date('D F d Y H:i:s', strtotime($date));
                            echo "<tr>
                                    <td>".$row['user']."</td>
                                    <td>".$row['item']."</td>
                                    <td>".$row['quantity']."</td>
                                    <td>".$row['worth']."</td>
                                    <td>".$date."</td>
                                  </tr>";
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- END OF NEW STOCK DELETED TABLE COLUMN -->



              <!-- STOCK INCREASED TABLE COLUMN -->
              <div class="col-md-12"  style="padding:15px;">
              <div class="card"  style="padding:15px;">
                <div class="card-title">
                  <div class="row">
                    <div class="col-lg-6">
                      <h5><i class="mdi mdi-arrow-up text-info float-left" style="font-size:18px;margin-right:5px;"></i>Increased</h5>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" name="button" class="btn btn-info float-right" onclick="exportTableToExcel('increased','increased')">Export to Excel</button>
                    </div>
                  </div>

                </div>
                  <div class="table-responsive">
                    <table class="table table-striped"id="increased">
                      <thead class="table-info">
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Initial Qty</th>
                          <th>Increment</th>
                          <th>New Qty</th>
                          <th>Total Worth</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $increased = $conn->query("SELECT * FROM bar_operations_history WHERE action = 'increased' and detail_type = 'quantity' and DATE(date) BETWEEN '$start' and '$end'");
                          if (!$increased) {
                            die($conn->error);
                          }
                          if ($increased->num_rows < 1) {
                            echo"<tr><td colspan='7'class='text-center'>No data Available</td></tr>";
                          }
                          while ($row = $increased->fetch_assoc()) {
                            $date = $row['date'];
                            // $date = new DateTime($date);
                            $date = date('D F d Y H:i:s', strtotime($date));
                            echo "<tr>
                                    <td>".$row['user']."</td>
                                    <td>".$row['item']."</td>
                                    <td>".$row['initial']."</td>
                                    <td>".$row['figure']."</td>
                                    <td>".$row['new_fig']."</td>
                                    <td>".$row['worth']."</td>
                                    <td>".$date."</td>
                                  </tr>";
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- END OF STOCK INCREASED TABLE COLUMN -->



              <!-- STOCK DECREASED TABLE COLUMN -->
              <div class="col-md-12"  style="padding:15px;">
              <div class="card"  style="padding:15px;">
                <div class="card-title">
                  <div class="row">
                    <div class="col-lg-6">
                      <h5><i class="mdi mdi-arrow-down text-warning float-left" style="font-size:18px;margin-right:5px;"></i>Decreased</h5>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" name="button" class="btn btn-info float-right" onclick="exportTableToExcel('decreased','decreased')">Export to Excel</button>
                    </div>
                  </div>
                </div>
                  <div class="table-responsive">
                    <table class="table table-striped" id="decreased">
                      <thead class="table-warning">
                        <tr>
                          <th>User</th>
                          <th>Product</th>
                          <th>Initial Qty</th>
                          <th>decrement</th>
                          <th>New Qty</th>
                          <th>Total Worth</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $decreased = $conn->query("SELECT * FROM bar_operations_history WHERE action = 'decreased' and detail_type = 'quantity' and DATE(date) BETWEEN '$start' and '$end'");
                          if (!$decreased) {
                            die($conn->error);
                          }
                          if ($decreased->num_rows < 1) {
                            echo"<tr><td colspan='7'class='text-center'>No data Available</td></tr>";
                          }
                          while ($row = $decreased->fetch_assoc()) {
                            $date = $row['date'];
                            // $date = new DateTime($date);
                            $date = date('D F d Y H:i:s', strtotime($date));
                            echo "<tr>
                                    <td>".$row['user']."</td>
                                    <td>".$row['item']."</td>
                                    <td>".$row['initial']."</td>
                                    <td>".$row['figure']."</td>
                                    <td>".$row['new_fig']."</td>
                                    <td>".$row['worth']."</td>
                                    <td>".$date."</td>
                                  </tr>";
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- END OF STOCK DECREASED TABLE COLUMN -->




              <!-- SALES MADE TABLE COLUMN -->
              <div class="col-md-12"  style="padding:15px;">
              <div class="card"  style="padding:15px;">
                <div class="card-title">
                  <div class="row">
                    <div class="col-lg-6">
                      <h5><i class="fa fa-money-check-alt text-primary float-left" style="margin-right:5px; font-size:18px;"></i>Sales</h5>
                    </div>
                    <div class="col-lg-6">
                        <button type="button" name="button" class="btn btn-info float-right" onclick="exportTableToExcel('sold','sales')">Export to Excel</button>
                    </div>
                  </div>

                </div>
                  <div class="table-responsive">
                    <table class="table table-striped" id="sold">
                      <thead class="table-primary">
                        <tr>
                          <th>User</th>
                          <th>Batch Id</th>
                          <th>Product</th>
                          <th>Price</th>
                          <th>Qty</th>
                          <th>Total Cost</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $sales = $conn->query("SELECT * FROM bar_sales WHERE DATE(date_time) BETWEEN '$start' and '$end' and quantity != 0");
                          if (!$sales) {
                            die($conn->error);
                          }
                          if ($sales->num_rows < 1) {
                            echo"<tr><td colspan='7'class='text-center'>No data Available</td></tr>";
                          }
                          while ($row = $sales->fetch_assoc()) {
                            $date = $row['date_time'];
                            // $date = new DateTime($date);
                            $date = date('D F d Y H:i:s', strtotime($date));
                            echo "<tr>
                                    <td>".$row['user']."</td>
                                    <td>".$row['batch_id']."</td>
                                    <td>".$row['product_name']."</td>
                                    <td>".$row['price_per_item']."</td>
                                    <td>".$row['quantity']."</td>
                                    <td>".$row['subtotal']."</td>
                                    <td>".$date."</td>
                                  </tr>";
                          }
                         ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

              <!-- END OF SALES MADE TABLE COLUMN -->



            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Container fluid  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <footer class="footer text-center">
            All Rights Reserved by Millennium Hotel. Designed and Developed by <a href="https://perple.org">perple</a>.
        </footer>
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page wrapper  -->
    <!-- ============================================================== -->
</div>

<div class="chat-windows"></div>
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
<script src="../assets/libs/chartist/dist/chartist.min.js"></script>
<script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
<script src="../assets/extra-libs/c3/d3.min.js"></script>
<script src="../assets/extra-libs/c3/c3.min.js"></script>
<script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="../assets/libs/gaugeJS/dist/gauge.min.js"></script>
<!--Morris JavaScript -->
<script src="../assets/libs/raphael/raphael.min.js"></script>
<script src="../assets/libs/morris.js/morris.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://unpkg.com/popper.js@1"></script>
<script src="https://unpkg.com/tippy.js@5"></script>
<!--    <script src="../dist/js/pages/dashboards/dashboard8.js"></script>-->

<script>
    // $('.ti-receipt').hover(function(){
    //     $(this).addClass('text-primary');
    // })
    setInterval(function() {
        formatAMPM(new Date());
    }, 1000);
    tippy('[data-tippy-content]');
    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + '<sup><span style="font-size:13px"> ' + ampm + '</span></sup>';
        $('#time').html(strTime);
    }
    var url_string = window.location.href;
    var url = new URL(url_string);
    var start = url.searchParams.get("start");
    var end = url.searchParams.get("end");

    if (!start || !end) {
        start = moment().format('MM/DD/YYYY');
        end = moment().format('MM/DD/YYYY');
    }else{
       end = moment(end).format('MM/DD/YYYY');
       start = moment(start).format('MM/DD/YYYY');
    }
    let today = moment().format('MM/DD/YYYY');

    $('#date').daterangepicker({
        "showDropdowns": true,
        "startDate": start,
        "endDate": end,
        "minDate": "01/01/2020",
        "maxDate": today,
        "opens": "left"
    }, function(start, end) {
        start = start.format('YYYY-MM-DD')
        end = end.format('YYYY-MM-DD')
        window.location.href = 'https://system.millenniumhotelgh.com/sites/bar-dashboard?start=' + start + '&end=' + end
    });
    function fetch_details(user,detail) {
        $('#modal-table').html('');
        $('#spin').html('<div class="spinner-border text-secondary text-center" role="status"><span class="sr-only text-center">Loading...</span></div>');
        var url_string = window.location.href;
        var url = new URL(url_string);
        var start = url.searchParams.get("start");
        var end = url.searchParams.get("end");
        if (!start || !end) {
            start = moment().format('YYYY-MM-DD');
            end = moment().format('YYYY-MM-DD');
        }
        console.log(start);
        console.log(end);
        // let daterange = $('#date').val();
        // let dates = daterange.split("-");
        // let start = dates[0];
        // start = start.trim();
        // let end = dates[1];
        // start = moment(start).format('YYYY-MM-DD');
        $.ajax({
            url: 'bar-dash',
            method:'POST',
            dataType: 'text',
            data: {
                action: detail,
                user: user,
                start:start,
                end:end
            },
            success:function(response) {
                let newStock = JSON.parse(response);
                if (!newStock) {
                  $('#modal-table').append(`<tr><td colspan="4" class="text-center">No Data Available</td></tr>`)
                  return;
                }
                newStock.forEach(stock=>{
                    if (!stock.quantity) {
                        stock.quantity = stock.figure;
                    }
                    if (!stock.item) {
                        stock.item = stock.product_name;
                    }
                    if (!stock.worth) {
                        stock.worth = stock.subtotal;
                    }
                    if (!stock.date) {
                        stock.date = stock.date_time;
                    }
                    $('#modal-table').append(`
                    <tr>
                        <td>${stock.item}</td>
                        <td>${stock.quantity}</td>
                        <td>${stock.worth}</td>
                        <td>${stock.date}</td>
                    </tr>
                    `)
                })
            },
            error:function() {
                Swal.fire({
                    icon:'error',
                    title:'Error',
                    text:'Connection Timed Out!'
                })
            }
        }).always(function(){
          $("#spin").html('');
        })
    }


    function exportTableToExcel(tableID, filename = ''){
    var downloadLink;
    var dataType = 'application/vnd.ms-excel';
    var tableSelect = document.getElementById(tableID);
    var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

    // Specify file name
    filename = filename?filename+'.xls':'excel_data.xls';

    // Create download link element
    downloadLink = document.createElement("a");

    document.body.appendChild(downloadLink);

    if(navigator.msSaveOrOpenBlob){
        var blob = new Blob(['\ufeff', tableHTML], {
            type: dataType
        });
        navigator.msSaveOrOpenBlob( blob, filename);
    }else{
        // Create a link to the file
        downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

        // Setting the file name
        downloadLink.download = filename;

        //triggering the function
        downloadLink.click();
    }
}

//close limit alert
$('#close').on('click', function(){
  $('.alert').attr('hidden', true)
})
</script>
</body>

</html>
