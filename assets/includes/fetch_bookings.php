<?php
    include 'connect.php';

    //first fetch all rooms

    $bookings = array();
    $rooms = array();
    $fields = array();
    $table_bookings = array();
    $query = mysqli_query($conn,"select * from rooms order by r_id asc");
    while($fetch = mysqli_fetch_assoc($query)){
        $array = array();
        $array['id'] = $fetch['r_id'];
        $array['name'] = $fetch['r_name'];
        array_push($rooms,$array);
    }


    //now fetch bookins

     $first_date = mysqli_escape_string($conn,$_POST['first_date']);
      $last_date = mysqli_escape_string($conn,$_POST['last_date']);

    //  $first_date = $first_date.' 00:00:00';
    //  $last_date = $last_date.' 24:00:00';


        // $first_date = date('Y-m-d',strtotime($first_date);
        // $last_date = date('Y-m-d',strtotime($last_date);
        //
        // echo $first_date; die();
      $string = "SELECT * FROM `bookings` left join admins on bookings.user = admins.id where date(bookings.date_time_created) BETWEEN '$first_date' and '$last_date'";
      //echo $string;
    $query_check = mysqli_query($conn,$string);
    while($fetch_bookings = mysqli_fetch_assoc($query_check)){
        $status = '<span class="badge badge-primary">New Booking</span>';
        $class = 'new-booking';
        if($fetch_bookings['status'] == 'Confirmed'){
            $class = 'confirmed-booking';
             $status = '<span class="badge badge-success">Confirmed</span>';
        }else if($fetch_bookings['status'] == 'Checked in'){
             $class = 'checked-in-booking';
             $status = '<span class="badge badge-warning">Checked in</span>';
        }else if($fetch_bookings['status'] == 'Checked out'){
             $class = 'checked-out-booking';
              $status = '<span class="badge badge-info">Checked out</span>';
        }

        if(mysqli_num_rows(mysqli_query($conn,"select * from deleted_records where b_id = '".$fetch_bookings['b_id']."'")) != null){
             $class = 'deleted-booking';
              $status = '<span class="badge badge-danger">Deleted</span>';
        }
        $array = array();
        $array['name'] = $fetch_bookings['guest_name'];
        $array['location'] = $fetch_bookings['b_room'];
        $array['start'] = $fetch_bookings['checkin'];
        $array['end'] = $fetch_bookings['checkout'];
        $array['className']  = $class;
        $array['data']  = array();
        $array['data']['booking_id'] = $fetch_bookings['b_id'];
        array_push($bookings,$array);
        $room_name = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms where r_id = '".$fetch_bookings['b_room']."'"))['r_name'];
        $array_w = array('<a href="edit-booking?b='.$fetch_bookings['b_id'].'" >'.$fetch_bookings['guest_name'].'</a>',date('M d, Y h:i A',strtotime($fetch_bookings['checkin'])),date('M d, Y h:i A',strtotime($fetch_bookings['checkout'])),$room_name,'₵ '.$fetch_bookings['price'],$status,$fetch_bookings['username'],gmdate('d M, Y h:i A',strtotime($fetch_bookings['date_time_created'])));
        array_push($table_bookings,$array_w);
    }

    $fields['rooms'] = $rooms;
    $fields['bookings'] = $bookings;
    $fields['table_bookings'] = $table_bookings;

    echo json_encode($fields);
?>
