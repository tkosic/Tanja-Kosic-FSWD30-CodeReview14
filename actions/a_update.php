<?php 

ob_start();
session_start();

require_once 'db_connect.php';

if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];

};

if($_POST) {

    $name = $_POST['name'];
    $start_d = $_POST['start_date'];
    $end_d = $_POST['end_date'];
    $description = $_POST['description'];
    $image = $_POST['image'];
    $header_img = $_POST['header_img'];
    $capacity = $_POST['capacity'];
    $contact_e = $_POST['contact_email'];
    $contact_ph = $_POST['contact_phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $url = $_POST['url'];
    $type = $_POST['type'];
    $map = $_POST['map'];

    $id = $_POST['id'];


    $sql = "UPDATE event SET name = '$name' , start_date = '$start_d' , end_date = '$end_d' , description = '$description' , image = '$image' , header_img = '$header_img' , capacity = '$capacity' , contact_email = '$contact_e' , contact_phone = '$contact_ph' , address = '$address' , city = '$city' , url = '$url' , type = '$type' , map = '$map' WHERE id = {$id} ";


    if($conn->query($sql) === TRUE) {

?>

<?php include('../navbar.php'); ?>

<div class="card text-center">
    <div class="card-header">Succcessfully Updated!</div>
        <div class="card-body">
            <a href="../index.php"><button type="button" class="btn btn-success">Home</button></a>
            
            <?php
                echo "<a href='../update.php?id=".$id."'><button type='button' class='btn btn-primary' >Back</button></a>";
            ?>
        </div>
    </div>

<?php

    } else {

        echo "Erorr while updating record : ". $conn->error;

    }

    $conn->close();

}

?>

<?php include('../footer.php'); ?>