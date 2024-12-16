<?php
require_once('../../config.php');
require_once(FUNC.'db.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'messages.php');

    $regions =getRowsWhere('regions','city_id',$_SESSION['city_id']);
    ?>

    <?php
    if(isset($_POST['submit'])){

       $title = $_POST['title'];
       $description = $_POST['description'];
       $region = $_POST['region'];
       $price = $_POST['price'];
       $userId =$_SESSION['user_id'];

      

       if(!isEmpty($title) && !isEmpty($description) && !isEmpty($region)){
           if(strlen($title) > 3){
                    
       
                    // // insert
                     $sql = "INSERT INTO `services`( `title`, `description`,  `user_id`, `region_id`, `price`) 
                     VALUES ('$title','$description','$userId','$region','$price')";
                      $success_message =db_insert($sql,'service');
                      if($success_message){
                        $success_message ="تم اضافه الخدمه بنجاح!";
                      }
                    }else{

                   array_push($error_message,'العنوان يجب ان يكون اكبر من 3 حروف');
                    }
          
           
       }else{
            if(isEmpty($title)){
              array_push($error_message,'العنوان مطلوب');
            }
            if(isEmpty($description)){
              array_push($error_message,'الوصف مطلوب');
            }
            if(isEmpty($region)){
              array_push($error_message,'يرجي تحديد المنطقه');
            }
       }

  
}
?>




<?php require_once(BL.'user/inc/header.php'); ?>
<?php    require FUNC.'messages.php' ; ?>

<div class="p-3 d-flex w-100 justify-content-end">
    <a href="<?php echo BURL.'user/services/index.php'  ?>" class="btn btn-dark">رجوع</a>
</div>
<div class="d-flex justify-content-center mt-3 w-100 flex-column gap-3 align-items-center">
    <h1 class="text-center">اضافه خدمه</h1>

      <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" >
        <div class="my-3">
            <label for="title" class="form-label">عنوان الخدمه</label>
            <input type="text" name="title" required class="form-control" id="title" placeholder="المسمي الوظيفي">
        </div>
        <div class="my-3">
            <label for="text-area" class="form-label">وصف الخدمه</label>
            <textarea rows="3"   name="description" required class="form-control" id="text-area" placeholder="نبذه تعريفيه عن الخدمه" > </textarea>
        </div>

        <div class="my-3">
       <label for="inputState" class="form-label">المنطقه</label>
      <select id="inputState" class="form-select" name="region" required>
      <?php foreach($regions as $region) { ?>
        <option value="<?php echo $region['id'] ?>"><?php echo $region['name'] ?> </option>
        <?php } ?>
    </select>
  </div>
        <div class="my-3">
            <label for="price" class="form-label"> سعر الخدمه (اختياري)</label>
            <textarea rows="3"   name="price"  class="form-control"  > </textarea>

        </div>
        <div class="my-3">
            <button type="submit" class="btn btn-success" name="submit" >تسجيل</button>
        </div>
        
      </form>

    </div>



    <?php require_once(BL.'user/inc/footer.php'); ?>