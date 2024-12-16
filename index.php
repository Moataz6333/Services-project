<?php
require_once('config.php');
require_once(FUNC.'db.php');

$cities=getRows('cities');
$regions=getRows('regions');
$jobs = select_unique('services','title');




?>


<?php require_once(BL.'inc/header.php'); ?>

    <!-- landing -->
    <div class="landing w-100 d-flex justify-content-evenly align-items-center gap-2">
               <div class="text-content  d-flex align-items-center justify-content-center flex-column" style="height:70vh">
               <h1>مرحبا بك في موقعنا</h1>
               <p class="text-secondry">   يمكنك ان تجد الخدمه التي تبحث  عنها بكل سهوله .</p>
               </div>
    
    <!-- search for service -->
        <div class="searchDiv d-flex flex-column align-items-center gap-2 justify-content-center w-50"  style="min-height:90vh;" id="searchDiv">
            <h1 class="text-center ">ابحث عن خدمه</h1>
            <form action="<?php echo BURL.'search.php' ?>" method="post" class="w-100">

                <div class=" ">
                    <div class=" pb-2">
                        <h6>المدينة</h6>
                            <select name="city" id="city" class="form-select">
                                <?php foreach($cities as $city){ ?>
                                   <option value=" <?php echo $city['id'] ?>"> <?php echo $city['name'] ?></option>
                                    <?php }?>
                            </select>
                    </div>
                    <div class="pb-2">
                        <h6>المنطقه</h6>
                            <select name="region" id="region" class="form-select">
                                <option value="all" id="all" selected>الكل</option>
                                <?php foreach($regions as $region){ ?>
                                   <option value="<?php echo $region['id'] ?>" class="<?php echo $region['city_id'] ?>"> <?php echo $region['name'] ?></option>
                                    <?php }?>
                            </select>
                    </div>
                    <div class="pb-2">
                        <h6>الخدمه</h6>
                            <select name="service"  class="form-select">
                                <?php foreach($jobs as $job){ ?>
                                   <option value="<?php echo $job['title'] ?>" > <?php echo $job['title'] ?></option>
                                    <?php }?>
                            </select>
                    </div>
                    <div class=" d-flex pt-4  align-items-end">
                        <button type="submit" class="btn btn-success w-100" name="submit"> بحث</button>
                    </div>
                </div>
            </form>

          
                    
         
               
        </div>
        </div>
        <script >
          
         
           city.addEventListener('change',function(){
            // console.log("changed");
            getRegions();
           });

           function getRegions(){
            let city =document.getElementById("city");
            val=city.value.trim();
          let  regions =document.querySelectorAll("#region option");
          
               regions.forEach((ele)=>{
                 
                      ele.style.display="block";
                    
               });
               regions.forEach((ele)=>{
                   if(ele.className != val){
                      ele.style.display="none";
                     
                   }else{
                    ele.selected=true;
                   }
               });
              all =document.getElementById("all");
              all.style.display="block";
              all.selected=true;

           }
           getRegions();
   
    
    
        </script>

    <?php require_once(BL.'inc/footer.php'); ?>
