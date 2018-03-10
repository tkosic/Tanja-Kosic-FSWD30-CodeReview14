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

 
    $sql = "INSERT INTO event (name, start_date, end_date, description, image, header_img, capacity, contact_email, contact_phone, address, city, url, type, map) VALUES ('$name', '$start_d','$end_d', '$description', '$image', '$header_img', '$capacity', '$contact_e', '$contact_ph', '$address', '$city', '$url', '$type', '$map')";

    if($conn->query($sql) === TRUE) {

      ?>

<?php include('../navbar.php'); ?>

<div class="card text-center">
    <div class="card-header">New Record Successfully Created</div>
    <div class="card-body">
        <a href="../index.php"><button type="button" class="btn btn-success">Create</button></a>
        <a href='../create.php'><button type='button' class="btn btn-primary">Back</button></a>
    </div> 
</div>

<?php

    } else {

        echo "Error " . $sql . ' ' . $conn->connect_error;

    }

    $conn->close();

}

?>

<?php include('../footer.php'); ?>