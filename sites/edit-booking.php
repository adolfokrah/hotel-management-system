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
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
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
                        <h4 class="page-title">New Booking</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Bookings</li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Booking</li>
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
              <?php
              $deleted = 'false';


                  if(isset($_GET['b']) && !empty($_GET['b']) && isset($_GET['del']) && !empty($_GET['del']) && isset($_SESSION['user_id'])){
                      $id = mysqli_real_escape_string($conn,$_GET['b']);
                      $del = mysqli_real_escape_string($conn,$_GET['del']);
                      if($del == 'true'){
                        $query2 = mysqli_query($conn,"select * from bookings left join admins on bookings.user = admins.id  where b_id = '$id'");
                        $user_id  = $_SESSION['user_id'];
                        $date = gmdate('Y-m-d H:i:s');
                        if(mysqli_num_rows($query2) != null){
                          mysqli_query($conn,"INSERT INTO `deleted_records` (`d_id`, `user`, `date_time`, `b_id`) VALUES (NULL, '$user_id', '$date', '$id');");
                          mysqli_query($conn,"update bookings set status = 'Checked out' where b_id='$id'");
                        }

                      }
                      //fetch booking

                  }

                  $booking_info = '';
                  if(isset($_GET['b']) && !empty($_GET['b'])){
                      $id = mysqli_real_escape_string($conn,$_GET['b']);

                      //fetch booking
                      $query = mysqli_query($conn,"select * from bookings left join admins on bookings.user = admins.id  where b_id = '$id'");
                       $booking_info = mysqli_fetch_assoc($query);
                  }
              ?>
               <div class="row">
<div class="col-sm-12">
  <div class="alert alert-info">This booking was made by <strong><?php echo $booking_info['username']; ?> . </strong> USER ID: <strong><?php echo $booking_info['id'] ?></strong>. This booking was made on <strong><?php echo gmdate('d M, Y h:i A ',strtotime($booking_info['date_time_created']))?></strong>. Booking ID: <strong><?php echo str_pad($booking_info['b_id'],5,"0",STR_PAD_LEFT); ?></strong></div>

