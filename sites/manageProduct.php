<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
date_default_timezone_set("Africa/Accra");
include_once "../assets/includes/connect.php";
$datetime = date('Y-m-d h:m:s');
$action = mysqli_real_escape_string($conn, $_POST['action']);
$name = mysqli_real_escape_string($conn, $_POST['name']);
$price = mysqli_real_escape_string($conn, $_POST['price']);
$cost = mysqli_real_escape_string($conn, $_POST['cost']);
$quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
$limit = mysqli_real_escape_string($conn, $_POST['limit']);
$item_id = mysqli_real_escape_string($conn, $_POST['item_id']);
$drinks = mysqli_real_escape_string($conn, $_POST['drinks']);
$totalQty = mysqli_real_escape_string($conn, $_POST['totalQty']);
$totalCost = mysqli_real_escape_string($conn, $_POST['totalCost']);
$start = $conn->real_escape_string($_POST['start']);
$end = $conn->real_escape_string($_POST['end']);
$drinks = stripslashes($drinks);
$user = $_SESSION['fullname'];


if ($action == 'add') {
    add($name, $price, $quantity, $limit, $user,$datetime,$cost);
} elseif ($action == "fetch") {
    fetch();
} elseif ($action == 'del') {
    del($item_id, $user, $name, $price,$datetime);
} elseif ($action == 'update') {
    update($name, $price, $quantity, $limit, $item_id, $user,$datetime,$cost);
}elseif ($action == "sell") {
  sell($user,$datetime,$drinks,$totalQty,$totalCost);
}elseif ($action == "fetchSales") {
  fetchSales($start,$end);
}elseif ($action == "return") {
  retSale($item_id,$name,$quantity);
}


//FUNCTION TO UPDATE PRODUCTS
function update($name, $price, $quantity, $limit, $item_id, $user,$datetime,$cost)
{
    //converting params to int
    $price += 0;
    $quantity += 0;
    $limit += 0;
    global $conn;
    //First Check for Change . IF no change in product details close connection
    $columns_array = array('price', 'quantity', 'limit_alert');

    foreach ($columns_array as $detail) {
        $sql = $conn->query("SELECT $detail from bar_products WHERE product_name = '$name'");
        if (!$sql) {
            die($conn->error);
        }
        $row = $sql->fetch_assoc();
        $dt = $row[$detail];
        $dt = (double)$dt;
        $db_details[] = $dt;
    }

    if ($price == $db_details[0] && $quantity == $db_details[1] && $limit == $db_details[2]) {
        die("no change");
    }

    $price_diff = $price - $db_details[0];
    $qty_diff = $quantity - $db_details[1];
    $limit_diff = $limit - $db_details[2];
    //NOW CHECK TO SEE IF THERE WAS ADDITION OR SUBTRACTION
    if ($price < $db_details[0]) {
        $price_act = 'decreased';
    } elseif ($price > $db_details[0]) {
        $price_act = 'increased';
    } else {
        $price_act = 'equal';
    }


    if ($quantity < $db_details[1]) {
        $quantity_act = 'decreased';
    } elseif ($quantity > $db_details[1]) {
        $quantity_act = 'increased';
    } else {
        $quantity_act = 'equal';
    }


    if ($limit < $db_details[2]) {
        $limit_act = 'decreased';
    } elseif ($limit > $db_details[2]) {
        $limit_act = 'increased';
    } else {
        $limit_act = 'equal';
    }



    $init_price = $db_details[0];
    $init_qty = $db_details[1];
    $init_limit = $db_details[2];
    $dt_array = array('price', 'quantity', 'limit alert');
    foreach ($dt_array as $dt) {
        if ($dt == 'price') {
            $act = $price_act;
            $figure = $price_diff;
            $initial = $init_price;
            $new_fig = $figure + $initial;
            $worth = $init_qty * $new_fig;
        } elseif ($dt == 'quantity') {
            $figure = $qty_diff;
            $act = $quantity_act;
            $initial = $init_qty;
            if ($act == 'decreased') {
              $act_worth = $price * $qty_diff;
              $new_fig = $initial- abs($qty_diff);
              $worth = $price * $new_fig;
            }else if($act == 'increased'){
              $new_fig = $initial + $figure;
              $act_worth = $price * $figure;
              $worth = $price * $quantity;
            }
        } else {
            $figure = $limit_diff;
            $act = $limit_act;
            $initial = $init_limit;
            $new_fig = $initial + $figure;
            $worth = 0;
            $act_worth =0;
        }
        if ($act != 'equal') {
            $query = $conn->query("INSERT INTO `bar_operations_history`(`user`, `item`, `detail_type`, `figure`,`initial`, `new_fig`,`action`, `action_worth`,`worth`, `date`) VALUES ('$user','$name','$dt','$figure','$initial','$new_fig','$act','$act_worth','$worth','$datetime')");
            if (!$query) {
                die($conn->error);
            }
        }
    }

    //UPDATING DETAILS IN DB
    $query = $conn->query("UPDATE bar_products SET price = '$price',cost = '$cost', quantity = '$quantity', limit_alert = '$limit' WHERE p_id = '$item_id'");
    if (!$query) {
        die($conn->error);
    }
    echo "success";

}


