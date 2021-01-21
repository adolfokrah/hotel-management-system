<?php
    include 'connect.php';
    $fields = array();
    $weeks = array();
    $earnings = array();
    $newWeeks = array();
    $start_date = mysqli_real_escape_string($conn,$_POST['start_date']);
    $end_date = mysqli_real_escape_string($conn,$_POST['end_date']);

    $month = date("m",strtotime($start_date));;
    $year = date("Y",strtotime($start_date));



    $week = date("W", strtotime($year . "-" . $month ."-01")); // weeknumber of first day of month

    $date = date("Y-m-d", strtotime($year . "-" . $month ."-01")); // first day of month
    array_push($weeks,$date);
    $unix = strtotime($year."W".$week ."+1 week");
    While(date("m", $unix) == $month){ // keep looping/output of while it's correct month

       array_push($weeks,date("Y-m-d", $unix-86400));
       array_push($weeks,date("Y-m-d", $unix));
       $unix = $unix + (86400*7);
    }
    $date = date("Y-m-d", strtotime("last day of ".$year . "-" . $month));
    array_push($weeks,$date);
    array_push($weeks,"");
    $weeks = array_chunk($weeks,2);
    $funds = array();
    foreach($weeks as $weeks_range){
         $dayOne = $weeks_range[0];

         $dayTwo = $weeks_range[1];

        array_push($newWeeks,date('d,M',strtotime($dayOne)).' - '.date('d,M',strtotime($dayTwo)));

        $dayOne .=' 00:00:00.000000';
        $dayTwo .=' 23:59:59.999999';

        $query = mysqli_query($conn,"SELECT sum(price + extra_charge) as total FROM bookings WHERE date_time_created between '$dayOne' and '$dayTwo'");
        //echo mysqli_num_rows($query);

        $amount2 = 0;
         $query2 = mysqli_query($conn,"SELECT * from deleted_records left join bookings on deleted_records.b_id = bookings.b_id where bookings.date_time_created between '$dayOne' and '$dayTwo'");

        while($fetch = mysqli_fetch_assoc($query2)){
            $amount2 = $fetch['price'] + $amount2 + $fetch['extra_charge'];
        }

        $amount  = mysqli_fetch_assoc($query)['total'] - $amount2;
        if($amount == '' || $amount == null || $amount < 0){
            $amount = 0;
        }
        array_push($funds,$amount);
    }
    array_push($funds,0);
    array_push($earnings,$funds);
    $fields['days'] = $newWeeks;
    $fields['earnings'] = $earnings;
    echo json_encode($fields);
?>
