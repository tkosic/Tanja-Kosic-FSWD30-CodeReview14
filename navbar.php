<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Vienna Events</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb"
    crossorigin="anonymous">
  <script defer src="https://use.fontawesome.com/releases/v5.0.4/js/all.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-expand-lg mb-3 fixed-top">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">

    <!-- navbar links when loged in -->
      <ul class="navbar-nav mr-auto">
        <?php if(isset($_SESSION['user'])) { ?> 
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Concerts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Teather</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sport</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Festivals</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="create.php">Add New Event</a>
          </li>
      </ul>

      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#">Hi, 
              <?php echo $userRow['name']; ?> (Account) - <i class="far fa-user"></i>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php?logout"><button type="button" class="btn btn-danger"> Sign Out </button></a>
          </li>
      
        <!-- navbar links when loged out -->

        <?php } else { ?>    

          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Concerts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Teather</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Sport</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Festivals</a>
          </li>
      </ul>

      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="login.php?login">Admin</a>
          </li>

        <?php } ?>
        
      </ul>
  </div>

</nav>

<div class="container-fluid" style="margin-top: 5em;">