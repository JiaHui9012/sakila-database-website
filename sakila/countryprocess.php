<?php

session_start();

$update = false;
$country_id = '';
$country = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $country_id = $_POST['country_id'];
    $country = $_POST['country'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO country (country_id, country, last_update) VALUES('$country_id', '$country', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: country.php");
    }
    else{
        $_SESSION['message'] = "Failed to insert! Country_id already exists!";
        header("location: country.php");
    }
    
}

if (isset($_GET['delete'])){
   $country_id = $_GET['delete'];
   $mysqli->query("DELETE FROM country WHERE country_id=$country_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: country.php");

}

if (isset($_GET['update'])){
    $country_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM country WHERE country_id=$country_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $country_id = $rows['country_id'];
        $country = $rows['country'];
    }
}

if (isset($_POST['update'])){
    $country_id = $_POST['country_id'];
    $country = $_POST['country'];
    $last_update = date('Y-m-d h:i:s');

    $mysqli->query("UPDATE country SET country='$country', last_update='$last_update' WHERE country_id=$country_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    header("location: country.php");

}

?>