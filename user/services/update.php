<?php
require_once('../../config.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');
require_once(FUNC.'messages.php');
?>
<?php
if(isset($_POST['submit'])){

   $title = $_POST['title'];
   $description = $_POST['description'];
   $region = $_POST['region'];
   $price = $_POST['price'];
   $service_id =$_POST['service_id'];

  

   if(!isEmpty($title) && !isEmpty($description) && !isEmpty($region)){
       if(strlen($title) > 3){
               
        // db_update()
                    $sql ="UPDATE `services` SET `title`='$title',`description`='$description',`region_id`='$region',`price`='$price' WHERE `id`= '$service_id'";
                  if(db_update($sql)){
                   setcookie('success','تم تعديل الخدمه بنجاح ! ');
                   header("location:".$_SERVER['HTTP_REFERER']);
                  }
                }else{

                    setcookie('error','رجاء المحاوله مره اخري ');
                    header("location:".$_SERVER['HTTP_REFERER']);


                }
      
       
   }else{
        if(isEmpty($title)){
          setcookie('error','العنوان مطلوب');
          header("location:".$_SERVER['HTTP_REFERER']);
        }
        if(isEmpty($description)){
          setcookie('error','الوصف مطلوب');
          header("location:".$_SERVER['HTTP_REFERER']);
        }
        if(isEmpty($region)){
          setcookie('error','يرجي تحديد المنطقه');
          header("location:".$_SERVER['HTTP_REFERER']);
        }
   }


}
?>


