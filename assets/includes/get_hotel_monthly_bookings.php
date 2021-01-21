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
         $array = array();
         $dayOne = $weeks_range[0];
       
         $dayTwo = $weeks_range[1];
        
        $dayOne .=' 00:00:00.000000';
        $dayTwo .=' 23:59:59.999999';
        
        $query = mysqli_query($conn,"SELECT * FROM bookings WHERE date_time_created between '$dayOne' and '$dayTwo'");
        
       
        $query2 = mysqli_query($conn,"SELECT * from deleted_records left join bookings on deleted_records.b_id = bookings.b_id where date_time between '$dayOne' and '$dayTwo' ");

                                                
        $amount  = mysqli_num_rows($query) - mysqli_num_rows($query2);
        
        $array['period'] = date('d,M',strtotime($dayOne)).' - '.date('d,M',strtotime($dayTwo));
        $array['amount'] = $amount;
        array_push($funds,$array); 
    }
    
    array_push($fields,$funds);
    echo json_encode($fields);
  
?>