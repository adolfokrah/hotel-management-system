<?php
    include 'connect.php';
    $room_type = mysqli_real_escape_string($conn,$_POST['room_type']);
    $check_in_date = mysqli_real_escape_string($conn,$_POST['check_in_date']);
    $check_out_date = mysqli_real_escape_string($conn,$_POST['check_out_date']);
    $booking_id = mysqli_real_escape_string($conn,$_POST['booking_id']);

    $check_in_date = date('Y-m-d H:i:s',strtotime($check_in_date));
    $check_out_date = date('Y-m-d H:i:s',strtotime($check_out_date));

    $price = mysqli_fetch_assoc(mysqli_query($conn,"select * from room_type where rt_id = '$room_type'"))['price'];
    $no_persons = mysqli_fetch_assoc(mysqli_query($conn,"select * from room_type where rt_id = '$room_type'"))['num_persons'];
    $rooms = array();
    $query = mysqli_query($conn,"select * from rooms where room_type = '$room_type'  and maintenance !='1' order by r_id asc");
    while($fetch = mysqli_fetch_assoc($query)){
        //check if room is not booked

        $id = $fetch['r_id'];
        $insert  = '';
        //check if room has a checked in or comfirmed record
        $query_check = '';
        if($booking_id != ''){
            $query_check = mysqli_query($conn,"select * from bookings where b_room = '$id'  and b_id !='$booking_id' and (status = 'Checked in' or status = 'Confirmed')");
        }else{
            $query_check = mysqli_query($conn,"select * from bookings where b_room = '$id'  and (status = 'Checked in' or status = 'Confirmed')");
        }
        while($fetch_booking = mysqli_fetch_assoc($query_check)){
            $insert = 'false';
            $b_checkin_date = $fetch_booking['checkin'];
            $b_checkout_date = $fetch_booking['checkout'];
            if($fetch_booking['status'] == 'Checked in' || $fetch_booking['status'] == 'Confirmed'){
              $insert = 'false';
              break;
            }else if($check_in_date < $b_checkin_date && $check_out_date < $b_checkin_date){
                if(mysqli_num_rows(mysqli_query($conn,"select * from deleted_records where b_id = '".$fetch_booking['b_id']."'"))==null){
                      $insert = 'true';
                }

                //echo $check_out_date.' ---- '.$b_checkin_date;
            }else if($check_in_date > $b_checkout_date && $check_out_date > $b_checkout_date){
               if(mysqli_num_rows(mysqli_query($conn,"select * from deleted_records where b_id = '".$fetch_booking['b_id']."'"))==null){
                      $insert = 'true';
                }
                //echo $fetch_booking['b_id'];
            }else{
                $insert = 'false';
                break;
            }

        }

        if(mysqli_num_rows($query_check) == null){
           $insert = 'true';
        }


        if($insert == 'true'){
            $room = array();
            $room['id'] = $fetch['r_id'];
            $room['text'] = $fetch['r_name'];
            $room['price'] = $price;
            $room['no_persons'] = $no_persons;
            array_push($rooms,$room);
        }

    }

    echo json_encode($rooms);
?>
