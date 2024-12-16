<?php 
if(isset($error_message) && count($error_message) !=0){ ?>
<div class="alert alert-danger my-3" role="alert">
    <ul>
    <?php foreach($error_message as $error){ ?>
        <li>

            <?php echo $error ?>
        </li>
            <?php } ?>
        </ul>
 </div>


<?php } ?>

<!-- success -->
<?php 
if(isset($success_message) && $success_message !=''  ){ ?>
<div class="alert alert-primary my-3" role="alert">
<?php echo $success_message ?>
</div>


<?php } ?>




<!-- cookies -->
 
<?php
  // cookies
// print_r($_COOKIE);
if($_COOKIE['success'] != 'none'){ ?>
    <div class="alert alert-primary my-3" role="alert">
<?php echo $_COOKIE['success'] ?>
</div>
<?php } if($_COOKIE['error'] != 'none'){ ?>

    <div class="alert alert-danger my-3" role="alert">
<?php echo $_COOKIE['error'] ?>
</div>
<?php } ?>