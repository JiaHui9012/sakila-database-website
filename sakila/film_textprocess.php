<?php

session_start();

$update = false;
$film_id = '';
$title = '';
$description = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $film_id = $_POST['film_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    
    if ($mysqli->query("INSERT INTO film_text (film_id, title, description) VALUES('$film_id', '$title', '$description')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: film_text.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Film_id already EXISTS!");
        header("location: film_text.php");
    }
    
}

if (isset($_GET['delete'])){
   $film_id = $_GET['delete'];
   $mysqli->query("DELETE FROM film_text WHERE film_id=$film_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: film_text.php");

}

if (isset($_GET['update'])){
    $film_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM film_text WHERE film_id=$film_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $film_id = $rows['film_id'];
        $title = $rows['title'];
        $description = $rows['description'];
    }
}

if (isset($_POST['update'])){
    $film_id = $_POST['film_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $mysqli->query("UPDATE film_text SET title='$title', description='$description' WHERE film_id=$film_id") or die($mysqli->error);
        
    $_SESSION['message'] = "Record has been updated!";
    
    header("location: film_text.php");

}

?>