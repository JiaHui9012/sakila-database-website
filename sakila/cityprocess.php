<?php

session_start();

$update = false;
$city_id = '';
$city = '';
$country_id = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $city_id = $_POST['city_id'];
    $city = $_POST['city'];
    $country_id = $_POST['country_id'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO city (city_id, city, country_id, last_update) VALUES('$city_id', '$city', '$country_id', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: city.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                    1)Make sure the city_id DOESN'T exist in THIS table.\n
                                    2)Make sure the country_id already EXISTS in Country table.");
        header("location: city.php");
    }
    
}

if (isset($_GET['delete'])){
   $city_id = $_GET['delete'];
   $mysqli->query("DELETE FROM city WHERE city_id=$city_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: city.php");

}

if (isset($_GET['update'])){
    $city_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM city WHERE city_id=$city_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $city_id = $rows['city_id'];
        $city = $rows['city'];
        $country_id = $rows['country_id'];
    }
}

if (isset($_POST['update'])){
    $city_id = $_POST['city_id'];
    $city = $_POST['city'];
    $country_id = $_POST['country_id'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("UPDATE city SET city='$city', country_id='$country_id', last_update='$last_update' WHERE city_id=$city_id")){
        $_SESSION['message'] = "Record has been updated!";
        
    }
    else{
        $_SESSION['message'] = "Failed to update! Please kindly check whether the country_id already EXISTS in Country table.";
    }

    header("location: city.php");

}

?>