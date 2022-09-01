<?php

session_start();

$update = false;
$film_id = '';
$title = '';
$description = '';
$release_year = '';
$language_id = '';
$original_language_id = '';
$rental_duration = '';
$rental_rate = '';
$length = '';
$replacement_cost = '';
$rating = '';
$special_features = '';
$last_update ='';

$mysqli = new mysqli('localhost','root','','sakila') or die(mysqli_error($mysqli));


if (isset($_POST['insert'])){
    $film_id = $_POST['film_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    $language_id = $_POST['language_id'];
    $original_language_id = $_POST['original_language_id'];
    $rental_duration = $_POST['rental_duration'];
    $rental_rate = $_POST['rental_rate'];
    $length = $_POST['length'];
    $replacement_cost = $_POST['replacement_cost'];
    $rating = $_POST['rating'];
    $special_features = $_POST['special_features'];
    $last_update = date('Y-m-d h:i:s');

    if ($mysqli->query("INSERT INTO film (film_id, title, description, release_year, language_id, original_language_id, rental_duration, rental_rate, length, replacement_cost, rating, special_features, last_update) VALUES('$film_id', '$title', '$description', '$release_year', '$language_id', '$original_language_id', '$rental_duration', '$rental_rate', '$length', '$replacement_cost', '$rating', '$special_features', '$last_update')") ){
        $_SESSION['message'] = "Record has been inserted!";
        header("location: film.php");
    }
    else{
        $_SESSION['message'] = nl2br("Failed to insert! Please kindly check the following details:\n
                                        1)Make sure the film_id DOESN'T exist in THIS table.\n
                                        2)Make sure the language_id already EXISTS in LANGUAGE table.\n");
        header("location: film.php");
    }
    
}

if (isset($_GET['delete'])){
   $film_id = $_GET['delete'];
   $mysqli->query("DELETE FROM film WHERE film_id=$film_id") or die($mysqli->error());

   $_SESSION['message'] = "Record has been deleted!";
   header("location: film.php");

}

if (isset($_GET['update'])){
    $film_id = $_GET['update'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM film WHERE film_id=$film_id") or die($mysqli->error());
    if ($result!=NULL){
        $rows = $result->fetch_array();
        $film_id = $rows['film_id'];
        $title = $rows['title'];
        $description = $rows['description'];
        $release_year = $rows['release_year'];
        $language_id = $rows['language_id'];
        $original_language_id = $rows['original_language_id'];
        $rental_duration = $rows['rental_duration'];
        $rental_rate = $rows['rental_rate'];
        $length = $rows['length'];
        $replacement_cost = $rows['replacement_cost'];
        $rating = $rows['rating'];
        $special_features = $rows['special_features'];
    }
}

if (isset($_POST['update'])){
    $film_id = $_POST['film_id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $release_year = $_POST['release_year'];
    $language_id = $_POST['language_id'];
    $original_language_id = $_POST['original_language_id'];
    $rental_duration = $_POST['rental_duration'];
    $rental_rate = $_POST['rental_rate'];
    $length = $_POST['length'];
    $replacement_cost = $_POST['replacement_cost'];
    $rating = $_POST['rating'];
    $special_features = $_POST['special_features'];
    $last_update = date('Y-m-d h:i:s');

    if($mysqli->query("UPDATE film SET title='$title', description='$description', release_year='$release_year', language_id='$language_id', original_language_id='$original_language_id', rental_duration='$rental_duration', rental_rate='$rental_rate', length='$length', replacement_cost='$replacement_cost', rating='$rating', special_features='$special_features', last_update='$last_update' WHERE film_id=$film_id")){
        $_SESSION['message'] = "Record has been updated!";
    }
    else{
        $_SESSION['message'] = nl2br("Failed to update! Please kindly check whether the language_id already EXISTS in LANGUAGE table.");
    }
    header("location: film.php");

}

?>