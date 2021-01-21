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
    <title>Millenium Hotel - Expenses </title>
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
                        <h4 class="page-title">Expenses</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Expense</li>
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

                                 mysqli_query($conn,"update hotel_expenses set ex_status = 'deleted' where ex_id = '$id'");

                                 $fetch_e = mysqli_fetch_assoc(mysqli_query($conn,"select * from hotel_expenses where ex_id = '$id'"));
                                 $item = $fetch_e['product'];
                                 $price = $fetch_e['price'];
                                 $total_price = $fetch_e['total_price'];
                                 $date = gmdate('Y-m-d H:i:s');
                                 $message = "Expense deleted (Description=><strong>$item</strong>,Amount spente=><strong>GHS $price</strong>";
                                 mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date');");

                                 echo '
                                 <div class="alert alert-success">Record deleted</div>
                                 ';
                              }
                            }
                            if(isset($_POST['add_expens']) && isset($_SESSION['user_id'])){
                              $item = mysqli_real_escape_string($conn,$_POST['item']);
                              $price = sprintf('%0.2f',mysqli_real_escape_string($conn,$_POST['price']));
                              $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);

                              $total_price = $price;
                              $date = gmdate('Y-m-d H:i:s');

                              mysqli_query($conn,"INSERT INTO `hotel_expenses` (`ex_id`, `product`, `qty`, `price`, `total_price`, `ex_status`, `user_id`, `date_time`) VALUES (NULL, '$item', '0', '$price', '$total_price', 'new', '$user_id', '$date');");


                              $message = "New expense added Description=><strong>$item</strong>,Amount Spent=><strong>GHS $price</strong>";
                              mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date');");

                              echo '
                              <div class="alert alert-success">Expense added</div>
                              ';

                            }

                            if(isset($_POST['edit_expense']) && isset($_SESSION['user_id'])){
                              $item = mysqli_real_escape_string($conn,$_POST['item']);
                              $price = sprintf('%0.2f',mysqli_real_escape_string($conn,$_POST['price']));
                              $id = sprintf('%0.2f',mysqli_real_escape_string($conn,$_POST['e_id']));
                              $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);

                              $total_price = $price;
                              $date = gmdate('Y-m-d H:i:s');

                              mysqli_query($conn,"UPDATE `hotel_expenses` SET `product` = '$item', `qty` = '0', `price` = '$price', `total_price` = '$total_price' WHERE `hotel_expenses`.`ex_id` = $id");


                              $message = "Expense details updated ( Description=><strong>$item</strong>,Amount spent =><strong>GHS $price</strong>)";
                              mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date');");

                              echo '
                              <div class="alert alert-success">Expense updated</div>
                              ';

                            }
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
                                  <form action="expense" method="POST">
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

                                                 <th>DESCRIPTION</th>
                                                <th>AMOUNT SPENT</th>
                                                <th>DATE TIME</th>
                                                <th>ACTION</th>
                                                  <th>USER<th>
                                            </tr>
                                        </thead>
                                        <tbody >
                                            <?php

                                            //fetch all room types in descending order
                                             $query = null;
                                             $role = '';
                                             if(isset($_SESSION['role'])){
                                                $role = $_SESSION['role'];

                                               if($role == 'admin' || $role == 'manager'){
                                                 if($to == ''){

                                                     $query = mysqli_query($conn,"select * from hotel_expenses left join admins on hotel_expenses.user_id = admins.id where hotel_expenses.date_time >= '".gmdate('Y-m-d')." 00:00:00' and hotel_expenses.ex_status !='deleted'  order by hotel_expenses.ex_id desc");
                                                 }else{

                                                    $from = $from.' 00:00:00';
                                                    $to .= ' 00:00:00';
                                                     $query = mysqli_query($conn,"select * from hotel_expenses left join admins on hotel_expenses.user_id = admins.id where hotel_expenses.date_time between '$from' and '$to' and hotel_expenses.ex_status !='deleted'  order by hotel_expenses.ex_id desc");
                                                 }
                                               }else{
                                                 if($to == ''){
                                                     $query = mysqli_query($conn,"select * from hotel_expenses left join admins on hotel_expenses.user_id = admins.id where hotel_expenses.date_time >= '".gmdate('Y-m-d')." 00:00:00' and hotel_expenses.ex_status !='deleted' and hotel_expenses.user_id = '$user_id' order by hotel_expenses.ex_id desc");
                                                 }else{
                                                    $from = $from.' 00:00:00';
                                                    $to .= ' 00:00:00';
                                                     $query = mysqli_query($conn,"select * from hotel_expenses left join admins on hotel_expenses.user_id = admins.id where hotel_expenses.date_time between '$from' and '$to' and hotel_expenses.ex_status !='deleted' and hotel_expenses.user_id = '$user_id' order by hotel_expenses.ex_id desc");
                                                 }
                                               }
                                             }
                                             $total_items = 0;
                                             $total_price_made = 0;
                                            //echo mysqli_error($conn);

                                                while($fetch = mysqli_fetch_assoc($query)){

                                                  $buttons = '<span data-toggle="tooltip" data-placement="top" title="Click to edit this row" class="btn mdi mdi-lead-pencil" style="cursor:pointer; padding:0px;" onclick="editRoomType(\''.$fetch['ex_id'].'\',\''.$fetch['product'].'\',\''.$fetch['price'].'\',\''.$fetch['qty'].'\')"></span>

                                                  <span data-toggle="tooltip" data-placement="top" title="Click to delele row" class="btn mdi mdi-delete" style="cursor:pointer; padding:0px;" onclick="delete_ex(\''.$fetch['ex_id'].'\')"></span>';


                                                  if($role == 'manager'){
                                                    $buttons = '';
                                                  }
                                                  $total_items += $fetch['qty'];
                                                  $total_price_made += $fetch['total_price'];
                                                    echo '
                                                    <tr>
                                                      <td>'.strip_tags($fetch['product']).'</td>
                                                      <td>GHS '.strip_tags($fetch['total_price']).'</td>
                                                      <td>'.gmdate('D M, Y h:i A',strtotime($fetch['date_time'])).'</td>

                                                      <td>'.$buttons.'
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

                      <?php if($role !='manager'){ ?>
                        <div class="card">
                            <div class="card-header">
                                <h4  class="modal-title" id="myModalLabel">Add New Record</h4>

                            </div>
                            <div class="card-body">
                                <form method="post" action="expense">



                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Description </label>
                                    <textarea type="text" name="item" required class="form-control" id="recipient-name1"></textarea>
                                </div>



                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Amount spent </label>
                                    <input type="text" min="0" name="price" required class="form-control" id="recipient-name1">
                                </div>


                                <button type="submit" name="add_expens" class="btn btn-info btn-block waves-effect" data-dismiss="modal">Add Record</button>

                        </form>
                            </div>
                        </div>
                      <?php }?>
                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Summary</h5>
                            <h6 class="card-subtitle">The total amount spent on expenses</h6>
                            <hr>


                            <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                <div class="col-sm-6">
                                    <h4 style="font-weight:9000; font-size:17px">Total Amount Spent</h4>
                                </div>
                                <div class="col-sm-6" style="text-align:right">
                                    <h4 style="font-weight:9000; font-size:22px" id="total_amount_label">₵ <?php echo sprintf('%0.2f',$total_price_made);?></h4>
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
                            <h4 class="modal-title" id="myModalLabel">Edit Expense</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>



                          <div class="modal-body">
                            <form method="post" action="expense">

                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Description</label>
                                    <textarea type="text" name="item"  required class="form-control" id="item"></textarea>
                                </div>



                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Amount spent </label>
                                    <input type="text" min="0" name="price" required class="form-control" id="price">
                                </div>
                                <input type="hidden" id="e_id" name="e_id"/>


                                <button type="submit" name="edit_expense" class="btn btn-info btn-block waves-effect">Save Changes</button>

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

        function editRoomType(id,item,price,qty){

          $('#item').val(item);
          $('#price').val(price);
          $('#qty').val(qty);
          $('#e_id').val(id);
          $('#edit_expense').modal('show');
        }


    </script>
</body>

</html>
