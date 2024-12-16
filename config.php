<?php

// start session
session_start();

// defines routs names (links)
define("BURL","http://localhost/myprojects/secvices_project/");
define("BURLA",BURL."admin/");
define("ASSETS",BURL."assets/");
define("UPLOADS",BURL."user/uploads/");


// dir for files
define("BL",__DIR__.'/');
define("BLA",__DIR__.'/admin/');
define("FUNC",__DIR__.'/functions/');

// connect to database
require_once(BL.'functions/db.php');

setcookie('success','none');
setcookie('error','none');

if(isset($_SESSION['expired_at']) && time()> $_SESSION['expired_at']){
    session_destroy();
}