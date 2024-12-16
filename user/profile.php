<?php
require_once('../config.php');
require_once(FUNC.'db.php');
require_once(FUNC.'validate.php');

$user =getRow('users','id',$_SESSION['user_id']);
$id =$user['id'];
$cities=getRows('cities');

if(isset($_POST['del'])){
    unlink("uploads/".$user['photo']);
  $sql ="UPDATE `users` SET `photo`=NULL WHERE `id`= '$id' ";
  if(db_update($sql)){
   setcookie('success','تم الحذف  بنجاح ! ');
   header("Refresh:0");

  }
}

$uploadDirectory = "uploads/";

// Check if the directory exists, if not, create it
if (!is_dir($uploadDirectory)) {
    mkdir($uploadDirectory, 0755, true);
}

    if(isset($_POST['edit'])){
      if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['image']['tmp_name']; // Temporary file path
        $fileName = basename($_FILES['image']['name']); // Original file name
        $fileSize = $_FILES['image']['size']; // File size in bytes
        $fileType = $_FILES['image']['type']; // MIME type
        $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION); // File extension

        // Allowed file extensions
        $allowedExtensions = ['jpg', 'jpeg', 'png'];

        // Validate the file extension
        if (in_array(strtolower($fileExtension), $allowedExtensions)) {
            // Create a unique file name to avoid overwriting
            $newFileName = uniqid() . '.' . $fileExtension;

            // Full path to save the file
            $destination = $uploadDirectory . $newFileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpPath, $destination)) {
                //done  
                $sql ="UPDATE `users` SET `photo`='$newFileName' WHERE `id`= '$id' ";
                if(db_update($sql)){
                 setcookie('success','تم تعديل  بنجاح ! ');
                 header("Refresh:0");
              
                }
               
              
            } else {
              setcookie('error',"حدث خطأ ما");
            }
        } else {
          setcookie('error',"   يجب ان تكون الصوره من صيغ png ,jpj ,jpeg");
        }
    } else {
        echo "Error uploading the file.";
    }
    }

if(isset($_POST['submit'])){

    $fname = $_POST['fname'];
    $sname = $_POST['sname'];
    $city_id = $_POST['city'];
    $phone = $_POST['phone'];
   
 
   
 
    if(!isEmpty($fname) && !isEmpty($sname) && !isEmpty($phone)){
        if($user['phone'] == $phone){
            $sql ="UPDATE `users` SET `name`='$fname',`lastName`='$sname' ,`city_id` = '$city_id' WHERE `id`= '$id' ";
            if(db_update($sql)){
             setcookie('success','تم تعديل  بنجاح ! ');
                header("Refresh:0");
            }
        }else{

            if(isUnique('users','phone',$phone)){
                $sql ="UPDATE `users` SET `name`='$fname',`lastName`='$sname' ,`city_id` = '$city_id' ,`phone`='$phone' WHERE `id`= '$id' ";
                if(db_update($sql)){
                 setcookie('success','تم تعديل  بنجاح ! ');
              
                }
            
                       
                     }else{
     
                         setcookie('error','هذا الرقم موجود بالفعل');
                     
     
     
                     }
        }
       
        
    }else{
         setcookie('error',"كل الحقول مطلوبه");
    }
 
 
 }




?>



<?php require_once(BL.'user/inc/header.php');  ?>
<?php require_once(FUNC.'messages.php');  ?>

<h1 class="text-center my-3">الملف الشخصي</h1>

<div class="registerationForm d-flex justify-content-center align-items-center w-100 flex-column " >

        <div class="my-3 d-flex align-items-center gap-3 profile-chang">
            <div class="d-flex gap-2" style="width:100px; height:100px; ">
                <img src="<?php if($user['photo'] != null){
                  echo UPLOADS.$user['photo'];
                }else{
                  echo ASSETS.'images/user.jpg' ;

                }
                
                ?>" alt="not found" style="width:100%; height:100%;  border-radius:50%;  border:2px solid black; ">
              </div>
              <form class="d-flex flex-column" action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" style=" width: 44% !important; " enctype="multipart/form-data">
                <h6>الصوره الشخصيه</h6>
                <input type="file" name="image" required>
                <button type="submit" name="edit" class="btn btn-primary mt-2" style=" width:80px" >تعديل</button>
              </form>
                  <?php if($user['photo'] != null) { ?>
              <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" style="width:fit-content !important; height:100%;">
                <button type="submit" name="del" class="btn btn-link text-danger">حذف</button>
              </form>
            <?php } ?>
        </div>
        
    <form  action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >

    <div class="row">
  <div class="col">
    <input type="text" class="form-control" name="fname" placeholder="الاسم الاول" aria-label="First name" required value="<?php echo $user['name'] ?>">
  </div>
  <div class="col">
    <input type="text" class="form-control" name="sname" placeholder="الاسم الاخير" aria-label="Last name" required value="<?php echo $user['lastName'] ?>">
  </div>
</div>

  <div class="my-3">
   
    <input type="text" class="form-control " readonly name="email" placeholder="البريد الالكتروني" required value="<?php echo $user['email'] ?>">
  </div>
 
 
  <div class="my-3 row">
  <div class="col-md-4">
    <label for="inputState" class="form-label">المحافظه</label>
    <select id="inputState" class="form-select" name="city" required>
      <?php foreach($cities as $city) { ?>
        <option <?php if($user['city_id'] == $city['id']){ echo "selected"; } ?> value="<?php echo $city['id'] ?>"><?php echo $city['name'] ?> </option>
        <?php } ?>
    </select>
  </div>
 <div class="col">
    <label for="phone" class="form-label" >الهاتف</label>
 <input type="text" class="form-control" name="phone"  placeholder="01xxxxxxxx" required value="<?php echo $user['phone'] ?>" >

 </div>
  </div>
  
  <button type="submit" class="btn btn-success" name="submit">تعديل </button>
  
</form>
</div>

<?php require_once(BL.'user/inc/footer.php');  ?>