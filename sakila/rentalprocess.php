<?php

session_start();

$update = false;
$rental_id = '';
$rental_date = '';
$inventory_id = '';
$customer_id = '';
$return_date = '';
$staff_id = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $rental_id = $_POST['rental_id'];
    $rental_date = $_POST['rental_date'];
    $inventory_id = $_POST['inventory_id'];
    $customer_id = $_POST['customer_id'];
    $return_date = $_POST['return_date'];
    $staff_id = $_POST['staff_id'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO rental (rental_id, rental_date, inventory_id, customer_id, return_date, staff_id, last_update) VALUES('$rental_id','$rental_date', '$inventory_id', '$customer_id', '$return_date', '$staff_id', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: rental.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                    1)Make sure the rental_id DOESN'T exist in THIS table.\n
                                    2)Make sure the inventory_id already EXISTS in INVENTORY table.\n
                                    3)Make sure the customer_id already EXISTS in CUSTOMER table.\n
                                    4)Make sure the staff_id already EXISTS in STAFF table.");
        header("location: rental.php");
    }
    
}

if (isset($_GET['delete'])){
   $rental_id = $_GET['delete'];
   $mysqli->query("DELETE FROM rental WHERE rental_id=$rental_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: rental.php");

}

if (isset($_GET['update'])){
    $rental_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM rental WHERE rental_id=$rental_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $rental_id = $rows['rental_id'];
        $rental_date = $rows['rental_date'];
        $inventory_id = $rows['inventory_id'];
        $customer_id = $rows['customer_id'];
        $return_date = $rows['return_date'];
        $staff_id = $rows['staff_id'];        
    }
}

if (isset($_POST['update'])){
    $rental_id = $_POST['rental_id'];
    $rental_date = $_POST['rental_date'];
    $inventory_id = $_POST['inventory_id'];
    $customer_id = $_POST['customer_id'];
    $return_date = $_POST['return_date'];
    $staff_id = $_POST['staff_id'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("UPDATE rental SET rental_date='$rental_date', inventory_id='$inventory_id', customer_id='$customer_id', return_date='$return_date', staff_id='$staff_id', last_update='$last_update' WHERE rental_id=$rental_id")){
        $_SESSION['message'] = "Record has been updated!";
        
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                    1)Make sure the inventory_id already EXISTS in INVENTORY table.\n
                                    2)Make sure the customer_id already EXISTS in CUSTOMER table.\n
                                    3)Make sure the staff_id already EXISTS in STAFF table.");
    }

    header("location: rental.php");

}

?>