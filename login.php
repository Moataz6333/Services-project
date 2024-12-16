<?php
require_once('config.php');
 if(isset($_SESSION['user_id'])){
      
  header("location:".BURL."user/index.php");
  }


require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');


                if(isset($_POST['submit'])){
                  
                  $email =$_POST['email'];
                  $password =$_POST['password'];

                  if(!isEmpty($email) && !isEmpty($password)){

                    if(isEmail($email)){
                        // select row
                        $check =getRow('users','email',$email);
                     
                        if ($check) {
                           //chceck pass
                                $check_password = password_verify($password,$check['password']);
                             
                                if($check_password){
                                    //log in
                                    $_SESSION['user_id']=$check['id'];
                                    $_SESSION['user_name']=$check['name'];
                                    $_SESSION['city_id']=$check['city_id'];
                                    $_SESSION['expired_at']=strtotime("+ 3 hours");
                                    header("location:".BURL.'user/index.php');
                                }else{
                                   array_push($error_message,'كلمه سر خاطئه');

                                }
                           

                        } else {
                            array_push($error_message,'بريد الكتروني خاطئ');
                          
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

<?php require_once(BL.'inc/header.php');
  require(FUNC.'messages.php');
?>

<div class="registerationForm d-flex justify-content-center align-items-center w-100 flex-column " style="height: 85vh">

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post"  >
    <h1 class="text-center">تسجيل الدخول</h1>
  
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">البريد الألكتروني</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">كلمه السر</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword1">
  </div>
  
  <button type="submit" name="submit" class="btn btn-success">تسجيل </button>
  
</form>
<a href="<?php echo BURL.'register.php' ?>" class="btn btn-link"> تسجيل حساب جديد</a>
</div>



<?php require_once(BL.'inc/footer.php'); ?>