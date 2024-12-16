<?php
require_once('../config.php');
    if(isset($_SESSION['admin_id'])){
        header('location:'.BURLA.'index.php');
    }
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');
?>

    <!-- login -->
     <?php

                if(isset($_POST['submit'])){
                  $email =$_POST['email'];
                  $password =$_POST['password'];

                  if(!isEmpty($email) && !isEmpty($password)){

                    if(isEmail($email)){
                        // select row
                        $check =getRow('admins','email',$email);
                      //  var_dump($check['password']);
                        if ($check) {
                           //chceck pass
                                $check_password = password_verify($password,$check['password']);
                             
                                if($check_password){
                                    //log in
                                    $_SESSION['admin_id']=$check['id'];
                                    $_SESSION['admin_name']=$check['name'];
                                    $_SESSION['expired_at']=strtotime("+ 3 hours");
                                    header("location:".BURLA.'index.php');
                                }else{
                                   array_push($error_message,'Invalid password');

                                }
                           

                        } else {
                            array_push($error_message,'Invalid email');
                          
                        }
                        

                    }else{
                           array_push($error_message,'The email field must email');

                      }
                  }else{
                    if(isEmpty($email)){
                        array_push($error_message,'the name email is required');
                      }
                      if(isEmpty($password)){
                        array_push($error_message,'the password field is required');
                      }
                  }

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
  

<div class="container">
    <?php require(FUNC.'messages.php') ?>
<h1 class="my-4 text-center">Login</h1>

<div class="mt-3 d-flex w-100 justify-content-center ">

    <form class="w-50" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
     
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email </label>
        <input type="text" class="form-control" name="email" id="exampleInputEmail1" >
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
     
      <button type="submit" name="submit" class="btn btn-primary">Login</button>
    </form>
</div>

</div>

<script src="<?php echo ASSETS . 'bootstrap.bundle.min.js' ?>"></script>
</body>
</html>