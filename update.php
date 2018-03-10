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

<center class="container">
<form class="form-control" action="actions/a_update.php" method="post">

    <h2>Update Event</h2>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Event Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Event Name" name="name" value="<?php echo $data['name']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Start Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" placeholder="start date" name="start_date" value="<?php echo $data['start_date']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">End Date</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" placeholder="end_date" name="end_date" value="<?php echo $data['end_date']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Event Description</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Event Description" name="description" value="<?php echo $data['description']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Image URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="image" name="image" value="<?php echo $data['image']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Header Img URL</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Header Img" name="header_img" value="<?php echo $data['header_img']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Capacity</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="Capacity" name="capacity" value="<?php echo $data['capacity']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Contact Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" placeholder="Contact Email" name="contact_email" value="<?php echo $data['contact_email']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Contact Phone</label>
    <div class="col-sm-10">
      <input type="number" class="form-control" placeholder="Contact Phone" name="contact_phone" value="<?php echo $data['contact_phone']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Address</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Address" name="address" value="<?php echo $data['address']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">City</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $data['city']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">URL</label>
    <div class="col-sm-10">
      <input type="URL" class="form-control" placeholder="url" name="url" value="<?php echo $data['url']?>" />
    </div>
  </div>

  <div class="form-group row">
    <label class="col-sm-2 col-form-label">Map </label>
    <div class="col-sm-10">
      <input type="text" class="form-control" placeholder="Map" name="map" value="<?php echo $data['map']?>" />
    </div>
  </div>

  <div class="center">
     <label>Type</label>
      <select class="form-control" name="type" value="<?php echo $data['type']?>" />
        <option selected value="Art">ART</option>
        <option selected value="Concert">CONCERT</option>
        <option selected value="Sport">SPORT</option>
        <option selected value="Concert">Festival</option>
      </select>
  </div>

  <div class="form-group row">
    <div class="col-sm-12">
       <input type="hidden" name="id" value="<?php echo $data["id"]?>" />
       <br>
       <div class="text-center">
         <button type="submit" class="btn btn-primary btn-lg mt-4">Update</button>
       </div>
    </div>
  </div>

</form>

</center>


<?php include('footer.php'); ?>

<?php

}

?>