<?php if(isset($_SESSION['user_id'])){
    $user_id = $_SESSION['user_id'];
    $query_selected_booking_deleted = mysqli_query($conn,"select * from deleted_records left join admins on deleted_records.user = admins.id where deleted_records.b_id = '".$booking_info['b_id']."'");
      if($fetch_deleted_booking = mysqli_fetch_assoc($query_selected_booking_deleted)){
        $deleted  = 'true';
   ?>
  <div class="alert alert-danger">This booking was deleted by <strong><?php echo $fetch_deleted_booking['username']; ?> . </strong> USER ID: <strong><?php echo $fetch_deleted_booking['id'] ?></strong>. This booking was deleted on <strong><?php echo gmdate('d M, Y h:i A ',strtotime($fetch_deleted_booking['date_time']))?></strong></div>
<?php }}?>
</div>
               </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <form >
                    <div class="row justify-content-between">
                        <div class="col-md-7 col-12">

                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Select guest</h5>
                                    <h6 class="card-subtitle">Select from a list of already visited guests</h6>
                                    <div class="form-group ">
                                            <select  id="guest_select" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option>Select</option>
                                                    <?php
                                            $query = mysqli_query($conn,"select * from guest order by g_name asc");
                                            while($fetch = mysqli_fetch_assoc($query)){
                                                echo '<option value="'.$fetch['g_phone'].'-'.$fetch['g_name'].'">'.$fetch['g_name'].'</option>';
                                            }
                                        ?>

                                                </select>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-5">
                                            <h6>Guest Name <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <input type="text" class="form-control" id="guest_name" aria-describedby="name" placeholder="Guest Name" value="<?php echo $booking_info['guest_name']; ?>" name="guest_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <h6>Guest Mobile Number <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <input type="text" max="10" class="form-control" id="guest_number" aria-describedby="name" value="<?php echo $booking_info['guest_phone']; ?>"  placeholder="Guest Number" name="geust_mobile_number" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-3">
                                            <h6>+No. of Persons </h6>

                                            <div class="form-group ">
                                                <input type="number" min="0" name="no_persons"  class="form-control" id="no_persons" aria-describedby="name" value="<?php echo $booking_info['no_persons'] > 0 ? $booking_info['no_persons'] -1 : 0; ?>"  required>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Check in Date Time <font color="red">*</font></h6>
                                            <h6 class="card-subtitle">Date and Time at which guest will check in</h6>
                                            <div class="form-group ">
                                                <input readonly type="datetime-local" value="<?php echo date('Y-m-d',strtotime($booking_info['checkin']));?>T<?php echo date('H:i',strtotime($booking_info['checkin']));?>" min="<?php echo date('Y-m-d');?>T<?php echo gmdate('H:i')?>" name="checkin_date_time" class="form-control" id="check_in_date" placeholder="12/01/03 11:00 PM" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Check out Date Time <font color="red">*</font></h6>
                                            <h6 class="card-subtitle">Date and Time at which guest will check out</h6>
                                            <div class="form-group ">
                                                <input readonly type="datetime-local" value="<?php echo date('Y-m-d',strtotime($booking_info['checkout']));?>T<?php echo date('H:i',strtotime($booking_info['checkout']));?>" min="<?php echo date('Y-m-d') ?>T00:00" name="checkout_date_time" class="form-control" id="check_out_date" aria-describedby="name" placeholder="12/01/02 12:00 PM" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Room Type <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <select id="room_type" required name="room_type" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option value="<?php echo mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms left join room_type on rooms.room_type = room_type.rt_id where rooms.r_id = '".$booking_info['b_room']."' "))['rt_id']?>"><?php echo $booking_info['b_roomtype']?></option>
                                                    <?php
                                            $query = mysqli_query($conn,"select * from room_type where room_name != '".$booking_info['b_roomtype']."' order by rt_id desc");
                                            while($fetch = mysqli_fetch_assoc($query)){
                                                echo '<option value="'.$fetch['rt_id'].'">'.$fetch['room_name'].'</option>';
                                            }
                                        ?>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Room <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <select required name="room" id="rooms" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                <?php
                                                        $query = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms where r_id = '".$booking_info['b_room']."'"));

                                                        echo '<option value='.$query['r_id'].'>'.$query['r_name'].'</option>';
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Discount Type</h6>
                                            <h6 class="card-subtitle">Apply Discount if any (optional)</h6>
                                            <div class="form-group ">
                                                <select required name="discount_type" id="discount_type" class="select2 form-control custom-select" style="width: 100%; height:36px;">

                                                    <?php
                                                        if($booking_info['discount_type'] == 'percent'){
                                                    //         echo '<option value="percent">Percentage %</option>
                                                    // <option value="fixed">Fixed Amount ₵</option>';
                                                    echo '
                                            <option value="fixed">Fixed Amount ₵</option>';
                                                        }else{
                                                            //echo '<option value="fixed">Fixed Amount ₵</option><option value="percent">Percentage %</option>';
                                                            echo '<option value="fixed">Fixed Amount ₵</option>';
                                                        }
                                                    ?>



                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Discount</h6>
                                            <h6 class="card-subtitle">Enter discount based on discount type selected</h6>
                                            <div class="form-group ">
                                                <div class="form-group ">
                                                    <input type="number" min="1" name="discount" class="form-control" id="discount_value" aria-describedby="name" placeholder="eg. 10" value="<?php echo $booking_info['discount_value'] ?>">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <h6>Discount Reason</h6>
                                            <h6 class="card-subtitle">Specify the reason for giving this discount</h6>
                                            <div class="form-group ">
                                                <div class="form-group ">
                                                    <textarea name="discount_reason" class="form-control" id="discount_reason" aria-describedby="name"><?php echo $booking_info['discount_reason']?></textarea/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <strong>Please not all fields with <font color="red">*</font> are mandatory</strong>
                                        </div>
                                    </div>
                                    <input type="hidden" value = "<?php echo $booking_info['b_id'] ?>" id="booking_id"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-5">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Summary</h5>
                                    <h6 class="card-subtitle">The total price consist of the Discount and Room price</h6>
                                    <hr>
                                    <?php
                                        $room_price = $booking_info['original_price'];
                                        $discount = $booking_info['discount'];
                                        $amount_due = $booking_info['price'];
                                        $days = $booking_info['nights'];
                                        $extra_charge = $booking_info['extra_charge'];
                                        $amount_due +=$extra_charge;
                                        $total_amount = $booking_info['price'];
                                        $amount_due_amuont = $booking_info['original_price'] * $days;
                                        $extra_hours = round($booking_info['extra_hours']);
                                        $e_days = 0;
                                        if($extra_charge > 0 && $extra_hours < 1){
                                          $e_days = $extra_charge/$room_price;
                                          //$e_days = sprintf('%1',$e_days);
                                        }
                                    ?>
                                     <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Days</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="days"><?php echo $days;?></h6>
                                        </div>
                                    </div>



                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Room Price</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="room_price_label">₵ <?php echo sprintf('%0.2f',$room_price);?></h6>
                                            <input type="hidden" readonly value ="<?php echo $room_price;?>" id="room_price" name="room_price"/>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Amount Due</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="room_price_amount_due_label">₵ <?php echo sprintf('%0.2f',$amount_due_amuont);?></h6>
                                            <input type="hidden" readonly value ="<?php echo $amount_due_amuont;?>" id="room_price_amount_due" name="total_amount"/>
                                        </div>
                                    </div>


                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Discount</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="discount_label"> - ₵ <?php echo sprintf('%0.2f',$discount);?></h6>
                                            <input type="hidden" readonly value ="<?php echo $discount;?>" id="discount" name="discount"/>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Total amount</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="amount_due_label">₵ <?php echo sprintf('%0.2f',$total_amount);?></h6>
                                            <input type="hidden" readonly value ="<?php echo $total_amount;?>" id="amount_due" name="total_amount"/>
                                        </div>
                                    </div>

                                    <?php if($booking_info['status'] == 'Checked out'){ ?>
                                    <div style="border-top:dotted 2px #ccc; width:100%; height:1px"></div>
                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                       <div class="col-sm-6">
                                           <h6>Extra hours</h6>
                                       </div>
                                       <div class="col-sm-6" style="text-align:right">
                                           <h6 id="edays"><?php echo $extra_hours;?></h6>
                                       </div>
                                   </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                       <div class="col-sm-6">
                                           <h6>Extra Days</h6>
                                       </div>
                                       <div class="col-sm-6" style="text-align:right">
                                           <h6 id="edays"><?php echo $e_days;?></h6>
                                       </div>
                                   </div>
                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Extra charge</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="extra_charge_label">₵ <?php echo sprintf('%0.2f',$extra_charge);?></h6>
                                            <input type="hidden" readonly value ="<?php echo $extra_charge;?>" id="discount" name="extra_charge"/>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h4 style="font-weight:9000; font-size:18px">Total Amount + Extra charges</h4>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h4 style="font-weight:9000; font-size:22px" id="total_amount_label">₵ <?php echo sprintf('%0.2f',$amount_due);?></h4>
                                            <input type="hidden" readonly value ="<?php echo $amount_due;?>" id="amount_due" name="total_amount2"/>
                                        </div>
                                    </div>
                                <?php  }
                                    ?>
                                    <hr>
                                    <h6>Booking Status</h6>

                                    <?php
                                    if(mysqli_num_rows(mysqli_query($conn,"select * from deleted_records where b_id = '".$booking_info['b_id']."'")) != null){
                                         echo '';
                                    }else if($booking_info['status'] == 'Checked in'){
                                            echo '
                                            <div class="custom-control custom-radio">
                                        <input type="radio" data="Confirmed" name="customRadio1" id="Confirmed_id" class="custom-control-input" >
                                        <label class="custom-control-label" id="Confirmed" for="Confirmed_id">Confirmed</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Checked_in" name="customRadio1" id="Checked_id" class="custom-control-input" checked>
                                        <label class="custom-control-label" id="Checked_in" for="Checked_id">Checked in</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Checked_out" name="customRadio1" id="Checked_out_id" class="custom-control-input">
                                        <label class="custom-control-label" id="Checked_out" for="Checked_out_id">Checked out</label>
                                    </div>
                                    ';
                                        }else if($booking_info['status'] == 'Confirmed'){
                                           echo ' <div class="custom-control custom-radio">
                                        <input type="radio" data="Confirmed" name="customRadio1" id="Confirmed_id" class="custom-control-input" checked>
                                        <label class="custom-control-label" id="Confirmed" for="Confirmed_id">Confirmed</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Checked_in"  name="customRadio1" id="Checked_id" class="custom-control-input" >
                                        <label class="custom-control-label" id="Checked_in" for="Checked_id">Checked in</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Checked_out"  name="customRadio1" id="Checked_out_id" class="custom-control-input">
                                        <label class="custom-control-label" id="Checked_out" for="Checked_out_id">Checked out</label>
                                    </div>';
                                        }else if($booking_info['status'] == 'New Booking'){
                                           echo '
                                           <div class="custom-control custom-radio">
                                        <input type="radio" data="New_Booking" name="customRadio1" id="new_booking" class="custom-control-input" checked>
                                        <label class="custom-control-label" id="New_Booking" for="new_booking">New Booking</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Confirmed" name="customRadio1" id="Confirmed_id" class="custom-control-input" >
                                        <label class="custom-control-label" id="Confirmed" for="Confirmed_id">Confirmed</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Checked_in" name="customRadio1" id="Checked_id" class="custom-control-input" >
                                        <label class="custom-control-label" id="Checked_in" for="Checked_id">Checked in</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" data="Checked_out" name="customRadio1" id="Checked_out_id" class="custom-control-input">
                                        <label class="custom-control-label" id="Checked_out" for="Checked_out_id">Checked out</label>
                                    </div>';
                                        }else{
                                             echo '<p>Checked out</p>';
                                        }

                                    ?>



                                    <br>

                                    <h6 class="card-subtitle" style="color:red;">Please cross check, make sure all details are entered correctly.</h6>
                                    <?php

                                    if($role !='manager'){
                                      if($booking_info['status'] == 'Checked out'){
                                          echo ' <button type="button" class="btn btn-successs btn-block" style="background-color:#dee2e6; border:thin solid #dee2e6;">This client has been checked out</button>';
                                      }else{
                                          if(mysqli_num_rows(mysqli_query($conn,"select * from deleted_records where b_id = '".$booking_info['b_id']."'")) != null){
                                               echo ' <button type="button" class="btn btn-danger btn-block" style=" padding-top:10px;padding-bottom:10px; color:white;" >This booking has been deleted</button>';
                                          }else{
                                               echo ' <div class="row">
                                                <div class="col-sm-6"><button type="button" class="btn btn-successs btn-block" style="background-color:#07C452; padding-top:10px;padding-bottom:10px; color:white;"  id="saveBtn" >Save Changes</button></div>
                                                <div class="col-sm-6">

                                                <button type="button" class="btn btn-danger btn-block" style=" padding-top:10px;padding-bottom:10px; color:white;" onclick="deleteBooking()"  id="saveBtn" >Delete booking</button></div>
                                               </div>
                                               ';
                                          }
                                      }
                                  }

                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
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
    <!-- This Page JS -->
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../dist/js/pages/forms/select2/select2.init.js"></script>
    <script>
         var changed = false;
         var fetch_room = false;
         var  room_no_persons = <?php echo mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms left join room_type on rooms.room_type = room_type.rt_id where rooms.r_id = '".$booking_info['b_room']."' "))['num_persons']?>;
        $('#guest_select').on('change',function(){
            var guest = $(this).val();
            $('#guest_number').val(guest.substring(0,guest.indexOf('-')));
            $('#guest_name').val(guest.substring(guest.indexOf('-')+1,guest.length));
        })

        $('#discount_value').on('keyup',function(){
            calculatePricewithDiscount();
        })
        $('#discount_type').on('change',function(){
            calculatePricewithDiscount();
        })
        $('#check_in_date').on('change',function(){
           var date = $(this).val().substring(0,$(this).val().indexOf('T'));
           var date2 = $('#check_out_date').val();
           date2 = date2.substring(0,date2.indexOf('T'));
           date = new Date(date);
           date2  = new Date(date2);

           var newdate2 = new Date(date.getTime()+1000*60*60*24);
           var month = newdate2.getMonth()+1;
           var day = newdate2.getDate();
           var newDate = newdate2.getFullYear()+'-'+(month.toString().length < 2 ? '0'+month : month)+'-'+(day.toString().length < 2 ? '0'+day : day)+'T00:00';
           if(date >= date2){

               $('#check_out_date').val(newDate);
           }
           $('#check_out_date').attr('min',newDate);
           changed = true;

             fetchAvailableRooms();

        })



         $('#check_out_date').on('change',function(){
               changed = true;

                 fetchAvailableRooms();

         })

         $('#room_type').on('change',function(){
             fetch_room = true;
             fetchAvailableRooms();
         })


         function calculatePricewithDiscount(){
             var discount_type = $('#discount_type :selected').val();
             var room_price = Number($('#room_price').val()) * $('#days').text();
             if(room_price > 0){
                 var discount = $('#discount_value').val();
                 if(discount_type == "percent"){
                     discount = discount/100 * room_price;
                 }

                 var days = $('#days').text();
                 room_price  = room_price;
                 $('#discount_label').html(' - ₵ '+Number(discount).toFixed(2));
                 $('#discount').val(Number(discount).toFixed(2));
                 var amount_due = Number(room_price) - discount;
                 $('#amount_due_label').html('₵ '+Number(amount_due).toFixed(2));
                 $('#amount_due').val(Number(amount_due).toFixed(2));

             }else{
                 Swal.fire({
                             title: '',
                             text: "please select a room",
                             icon: 'warning',
                             showCancelButton: false
                       })
               $('#discount_value').val("0");
             }
         }


        function fetchAvailableRooms(){
            var room_type = $('#room_type').val();
            $('#room_price_label').html('₵ '+Number(0).toFixed(2));

            $('#amount_due_label').html('₵ '+Number(0).toFixed(2));

            $('#room_price').val(Number(0).toFixed(2));
            $('#discount_label').html('₵ '+Number(0).toFixed(2));
            $('#discount').val(Number(0).toFixed(2));
            $('#amount_due').val(Number(0).toFixed(2));
            if(room_type == 'Select'){
                $("#rooms").empty();
                return;
            }
            var date = $('#check_in_date').val();
            date = date.replace("T"," ");
            var date2 = $('#check_out_date').val();
            date2 = date2.replace("T"," ");

            var selected_room =  $('#rooms').val();
            $("#rooms").empty();


            //alert(date+'...'+date2); return;
            //alert(room_type);

             $('#saveBtn').html('calculating amount...');
                    $('#saveBtn').attr('disabled','true');
            var request = new XMLHttpRequest();
            var params = 'room_type='+room_type+'&check_in_date='+date+'&check_out_date='+date2+'&booking_id='+$('#booking_id').val();
            request.onreadystatechange = (e) => {
                if (request.readyState !== 4) {
                    return;
                }

                if (request.status === 200) {

                     $('#saveBtn').html('Save Changes');
                    $('#saveBtn').removeAttr('disabled');
                    var select = $("#rooms").select2();
//                    select.val(null).trigger("change");
                   // alert('f')


                    var data = JSON.parse(request.responseText);

                    if(data.length < 1){
                        Swal.fire({
                            title: '',
                            text: 'Room Type '+$('#room_type :selected').text()+" has no rooms available",
                            icon: 'warning',
                            showCancelButton: false
                      })

                    }else{
                         room_no_persons = data[0].no_persons;
                        var no_persons = $('#no_persons').val();
                        $('#no_persons').attr('max',(Number(room_no_persons) -1));
                        if((Number(no_persons)+ 1) > Number(room_no_persons) ){
                            if(Number(room_no_persons) > 1){
                                 Swal.fire({
                                    title: '',
                                    text: "This room can take up to "+room_no_persons+" people",
                                    icon: 'warning',
                                    showCancelButton: false
                                })
                               return;

                            }else{
                                 Swal.fire({
                                    title: '',
                                    text: "This room can take only "+room_no_persons+" person",
                                    icon: 'warning',
                                    showCancelButton: false
                                })
                               return;

                            }
                            $('#no_persons').val(Number(room_no_persons) -1);
                        }
                    }
                    var checkin = $('#check_in_date').val();
                    var checkout = $('#check_out_date').val();
                    checkin = checkin.substr(0,checkin.indexOf("T"));
                    checkout = checkout.substr(0,checkout.indexOf("T"));
                    var date1 = new Date(checkin);
                    var date2 = new Date(checkout);
                    var diffTime = Math.abs(date2 - date1);
                    var diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                    if(diffDays == 0){
                      diffDays = 1;
                    }
                    var room_price = data.length > 0 ? data[0].price : 0;
                    var discount = $('#discount').val();
                    var amount_due = (Number(room_price) * diffDays);
                     var room_price_amount_due = Number(room_price) * diffDays;
                    $('#room_price_label').html('₵ '+Number(room_price).toFixed(2));
                    $('#discount_label').html('₵ '+Number(discount).toFixed(2));
                    $('#amount_due_label').html('₵ '+Number(amount_due).toFixed(2));

                    $('#room_price').val(Number(room_price).toFixed(2));
                    $('#discount').val(Number(discount).toFixed(2));
                    $('#amount_due').val(Number(amount_due).toFixed(2));
                    diffDays =  data.length > 0 ? diffDays : 1;
                    $('#days').html(diffDays);

                    $('#room_price_amount_due_label').text((Number(room_price_amount_due)).toFixed(2));
                    $('#room_price_amount_due').val((Number(room_price_amount_due)).toFixed(2));
                    calculatePricewithDiscount();


                    $("#rooms").select2({
                        data: data
                    });

                    $("#rooms").select2().select2('val',selected_room);



                } else {
                     $('#saveBtn').html('Save Changes');
                    $('#saveBtn').removeAttr('disabled');
                    Swal.fire({
                        title: 'Error',
                        text: "Connection failed",
                        icon: 'warning',
                        showCancelButton: false
                  })
                    //console.warn('error');
                }
            };

            request.open('POST', '../assets/includes/fetch_rooms_by_type');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(params);
        }


        var booking_status = $('input[type = radio]:checked').attr('data');
        $('.custom-control-label').on('click',function(){
            booking_status = $(this).attr('id');

        })

        // $('input[type = radio]').on('change',function(){
        //   alert('hello');
        // })

        $('#saveBtn').on("click",function (){
            //alert('hell');
            var guest_name= $('#guest_name').val();
            var guest_number= $('#guest_number').val();
            var no_persons= $('#no_persons').val();
            var check_in_date= $('#check_in_date').val();
            var check_out_date= $('#check_out_date').val();
            var room_type= $('#room_type :selected').text();
            var rooms= $('#rooms').val();
            var discount_type= $('#discount_type').val();
            var discount_value= $('#discount_value').val();
            var room_price= $('#room_price').val();
            var discount= $('#discount').val();
            var total_amount= $('#amount_due').val();
             var discount_reason = $('#discount_reason').val();

           // alert(total_amount); return;
            check_in_date = check_in_date.replace("T"," ");
            check_out_date = check_out_date.replace("T"," ");
            var days = $('#days').html();
            if(guest_name.trim().length > 0 && guest_number.trim().length > 0 && check_in_date.trim().length > 0 && check_out_date.trim().length > 0 && rooms > 0 && room_price > 0){

                var date1 = new Date(check_in_date.substr(0,check_in_date.indexOf(" ")));
                var date2 = new Date(check_out_date.substr(0,check_out_date.indexOf(" ")));

                if(room_price <= 0){
                      Swal.fire({
                      title: '',
                      text: "Reselect room",
                      icon: 'warning',
                      showCancelButton: false
                  })
                 return;
                }

                if(discount_reason.trim().length < 1 && discount > 0){
                    Swal.fire({
                    title: '',
                    text: "Please specify why you are giving such a discount",
                    icon: 'warning',
                    showCancelButton: false
                    })
                 return;
                }else if(discount < 1){
                 discount_reason = '';
                }

                // if(new Date() < date1 && booking_status == 'Checked_in'){
                //         booking_status = 'Confirmed';
                // }

                if(new Date().getDate() > date1.getDate() && changed){
                        Swal.fire({
                        title: '',
                        text: "Check in date should not be less than today",
                        icon: 'warning',
                        showCancelButton: false
                    })
                   return;
                }

                if(date1 > date2){
                   Swal.fire({
                        title: '',
                        text: "Check in date should not be greater than or same as checkout date",
                        icon: 'warning',
                        showCancelButton: false
                    })
                   return;
                }

                if(no_persons >= room_no_persons){
                     Swal.fire({
                        title: 'Failed',
                        text: $('#rooms :selected').text()+" can take up to "+room_no_persons+" persons",
                        icon: 'warning',
                        showCancelButton: false
                     })
                    $('#no_persons').val(Number(room_no_persons)-1);
                }else{
                    $('#saveBtn').html('Please wait...');
                    $('#saveBtn').attr('disabled','true');
                    var request = new XMLHttpRequest();
                    var params = 'guest_name='+guest_name+'&guest_number='+guest_number+'&no_persons='+no_persons+'&check_in_date='+check_in_date+'&check_out_date='+check_out_date+'&room_type='+room_type+'&room='+rooms+'&discount_type='+discount_type+'&discount_value='+discount_value+'&room_price='+room_price+'&discount='+discount+'&total_amount='+total_amount+'&booking_status='+booking_status+'&no_persons='+(Number(no_persons)+1)+'&booking_id='+$('#booking_id').val()+'&discount_reason='+discount_reason+'&days='+days;
                    request.onreadystatechange = (e) => {
                        if (request.readyState !== 4) {
                            return;
                        }

                        if (request.status === 200) {
                            $('#saveBtn').html('Save Booking');
                            $('#saveBtn').removeAttr('disabled');
                            //alert(request.responseText);
                            if(request.responseText.indexOf('success') > -1){
                                Swal.fire("Done!", "Booking updated", "success")
                                setTimeout(function(){
                                    window.location.href = window.location.href
                                },2000)

                            }else{
                                 Swal.fire({
                                    title: '',
                                    text: request.responseText,
                                    icon: 'warning',
                                    showCancelButton: false
                                 })

                            }

                        } else {
                            $('#saveBtn').html('Save Booking');
                            $('#saveBtn').removeAttr('disabled');
                           Swal.fire({
                            title: 'Error',
                            text: "Connection failed",
                            icon: 'warning',
                            showCancelButton: false
                         })
                            //console.warn('error');
                        }
                    };

                    request.open('POST', '../assets/includes/update-booking');
                    request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
                    request.send(params);
                }

            }else{
                Swal.fire({
                    title: 'Failed',
                    text: "Please fill all mandatory fields",
                    icon: 'warning',
                    showCancelButton: false
                 })
            }

        })

        function deleteBooking(){
          Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this booking?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, Delete!'
          }).then((result) => {
            if (result.value) {

              window.location.href = window.location.href+'&del=true';
            }
          })
        }



    </script>
</body>

</html>
