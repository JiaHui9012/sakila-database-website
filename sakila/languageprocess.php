<?php

session_start();

$update = false;
$language_id = '';
$name = '';
$last_update = '';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $language_id = $_POST['language_id'];
    $name = $_POST['name'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO language (language_id, name, last_update) VALUES('$language_id', '$name', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: language.php");
    }
    else{
        $_SESSION['message'] = "Failed to insert! language_id already exists!";
        header("location: language.php");
    }
    
}

if (isset($_GET['delete'])){
   $language_id = $_GET['delete'];
   $mysqli->query("DELETE FROM language WHERE language_id=$language_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: language.php");

}

if (isset($_GET['update'])){
    $language_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM language WHERE language_id=$language_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $language_id = $rows['language_id'];
        $name = $rows['name'];
    }
}

if (isset($_POST['update'])){
    $language_id = $_POST['language_id'];
    $name = $_POST['name'];
    $last_update = date('Y-m-d h:i:s');

    $mysqli->query("UPDATE language SET name='$name', last_update='$last_update' WHERE language_id=$language_id") or die($mysqli->error);

    $_SESSION['message'] = "Record has been updated!";
    header("location: language.php");

}

?>