<?php

session_start();

$update = false;
$actor_id = '';
$first_name = '';
$last_name = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $actor_id = $_POST['actor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO actor (actor_id, first_name, last_name, last_update) VALUES('$actor_id', '$first_name', '$last_name', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: actor.php");
    }
    else{
        $_SESSION['message'] = "Failed to insert! Actor_id already exists!";
        header("location: actor.php");
    }
    
}

if (isset($_GET['delete'])){
   $actor_id = $_GET['delete'];
   $mysqli->query("DELETE FROM actor WHERE actor_id=$actor_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: actor.php");

}

if (isset($_GET['update'])){
    $actor_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM actor WHERE actor_id=$actor_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $actor_id = $rows['actor_id'];
        $first_name = $rows['first_name'];
        $last_name = $rows['last_name'];
    }
}

if (isset($_POST['update'])){
    $actor_id = $_POST['actor_id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $last_update = date('Y-m-d h:i:s');

    $mysqli->query("UPDATE actor SET first_name='$first_name', last_name='$last_name', last_update='$last_update' WHERE actor_id=$actor_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    header("location: actor.php");

}

?>