<?php
require_once('../../config.php');
require_once(FUNC.'db.php');
    $services =getRowsWhere('services','user_id',$_SESSION['user_id']);
        $rows =[];
        foreach($services as $service){
            array_push($rows,getRowsWhere('orders','service_id',$service['id']));
        }
     
?>


<?php require_once(BL.'user/inc/header.php');  ?>
<?php require_once(FUNC.'messages.php'); ?>

<div class="p-3 d-flex w-100 justify-content-end">
    <a href="<?php echo BURL.'user/index.php'  ?>" class="btn btn-dark">رجوع</a>
</div>
<h1 class="text-center my-3">الطلبات الوارده</h1>

    <div class="orders my-4 d-flex w-100 " style="flex-direction: column-reverse;">
            <?php if(count($rows) == 0){ ?>
                <h2 class="text-center my-3">لا توجد طلبات </h2>
           <?php }else{ ?>
                <?php foreach($rows as $orders){ ?>
                <?php foreach($orders as $order){ ?>
                    <div class="results mt-3 " id="result">
                    <div class="result d-flex w-100 my-3" style="background-color: rgb(255, 214, 137);
                        border: 3px solid rgb(80, 39, 0);
                        gap:30px;
                        align-items: center;
                        justify-content: space-evenly;
                        border-radius: 20px;
                        padding: 20px;
                        width:100%;">
                        <!-- pic image -->
                        <div class="pic-div">
                            <div class="pic" style="width:70px; height:70px; ">
                                <img src="<?php echo ASSETS.'images/order.jpg' ?>" alt="not found" style="width:100%; height:100%; border-radius:50%;">
                            </div>
                            <h6 class="mt-3">  <?php echo $order['name']  ?> </h6>
                        </div>
                                    <!-- info div -->
                                     <div class="user-info">
                                        <p>العنوان : <?php echo $order['address'] ?></p>
                                        <p><?php echo $order['description'] ?></p>
                                        <p>تيلفون : <?php echo $order['phone'] ?></p>
                                       
                                            <p dir="ltr"><?php echo date_format(date_create($order['created_at']),"Y-m-d   h:i a") ?></p>
                                     </div>

                                     <div>
                                        <form action="<?php echo BURL.'user/orders/delete.php'?>" method="post">
                                            <input type="hidden" name="id" value="<?php echo $order['id'] ?>">
                                            <button name="submit" class="btn btn-danger"  type="submit">حذف</button>
                                        </form>
                                     </div>

                                                  </div>
                                     </div>

                <?php } ?>
                <?php } ?>
            

            <?php } ?>
    </div>