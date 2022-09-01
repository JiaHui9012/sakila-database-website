<?php

session_start();

$update = false;
$inventory_id = '';
$film_id = '';
$store_id = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $inventory_id = $_POST['inventory_id'];
    $film_id = $_POST['film_id'];
    $store_id = $_POST['store_id'];
    $last_update = date('Y-m-d h:i:s');
    
    if ($mysqli->query("INSERT INTO inventory (inventory_id, film_id, store_id, last_update) VALUES('$inventory_id', '$film_id', '$store_id', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: inventory.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the inventory_id DOESN'T exist in THIS table.\n
                                        2)Make sure the film_id already EXISTS in FILM table.\n
                                        3)Make sure the store_id already EXISTS in STORE table.");
        header("location: inventory.php");
    }
    
}

if (isset($_GET['delete'])){
   $inventory_id = $_GET['delete'];
   $mysqli->query("DELETE FROM inventory WHERE inventory_id=$inventory_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: inventory.php");

}

if (isset($_GET['update'])){
    $inventory_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM inventory WHERE inventory_id=$inventory_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $inventory_id = $rows['inventory_id'];
        $film_id = $rows['film_id'];
        $store_id = $rows['store_id'];
    }
}

if (isset($_POST['update'])){
    $inventory_id = $_POST['inventory_id'];
    $film_id = $_POST['film_id'];
    $store_id = $_POST['store_id'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE inventory SET film_id='$film_id', store_id='$store_id', last_update='$last_update' WHERE inventory_id=$inventory_id")){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to update! Please kindly check the following details:\n
                                        1)Make sure the film_id already EXISTS in FILM table.\n
                                        2)Make sure the store_id already EXISTS in STORE table.");
    }  
    
    header("location: inventory.php");

}

?>