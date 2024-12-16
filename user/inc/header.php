<?php 
 if(!isset($_SESSION['user_id'])){
    header("location:".BURL.'login.php');
}if(isset($_POST['logout'])){
session_destroy();
header("location:".BURL."login.php");

}
?>
<!DOCTYPE html>
<html lang="ar">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <link rel="stylesheet" href="<?php echo ASSETS.'bootstrap.min.css' ?>">
   <link rel="stylesheet" href="<?php echo ASSETS.'main.css' ?>">
   
</head>
<body >
    <!-- nav -->
    <nav class="navbar navbar-expand-lg user-nav navbar-dark  bg-dark"  >
       <div class=" d-flex justify-content-between align-items-center w-100 mx-3">
       <ul class="d-flex justify-content-between align-items-center gap-3 usernav">
        <li>
            <a href="<?php echo BURL.'user/index.php' ?> ">الرئيسية</a>
           
        </li>
        <li>
        <a href="<?php echo BURL.'user/profile.php' ?> ">الملف الشخصي</a>
           
        </li>
     
        </ul>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="d-flex justify-content-end ">
            <button type="submit" name="logout" class="btn btn-secondary">تسجيل خروج</button>
        </form>
       </div>
</nav>
<!-- contianer -->
<div class="container">