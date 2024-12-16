<?php
require_once('../../config.php');
require_once(FUNC.'db.php');
require_once(FUNC.'validate.php');


    $regions =getRowsWhere('regions','city_id',$_SESSION['city_id']);
    if(isset($_GET['id']) && is_numeric($_GET['id'])){
        $row =getRow('services','id',$_GET['id']);
        if($row){
            if($row['user_id'] == $_SESSION['user_id']){

            }else{
           header("location:".BURL.'user/services/index.php');
            }
           
               
        }else{
           header("location:".BURL.'user/services/index.php');

        }

       }else{
        header("location:".BURL.'user/services/index.php');
    }

    ?>






<?php require_once(BL.'user/inc/header.php'); ?>
<?php    require FUNC.'messages.php' ; ?>

<div class="p-3 d-flex w-100 justify-content-end">
    <a href="<?php echo BURL.'user/services/index.php'  ?>" class="btn btn-dark">رجوع</a>
</div>
<div class="d-flex justify-content-center mt-3 w-100 flex-column gap-3 align-items-center">
    <h1 class="text-center">تعديل خدمه</h1>

      <form action="<?php echo BURL.'user/services/update.php' ?>" method="post" >
        <div class="my-3">
            <label for="title" class="form-label">عنوان الخدمه</label>
            <input type="text" name="title" value="<?php echo $row['title'] ?>" class="form-control" id="title" placeholder="المسمي الوظيفي">
        </div>
        <div class="my-3">
            <label for="text-area" class="form-label">وصف الخدمه</label>
            <textarea rows="3"   name="description" required class="form-control" id="text-area" placeholder="نبذه تعريفيه عن الخدمه" ><?php echo $row['description'] ?> </textarea>
        </div>

        <div class="my-3">
       <label for="inputState" class="form-label">المنطقه</label>
      <select id="inputState" class="form-select" name="region" required>
      <?php foreach($regions as $region) { ?>
        <option <?php if($region['id'] == $row['region_id']){echo "selected" ;}   ?> value="<?php echo $region['id'] ?>"><?php echo $region['name'] ?> </option>
        <?php } ?>
    </select>
  </div>
        <div class="my-3">
            <label for="price" class="form-label"> سعر الخدمه (اختياري)</label>
            <textarea rows="3"   name="price"  class="form-control"  ><?php echo $row['price'] ?> </textarea>

        </div>
        <input type="hidden" name="service_id" value="<?php echo $row['id'] ?>">
        <div class="my-3">
            <button type="submit" class="btn btn-success" name="submit" >تعديل</button>
        </div>
        
      </form>

    </div>



    <?php require_once(BL.'user/inc/footer.php'); ?>