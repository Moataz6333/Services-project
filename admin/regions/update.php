<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_POST['submit'])){

    $name = $_POST['name'];
    $id= $_POST['id'];
    $row =getRow('regions','id',$id);
    if($row){
        if(!isEmpty($name)){
        
            
               if( strlen($name) >= 3 ){
     
                 if(isUnique('regions','name',$name)){
                    //  update
                    if(updateRow('regions','name',$name,$id)){
                        header("location:".$_SERVER['HTTP_REFERER']);
                        // $success_message ="city updated successfully";
                        setcookie('success','region updated successfully!');
                       
                    }else{
                        header("location:".$_SERVER['HTTP_REFERER']);
                        //    array_push($error_message,'Something wrong');
                   setcookie('error','something went worng!');

                    }
     
                 }else{
                        header("location:".$_SERVER['HTTP_REFERER']);
                        // array_push($error_message,'The name is already exists.');
                setcookie('error','The name is already exists');
     
                 }
     
               }else{
                        header("location:".$_SERVER['HTTP_REFERER']);
                setcookie('error','The name must be at least 3 characters');
     
               }
             
            
        }else{
             if(isEmpty($name)){
                header("location:".$_SERVER['HTTP_REFERER']);
                setcookie('error','The name is required');
             }
           
        }

    }else{
        header("location:".$_SERVER['HTTP_REFERER']);
                setcookie('error','The region not found');

    }
 
 
 }


?>