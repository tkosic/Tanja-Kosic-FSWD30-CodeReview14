<?php

ob_start();
session_start();

require_once 'actions/db_connect.php';

  // if session is not set this will redirect to login page
  if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];
  $userD = $userRow['rights'];
    
}else{

  $userD = 0;
}

?>


<!-- ================================= HTML ================================= -->
<?php include('navbar.php'); ?>

<div class="container">    
  <div class="row">
    <?php
      $sql = "SELECT * FROM event ";
      $result = $conn->query($sql);

      if($result->num_rows > 0) {

      while($row = $result->fetch_assoc()) {

      if ($userD == 1) {
                   
      echo '<div class="col-sm-12 col-md-4">
              <div class="card">
                <img src="'.$row["image"].'" alt="Avatar">
                  <div class="container-card">
                  <br>';

            echo '<h4>'.$row["name"].'</h4></a>
                    <p class="address">'.$row["address"].'</p>
                      <p>Start: '.$row["start_date"].'</p> 
                      <p>End: '.$row["end_date"].'</p> 
                    <br>
                      <a href="singlepage.php?id='.$row["id"].'"><button type="button" class="btn btn-info">Read More</button></a>
                    <br>
                      <a href="update.php?id='.$row["id"].'"><button type="button" class="btn btn-primary">Edit</button></a>
                      <a href="delete.php?id='.$row["id"].'"><button type="button" class="btn btn-danger">Delete</button></a>
                    <br>
                  </div>
                </div>
              </div>';

      }else{

            echo '<div class="col-sm-12 col-md-4">
              <div class="card">
                <img src="'.$row["image"].'" alt="Avatar">
                  <div class="container-card">
                    <br>';
              echo '<h4>'.$row["name"].'</h4>
                    <h5 class="address">'.$row["address"].'</h5>
                    <p>Start: '.$row["start_date"].'</p> 
                    <p>End: '.$row["end_date"].'</p> 
                  <br>
                    <a href="singlepage.php?id='.$row["id"].'"><button type="button" class="btn btn-info">Read More</button></a>
                  <br>
                  </div>
                </div>
              </div>';
          
            }
 
    }
      }else {

            echo "<tr><td colspan='5'><center>No Data Avaliable</center></td></tr>";

            }

?>

  </div>
</div>


<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>