<?php 
require_once('../../config.php');
require_once('../inc/header.php');
require_once(FUNC.'db.php');
require_once(FUNC.'validate.php');

     $services= getRowsWhere('services','user_id',$_SESSION['user_id']);
    
    
 ?>
 <?php require_once(FUNC.'messages.php'); ?>
<div class="p-3 d-flex w-100 justify-content-end">
    <a href="<?php echo BURL.'user/index.php'  ?>" class="btn btn-dark">رجوع</a>
</div>
<h1 class="my-3 text-center mb-3 "> خدماتك </h1>
<div class="d-flex justify-content-center my-4">
    <a href="<?php echo BURL.'user/services/add.php' ?>" class="btn btn-success">اضافه خدمه</a>
</div>

<div class="services mt-3 d-flex justify-content-center align-items-center flex-column gap-3">
    <?php if (count($services)== 0) { ?>
        <h3 class="my-4 text-center">لا توجد اي خدمات لك</h3>
        <?php } ?>
        <!-- services -->
         <?php foreach($services as $service) { ?>
         <div class="service my-2">
               <div class="d-flex gap-2 my-2 align-items-center ">
               <h3 >عنون الخدمه    :</h3>
               <h5 ><?php echo $service['title'] ?></h5>
               </div>
                <h3 class="my-2">وصف الخدمه</h3>
                <p><?php echo $service['description'] ?></p>
                <?php if(! empty($service['price']) )  { ?>
                 <h3 class="my-2">السعر</h3>
                <p><?php echo $service['price'] ?></p>
                <?php } ?>
                <h3 class="my-2">المنطقه</h3>
                <p>
                    <?php echo getRow('cities','id',$_SESSION['city_id'])['name'] ?>
                    \
                    <?php echo getRow('regions','id',$service['region_id'])['name'] ?>

                </p>


               <div class="d-flex w-100 justify-content-between">
               <a href="<?php echo BURL.'user/services/edit.php?id='.$service['id'] ?>" class="btn btn-success mt-3">تعديل</a>
               <form action="<?php echo BURL."user/services/delete.php" ?>" method="post" class="d-flex justify-content-end align-items-center"> 
               <input type="hidden" name="id" value="<?php echo $service['id'] ?>">
                <button type="submit" name="submit" class="btn btn-danger">حذف</button>
               </form>
               </div>
         </div>
         <?php } ?>
</div>



<?php require_once('../inc/footer.php'); ?>