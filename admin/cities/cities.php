<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

// var_dump(getRows('cities'));
$cities =getRows('cities');
require FUNC.'messages.php' ;


$egyptGovernorates = [
  15 => ["محطة الرمل", "العجمي", "سموحة", "المنتزه", "كفر عبده"],
  16 => ["جزيرة فيلة", "النوبة", "السد العالي", "كوم أمبو"],
  17 => ["ديروط", "القوصية", "منفلوط", "الغنايم"],
  18 => ["الكرنك", "البر الغربي", "إسنا", "الزينية"],
  20 => ["فايد", "القنطرة شرق", "أبو سلطان", "التل الكبير"],
  21 => ["الغردقة", "الجونة", "مرسى علم", "القصير", "سفاجا"],
  22 => ["دمنهور", "كفر الدوار", "إيتاي البارود", "رشيد", "أبو حمص"],
  23 => ["الدقي", "الهرم", "المهندسين", "6 أكتوبر", "الشيخ زايد"],
  24 => ["المنصورة", "طلخا", "ميت غمر", "دكرنس", "الجمالية"],
  25 => ["حي الأربعين", "عتاقة", "الجناين", "السويس الجديدة"],
  26 => ["الزقازيق", "العاشر من رمضان", "بلبيس", "منيا القمح"],
  27 => ["طنطا", "المحلة الكبرى", "كفر الزيات", "زفتى"],
  28 => ["إطسا", "سنورس", "طامية", "يوسف الصديق"],
  29 => ["مدينة نصر", "مصر الجديدة", "المعادي", "شبرا", "الزمالك"],
  30 => ["بنها", "قليوب", "شبرا الخيمة", "الخانكة"],
  31 => ["شبين الكوم", "منوف", "السادات", "الباجور"],
  32 => ["ملوي", "سمالوط", "أبو قرقاص", "دير مواس"],
  33 => ["الخارجة", "الداخلة", "الفرافرة", "باريس"],
  34 => ["الفشن", "الواسطي", "إهناسيا", "ناصر"],
  35 => ["حي العرب", "بورفؤاد", "الزهور", "شرق التفريعة"],
  36 => ["شرم الشيخ", "دهب", "نويبع", "سانت كاترين"],
  37 => ["رأس البر", "فارسكور", "كفر سعد", "الزرقا"],
  38 => ["جرجا", "البلينا", "طما", "المراغة"],
  39 => ["العريش", "الشيخ زويد", "رفح", "بئر العبد"],
  40 => ["نجع حمادي", "أبوتشت", "فرشوط", "دشنا"],
  41 => ["بلطيم", "دسوق", "بيلا", "الحامول"],
  42 => ["مرسى مطروح", "سيدي عبدالرحمن", "الضبعة", "السلوم"]
];


  
  

// print_r($index);


?>

<h1 class="my-3 text-center">All Cities</h1>

<table class="table">
  <thead class="table-dark">
   <th>id</th>
   <th>name</th>
   <th>add regions</th>
   <th>edit</th>
   <th>delete</th>
  </thead>
  <tbody>
    <?php if($cities){ ?>
   <?php foreach($cities as $city){ ?>
    <tr>
        <td><?php echo $city['id'] ?></td>
        <td><?php echo $city['name'] ?></td>
        <td><a href="<?php echo BURLA.'regions/index.php?id='.$city['id']; ?>" class="btn btn-success">Add Regions</a></td>
        <td><a href="<?php echo BURLA.'cities/edit.php?id='.$city['id']; ?>" class="btn btn-warning">EDIT</a></td>
        <!-- <td><a class="btn btn-danger" href="">DELETE</a></td> -->
        <td>
          <form action="<?php echo BURLA.'cities/delete.php?id='.$city['id']; ?>" method="post" id="delForm">
              <button type="submit" name="submit" class="btn btn-danger" >DELETE</button>
              <input type="hidden" name="id" value="<?php echo $city['id'] ?>">
          </form>
        </td>

    </tr>
        
    <?php }?>
    <?php }?>
  </tbody>
</table>




<?php 
require_once(BLA.'inc/footer.php');
?>