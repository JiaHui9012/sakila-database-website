<?php

session_start();

$update = false;
$store_id = '';
$manager_staff_id = '';
$address_id = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $store_id = $_POST['store_id'];
    $manager_staff_id = $_POST['manager_staff_id'];
    $address_id = $_POST['address_id'];
    $last_update = date('Y-m-d h:i:s');
    
    if ($mysqli->query("INSERT INTO store (store_id, manager_staff_id, address_id, last_update) VALUES('$store_id', '$manager_staff_id', '$address_id', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: store.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the store_id DOESN'T exist in THIS table.\n
                                        2)Make sure the manager_staff_id already EXISTS in STAFF table.\n
                                        3)Make sure the address_id already EXISTS in ADDRESS table.");
        header("location: store.php");
    }
    
}

if (isset($_GET['delete'])){
   $store_id = $_GET['delete'];
   $mysqli->query("DELETE FROM store WHERE store_id=$store_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: store.php");

}

if (isset($_GET['update'])){
    $store_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM store WHERE store_id=$store_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $store_id = $rows['store_id'];
        $manager_staff_id = $rows['manager_staff_id'];
        $address_id = $rows['address_id'];
    }
}

if (isset($_POST['update'])){
    $store_id = $_POST['store_id'];
    $manager_staff_id = $_POST['manager_staff_id'];
    $address_id = $_POST['address_id'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE store SET manager_staff_id='$manager_staff_id', address_id='$address_id', last_update='$last_update' WHERE store_id=$store_id")){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to update! Please kindly check the following details:\n
                                        1)Make sure the manager_staff_id already EXISTS in STAFF table.\n
                                        2)Make sure the address_id already EXISTS in ADDRESS table.");
    }  
    
    header("location: store.php");

}

?>