<?php

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
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/"/>
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../alertifyjs/css/alertify.min.css"/>
    <link rel="stylesheet" href="../alertifyjs/css/themes/default.min.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
          href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]-->


    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

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
    <?php include '../assets/includes/header.php' ?>
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
                                <li class="breadcrumb-item active" aria-current="page">User Management</li>
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
            <!-- Button trigger modal -->
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="addition-tab" data-toggle="tab" href="#addition" role="tab"
                       aria-controls="home" aria-selected="true"><h6>Additions</h6></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="update-tab" data-toggle="tab" href="#update" role="tab"
                       aria-controls="profile" aria-selected="false"><h6>Updates</h6></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="deletion-tab" data-toggle="tab" href="#deletion" role="tab"
                       aria-controls="profile" aria-selected="false"><h6>Deletions</h6></a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!--                START OF ADDITIONS TAB-->
                <!--                START OF ADDITIONS TAB-->
                <div style="background: white; padding: 15px;" class="tab-pane fade show active " id="addition"
                     role="tabpanel"
                     aria-labelledby="addition-tab">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 9px;">
                            <h5 class="float-left">Bar Inventory Additions History<br>
                                <small>All products Added to bar invemtory reflect here alongside quantity added, price
                                    set for Product etc.
                                </small>
                            </h5>


                        </div>
                        <div class="col-md-12">
                            <table class="table">
                                <thead class="bg-secondary text-light">
                                <tr>
                                    <td><i class="ti ti-user"></i></td>
                                    <td>Action Description</td>
                                    <td>Date & Time</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql = "SELECT * FROM bar_history WHERE action = 'insertion'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["user"] . "</td>
                                                  <td>" . $row["item"] . " was Added to Bar Inventory. Quantity added was " . $row["quantity"] . ". Price per item is GHC " . $row['price'] . " Limit alert was set to " . $row['limit_alert'] . "</td>
                                                  <td>" . $row['date'] . "</td>
                                              </tr>";
                                    }
                                }

//                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--                -->
                <!--END OF ADDITIONS TAB-->
                <!--                -->


                <!--                START OF UPDATES TAB-->
                <!--                START OF UPDATES TAB-->
                <!--                START OF UPDATES TAB-->
                <div style="padding: 15px;background: white;" class="tab-pane fade" id="update" role="tabpanel" aria-labelledby="update-tab">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 9px;">
                            <h5 class="float-left">Bar Inventory Updates History<br>
                                <small>All product Details Updated can be in the table below
                                </small>
                            </h5>


                        </div>
                        <div class="col-md-12">
                            <table class="table table-striped" style="width: 100%;">
                                <thead class="bg-secondary text-light">
                                <tr>
                                    <td><i class="ti ti-user"></i></td>
                                    <td>Action Description</td>
                                    <td>Date & Time</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql = "SELECT * FROM bar_operations_history";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        $total = $row['figure'] + $row['initial'];
                                        if ($row['detail_type'] == 'limit alert') {
                                          echo "<tr><td>" . $row["user"] . "</td>
                                                    <td>".$row['item']." ".$row['detail_type']." was ". $row['action']. " by ".$row['figure']." initial figure was ".$row['initial'].". Total figure is now. ".$total."</td>
                                                    <td>" . $row['date'] . "</td>
                                                </tr>";
                                        }else{
                                          echo "<tr><td>" . $row["user"] . "</td>
                                                    <td>".$row['item']." ".$row['detail_type']." was ". $row['action']. " by ".$row['figure']." initial figure was ".$row['initial'].". Total figure is now. ".$total. " Current product worth at " .$row['worth']."</td>
                                                    <td>" . $row['date'] . "</td>
                                                </tr>";  
                                        }

                                    }
                                }

//                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!--                END OF UPDATES TAB-->
                <!--                END OF UPDATES TAB-->
                <!--                END OF UPDATES TAB-->


                <!--                START OF DELETIONS TAB-->
                <!--                START OF DELETIONS TAB-->
                <!--                START OF DELETIONS TAB-->
                <div style="background: white; padding: 15px;" class="tab-pane fade" id="deletion" role="tabpanel" aria-labelledby="deletion-tab">
                    <div class="row">
                        <div class="col-md-12" style="margin-bottom: 9px;">
                            <h5 class="float-left">Bar Inventory Deletions History<br>
                                <small>All products Deleted are shown here.
                                </small>
                            </h5>


                        </div>
                        <div class="col-md-12">
                            <table class="table" style="width: 100%">
                                <thead class="bg-secondary text-light">
                                <tr>
                                    <td><i class="ti ti-user"></i></td>
                                    <td>Action Description</td>
                                    <td>Date & Time</td>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $sql = "SELECT * FROM bar_history WHERE action = 'deletion'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while ($row = $result->fetch_assoc()) {
                                        echo "<tr><td>" . $row["user"] . "</td>
                                                  <td>" . $row["item"] . " was Removed from Bar Inventory. Quantity available was " . $row["quantity"] . " Product removed was worth a total of " . $row['worth']. "</td>
                                                  <td>" . $row['date'] . "</td>
                                              </tr>";
                                    }
                                }

                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!--                END OF DELETIONS TAB-->
                <!--                END OF DELETIONS TAB-->
                <!--                END OF DELETIONS TAB-->

            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Sales chart -->
        <!-- ============================================================== -->


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

<!--c3 charts -->
<script src="../assets/extra-libs/c3/d3.min.js"></script>
<script src="../assets/extra-libs/c3/c3.min.js"></script>
<!--chartjs -->
<script src="../assets/libs/chart.js/dist/Chart.min.js"></script>
<script src="../dist/js/pages/dashboards/dashboard1.js"></script>
<script src="../alertifyjs/alertify.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="../dist/js/pages/datatable/datatable-advanced.init.js"></script>
<script>
    $(document).ready(function () {

        $('table').DataTable({
            "dom": 'Brtip',
            ordering: false,

        });


        // $('#filterTable').on('keyup', function () {
        //     table.search($(this).val()).draw();
        // })
        //
        // $('#filterTable').on('focus', function () {
        //     $('.search-box').addClass('active');
        // })
        // $('#filterTable').on('blur', function () {
        //     $('.search-box').removeClass('active');
        // })
        // $('#file_export_room_types_filter').css('display', 'none');
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');
        // $('#date').daterangepicker({
        //     "showDropdowns": true,
        //     "startDate": "01/12/2020",
        //     "endDate": "01/18/2020",
        //     "minDate": "10/10/2020",
        //     "opens": "left"
        // }, function (start, end, label) {
        //     console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        // });
    })

</script>
</body>
</html>
