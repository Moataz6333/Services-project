<?php
require_once('config.php');
require_once(FUNC.'db.php');
if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $row =getRow('services','id',$_GET['id']);
    if($row){

       $user=getRow('users','id',$row['user_id']);
      

           
    }else{
header("location:".BURL);

    }

}else{
header("location:".BURL);
}

?>

<?php require_once(BL.'inc/header.php'); ?>
<?php require_once(FUNC.'messages.php'); ?>

    <div class="my-3 d-flex justify-content-end w-100">
        <a href="<?php echo BURL.'index.php#searchDiv' ?>" class="btn btn-dark">الرجوع</a>
    </div>

        <h1 class="text-center my-3">ارسال طلب الي <span style="text-decoration:underline;"><?php echo $user['name']." " .$user['lastName'] ?></span></h1>

    <div class="result d-flex w-100 my-4" style="background-color: rgb(255, 214, 137);
                        border: 3px solid rgb(80, 39, 0);
                        gap:30px;
                        align-items: center;
                        justify-content: space-evenly;
                        border-radius: 20px;
                        padding: 20px;
                        width:100%;">

                <form action="<?php echo BURL.'sendOrder.php' ?>" method="post" style="width:80%;">

                    <div class="my-3">
                        <label for="name" class="form-label">الأسم</label>
                    <input type="text" class="form-control" name="name" placeholder=" الاسم" required>
                    </div>
                    <div class="my-3">
                    <label for="text-area" class="form-label">وصف الطلب</label>
                    <textarea rows="3"   name="description" required class="form-control" id="text-area" > </textarea>
                        </div>
                        <div class="my-3">
                        <label for="address" class="form-label">العنوان</label>
                    <input type="text" class="form-control" name="address" placeholder=" العنوان" required>
                    </div>
                    <div class="my-3">
                    <label for="phone" class="form-label" >الهاتف</label>
                    <input type="text" class="form-control" name="phone"  placeholder="01xxxxxxxx" required>
                    <input type="hidden" name="service_id" value="<?php echo $_GET['id'] ?>">
                        </div>
                        <div class="my-3">
                            <button type="submit" name="submit" class="btn btn-success ">ارسال</button>
                        </div>

                </form>



    </div>


<?php require_once(BL.'inc/footer.php'); ?>
