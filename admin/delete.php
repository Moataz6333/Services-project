<?php
    require_once('../config.php');
    require_once(FUNC.'db.php');
    
if(isset($_POST['submit'])){
    $row = getRow('messages','id',$_POST['id']);
    if($row){
        if(deleteRow('messages' ,$_POST['id'])){
            header("location:".$_SERVER['HTTP_REFERER']);
            setcookie('success','message deleted successfully!');
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