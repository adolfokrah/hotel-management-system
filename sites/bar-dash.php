<?php
date_default_timezone_set("Africa/Accra");
include_once "../assets/includes/connect.php";
$datetime = date('Y-m-d h:m:s');
$action = mysqli_real_escape_string($conn, $_POST['action']);
$user = mysqli_real_escape_string($conn, $_POST['user']);
$start = mysqli_real_escape_string($conn, $_POST['start']);
$end = mysqli_real_escape_string($conn, $_POST['end']);


if ($action == 'new') {
    newStock($user, $start, $end);
} elseif ($action == "del") {
    fetch_del($user, $start, $end);
} elseif ($action == 'inc') {
    fetch_inc($user, $start, $end);
} elseif ($action == 'dec') {
    fetch_dec($user, $start, $end);
} elseif ($action == 'sale') {
    fetch_sale($user, $start, $end);
}


function newStock($user, $start, $end) {
    global $conn;
    $get_new = $conn->query("SELECT * FROM bar_history WHERE DATE(date) BETWEEN '$start' and '$end' and action = 'insertion' and user = '$user'");
    if (!$get_new) {
        die($conn->error);
    }

    while ($row = $get_new->fetch_assoc()){
        $newStock[] = $row;
    }
    echo json_encode($newStock);
}

function fetch_del($user, $start, $end) {
    global $conn;
    $get_del = $conn->query("SELECT * FROM bar_history WHERE DATE(date) BETWEEN '$start' and '$end' and action = 'deletion' and user = '$user'");
    if (!$get_del) {
        die($conn->error);
    }
    while ($row = $get_del->fetch_assoc()) {
        $delStock[] = $row;
    }
    echo json_encode($delStock);

}

function fetch_inc($user, $start, $end) {
    global $conn;
    $get_inc = $conn->query("SELECT * FROM bar_operations_history WHERE DATE(date) BETWEEN '$start' and '$end' and user  = '$user' and action = 'increased' and detail_type = 'quantity'");
    if (!$get_inc) {
        die($conn->error);
    }
    while($row = $get_inc->fetch_assoc()) {
        $inc[] = $row;
    }
    echo json_encode($inc);
}


function fetch_dec($user, $start, $end) {
    global $conn;
    $get_dec = $conn->query("SELECT * FROM bar_operations_history WHERE DATE(date) BETWEEN '$start' and '$end' and user  = '$user' and action = 'decreased' and detail_type = 'quantity'");
    if (!$get_dec) {
        die($conn->error);
    }
    while($row = $get_dec->fetch_assoc()) {
        $dec[] = $row;
    }
    echo json_encode($dec);
}


function fetch_sale($user, $start, $end) {
    global $conn;
    $get_sale = $conn->query("SELECT * FROM bar_sales WHERE DATE(date_time) BETWEEN '$start' and '$end' and user  = '$user' and quantity != 0");
    if (!$get_sale) {
        die($conn->error);
    }
    while($row = $get_sale->fetch_assoc()) {
        $sale[] = $row;
    }
    echo json_encode($sale);
}
