<?php
$error_message =[];
 
//  check is emtpty
function isEmpty($val) {
    if(empty($val)){
       
        return true;
    }
        return false;
}

function isEmptyArr(...$vals) {
       
        foreach($vals as $val){
            if(empty($val)){
               
                return true;
            }
        }
        return false;
}

function isEmail($email){
    if(filter_var($email ,FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}







?>