<?php
require_once('../../config.php');
require_once(BLA.'inc/header.php');
require_once(FUNC.'validate.php');
require_once(FUNC.'db.php');

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $row =getRow('cities','id',$_GET['id']);
    if($row){
        // 'the city is exists';
        $city = $row['name'];
            $regions = getRowsWhere('regions','city_id',$_GET['id']);
            // var_dump($regions);
       
           
    }else{
header("location:".BURLA);

    }

}else{
header("location:".BURLA);
}

require FUNC.'messages.php' ;

?>

<div class="d-flex justify-content-start my-2 w-100">
  <a href="<?php echo BURLA.'cities/cities.php' ?>" class="btn btn-dark">back</a>
</div>
<h2 class="my-3 text-center">All Regions for <?php echo $city ?></h2>

<div class=" d-flex w-100 justify-content-center ">

    <form class="w-50"  method="post" action="<?php echo BURLA.'regions/add.php' ?>">
      <div class="mb-3 d-flex gap-2">
        <input type="text" class="form-control" name="name" id="name" placeholder="region name">
        <input type="hidden" name="city_id" value="<?php echo $_GET['id'] ?>">
        <button type="submit" name="submit" class="btn btn-primary">Add</button>
      </div>
    
     
    </form>
</div>



<table class="table mt-4">
  <thead class="table-dark">
   <th>id</th>
   <th>name</th>
   <th>edit</th>
   <th>delete</th>
  </thead>
  <tbody>
    <?php foreach($regions as $region) { ?>
        <tr>
            <td><?php echo $region['id'] ?> </td>
            <td><?php echo $region['name'] ?> </td>
            <td><a href="<?php echo BURLA.'regions/edit.php?id='.$region['id'] ?>" class="btn btn-warning">Edit</a> </td>
            <td>
          <form action="<?php echo BURLA.'regions/delete.php?id='.$region['id']; ?>" method="post" >
              <button type="submit" name="submit" class="btn btn-danger" >DELETE</button>
              <input type="hidden" name="id" value="<?php echo $region['id'] ?>">
          </form>
        </td>
     </tr>
        <?php } ?>
  </tbody>
</table>




<?php 
require_once(BLA.'inc/footer.php');
?>