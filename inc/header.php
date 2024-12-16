<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الرئيسية</title>
    <link rel="stylesheet" href="<?php echo ASSETS.'bootstrap.min.css' ?>">
   <link rel="stylesheet" href="<?php echo ASSETS.'main.css' ?>">
   
</head>
<body >
    <!-- nav -->
    <nav class="navbar navbar-expand-lg " id="main-nav" >
       <div class=" d-flex justify-content-between align-items-center w-100">
       <ul class="nav-ul">
        <li>
            <a href="<?php echo BURL.'index.php' ?> ">الرئيسية</a>
        </li>
        <li>
            <a href="<?php echo BURL.'contactUs.php' ?>">تواصل معنا</a>
        </li>
        </ul>
        <a href="<?php echo BURL.'login.php' ?>" class="btn btn-success">هل تقدم خدمه؟</a>
       </div>
</nav>
<!-- contianer -->
<div class="container">