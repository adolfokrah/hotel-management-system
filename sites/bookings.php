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
    <title>Millennium Hotel - Bookings Report</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/xtremeadmin/" />
    <!-- This Page CSS -->
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../dist/css/jquery.skedTape.css">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/datatables.net-bs4/css/responsive.dataTables.min.css">
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
                    <div class="col-11 align-self-center">
                        <h4 class="page-title">Bookings</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index">Dashboard</a></li>
                                    <li class="breadcrumb-item" aria-current="page">Bookings</li>
                                    <li class="breadcrumb-item active" aria-current="page">All Bookings</li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                    <div class="col-1" style="margin-top:10px; text-align:right">


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

                <div class="row">
                    <div class="col-sm-8">
                        <ul class="search-box" style="position:relative">
                            <li><span class="ti ti-search"></span></li>
                            <li style="width:90%"><input type="text" id="filterTable" placeholder="Search booking by guest name or phone number or room " /></li>
                        </ul>
                        <div style=" position: absolute; z-index:9000; left:0; top:50px; width:100%;  padding:10px; padding-top:0px;">
                            <div style=" padding-top:0px; background-color:white;" id="search_bookings">

                            </div>
                        </div>
                    </div>
                    <div class="col-sm-2" style="margin-top:-5px;">
                        <h5 style="font-size:10px;">Filter by date</h5>
                        <div class="form-group ">
                            <input type="date" value="<?php echo date('Y-m-d');?>" name="checkin_date_time" class="form-control" id="check_in_date" placeholder="12/01/03 11:00 PM" required>
                        </div>

                    </div>

                    <div class="col-sm-2" style="margin-top:-5px;">
                        <h5 style="font-size:10px;">to date</h5>
                        <div class="form-group ">
                            <input type="date" value="<?php
                            $date = date('Y-m-d',strtotime('last day of this month'));
                             if(date('Y-m-d') ==  $date){
                                $date = date('Y-m-d',strtotime($date.' + 7 days'));
                             }

                             echo $date;

                            ?>" name="checkin_date_time" class="form-control" id="check_out_date" placeholder="12/01/03 11:00 PM" required>
                        </div>
                    </div>

                </div>

                <div class="row">
                  <div class="col-sm-12">
                      <?php

                      if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){
                        $user_id = $_SESSION['user_id'];
                        $number = number_format(mysqli_num_rows(mysqli_query($conn,"select * from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where deleted_records.b_id is null and date(bookings.checkin) = '".date('Y-m-d')."' and bookings.user = '$user_id'")));

                          $amount = sprintf('%0.2f',mysqli_fetch_assoc(mysqli_query($conn,"select sum(price) as total from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where deleted_records.b_id is null and date(bookings.checkin) = '".date('Y-m-d')."' and bookings.user = '$user_id'"))['total']);

                          if($number  > 0){
                            echo '
                              <div class="alert alert-info">
                                You have made <strong>'.$number.'</strong> booking today worth <strong>GHS '.$amount.'</strong>
                              </div>
                            ';
                          }
                      }

                       ?>
                  </div>
                </div>


                <ul class="nav nav-tabs" id="myTab" role="tablist">

                    <li class="nav-item">
                        <a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"> <span id="table" style="font-size:20px; cursor:pointer;" data-toggle="tooltip" data-placement="top" title="View in table format" class="mdi mdi-view-headline filter-btn"></span></a>
                    </li>

                    <!-- <li class="nav-item">
                        <a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><span id="timeline" style="font-size:20px; cursor:pointer;" data-toggle="tooltip" data-placement="top" title="View in time sheet format" class="mdi mdi-view-list filter-btn "></span></a>
                    </li> -->
                </ul>

                <div class="tab-content" id="myTabContent">


                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">

                        <div class="card card-table">
                            <div class="card-body">

                                <div class="table-responsive">
                                    <table id="file_export_room_types" style="width:100%" class="table table-striped table-bordered">
                                        <thead>
                                            <tr>

                                                <th>CLIENT</th>
                                                <th>CHECK IN</th>
                                                <th>CHECK OUT</th>
                                                <th>ROOM</th>
                                                <th>TOTAL PRICE</th>
                                                <th>STATUS</th>
                                                <th>MADE BY</th>
                                                <th>DATE CREATED</th>

                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="tab-pane fade " id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div id="container"></div>
                    </div> -->
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->


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
    <script src="../dist/js/jquery.skedTape.js"></script>
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
    <script>
        // helpers
        function today(hours, minutes) {
            var date = new Date();
            date.setUTCHours(hours, minutes, 0, 0);
            return date;
        }

        function yesterday(hours, minutes) {
            var date = today(hours, minutes);
            date.setTime(date.getTime() - 24 * 60 * 60 * 1000);
            return date;
        }

        function tomorrow(hours, minutes) {
            var date = today(hours, minutes);
            date.setTime(date.getTime() + 24 * 60 * 60 * 1000);
            return date;
        }


        $('document').ready(function(){
          var first_date = $('#check_in_date').val();
          var last_date = $('#check_out_date').val();
          first_date = new Date(first_date);
          last_date = new Date(last_date);
          var date = new Date();


          fetchBookings(first_date, last_date);
        })
        // events


        //fetch bookings
        function fetchBookings(firstDay, lastDay) {

            var request = new XMLHttpRequest();
            var new_firstDay = firstDay.getFullYear() + '-' + (firstDay.getMonth() + 1) + '-' + firstDay.getDate();
            var new_lastDay = lastDay.getFullYear() + '-' + (lastDay.getMonth() + 1) + '-' + lastDay.getDate();

            //alert(new_firstDay + ' .... '+new_lastDay);
            //alert(new_firstDay);
            var params = 'first_date=' + new_firstDay + '&last_date=' + new_lastDay;
            request.onreadystatechange = (e) => {
                if (request.readyState !== 4) {
                    return;
                }

                if (request.status === 200) {
                    //alert(request.responseText);
                    var data = JSON.parse(request.responseText);
                    var bookings = data.bookings;
                    //var newBookings = [];
                    bookings.forEach(function(booking) {
                        booking.start = new Date(booking.start);
                        booking.end = new Date(booking.end);
                    })

                    var rooms = data.rooms;

                    //console.log(bookings);
                       //alert(lastDay);

                    //console.log(data.table_bookings);
                    $('#file_export_room_types').DataTable({
                        dom: 'Bfrtip',
                        paging:false,
                        destroy: true,
                        data: data.table_bookings,
                        ordering: false,
                        buttons: [
                            'copy', 'csv', 'excel', 'pdf', 'print'
                        ]
                    });
                    $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');

                    var mySchedule = $('#container').skedTape({
                        caption: 'Rooms',
                        start: firstDay,
                        end: lastDay,
                        showEventTime: true,
                        showEventDuration: true,
                        locations: rooms,
                        events: bookings,
                        minTimeGapShown: 1 * 60,
                        zoom: 0.1,
                        formatters: {
                            date: function(date) {
                                return $.fn.skedTape.format.date(date, 'l', '/');
                            },
                            duration: function(start, end, opts) {
                                return $.fn.skedTape.format.duration(start, end, {
                                    hrs: 'ч.',
                                    min: 'мин.'
                                });;
                            },
                        }
                    });

                    mySchedule.on('event:click.skedtape', function(e) {
                        console.log(e.detail.event);
                        window.location.href = 'edit-booking?b=' + e.detail.event.data.booking_id;
                        //$sked1.skedTape('removeEvent', e.detail.event.id);
                    });

                } else {
                    Swal.fire({
                        title: 'Error',
                        text: "Connection failed",
                        icon: 'warning',
                        showCancelButton: false
                    })
                    //console.warn('error');
                }
            };

            request.open('POST', '../assets/includes/fetch_bookings');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(params);
        }

        var btn = $(".filter-btn");
        btn.first().css('color', '#10b4de');
        $(".filter-btn").on("click", function() {
            $(".filter-btn").css('color', '#6e7980');
            $(this).css('color', '#10b4de');
            var id = $(this).attr('id');
            if (id == 'timeline') {
                $('.card-table').css('height', '0px');
                $('#container').css('height', 'auto');
            } else {
                $('.card-table').css('height', 'auto');
                $('#container').css('height', '0px');
            }
            //$('.mdi.active').css('color','#10b4de');
        })


        $('#check_in_date').on('change', function() {
            var first_date = $('#check_in_date').val();
            var last_date = $('#check_out_date').val();
            first_date = new Date(first_date);
            last_date = new Date(last_date);
            //alert(last_date);


            //alert(first_date);
            fetchBookings(first_date, last_date);
        });

        $('#check_out_date').on('change', function() {
            var first_date = $('#check_in_date').val();
            var last_date = $('#check_out_date').val();
            first_date = new Date(first_date);
            last_date = new Date(last_date);



            //alert(last_date);
            fetchBookings(first_date, last_date);
        });


        var table = $('#file_export_room_types').DataTable({
            dom: 'Bfrtip',
            ordering: false,
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ]
        });
        $('.buttons-copy, .buttons-csv, .buttons-print, .buttons-pdf, .buttons-excel').addClass('btn btn-primary mr-1');


        $('#filterTable').on("keyup",function(){
            var value = $(this).val();
            if(value.trim().length < 1){
                $('#search_bookings').html("");
                return;
            }

            $('#search_bookings').html('<p style="padding:10px;">Searching...<p>');


            var request = new XMLHttpRequest();

            //alert(new_firstDay + ' .... '+new_lastDay);
            //alert(new_firstDay);
            var params = 'search=' + value;
            request.onreadystatechange = (e) => {
                if (request.readyState !== 4) {
                    return;
                }

                if (request.status === 200) {
                   $('#search_bookings').html(request.responseText);

                } else {

                    //console.warn('error');
                }
            };

            request.open('POST', '../assets/includes/search_booking');
            request.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            request.send(params);
        })

        $(window).click(function(e) {
            $('#search_bookings').html("");
            $('#filterTable').val("");
        });
    </script>
</body>

</html>
