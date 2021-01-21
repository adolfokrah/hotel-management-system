<?php

include 'connect.php';
$start_date = mysqli_real_escape_string($conn,$_POST['start_date']);
$end_date = mysqli_real_escape_string($conn,$_POST['end_date']);
$fields = array();
$chart = array();
$total_amounts = array();
$start_date = date('Y-m-d',strtotime($start_date));
$end_date = date('Y-m-d',strtotime($end_date));
$query = mysqli_query($conn,"select bookings.date_time_created,sum(bookings.price + bookings.extra_charge) as amount from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where date(bookings.date_time_created) between '$start_date' and '$end_date' and deleted_records.b_id is null group by date(bookings.date_time_created)");
while($fetch = mysqli_fetch_assoc($query)){
  $fetch['full_date'] = gmdate('jS M Y',strtotime($fetch['date_time_created']));
  $fetch['date_time_created'] = gmdate('jS M',strtotime($fetch['date_time_created']));

   array_push($chart,$fetch);
}

//fetch confirmed BOOKINGS

$con_bookings = mysqli_fetch_assoc(mysqli_query($conn,"select sum(bookings.price + bookings.extra_charge) as amount from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where date(bookings.date_time_created) between '$start_date' and '$end_date' and deleted_records.b_id is null and bookings.status = 'Confirmed'"));

$total_amounts['confirmed_bookings'] = $con_bookings['amount'];

$c_bookings = mysqli_fetch_assoc(mysqli_query($conn,"select sum(bookings.price + bookings.extra_charge) as amount from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where date(bookings.date_time_created) between '$start_date' and '$end_date' and deleted_records.b_id is null and (bookings.status = 'Checked in' or bookings.status = 'Checked out')"));
$total_amounts['conin_bookings'] = $c_bookings['amount'];

$t_bookings = mysqli_fetch_assoc(mysqli_query($conn,"select sum(bookings.price + bookings.extra_charge) as amount from bookings left join deleted_records on bookings.b_id = deleted_records.b_id where date(bookings.date_time_created) between '$start_date' and '$end_date' and deleted_records.b_id is null"));
$total_amounts['total_amount'] = $t_bookings['amount'];

$fields['chart'] = $chart;
$fields['total_amounts'] = $total_amounts;

echo json_encode($fields);