//FUNCTION TO DELETE BAR PRODUCTS AND INSERT THEM INTO BAR HISTORY
function del($item_id, $user, $name, $price,$datetime)
{
    global $conn;

    $result = $conn->query("SELECT quantity FROM bar_products WHERE p_id = '$item_id' ");
    if (!$result) {
        die($conn->error);
    }
    $row = $result->fetch_assoc();
    $quantity = $row['quantity'];

    $result = $conn->query("DELETE FROM `bar_products` WHERE p_id = '$item_id'");
    if (!$result) {
        die($conn->error);
    }
    $worth = $price * $quantity;
    //INSERTING TO HISTORY ITEM DELETED AND QUANTITY

    $result = $conn->query("INSERT INTO `bar_history`(`user`, `item`, `quantity`, `action`, `worth`, `date`) VALUES ('$user','$name','$quantity','deletion',$worth,'$datetime')");

    if (!$result) {
        die($conn->error);
    }

    echo "success";

}


//FUNCTION TO ADD NEW PRODUCTS TO THE BAR
function add($name, $price, $quantity, $limit, $user,$datetime,$cost)
{
    //Checking if the new Product already exist
    global $conn;
    if ($conn->query("SELECT * FROM bar_products WHERE product_name = '$name'")->num_rows != null) {
        die('exist');
    } else {
        $sql = "INSERT INTO `bar_products`(`product_name`, `quantity`, `price`, `limit_alert`,`cost`) VALUES ('$name','$quantity','$price','$limit','$cost')";
        $result = $conn->query($sql);
        if (!$result) {
            die($conn->error);
        }
        //calculating worth of products being added
        $worth = $price * $quantity;
        $total_cost = $cost * $quantity;
        $result = $conn->query("INSERT INTO `bar_history`(`user`, `item`, `quantity`,cost,`total_cost`,`price`,`limit_alert`, `action`, `worth`, `date`) VALUES ('$user','$name','$quantity','$cost','$total_cost','$price','$limit','insertion','$worth','$datetime')");
        if (!$result) {
            die($conn->error);
        }
        echo "success";
    }
}


//FUNCTION TO FETCH PRODUCTS IN BAR
function fetch()
{
    global $conn;

    $result = $conn->query("SELECT * FROM bar_products");
    if (!$result) {
        die($conn->error);
    }
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);
}




