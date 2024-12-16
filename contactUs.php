<?php
require_once('config.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $body=$_POST['description'];
    if(!isEmpty($name) && !isEmpty($body)){
            $sql="INSERT INTO `messages`(`name`, `description`)
             VALUES ('$name','$body')";
             if(db_insert($sql,'message')){
                $success_message="تم تلقي رساتك بنجاح";
             }else{
                array_push($error_message,' حدث شئ خاطئ');
             }
    }else{
        array_push($error_message,'برجاء ملئ جميع الحقول');
    }
}




?>


<?php require_once(BL.'inc/header.php'); ?>
<?php require_once(FUNC.'messages.php'); ?>
<div class="my-3 d-flex w-100 justify-content-end">
    <a href="<?php echo BURL.'index.php' ?>" class="btn btn-dark">رجوع</a>
</div>
    <h1 class="text-center my-3">تواصل معنا</h1>
   <div class="d-flex justify-content-center">
   <form action="" method="post" class=" mt-4 ">
    <div class="my-3">
                        <label for="name" class="form-label">الأسم</label>
                    <input type="text" class="form-control" name="name" placeholder=" الاسم" required>
                    </div>
                    <div class="my-3">
                    <label for="text-area" class="form-label">  وصف الطلب (برجاء توافر تيلفون او واتس اب لسهوله التواصل)</label>
                    <textarea rows="3"   name="description" required class="form-control" id="text-area" > </textarea>
                        </div>

                        <div class="my-3">
                            <button name="submit" class="btn btn-primary" type="submit">ارسال</button>
                        </div>
        </form>
   </div>


<?php require_once(BL.'inc/footer.php'); ?>