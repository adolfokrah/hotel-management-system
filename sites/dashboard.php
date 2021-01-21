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
    <!-- chartist CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--c3 CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <link href="../assets/libs/morris.js/morris.css" rel="stylesheet">

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
        <?php include '../assets/includes/sidebar.php';
        $username = '';
        if(isset($_SESSION['username']) && !empty($_SESSION['username']) && isset($_SESSION['role']) && !empty($_SESSION['role'])){
            $username = $_SESSION['username'];

            // if($_SESSION['role'] == 'hotel'){
            //     header("Location: sites/new-booking");
            // }

            if($_SESSION['role'] == 'bar'){
                header("Location: sites/newsales");
            }

            if($_SESSION['role'] == 'pool'){
                header("Location: sites/pool-records");
            }



            if($_SESSION['role'] == 'manager'){
              echo '<script>window.open("bookings","_self")</script>';
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
                    <h4 class="card-title text-white">Welcome <?php echo $username; ?></h4>
                    <h5 class="card-subtitle text-white op-5">Dashboard</h5>
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
                                            <i class="mdi mdi-thumb-up-outline text-white display-5 op-5"></i>
                                        </div>

                                        <div>
                                            <h3 class="text-white m-b-0"><?php $number = number_format(mysqli_num_rows(mysqli_query($conn,"select * from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where bookings.status = 'Confirmed' and deleted_records.b_id is null and date(bookings.date_time_created) = '".date('Y-m-d')."'")));
                                              echo $number;
                                              ?></h3>
                                            <span class="text-white op-5">Today's Confirmed Bookings</span>
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
                                            <h3 class="text-white m-b-0"><?php $number = number_format(mysqli_num_rows(mysqli_query($conn,"select * from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where bookings.status = 'Checked in' and deleted_records.b_id is null and date(bookings.checkin) = '".date('Y-m-d')."'")));
                                            echo $number;?></h3>
                                            <span class="text-white op-5">Today's Check ins</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- col -->
                                <!-- col -->
                                <div class="col-sm-12 col-md-4">
                                    <div class="info d-flex align-items-center">
                                        <div class="m-r-10">
                                            <i class="mdi mdi-arrow-up text-white display-5 op-5"></i>
                                        </div>
                                        <div>
                                            <h3 class="text-white m-b-0"><?php $number = number_format(mysqli_num_rows(mysqli_query($conn,"select * from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where bookings.status = 'Checked out' and deleted_records.b_id is null and date(bookings.checkout) = '".date('Y-m-d')."'")));
                                            echo $number;
                                             ?></h3>
                                            <span class="text-white op-5">Today's Check outs</span>
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
                <!-- Earnings -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- col -->
                    <div class="col-sm-12">
                        <ul class="nav nav-pills custom-pills" id="pills-tab" role="tablist">
                          <?php if($role == 'admin') { ?>
                            <li class="nav-item">
                                <a class="nav-link " id="pills-home-tab2" data-toggle="pill" role="pill" href="#month" role="tab" aria-selected="true">Month Revenue</a>
                            </li>
                          <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link fetch_booking active" id="pills-profile-tab2" data-toggle="pill" role="pill" href="#revenue" role="tab" aria-selected="false">Occupancy Rate</a>
                            </li>
<!--
                            <li class="nav-item">
                                <a class="nav-link" id="pills-contact-tab2" data-toggle="pill" href="index8.html#conversion" role="tab" aria-selected="false">Conversions</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-session-tab2" data-toggle="pill" href="index8.html#session" role="tab" aria-selected="false">Sessions</a>
                            </li>
-->
                        </ul>
                        <div class="tab-content m-t-30" id="pills-tabContent">
                            <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="pills-home-tab2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5"><?php
                                                $query = mysqli_query($conn,"SELECT sum(price + extra_charge) as total FROM bookings WHERE  status != 'New Booking' and MONTH(CAST(date_time_created as date)) = MONTH(NOW()) AND YEAR(CAST(date_time_created as date)) = YEAR(NOW())");

                                                $amount = 0;
                                                 $query2 = mysqli_query($conn,"SELECT * from deleted_records left join bookings on deleted_records.b_id = bookings.b_id where MONTH(CAST(bookings.date_time_created as date)) = MONTH(NOW()) AND YEAR(CAST(bookings.date_time_created as date)) = YEAR(NOW())");

                                                while($fetch = mysqli_fetch_assoc($query2)){
                                                    $amount = $fetch['price'] + $amount + $fetch['extra_charge'];
                                                }


                                                $total = mysqli_fetch_assoc($query)['total'] - $amount;

                                                echo '₵ '.number_format($total,2);
                                            ?></h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>The side chart shows the total income made on each week of the this month.</p>
                                        <a href="finance"><button class="waves-effect waves-light m-t-20 btn btn-lg btn-info">All Months Summary</button></a>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 border-left">
                                        <div class="earnings ct-charts"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade  show active" id="revenue" role="tabpanel" id="revenue" aria-labelledby="pills-profile-tab2">


                               <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5"><?php
                                                $query = mysqli_query($conn,"SELECT * FROM bookings WHERE MONTH(CAST(date_time_created as date)) = MONTH(NOW()) AND YEAR(CAST(date_time_created as date)) = YEAR(NOW())");

                                             $query2 = mysqli_query($conn,"SELECT * from deleted_records left join bookings on deleted_records.b_id = bookings.b_id where MONTH(CAST(bookings.date_time_created as date)) = MONTH(NOW()) AND YEAR(CAST(bookings.date_time_created as date)) = YEAR(NOW())");

                                                echo number_format(mysqli_num_rows($query) - mysqli_num_rows($query2));
                                            ?></h1>
                                        <h6 class="m-b-20">Bookings made in this month</h6>
                                        <p>The side chart shows the total books made on each week of the this month excluding deleted bookings.</p>

                                    </div>
                                    <div class="col-sm-12 col-lg-8 border-left">
                                         <div id="extra-area-chart"></div>
                                    </div>
                                </div>
                            </div>
<!--
                            <div class="tab-pane fade" id="conversion" role="tabpanel" aria-labelledby="pills-contact-tab2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5">$6,890.68</h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non pharetra ligula, sitametlaoreet arcu.</p>
                                        <button class="waves-effect waves-light m-t-20 btn btn-lg btn-info">Last Month Summary</button>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 text-center border-left">
                                        <div class="rate"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="session" role="tabpanel" aria-labelledby="pills-session-tab2">
                                <div class="row">
                                    <div class="col-sm-12 col-lg-4">
                                        <h1 class="font-bold m-b-5">$6,890.68</h1>
                                        <h6 class="m-b-20">Current Month Earnings</h6>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec non pharetra ligula, sitametlaoreet arcu.</p>
                                        <button class="waves-effect waves-light m-t-20 btn btn-lg btn-info">Last Month Summary</button>
                                    </div>
                                    <div class="col-sm-12 col-lg-8 text-center border-left">
                                        <div class="status"></div>
                                    </div>
                                </div>
                            </div>
-->
                        </div>
                    </div>
                </div>
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
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Checked in guest</h4>
                                        <h5 class="card-subtitle">These are the clients who are currently checked in</h5>
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">CLIENT NAME</th>
                                                <th class="border-0">CLIENT NUMBER</th>
                                                <th class="border-0">CHECKED IN DATE</th>
                                                <th class="border-0">ROOM</th>
                                                <th class="border-0"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php

//                                            $query = mysqli_query($conn,"select * from bookings left join rooms on bookings.b_room = rooms.r_id  where bookings.checkout between '".date('Y-m-d')." 00:00:00.000000' and '".date('Y-m-d')." 23:59:59.000000' and bookings.status = 'Checked in'");
                                                $query = mysqli_query($conn,"select * from bookings left join rooms on bookings.b_room = rooms.r_id  where  bookings.status = 'Checked in'");

                                                while($fetch_bookings = mysqli_fetch_assoc($query)){

                                                    if(mysqli_num_rows(mysqli_query($conn,"select * from  deleted_records where b_id = '".$fetch_bookings['b_id']."'")) == null){
                                                    echo '<tr>
                                                         <td><a href="edit-booking?b='.$fetch_bookings['b_id'].'">'.$fetch_bookings['guest_name'].'</a></td>
                                                        <td>'.$fetch_bookings['guest_phone'].'</td>
                                                        <td>'.$fetch_bookings['checkin'].'</td>
                                                        <td>'.$fetch_bookings['r_name'].'</td>
                                                         <td> <i class="mdi mdi-arrow-down" style="color:green"></i></td>
                                                    </tr>';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Guest to be checked</h4>
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">CLIENT NAME</th>
                                                <th class="border-0">ROOM</th>
                                                <th class="border-0"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php

                                            $query = mysqli_query($conn,"select bookings.b_id,rooms.r_name,bookings.guest_name,bookings.checkin from bookings left outer join deleted_records on bookings.b_id = deleted_records.b_id left join rooms on bookings.b_room  = rooms.r_id where bookings.checkout <= '".date('Y-m-d h:i:s')."' and status = 'Checked in' and deleted_records.b_id is null");

                                                while($fetch_bookings = mysqli_fetch_assoc($query)){
                                                     if(mysqli_num_rows(mysqli_query($conn,"select * from  deleted_records where b_id = '".$fetch_bookings['b_id']."'")) == null){
                                                    echo '<tr>
                                                        <td><a href="edit-booking?b='.$fetch_bookings['b_id'].'">'.$fetch_bookings['guest_name'].'</a></td>
                                                        <td>'.$fetch_bookings['r_name'].'</td>
                                                         <td> <i class="mdi mdi-arrow-up" style="color:red"></i></td>
                                                    </tr>';
                                                }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-md-flex align-items-center">
                                    <div>
                                        <h4 class="card-title">Guest to be checked in</h4>
                                        <h5 class="card-subtitle">These are the clients who have made a confirmed booking due today</h5>
                                    </div>

                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0">CLIENT NAME</th>
                                                <th class="border-0">CLIENT NUMBER</th>
                                                <th class="border-0">CHECKED IN DATE</th>
                                                <th class="border-0">ROOM</th>
                                                <th class="border-0"></th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                           <?php

//                                            $query = mysqli_query($conn,"select * from bookings left join rooms on bookings.b_room = rooms.r_id  where bookings.checkout between '".date('Y-m-d')." 00:00:00.000000' and '".date('Y-m-d')." 23:59:59.000000' and bookings.status = 'Checked in'");
                                                $query = mysqli_query($conn,"select * from bookings left join rooms on bookings.b_room = rooms.r_id  where  bookings.status = 'Confirmed' and date(date_time) = '".date('Y-m0d')."'");

                                                while($fetch_bookings = mysqli_fetch_assoc($query)){

                                                    if(mysqli_num_rows(mysqli_query($conn,"select * from  deleted_records where b_id = '".$fetch_bookings['b_id']."'")) == null){
                                                    echo '<tr>
                                                         <td><a href="edit-booking?b='.$fetch_bookings['b_id'].'">'.$fetch_bookings['guest_name'].'</a></td>
                                                        <td>'.$fetch_bookings['guest_phone'].'</td>
                                                        <td>'.$fetch_bookings['checkin'].'</td>
                                                        <td>'.$fetch_bookings['r_name'].'</td>
                                                         <td> <i class="mdi mdi-arrow-down" style="color:green"></i></td>
                                                    </tr>';
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
<!--    <script src="../dist/js/pages/dashboards/dashboard8.js"></script>-->

    <script>
        setInterval(function(){
            formatAMPM(new Date());
        },1000);

        function formatAMPM(date) {
          var hours = date.getHours();
          var minutes = date.getMinutes();
          var ampm = hours >= 12 ? 'pm' : 'am';
          hours = hours % 12;
          hours = hours ? hours : 12; // the hour '0' should be '12'
          minutes = minutes < 10 ? '0'+minutes : minutes;
          var strTime = hours + ':' + minutes + '<sup><span style="font-size:13px"> ' + ampm +'</span></sup>';
          $('#time').html(strTime);
        }


    /*
Template Name: Admin Pro Admin
Author: Wrappixel
Email: niravjoshi87@gmail.com
File: js
*/
    var drawn = false;

    $('.fetch_booking').on('click',function(){
        if(drawn){
            return;
        }
        setTimeout(function(){


             var date = new Date();
             var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
             var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);

             var start_date = firstDay.getFullYear() + '-' + (firstDay.getMonth() + 1) + '-' + firstDay.getDate();
            var end_date = lastDay.getFullYear() + '-' + (lastDay.getMonth() + 1) + '-' + lastDay.getDate();
            // get_month_earnigs(firstDay,lastDay);

               //alert(date+'...'+date2); return;
            //alert(room_type);
            var request = new XMLHttpRequest();
             var params = 'start_date='+start_date+'&end_date='+end_date;
            request.onreadystatechange = (e) => {
                if (request.readyState !== 4) {
                    return;
                }

                if (request.status === 200) {

//                    select.val(null).trigger("change");
                   // alert('f')


                     var data = JSON.parse(request.responseText);


                           Morris.Area({
                            element: 'extra-area-chart',
                            data: data[0],
                            lineColors: ['#2962FF'],
                            xkey: 'period',
                            ykeys: ['amount'],
                            labels: ['Bookings'],
                            pointSize: 0,
                            lineWidth: 0,
                            resize:true,
                            fillOpacity:1,
                            behaveLikeLine: true,
                            gridLineColor: '#e0e0e0',
                            hideHover: 'auto'

                        });
                    drawn = true;


                } else {

                    //console.warn('error');
                }
            };

            request.open('POST', '../assets/includes/get_hotel_monthly_bookings');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(params);

        },300);
    })
$(function() {
    "use strict";
    // ==============================================================
    // Earnings
    // ==============================================================

       //alert(date+'...'+date2); return;
            //alert(room_type);
     var date = new Date();
     var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
     var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
     get_month_earnigs(firstDay,lastDay);
     function get_month_earnigs(start_date,end_date){

            start_date = firstDay.getFullYear() + '-' + (firstDay.getMonth() + 1) + '-' + firstDay.getDate();
            end_date = lastDay.getFullYear() + '-' + (lastDay.getMonth() + 1) + '-' + lastDay.getDate();
            var request = new XMLHttpRequest();
            var params = 'start_date='+start_date+'&end_date='+end_date;
            request.onreadystatechange = (e) => {
                if (request.readyState !== 4) {
                    return;
                }

                if (request.status === 200) {


                    var data = JSON.parse(request.responseText);
                     var data1 = {
                        labels: data.days,
                        series: data.earnings
                    };


                    var options1 = {
                        low: 0,
                        high: Math.max.apply(data.earnings[0]),
                        showArea: true,
                        fullWidth: true,
                        chartPadding: {
                            top: 15,
                            right: 15,
                            bottom: 5,
                            left: 40
                        },
                        plugins: [
                            Chartist.plugins.tooltip()
                        ],
                        axisY: {
                            onlyInteger: true,
                            scaleMinSpace: 40,
                            offset: 20,
                            labelInterpolationFnc: function(value) {
                                return (value) + 'k';
                            }
                        }
                    };

                    var responsiveOptions1 = [
                        ['screen and (max-width: 1023px)', {
                            chartPadding: {
                                top: 15,
                                right: 12,
                                bottom: 5,
                                left: 10
                            }
                        }]
                    ];

                    var chart = new Chartist.Line('.earnings', data1, options1, responsiveOptions1);

                    // Offset x1 a tiny amount so that the straight stroke gets a bounding box
                    // Straight lines don't get a bounding box
                    // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
                    chart.on('draw', function(ctx) {
                        if (ctx.type === 'area') {
                            ctx.element.attr({
                                x1: ctx.x1 + 0.001
                            });
                        }
                    });

                    // Create the gradient definition on created event (always after chart re-render)
                    chart.on('created', function(ctx) {
                        var defs = ctx.svg.elem('defs');
                        defs.elem('linearGradient', {
                            id: 'gradient',
                            x1: 0,
                            y1: 1,
                            x2: 0,
                            y2: 0
                        }).elem('stop', {
                            offset: 0,
                            'stop-color': 'rgba(255, 255, 255, 1)'
                        }).parent().elem('stop', {
                            offset: 1,
                            'stop-color': 'rgba(64, 196, 255, 1)'
                        });
                    });
                    var chart = [chart];


                } else {

                    //console.warn('error');
                }
            };

            request.open('POST', '../assets/includes/get_hotel_monthly_earnings.php');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(params);
     }


    // Extra chart

//    // ==============================================================
//    // product-sales
//    // ==============================================================
//    var chart = c3.generate({
//        bindto: '.product-sales',
//        size: {
//            height:350
//        },
//        data: {
//            columns: [
//                ['Site A', 5, 6, 3, 7, 9, 10, 14, 12, 11, 9, 8, 7, 10, 6, 12, 10, 8],
//                ['Site B', 1, 2, 8, 3, 4, 5, 7, 6, 5, 6, 4, 3, 3, 12, 5, 6, 3]
//            ],
//            type: 'bar'
//        },
//        axis: {
//            y: {
//                show: true,
//                tick: {
//                    count: 0,
//                    outer: false
//                }
//            },
//            x: {
//                show: true,
//            }
//        },
//        bar: {
//
//            width: 8
//
//        },
//        padding: {
//            top: 40,
//            right: 10,
//            bottom: 0,
//            left: 20,
//        },
//        point: {
//            r: 0,
//        },
//        legend: {
//            hide: true
//            //or hide: 'data1'
//            //or hide: ['data1', 'data2']
//        },
//        color: {
//            pattern: ['#2961ff', '#40c4ff', '#ff821c', '#7e74fb']
//        }
//    });
//    // ==============================================================
//    // Conversation Rate
//    // ==============================================================
//    var chart = c3.generate({
//        bindto: '.rate',
//         size: {
//            width:250
//        },
//        data: {
//            columns: [
//                ['Conversation', 85],
//                ['other', 15],
//            ],
//
//            type : 'donut'
//        },
//        donut: {
//            label: {
//                show: false
//              },
//            title:"Conversation",
//            width:10,
//
//        }
//        , padding: {
//            top:10,
//             bottom:-20
//
//        , },
//        legend: {
//          hide: true
//          //or hide: 'data1'
//          //or hide: ['data1', 'data2']
//        },
//        color: {
//              pattern: ['#2961ff', '#dadada', '#ff821c', '#7e74fb']
//        }
//    });
//    // ==============================================================
//    // Revenue
//    // ==============================================================
//
//    var chart = c3.generate({
//        bindto: '.status',
//        size: {
//            width:250
//        },
//        data: {
//            columns: [
//                ['Success', 65],
//                ['Pending', 15],
//                ['Failed', 17]
//            ],
//
//            type : 'donut'
//        },
//        donut: {
//            label: {
//                show: false
//              },
//            title:"Sessions",
//            width:35,
//
//        },
//
//        legend: {
//          hide: true
//          //or hide: 'data1'
//          //or hide: ['data1', 'data2']
//        },
//        color: {
//              pattern: ['#40c4ff', '#2961ff', '#ff821c', '#7e74fb']
//        }
//    });
//
//    // ==============================================================
//    // income
//    // ==============================================================
//    var data = {
//        labels: ['1-3', '2-4', '3-5', '4-6', '5-7', '6-8', '7-9'],
//        series: [
//            [5, 4, 3, 7, 5, 10, 3]
//        ]
//    };
//
//    var options = {
//        axisX: {
//            showGrid: false
//        },
//        seriesBarDistance: 1,
//        chartPadding: {
//            top: 15,
//            right: 15,
//            bottom: 5,
//            left: 0
//        },
//        plugins: [
//            Chartist.plugins.tooltip()
//        ],
//        width: '100%'
//    };
//
//    var responsiveOptions = [
//        ['screen and (max-width: 640px)', {
//            seriesBarDistance: 5,
//            axisX: {
//                labelInterpolationFnc: function(value) {
//                    return value[0];
//                }
//            }
//        }]
//    ];
//    new Chartist.Bar('.net-income', data, options, responsiveOptions);
//
//    // ==============================================================
//    // Our Visitor
//    // ==============================================================
//
//    var chart = c3.generate({
//        bindto: '#visitor',
//        data: {
//            columns: [
//                ['Desktop', 40],
//                ['Tablet', 12],
//                ['Mobile', 28],
//                ['None', 60]
//            ],
//
//            type: 'donut',
//            onclick: function(d, i) { console.log("onclick", d, i); },
//            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
//            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
//        },
//        donut: {
//            label: {
//                show: false
//            },
//            title: "Variations",
//            width: 25,
//
//        },
//
//        legend: {
//            hide: true
//            //or hide: 'data1'
//            //or hide: ['data1', 'data2']
//        },
//        color: {
//            pattern: ['#40c4ff', '#2961ff', '#ff821c', '#e9edf2']
//        }
//    });
//
//    // ==============================================================
//    // sales
//    // ==============================================================
//
//    var chart = c3.generate({
//        bindto: '#sales',
//        data: {
//            columns: [
//                ['2011', 45],
//                ['2012', 15],
//                ['2013', 27]
//            ],
//
//            type: 'donut',
//            onclick: function(d, i) { console.log("onclick", d, i); },
//            onmouseover: function(d, i) { console.log("onmouseover", d, i); },
//            onmouseout: function(d, i) { console.log("onmouseout", d, i); }
//        },
//        donut: {
//            label: {
//                show: false
//            },
//            width: 15,
//        },
//
//        legend: {
//            hide: true
//            //or hide: 'data1'
//            //or hide: ['data1', 'data2']
//        },
//        color: {
//            pattern: ['#40c4ff', '#2961ff', '#ff821c']
//        }
//    });
//
//    // ==============================================================
//    // Foo1
//    // ==============================================================
//    var opts = {
//        angle: 0, // The span of the gauge arc
//        lineWidth: 0.32, // The line thickness
//        radiusScale: 1, // Relative radius
//        pointer: {
//            length: 0.44, // // Relative to gauge radius
//            strokeWidth: 0.04, // The thickness
//            color: '#000000' // Fill color
//        },
//        limitMax: false, // If false, the max value of the gauge will be updated if value surpass max
//        limitMin: false, // If true, the min value of the gauge will be fixed unless you set it manually
//        colorStart: '#40c2ff', // Colors
//        colorStop: '#2a65ff', // just experiment with them
//        strokeColor: '#E0E0E0', // to see which ones work best for you
//        generateGradient: true,
//        highDpiSupport: true // High resolution support
//    };
//    var target = document.getElementById('foo'); // your canvas element
//    var gauge = new Gauge(target).setOptions(opts); // create sexy gauge!
//    gauge.maxValue = 3000; // set max gauge value
//    gauge.setMinValue(0); // Prefer setter over gauge.minValue = 0
//    gauge.animationSpeed = 45; // set animation speed (32 is default value)
//    gauge.set(2700); // set actual value
});
    </script>
</body>

</html>
