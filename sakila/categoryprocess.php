<?php

session_start();

$update = false;
$category_id = '';
$name = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO category (category_id, name, last_update) VALUES('$category_id', '$name', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: category.php");
    }
    else{
        $_SESSION['message'] = "Failed to insert! Category_id already exists!";
        header("location: category.php");
    }
    
}

if (isset($_GET['delete'])){
   $category_id = $_GET['delete'];
   $mysqli->query("DELETE FROM category WHERE category_id=$category_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: category.php");

}

if (isset($_GET['update'])){
    $category_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM category WHERE category_id=$category_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $category_id = $rows['category_id'];
        $name = $rows['name'];
    }
}

if (isset($_POST['update'])){
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    $last_update = date('Y-m-d h:i:s');

    $mysqli->query("UPDATE category SET name='$name', last_update='$last_update' WHERE category_id=$category_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    header("location: category.php");

}

?>