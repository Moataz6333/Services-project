<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
   $city_id =$_POST['city_id'];
 
    if(!isEmpty($name)){
    
        
           if( strlen($name) >= 3 ){
 
             if(isUnique('regions','name',$name)){
                 // insert
                 $sql = "INSERT INTO `regions`( `name`, `city_id`) 
                 VALUES ('$name','$city_id')";
                        header("location:".$_SERVER['HTTP_REFERER']);
                  setcookie('success',db_insert($sql,'region'));
 
             }else{
            // array_push($error_message,'The name is already exists.');
            setcookie('error','The name is already exists.');
            header("location:".$_SERVER['HTTP_REFERER']);
 
             }
 
           }else{
            // array_push($error_message,'The name must be at least 3 characters.');
            setcookie('error','The name must be at least 4 characters.');
            header("location:".$_SERVER['HTTP_REFERER']);

 
           }
         
        
    }else{
         if(isEmpty($name)){
        //    array_push($error_message,'the name field is required');
           setcookie('error','the name field is required');
           header("location:".$_SERVER['HTTP_REFERER']);


         }
       
    }
 
 
 }
 
?>