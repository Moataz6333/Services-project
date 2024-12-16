<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

// var_dump();
$egyptGovernorates = [
  "أسوان",
  "أسيوط",
  "الأقصر",
  "الإسكندرية",
  "الإسماعيلية",
  "البحر الأحمر",
  "البحيرة",
  "الجيزة",
  "الدقهلية",
  "السويس",
  "الشرقية",
  "الغربية",
  "الفيوم",
  "القاهرة",
  "القليوبية",
  "المنوفية",
  "المنيا",
  "الوادي الجديد",
  "بني سويف",
  "بورسعيد",
  "جنوب سيناء",
  "دمياط",
  "سوهاج",
  "شمال سيناء",
  "قنا",
  "كفر الشيخ",
  "مطروح"
];



if(isset($_POST['submit'])){

   $name = $_POST['name'];
  

   if(!isEmpty($name)){
   
       
          if( strlen($name) >= 3 ){

            if(isUnique('cities','name',$name)){
                // insert
                $sql = "INSERT INTO `cities`( `name`)
                 VALUES ('$name')";

                  $success_message =db_insert($sql,'city');

            }else{
           array_push($error_message,'The name is already exists.');

            }

          }else{
           array_push($error_message,'The name must be at least 3 characters.');

          }
        
       
   }else{
        if(isEmpty($name)){
          array_push($error_message,'the name field is required');
        }
      
   }

 require FUNC.'messages.php' ;
}




?>

    



<h1 class="my-4 text-center">Add New City</h1>

<div class="mt-3 d-flex w-100 justify-content-center ">

    <form class="w-50" method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>">
      <div class="mb-3">
        <label for="name" class="form-label">Name </label>
        <input type="text" class="form-control" name="name" id="name" >
      </div>
    
     
      <button type="submit" name="submit" class="btn btn-primary">Add</button>
    </form>
</div>





<?php 
require_once(BLA.'inc/footer.php');
?>