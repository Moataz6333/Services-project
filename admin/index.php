<?php
require_once('../config.php');
require_once(FUNC.'db.php');


$messages=getRows('messages');

?>

<?php require_once(BLA.'inc/header.php'); ?>
<?php require_once(FUNC.'messages.php'); ?>

<h1 class="text-center my-3">messages</h1>
<div class="messages-container d-flex w-100 justify-content-center" style="flex-direction:column-reverse;">
    <?php if($messages){ ?>
    <?php foreach($messages as $message){ ?>
        <div class="my-4 d-flex  justify-content-end gap-2 p-3 " style="border: 2px solid black; border-radius:20px; flex-direction:column;">
                <h3>Name:</h3>
                <p><?php echo $message['name'] ?></p>
                <h3>Body:</h3>
                <p><?php echo $message['description'] ?></p>
                <h3>Sended at:</h3>
                <p><?php echo date_format(date_create($message['created_at']),"Y/m/d  h:i a") ?></p>
                <div class="d-flex w-100 justify-content-end">
                    <form action="<?php echo BURLA.'delete.php' ?>" method="post">
                        <input type="hidden" name="id" value="<?php echo $message['id'] ?>">
                        <button type="submit" name="submit" class="btn btn-danger">delete</button>
                    </form>
                </div>

        </div>
    <?php } ?>

   <?php }else{ ?>
    <h3 class="text-center">no messages</h3>
    <?php } ?>

</div>







<?php 
require_once(BLA.'inc/footer.php');
?>
