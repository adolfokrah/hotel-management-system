<?php
    include 'connect.php';

    if(isset($_SESSION['user_id']) && !empty($_SESSION['user_id'])){

        $user_id = $_SESSION['user_id'];
        $guest_name = mysqli_real_escape_string($conn,$_POST["guest_name"]);
        $guest_number = mysqli_real_escape_string($conn,$_POST["guest_number"]);
        $no_persons = mysqli_real_escape_string($conn,$_POST["no_persons"]);
        $check_in_date = mysqli_real_escape_string($conn,$_POST["check_in_date"]);
        $check_out_date = mysqli_real_escape_string($conn,$_POST["check_out_date"]);
        $room_type = mysqli_real_escape_string($conn,$_POST["room_type"]);
        $room = mysqli_real_escape_string($conn,$_POST["room"]);
        $discount_type = mysqli_real_escape_string($conn,$_POST["discount_type"]);
        $discount_value = mysqli_real_escape_string($conn,$_POST["discount_value"]);
        $room_price = mysqli_real_escape_string($conn,$_POST["room_price"]);
        $discount = mysqli_real_escape_string($conn,$_POST["discount"]);
        $total_amount = mysqli_real_escape_string($conn,$_POST["total_amount"]);
        $booking_status = mysqli_real_escape_string($conn,$_POST["booking_status"]);
        $no_persons = mysqli_real_escape_string($conn,$_POST["no_persons"]);
        $booking_id = mysqli_real_escape_string($conn,$_POST["booking_id"]);
        $discount_reason = mysqli_real_escape_string($conn,$_POST["discount_reason"]);
        $booking_status = str_replace('_',' ',$booking_status);
        $check_in_date = date('Y-m-d H:i:s',strtotime($check_in_date));
        $check_out_date = date('Y-m-d H:i:s',strtotime($check_out_date));
        $booking_date = gmdate('Y-m-d h:i:s');
        $days = mysqli_real_escape_string($conn,$_POST["days"]);
        $check_in_date1 =  new DateTime($check_in_date);
        $check_out_date1 =  new DateTime($check_out_date);
        $diff = $check_in_date1->diff($check_out_date1);
        //$days = $diff->days + 1;


        $insert  = '';
        //check if room has a checked in or comfirmed record
        $query_check = mysqli_query($conn,"select * from bookings where b_room = '$room' and b_id != '$booking_id' and (status = 'Checked in' or status = 'Confirmed')");
        while($fetch_booking = mysqli_fetch_assoc($query_check)){
            $insert = 'false';
            $b_checkin_date = $fetch_booking['checkin'];
            $b_checkout_date = $fetch_booking['checkout'];

            if($check_in_date < $b_checkin_date && $check_out_date < $b_checkin_date){
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
             $room_type = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms left join room_type on rooms.room_type = room_type.rt_id where rooms.r_id = '$room'"))['room_name'];
            //$total_amount = $total_amount * $days;
            //pick previous days
            $previous_amount = mysqli_fetch_assoc(mysqli_query($conn,"select * from bookings where b_id = '$booking_id'"))['price'];
            $extra_charge = 0;
            // if($total_amount > $previous_amount  && $booking_status == 'Checked out'){
            //     $extra_charge = $total_amount - $previous_amount;
            //     $total_amount = $previous_amount;
            // }

            $difference = 0;
            if($booking_status == 'Checked out'){
              $check_in_date1 =  new DateTime($check_out_date);
              $check_out_date1 =  new DateTime(gmdate('Y-m-d H:i:s'));

              $diff = $check_in_date1->diff($check_out_date1);
              $new_days = $diff->days;

              $starttimestamp = strtotime($check_out_date);
            	$endtimestamp = strtotime(gmdate('Y-m-d H:i:s'));



              if($check_out_date1 > $check_in_date1){
                	$difference = abs($endtimestamp - $starttimestamp)/3600;
                if($difference >=1 && $difference < 2){
                  $extra_charge = 20;
                }else if($difference >=2 && $difference < 3){
                    $extra_charge = 30;
                }else if($difference >=3 && $difference < 5){
                    $extra_charge = 40;
                }else if($difference >=5 && $difference < 6){
                    $extra_charge = 50;
                }else{
                  if($difference >= 6 && $new_days < 1){
                    $extra_charge = 1 * $room_price;

                  }else if($new_days > 0 && $check_out_date1 > $check_in_date1) {
                    $extra_charge = $new_days * $room_price;
                    $difference = 0;
                  }
                }
              }


            }


            mysqli_query($conn,"UPDATE `bookings` SET `b_roomtype` = '$room_type', `b_room` = '$room', `guest_name` = '$guest_name', `guest_phone` = '$guest_number', `no_persons` = '$no_persons', `checkin` = '$check_in_date', `checkout` = '$check_out_date', `nights` = '$days',`discount_reason`='$discount_reason', `original_price` = '$room_price', `price` = '$total_amount', `discount` = '$discount', `discount_type` = '$discount_type', `discount_value` = '$discount_value', `extra_charge` = '$extra_charge',  `status` = '$booking_status',extra_hours='$difference' WHERE `bookings`.`b_id` = '$booking_id'");

            //insert guest
            $room_name = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms where r_id = '$room'"))['r_name'];
            $date = gmdate('Y-m-d h:i:s');
            $b =  str_pad($booking_id,5,"0",STR_PAD_LEFT);
            $message = "<a href=\"edit-booking?b=\"$booking_id\">\"$b\"</a> Booking details updated room_type=>$room_type,room=>$room_name,=>guest name=>$guest_name,=>guest phone =>$guest_number,=>no persons=>$no_persons.=>checkin=>$check_in_date,=>checkout=>$check_out_date,=>nights=>$days,=>original price=>$room_price,=>price=>$total_amount=>discount=>$discount=>discout type=>$discount_type=>discount value=>$discount_value=>extra charge=>$extra_charge=>status=>$booking_status=>bookings=>$booking_id";
            mysqli_query($conn,"INSERT INTO `hotel_operation_histories` (`h_id`, `operation_desc`, `user_id`, `date_time`) VALUES (NULL, '$message', '$user_id', '$date');");

            echo 'success';
        }else{
            $room_name = mysqli_fetch_assoc(mysqli_query($conn,"select * from rooms where r_id = '$room'"))['r_name'];
            echo 'A Guest was just checked in to '.$room_name;
        }

    }
?>
