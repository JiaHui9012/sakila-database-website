<?php

session_start();

$update = false;
$address_id = '';
$address = '';
$address2 = '';
$district = '';
$city_id = '';
$postal_code = '';
$phone = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $address_id = $_POST['address_id'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $district = $_POST['district'];
    $city_id = $_POST['city_id'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO address (address_id, address, address2, district, city_id, postal_code, phone, last_update) VALUES('$address_id', '$address', '$address2', '$district', '$city_id', '$postal_code', '$phone', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: address.php");
    }
    else{
        
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                    1)Make sure the address_id DOESN'T exist in THIS table.\n
                                    2)Make sure the city_id already EXISTS in CITY table.");
        header("location: address.php");
    }
    
}

if (isset($_GET['delete'])){
   $address_id = $_GET['delete'];
   $mysqli->query("DELETE FROM address WHERE address_id=$address_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: address.php");

}

if (isset($_GET['update'])){
    $address_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM address WHERE address_id=$address_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $address_id = $rows['address_id'];
        $address = $rows['address'];
        $address2 = $rows['address2'];
        $district = $rows['district'];
        $city_id = $rows['city_id'];
        $postal_code = $rows['postal_code'];
        $phone = $rows['phone'];
    }
}

if (isset($_POST['update'])){
    $address_id = $_POST['address_id'];
    $address = $_POST['address'];
    $address2 = $_POST['address2'];
    $district = $_POST['district'];
    $city_id = $_POST['city_id'];
    $postal_code = $_POST['postal_code'];
    $phone = $_POST['phone'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE address SET address='$address', address2='$address2', district='$district', city_id='$city_id', postal_code='$postal_code', phone='$phone', last_update='$last_update' WHERE address_id=$address_id") ){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = "Failed to update! Please kindly check whether the city_id already EXISTS in CITY table.";
    }

    header("location: address.php");

}

?>