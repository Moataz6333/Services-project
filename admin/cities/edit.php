<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $row =getRow('cities','id',$_GET['id']);
        if($row){

           
               
        }else{
    header("location:".BURLA);

        }

}else{
    header("location:".BURLA);
}






require FUNC.'messages.php' ;

?>

<h1 class="my-4 text-center">Edit  City</h1>

<div class="mt-3 d-flex w-100 justify-content-center ">

    <form class="w-50" method="post" action="<?php echo BURLA.'cities/update.php' ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name </label>
        <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name'] ?>">
        <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
      </div>
    
     
      <button type="submit" name="submit" class="btn btn-primary">Save</button>
    </form>
</div>





<?php 
require_once(BLA.'inc/footer.php');
?>