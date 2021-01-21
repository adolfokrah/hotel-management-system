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
                                    <li class="breadcrumb-item active" aria-current="page">New Booking</li>
                                </ol>
                            </nav>
                        </div>
                    </div>

                </div>
            </div>

            <?php

              // if($role == 'manager'){
              //     echo "<script>window.open('bookings','_self')</script>";
              // }
            ?>
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
                  <div class="col-sm-12">
                      <?php
                        $query_check = mysqli_query($conn,"select bookings.b_id,rooms.r_name,bookings.guest_name,bookings.checkin from bookings left outer join deleted_records on bookings.b_id = deleted_records.b_id left join rooms on bookings.b_room  = rooms.r_id where bookings.checkout <= '".date('Y-m-d h:i:s')."' and status = 'Checked in' and deleted_records.b_id is null");
                        if(mysqli_num_rows($query_check) != null){
                          echo '
                            <div class="alert alert-danger">
                              You need to check out some guest  from the system. <a href="#" id="show_guests">Click here </a> to view them
                            </div>
                          ';
                        }
                       ?>
                  </div>
                </div>


                <!-- sample modal content -->
                <div id="show_guests_modal" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h3>Guests to be checked out from the system</h3>
                            </div>
                            <div class="modal-body">
                              <table class="table no-wrap v-middle">
                                  <thead>
                                      <tr class="border-0">
                                          <th class="border-0">CLIENT NAME</th>
                                          <th class="border-0">ROOM</th>
                                          <th class="border-0">CHECKED IN DATE</th>
                                          <th class="border-0"></th>

                                      </tr>
                                  </thead>
                                  <tbody>
