<?php

ob_start();
session_start();

require_once 'actions/db_connect.php';

if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];

};

if($_GET['id']) {

  $id = $_GET['id'];
  
  $sql = "SELECT * FROM event WHERE id = {$id}";
  $result = $conn->query($sql);
  $data = $result->fetch_assoc();

  $conn->close();

?>

<?php include('navbar.php'); ?>

<div class="card text-center">
  <div class="card-header">
    Do you really want to delete this user?
  </div>
  <div class="card-body">
  	<form action="actions/a_delete.php" method="post">
    	<input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
    	<button type="submit" class="btn btn-danger">Yes, delete it!</button>
      <a href="index.php"><button type="button" class="btn btn-primary">No, go back!</button></a>
    </form>
  </div> 
</div>


<?php include('footer.php'); ?> 

<?php

}

?>