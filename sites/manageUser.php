<?php
include_once "../assets/includes/connect.php";

$action = mysqli_real_escape_string($conn, $_POST['action']);
$id = mysqli_real_escape_string($conn, $_POST['id']);
$value = mysqli_real_escape_string($conn, $_POST['value']);
$type = mysqli_real_escape_string($conn, $_POST['type']);
$fname = mysqli_real_escape_string($conn, $_POST['firstname']);
$lname = mysqli_real_escape_string($conn, $_POST['lastname']);
$uname = mysqli_real_escape_string($conn, $_POST['username']);
$pwd = mysqli_real_escape_string($conn, $_POST['password']);
$pwd = md5($pwd);
$role = mysqli_real_escape_string($conn, $_POST['role']);
$role = strtolower($role);

//Checking if the action is set and what type of action (add user or edit user)
if (!isset($action)) {
    die();
}
if ($action == 'add') {
    //if action is add, then insert into db
    add($uname, $fname, $lname, $pwd, $role);
} elseif ($action == 'edit') {
    //Else if action is edit, then update table
    edit($uname, $fname, $lname, $role, $id);

} elseif ($action == 'fetch') {
    //Else if action is fetch, then fetch table
    fetch();
} elseif ($action == 'delete') {

    deleteUser($id);
} elseif ($action == 'company') {
    updateCompanyDetails($value,$type);
}else {
    activate($action, $id);
}


//defining function to add rows to users
function add($uname, $fname, $lname, $pwd, $role)
{
    global $conn;
    //First check if username already exist
    $sql = "SELECT * FROM admins WHERE username = '$uname' and deleted = false";
    //run the query
    $result = $conn->query($sql);
    //checking if query run successfully
    if (!$result) {
        die($conn->error);
    }
    //checking if there's more than one results in db with that username
    if ($result->num_rows > 0) {
        die("exist");
    }
    $sql = "INSERT INTO `admins`(`username`, `firstname`, `lastname`,  `password`, `role`, `active`) VALUES ('$uname','$fname','$lname','$pwd','$role',0)";
    $result = $conn->query($sql);
    if (!$result) {
        die("$conn->error");
    }
    echo "success";
}


//function for editing records
function edit($uname, $fname, $lname, $role, $id)
{
    global $conn;
    //if the username is being edited, first check whether the new username is not already taken
    $sql = "SELECT * FROM admins WHERE username = '$uname' and id <> '$id'";
    $result = $conn -> query($sql);
    if (!$result) {
        die($conn -> error);
    }
    if ($result -> num_rows > 0){
        die("exist");
    }
    $sql = "UPDATE `admins` SET `username`='$uname',`firstname`='$fname',`lastname`='$lname',`role`='$role' WHERE id = '$id'";
    $result = $conn -> query($sql);

    if (!$result) {
        die($conn -> error);
    }
    echo "success";
}


//function to fetch table
function fetch()
{
    $arr = array();
    global $conn;
    $sql = "SELECT * FROM admins WHERE deleted = 0";
    $result = $conn->query($sql);

    if (!$result) {
        die($conn->error);
    }

    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
}


//activate or deactivate user account
function activate($action, $id)
{
    global $conn;
    if ($action == "activate") {
        $sql = "UPDATE admins set active = true WHERE id = '$id'";
        $result = $conn->query($sql);

        if (!$result) {
            die($conn->error);
        }

        echo "activated";
    } elseif ($action == "deactivate") {
        $sql = "UPDATE admins set active = false WHERE id = '$id'";
        $result = $conn->query($sql);

        if (!$result) {
            die($conn->error);
        }

        echo "deactivated";
    } else {
        echo "error";
    }
}


//delete user account
function deleteUser($id)
{
    global $conn;

    $sql = "UPDATE admins set deleted = true WHERE id = '$id'";
    $result = $conn->query($sql);

    if (!$result) {
        die($conn->error);
    }

    echo "deleted";

}

//function to update company details
function updateCompanyDetails($value, $type) {
    global $conn;
   $result =  $conn ->query("UPDATE company_details SET $type = '$value'");
   if (!$result) {
       die("error $conn->error");
   }
    echo 'Changes Saved';
}
