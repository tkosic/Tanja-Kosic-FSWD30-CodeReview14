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

  $id = $_POST['id'];

  $sql = "DELETE FROM event WHERE id = {$id}";

if($conn->query($sql) === TRUE) {

?>
<?php include('../navbar.php'); ?>

<div class="card text-center">
  <div class="card-header">Successfully deleted!</div>
  	<div class="card-body">
      <a href="../index.php"><button type="button" class="btn btn-primary">Back</button></a>
    </div> 
</div>

<?php

  } else {

  echo "Error updating record : " . $conn->error;

  }

  $conn->close();

}

?>

<?php include('../footer.php'); ?>