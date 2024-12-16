<?php
require_once('../config.php');
require_once(FUNC.'db.php');

        $services =getRowsWhere('services','user_id',$_SESSION['user_id']);
        $rows =[];
        $num=0;
        foreach($services as $service){
            $orders=getRowsWhere('orders','service_id',$service['id']);
            $num += count($orders);
            array_push($rows,$orders);
            }
?>
<?php require_once(BL.'user/inc/header.php');  ?>

<h1 class="text-center my-2 ">  مرحبا <?php echo $_SESSION['user_name'] ?></h1>

<div class="row d-flex justify-content-center align-items-center my-3" style="height:50vh;">
    <div class="services-buttons col-5 d-flex justify-content-center align-items-center">
        <a href="<?php echo BURL.'user/services/index.php' ?>" class="btn btn-success ">خدماتي</a>
    </div>
    <div class="services-buttons col-5 d-flex justify-content-center align-items-center">
    <a href="<?php echo BURL.'user/orders/index.php' ?>" class="btn btn-primary " >الطلبات (<?php echo $num ?>)</a>

    </div>
</div>


<?php require_once(BL.'user/inc/footer.php');  ?>

