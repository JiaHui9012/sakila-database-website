<?php

session_start();

$update = false;
$customer_id = '';
$store_id = '';
$first_name = '';
$last_name = '';
$email = '';
$address_id = '';
$active = '';
$create_date = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $customer_id = $_POST['customer_id'];
    $store_id = $_POST['store_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address_id = $_POST['address_id'];
    $active = $_POST['active'];
    $create_date = $_POST['create_date'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO customer (customer_id, store_id, first_name, last_name, email, address_id, active, create_date, last_update) VALUES('$customer_id', '$store_id', '$first_name', '$last_name', '$email', '$address_id', '$active', '$create_date', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: customer.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the customer_id DOESN'T exist in THIS table.\n
                                        2)Make sure the store_id already EXISTS in STORE table.\n
                                        3)Make sure the address_id already EXISTS in ADDRESS table.");
        header("location: customer.php");
    }
    
}

if (isset($_GET['delete'])){
   $customer_id = $_GET['delete'];
   $mysqli->query("DELETE FROM customer WHERE customer_id=$customer_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: customer.php");

}

if (isset($_GET['update'])){
    $customer_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM customer WHERE customer_id=$customer_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $customer_id = $rows['customer_id'];
        $store_id = $rows['store_id'];
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
        $email = $rows['email'];
        $address_id = $rows['address_id'];
        $active = $rows['active'];
        $create_date = $rows['create_date'];
    }
}

if (isset($_POST['update'])){
    $customer_id = $_POST['customer_id'];
    $store_id = $_POST['store_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];
    $address_id = $_POST['address_id'];
    $active = $_POST['active'];
    $create_date = $_POST['create_date'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE customer SET store_id='$store_id', first_name='$first_name', last_name='$last_name', email='$email', address_id='$address_id', active='$active', create_date='$create_date', last_update='$last_update' WHERE customer_id=$customer_id")){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to update! Please kindly check the following details:\n
                                        1)Make sure the store_id already EXISTS in STORE table.\n
                                        2)Make sure the address_id already EXISTS in ADDRESS table.");
    }
    header("location: customer.php");

}

?>