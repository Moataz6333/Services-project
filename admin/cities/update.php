<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $id= $_POST['id'];
    $row =getRow('cities','id',$id);
    if($row){
        if(!isEmpty($name)){
        
            
               if( strlen($name) >= 3 ){
     
                 if(isUnique('cities','name',$name)){
                    //  update
                    if(updateRow('cities','name',$name,$id)){
                        header("location:".$_SERVER['HTTP_REFERER']);
                        $success_message ="city updated successfully";
                        setcookie('success','city updated successfully!',strtotime("+1 min"));
                       
                    }else{
                        header("location:".$_SERVER['HTTP_REFERER']);
                   setcookie('error','something went worng!',strtotime("+1 min"));

                    }
     
                 }else{
                        header("location:".$_SERVER['HTTP_REFERER']);
                        array_push($error_message,'The name is already exists.');
                setcookie('error','The name is already exists',strtotime("+1 min"));
     
                 }
     
               }else{
                        header("location:".$_SERVER['HTTP_REFERER']);
                        array_push($error_message,'The name must be at least 3 characters.');
                setcookie('error','The name must be at least 3 characters',strtotime("+1 min"));
     
               }
             
            
        }else{
             if(isEmpty($name)){
              //  array_push($error_message,'the name field is required');
               header("location:".$_SERVER['HTTP_REFERER']);
               setcookie('error','the name is required');
             }
           
        }

    }else{
        // array_push($error_message,'the city not found!');
        header("location:".$_SERVER['HTTP_REFERER']);
        setcookie('error','the city not found');

    }
 
 
 
 }


?>