<?php
while($fetch_bookings = mysqli_fetch_assoc($query_check)){
    echo '<tr>
        <td><a href="edit-booking?b='.$fetch_bookings['b_id'].'">'.$fetch_bookings['guest_name'].'</a></td>
          <td>'.$fetch_bookings['r_name'].'</td>
          <td>'.gmdate('d M, Y h:i:A',strtotime($fetch_bookings['checkin'])).'</td>

         <td> <i class="mdi mdi-arrow-up" style="color:red"></i></td>
    </tr>';

}
 ?></tbody></table>
                            </div>

                        </div>
                        <!-- /.modal-content -->
                    </div>
                  </div>
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
                                                <input type="text" class="form-control" id="guest_name" aria-describedby="name" placeholder="Guest Name" name="guest_name" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <h6>Guest Mobile Number <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <input type="text" max="10" class="form-control" id="guest_number" aria-describedby="name" placeholder="Guest Number" name="geust_mobile_number" required>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-3">
                                            <h6>+No. of Persons </h6>

                                            <div class="form-group ">
                                                <input type="number" min="0" name="no_persons"  class="form-control" id="no_persons" aria-describedby="name" value="0" required>
                                            </div>
                                        </div>

                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Check in Date Time <font color="red">*</font></h6>
                                            <h6 class="card-subtitle">Date and Time at which guest will check in</h6>
                                            <div class="form-group ">
                                                <input type="datetime-local" value="<?php echo date('Y-m-d');?>T<?php echo gmdate('H:i')?>" min="<?php echo date('Y-m-d');?>T<?php echo gmdate('H:i')?>" name="checkin_date_time" class="form-control" id="check_in_date" placeholder="12/01/03 11:00 PM" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Check out Date Time <font color="red">*</font></h6>
                                            <h6 class="card-subtitle">Date and Time at which guest will check out</h6>
                                            <div class="form-group ">
                                                <input type="datetime-local" value="<?php echo date('Y-m-d',strtotime('+1 day')) ?>T12:00" min="<?php echo date('Y-m-d') ?>T00:00" name="checkout_date_time" class="form-control" id="check_out_date" aria-describedby="name" placeholder="12/01/02 12:00 PM" required>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Room Type <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <select id="room_type" required name="room_type" class="select2 form-control custom-select" style="width: 100%; height:36px;">
                                                    <option>Select</option>
                                                    <?php
                                            $query = mysqli_query($conn,"select * from room_type order by rt_id desc");
                                            while($fetch = mysqli_fetch_assoc($query)){
                                                echo '<option value='.$fetch['rt_id'].'>'.$fetch['room_name'].'</option>';
                                            }
                                        ?>

                                                </select>
                                            </div>

                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Room <font color="red">*</font></h6>
                                            <div class="form-group ">
                                                <select required name="room" id="rooms" class="select2 form-control custom-select" style="width: 100%; height:36px;"></select>
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
                                                    <!-- <option value="percent">Percentage %</option> -->
                                                    <option value="fixed">Fixed Amount ₵</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <h6>Discount</h6>
                                            <h6 class="card-subtitle">Enter discount based on discount type selected</h6>
                                            <div class="form-group ">
                                                <div class="form-group ">
                                                    <input type="number" min="1" name="discount" class="form-control" id="discount_value" aria-describedby="name" placeholder="eg. 10">
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12">
                                            <h6>Discount Reason</h6>
                                            <h6 class="card-subtitle">Specify the reason for giving this discount</h6>
                                            <div class="form-group ">
                                                <div class="form-group ">
                                                    <textarea name="discount_reason" class="form-control" id="discount_reason" aria-describedby="name"></textarea/>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <strong>Please not all fields with <font color="red">*</font> are mandatory</strong>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Summary</h5>
                                    <h6 class="card-subtitle">The total price consist of the Discount and Room price</h6>
                                    <hr>
                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Days</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="days">1</h6>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Room Price</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="room_price_label">₵ 0.00</h6>
                                            <input type="hidden" readonly value ="0" id="room_price" name="room_price"/>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Amount Due</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="room_price_amount_due_label">₵ 0.00</h6>
                                            <input type="hidden" readonly value ="0" id="room_price_amount_due" name="room_price"/>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h6>Discount</h6>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h6 id="discount_label"> - ₵ 0.00</h6>
                                            <input type="hidden" readonly value ="0" id="discount" name="discount"/>
                                        </div>
                                    </div>

                                    <div class="row" style="padding-top:10px; padding-bottom:10px;">
                                        <div class="col-sm-6">
                                            <h4 style="font-weight:9000; font-size:22px">Total Amount</h4>
                                        </div>
                                        <div class="col-sm-6" style="text-align:right">
                                            <h4 style="font-weight:9000; font-size:22px" id="amount_due_label">₵ 0.00</h4>
                                            <input type="hidden" readonly value ="0" id="amount_due" name="total_amount"/>
                                        </div>
                                    </div>


                                    <hr>
                                    <h6>Booking Status</h6>

                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="customRadio1" id="Confirmed_id" class="custom-control-input" checked>
                                        <label class="custom-control-label" id="Confirmed" for="Confirmed_id">Confirmed</label>
                                    </div>
                                    <div class="custom-control custom-radio">
                                        <input type="radio" name="customRadio1" id="Checked_id" class="custom-control-input" >
                                        <label class="custom-control-label" id="Checked_in" for="Checked_id">Checked in</label>
                                    </div>
                                    <br>

                                    <h6 class="card-subtitle" style="color:red;">Please cross check, make sure all details are entered correctly.</h6>
                                   <?php if($role != 'manager') {?>
                                       <button type="button" class="btn btn-success btn-block" style="background-color:#07C452; padding-top:10px;padding-bottom:10px" id="saveBtn">Save booking</button>
                                   <?php }?>
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

      $('#show_guests').on('click',function(){
        $('#show_guests_modal').modal('show');
      })
         var  room_no_persons = 0;
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
           var day = (new Date($(this).val()).getDate());
           var newDate = newdate2.getFullYear()+'-'+(month.toString().length < 2 ? '0'+month : month)+'-'+(day.toString().length < 2 ? '0'+day : day)+'T12:00';
           if(date >= date2){
             var day1 = newdate2.getDate();
             var newDate1 = newdate2.getFullYear()+'-'+(month.toString().length < 2 ? '0'+month : month)+'-'+(day.toString().length < 2 ? '0'+day1 : day1)+'T12:00';
               $('#check_out_date').val(newDate1);
           }
           $('#check_out_date').attr('min',newDate);
           fetchAvailableRooms();
        })


         $('#check_out_date').on('change',function(){
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

        $('#room_type').on('change',function(){
            fetchAvailableRooms();
        })

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


            $("#rooms").empty();


            //alert(date+'...'+date2); return;
            //alert(room_type);
             $('#saveBtn').html('calculating amount...');
                    $('#saveBtn').attr('disabled','true');
            var request = new XMLHttpRequest();
            var params = 'room_type='+room_type+'&check_in_date='+date+'&check_out_date='+date2+'&booking_id=';
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
                    diffDays =  data.length > 0 ? diffDays : 1;
                    var room_price = data.length > 0 ? data[0].price : 0;
                    var discount = $('#discount').val();


                    if(diffDays == 0){
                      diffDays = 1;
                    }

                    var amount_due = (Number(room_price) * diffDays);
                    var room_price_amount_due = Number(room_price) * diffDays;
                    $('#room_price_label').html('₵ '+Number(room_price).toFixed(2));
                    $('#discount_label').html('₵ '+Number(discount).toFixed(2));
                    $('#amount_due_label').html('₵ '+Number(amount_due).toFixed(2));
                    $('#days').html(diffDays);

                    $('#room_price').val(Number(room_price).toFixed(2));
                    $('#discount').val(Number(discount).toFixed(2));
                    $('#amount_due').val((Number(amount_due)).toFixed(2));

                    $('#room_price_amount_due_label').text((Number(room_price_amount_due)).toFixed(2));
                    $('#room_price_amount_due').val((Number(room_price_amount_due)).toFixed(2));
                    calculatePricewithDiscount();


                    $("#rooms").select2({
                        data: data
                    });


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


        var booking_status = 'Confirmed';
        $('.custom-control-label').on('click',function(){
            booking_status = $(this).attr('id');
            //alert(booking_status);
        })

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
            var days = $('#days').html();
           // alert(total_amount); return;
            check_in_date = check_in_date.replace("T"," ");
            check_out_date = check_out_date.replace("T"," ");

            if(guest_name.trim().length > 0 && guest_number.trim().length > 0 && check_in_date.trim().length > 0 && check_out_date.trim().length > 0 && rooms > 0 && room_price > 0){

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

                var date1 = new Date(check_in_date.substr(0,check_in_date.indexOf(" ")));
                var date2 = new Date(check_out_date.substr(0,check_out_date.indexOf(" ")));



                if(new Date() < date1 && booking_status == 'Checked_in'){
                        booking_status = 'Confirmed';
                }

                if(new Date().getDate() > date1.getDate()){
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

                    var params = 'guest_name='+guest_name+'&guest_number='+guest_number+'&no_persons='+no_persons+'&check_in_date='+check_in_date+'&check_out_date='+check_out_date+'&room_type='+room_type+'&room='+rooms+'&discount_type='+discount_type+'&discount_value='+discount_value+'&room_price='+room_price+'&discount='+discount+'&total_amount='+total_amount+'&booking_status='+booking_status+'&no_persons='+(Number(no_persons)+1)+'&discount_reason='+discount_reason+'&days='+days
                    request.onreadystatechange = (e) => {
                        if (request.readyState !== 4) {
                            return;
                        }

                        if (request.status === 200) {

                            $('#saveBtn').html('Save Booking');
                            $('#saveBtn').removeAttr('disabled');
                            //alert(request.responseText);
                            if(request.responseText.indexOf('success') > -1){
                                Swal.fire("Done!", "Booking saved", "success")
                                setTimeout(function(){
                                    window.location.href = 'new-booking'
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

                    request.open('POST', '../assets/includes/insert_booking');
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



    </script>
</body>

</html>
