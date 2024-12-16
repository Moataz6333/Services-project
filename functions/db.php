<?php

    $server= "localhost";
    $username="root";
    $password ="";
    $dbname="services_project";

    $conn =mysqli_connect($server,$username,$password,$dbname);

    if(!$conn){
        die("Connection Error : ".mysqli_connect_error()) ;
        
    }

    // insert
    function db_insert($sql,$name){
        global $conn;
        $result =mysqli_query($conn,$sql);
        if($result){
            return "New ".$name." Added Successfully!";
        }
        return false;
    }
   
    // update
    function db_update($sql){
        global $conn;
        $result =mysqli_query($conn,$sql);
        if($result){
            return true;
        }
        return false;
    }
   
 

    // select one row
    function getRow($table,$field ,$value){
        global $conn;
        $sql = "SELECT * FROM `$table` WHERE `$field` ='$value' ";
        $result =mysqli_query($conn,$sql);
        if($result){
            $rows=[];
            if(mysqli_num_rows($result) > 0){
                $rows =mysqli_fetch_assoc($result);
                return $rows;
            }
        }
        return false;
    }
    // select all row
    function getRows($table){
        global $conn;
        $sql = "SELECT * FROM `$table`  ";
        $result =mysqli_query($conn,$sql);
        if($result){
            $rows=[];
            if(mysqli_num_rows($result) > 0){
                while($row =mysqli_fetch_assoc($result)){
                        $rows[]=$row;
                }
                
                return $rows;
            }
        }
        return false;
    }
    // select all row where condidtion
    function getRowsWhere($table,$field,$value){
        global $conn;
        $sql = "SELECT * FROM `$table`  WHERE `$field` = '$value'  ";
        $result =mysqli_query($conn,$sql);
        if($result){
            $rows=[];
            if(mysqli_num_rows($result) > 0){
                while($row =mysqli_fetch_assoc($result)){
                        $rows[]=$row;
                }
                
                return $rows;
            }else{
                return $rows;
            }
        }
        return false;
    }

    // check if unique
    function isUnique($table ,$field ,$value ){
        global $conn;
        $sql = "SELECT * FROM `$table` WHERE `$field`= '$value' ";
        $result =mysqli_query($conn,$sql);
        if($result){
          
            if(mysqli_num_rows($result) > 0){
            //    is exists (not unique)
              return false;
            }
        }
        // unique
        return true;
    }


    // update row
     // select one row
     function updateRow($table,$field ,$value ,$id){
        global $conn;
        $sql = "UPDATE `$table` SET `name`='$value' WHERE `id`='$id'";
        $result =mysqli_query($conn,$sql);
        if($result){
           return true;
        }
        return false;
    }

    // delete row
    
     function deleteRow($table ,$id){
        global $conn;
        $sql = "DELETE FROM `$table` WHERE `id`='$id'";
        $result =mysqli_query($conn,$sql);
        if($result){
           return true;
        }
        return false;
    }

    //only unique values
    function select_unique($table ,$feild){
        global $conn;
        $sql = "SELECT DISTINCT `$feild` FROM `$table`   ";
        $result =mysqli_query($conn,$sql);
        if($result){
            $rows=[];
            if(mysqli_num_rows($result) > 0){
                while($row =mysqli_fetch_assoc($result)){
                        $rows[]=$row;
                }
                
                return $rows;
            }else{
                return $rows;
            }
        }
        return false;
    }

    // search
    function search($sql){
        global $conn;
        $result =mysqli_query($conn,$sql);
        if($result){
            $rows=[];
            if(mysqli_num_rows($result) > 0){
                while($row =mysqli_fetch_assoc($result)){
                        $rows[]=$row;
                }
                
                return $rows;
            }else{
                return $rows;
            }
        }
        return false;
    }

?>