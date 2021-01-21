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
                        <h4 class="page-title">All Rooms</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Rooms</li>
                                    <li class="breadcrumb-item active" aria-current="page">All Rooms</li>
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
                            $room_name = '';
                            $no_person= '';
                            $price = '';
                            $room_desc = '';

                            if(isset($_GET['edit']) && !empty($_GET['edit']) && isset($_GET['value']) && !empty($_GET['value']) && isset($_SESSION['user_id'])){

                                $id = mysqli_real_escape_string($conn,$_GET['edit']);
                                $id = str_replace('roomName_','',$id);
                                $room_name = mysqli_real_escape_string($conn,$_GET['value']);
                                $room_name = strtoupper($room_name);

                                 if(mysqli_num_rows(mysqli_query($conn,"select * from rooms where r_name= '$room_name' and r_id != '$id'"))==null){
                                     $date = gmdate('Y-m-d h:s:i');
                                     mysqli_query($conn,"UPDATE `rooms` SET `r_name` = '$room_name' WHERE `rooms`.`r_id` = '$id'");
                                      echo '<div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                             Room updated successfully to <strong>'.$room_name.'</strong>.</div>';

                                      $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                                      mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, 'room ( $room_name ) removed from  maintainance', '$user_id', '$date');");

                                 }else{
                                      echo '<div class="alert alert-danger">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                              <strong>'.$room_name.'</strong> already exist
                                            </div>';
                                 }

                            }

                            if(isset($_GET['room_type']) && !empty($_GET['room_type']) && isset($_GET['value']) && !empty($_GET['value']) && isset($_SESSION['user_id'])){

                                 $id = mysqli_real_escape_string($conn,$_GET['room_type']);
                                $id = str_replace('select_','',$id);
                                $room_type = mysqli_real_escape_string($conn,$_GET['value']);

                               if($fetch = mysqli_fetch_assoc(mysqli_query($conn,"select * from room_type where rt_id= '$room_type'"))){
                                   $room_type_name  = $fetch['room_name'];
                                   $room_name = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms where r_id = '$id'"))['r_name'];
                                    $date = gmdate('Y-m-d h:s:i');
                                     mysqli_query($conn,"UPDATE `rooms` SET `room_type` = '$room_type' WHERE `rooms`.`r_id` = '$id'");


                                   //updae booking price based on booking status
//                                    $query = mysqli_query($conn,"select * from bookings where b_room='$id' and status = 'New Booking' )");
//
//                                   if($fetch_booking = mysqli_fetch_assoc($query)){
//                                       $newPrice = $fetch['price'];
//                                       $discountType = $fetch_booking['discount_type'];
//                                       $discount = $fetch_booking['discount'];
//
//                                       //calculate for price
//
//                                   }

                                      echo '<div class="alert alert-success">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                           Room type for <strong>'.$room_name.'</strong> updated to <strong>'.$room_type_name.'</strong></div>';

                                      $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                                      mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, ' ( $room_name ) room type updated to $room_type_name', '$user_id', '$date');");
                               }

                            }

                             if(isset($_POST['add_room'])){
                                  $room_type = mysqli_real_escape_string($conn,$_POST['room_type']);
                                  $no_rooms = mysqli_real_escape_string($conn,$_POST['no_of_rooms']);
                                  $room_type_name = $query = mysqli_fetch_assoc(mysqli_query($conn,"select * from room_type where rt_id = '$room_type'"))['room_name'];


                                  //select last room the room type above
                                  $last_room = mysqli_query($conn,"select * from rooms where room_type = '$room_type' order by r_id desc");
                                 $id = 0;
                                 if($fetch = mysqli_fetch_assoc($last_room)){
                                     $id = $fetch['r_id'];
                                 }

                                 $counter = 0;

                                 while($counter < $no_rooms){
                                     $id++;
                                     $room_name = $room_type_name.' '.$id;

                                     mysqli_query($conn,"INSERT INTO `rooms` (`r_id`, `r_name`, `room_type`, `availability`, `maintenance`) VALUES (NULL, '$room_name', '$room_type', '', '');");

                                     $counter = $counter + 1;
                                     // echo $counter;
                                 }

                                 echo '<div class="alert alert-success" style="width:100%">
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                               Room(s) added successfully
                                            </div>';



                             }

                            if(isset($_GET['main']) && !empty($_GET['main']) && isset($_SESSION['user_id'])){
                               $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                                  //check if room type doesn't have sub rooms
                                  $id = mysqli_real_escape_string($conn,$_GET['main']);
                                  //get room type name
                                  $query_fetch = mysqli_query($conn,"select * from rooms where r_id = '$id'");


                                  if($fetch = mysqli_fetch_assoc($query_fetch)){
                                     $room_name = $fetch['r_name'];
                                      $date = gmdate('Y-m-d h:s:i');

                                       //check if guest are booked for this room
                                      $query = mysqli_query($conn,"select * from bookings where b_room='$id' and (status = 'Checked in' or status = 'Confirmed' )");
                                      if(mysqli_num_rows($query) == null){


                                              if($fetch['maintenance'] == "0"){
                                                  mysqli_query($conn,"update rooms set maintenance='1' where r_id = '$id'");
                                                 mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, 'room ( $room_name ) set to maintainance', '$user_id', '$date');");
                                              }else{
                                                   mysqli_query($conn,"update rooms set maintenance='0' where r_id = '$id'");
                                                 mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, 'room ( $room_name ) removed from  maintainance', '$user_id', '$date');");
                                              }

                                              echo '<div class="alert alert-success" style="width:100%">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <strong>'.$room_name.'</strong> maintainance status updated successfully.
                                                </div>';
                                          }else{
                                            echo '<div class="alert alert-danger" style="width:100%">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                                    <strong>'.$room_name.'</strong> has been booked and confirmed
                                                </div>';
                                      }

                                      }
                                  }


                                //get the room type id from get
                              if(isset($_GET['del']) && !empty($_GET['del']) && isset($_SESSION['user_id'])){

                                  $user_id = mysqli_real_escape_string($conn,$_SESSION['user_id']);
                                  //check if room type doesn't have sub rooms
                                  $id = mysqli_real_escape_string($conn,$_GET['del']);
                                  //get room type name
                                  $query_fetch = mysqli_query($conn,"select * from rooms where r_id = '$id'");
                                  $room_name = mysqli_fetch_assoc($query_fetch)['r_name'];

                                  if(mysqli_num_rows($query_fetch) != null){
                                      $date = gmdate('Y-m-d h:s:i');

                                      //check if guest are booked for this room
                                      $query = mysqli_query($conn,"select * from bookings where b_room='$id' and (status = 'Checked in' or status = 'Confirmed' )");
                                      if(mysqli_num_rows($query) == null){
                                          mysqli_query($conn,"delete from rooms where r_id = '$id'");
                                          mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, 'room ( $room_name ) deleted', '$user_id', '$date');");
                                              echo '<div class="alert alert-success" style="width:100%">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <strong>'.$room_name.'</strong> deleted successfully.
                                                </div>';

                                      }else{
                                            echo '<div class="alert alert-danger" style="width:100%">
                                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                                                    <h3 class="text-danger"><i class="fa fa-exclamation-triangle"></i> Failed</h3>
                                                    <strong>'.$room_name.'</strong> has been booked and confirmed
                                                </div>';
                                      }
                                  }



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
                                    <table id="file_export_room_types" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>ROOM NAME</th>
                                                 <th>ROOM TYPE</th>
                                                <th>MAX PERSONS<br/><small>PER ROOM</small></th>
                                                <th>PRICE</th>
                                                <th>ACTION</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            //fetch all room types in descending order
                                                $query = mysqli_query($conn,"select * from rooms left join room_type on rooms.room_type = room_type.rt_id order by rooms.r_id asc");
                                            //echo mysqli_error($conn);
                                                while($fetch = mysqli_fetch_assoc($query)){

                                                $options = '';
                                                 $query2  = mysqli_query($conn,"select * from room_type where rt_id != '".$fetch['room_type']."'");
                                                while($fetch2 = mysqli_fetch_assoc($query2)){
                                                    $options .='<option  value=" '.strip_tags($fetch2['rt_id']).'">'.strip_tags($fetch2['room_name']).'</option>';
                                                }

                                                $disalbe = '';
                                                $method = 'onclick="maintainance(\''.$fetch['r_id'].'\')"';
                                                $delete = '<span data-toggle="tooltip" data-placement="top" title="Click to delele row" class="btn mdi mdi-delete" style="cursor:pointer" onclick="deleteroom(\''.$fetch['r_id'].'\')"></span>';


                                                  if($role == 'manager'  || $role == 'bar' || $role =='hotel'){
                                                    $disalbe = 'disabled';
                                                    $delete = '';
                                                    $method = '';
                                                  }

                                                 $maintainanceStatus = '
                                                    <div data-toggle="tooltip" '.$method.' data-placement="top" title="Click to set to room to maintenance"  class="custom-control custom-switch" style="float:left">
                                                      <input '.$disalbe.'  type="checkbox" class="custom-control-input" id="customSwitch'.$fetch['r_id'].'">
                                                      <label class="custom-control-label" for="customSwitch'.$fetch['r_id'].'"></label>
                                                    </div>';


                                                  if($fetch['maintenance'] == 1){


                                                       $maintainanceStatus = '
                                                <div class="custom-control   custom-switch" '.$method.' data-toggle="tooltip" data-placement="top" title="Room is under maintenance"" style="float:left">
                                                  <input '.$disalbe.' type="checkbox" checked class="custom-control-input" id="customSwitch'.$fetch['r_id'].'">
                                                  <label class="custom-control-label" for="customSwitch'.$fetch['r_id'].'"></label>
                                                </div>';

                                                  }
                                                  echo ' <tr>
                                                 <td><input data-toggle="tooltip" '.$disalbe.' data-placement="top" title="Double click to edit" style="cursor:pointer" value="'.strip_tags($fetch['r_name']).'" readonly type="text" id="roomName_'.$fetch['r_id'].'" class="form-control input"/></td>
                                                 <td><select '.$disalbe.'  class="form-control select" id="select_'.$fetch['r_id'].'">
                                                    <option  value=" '.strip_tags($fetch['rt_id']).'">'.strip_tags($fetch['room_name']).'</option>
                                                    '.$options.'
                                                 </select></td>
                                                 <td>'.strip_tags($fetch['num_persons']).'</td>
                                                  <td><strong>₵ '.strip_tags($fetch['price']).'</strong></td>
                                                  <td style="text-align:right">
                                                  '.$maintainanceStatus.'

                                                  '.$delete.'

                                                  </td>
                                            </tr>';
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <h4  class="modal-title" id="myModalLabel">Add New Rooms</h4>

                            </div>
                            <div class="card-body">
                                <form method="post" action="all-rooms">


                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Room Type</label>
                                    <select name="room_type" required class="form-control">
                                        <?php
                                            $query = mysqli_query($conn,"select * from room_type order by rt_id desc");
                                            while($fetch = mysqli_fetch_assoc($query)){
                                                echo '<option value='.$fetch['rt_id'].'>'.$fetch['room_name'].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                    <div class="form-group">
                                    <label for="recipient-name" class="control-label">No. of Rooms</label>
                                    <input type="number" name="no_of_rooms" required class="form-control" id="recipient-name1">
                                </div>


                                <?php
                                  if($role == 'admin' ){
                                    ?>
                                    <button type="submit" name="add_room" class="btn btn-info waves-effect" data-dismiss="modal">Add Room (s)</button>
                                    <?php
                                  }
                                ?>

                        </form>
                            </div>
                        </div>



                        <div class="card">
                          <div class="card-body">
                            <h5 class="card-title">Summary</h5>
                            <h6 class="card-subtitle">The total number rooms per room type</h6>
                            <hr>


                            <?php
                              //fetch total_amount_label
                              $query_fetch = mysqli_query($conn,"SELECT room_type.room_name,rooms.room_type,count(*) as total FROM `rooms` left join room_type on rooms.room_type = room_type.rt_id group by room_type");

                              while($fetch = mysqli_fetch_assoc($query_fetch)){

                                ?>

                                <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                    <div class="col-sm-6">
                                        <h6><?php echo $fetch['room_name']?></h6>
                                    </div>
                                    <div class="col-sm-6" style="text-align:right">
                                        <h6  id="total_amount_label"> <?php echo $fetch['total'];?></h6>
                                    </div>
                                </div>

                                <?php
                              }
  ?>


                          </div>
                        </div>

                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- Recent comment and chats -->
                <!-- ============================================================== -->
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

    </script>
</body>

</html>
