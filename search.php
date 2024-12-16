<?php
require_once('config.php');
require_once(FUNC.'db.php');

if(isset($_POST['submit'])){
    $city =$_POST['city']; //city id
    $region =$_POST['region']; //region id
    $service =$_POST['service']; //title
    
       if($region == "all"){
        $cityName=getRow('cities','id',$city)['name'];
      
        $rows = getRowsWhere('services','title',$service);  //سباك
        $data=[];
        if($rows){
            foreach($rows as $row){
                //row = service[name , region_id , user_id]
                    $regionOfService = getRow('regions','id',$row['region_id']); // = region[name ,city_id]
                    $regionName=$regionOfService['name'];
                        if($regionOfService['city_id'] == $city){
                            
                            array_push($data ,[
                                'service'=>$row,
                                'user'=>getRow('users','id',$row['user_id']),
                            ]);
                        }
            }
        }



       }else{
        $cityName=getRow('cities','id',$city)['name'];
        $regionName=getRow('regions','id',$region)['name'];
    // $row = getRowsWhere('services','region_id',$region);
    $sql = "SELECT * FROM `services` WHERE `title` = '$service' AND `region_id` = '$region'";
    $data=[];
    $rows = search($sql);

    if($rows){

        foreach($rows as $row){
            array_push($data ,[
                'service'=>$row,
                'user'=>getRow('users','id',$row['user_id']),
            ]);

         }
    }
       }
        
    


   
   
   
}

?>

<?php require_once(BL.'inc/header.php'); ?>
    <div class="my-3 d-flex justify-content-end w-100">
        <a href="<?php echo BURL.'index.php#searchDiv' ?>" class="btn btn-dark">الرجوع</a>
    </div>
<h1 class="my-3 text-center">النتائج</h1>

    <?php if(count($data) == 0){ ?>
        <div class="my-4">
            <h2 class="text-center">لا توجد منتائج !</h2>
        </div>
        <?php }else{ ?>


        <?php foreach($data as $item){ ?>

   <!-- result -->
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
                                <img src="<?php if($item['user']['photo'] != null){
                  echo UPLOADS.$item['user']['photo'];
                }else{
                  echo ASSETS.'images/user.jpg' ;

                }
                
                ?>"  alt="not found" style="width:100%; height:100%; border-radius:50%;">
                            </div>
                            <h6 class="mt-3"> <?php echo $item['user']['name'] .' '.$item['user']['lastName'] ?> </h6>
                        </div>
                                    <!-- info div -->
                                     <div class="user-info">
                                        <p><?php echo $item['service']['title'] ?></p>
                                        <p><?php echo $item['service']['description'] ?></p>
                                        <p>تيلفون : <?php echo $item['user']['phone'] ?></p>
                                        <?php if(!empty($item['service']['price'])){ ?>
                                        <p> السعر : <?php echo $item['service']['price'] ?> </p>
                                        <?php } ?>
                                     <p> <?php echo $cityName .'/'. getRow('regions','id',$item['service']['region_id'])['name'] ?> </p>
                                     </div>

                                     <div>
                                        <a href="<?php echo BURL.'addOrder.php?id='.$item['service']['id'] ?>" class="btn btn-success">اطلب</a>
                                     </div>

                    </div>
   </div>
   <?php } ?>
   <?php } ?>
<?php require_once(BL.'inc/footer.php'); ?>