<?php include "include/header.php" ?>

<?php

if($_COOKIE["email"] != "admin@email.com"){
    header("Location:index.php") ; 
}

$sql = "SELECT * FROM Messages ; ";
$result = mysqli_query($connection, $sql);
$messages = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<style>
    .dark-text-color {
        color: #343a40;
    }
</style>

<div class="container w-75 h-50 py-3">
    <h3>Messages</h3>

    <?php if (empty($messages)) : ?>
        <p class="lead mt3">There Is Not Messages Yet</p>
    <?php endif; ?>





    <?php foreach ($messages as $message) : ?>

        <div class="col-sm py-3">
            <div class="card bg-light text-light">
                <div class="card-body text-center dark-text-color">
                    <h5 class="card-text"><?php echo "${message['body']}" ?></h5>
                    <p class="card-title"><?php echo $message["email"] ?></p>
                </div>
            </div>
        </div>



    <?php endforeach; ?>




</div>



<?php include "include/footer.php" ?>