//FUNCTION TO SELL Products
function sell($user,$datetime,$drinks,$totalQty,$totalCost){
  $batch_id = date('y/m/d/h/m/s');
  $batch_id = str_replace("/","",$batch_id);
  global $conn;
  $drinks = json_decode($drinks);

  foreach ($drinks as $drink) {
    $product_name = $drink[0];
    $price = $drink[1];
    $subtotal = $drink[3];
    $qty = $subtotal/$price;
    //check if quantity didnt change
    $check_qty_results = $conn->query("SELECT quantity FROM bar_products WHERE product_name = '$product_name'");
    if (!$check_qty_results) {
      die("first query ".$conn->error);
    }
    //if quantity is greater , die script
    $row = $check_qty_results -> fetch_assoc();
    if (intval($row['quantity']) < $qty) {
      die('error');
    }
  }


  foreach ($drinks as $drink) {
    //get drink cost

    $product_name = $drink[0];
    $product_name = str_replace("-", " ",$product_name);
    $get_cost = $conn->query("SELECT * FROM bar_products WHERE product_name = '$product_name'");
    if (!$get_cost) {
      die("sec query ".$conn->error);
    }
    $row = $get_cost->fetch_assoc();
    $cost = $row['cost'];
    $price = $drink[1];
    $subtotal = $drink[3];
    $qty = $subtotal/$price;
    $subtotal_cost = $qty * $cost;
    $profit = $subtotal - $subtotal_cost;

    //Inserting into sales record
  $sales_results = $conn->query("INSERT INTO `bar_sales`(`user`, `product_name`, `quantity`, `price_per_item`, `subtotal`,`profit`, `batch_id`, `date_time`, `returned`) VALUES ('$user','$product_name','$qty','$price','$subtotal','$profit','$batch_id','$datetime',false)");
  if (!$sales_results) {
    die("3rd query ".$conn->error);
  }
  //updating remaining quantity in stock
  $update_quantity_results = $conn->query("UPDATE bar_products set quantity = quantity-$qty WHERE product_name = '$product_name'");
  if (!$update_quantity_results) {
    die("last query ".$conn->error);
  }
  }
  echo "success";

}



//FUNCTION TO FETCH SALES MADE
function fetchSales($start,$end)
{
  $user  = $_SESSION['fullname'];
  $username  = $_SESSION['username'];
  global $conn;
  //Check if user logged in role is admin
  $check_user_results = $conn->query("SELECT role from admins WHERE username = '$username' ");
  if (!$check_user_results) {
    die($conn->error);
  }
  $row = $check_user_results -> fetch_assoc();
  $role = $row['role'];
  $is_admin = ($role == "admin" || $role == "manager") ? true : false ;
  if ($is_admin) {
    //if user looged in is admin then fetch all sales made
    $fetch_sales_sql = "SELECT * FROM `bar_sales` WHERE (DATE(date_time) BETWEEN '$start' and '$end') and quantity != 0";
    $fetch_returns_sql = "SELECT * FROM bar_sales WHERE (DATE(date_time) BETWEEN '$start' and '$end') and returned = true";
  }else{
    //else fetch only sales made by that bar man
    $fetch_sales_sql = "SELECT * FROM `bar_sales` WHERE (DATE(date_time) BETWEEN '$start' and '$end') and user ='$user' and quantity != 0";
    $fetch_returns_sql = "SELECT * FROM bar_sales WHERE (DATE(date_time) BETWEEN '$start' and '$end') and returned = true and user = '$user'";
  }
  $sales_results = $conn->query($fetch_sales_sql);
  $returns_results = $conn->query($fetch_returns_sql);
  if (!$sales_results || !$returns_results) {
    die($conn->error);
  }
  $sales_array = array();
  while ($row = $sales_results->fetch_assoc()) {
    $sales_array[] = $row;
  }
  $returns_array = array();
  while ($row = $returns_results->fetch_assoc()) {
    $returns_array[] = $row;
  }
  $all_array['sales'] = $sales_array;
  $all_array['returns'] = $returns_array;
  echo json_encode($all_array);

}



//FUNCTION TO RETURN SALES
function retSale($item_id, $name,$quantity) {
  global $conn;
  $quantity = intval($quantity);

if ($quantity <= 0) {
  die("error");
}
//first check if returning drink has quantity left unreturned
$check = $conn->query("SELECT * FROM bar_sales WHERE bs_id = '$item_id'");
if (!$check) {
  die($conn->error);
}
$row = $check->fetch_assoc();
$quantity_left = $row['quantity'];
$quantity_left = intval($quantity_left);
if ($quantity_left == 0 || $quantity > $quantity_left) {
  die("error");
}
$unit_price = floatval($row['price_per_item']);
$subtotal_deduction = $unit_price * $quantity;

  $retSale_results = $conn->query("UPDATE bar_sales SET returned = 1, qty_returned = qty_returned+$quantity, quantity = quantity-$quantity, subtotal = subtotal-$subtotal_deduction WHERE bs_id = '$item_id'");
  if (!$retSale_results) {
    die($conn->error);
  }

  $updateQty_results = $conn->query("UPDATE bar_products SET quantity = quantity + $quantity WHERE product_name = '$name'");
  if (!$updateQty_results) {
    die($conn->error);
  }
  echo "success";

}
