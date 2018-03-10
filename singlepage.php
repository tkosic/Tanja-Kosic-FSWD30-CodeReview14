<?php

$id = $_GET['id'];

?>

<?php

ob_start();
session_start();

include_once 'actions/db_connect.php';

if( isset($_SESSION['user']) ) {
   
  // select logged-in admin detail
  $query = "SELECT * FROM admin WHERE id=".$_SESSION['user'];
  $res = mysqli_query($conn, $query);
  $userRow = mysqli_fetch_assoc($res);
  $userID = $userRow['id'];

};


  $filter = "all";

  $query1 = "SELECT * FROM event WHERE id=".$id;
  $res1 = mysqli_query($conn, $query1);
  $row1 = mysqli_fetch_assoc($res1);
  $userID1 = $row1['id'];

   $query2 = "SELECT * FROM event ";

  $res2 = mysqli_query($conn, $query2);
  $row2 = mysqli_fetch_assoc($res2);

  ?>


<?php include('navbar.php'); ?>


<!-- header start-->
<h1 class="text-center"><?php echo $row1["name"]; ?></h1>
<header class="w3-display-container w3-content w3-wide" style="max-width:1600px;min-width:500px">
  <img class="w2-image" src='<?php echo $row1["header_img"]; ?>' alt="Event Picture" width="1600" height="600">
</header>
<!-- header end -->

<!-- page content start-->
<div class="container-fluid" style="margin-bottom: 70px;">
  <!-- event information start -->
	<div class="row pt-5">
	    <div class="col-sm-12 text-center">
	      <h2><?php echo $row1["name"]; ?></h2>
	      <h3><?php echo $row1["type"]; ?></h3>
	      <h4>Begin: <?php echo $row1["start_date"]; ?> </h4>
	      <h4>End : <?php echo $row1["end_date"]; ?> </h4>
	    </div>
	</div>

	<div class="row pt-5">
	  	<div class="col-sm-6 text-center">
	  		<h5>
	 			<?php echo $row1["description"]; ?>
	  		</h5>
	 	</div>
		<div class="col-sm-6 text-center">
	  		<div>
	 			<img src='<?php echo $row1["image"]; ?>' class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
	  		</div>
	  	</div>
	</div>
<br>
<br>
	<div class="row pt-5">
		<div class="col-sm-6 text-center">
	  		<div>
	 			<img src='<?php echo $row1["image"]; ?>' class="w3-round w3-image w3-opacity-min" alt="Table Setting" width="600" height="750">
	  		</div>
	  	</div>

	  	<div class="col-sm-6 text-center">
	  		<h3><i class="fa-info"></i> Info</h3>
	  			<div class="">
      				<h4>Email</h4><p class="w3-text-grey"><?php echo $row1["contact_email"]; ?></p>	
      				<h4>Phone</h4><p class="w3-text-grey"><?php echo $row1["contact_phone"]; ?></p>
    				<h4>Location</h4><p class="w3-text-grey"><?php echo $row1["address"]; ?></p>
      					<p class="w3-text-grey"><?php echo $row1["city"]; ?></p>
    				<h4>Event Website</h4><a type="link" href='<?php echo $row1["url"]; ?>' class="w3-text-grey" ><p><?php echo $row1["url"]; ?></p></a>
  				</div>	
	  		</div>
		</div>
</div> 
<!-- page content end-->

<hr>

<!-- contact and map container start -->
<div class="container-fluid" style="margin-top: 70px;">
	<h2 class="text-center">Contact Us</h2>
	<div class="row">	
		<div class="col-sm-6">
			<br>		
			<p id="message"></p>
			<br>
			<form class="" method="POST" action="contact.php" name="cform" id="cform">
				<br>	
					<input name="name" id="name" type="text" class="form-control" placeholder="Name" >
				<br>
					<input name="email" id="email" type="email" class="form-control" placeholder="Email">
				<br>
					<textarea  name="comments" id="comments" cols="10" rows="9" class="form-control" placeholder="Message"></textarea>
				<br>
					<button class="btn btn-block btn-primary col-1 m-auto" type="submit" id="submit" name="send">Send</button>
			</form>
		</div>	
		<div class="col-sm-5 m-auto my-auto pt-5">
			<?php echo $row1["map"]; ?>
		</div>
	</div>	
</div>
<!-- contact and map container end -->

 <!-- footer + </body-html> -->
<?php include('footer.php'); ?>

<?php ob_end_flush(); ?>
 