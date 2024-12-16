<?php

require_once('../../config.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_POST['submit'])){
    $row = getRow('regions','id',$_POST['id']);
    if($row){
        if(deleteRow('regions' ,$_POST['id'])){
            header("location:".$_SERVER['HTTP_REFERER']);
            setcookie('success','region deleted successfully!');
        }else{
            header("location:".$_SERVER['HTTP_REFERER']);
            setcookie('error','can not delete!');
        }
       
    }else{
        header("location:".$_SERVER['HTTP_REFERER']);
        setcookie('error','row not found');
    }
}

    
?>