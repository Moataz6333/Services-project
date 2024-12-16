<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');
?>

<?php
    if(isset($_POST['submit'])){

       $name = $_POST['name'];
       $email = $_POST['email'];
       $password = $_POST['password'];

       if(!isEmpty($name) && !isEmpty($email) && !isEmpty($password)){
        //all feilds are filled
            if(isEmail($email)){
           
              if( strlen($password) >= 6 ){
                   $newPassword = password_hash($password,PASSWORD_DEFAULT);
                    // insert
                    $sql = "INSERT INTO `admins`( `email`, `password`,`name`)
                     VALUES ('$email','$newPassword','$name')";

                      $success_message =db_insert($sql,'admin');

              }else{
               array_push($error_message,'The password must be at least 6 characters.');
   
              }
            }else{
               array_push($error_message,'The email field must email');

            }
           
       }else{
            if(isEmpty($name)){
              array_push($error_message,'the name field is required');
            }
            if(isEmpty($email)){
              array_push($error_message,'the name email is required');
            }
            if(isEmpty($password)){
              array_push($error_message,'the password field is required');
            }
       }

     require FUNC.'messages.php' ;
}
?>


<h1 class="my-4 text-center">Add New Admin</h1>

<div class="mt-3 d-flex w-100 justify-content-center ">

    <form class="w-50" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name </label>
        <input type="text" class="form-control" name="name" id="name" >
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email </label>
        <input type="text" class="form-control" name="email" id="exampleInputEmail1" >
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1">
      </div>
     
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>







<?php 
require_once(BLA.'inc/footer.php');
?>
