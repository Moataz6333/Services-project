<?php
require_once('../../config.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');
require_once(FUNC.'messages.php');

if(isset($_POST['submit'])){
    $row = getRow('orders','id',$_POST['id']);
    if($row){
        if(deleteRow('orders' ,$_POST['id'])){
            header("location:".$_SERVER['HTTP_REFERER']);
            setcookie('success','تم الحذف بنجاح');
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