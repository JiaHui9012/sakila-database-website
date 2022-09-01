<?php

session_start();

$update = false;
$payment_id = '';
$customer_id = '';
$staff_id = '';
$rental_id = '';
$amount = '';
$payment_date = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $payment_id = $_POST['payment_id'];
    $customer_id = $_POST['customer_id'];
    $staff_id = $_POST['staff_id'];
    $rental_id = $_POST['rental_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO payment (payment_id, customer_id, staff_id, rental_id, amount, payment_date, last_update) VALUES('$payment_id', '$customer_id', '$staff_id', '$rental_id', '$amount', '$payment_date', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: payment.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                    1)Make sure the payment_id DOESN'T exist in THIS table.\n
                                    2)Make sure the customer_id already EXISTS in CUSTOMER table.\n
                                    3)Make sure the staff_id already EXISTS in STAFF table.\n
                                    4)Make sure the rental_id already EXISTS in RENTAL table.");
        header("location: payment.php");
    }
    
}

if (isset($_GET['delete'])){
   $payment_id = $_GET['delete'];
   $mysqli->query("DELETE FROM payment WHERE payment_id=$payment_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: payment.php");

}

if (isset($_GET['update'])){
    $payment_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM payment WHERE payment_id=$payment_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $payment_id = $rows['payment_id'];
        $customer_id = $rows['customer_id'];
        $staff_id = $rows['staff_id'];
        $rental_id = $rows['rental_id'];
        $amount = $rows['amount'];
        $payment_date = $rows['payment_date'];
    }
}

if (isset($_POST['update'])){
    $payment_id = $_POST['payment_id'];
    $customer_id = $_POST['customer_id'];
    $staff_id = $_POST['staff_id'];
    $rental_id = $_POST['rental_id'];
    $amount = $_POST['amount'];
    $payment_date = $_POST['payment_date'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("UPDATE payment SET customer_id='$customer_id', staff_id='$staff_id', rental_id='$rental_id', amount='$amount', payment_date='$payment_date', last_update='$last_update' WHERE payment_id=$payment_id")){
        $_SESSION['message'] = "Record has been updated!";
        
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                    1)Make sure the customer_id already EXISTS in CUSTOMER table.\n
                                    2)Make sure the staff_id already EXISTS in STAFF table.\n
                                    3)Make sure the rental_id already EXISTS in RENTAL table.");
    }

    header("location: payment.php");

}

?>