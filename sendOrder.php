<?php
require_once('config.php');
require_once(FUNC.'db.php');
require_once(FUNC.'validate.php');


if(isset($_POST['submit'])){

    $name = $_POST['name'];
   $address =$_POST['address'];
   $service_id =$_POST['service_id'];
   $description =$_POST['description'];
   $phone =$_POST['phone'];
 
    if(!isEmpty($name) && !isEmpty($address) && !isEmpty($description) && !isEmpty($phone)){
    
        
           if( strlen($phone) == 11 ){
 
            
                 // insert
                 $sql = "INSERT INTO `orders`(`name`, `address`, `description`, `phone`, `service_id`)
                  VALUES ('$name','$address','$description','$phone','$service_id')";
                        header("location:".$_SERVER['HTTP_REFERER']);
                        if(db_insert($sql,'order')){
                            header("location:".$_SERVER['HTTP_REFERER']);
                            setcookie('success','تم ارسال الطلب بنجاح');

                        }else{
                            header("location:".$_SERVER['HTTP_REFERER']);
                            setcookie('error',"حدث شئ خاطئ , حاول مره اخري");
                        }

            
           
 
           }else{
            // array_push($error_message,'The name must be at least 3 characters.');
            setcookie('error','من فضلك ادخل هاتف صحيح');
            header("location:".$_SERVER['HTTP_REFERER']);

 
           }
         
        
    }else{
        
           setcookie('error','من فضلك املأ جميع الحقول');
           header("location:".$_SERVER['HTTP_REFERER']);


         
       
    }
 
 
 }
 
?>