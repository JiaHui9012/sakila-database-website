<?php

session_start();

$update = false;
$actor_id = '';
$film_id = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $actor_id = $_POST['actor_id'];
    $film_id = $_POST['film_id'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO film_actor (actor_id, film_id, last_update) VALUES('$actor_id', '$film_id', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: film_actor.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the actor_id already EXISTS in ACTOR table.\n
                                        2)Make sure the film_id already EXISTS in FILM table.\n");
        header("location: film_actor.php");
    }
    
}

if (isset($_GET['delete'])){
   $actor_id = $_GET['delete'];
   $mysqli->query("DELETE FROM film_actor WHERE actor_id=$actor_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: film_actor.php");

}

if (isset($_GET['update'])){
    $actor_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM film_actor WHERE actor_id=$actor_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $actor_id = $rows['actor_id'];
        $film_id = $rows['film_id'];
    }
}

if (isset($_POST['update'])){
    $actor_id = $_POST['actor_id'];
    $film_id = $_POST['film_id'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE film_actor SET film_id='$film_id', last_update='$last_update' WHERE actor_id=$actor_id") or die($mysqli->error)){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to update! Please kindly check the following details:\n
                                        1)Make sure the actor_id already EXISTS in ACTOR table.\n
                                        2)Make sure the film_id already EXISTS in FILM table.\n");
    }
    
    header("location: film_actor.php");

}

?>