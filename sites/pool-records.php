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
    <title>Millenium Hotel - Pool Side Records </title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- Custom CSS -->
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <!-- This page plugin CSS -->
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                        <h4 class="page-title">Pool Side</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#">Pool side</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Records</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

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
                <div class="row">
                    <div class="col-md-8 col-12">
                        <div class="row" style="padding:10px">
                            <?php
                            error_reporting(E_ALL);
                            ini_set('display_errors', 1);
                            $user_id = '';
                            if(isset($_SESSION['user_id'])){
                                $user_id = $_SESSION['user_id'];
                            }

                            if(isset($_GET['del']) && !empty($_GET['del']) && isset($_GET['d']) && !empty($_GET['d'])){
                              if($_GET['del'] == 'true'){

                                  $id = mysqli_real_escape_string($conn,$_GET['d']);

                                 mysqli_query($conn,"update pool_side_records set pl_status = 'deleted' where pol_id = '$id'");

                                 $fetch_e = mysqli_fetch_assoc(mysqli_query($conn,"select * from pool_side_records where pol_id = '$id'"));
                                 $fee_t = $fetch_e['fees_type'];
                                 $fee = $fetch_e['fees'];
                                 $total_amount = $fetch_e['amount_paid'];
                                 $number_of_persons = $fetch_e['persons'];
                                 $date = gmdate('Y-m-d H:i:s');
                                 $message = "Pool recorded deleted Type=><strong>$fee_t</strong>,Fee=><strong>GHS $fee</strong>,Amount Paid=><strong>$total_amount</strong>,Nummber of people=><strong> $number_of_persons</strong>";
                                 mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date')");

                                 echo '
                                 <div class="alert alert-success">Record deleted</div>
                                 ';
                              }
                            }
                            if(isset($_POST['add_expens']) && isset($_SESSION['user_id'])){
                               $fees_type = mysqli_real_escape_string($conn,$_POST['fees_type']);
                              $number_of_persons = mysqli_real_escape_string($conn,$_POST['number_of_persons']);
                              $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                               $id = substr($fees_type,0,strpos($fees_type,'_'));
                              if($number_of_persons < 1){
                                $number_of_persons = 1;
                              }

                               $fee_type  = mysqli_fetch_assoc(mysqli_query($conn,"select * from pool_fees where fee_id = '$id'"));
                              $fee_t  = $fee_type['fee_type'];
                              $fee   = $fee_type['amount'];
                              $total_amount = $fee * $number_of_persons;
                              $date = gmdate('Y-m-d H:i:s');

                              mysqli_query($conn,"INSERT INTO `pool_side_records` (`pol_id`, `fees_type`, `persons`, `amount_paid`, `user_id`, `date_time`, `fees`, `pl_status`) VALUES (NULL, '$fee_t', '$number_of_persons', '$total_amount', '$user_id', '$date', '$fee', 'saved');");



                              $message = "New Pool recorded added Fee Type=><strong>$fee_t</strong>,Fee=><strong>GHS $fee</strong>,Amount Paid=><strong>$total_amount</strong>,Nummber of people=><strong> $number_of_persons</strong>";
                              mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date');");

                              echo '
                              <div class="alert alert-success">Record added record</div>
                              ';

                            }

                            // if(isset($_POST['edit_expense']) && isset($_SESSION['user_id'])){
                            //   $item = mysqli_real_escape_string($conn,$_POST['fees_type']);
                            //   $qty = mysqli_real_escape_string($conn,$_POST['number_of_persons']);
                            //   $price = sprintf('%0.2f',mysqli_real_escape_string($conn,$_POST['price']));
                            //   $id = sprintf('%0.2f',mysqli_real_escape_string($conn,$_POST['e_id']));
                            //   $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                            //
                            //   $total_price = sprintf('%0.2f',$qty * $price);
                            //   $date = gmdate('Y-m-d H:i:s');
                            //
                            //   mysqli_query($conn,"UPDATE `pool_side_records` SET `product` = '$item', `qty` = '$qty', `price` = '$price', `total_price` = '$total_price' WHERE `pool_side_records`.`pol_id` = $id");
                            //
                            //
                            //   $message = "Expense details updated ( Product bought=><strong>$item</strong>,Product Price=><strong>GHS $price</strong>,Quantity bought=><strong>$qty</strong>,Total amount made=><strong>GHS $total_price</strong>)";
                            //   mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date');");
                            //
                            //   echo '
                            //   <div class="alert alert-success">Expense updated</div>
                            //   ';
                            //
                            // }
                            $to = '';
                            $from = '';
                            if(isset($_POST['search'])){
                              $to = mysqli_real_escape_string($conn,$_POST['to']);
                              $from = mysqli_real_escape_string($conn,$_POST['from']);

                            }

                            ?>
                            <ul class="search-box">
                                <li><span class="mdi mdi-filter"></span></li>
                                <li style="width:90%"><input type="text" id="filterTable" placeholder="Filter by room name, price, description and persons" /></li>
                            </ul>
                        </div>
                        <div class="card">
                            <div class="card-body">

                                <div class="table-responsive">
                                  <form action="pool-records" method="POST">
                                    <div class="row">
                                      <div class="col-sm-4">
                                          <h5 style="font-size:10px;">Filter by date</h5>
                                          <div class="form-group ">
                                              <input type="date" value="<?php echo date('Y-m-d');?>" name="from" class="form-control" id="check_in_date" placeholder="12/01/03 11:00 PM" required>
                                          </div>

                                      </div>

                                      <div class="col-sm-4">
                                          <h5 style="font-size:10px;">to date</h5>
                                          <div class="form-group ">
                                              <input type="date" value="<?php echo date('Y-m-d',strtotime('last day of this month'));?>" name="to" class="form-control" id="check_out_date" placeholder="12/01/03 11:00 PM" required>
                                          </div>
                                      </div>
                                      <div class="col-sm-3">
                                        <button class="btn btn-success btn-block" type="submit" name="search" style="margin-top:20px">Filter</button>
                                      </div>
                                    </div>
                                  </form>
                                    <table id="file_export_room_types" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>FEE TYPE</th>
                                                 <th>FEE</th>
                                                <th>NO. PERSONS</th>
                                                <th>AMOUNT PAID</th>
                                                <th>DATE TIME</th>
                                                <th>ACTION</th>
                                                  <th>USER<th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php

                                            //fetch all room types in descending order
                                             $query = null;


                                             if(isset($_SESSION['role'])){
                                                 $role = $_SESSION['role'];

                                               if($role == 'admin' || $role == 'manager'){
                                                 if($to == ''){

                                                     $query = mysqli_query($conn,"select * from pool_side_records left join admins on pool_side_records.user_id = admins.id where date(pool_side_records.date_time) >= '".gmdate('Y-m-d')." ' and pool_side_records.pl_status !='deleted'  order by pool_side_records.pol_id desc");
                                                 }else{

                                                    $from = $from.' 00:00:00';
                                                    $to .= ' 00:00:00';
                                                     $query = mysqli_query($conn,"select * from pool_side_records left join admins on pool_side_records.user_id = admins.id where date(pool_side_records.date_time) between '$from' and '$to' and pool_side_records.pl_status !='deleted'  order by pool_side_records.pol_id desc");
                                                 }
                                               }else{
                                                 if($to == ''){
                                                     $query = mysqli_query($conn,"select * from pool_side_records left join admins on pool_side_records.user_id = admins.id where date(pool_side_records.date_time) >= '".gmdate('Y-m-d')." ' and pool_side_records.pl_status !='deleted' and pool_side_records.user_id = '$user_id' order by pool_side_records.pol_id desc");
                                                 }else{
                                                    $from = $from.' 00:00:00';
                                                    $to .= ' 00:00:00';
                                                     $query = mysqli_query($conn,"select * from pool_side_records left join admins on pool_side_records.user_id = admins.id where date(pool_side_records.date_time) between '$from' and '$to' and pool_side_records.pl_status !='deleted' and pool_side_records.user_id = '$user_id' order by pool_side_records.pol_id desc");
                                                 }
                                               }
                                             }

                                             $total_items = 0;
                                             $total_price_made = 0;
                                            echo mysqli_error($conn);
                                                while($fetch = mysqli_fetch_assoc($query)){
                                                  $buttons = '<span data-toggle="tooltip" data-placement="top" title="Click to delele row" class="btn mdi mdi-delete" style="cursor:pointer; padding:0px;" onclick="delete_ex(\''.$fetch['pol_id'].'\')"></span>';

                                                  if($role == 'manager'){
                                                    $buttons = '';
                                                  }
                                                  // $total_items += $fetch['qty'];
                                                  // $total_price_made += $fetch['total_price'];
                                                    echo '
                                                    <tr>

                                                      <td > '.strip_tags($fetch['fees_type']).'</td>
                                                      <td>GHS '.strip_tags($fetch['fees']).'</td>

                                                      <td>'.strip_tags($fetch['persons']).'</td>
                                                      <td>GHS '.strip_tags($fetch['amount_paid']).'</td>
                                                      <td>'.gmdate('D M, Y h:i A',strtotime($fetch['date_time'])).'</td>

                                                      <td>

                                                      '.$buttons.'
                                                      </td>
                                                      <td>'.$fetch['username'].'</td>
                                                      <td></td>

                                                      </tr>
                                                    ';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                      <?php if($role != 'manager'){ ?>
                        <div class="card">
                            <div class="card-header">
                                <h4  class="modal-title" id="myModalLabel">Add New Record</h4>

                            </div>
                            <div class="card-body">
                                <form method="post" action="pool-records">



                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Fee Type </label>
                                    <select name="fees_type" id="fee_type" class="form-control change">
                                        <?php
                                          $fee_type = '';
                                          $count = 0;
                                          $query_fetch_fees = mysqli_query($conn,"select * from pool_fees where status != 'deleted' order by fee_type asc");
                                          while($fetch = mysqli_fetch_assoc($query_fetch_fees)){
                                               if($count == 0){
                                                 $fee_type = $fetch['amount'];
                                               }
                                               $count++;
                                              echo '<option value="'.$fetch['fee_id'].'_'.$fetch['amount'].'">'.$fetch['fee_type'].'</option>';
                                          }
                                        ?>
                                    </select>
                                </div>
                      <div class="form-group">
                                    <label for="recipient-name" class="control-label">Amount </label>
                                    <input type="text" name="fee"  value="GHS <?php echo sprintf('%0.2f',$fee_type) ?>" readonly  class="form-control" id="fee">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label ">Number of Persons</label>
                                    <input type="number" value="1" min="1" name="number_of_persons" required class="form-control change" id="number_of_persons">
                                </div>

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Amount to pay </label>
                                    <input type="text" name="amount" value="GHS <?php echo sprintf('%0.2f',$fee_type) ?>" readonly  class="form-control" id="total_amount">
                                </div>


                                <button type="submit" name="add_expens" class="btn btn-info btn-block waves-effect" data-dismiss="modal">Add Record</button>

                        </form>
                            </div>
                        </div>
                      <?php } ?>
                    
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Summary</h5>
                            <h6 class="card-subtitle">The total number of people and amount made</h6>
                            <hr>


                            <?php
                              //fetch total_amount_label
                              if($to == ''){
                                $query_fetch = mysqli_query($conn,"select fees_type,sum(persons) as persons, sum(amount_paid) as amount_paid from pool_side_records where date(date_time) >= '".date('Y-m-d')."' and pl_status !='deleted' group by fees_type ");
                              }else{
                                $query_fetch = mysqli_query($conn,"select fees_type,sum(persons) as persons, sum(amount_paid) as amount_paid from pool_side_records where date(date_time) between '$from' and '$to' and pl_status != 'deleted' group by fees_type ");
                              }
                              $total = 0;
                              $total_pepo = 0;
                              while($fetch = mysqli_fetch_assoc($query_fetch)){
                                $total += $fetch['amount_paid'];
                                $total_pepo += $fetch['persons'];
                                ?>

                                <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                    <div class="col-sm-6">
                                        <h6><?php echo $fetch['fees_type']?></h6>
                                    </div>
                                    <div class="col-sm-6" style="text-align:right">
                                        <p> x <?php echo $fetch['persons'] ?></p>
                                        <h6  id="total_amount_label">GHS <?php echo sprintf("%0.2f",$fetch['amount_paid']);?></h6>
                                    </div>
                                </div>

                                <?php
                              }
  ?>
                              <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                  <div class="col-sm-6">
                                      <h4 style="font-weight:9000; font-size:17px">Total Amount</h4>
                                  </div>
                                  <div class="col-sm-6" style="text-align:right">
                                      <h4 style="font-weight:9000; font-size:22px" id="total_amount_label">₵ <?php echo sprintf('%0.2f',$total);?></h4>
                                  </div>
                              </div>

                              <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                  <div class="col-sm-6">
                                      <h4 style="font-weight:9000; font-size:17px">Total People</h4>
                                  </div>
                                  <div class="col-sm-6" style="text-align:right">
                                      <h4 style="font-weight:9000; font-size:22px" id="total_amount_label"><?php echo $total_pepo;?></h4>
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

            <!-- sample modal content -->
            <div id="edit_expense" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Edit Pool Record</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>



                          <div class="modal-body">
                            <form method="post" action="expense">

                              <form method="post" action="pool-records">



                              <div class="form-group">
                                  <label for="recipient-name" class="control-label">Fee Type </label>
                                  <select name="fees_type" required id="fee_type2" class="form-control change2">
                                      <?php
                                        $fee_type = '';
                                        $count = 0;
                                        $query_fetch_fees = mysqli_query($conn,"select * from pool_fees where status !='deleted' order by fee_type asc");
                                        while($fetch = mysqli_fetch_assoc($query_fetch_fees)){
                                             if($count == 0){
                                               $fee_type = $fetch['amount'];
                                             }
                                             $count++;
                                            echo '<option value="'.$fetch['fee_id'].'_'.$fetch['amount'].'">'.$fetch['fee_type'].'</option>';
                                        }
                                      ?>
                                  </select>
                              </div>
                    <div class="form-group">
                                  <label for="recipient-name" class="control-label">Amount </label>
                                  <input type="text" name="fee" required  value="GHS <?php echo sprintf('%0.2f',$fee_type) ?>" readonly  class="form-control" id="fee2">
                              </div>

                              <div class="form-group">
                                  <label for="recipient-name" class="control-label ">Number of Persons</label>
                                  <input type="number" value="1" required min="1" name="number_of_persons" required class="form-control change2" id="number_of_persons2">
                              </div>

                              <div class="form-group">
                                  <label for="recipient-name" class="control-label">Amount to pay </label>
                                  <input type="text" name="amount" required value="GHS <?php echo sprintf('%0.2f',$fee_type) ?>" readonly  class="form-control" id="total_amount2">
                              </div>

                              <input type="hidden" id="id" name="id"/>
                              <button type="submit" name="edit_expens" class="btn btn-info btn-block waves-effect" data-dismiss="modal">Save Changes</button>

                      </form>

                                  </form>
                          </div>


                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>



            <!-- /.modal -->

            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved by millenium hotel. Designed and Developed by <a href="https://perple.org">perple</a>.
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
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <!-- start - This is for export functionality only -->
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-advanced.init.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script>
        var table = $('#file_export_room_types').DataTable({
            dom: 'Bfrtip',
            ordering: false,
            paging:false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });

        $('#filterTable').on('keyup', function() {
            table.search($(this).val()).draw();
        })

        $('#filterTable').on('focus', function() {
            $('.search-box').addClass('active');
        })
        $('#filterTable').on('blur', function() {
            $('.search-box').removeClass('active');
        })

        $('#file_export_room_types_filter').css('display', 'none');
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

        //delete room type function
        function deleteroom(room_id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to delete this room?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout!'
            }).then((result) => {
                if (result.value) {

                    window.location.href = "?del=" + room_id
                }
            })
        }

        function maintainance(room_id){
            window.location.href = "?main="+room_id
        }
        $('.input').on('dblclick',function(){
            $(this).removeAttr('readonly');
            $(this).css('border','thin solid #ccc');
        })

        var value = '';
        $('.input').on('focus',function(){
           value = $(this).val();
        })


        $('.input').on('blur',function(){
            $(this).attr('readonly','true');
            $(this).css('border','none');
            if($(this).val() == value){
                    return;
            }
            window.location.href = "?edit="+$(this).attr('id')+'&value='+$(this).val();
        })

        $('.input').keypress(function(event){

            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
                $(this).attr('readonly','true');
                $(this).css('border','none');
                if($(this).val() == value){
                    return;
                }
                window.location.href = "?edit="+$(this).attr('id')+'&value='+$(this).val();
            }

        });

        $('.select').on('change',function(){
            var value  = $(this).val();
            var id = $(this).attr('id');
            window.location.href = "?room_type="+$(this).attr('id')+'&value='+$(this).val();
        })

        function delete_ex(id){
          Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this row?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete!'
          }).then((result) => {
            if (result.value) {

              window.location.href = window.location.href+'?del=true&d='+id;
            }
          })
        }

        // function editRoomType(id,persons,fees_type,fees,total_amount,fee_id){
        //
        //   $('#fee_type2').val(id+'_'fee_id);
        //   $('#fee2').val(fees);
        //   $('#number_of_persons2').val(persons);
        //   $('#total_amount2').val(total_amount);
        //   $('#id').val(id);
        //   $('#edit_expense').modal('show');
        // }

        $('.change').on('change',function(){
          var fee_type = $('#fee_type :selected').val();
          var fee = fee_type.substr(fee_type.indexOf('_')+1,fee_type.length);
          var number_of_persons = $('#number_of_persons').val();
          $('#fee').val('GHS '+Number(fee).toFixed(2));
          fee = Number(fee) * Number(number_of_persons);
          $('#total_amount').val('GHS '+Number(fee).toFixed(2));

        })

        $('.change2').on('change',function(){
          var fee_type = $('#fee_type2 :selected').val();
          var fee = fee_type.substr(fee_type.indexOf('_')+1,fee_type.length);
          var number_of_persons = $('#number_of_persons2').val();
          $('#fee2').val('GHS '+Number(fee).toFixed(2));
          fee = Number(fee) * Number(number_of_persons);
          $('#total_amount2').val('GHS '+Number(fee).toFixed(2));

        })



    </script>
</body>

</html>
