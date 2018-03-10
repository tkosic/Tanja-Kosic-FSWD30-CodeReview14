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

?>

<?php include('navbar.php'); ?>

 
<center class="container">

<form class="form-control" action="actions/a_create.php" method="post">
  <h2>Add New Event</h2>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Event Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Event Name" name="name" >
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Start Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" placeholder="start date" name="start_date">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">End Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" placeholder="end_date" name="end_date">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Event Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Event Description" name="description">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Image URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="image" name="image">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Header Img URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Header Img" name="header_img">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Capacity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="Capacity" name="capacity">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Contact Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" placeholder="Contact Email" name="contact_email">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Contact Phone</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="Contact Phone" name="contact_phone">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Address" name="address">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="City" name="city">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
      <input type="URL" class="form-control" placeholder="url" name="url">
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Map </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Map" name="map">
    </div>
  </div>

  <div class="center">
     <label>Type</label>
      <select class="form-control" name="type">
        <option selected value="Art">ART</option>
        <option selected value="Concert">CONCERT</option>
        <option selected value="Sport">SPORT</option>
        <option selected value="Concert">Festival</option>
      </select>
  </div>

  <div class="form-group row">
    <div class="text-center col-sm-12">
      <button type="submit" class="btn btn-primary btn-lg ml-5 mt-5">Add Event</button>
    </div>
  </div>

</form>

</center>

<?php include('footer.php'); ?>