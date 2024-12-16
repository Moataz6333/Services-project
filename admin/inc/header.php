<?php 
    if(!isset($_SESSION['admin_id'])){
      
      header("location:".BURLA."login.php");
    }

    if(isset($_POST['logout'])){
      session_destroy();
      header("location:".BURLA."login.php");

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="<?php echo ASSETS . 'bootstrap.min.css' ?>">
    <link rel="stylesheet" href="<?php echo ASSETS . 'style.css' ?>">
</head>
<body>
  <!-- nav -->
  <nav class="navbar navbar-expand-lg navbar-dark  bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo BURLA.'index.php' ?>">Home</a>
        </li>
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Admins
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="">admins</a></li>
            <li><a class="dropdown-item" href="<?php echo BURLA."admins/add.php" ?>">add admin</a></li>
           
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cities
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="<?php echo BURLA."cities/cities.php" ?>">all cities</a></li>
            <li><a class="dropdown-item" href="<?php echo BURLA."cities/add.php" ?>">add cities</a></li>
           
          </ul>
        </li>
     
      </ul>
      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
        <button type="submit" name="logout" class="btn btn-secondary">Log out</button>
      </form>
    </div>
  </div>
</nav>

<div class="container">