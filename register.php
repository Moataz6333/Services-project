<?php
require_once('config.php');
require_once(FUNC.'db.php');
require_once(FUNC.'messages.php');
require_once(FUNC.'validate.php');
$cities = getRows('cities');
$now =date_create("now");


if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $sname=$_POST['sname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $birthdate=$_POST['birthdate'];
    $gender=$_POST['gender'];
    $city=$_POST['city'];
    $phone=$_POST['phone'];
    
    if(!isEmptyArr($fname,$sname,$email,$password,$birthdate,$gender,$city,$phone)){
            if(isUnique('users','email',$email)){
                    if(strlen($password) >= 6){
                            $newPassword= password_hash($password,PASSWORD_DEFAULT);
                                if(date_diff($now,date_create($birthdate))->y >= 15){
                                        if(strlen($phone) == 11 ){
                                          if(isUnique('users','phone',$phone)){

                                            $sql ="INSERT INTO `users`( `name`, `lastName`, `email`, `phone`, `birthdate`, `gender`, `password`, `city_id`)
                                             VALUES ('$fname','$sname','$email','$phone','$birthdate','$gender','$newPassword','$city')";
                                                db_insert($sql,'user');
                                                setcookie('success','تم تسجيل البيانات بنجاح');
                                                header("location:".BURL.'login.php');
                                          }else{
                                            array_push($error_message,' هذا الرقم موجود بالفعل!  ');
                                          }


                                        }else{
                array_push($error_message,'ادخل رقم تيلفون صحيح');
                                            
                                        }
                                }else{
                array_push($error_message,'يجب ان تكون اكبر من 15 سنه');

                                }
                    }else{
                array_push($error_message,'كلمه السر يجب ان لا تقل عن 6 احرف');

                    }
            }else{
                array_push($error_message,'هذا الحساب مسجل من قبل');
            }
    }
   
}





?>
<?php require_once(BL.'inc/header.php'); 
    require(FUNC.'messages.php');
?>


<div class="registerationForm d-flex justify-content-center align-items-center w-100 flex-column " style="height: 85vh">
    <h1 class="text-center my-4">تسجيل مستخدم جديد</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

    <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="fname" placeholder="الاسم الاول" aria-label="First name" required>
  </div>
  <div class="col">
    <input type="text" class="form-control" name="sname" placeholder="الاسم الاخير" aria-label="Last name" required>
  </div>
</div>

  <div class="my-3">
   
    <input type="email" class="form-control" name="email" placeholder="البريد الالكتروني" required>
  </div>
  <div class="my-3">
    <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="كلمه السر" required>
  </div>
  <div class="my-3 row">
    
    <div class="col d-flex align-items-center gap-2">
      <input class="form-check-input" type="radio" name="gender"  value="male" required>
        <label class="form-check-label" for="gridRadios1">
         ذكر 
        </label>
       <input class="form-check-input" type="radio" name="gender"  value="female" required>
        <label class="form-check-label" for="gridRadios1">
         انثي
        </label>

    </div>
       <div class="col-6">
        <label for="date mb-2">تايخ الميلاج</label>
        <input type="date" class="form-control" name="birthdate" required>
    </div>
  </div>
  <div class="my-3 row">
  <div class="col-md-4">
    <label for="inputState" class="form-label">المحافظه</label>
    <select id="inputState" class="form-select" name="city" required>
      <?php foreach($cities as $city) { ?>
        <option value="<?php echo $city['id'] ?>"><?php echo $city['name'] ?> </option>
        <?php } ?>
    </select>
  </div>
 <div class="col">
    <label for="phone" class="form-label" >الهاتف</label>
 <input type="text" class="form-control" name="phone"  placeholder="01xxxxxxxx" required>

 </div>
  </div>
  
  <button type="submit" class="btn btn-success" name="submit">تسجيل </button>
  
</form>
<a href="<?php echo BURL.'login.php' ?>" class="btn btn-link">   لديك حساب بالفعل</a>
</div>



<?php require_once(BL.'inc/footer.php'); ?>