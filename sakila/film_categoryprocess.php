<?php

session_start();

$update = false;
$film_id = '';
$category_id = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $film_id = $_POST['film_id'];
    $category_id = $_POST['category_id'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO film_category (film_id, category_id, last_update) VALUES('$film_id', '$category_id', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: film_category.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the film_id already EXISTS in ACTOR table.\n
                                        2)Make sure the category_id already EXISTS in FILM table.\n");
        header("location: film_category.php");
    }
    
}

if (isset($_GET['delete'])){
   $film_id = $_GET['delete'];
   $mysqli->query("DELETE FROM film_category WHERE film_id=$film_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: film_category.php");

}

if (isset($_GET['update'])){
    $film_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM film_category WHERE film_id=$film_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $film_id = $rows['film_id'];
        $category_id = $rows['category_id'];
    }
}

if (isset($_POST['update'])){
    $film_id = $_POST['film_id'];
    $category_id = $_POST['category_id'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE film_category SET category_id='$category_id', last_update='$last_update' WHERE film_id=$film_id") or die($mysqli->error)){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to update! Please kindly check the following details:\n
                                        1)Make sure the film_id already EXISTS in ACTOR table.\n
                                        2)Make sure the category_id already EXISTS in FILM table.\n");
    }
    
    header("location: film_category.php");

}

?>