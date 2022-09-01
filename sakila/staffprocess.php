<?php

session_start();

$update = false;
$staff_id = '';
$first_name = '';
$last_name = '';
$address_id = '';
$picture = '';
$email = '';
$store_id = '';
$active = '';
$username = '';
$password = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $staff_id = $_POST['staff_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address_id = $_POST['address_id'];
    $picture = $_POST['picture'];
    $email = $_POST['email'];
    $store_id = $_POST['store_id'];
    $active = $_POST['active'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO staff (staff_id, first_name, last_name, address_id, picture, email, store_id, active, username, password, last_update) VALUES('$staff_id', '$first_name', '$last_name', '$address_id', '$picture', '$email', '$store_id', '$active', '$username', '$password', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: staff.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the staff_id DOESN'T exist in THIS table.\n
                                        2)Make sure the address_id already EXISTS in ADDRESS table.\n
                                        3)Make sure the store_id already EXISTS in STORE table.");
        header("location: staff.php");
    }
    
}

if (isset($_GET['delete'])){
   $staff_id = $_GET['delete'];
   $mysqli->query("DELETE FROM staff WHERE staff_id=$staff_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: staff.php");

}

if (isset($_GET['update'])){
    $staff_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM staff WHERE staff_id=$staff_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $staff_id = $rows['staff_id'];
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $address_id = $rows['address_id'];
        $picture = $rows['picture'];
        $email = $rows['email'];
        $store_id = $rows['store_id'];
        $active = $rows['active'];
        $username = $rows['username'];
        $password = $rows['password'];
    }
}

if (isset($_POST['update'])){
    $staff_id = $_POST['staff_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $address_id = $_POST['address_id'];
    $picture = $_POST['picture'];
    $email = $_POST['email'];
    $store_id = $_POST['store_id'];
    $active = $_POST['active'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE staff SET first_name='$first_name', last_name='$last_name', address_id='$address_id', picture='$picture', email='$email', store_id='$store_id', active='$active', username='$username', password='$password', last_update='$last_update' WHERE staff_id=$staff_id")){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the address_id already EXISTS in ADDRESS table.\n
                                        2)Make sure the store_id already EXISTS in STORE table.");
    }
    
    header("location: staff.php");

}

?>